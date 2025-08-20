<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="csrf-token" content="{{csrf_token()}}">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
    </head>
    <body>
        <header>
            <nav id="navbar">
                <div>
                    <a href="{{route('home')}}"><img src="{{asset('images/logo.svg')}}" alt="Logo" id="logo"></a>
                </div>
                <div class="hamburger" id="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div id="main-nav">
                    <ul>
                        <li><a href="{{route('about')}}" class="{{request()->routeIs('about') ? 'active' : ''}}">About Us</a></li>
                        <li><a href="{{route('skills')}}" class="{{request()->routeIs('skills') ? 'active' : ''}}">Skills and Tech Stacks</a></li>
                        <li><a href="{{route('requests.create')}}" class="{{request()->routeIs('requests.create') ? 'active' : ''}}">Requests</a></li>
                        @auth
                            @if (Auth::user())
                                <li><a href="{{route('dashboard')}}" class="{{request()->routeIs('dashboard') ? 'active' : ''}}">Dashboard</a></li>
                                <li class="notification-menu">
                                    <a href="{{route('notifications.index')}}" class="{{request()->routeIs('notifications.*') ? 'active' : ''}}">
                                        <i class="fas fa-bell"></i>
                                        @if(Auth::user()->unreadNotifications->count() > 0)
                                            <span class="notification-badge">{{Auth::user()->unreadNotifications->count()}}</span>
                                        @endif
                                    </a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                </div>
                <div id="auth-nav">
                    @auth
                        <span>Welcome back, {{Auth::user()->name}}!</span>
                        <li>
                            <form action="{{route('logout')}}" method="POST" id="logout">
                                @csrf
                                <button type="submit" class="btn btn-outline">Logout</button>
                            </form>
                        </li>
                    @endauth
                </div>
            </nav>
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            <p>Copyright CutlerTech 2025 &copy;</p>
            <p>For inquiry questions, please reach out over email to <a id="footer-email" href="mailto:calexcutler@gmail.com">calexcutler@gmail.com</a>.</p>
        </footer>
    </body>
    <style>
        #logout {
            background-color: #00F0FF;
            border: none;
        }
        #logout button {
            margin: auto;
            background-color: #00FF81;
        }
        #footer-email {
            color: #FF6800;
        }
        .notification-menu {
            position: relative;
        }
        .notification-badge {
            position: absolute;
            top: -8px;
            right: -10px;
            background-color: #ff4757;
            color: white;
            border-radius: 50%;
            min-width: 18px;
            height: 18px;
            font-size: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        .alert {
            margin: 0;
            border-radius: 0;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hamburger = document.getElementById('hamburger');
            const mainNav = document.getElementById('main-nav');
            hamburger.addEventListener('click', function() {
                hamburger.classList.toggle('active');
                mainNav.classList.toggle('active');
            });
            const navLinks = mainNav.querySelectorAll('a');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    hamburger.classList.remove('active');
                    mainNav.classList.remove('active');
                });
            });
            document.addEventListener('click', function(event) {
                if (!hamburger.contains(event.target) && !mainNav.contains(event.target)) {
                    hamburger.classList.remove('active');
                    mainNav.classList.remove('active');
                }
            });
        });
    </script>
</html>