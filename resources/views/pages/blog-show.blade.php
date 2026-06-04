@extends('layouts.app')

@push('jsonld')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "BlogPosting",
    "headline": "{{ $post['title'] }}",
    "description": "{{ $post['excerpt'] }}",
    "datePublished": "{{ $post['date'] }}",
    "inLanguage": "az-AZ",
    "articleSection": "{{ $post['category'] }}",
    "author": { "@@type": "Person", "name": "Namig Pashayev", "url": "{{ route('home') }}" },
    "publisher": { "@@type": "Person", "name": "Namig Pashayev" },
    "mainEntityOfPage": { "@@type": "WebPage", "@@id": "{{ route('blog.show', $post['slug']) }}" }
}
</script>
@endpush

@section('content')
    <article class="section">
        <div class="container container-narrow">
            <div class="blog-meta">
                <span class="tag">{{ $post['category'] }}</span>
                <time datetime="{{ $post['date'] }}">{{ \Illuminate\Support\Carbon::parse($post['date'])->translatedFormat('d F Y') }}</time>
                <span>· {{ $post['read'] }} dəq oxu</span>
            </div>

            <h1 class="post-title">{{ $post['title'] }}</h1>

            <div class="prose">
                @foreach ($post['body'] as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>

            <div class="post-footer">
                <a href="{{ route('blog') }}" class="read-more">← Bütün məqalələr</a>
                <a href="{{ route('contact') }}" class="btn btn-primary">Konsultasiya al</a>
            </div>
        </div>
    </article>
@endsection
