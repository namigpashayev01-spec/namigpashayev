@php
    $siteName = 'Namig Pashayev';
    $title       = $seo['title']       ?? $siteName;
    $description = $seo['description']  ?? 'Namig Pashayevin rəsmi şəxsi saytı.';
    $canonical   = $seo['canonical']   ?? url()->current();
    $ogImage     = asset('images/og-image.png');
@endphp
<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- ===== Əsas SEO ===== --}}
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">
    <link rel="canonical" href="{{ $canonical }}">
    <meta name="robots" content="index, follow">
    <meta name="author" content="{{ $siteName }}">

    {{-- ===== Open Graph (Facebook, LinkedIn) ===== --}}
    <meta property="og:type" content="website">
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

    {{-- ===== JSON-LD struktur datası (Person) ===== --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Person",
        "name": "Namig Pashayev",
        "url": "{{ route('home') }}",
        "email": "namigpashayev01@gmail.com",
        "jobTitle": "Mütəxəssis"
    }
    </script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    {{-- ===== Yuxarı menyu ===== --}}
    <header class="navbar">
        <div class="container nav-inner">
            <a href="{{ route('home') }}" class="logo">Namig Pashayev</a>
            <nav aria-label="Əsas menyu">
                <a href="{{ route('home') }}"     @class(['active' => request()->routeIs('home')])>Ana səhifə</a>
                <a href="{{ route('about') }}"    @class(['active' => request()->routeIs('about')])>Haqqımda</a>
                <a href="{{ route('services') }}" @class(['active' => request()->routeIs('services')])>Xidmətlər</a>
                <a href="{{ route('contact') }}"  @class(['active' => request()->routeIs('contact')])>Əlaqə</a>
            </nav>
        </div>
    </header>

    {{-- ===== Səhifə məzmunu ===== --}}
    <main>
        @yield('content')
    </main>

    {{-- ===== Aşağı hissə ===== --}}
    <footer class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} {{ $siteName }}. Bütün hüquqlar qorunur.</p>
        </div>
    </footer>

</body>
</html>
