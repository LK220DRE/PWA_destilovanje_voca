@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-6 mb-4">
            <h2 class="mb-4">Kontaktirajte nas</h2>
            <form method="POST" action="{{ route('contact.send') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Ime i prezime</label>
                    <input type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email adresa</label>
                    <input type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Poruka</label>
                    <textarea class="form-control @error('message') is-invalid @enderror"
                        id="message"
                        name="message"
                        rows="5"
                        required>{{ old('message') }}</textarea>
                    @error('message')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Pošalji poruku</button>
            </form>
        </div>

        <div class="col-md-6">
            <h2 class="mb-4">Lokacija</h2>
            <div class="card shadow">
                <div class="card-body p-0">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.345060466021!2d20.45731131553634!3d44.81462997909869!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7aa3d7b53fbd%3A0x1db8645cf2177ee4!2sBelgrade!5e0!3m2!1sen!2srs!4v1623256789014!5m2!1sen!2srs"
                        width="100%"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        class="rounded">
                    </iframe>
                </div>
            </div>

            <div class="mt-4">
                <h4>Kontakt podaci</h4>
                <ul class="list-unstyled">
                    <li><i class="bi bi-geo-alt me-2"></i> Kneza Mihaila 6, Beograd</li>
                    <li><i class="bi bi-telephone me-2"></i> +381 11 123 456</li>
                    <li><i class="bi bi-envelope me-2"></i> lstankovic4122@raf.rs</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection