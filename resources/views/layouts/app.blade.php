@php
  $meta = $meta ?? config('portfolio.meta');
  $nav = $nav ?? config('portfolio.nav');
  $contact = $contact ?? config('portfolio.contact');
  $schema = config('portfolio.schema');
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', $meta['title'])</title>
  <meta name="description" content="{{ $meta['description'] }}">
  <meta name="author" content="Vina Nuraini">
  <meta name="theme-color" content="#101010">
  @hasSection('robots')
    <meta name="robots" content="@yield('robots')">
  @endif
  @if (request()->routeIs('portfolio'))
    <link rel="canonical" href="{{ url('/') }}">
  @endif

  <meta property="og:type" content="website">
  <meta property="og:locale" content="id_ID">
  <meta property="og:site_name" content="Vina Nuraini">
  <meta property="og:url" content="{{ url('/') }}">
  <meta property="og:title" content="@yield('title', $meta['title'])">
  <meta property="og:description" content="{{ $meta['og_description'] }}">
  <meta property="og:image" content="{{ asset('assets/img/og-image.png') }}">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:alt" content="Vina Nuraini — Pelajar RPL &amp; Creative Enthusiast">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="@yield('title', $meta['title'])">
  <meta name="twitter:description" content="{{ $meta['og_description'] }}">
  <meta name="twitter:image" content="{{ asset('assets/img/og-image.png') }}">

  <link rel="icon" href="{{ asset('assets/favicon.svg') }}" type="image/svg+xml">
  <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
  <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-touch-icon.png') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&amp;family=Playfair+Display:ital,wght@0,400;0,500;1,400;1,500&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ versioned_asset('assets/css/tokens.css') }}">
  <link rel="stylesheet" href="{{ versioned_asset('assets/css/base.css') }}">
  <link rel="stylesheet" href="{{ versioned_asset('assets/css/layout.css') }}">
  <script>document.documentElement.classList.add('js');</script>

  @if (request()->routeIs('portfolio'))
    <script type="application/ld+json">
      {!! json_encode([
          '@context' => 'https://schema.org',
          '@type' => 'Person',
          'name' => $schema['name'],
          'jobTitle' => $schema['jobTitle'],
          'url' => url('/'),
          'image' => asset('assets/img/og-image.png'),
          'knowsAbout' => $schema['knowsAbout'],
          'sameAs' => array_values(array_filter([
              $contact['github'] ?? null,
              $contact['instagram'] ?? null,
          ])),
          'address' => [
              '@type' => 'PostalAddress',
              'addressLocality' => 'Banjar',
              'addressRegion' => 'Jawa Barat',
              'addressCountry' => 'ID',
          ],
      ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) !!}
    </script>
  @endif
</head>
<body>
  <a class="skip-link" href="#main">Lewati ke konten</a>

  @include('partials.header')
  @include('partials.mobile-menu')

  <main id="main">
    @yield('content')
  </main>

  @include('partials.footer')

  @stack('scripts')
</body>
</html>
