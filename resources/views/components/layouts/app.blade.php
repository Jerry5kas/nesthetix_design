<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO Meta Tags --}}
    <title>{{ $title ?? $theme['settings']['site_name'] ?? 'Nesthetix' }}</title>
    <meta name="description"
        content="{{ $description ?? 'Premium interior design studio specializing in luxury residential and commercial spaces. Transform your space with thoughtful design where every detail matters.' }}" />
    <meta name="keywords"
        content="{{ $keywords ?? 'interior design, luxury interiors, premium design, residential design, commercial design, home design, interior architecture' }}" />
    <meta name="robots" content="{{ $robots ?? 'index, follow' }}" />
    <meta name="author" content="{{ $theme['settings']['site_name'] ?? 'Nesthetix Designs' }}" />
    <link rel="canonical" href="{{ $canonical ?? url()->current() }}" />

    {{-- Open Graph Meta Tags --}}
    <meta property="og:title" content="{{ $title ?? $theme['settings']['site_name'] ?? 'Nesthetix Designs' }}" />
    <meta property="og:description"
        content="{{ $description ?? 'Premium interior design studio specializing in luxury residential and commercial spaces.' }}" />
    <meta property="og:type" content="{{ $ogType ?? 'website' }}" />
    <meta property="og:url" content="{{ $canonical ?? url()->current() }}" />
    <meta property="og:image" content="{{ $ogImage ?? asset('images/og-image.jpg') }}" />
    <meta property="og:site_name" content="{{ $theme['settings']['site_name'] ?? 'Nesthetix Designs' }}" />
    <meta property="og:locale" content="en_US" />

    {{-- Twitter Card Meta Tags --}}
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $title ?? $theme['settings']['site_name'] ?? 'Nesthetix Designs' }}" />
    <meta name="twitter:description"
        content="{{ $description ?? 'Premium interior design studio specializing in luxury residential and commercial spaces.' }}" />
    <meta name="twitter:image" content="{{ $ogImage ?? asset('images/og-image.jpg') }}" />

    <!-- Font Preconnect for optimal loading -->
    <link rel="preconnect" href="https://api.fontshare.com" crossorigin>
    <link rel="preconnect" href="https://fonts.cdnfonts.com" crossorigin>

    <!-- GSAP Animation Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/TextPlugin.min.js"></script>
    <!-- Lenis Smooth Scroll -->
    <script src="https://cdn.jsdelivr.net/npm/lenis@1.1.18/dist/lenis.min.js"></script>
    <!-- Alpine.js Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Dynamic Theme Variables -->
    <style>
        :root {
            {{ $themeStyles ?? '' }}
            ;
        }

        /* Critical: Luxury Editorial Pairing - Canela Text (Headings) + Satoshi (Body) */
        html,
        body {
            font-family: 'Satoshi', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif !important;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Canela Text Trial', Georgia, 'Times New Roman', serif !important;
        }

        .font-fancy,
        .text-fancy {
            font-family: 'Canela Text Trial', Georgia, 'Times New Roman', serif !important;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="font-body min-h-screen flex flex-col"
    style="background-color: var(--color-background-light); color: var(--color-primary);">
    {{-- Preloader --}}
    <div id="preloader" class="preloader">
        <div class="preloader-inner">
            <img src="{{ asset('images/logo/gold.png') }}" alt="Nesthetix Designs" class="preloader-logo">
            <div class="preloader-bar">
                <div id="preloader-bar-fill" class="preloader-bar-fill"></div>
            </div>
        </div>
    </div>

    {{-- Include Navbar Partial (always included, JavaScript handles visibility on hero pages) --}}
    @include('components.partials.navbar')

    <!-- Main Content -->
    <main class="flex-1">
        {{ $slot }}
    </main>

    {{-- CTA Banner Section --}}
    <x-cta-banner />

    {{-- Contact Section --}}
    <x-contact-section />

    {{-- Include Footer Partial --}}
    @include('components.partials.footer')

    <!-- Animation System (Loaded via app.js) -->


    {{-- Global Consultation Form Lightbox --}}
    <x-consultation-form />

    {{-- Structured Data (JSON-LD) for SEO --}}
    @php
        $interiorDesignService = [
            '@context' => 'https://schema.org',
            '@type' => 'InteriorDesignService',
            'name' => $theme['settings']['site_name'] ?? 'Nesthetix Designs',
            'description' => $description ?? 'Premium interior design studio specializing in luxury residential and commercial spaces. Transform your space with thoughtful design where every detail matters.',
            'url' => url('/'),
            'image' => $ogImage ?? asset('images/og-image.jpg'),
            'serviceType' => [
                'Interior Design',
                'Residential Interior Design',
                'Commercial Interior Design',
                'Luxury Interior Design'
            ],
            'areaServed' => [
                '@type' => 'Place',
                'name' => 'Global'
            ],
            'aggregateRating' => [
                '@type' => 'AggregateRating',
                'ratingValue' => '4.9',
                'reviewCount' => '500'
            ]
        ];
        if (!empty($theme['branding']['logo_primary_url'])) {
            $interiorDesignService['logo'] = $theme['branding']['logo_primary_url'];
        }

        $organization = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $theme['settings']['site_name'] ?? 'Nesthetix Designs',
            'url' => url('/'),
            'description' => 'Premium interior design studio specializing in luxury residential and commercial spaces.',
            'sameAs' => []
        ];
        if (!empty($theme['branding']['logo_primary_url'])) {
            $organization['logo'] = $theme['branding']['logo_primary_url'];
        }
    @endphp
    <script type="application/ld+json">
    {!! json_encode($interiorDesignService, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

    <script type="application/ld+json">
    {!! json_encode($organization, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
</body>

</html>