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
        <div class="container">
            <div class="contact2">
                {{-- Sol: başlıq + əlaqə kanalları --}}
                <aside class="contact2-aside">
                    <p class="page-eyebrow">Əlaqə</p>
                    <h1 class="page-title">Layihənizi birlikdə <span class="hl">danışaq</span></h1>
                    <p class="page-lead">
                        Sualınız və ya əməkdaşlıq təklifiniz var? Formanı doldurun —
                        ilk konsultasiya pulsuzdur, tezliklə cavab verəcəyəm.
                    </p>

                    <div class="contact-methods">
                        <a class="contact-method" href="mailto:namigpashayev01@gmail.com">
                            <span class="cm-icon">✉️</span>
                            <span class="cm-text">
                                <span class="cm-label">E-poçt</span>
                                <span class="cm-value">namigpashayev01@gmail.com</span>
                            </span>
                        </a>
                        <div class="contact-method">
                            <span class="cm-icon">⚡</span>
                            <span class="cm-text">
                                <span class="cm-label">Cavab müddəti</span>
                                <span class="cm-value">Adətən 24 saat ərzində</span>
                            </span>
                        </div>
                        <a class="contact-method" href="https://www.linkedin.com/in/namigpashayev/" target="_blank" rel="noopener">
                            <span class="cm-icon">in</span>
                            <span class="cm-text">
                                <span class="cm-label">LinkedIn</span>
                                <span class="cm-value">linkedin.com/in/namigpashayev</span>
                            </span>
                        </a>
                    </div>
                </aside>

                {{-- Sağ: forma kartı --}}
                <div class="contact2-card">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('contact.send') }}" method="POST" class="contact-form" novalidate>
                        @csrf

                        <div class="form-group">
                            <label for="name">Adınız</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Adınız və soyadınız" required>
                            @error('name') <span class="form-error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">E-poçt</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="email@example.com" required>
                            @error('email') <span class="form-error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="message">Mesajınız</label>
                            <textarea id="message" name="message" rows="5" placeholder="Layihəniz və ya sualınız haqqında..." required>{{ old('message') }}</textarea>
                            @error('message') <span class="form-error">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary contact-submit">Mesajı göndər →</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
