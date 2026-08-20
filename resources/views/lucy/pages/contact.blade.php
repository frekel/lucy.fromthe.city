@extends('layouts.lucy')

@section('title', 'Contact | Lucy-Rhea')

@section('content')
    <section class="story">
        <header class="story-header">
            <p class="eyebrow">Pagina</p>
            <h1>Contact</h1>
            <p>&nbsp;</p>
        </header>

        @if (session('contact_success'))
            <div class="contact-feedback contact-feedback--success">
                {{ session('contact_success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="contact-feedback contact-feedback--error">
                <p>Controleer het formulier en probeer het opnieuw.</p>
            </div>
        @endif

        <form class="contact-card" action="{{ route('lucy.contact.submit') }}" method="post">
            @csrf
            <label>
                <span>Je naam</span>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Naam" required>
                @error('name')
                    <small class="contact-error">{{ $message }}</small>
                @enderror
            </label>
            <label>
                <span>Je e-mail</span>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="E-mailadres" required>
                @error('email')
                    <small class="contact-error">{{ $message }}</small>
                @enderror
            </label>
            <label>
                <span>Onderwerp</span>
                <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Onderwerp" required>
                @error('subject')
                    <small class="contact-error">{{ $message }}</small>
                @enderror
            </label>
            <label>
                <span>Je bericht</span>
                <textarea name="message" rows="6" placeholder="Bericht" required>{{ old('message') }}</textarea>
                @error('message')
                    <small class="contact-error">{{ $message }}</small>
                @enderror
            </label>

            <div class="contact-honeypot" aria-hidden="true">
                <label>
                    <span>Website</span>
                    <input type="text" name="website" tabindex="-1" autocomplete="off">
                </label>
            </div>

            <button type="submit">Verzenden</button>
        </form>
    </section>
@endsection