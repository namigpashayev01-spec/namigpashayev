@extends('layouts.app')

@push('jsonld')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "Blog",
    "name": "Namig Pashayev — Rəqəmsal Marketinq Bloqu",
    "url": "{{ route('blog') }}",
    "inLanguage": "az-AZ",
    "blogPost": [
        @foreach ($posts as $post)
        {
            "@@type": "BlogPosting",
            "headline": "{{ $post['title'] }}",
            "datePublished": "{{ $post['date'] }}",
            "url": "{{ route('blog.show', $post['slug']) }}",
            "author": { "@@type": "Person", "name": "Namig Pashayev" }
        }@if (!$loop->last),@endif
        @endforeach
    ]
}
</script>
@endpush

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="section-title">Bloq</h1>
            <p class="lead">
                Rəqəmsal marketinq, SEO, SMM və reklam üzrə faydalı məqalələr,
                praktiki məsləhətlər və ən son trendlər.
            </p>

            {{-- Axtarış: JS-siz də işləyir (GET), JS varsa yazdıqca anında süzür --}}
            <form class="blog-search" method="GET" action="{{ route('blog') }}" role="search">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/>
                </svg>
                <input type="search" id="blogSearch" name="q" value="{{ $q ?? '' }}"
                       placeholder="Məqalə başlığı ilə axtar..." autocomplete="off" aria-label="Bloqda axtar">
                <button type="submit">Axtar</button>
            </form>

            <div class="blog-list" id="blogList">
                @foreach ($posts as $post)
                    <article class="blog-card" data-search="{{ \Illuminate\Support\Str::lower($post['title'].' '.$post['category']) }}">
                        <div class="blog-meta">
                            <span class="tag">{{ $post['category'] }}</span>
                            <time datetime="{{ $post['date'] }}">{{ \Illuminate\Support\Carbon::parse($post['date'])->translatedFormat('d F Y') }}</time>
                            <span>· {{ $post['read'] }} dəq oxu</span>
                        </div>
                        <h2><a href="{{ route('blog.show', $post['slug']) }}">{{ $post['title'] }}</a></h2>
                        <p>{{ $post['excerpt'] }}</p>
                        <a href="{{ route('blog.show', $post['slug']) }}" class="read-more">Ardını oxu →</a>
                    </article>
                @endforeach
            </div>

            <p class="blog-noresult" id="blogNoResult" @unless(empty($posts)) hidden @endunless>
                “<span id="blogQueryEcho">{{ $q ?? '' }}</span>” üzrə heç bir məqalə tapılmadı.
            </p>
        </div>
    </section>
@endsection

@push('scripts')
<script>
(function () {
    var input = document.getElementById('blogSearch');
    var noRes = document.getElementById('blogNoResult');
    var echo  = document.getElementById('blogQueryEcho');
    if (!input) return;
    var cards = Array.prototype.slice.call(document.querySelectorAll('#blogList .blog-card'));

    input.addEventListener('input', function () {
        var q = input.value.trim().toLowerCase();
        var visible = 0;
        cards.forEach(function (card) {
            var match = !q || (card.getAttribute('data-search') || '').indexOf(q) !== -1;
            card.hidden = !match;
            if (match) visible++;
        });
        if (echo) echo.textContent = input.value.trim();
        noRes.hidden = visible !== 0;
    });
})();
</script>
@endpush
