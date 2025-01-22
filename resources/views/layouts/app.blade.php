<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Telegram Clone</a>
            <div class="navbar-nav">
                @auth
                    <a class="nav-link" href="{{ route('channels.index') }}">Каналы</a>
                    <a class="nav-link" href="{{ route('messages') }}">Сообщения</a>
                    <a class="nav-link" href="{{ route('profile') }}">Профиль</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link">Выйти</button>
                    </form>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Войти</a>
                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
