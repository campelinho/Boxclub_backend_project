<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BoxClub Brussels</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-white min-h-screen">
    <nav class="bg-gray-800 p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ route('homepage') }}" class="text-2xl font-bold">BoxClub Brussels</a>
            <div class="space-x-4">
                <a href="{{ route('nieuws.index') }}">Nieuws</a>
                <a href="{{ route('faq.publiek') }}">FAQ</a>
                @auth
                    <a href="{{ route('profiel.index') }}">Profiel</a>
                    @if(Auth::user()->is_admin)
                        <a href="{{ route('gebruikers.index') }}">Gebruikers</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    @auth
        <div class="bg-green-700 text-white text-center py-2">
            Ingelogd als: <strong>{{ Auth::user()->name }}</strong> 
            ({{ Auth::user()->is_admin ? 'Admin' : 'Gebruiker' }})
        </div>
    @endauth

    <main class="py-6">
        @if(session('success'))
            <div class="max-w-7xl mx-auto px-4 bg-green-600 text-white p-4 rounded">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="max-w-7xl mx-auto px-4 bg-red-600 text-white p-4 rounded">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
