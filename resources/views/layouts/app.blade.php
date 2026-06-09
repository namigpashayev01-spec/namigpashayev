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

    // WhatsApp nömrəsi (ölkə kodu + nömrə, "+" və boşluqsuz). Dəyişmək üçün bu sətri redaktə edin.
    $whatsappNumber = '994773151580';
@endphp
<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#9FE870">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,700;12..96,800&family=Sora:wght@600;700;800&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500;600&display=swap">

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

    {{-- Səhifəyə özəl <head> əlavələri (məs. əlavə şriftlər) --}}
    @stack('head')

    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body id="top">

    {{-- Qiymət təklifi modalının açar-bağlayıcısı (JS-siz, checkbox əsaslı).
         Səhvdə və ya uğurda modal yenidən açılsın deyə şərtlə "checked" olur. --}}
    <input type="checkbox" id="quote-toggle" class="quote-toggle" hidden
           @checked($errors->getBag('quote')->isNotEmpty() || session('quote_success'))>

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
                <a href="{{ route('home') }}"     @class(['active' => request()->routeIs('home')])>Ana səhifə</a>
                <a href="{{ route('services') }}" @class(['active' => request()->routeIs('services')])>Xidmətlər</a>
                <a href="{{ route('about') }}"    @class(['active' => request()->routeIs('about')])>Haqqımda</a>
                <a href="{{ route('course') }}"   @class(['active' => request()->routeIs('course')])>Kurs</a>
                <a href="{{ route('blog') }}"     @class(['active' => request()->routeIs('blog*')])>Bloq</a>
                <a href="{{ route('contact') }}"  @class(['active' => request()->routeIs('contact')])>Əlaqə</a>
                <label for="quote-toggle" class="nav-cta quote-open" role="button" tabindex="0">Qiymət təklifi al</label>
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

    {{-- ===== Qiymət təklifi modalı (bütün səhifələrdə əlçatan) ===== --}}
    <div class="quote-modal" role="dialog" aria-modal="true" aria-labelledby="quote-title">
        <label for="quote-toggle" class="quote-overlay" aria-label="Bağla"></label>

        <div class="quote-dialog">
            <span class="quote-deco" aria-hidden="true"></span>
            <label for="quote-toggle" class="quote-close" aria-label="Bağla">&times;</label>

            <p class="quote-eyebrow">Pulsuz · 24 saat ərzində cavab</p>
            <h2 id="quote-title" class="quote-title">Qiymət təklifi al</h2>
            <p class="quote-lead">Layihəniz haqqında qısa məlumat verin — sizə uyğun fərdi təklif hazırlayım.</p>

            @if (session('quote_success'))
                <div class="quote-alert">✓ {{ session('quote_success') }}</div>
            @endif

            <form action="{{ route('quote.send') }}" method="POST" class="quote-form" novalidate>
                @csrf

                <div class="quote-row">
                    <div class="field">
                        <label for="q_name">Ad Soyad *</label>
                        <input type="text" id="q_name" name="q_name" value="{{ old('q_name') }}" placeholder="Adınız">
                        @error('q_name', 'quote') <span class="form-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="field">
                        <label for="q_phone">Telefon</label>
                        <input type="tel" id="q_phone" name="q_phone" value="{{ old('q_phone') }}" placeholder="+994 XX XXX XX XX">
                        @error('q_phone', 'quote') <span class="form-error">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="q_email">E-poçt *</label>
                    <input type="email" id="q_email" name="q_email" value="{{ old('q_email') }}" placeholder="email@example.com">
                    @error('q_email', 'quote') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="quote-row">
                    <div class="field">
                        <label for="q_service">Maraqlandığınız xidmət *</label>
                        <select id="q_service" name="q_service">
                            <option value="">Seçin...</option>
                            @foreach ([
                                'SEO Optimizasiyası',
                                'Sosial Media (SMM)',
                                'Google & Meta Ads',
                                'Veb Sayt Hazırlanması',
                                'Marketinq Strategiyası',
                                'Digər',
                            ] as $svc)
                                <option value="{{ $svc }}" @selected(old('q_service') === $svc)>{{ $svc }}</option>
                            @endforeach
                        </select>
                        @error('q_service', 'quote') <span class="form-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="field">
                        <label for="q_budget">Təxmini büdcə</label>
                        <select id="q_budget" name="q_budget">
                            <option value="">Seçin...</option>
                            @foreach ([
                                '500 ₼-dək',
                                '500 – 1000 ₼',
                                '1000 – 2500 ₼',
                                '2500 ₼+',
                                'Hələ dəqiq deyil',
                            ] as $bdg)
                                <option value="{{ $bdg }}" @selected(old('q_budget') === $bdg)>{{ $bdg }}</option>
                            @endforeach
                        </select>
                        @error('q_budget', 'quote') <span class="form-error">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="q_message">Layihə haqqında *</label>
                    <textarea id="q_message" name="q_message" rows="3" placeholder="Məqsədiniz, hazırkı vəziyyət və gözləntiləriniz...">{{ old('q_message') }}</textarea>
                    @error('q_message', 'quote') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="quote-submit">Təklif sorğusunu göndər →</button>
                <p class="quote-note">Məlumatlarınız yalnız sizinlə əlaqə üçün istifadə olunur.</p>
            </form>
        </div>
    </div>

    {{-- ===== Aşağı hissə ===== --}}
    <footer class="footer">
        <div class="container footer-grid">
            <div class="footer-brand-col">
                <p class="footer-brand">Namig Pashayev</p>
                <p class="footer-muted">Rəqəmsal marketinq üzrə mütəxəssis — SEO, SMM, Google Ads və strategiya ilə biznesinizi onlayn böyüdürəm.</p>
                <div class="footer-social">
                    <a href="https://www.linkedin.com/in/namigpashayev/" target="_blank" rel="noopener" aria-label="LinkedIn">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true"><path d="M20.45 20.45h-3.56v-5.57c0-1.33-.02-3.04-1.85-3.04-1.85 0-2.13 1.45-2.13 2.94v5.67H9.35V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.46v6.28zM5.34 7.43a2.06 2.06 0 1 1 0-4.13 2.06 2.06 0 0 1 0 4.13zM7.12 20.45H3.56V9h3.56v11.45zM22.22 0H1.77C.79 0 0 .77 0 1.73v20.54C0 23.23.79 24 1.77 24h20.45c.98 0 1.78-.77 1.78-1.73V1.73C24 .77 23.2 0 22.22 0z"/></svg>
                    </a>
                    <a href="https://www.instagram.com/" target="_blank" rel="noopener" aria-label="Instagram">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5.5"/><circle cx="12" cy="12" r="4.2"/><circle cx="17.5" cy="6.5" r="1.2" fill="currentColor" stroke="none"/></svg>
                    </a>
                    <a href="https://www.facebook.com/" target="_blank" rel="noopener" aria-label="Facebook">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true"><path d="M22 12.06C22 6.5 17.52 2 12 2S2 6.5 2 12.06c0 5 3.66 9.15 8.44 9.94v-7.03H7.9v-2.9h2.54V9.85c0-2.51 1.49-3.9 3.78-3.9 1.09 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.78-1.63 1.57v1.88h2.78l-.44 2.9h-2.34V22c4.78-.79 8.44-4.94 8.44-9.94z"/></svg>
                    </a>
                    <a href="https://wa.me/{{ $whatsappNumber }}" target="_blank" rel="noopener" aria-label="WhatsApp">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true"><path d="M12.04 2C6.6 2 2.2 6.4 2.2 11.84c0 1.74.46 3.42 1.32 4.9L2 22l5.4-1.42a9.8 9.8 0 0 0 4.64 1.18h.01c5.43 0 9.84-4.4 9.84-9.84 0-2.63-1.02-5.1-2.88-6.96A9.78 9.78 0 0 0 12.04 2Zm5.7 13.9c-.24.67-1.4 1.3-1.94 1.34-.5.08-1.13.1-1.82-.11-.42-.13-.96-.31-1.65-.61-2.9-1.25-4.8-4.17-4.94-4.36-.15-.2-1.19-1.58-1.19-3.01 0-1.43.75-2.13 1.02-2.42.27-.3.58-.37.77-.37l.56.01c.18 0 .42-.07.66.5.24.59.83 2.02.9 2.17.07.15.12.32.02.52-.1.2-.15.32-.3.5-.15.17-.31.39-.44.52-.15.15-.3.3-.13.6.18.29.78 1.28 1.67 2.07 1.15 1.02 2.12 1.34 2.42 1.49.3.15.47.12.65-.07.18-.2.74-.86.94-1.16.2-.3.4-.25.66-.15.27.1 1.7.8 2 .95.3.15.49.22.56.34.07.13.07.72-.17 1.39Z"/></svg>
                    </a>
                </div>
            </div>
            <div>
                <h4>Səhifələr</h4>
                <a href="{{ route('home') }}">Ana səhifə</a>
                <a href="{{ route('services') }}">Xidmətlər</a>
                <a href="{{ route('about') }}">Haqqımda</a>
                <a href="{{ route('course') }}">Kurs</a>
                <a href="{{ route('blog') }}">Bloq</a>
            </div>
            <div>
                <h4>Xidmətlər</h4>
                <a href="{{ route('services') }}">SEO Optimizasiyası</a>
                <a href="{{ route('services') }}">Sosial Media (SMM)</a>
                <a href="{{ route('services') }}">Google &amp; Meta Ads</a>
                <a href="{{ route('services') }}">Marketinq Strategiyası</a>
            </div>
            <div>
                <h4>Əlaqə</h4>
                <a href="mailto:namigpashayev01@gmail.com">namigpashayev01@gmail.com</a>
                <a href="tel:+994773151580">+994 77 315 15 80</a>
                <a href="https://wa.me/{{ $whatsappNumber }}" target="_blank" rel="noopener">WhatsApp ilə yaz</a>
                <a href="{{ route('contact') }}">Əlaqə forması</a>
            </div>
        </div>
        <div class="container footer-bottom">
            <p>&copy; {{ date('Y') }} {{ $siteName }}. Bütün hüquqlar qorunur.</p>
            <a href="#top" class="footer-top-link">Yuxarı qalx ↑</a>
        </div>
    </footer>

    {{-- Üzən WhatsApp əlaqə düyməsi (bütün səhifələrdə) --}}
    <a class="wa-float" href="https://wa.me/{{ $whatsappNumber }}?text={{ rawurlencode('Salam! Rəqəmsal marketinq xidmətləri ilə maraqlanıram.') }}"
       target="_blank" rel="noopener" aria-label="WhatsApp ilə yazın">
        <svg viewBox="0 0 32 32" width="28" height="28" fill="currentColor" aria-hidden="true">
            <path d="M16.04 3C9.4 3 4 8.4 4 15.04c0 2.12.55 4.18 1.6 6L4 29l8.13-1.56a12 12 0 0 0 3.9.66h.01C22.68 28.1 28 22.7 28 16.06 28 9.42 22.68 3 16.04 3Zm0 21.9h-.01a9.9 9.9 0 0 1-3.78-.74l-.27-.11-4.82.93.94-4.7-.18-.29a9.86 9.86 0 0 1-1.51-5.25c0-5.46 4.45-9.9 9.92-9.9 2.65 0 5.13 1.03 7 2.9a9.82 9.82 0 0 1 2.9 7c0 5.46-4.45 9.9-9.92 9.9Zm5.43-7.42c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.96-.94 1.16-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.89-.79-1.49-1.77-1.66-2.07-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.62-.92-2.22-.24-.58-.49-.5-.67-.51l-.57-.01c-.2 0-.52.07-.8.37-.27.3-1.04 1.02-1.04 2.48 0 1.46 1.07 2.88 1.22 3.08.15.2 2.1 3.2 5.08 4.49.71.3 1.26.49 1.7.63.71.22 1.36.19 1.87.12.57-.09 1.76-.72 2-1.41.25-.7.25-1.29.17-1.41-.07-.13-.27-.2-.57-.35Z"/>
        </svg>
        <span class="wa-label">Yazın</span>
    </a>

    {{-- Səhifəyə özəl skriptlər (məs. ana səhifədəki 3D proses vizualı) --}}
    @stack('scripts')

</body>
</html>
