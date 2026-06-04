@extends('layouts.app')

@php
    $courses = [
        ['01', 'Ən Populyar', true,  'Google Tag Manager & Google Analytics', 'GTM quraşdırma, data layer, GA4 konfiqurasiya, hadisə izləmə, Exploration hesabatları.'],
        ['02', 'Reklam',      false, 'Google Ads', 'Search, Display, YouTube, Shopping, Performance Max kampaniyaları.'],
        ['03', 'Yeni',        true,  'No Code Full Stack AI Developer', 'Kod yazmadan AI-powered tətbiqlər qurun. No-code alətlər və avtomatlaşdırma.'],
        ['04', 'Reklam',      false, 'Meta Ads & TikTok Ads', 'Facebook, Instagram və TikTok-da reklam. Hədəfləmə, kreativlər, retargetinq.'],
        ['05', 'SEO',         false, 'SEO', 'Texniki SEO, on-page/off-page, açar söz araşdırması, entity-based SEO.'],
        ['06', 'Yeni',        true,  'AI Automation', 'Make.com, Zapier ilə iş proseslərini avtomatlaşdırın. AI chatbot inteqrasiyası.'],
        ['07', 'Advanced',    true,  'Advanced Tracking & Event', 'Server-side tracking, enhanced e-commerce, consent mode, cross-domain.'],
    ];
    $courseOptions = [
        'GTM & GA4'         => 'Google Tag Manager & Google Analytics',
        'Google Ads'        => 'Google Ads',
        'No Code AI'        => 'No Code Full Stack AI Developer',
        'Meta & TikTok'     => 'Meta Ads & TikTok Ads',
        'SEO'               => 'SEO',
        'AI Automation'     => 'AI Automation',
        'Advanced Tracking' => 'Advanced Tracking & Event',
    ];
@endphp

@push('jsonld')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "Course",
    "name": "Digital Marketing Academy — Rəqəmsal Marketinq Kursları",
    "description": "Google Tag Manager, GA4, Google Ads, Meta Ads, TikTok Ads, SEO, AI Automation və No Code AI Developer kursları.",
    "provider": { "@@type": "Person", "name": "Namig Pashayev", "url": "{{ route('home') }}" },
    "inLanguage": "az-AZ",
    "offers": { "@@type": "Offer", "price": "200", "priceCurrency": "AZN", "category": "Qrupla tədris" }
}
</script>
@endpush

@section('content')
<div class="course-page">

    {{-- HERO --}}
    <section class="course-hero">
        <div class="container">
            <span class="badge"><span class="dot"></span> Qeydiyyat açıqdır</span>
            <h1>Digital Marketing<br><span class="grad-text">Academy</span></h1>
            <p class="course-hero-sub">7 fərqli kurs proqramı. Praktiki tapşırıqlar, real layihələr və sertifikat.</p>

            <div class="hero-actions">
                <a href="#qeydiyyat" class="btn btn-primary">Kursa Qeydiyyat Ol →</a>
                <a href="#kurslar" class="btn btn-ghost">Kursları Gör</a>
            </div>

            <div class="features">
                <div class="feature"><span class="ic">⏱</span><div><div class="ft">4 Ay</div><div class="fs">Təlim müddəti</div></div></div>
                <div class="feature"><span class="ic">📅</span><div><div class="ft">Həftədə 2x</div><div class="fs">19:00 — 21:00</div></div></div>
                <div class="feature"><span class="ic">🎥</span><div><div class="ft">Əyani & Online</div><div class="fs">Video recording</div></div></div>
                <div class="feature"><span class="ic">🏆</span><div><div class="ft">Sertifikat</div><div class="fs">Bitirmə sənədi</div></div></div>
            </div>
        </div>
    </section>

    {{-- 7 KURS --}}
    <section id="kurslar" class="course-section bg-slab">
        <div class="container">
            <div class="sec-head">
                <span class="eyebrow">Kurslar</span>
                <h2>7 Kurs Proqramı</h2>
            </div>
            <div class="course-cards">
                @foreach ($courses as [$no, $label, $hot, $title, $desc])
                    <article class="course-card @if($hot) featured @endif">
                        <div class="course-card-top">
                            <span class="course-pill @unless($hot) course-pill-muted @endunless">{{ $label }}</span>
                            <span class="course-no">{{ $no }}</span>
                        </div>
                        <h3>{{ $title }}</h3>
                        <p>{{ $desc }}</p>
                        <a href="#qeydiyyat" class="course-link">Qeydiyyat →</a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- QİYMƏTLƏR --}}
    <section class="course-section">
        <div class="container">
            <div class="sec-head sec-head-center">
                <span class="eyebrow">Qiymətlər</span>
                <h2>Sizə Uyğun Plan Seçin</h2>
            </div>
            <div class="price-grid">
                <div class="price-card">
                    <span class="price-label">Qrup</span>
                    <h3>Qrupla Tədris</h3>
                    <p class="price-sub">8–12 nəfərlik qrup.</p>
                    <div class="price-amount"><span class="num">200</span><span class="cur">₼</span><span class="per">/ aylıq</span></div>
                    <ul class="price-features">
                        <li><span class="ck">✓</span> 4 aylıq təlim</li>
                        <li><span class="ck">✓</span> Həftədə 2 dəfə</li>
                        <li><span class="ck">✓</span> Əyani & Online</li>
                        <li><span class="ck">✓</span> Video recording + Sertifikat</li>
                    </ul>
                    <a href="#qeydiyyat" class="price-btn price-btn-ghost">Qeydiyyat Ol</a>
                </div>

                <div class="price-card featured">
                    <span class="price-badge">Tövsiyə</span>
                    <span class="price-label">Fərdi</span>
                    <h3>Fərdi Tədris</h3>
                    <p class="price-sub">1-on-1 format, sizin tempinizə uyğun.</p>
                    <div class="price-amount"><span class="num">350</span><span class="cur">₼</span><span class="per">/ aylıq</span></div>
                    <ul class="price-features">
                        <li><span class="ck">✓</span> 4 aylıq təlim</li>
                        <li><span class="ck">✓</span> Həftədə 2 dəfə</li>
                        <li><span class="ck">✓</span> <strong>1-on-1 fərdi diqqət</strong></li>
                        <li><span class="ck">✓</span> Video recording + Sertifikat</li>
                        <li><span class="ck">✓</span> <strong>Fərdi layihə dəstəyi</strong></li>
                    </ul>
                    <a href="#qeydiyyat" class="price-btn price-btn-primary">Qeydiyyat Ol</a>
                </div>
            </div>
        </div>
    </section>

    {{-- QEYDİYYAT FORMU --}}
    <section id="qeydiyyat" class="course-section bg-slab">
        <div class="container container-narrow">
            <div class="sec-head sec-head-center">
                <span class="eyebrow">Qeydiyyat</span>
                <h2>Kursa Qeydiyyat Ol</h2>
                <p class="sec-sub">Formu doldurun, 24 saat ərzində əlaqə saxlayacağıq.</p>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('course.register') }}" method="POST" class="reg-form" novalidate>
                @csrf

                <div class="field">
                    <label for="name">Ad Soyad *</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Adınızı daxil edin">
                    @error('name') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="field">
                    <label for="phone">Telefon *</label>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+994 XX XXX XX XX">
                    @error('phone') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="field">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="email@example.com">
                    @error('email') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="field">
                    <label for="course">Kurs Seçimi *</label>
                    <select id="course" name="course">
                        <option value="">Kurs seçin...</option>
                        @foreach ($courseOptions as $value => $text)
                            <option value="{{ $value }}" @selected(old('course') === $value)>{{ $text }}</option>
                        @endforeach
                    </select>
                    @error('course') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="field">
                    <label>Tədris Formatı *</label>
                    <div class="opt-grid">
                        <label>
                            <input type="radio" name="format" value="Qrup (200₼)" class="opt-radio" @checked(old('format') === 'Qrup (200₼)')>
                            <span class="opt-card"><span class="ot">Qrupla</span><span class="op">200₼ / ay</span></span>
                        </label>
                        <label>
                            <input type="radio" name="format" value="Fərdi (350₼)" class="opt-radio" @checked(old('format') === 'Fərdi (350₼)')>
                            <span class="opt-card"><span class="ot">Fərdi</span><span class="op">350₼ / ay</span></span>
                        </label>
                    </div>
                    @error('format') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="field">
                    <label>İştirak Formatı</label>
                    <div class="opt-grid">
                        <label>
                            <input type="radio" name="location" value="Əyani" class="opt-radio" @checked(old('location') === 'Əyani')>
                            <span class="opt-card"><span class="ot">Əyani</span></span>
                        </label>
                        <label>
                            <input type="radio" name="location" value="Online" class="opt-radio" @checked(old('location') === 'Online')>
                            <span class="opt-card"><span class="ot">Online</span></span>
                        </label>
                    </div>
                </div>

                <div class="field">
                    <label for="note">Əlavə Qeyd</label>
                    <textarea id="note" name="note" rows="3" placeholder="Sualınız və ya əlavə məlumat...">{{ old('note') }}</textarea>
                </div>

                <button type="submit" class="reg-submit">Qeydiyyatı Göndər →</button>
                <p class="form-note">24 saat ərzində sizinlə əlaqə saxlanılacaq.</p>
            </form>
        </div>
    </section>

</div>
@endsection
