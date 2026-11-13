<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PortfolioController extends Controller
{
    /**
     * Widths of the generated WebP variants (see scripts/optimize-images.php).
     */
    private const WEBP_WIDTHS = [640, 1280];

    public function index(): View
    {
        $projects = collect(config('portfolio.projects'))
            ->map(function (array $project): array {
                $relative = $project['image'];

                $project['image'] = asset($relative);
                $project['image_webp'] = asset($this->webpVariant($relative, 1280) ?? $relative);
                $project['image_srcset'] = $this->srcset($relative);

                return $project;
            })
            ->all();

        return view('portfolio', [
            'meta' => config('portfolio.meta'),
            'nav' => config('portfolio.nav'),
            'contact' => config('portfolio.contact'),
            'skills' => config('portfolio.skills'),
            'journey' => config('portfolio.journey'),
            'journeyNote' => config('portfolio.journey_note'),
            'projects' => $projects,
        ]);
    }

    /**
     * Build a responsive srcset for the generated WebP variants.
     */
    private function srcset(string $relative): string
    {
        $candidates = [];

        foreach (self::WEBP_WIDTHS as $width) {
            $variant = $this->webpVariant($relative, $width);
            if ($variant !== null) {
                $candidates[] = asset($variant).' '.$width.'w';
            }
        }

        return implode(', ', $candidates);
    }

    /**
     * Return the relative path of a generated WebP variant, if present.
     */
    private function webpVariant(string $relative, int $width): ?string
    {
        $variant = preg_replace('/\.(png|jpe?g)$/i', "-{$width}.webp", $relative);

        return is_file(public_path($variant)) ? $variant : null;
    }
}
