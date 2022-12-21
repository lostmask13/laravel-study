<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('main') }}">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('contact') }}">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('sign-up.form') }}">Sign Up</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login-history') }}">Login history</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Sign In</a>
                </li>

                @if (auth()->check())
                    @can('create', \App\Models\Movie::class)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('movie.create') }}">Add movie</a>
                        </li>
                    @endcan

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('movie.list') }}">Movies</a>
                    </li>

                    @can('create', \App\Models\Genre::class)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('genres.create.genre') }}">Add Genre</a>
                        </li>
                    @endcan

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('genres.list') }}">Genres</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('actors.create.actor') }}">Add Actor</a>
                    </li>
                @endcan

                @can('create', \App\Models\Actor::class)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('actors.list') }}">Actors</a>
                    </li>

                @endif

                @if (auth()->check())
                    <form action="{{ route('logout') }}" method="post" class="form-inline">
                        @csrf
                        <button class="btn btn-danger">Log out</button>
                    </form>
                @endif

            </ul>
        </div>
    </div>
</nav>
<div class="container">
    @include('flash-message')
    @yield('content')
</div>

</body>
</html>
