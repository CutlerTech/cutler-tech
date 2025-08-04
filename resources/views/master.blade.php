<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <meta name="csrf-token" content="{{csrf_token()}}">
    </head>
    <body>
        <header>
            <nav id="navbar">
                <div>
                    <a href="{{route('home')}}"><img src="{{asset('images/logo.svg')}}" alt="Logo" id="logo"></a>
                </div>
                <div id="main-nav">
                    <ul>
                        <li><a href="{{route('about')}}" class="{{request()->routeIs('about') ? 'active' : ''}}">About Us</a></li>
                        <li><a href="{{route('skills')}}" class="{{request()->routeIs('skills') ? 'active' : ''}}">Skills and Tech Stacks</a></li>
                        <li><a href="{{route('projects')}}" class="{{request()->routeIs('projects') ? 'active' : ''}}">Projects</a></li>
                        <li><a href="{{route('requests.create')}}" class="{{request()->routeIs('requests.create') ? 'active' : ''}}">Requests</a></li>
                        @auth
                            @if (Auth::user())
                                <li><a href="{{route('dashboard')}}" class="{{request()->routeIs('dashboard') ? 'active' : ''}}">Dashboard</a></li>
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
    </style>
</html>