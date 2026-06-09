@extends('layouts.app')

@push('head')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,700;12..96,800&display=swap">
@endpush

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
<div class="home-v2">

    {{-- ===================== HERO ===================== --}}
    <section class="hx">
        <div class="hx-bg" aria-hidden="true">
            <span class="hx-blob hx-blob-1"></span>
            <span class="hx-blob hx-blob-2"></span>
            <span class="hx-grid"></span>
            <span class="hx-grain"></span>
        </div>

        <div class="container hx-inner">
            <div class="hx-copy">
                <p class="hx-eyebrow"><span class="hx-dot"></span> Rəqəmsal Marketinq · Bakı</p>

                <h1 class="hx-title">
                    Brendinizi onlayn
                    <span class="hx-underline">böyüdən</span>
                    sistem qururam.
                </h1>

                <p class="hx-sub">
                    SEO, sosial media və ödənişli reklamları bir strategiyada birləşdirib
                    biznesinizə <strong>daha çox müştəri və real satış</strong> gətirirəm —
                    nəticəni isə həmişə rəqəmlərlə ölçürəm.
                </p>

                <div class="hx-actions">
                    <a href="{{ route('contact') }}" class="hx-btn hx-btn-primary">
                        Pulsuz konsultasiya
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                    </a>
                    <a href="{{ route('portfolio') }}" class="hx-btn hx-btn-ghost">Layihələrə bax</a>
                </div>

                <ul class="hx-trust">
                    <li>Google Ads sertifikatlı</li>
                    <li>Meta Blueprint</li>
                    <li>5+ il sahə təcrübəsi</li>
                </ul>
            </div>

            <aside class="hx-panel" aria-hidden="true">
                <div class="hx-card hx-card-main">
                    <span class="hx-card-label">Orta nəticə</span>
                    <span class="hx-card-big">×3.2</span>
                    <span class="hx-card-note">12 ay ərzində üzvi trafik artımı</span>
                    <div class="hx-spark">
                        <span style="height:28%"></span><span style="height:44%"></span>
                        <span style="height:38%"></span><span style="height:62%"></span>
                        <span style="height:55%"></span><span style="height:80%"></span>
                        <span style="height:72%"></span><span style="height:100%"></span>
                    </div>
                </div>
                <div class="hx-card hx-card-a">
                    <span class="hx-card-num">50+</span>
                    <span class="hx-card-sm">tamamlanmış layihə</span>
                </div>
                <div class="hx-card hx-card-b">
                    <span class="hx-card-num">−38%</span>
                    <span class="hx-card-sm">orta reklam xərci</span>
                </div>
            </aside>
        </div>
    </section>

    {{-- ===================== MARQUEE ===================== --}}
    <div class="hx-marquee" aria-hidden="true">
        <div class="hx-marquee-track">
            @for ($i = 0; $i < 2; $i++)
                <span>SEO</span><i>✦</i>
                <span>Sosial Media</span><i>✦</i>
                <span>Google Ads</span><i>✦</i>
                <span>Meta Ads</span><i>✦</i>
                <span>Analitika</span><i>✦</i>
                <span>Kontent Strategiyası</span><i>✦</i>
                <span>Konversiya</span><i>✦</i>
                <span>Brendinq</span><i>✦</i>
            @endfor
        </div>
    </div>

    {{-- ===================== XİDMƏTLƏR ===================== --}}
    <section class="hx-services">
        <div class="container">
            <header class="hx-sechead reveal">
                <p class="hx-kicker">01 — Xidmətlər</p>
                <h2>Nə işlə məşğulam?</h2>
                <p class="hx-lead">
                    Rəqəmsal marketinqin ən təsirli kanallarını birləşdirərək brendinizi
                    hədəf auditoriyaya çatdırır və nəticəni ölçürəm.
                </p>
            </header>

            <div class="hx-svc-grid">
                <article class="hx-svc hx-svc-feat reveal">
                    <span class="hx-svc-no">S1</span>
                    <h3>SEO Optimizasiyası</h3>
                    <p>
                        Saytınızı Google-da üst sıralara çıxarıram — texniki SEO, açar söz
                        araşdırması və axtarış niyyətinə uyğun keyfiyyətli məzmun ilə.
                    </p>
                    <ul class="hx-svc-tags">
                        <li>Texniki audit</li><li>Açar sözlər</li><li>Link strategiyası</li>
                    </ul>
                    <a href="{{ route('services') }}" class="hx-svc-link">Ətraflı oxu →</a>
                </article>

                <article class="hx-svc reveal" style="--d:.06s">
                    <span class="hx-svc-no">S2</span>
                    <h3>Sosial Media (SMM)</h3>
                    <p>Instagram və Facebook-da auditoriya qurur, məzmun planı hazırlayır və izləyicini müştəriyə çevirirəm.</p>
                    <a href="{{ route('services') }}" class="hx-svc-link">Ətraflı oxu →</a>
                </article>

                <article class="hx-svc reveal" style="--d:.12s">
                    <span class="hx-svc-no">S3</span>
                    <h3>Google &amp; Meta Ads</h3>
                    <p>Büdcəni boş yerə xərcləmədən maksimum konversiya verən hədəflənmiş reklam kampaniyaları.</p>
                    <a href="{{ route('services') }}" class="hx-svc-link">Ətraflı oxu →</a>
                </article>

                <article class="hx-svc reveal" style="--d:.18s">
                    <span class="hx-svc-no">S4</span>
                    <h3>Analitika &amp; Hesabat</h3>
                    <p>GA4, Search Console və reklam panellərini bir yerə yığıb hər ay aydın, rəqəm əsaslı hesabat verirəm.</p>
                    <a href="{{ route('services') }}" class="hx-svc-link">Ətraflı oxu →</a>
                </article>
            </div>
        </div>
    </section>

    {{-- ===================== PROSES ===================== --}}
    <section class="hx-process">
        <div class="container">
            <header class="hx-sechead hx-sechead-light reveal">
                <p class="hx-kicker">02 — İş prosesim</p>
                <h2>Xaosdan deyil, sistemdən başlayıram</h2>
            </header>

            <ol class="hx-steps">
                <li class="hx-step reveal">
                    <span class="hx-step-no">01</span>
                    <div><h3>Analiz</h3><p>Biznes, rəqib və auditoriyanın araşdırılması, hədəflərin müəyyən edilməsi.</p></div>
                </li>
                <li class="hx-step reveal" style="--d:.08s">
                    <span class="hx-step-no">02</span>
                    <div><h3>Strategiya</h3><p>Kanallara, auditoriyaya və büdcəyə uyğun ölçüləbilən marketinq planı.</p></div>
                </li>
                <li class="hx-step reveal" style="--d:.16s">
                    <span class="hx-step-no">03</span>
                    <div><h3>İcra</h3><p>Kampaniyaların qurulması, məzmun və reklamların işə salınması.</p></div>
                </li>
                <li class="hx-step reveal" style="--d:.24s">
                    <span class="hx-step-no">04</span>
                    <div><h3>Optimizasiya</h3><p>Nəticələrin ölçülməsi və daimi yaxşılaşdırma — daha çox nəticə, daha az xərc.</p></div>
                </li>
            </ol>
        </div>
    </section>

    {{-- ===================== NƏTİCƏLƏR ===================== --}}
    <section class="hx-metrics">
        <div class="container hx-metrics-grid">
            <div class="hx-metric reveal"><strong>50+</strong><span>tamamlanmış layihə</span></div>
            <div class="hx-metric reveal" style="--d:.08s"><strong>×3.2</strong><span>orta trafik artımı</span></div>
            <div class="hx-metric reveal" style="--d:.16s"><strong>5+</strong><span>il təcrübə</span></div>
            <div class="hx-metric reveal" style="--d:.24s"><strong>98%</strong><span>müştəri məmnunluğu</span></div>
        </div>
    </section>

    {{-- ===================== CTA ===================== --}}
    <section class="hx-cta">
        <div class="hx-cta-glow" aria-hidden="true"></div>
        <div class="container hx-cta-inner">
            <p class="hx-kicker">Növbəti addım</p>
            <h2>Layihənizi birlikdə böyüdək.</h2>
            <p class="hx-cta-sub">İlk konsultasiya tamamilə pulsuzdur. Gəlin hədəflərinizi danışaq və real plan quraq.</p>
            <a href="{{ route('contact') }}" class="hx-btn hx-btn-primary hx-btn-lg">
                Əlaqə saxla
                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
        </div>
    </section>

</div>
@endsection
