<!DOCTYPE html>
<html lang="ru" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        [data-bs-theme="dark"] {
            filter: invert(0.9) hue-rotate(180deg);
        }
        [data-bs-theme="dark"] img, 
        [data-bs-theme="dark"] video {
            filter: invert(1) hue-rotate(180deg);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <audio id="messageNotification">
    <source src="/sounds/NotificationMessage.mp3" type="audio/mpeg">
    <source src="/sounds/NotificationMessage.ogg" type="audio/ogg">
</audio>

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
                
                <div class="form-check form-switch nav-link">
                    <input 
                        class="form-check-input" 
                        type="checkbox" 
                        id="darkModeSwitch"
                    >
                    <label class="form-check-label" for="darkModeSwitch">
                        Темная тема
                    </label>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('darkModeSwitch').addEventListener('change', function() {
            const htmlTag = document.documentElement;
            if (this.checked) {
                htmlTag.setAttribute('data-bs-theme', 'dark');
                localStorage.setItem('theme', 'dark');
            } else {
                htmlTag.setAttribute('data-bs-theme', 'light');
                localStorage.setItem('theme', 'light');
            }
        });

        // Восстановление темы при перезагрузке
        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme');
            const darkModeSwitch = document.getElementById('darkModeSwitch');
            
            if (savedTheme === 'dark') {
                document.documentElement.setAttribute('data-bs-theme', 'dark');
                darkModeSwitch.checked = true;
            }
        });

        
    </script>
    
<script src="{{ asset('js/notification.js') }}"></script>
</body>
</html>
