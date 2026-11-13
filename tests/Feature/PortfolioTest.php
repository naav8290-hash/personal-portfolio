<?php

namespace Tests\Feature;

use Tests\TestCase;

class PortfolioTest extends TestCase
{
    public function test_homepage_renders_in_indonesian(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('lang="id"', false);
        $response->assertSee('Vina Nuraini');
        $response->assertSee('My Learning');
        $response->assertSee('Pelajar RPL');
        $response->assertSee('id="journey"', false);

        $this->assertSame(6, substr_count($response->getContent(), 'class="nav-link'));
    }

    public function test_sitemap_and_robots_are_available(): void
    {
        $sitemap = $this->get('/sitemap.xml');
        $sitemap->assertOk();
        $sitemap->assertHeader('content-type', 'application/xml; charset=UTF-8');
        $sitemap->assertSee('<urlset', false);
        $sitemap->assertSee('<lastmod>'.config('portfolio.meta.updated').'</lastmod>', false);

        $robots = $this->get('/robots.txt');
        $robots->assertOk();
        $this->assertStringContainsString('text/plain', $robots->headers->get('content-type'));
        $robots->assertSee('Sitemap: '.url('/sitemap.xml'), false);
    }

    public function test_homepage_serves_optimized_responsive_images(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('assets/img/vina-900.webp', false);
        $response->assertSee('assets/img/vina-480.webp', false);
        $response->assertSee('assets/img/projects/access-internship-1280.webp', false);
        $response->assertSee('srcset=', false);
        $response->assertDontSee('akan ditambahkan', false);
        $response->assertDontSee('setelah dikonfirmasi', false);
    }

    public function test_unknown_page_uses_the_custom_404(): void
    {
        $response = $this->get('/halaman-yang-tidak-ada');

        $response->assertNotFound();
        $response->assertSee('Halaman ini');
        $response->assertSee('Kembali ke Beranda');
        $response->assertSee('noindex', false);
    }

    public function test_security_headers_are_present(): void
    {
        $response = $this->get('/');

        $response->assertHeader('X-Content-Type-Options', 'nosniff');
        $response->assertHeader('X-Frame-Options', 'SAMEORIGIN');
        $response->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->assertHeader('X-Permitted-Cross-Domain-Policies', 'none');
        $response->assertHeaderMissing('X-Powered-By');
    }
}
