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
    "sameAs": ["https://www.linkedin.com/in/namigpashayev/"]
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
                    <a href="{{ route('services') }}" class="hx-btn hx-btn-ghost">Xidmətlərə bax</a>
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

    {{-- ===================== PROSES (scroll ilə fırlanan tək 3D kür) ===================== --}}
    <section class="hx-proc2" id="proses">
        <div class="hx-proc2-track">
            <div class="hx-proc2-sticky">
                <div class="container">
                    <header class="hx-proc2-head reveal">
                        <p class="hx-kicker">02 — İş prosesim</p>
                        <h2>Xaosdan deyil, sistemdən başlayıram</h2>
                        <p class="hx-proc2-hint">↓ Sürüşdürün — kür fırlandıqca hər mərhələ açılır</p>
                    </header>

                    <div class="hx-proc2-grid">
                        {{-- 3D vizual (yalnız desktop + WebGL) --}}
                        <div class="hx-proc2-visual">
                            <canvas id="process-canvas" class="hx-proc2-canvas" aria-hidden="true"></canvas>
                            <div class="hx-proc2-progress" role="tablist" aria-label="Mərhələ naviqasiyası">
                                <button type="button" class="hx-proc2-dot is-active" data-go="0" aria-label="Analiz"></button>
                                <button type="button" class="hx-proc2-dot" data-go="1" aria-label="Strategiya"></button>
                                <button type="button" class="hx-proc2-dot" data-go="2" aria-label="İcra"></button>
                                <button type="button" class="hx-proc2-dot" data-go="3" aria-label="Optimizasiya"></button>
                            </div>
                        </div>

                        {{-- Mərhələ məlumatları (3D rejimdə crossfade, mobildə siyahı) --}}
                        <ol class="hx-proc2-panels">
                            <li class="hx-proc2-panel is-active" data-stage="0">
                                <span class="hx-proc2-no">01</span>
                                <h3>Analiz</h3>
                                <p>Biznes, rəqib və auditoriyanın araşdırılması, hədəflərin müəyyən edilməsi.</p>
                            </li>
                            <li class="hx-proc2-panel" data-stage="1">
                                <span class="hx-proc2-no">02</span>
                                <h3>Strategiya</h3>
                                <p>Kanallara, auditoriyaya və büdcəyə uyğun ölçüləbilən marketinq planı.</p>
                            </li>
                            <li class="hx-proc2-panel" data-stage="2">
                                <span class="hx-proc2-no">03</span>
                                <h3>İcra</h3>
                                <p>Kampaniyaların qurulması, məzmun və reklamların işə salınması.</p>
                            </li>
                            <li class="hx-proc2-panel" data-stage="3">
                                <span class="hx-proc2-no">04</span>
                                <h3>Optimizasiya</h3>
                                <p>Nəticələrin ölçülməsi və daimi yaxşılaşdırma — daha çox nəticə, daha az xərc.</p>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
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

    {{-- ===================== LEAD MAGNET (pulsuz material) ===================== --}}
    <section class="hx-lead" id="material">
        <div class="container">
            <div class="lm-card reveal">
                <div class="lm-offer">
                    <span class="lm-badge">Pulsuz</span>
                    <span class="lm-icon" aria-hidden="true">📋</span>
                    <h2>SEO Audit Checklist</h2>
                    <p>Saytınızı Google üçün yoxlamağa imkan verən 25 addımlıq praktiki bələdçi.</p>
                    <ul class="lm-points">
                        <li>Texniki SEO yoxlaması</li>
                        <li>On-page optimizasiya addımları</li>
                        <li>Sürət və mobil uyğunluq</li>
                    </ul>
                </div>

                <div class="lm-form-wrap">
                    @if (session('lead_success'))
                        <div class="lm-success">
                            <span class="lm-success-ic">✓</span>
                            <p>{{ session('lead_success') }}</p>
                        </div>
                    @else
                        <h3>Pulsuz əldə edin</h3>
                        <p class="lm-sub">E-poçtunuzu yazın — checklist dərhal sizə göndərilsin.</p>

                        <form method="POST" action="{{ route('lead.subscribe') }}" class="lm-form" novalidate>
                            @csrf
                            <input type="text" name="lead_name" value="{{ old('lead_name') }}" placeholder="Adınız (istəyə bağlı)" aria-label="Adınız">
                            <input type="email" name="lead_email" value="{{ old('lead_email') }}" placeholder="E-poçt ünvanınız" aria-label="E-poçt" required>
                            @error('lead_email', 'lead') <span class="form-error">{{ $message }}</span> @enderror
                            <button type="submit" class="btn btn-primary">Checklist-i göndər →</button>
                            <p class="lm-note">Spam yox. İstədiyiniz vaxt abunəlikdən çıxa bilərsiniz.</p>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== BLOQ ===================== --}}
    <section class="hx-blog">
        <div class="container">
            <header class="hx-sechead hx-blog-head reveal">
                <div>
                    <p class="hx-kicker">03 — Bloq</p>
                    <h2>Son məqalələr</h2>
                </div>
                <a href="{{ route('blog') }}" class="hx-btn hx-btn-ghost hx-blog-all">Bütün məqalələr →</a>
            </header>

            <div class="hx-blog-grid">
                @foreach ($posts as $i => $post)
                    <article class="hx-blog-card reveal" style="--d:{{ $i * 0.08 }}s">
                        <a href="{{ route('blog.show', $post['slug']) }}" class="hx-blog-banner" aria-hidden="true" tabindex="-1">
                            <span class="hx-blog-watermark">{{ \Illuminate\Support\Str::limit($post['category'], 12, '') }}</span>
                            <div class="hx-blog-banner-row">
                                <span class="hx-blog-cat">{{ $post['category'] }}</span>
                                <span class="hx-blog-read">{{ $post['read'] }} dəq oxu</span>
                            </div>
                        </a>
                        <div class="hx-blog-body">
                            <time class="hx-blog-date" datetime="{{ $post['date'] }}">{{ \Illuminate\Support\Carbon::parse($post['date'])->translatedFormat('d F Y') }}</time>
                            <h3><a href="{{ route('blog.show', $post['slug']) }}">{{ $post['title'] }}</a></h3>
                            <p>{{ $post['excerpt'] }}</p>
                            <a href="{{ route('blog.show', $post['slug']) }}" class="hx-blog-link">
                                <span>Ardını oxu</span>
                                <span class="hx-blog-arrow" aria-hidden="true">→</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
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

@push('scripts')
{{-- 3D proses vizualı (Three.js). Mobil cihazlarda skript özü işə düşmür. --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="{{ asset('js/process-3d.js') }}" defer></script>
@endpush
