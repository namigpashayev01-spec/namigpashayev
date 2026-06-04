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

            <div class="blog-list">
                @foreach ($posts as $post)
                    <article class="blog-card">
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
        </div>
    </section>
@endsection
