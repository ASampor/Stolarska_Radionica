<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Wood Design Cicka')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('head') {{-- This allows individual pages to add their own CSS or scripts --}}

</head>
<body>
    <header>
        <h1>Wood Design Cicka</h1>
        <nav>
            <a href="{{ route('pocetna') }}">Početna</a>
            <a href="{{ route('register') }}">Registracija</a>
            <a href="{{ route('login') }}">Prijava</a>
            
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
