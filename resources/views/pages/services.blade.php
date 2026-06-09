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
            <header class="page-head">
                <p class="page-eyebrow">Xidmətlər</p>
                <h1 class="page-title">Biznesinizi onlayn <span class="hl">böyüdən</span> xidmətlər</h1>
                <p class="page-lead">
                    Uçdan-uca rəqəmsal marketinq — hər layihəni ölçülə bilən nəticələrə
                    fokuslanaraq aparıram. Aşağıda ən çox müraciət olunan xidmətlər.
                </p>
            </header>

            <div class="svc-grid">
                @foreach ([
                    ['🔍', 'SEO Optimizasiyası', 'Texniki audit, açar söz araşdırması, on-page və link strategiyası ilə Google-da davamlı orqanik trafik.'],
                    ['📱', 'Sosial Media (SMM)', 'Instagram, Facebook və TikTok üçün məzmun planı, idarəetmə və icma qurma.'],
                    ['🎯', 'Google Ads', 'Axtarış, display və YouTube reklamları — yüksək konversiya, aşağı klik xərci.'],
                    ['📢', 'Meta Ads', 'Hədəflənmiş Facebook/Instagram kampaniyaları, retargeting və satış hunisinin qurulması.'],
                    ['✍️', 'Kontent Marketinq', 'Bloq, məqalə və vizual məzmun strategiyası ilə brend etibarının artırılması.'],
                    ['🧭', 'Marketinq Strategiyası', 'Rəqib analizi, auditoriya seqmentasiyası və büdcəyə uyğun ümumi rəqəmsal plan.'],
                ] as $i => [$icon, $title, $desc])
                    <article class="svc-card">
                        <div class="svc-top">
                            <span class="svc-icon">{{ $icon }}</span>
                            <span class="svc-no">{{ sprintf('%02d', $i + 1) }}</span>
                        </div>
                        <h3>{{ $title }}</h3>
                        <p>{{ $desc }}</p>
                        <span class="svc-arrow" aria-hidden="true">→</span>
                    </article>
                @endforeach
            </div>

            <div class="cta-band cta-inline">
                <h2>Hansı xidmət sizə uyğundur?</h2>
                <p>Gəlin biznesinizi qısa danışaq və ən təsirli kanalları seçək.</p>
                <a href="{{ route('contact') }}" class="btn btn-light">Pulsuz konsultasiya al</a>
            </div>
        </div>
    </section>
@endsection
