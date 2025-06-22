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
                <div id="logo">
                    <a href="{{route('home')}}"><img src="" alt="Logo"></a>
                </div>
                <div id="main-nav">
                    <ul>
                        <li><a href="{{route('about')}}">About Us</a></li>
                        <li><a href="{{route('skills')}}">Skills and Tech Stacks</a></li>
                        <li><a href="{{route('projects')}}">Projects</a></li>
                        <li><a href="{{route('requests')}}">Requests</a></li>
                        @auth
                            @if (Auth::user())
                                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                            @endif
                        @endauth
                    </ul>
                </div>
                <div id="auth-nav">
                    @auth
                        <li>
                            <form action="" method="POST">
                                @csrf
                                <button type="submit">Logout</button>
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
            <p>Copyright CutlerTech 2025</p>
        </footer>
    </body>
</html>