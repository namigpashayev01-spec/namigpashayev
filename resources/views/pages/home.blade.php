@extends('layouts.app')

@push('jsonld')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "Person",
    "name": "Namig Pashayev",
    "jobTitle": "Rəqəmsal Marketinq üzrə Mütəxəssis",
    "url": "{{ route('home') }}",
    "email": "namigpashayev01@gmail.com",
    "knowsAbout": ["SEO", "SMM", "Google Ads", "Rəqəmsal Marketinq Strategiyası", "Kontent Marketinq"],
    "sameAs": []
}
</script>
@endpush

@section('content')
    {{-- Hero --}}
    <section class="hero">
        <div class="container">
            <p class="hero-greeting">Salam, mən Namig Pashayev</p>
            <h1>Rəqəmsal Marketinq üzrə Mütəxəssis</h1>
            <p class="hero-sub">
                Biznesinizi onlayn böyüdürəm — SEO, sosial media və ödənişli reklamlarla
                daha çox müştəri və real satış.
            </p>
            <div class="hero-buttons">
                <a href="{{ route('contact') }}" class="btn btn-primary">Pulsuz konsultasiya</a>
                <a href="{{ route('portfolio') }}" class="btn btn-outline">Layihələrə bax</a>
            </div>

            <ul class="hero-stats">
                <li><strong>5+</strong><span>il təcrübə</span></li>
                <li><strong>50+</strong><span>layihə</span></li>
                <li><strong>x3</strong><span>orta trafik artımı</span></li>
            </ul>
        </div>
    </section>

    {{-- Xidmətlərin qısa təqdimatı --}}
    <section class="section">
        <div class="container">
            <h2 class="section-title">Nə işlə məşğulam?</h2>
            <p class="lead">
                Rəqəmsal marketinqin ən təsirli kanallarını birləşdirərək brendinizi
                hədəf auditoriyaya çatdırıram və nəticəni rəqəmlərlə ölçürəm.
            </p>
            <div class="cards">
                <article class="card">
                    <h3>SEO Optimizasiyası</h3>
                    <p>Saytınızı Google-da üst sıralara çıxarıram — texniki SEO, açar söz araşdırması və keyfiyyətli məzmun.</p>
                </article>
                <article class="card">
                    <h3>Sosial Media (SMM)</h3>
                    <p>Instagram və Facebook-da auditoriya qururam, məzmun planı hazırlayır və satışa çevirirəm.</p>
                </article>
                <article class="card">
                    <h3>Google &amp; Meta Ads</h3>
                    <p>Büdcənizi sərf etmədən maksimum konversiya verən hədəflənmiş reklam kampaniyaları.</p>
                </article>
            </div>
            <div class="center-link">
                <a href="{{ route('services') }}" class="btn btn-outline">Bütün xidmətlər</a>
            </div>
        </div>
    </section>

    {{-- İş prosesi --}}
    <section class="section section-alt">
        <div class="container">
            <h2 class="section-title">İş prosesim</h2>
            <div class="steps">
                <div class="step"><span class="step-num">1</span><h3>Analiz</h3><p>Biznes və rəqiblərin araşdırılması, hədəflərin müəyyən edilməsi.</p></div>
                <div class="step"><span class="step-num">2</span><h3>Strategiya</h3><p>Auditoriya, kanallar və büdcəyə uyğun marketinq planı.</p></div>
                <div class="step"><span class="step-num">3</span><h3>İcra</h3><p>Kampaniyaların qurulması, məzmun və reklamların işə salınması.</p></div>
                <div class="step"><span class="step-num">4</span><h3>Optimizasiya</h3><p>Nəticələrin ölçülməsi və daimi yaxşılaşdırma.</p></div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="cta-band">
        <div class="container">
            <h2>Layihənizi birlikdə böyüdək</h2>
            <p>İlk konsultasiya pulsuzdur. Gəlin hədəflərinizi danışaq.</p>
            <a href="{{ route('contact') }}" class="btn btn-light">Əlaqə saxla</a>
        </div>
    </section>
@endsection
