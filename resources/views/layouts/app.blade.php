@php
    $siteName    = 'Namig Pashayev';
    $jobTitle    = 'Rəqəmsal Marketinq üzrə Mütəxəssis';
    $title       = $seo['title']       ?? $siteName.' — '.$jobTitle;
    $description  = $seo['description'] ?? 'Namig Pashayev — Rəqəmsal marketinq üzrə mütəxəssis. SEO, SMM, Google Ads və rəqəmsal strategiya xidmətləri.';
    $canonical   = $seo['canonical']   ?? url()->current();
    $ogType      = $seo['og_type']     ?? 'website';
    $ogImage     = $seo['og_image']    ?? asset('images/og-image.png');
    $keywords    = $seo['keywords']    ?? 'rəqəmsal marketinq, SEO, SMM, Google Ads, marketinq mütəxəssisi, Namig Pashayev';
    $breadcrumbs = $seo['breadcrumbs'] ?? [];
@endphp
<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#F97316">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700;800&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500;600&display=swap">

    {{-- ===== Əsas SEO ===== --}}
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">
    <meta name="keywords" content="{{ $keywords }}">
    <link rel="canonical" href="{{ $canonical }}">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="author" content="{{ $siteName }}">

    {{-- ===== Open Graph (Facebook, LinkedIn) ===== --}}
    <meta property="og:type" content="{{ $ogType }}">
    <meta property="og:site_name" content="{{ $siteName }}">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:url" content="{{ $canonical }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:locale" content="az_AZ">

    {{-- ===== Twitter Card ===== --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    {{-- ===== JSON-LD: WebSite (bütün səhifələrdə) ===== --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "WebSite",
        "name": "{{ $siteName }}",
        "url": "{{ route('home') }}",
        "inLanguage": "az-AZ",
        "author": {
            "@@type": "Person",
            "name": "{{ $siteName }}",
            "jobTitle": "{{ $jobTitle }}"
        }
    }
    </script>

    {{-- ===== JSON-LD: BreadcrumbList (daxili səhifələrdə) ===== --}}
    @if (!empty($breadcrumbs))
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "BreadcrumbList",
        "itemListElement": [
            @foreach ($breadcrumbs as $i => $crumb)
            {
                "@@type": "ListItem",
                "position": {{ $i + 1 }},
                "name": "{{ $crumb['name'] }}",
                "item": "{{ $crumb['url'] }}"
            }@if (!$loop->last),@endif
            @endforeach
        ]
    }
    </script>
    @endif

    {{-- Hər səhifə öz struktur datasını (Service, Course, Article və s.) bura əlavə edə bilər --}}
    @stack('jsonld')

    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    {{-- ===== Yuxarı menyu ===== --}}
    <header class="navbar">
        <div class="container nav-inner">
            <a href="{{ route('home') }}" class="logo">
                Namig Pashayev <span class="logo-sub">Rəqəmsal Marketinq</span>
            </a>

            <input type="checkbox" id="nav-toggle" class="nav-toggle" hidden>
            <label for="nav-toggle" class="nav-burger" aria-label="Menyunu aç">
                <span></span><span></span><span></span>
            </label>

            <nav aria-label="Əsas menyu">
                <a href="{{ route('services') }}"  @class(['active' => request()->routeIs('services')])>Xidmətlər</a>
                <a href="{{ route('portfolio') }}" @class(['active' => request()->routeIs('portfolio')])>Portfolio</a>
                <a href="{{ route('about') }}"     @class(['active' => request()->routeIs('about')])>Haqqımda</a>
                <a href="{{ route('course') }}"    @class(['active' => request()->routeIs('course')])>Kurs</a>
                <a href="{{ route('blog') }}"      @class(['active' => request()->routeIs('blog*')])>Bloq</a>
                <a href="{{ route('contact') }}" class="nav-cta" @class(['active' => request()->routeIs('contact')])>Əlaqə</a>
            </nav>
        </div>
    </header>

    {{-- ===== Breadcrumb (vizual + SEO) ===== --}}
    @if (!empty($breadcrumbs))
        <nav class="breadcrumb" aria-label="Naviqasiya yolu">
            <div class="container">
                <ol>
                    @foreach ($breadcrumbs as $crumb)
                        <li>
                            @if (!$loop->last)
                                <a href="{{ $crumb['url'] }}">{{ $crumb['name'] }}</a>
                            @else
                                <span aria-current="page">{{ $crumb['name'] }}</span>
                            @endif
                        </li>
                    @endforeach
                </ol>
            </div>
        </nav>
    @endif

    {{-- ===== Səhifə məzmunu ===== --}}
    <main>
        @yield('content')
    </main>

    {{-- ===== Aşağı hissə ===== --}}
    <footer class="footer">
        <div class="container footer-grid">
            <div>
                <p class="footer-brand">Namig Pashayev</p>
                <p class="footer-muted">Rəqəmsal marketinq üzrə mütəxəssis — SEO, SMM, Google Ads və strategiya.</p>
            </div>
            <div>
                <h4>Səhifələr</h4>
                <a href="{{ route('services') }}">Xidmətlər</a>
                <a href="{{ route('portfolio') }}">Portfolio</a>
                <a href="{{ route('about') }}">Haqqımda</a>
                <a href="{{ route('course') }}">Kurs</a>
                <a href="{{ route('blog') }}">Bloq</a>
            </div>
            <div>
                <h4>Əlaqə</h4>
                <a href="mailto:namigpashayev01@gmail.com">namigpashayev01@gmail.com</a>
                <a href="{{ route('contact') }}">Əlaqə forması</a>
            </div>
        </div>
        <div class="container footer-bottom">
            <p>&copy; {{ date('Y') }} {{ $siteName }}. Bütün hüquqlar qorunur.</p>
        </div>
    </footer>

</body>
</html>
