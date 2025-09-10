@extends('layouts.app')

@section('title', 'Registracija')

@section('content')
<div style="max-width: 400px; margin: 2rem auto;">

    <div style="border: 1px solid #ddd; border-radius: 0.5rem; box-shadow: 0 4px 10px rgba(0,0,0,0.1); padding: 2rem;">
        <div style="text-align: center; margin-bottom: 1rem;">
            <h2 style="font-size: 1.5rem; font-weight: bold;">Registracija</h2>
            <p style="color: #555;">Napravite novi nalog kao klijent</p>
        </div>

        <form action="{{ route('register') }}" method="POST" style="display: block;">
            @csrf
            <div style="margin-bottom: 1rem;">
                <label for="name">Ime i prezime</label>
                <input type="text" name="name" id="name" placeholder="Marko Marković" required 
                    style="width: 100%; padding: 0.5rem; border-radius: 0.25rem; border: 1px solid #ccc;">
            </div>
            <div style="margin-bottom: 1rem;">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="vaš@email.rs" required 
                    style="width: 100%; padding: 0.5rem; border-radius: 0.25rem; border: 1px solid #ccc;">
            </div>
            <div style="margin-bottom: 1rem;">
                <label for="password">Lozinka</label>
                <input type="password" name="password" id="password" placeholder="••••••••" required 
                    style="width: 100%; padding: 0.5rem; border-radius: 0.25rem; border: 1px solid #ccc;">
            </div>
            <div style="margin-bottom: 1rem;">
                <label for="password_confirmation">Potvrdite lozinku</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" required 
                    style="width: 100%; padding: 0.5rem; border-radius: 0.25rem; border: 1px solid #ccc;">
            </div>

            {{-- Error messages --}}
            @if ($errors->any())
                <div style="margin-bottom: 1rem; padding: 0.75rem; background: #fde2e2; color: #d4183d; border-radius: 0.25rem;">
                    <ul style="margin: 0; padding-left: 1.2rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit" style="width: 100%; padding: 0.75rem; background: #030213; color: #fff; border: none; border-radius: 0.375rem;">Registrujte se</button>
        </form>

        <div style="margin-top: 1rem; text-align: center;">
            <p style="font-size: 0.9rem; color: #555;">
                Već imate nalog? <a href="{{ route('login') }}" style="color: #030213; text-decoration: underline;">Prijavite se</a>
            </p>
        </div>
    </div>
</div>
@endsection
