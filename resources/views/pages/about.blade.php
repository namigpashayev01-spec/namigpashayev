@extends('layouts.app')

@section('content')
<div class="about-page">
    <div class="container">

        {{-- Səhifə başlığı --}}
        <header class="about-header">
            <span class="eyebrow">Haqqımda</span>
            <h1>Namig Pashayev</h1>
            <p class="about-tagline">
                Digital Marketing Specialist, veb developer və rəqəmsal strategiya
                məsləhətçisi. <strong>vebsite.az</strong> qurucusu.
            </p>
        </header>

        <div class="about-layout">

            {{-- Sol sütun — foto, statistika, sosial --}}
            <aside class="about-side">
                <div class="about-photo" aria-hidden="true">Şəkil yeri</div>

                <div class="stat-grid">
                    <div class="stat-box"><span class="stat-num">50+</span><span class="stat-label">Layihə</span></div>
                    <div class="stat-box"><span class="stat-num">2+</span><span class="stat-label">İl təcrübə</span></div>
                    <div class="stat-box"><span class="stat-num">30+</span><span class="stat-label">Müştəri</span></div>
                    <div class="stat-box"><span class="stat-num">8</span><span class="stat-label">Kurs modulu</span></div>
                </div>

                <div class="social-row">
                    <a href="https://www.linkedin.com/in/namigpashayev/" target="_blank" rel="noopener">LinkedIn</a>
                    <a href="#" rel="noopener">Instagram</a>
                    <a href="#" rel="noopener">Facebook</a>
                </div>
            </aside>

            {{-- Sağ sütun — bio və detallar --}}
            <div class="about-main">

                {{-- Bio --}}
                <section class="about-block">
                    <h2>Kim mənəm?</h2>
                    <div class="about-bio">
                        <p>Mən Namig Pashayev — rəqəmsal marketinq sahəsində 2+ il təcrübəyə malik mütəxəssisəm. Meta Ads, TikTok Ads, Google Ads, DV360 kimi platformalarda reklam kampaniyalarının idarə edilməsi, veb saytların hazırlanması və marketinq strategiyalarının qurulması ilə məşğulam.</p>
                        <p>vebsite.az şirkətinin qurucusu olaraq, müxtəlif biznes müştərilərinə kompleks rəqəmsal həllər — veb sayt hazırlanması, reklam idarəetməsi, SMM, AI chatbot inteqrasiyası və kontent xidmətləri təqdim edirəm.</p>
                        <p>
                            Peşəkar təcrübəm, layihələrim və yenilikləri LinkedIn-də paylaşıram —
                            əlaqə qurmaq və ya əməkdaşlıq üçün profilimə baxa bilərsiniz:
                        </p>
                        <a href="https://www.linkedin.com/in/namigpashayev/" target="_blank" rel="noopener" class="about-linkedin">
                            <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true"><path d="M20.45 20.45h-3.56v-5.57c0-1.33-.02-3.04-1.85-3.04-1.85 0-2.13 1.45-2.13 2.94v5.67H9.35V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.46v6.28zM5.34 7.43a2.06 2.06 0 1 1 0-4.13 2.06 2.06 0 0 1 0 4.13zM7.12 20.45H3.56V9h3.56v11.45zM22.22 0H1.77C.79 0 0 .77 0 1.73v20.54C0 23.23.79 24 1.77 24h20.45c.98 0 1.78-.77 1.78-1.73V1.73C24 .77 23.2 0 22.22 0z"/></svg>
                            linkedin.com/in/namigpashayev
                        </a>
                    </div>
                </section>

                {{-- Bacarıqlar --}}
                <section class="about-block">
                    <h2>Bacarıqlar</h2>
                    <div class="skills">
                        @foreach ([
                            ['Meta Ads (Facebook & Instagram)', 95],
                            ['Google Ads', 90],
                            ['Google Tag Manager & GA4', 92],
                            ['DV360 (Programmatic)', 85],
                            ['Veb İnkişaf (HTML/CSS/JS)', 88],
                            ['SMM & Kontent Strategiya', 90],
                        ] as [$name, $level])
                            <div class="skill">
                                <div class="skill-head">
                                    <span>{{ $name }}</span>
                                    <span class="skill-pct">{{ $level }}%</span>
                                </div>
                                <div class="skill-bar"><div class="skill-bar-fill" style="width: {{ $level }}%"></div></div>
                            </div>
                        @endforeach
                    </div>
                </section>

                {{-- Karyera --}}
                <section class="about-block">
                    <h2>Karyera</h2>
                    <div class="timeline">
                        <div class="tl-item tl-active">
                            <span class="tl-date">2020 — Hal-hazırda</span>
                            <h3>Qurucu &amp; Digital Marketing Specialist</h3>
                            <p class="tl-company">vebsite.az</p>
                            <p>Veb inkişaf, rəqəmsal reklam, SMM, kontent idarəetmə və AI chatbot xidmətləri. 30+ müştəri ilə uğurlu əməkdaşlıq. GTM &amp; GA4 kursunun yaradılması.</p>
                        </div>
                        <div class="tl-item">
                            <span class="tl-date">2019 — 2020</span>
                            <h3>Digital Marketing Manager</h3>
                            <p>Rəqəmsal marketinq kampaniyalarının planlaşdırılması və icrası, performans analitikası, ROI optimallaşdırma.</p>
                        </div>
                        <div class="tl-item">
                            <span class="tl-date">2018 — 2019</span>
                            <h3>Content Manager &amp; Copywriter</h3>
                            <p>Kontent strategiyası, sosial media idarəetməsi, reklam mətnlərinin yazılması, brend kommunikasiyası.</p>
                        </div>
                    </div>
                </section>

                {{-- Startuplar --}}
                <section class="about-block">
                    <h2>Startuplarım</h2>
                    <div class="startup-grid">
                        <article class="startup-card">
                            <span class="eyebrow">Veb Agentlik</span>
                            <h3>vebsite.az</h3>
                            <p>Veb inkişaf və rəqəmsal marketinq agentliyi.</p>
                        </article>
                        <article class="startup-card">
                            <span class="eyebrow">E-Commerce</span>
                            <h3>ecommerce.vebsite.az</h3>
                            <p>Bizneslər üçün e-commerce platforması.</p>
                        </article>
                        <article class="startup-card">
                            <span class="eyebrow">Təhsil</span>
                            <h3>Digital Marketing Academy</h3>
                            <p>GTM, GA4 üzrə professional kurslar.</p>
                        </article>
                        <article class="startup-card">
                            <span class="eyebrow">AI Həllər</span>
                            <h3>AI Chatbot Service</h3>
                            <p>Instagram DM avtomatlaşdırması.</p>
                        </article>
                    </div>
                </section>

                {{-- Sertifikatlar --}}
                <section class="about-block">
                    <h2>Sertifikatlar</h2>
                    <div class="cert-grid">
                        @foreach ([
                            ['🎯', 'Google Ads Search', 'Google'],
                            ['📊', 'Google Analytics', 'Google'],
                            ['📱', 'Meta Blueprint', 'Meta'],
                            ['🏷️', 'Google Tag Manager', 'Google'],
                            ['📈', 'Google Ads Display', 'Google'],
                            ['🎬', 'Google Ads Video', 'Google'],
                        ] as [$icon, $cert, $org])
                            <div class="cert-card">
                                <div class="cert-icon">{{ $icon }}</div>
                                <div class="cert-name">{{ $cert }}</div>
                                <div class="cert-org">{{ $org }}</div>
                            </div>
                        @endforeach
                    </div>
                </section>

            </div>
        </div>
    </div>

    {{-- CTA --}}
    <section class="about-cta">
        <div class="container">
            <h2>Birlikdə işləyək?</h2>
            <p>Layihənizi müzakirə etmək üçün əlaqə saxlayın.</p>
            <a href="{{ route('contact') }}" class="btn btn-primary">Əlaqə saxla →</a>
        </div>
    </section>
</div>
@endsection
