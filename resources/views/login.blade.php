@extends('layouts.app')

@section('title', 'Prijava')

@section('content')
<div style="max-width: 400px; margin: 2rem auto;">

    <div style="border: 1px solid #ddd; border-radius: 0.5rem; box-shadow: 0 4px 10px rgba(0,0,0,0.1); padding: 2rem;">
        <div style="text-align: center; margin-bottom: 1rem;">
            <h2 style="font-size: 1.5rem; font-weight: bold;">Prijava</h2>
            <p style="color: #555;">Prijavite se na vaš nalog</p>
        </div>

        {{-- Tabs --}}
        <div style="display: flex; justify-content: space-around; margin-bottom: 1rem;">
            <button type="button" onclick="showTab('client')" id="tab-client" style="padding: 0.5rem 1rem; border: none; background: #030213; color: #fff; border-radius: 0.25rem;">Klijent</button>
            <button type="button" onclick="showTab('carpenter')" id="tab-carpenter" style="padding: 0.5rem 1rem; border: none; background: #eee; color: #333; border-radius: 0.25rem;">Stolar</button>
        </div>

        {{-- Client Login Form --}}
        <form id="client-form" action="{{ route('login') }}" method="POST" style="display: block;">
            @csrf
            <div style="margin-bottom: 1rem;">
                <label for="client-email">Email</label>
                <input type="email" name="email" id="client-email" placeholder="vaš@email.rs" required style="width: 100%; padding: 0.5rem; border-radius: 0.25rem; border: 1px solid #ccc;">
            </div>
            <div style="margin-bottom: 1rem;">
                <label for="client-password">Lozinka</label>
                <input type="password" name="password" id="client-password" placeholder="••••••••" required style="width: 100%; padding: 0.5rem; border-radius: 0.25rem; border: 1px solid #ccc;">
            </div>
            <button type="submit" style="width: 100%; padding: 0.75rem; background: #030213; color: #fff; border: none; border-radius: 0.375rem;">Prijavite se</button>
        </form>

        {{-- Carpenter Login Form --}}
        <form id="carpenter-form" action="{{ route('login') }}" method="POST" style="display: none;">
            @csrf
            <div style="margin-bottom: 1rem;">
                <label for="carpenter-email">Email</label>
                <input type="email" name="email" id="carpenter-email" placeholder="stolar@wooddesign.rs" required style="width: 100%; padding: 0.5rem; border-radius: 0.25rem; border: 1px solid #ccc;">
            </div>
            <div style="margin-bottom: 1rem;">
                <label for="carpenter-password">Lozinka</label>
                <input type="password" name="password" id="carpenter-password" placeholder="••••••••" required style="width: 100%; padding: 0.5rem; border-radius: 0.25rem; border: 1px solid #ccc;">
            </div>
            <button type="submit" style="width: 100%; padding: 0.75rem; background: #030213; color: #fff; border: none; border-radius: 0.375rem;">Prijavite se</button>
        </form>

        {{-- Error --}}
        @if(session('error'))
            <div style="margin-top: 1rem; padding: 0.75rem; background: #fde2e2; color: #d4183d; border-radius: 0.25rem;">
                {{ session('error') }}
            </div>
        @endif

        {{-- Register Link --}}
        <div style="margin-top: 1rem; text-align: center;">
            <p style="font-size: 0.9rem; color: #555;">
                Nemate nalog? <a href="{{ route('register') }}" style="color: #030213; text-decoration: underline;">Registrujte se</a>
            </p>
        </div>
    </div>
</div>

<script>
function showTab(tab) {
    const clientForm = document.getElementById('client-form');
    const carpenterForm = document.getElementById('carpenter-form');
    const clientTab = document.getElementById('tab-client');
    const carpenterTab = document.getElementById('tab-carpenter');

    if(tab === 'client') {
        clientForm.style.display = 'block';
        carpenterForm.style.display = 'none';
        clientTab.style.background = '#030213';
        clientTab.style.color = '#fff';
        carpenterTab.style.background = '#eee';
        carpenterTab.style.color = '#333';
    } else {
        clientForm.style.display = 'none';
        carpenterForm.style.display = 'block';
        clientTab.style.background = '#eee';
        clientTab.style.color = '#333';
        carpenterTab.style.background = '#030213';
        carpenterTab.style.color = '#fff';
    }
}
</script>
@endsection
