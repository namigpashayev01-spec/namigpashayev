@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="section-title">Portfolio</h1>
            <p class="lead">
                Müxtəlif sahələrdə həyata keçirdiyim rəqəmsal marketinq layihələri və
                əldə olunan nəticələr. (Nümunələri öz real case-lərinizlə əvəz edin.)
            </p>

            <div class="portfolio-grid">
                <article class="portfolio-item">
                    <div class="portfolio-thumb" aria-hidden="true">SEO</div>
                    <div class="portfolio-body">
                        <span class="tag">SEO</span>
                        <h3>E-ticarət saytının orqanik trafiki</h3>
                        <p>6 ayda orqanik trafik <strong>x3</strong> artdı, açar sözlərin 40+-ı ilk səhifəyə çıxdı.</p>
                    </div>
                </article>

                <article class="portfolio-item">
                    <div class="portfolio-thumb" aria-hidden="true">ADS</div>
                    <div class="portfolio-body">
                        <span class="tag">Google Ads</span>
                        <h3>Xidmət biznesi üçün lead kampaniyası</h3>
                        <p>Klik başına xərc <strong>%35</strong> azaldı, aylıq sorğu sayı 2 dəfə artdı.</p>
                    </div>
                </article>

                <article class="portfolio-item">
                    <div class="portfolio-thumb" aria-hidden="true">SMM</div>
                    <div class="portfolio-body">
                        <span class="tag">SMM</span>
                        <h3>Restoran brendinin sosial mediası</h3>
                        <p>3 ayda Instagram auditoriyası <strong>+12k</strong>, rezervasiyalarda artım.</p>
                    </div>
                </article>

                <article class="portfolio-item">
                    <div class="portfolio-thumb" aria-hidden="true">META</div>
                    <div class="portfolio-body">
                        <span class="tag">Meta Ads</span>
                        <h3>Onlayn kursun satış hunisi</h3>
                        <p>ROAS <strong>4.2x</strong> — reklam xərcinin hər manatına 4.2 manat gəlir.</p>
                    </div>
                </article>

                <article class="portfolio-item">
                    <div class="portfolio-thumb" aria-hidden="true">WEB</div>
                    <div class="portfolio-body">
                        <span class="tag">Strategiya</span>
                        <h3>Startap üçün marketinq planı</h3>
                        <p>Sıfırdan brend strategiyası, kanal seçimi və ilk 6 ayın yol xəritəsi.</p>
                    </div>
                </article>

                <article class="portfolio-item">
                    <div class="portfolio-thumb" aria-hidden="true">CNT</div>
                    <div class="portfolio-body">
                        <span class="tag">Kontent</span>
                        <h3>Bloq vasitəsilə brend etibarı</h3>
                        <p>Aylıq 20+ məqalə strategiyası ilə orqanik gəlişlərdə davamlı artım.</p>
                    </div>
                </article>
            </div>

            <div class="cta-band cta-inline">
                <h2>Növbəti uğur hekayəsi sizin ola bilər</h2>
                <p>Layihənizi danışaq və real nəticələrə birlikdə çataq.</p>
                <a href="{{ route('contact') }}" class="btn btn-light">Layihəni başlat</a>
            </div>
        </div>
    </section>
@endsection
