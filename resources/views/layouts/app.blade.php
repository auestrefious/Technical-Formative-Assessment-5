<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sharkbyte POS keeps customer contacts and crew accounts within easy reach. Stay sharp and keep your crew close.">
    <meta name="theme-color" content="#101116">
    <title>@yield('title', 'Home') | Sharkbyte POS</title>
    <link rel="stylesheet" href="{{ asset('css/pos.css') }}">
</head>
<body>
    <a class="skip-link" href="#main-content">Skip to content</a>

    <header class="site-header">
        <div class="header-inner">
            <a class="brand" href="{{ route('home') }}" aria-label="Sharkbyte POS home">
                <span class="brand-mark" aria-hidden="true">S</span>
                <span>SHARKBYTE<span class="brand-suffix">POS</span></span>
            </a>

            <nav class="navigation" aria-label="Main navigation">
                <a href="{{ route('home') }}" @if(request()->routeIs('home')) aria-current="page" @endif>Home</a>
                <a href="{{ route('about') }}" @if(request()->routeIs('about')) aria-current="page" @endif>About</a>
                <a href="{{ route('customers.index') }}" @if(request()->routeIs('customers.index')) aria-current="page" @endif>Customer Accounts</a>
                <a href="{{ route('users.index') }}" @if(request()->routeIs('users.index')) aria-current="page" @endif>User Accounts</a>
            </nav>
        </div>
    </header>

    <main id="main-content" class="container" tabindex="-1">
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="footer-inner">
            <span>&copy; {{ date('Y') }} SHARKBYTE POS</span>
            <span class="footer-tagline">Stay sharp. Keep your crew close.</span>
        </div>
    </footer>
</body>
</html>
