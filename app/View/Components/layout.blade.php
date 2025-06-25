<!DOCTYPE html>
<html>
<head>
    <title>Lotus Isle</title>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}">Home</a>
        @auth
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
            @elseif(auth()->user()->role === 'customer')
                <a href="{{ route('user.dashboard') }}">User Dashboard</a>
            @endif
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </nav>

    <hr>
    <main>
        @yield('content')
    </main>
</body>
</html>