@extends('layouts.app')

@section('content')
    {{-- Hero --}}
    <section class="hero">
        <div class="container">
            <p class="hero-greeting">Salam, mən</p>
            <h1>Namig Pashayev</h1>
            <p class="hero-sub">Şəxsi saytıma xoş gəlmisiniz.</p>
            <div class="hero-buttons">
                <a href="{{ route('contact') }}" class="btn btn-primary">Əlaqə saxla</a>
                <a href="{{ route('services') }}" class="btn btn-outline">Xidmətlər</a>
            </div>
        </div>
    </section>

    {{-- Qısa təqdimat --}}
    <section class="section">
        <div class="container">
            <h2 class="section-title">Qısa məlumat</h2>
            <p class="lead">
                Bu mətni öz təqdimatınızla əvəz edin — kim olduğunuzu və nə işlə
                məşğul olduğunuzu bir-iki cümlə ilə yazın.
            </p>
            <div class="cards">
                <article class="card">
                    <h3>Təcrübə</h3>
                    <p>Sahənizdəki təcrübəniz haqqında qısa məlumat.</p>
                </article>
                <article class="card">
                    <h3>Keyfiyyət</h3>
                    <p>İşinizin keyfiyyəti və yanaşmanız haqqında.</p>
                </article>
                <article class="card">
                    <h3>Etibar</h3>
                    <p>Müştərilərinizlə qurduğunuz etibar haqqında.</p>
                </article>
            </div>
        </div>
    </section>
@endsection
