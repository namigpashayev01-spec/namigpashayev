@extends('layouts.app')

@push('jsonld')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "ItemList",
    "name": "Rəqəmsal Marketinq Xidmətləri",
    "itemListElement": [
        { "@@type": "Service", "position": 1, "name": "SEO Optimizasiyası", "serviceType": "SEO", "provider": { "@@type": "Person", "name": "Namig Pashayev" } },
        { "@@type": "Service", "position": 2, "name": "Sosial Media İdarəetməsi (SMM)", "serviceType": "SMM", "provider": { "@@type": "Person", "name": "Namig Pashayev" } },
        { "@@type": "Service", "position": 3, "name": "Google & Meta Ads", "serviceType": "PPC Reklam", "provider": { "@@type": "Person", "name": "Namig Pashayev" } },
        { "@@type": "Service", "position": 4, "name": "Marketinq Strategiyası", "serviceType": "Strategiya", "provider": { "@@type": "Person", "name": "Namig Pashayev" } }
    ]
}
</script>
@endpush

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="section-title">Xidmətlər</h1>
            <p class="lead">
                Biznesinizin onlayn böyüməsi üçün uçdan-uca rəqəmsal marketinq xidmətləri.
                Hər layihəni ölçülə bilən nəticələrə fokuslanaraq aparıram.
            </p>

            <div class="cards">
                <article class="card">
                    <h3>SEO Optimizasiyası</h3>
                    <p>Texniki audit, açar söz araşdırması, on-page və link strategiyası ilə Google-da davamlı orqanik trafik.</p>
                </article>
                <article class="card">
                    <h3>Sosial Media (SMM)</h3>
                    <p>Instagram, Facebook və TikTok üçün məzmun planı, idarəetmə və icma qurma.</p>
                </article>
                <article class="card">
                    <h3>Google Ads</h3>
                    <p>Axtarış, display və YouTube reklamları — yüksək konversiya, aşağı klik xərci.</p>
                </article>
                <article class="card">
                    <h3>Meta Ads (Facebook/Instagram)</h3>
                    <p>Hədəflənmiş reklam kampaniyaları, retargeting və satış hunisinin qurulması.</p>
                </article>
                <article class="card">
                    <h3>Kontent Marketinq</h3>
                    <p>Bloq, məqalə və vizual məzmun strategiyası ilə brend etibarının artırılması.</p>
                </article>
                <article class="card">
                    <h3>Marketinq Strategiyası</h3>
                    <p>Rəqib analizi, auditoriya seqmentasiyası və büdcəyə uyğun ümumi rəqəmsal plan.</p>
                </article>
            </div>

            <div class="cta-band cta-inline">
                <h2>Hansı xidmət sizə uyğundur?</h2>
                <p>Gəlin biznesinizi qısa danışaq və ən təsirli kanalları seçək.</p>
                <a href="{{ route('contact') }}" class="btn btn-light">Pulsuz konsultasiya al</a>
            </div>
        </div>
    </section>
@endsection
