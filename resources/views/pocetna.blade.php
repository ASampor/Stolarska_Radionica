@extends('layouts.app')

@section('title', 'Početna')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/pocetna.css') }}">
@endsection

@section('content')
<div class="home-page">

    {{-- Hero Section --}}
    <section class="hero">
        <div class="hero-image">
            <img src="{{ asset('images/kuhinja.jpg') }}" alt="Kuhinja">

        </div>
        <div>
            <h1>Wood Design Cicka</h1>
            <p>
                Naš informacioni sistem omogućava vam da brzo i jednostavno pošaljete zahtev za izradu nekog nameštaja/proizvoda po meri i pratite status vaše porudžbine.
            </p>
            <p>
                Registrujte se i započnite saradnju sa pouzdanim i iskusnim timom stolara!
            </p>
            <a href="{{ auth()->check() ? route('new-request') : route('login') }}">
                Pošaljite zahtev za ponudu →
            </a>
        </div>
    </section>

    {{-- Features Section --}}
    <section class="features">
        <div class="feature-card">
            <h3>✔ Kvalitet</h3>
            <p>Koristimo samo najkvalitetniji materijal i vrhunsku stolarijsku tehniku za dugotrajne rezultate.</p>
        </div>
        <div class="feature-card">
            <h3>⏱ Brzina</h3>
            <p>Posvećeni smo poštovanju rokova i brzoj realizaciji vaših projekata bez kompromisa u kvalitetu.</p>
        </div>
        <div class="feature-card">
            <h3>👥 Iskustvo</h3>
            <p>Sa godinama iskustva u oblasti stolarije, garantujemo profesionalnu uslugu i zadovoljstvo kupaca.</p>
        </div>
    </section>

    {{-- Services Section --}}
    <section class="services">
        <div style="text-align: center;">
            <h2>Naše usluge</h2>
            <p>Nudimo širok spektar stolarijskih usluga prilagođenih vašim potrebama</p>
        </div>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
            @foreach([
                'Kuhinje po meri',
                'Spavaće sobe',
                'Dnevni boravci',
                'Garderoberi',
                'Kancelarijski nameštaj',
                'Vrata i prozori',
                'Terase i pergole',
                'Posebni zahtevi'
            ] as $service)
                <div>{{ $service }}</div>
            @endforeach
        </div>
    </section>

</div>
@endsection
