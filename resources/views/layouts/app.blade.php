<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title', 'Stolarska')</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/modern-normalize/modern-normalize.css">
  <style>body{font-family:Arial,Helvetica,sans-serif;padding:20px;} .nav{margin-bottom:20px;} .nav a{margin-right:10px;}</style>
</head>
<body>
  <div class="nav">
    <a href="{{ url('/') }}">Home</a>
    <a href="{{ route('zahtevi.index') }}">Zahtevi</a>
    <a href="{{ route('termini.index') }}">Termini</a>
    <a href="{{ route('narudzbine.index') }}">Narudžbine</a>
    <a href="{{ route('klijenti.index') }}">Klijenti</a>
  </div>

  @if(session('success')) <div style="color:green">{{ session('success') }}</div> @endif

  @yield('content')
</body>
</html>
