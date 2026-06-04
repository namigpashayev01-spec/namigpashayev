@extends('layouts.app')

@push('jsonld')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "ContactPage",
    "name": "Əlaqə — Namig Pashayev",
    "url": "{{ route('contact') }}",
    "mainEntity": {
        "@@type": "Person",
        "name": "Namig Pashayev",
        "jobTitle": "Rəqəmsal Marketinq üzrə Mütəxəssis",
        "email": "namigpashayev01@gmail.com"
    }
}
</script>
@endpush

@section('content')
    <section class="section">
        <div class="container container-narrow">
            <h1 class="section-title">Əlaqə</h1>
            <p class="lead">
                Layihəniz, sualınız və ya əməkdaşlıq təklifiniz var? Formanı doldurun —
                ilk konsultasiya pulsuzdur, tezliklə cavab verəcəyəm.
            </p>

            {{-- Uğur mesajı --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Server-side əlaqə forması --}}
            <form action="{{ route('contact.send') }}" method="POST" class="contact-form" novalidate>
                @csrf

                <div class="form-group">
                    <label for="name">Adınız</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="email">E-poçt</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="message">Mesajınız</label>
                    <textarea id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                    @error('message') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Göndər</button>
            </form>

            <div class="contact-info">
                <p>📧 <a href="mailto:namigpashayev01@gmail.com">namigpashayev01@gmail.com</a></p>
                <p>🌐 namigpashayev.com</p>
            </div>
        </div>
    </section>
@endsection
