<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Shop' }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
          crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-success mb-lg-4">
        <a class="navbar-link text-dark" href="{{ route('index') }}">Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbar-example" aria-controls="navbar-example"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-example">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('catalog.index') }}">Brands</a>
                </li>

            </ul>


            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('catalog.contact') }}">Contacts</a>
                </li>

            </ul>


            <form action="{{ route('catalog.search') }}" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" name="query"
                       placeholder="Search" aria-label="Search">
                <button class="form-control btn text-light bg-danger" value=""><span class="fa fa-search"></span>
                </button>
            </form>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item" id="top-basket">

                    <a class="nav-link"
                       href="{{ route('basket.index') }}">
                        <p class="fa fa-shopping-cart text-dark"></p>

                    </a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('user.login') }}">Sign in</a>
                    </li>
                    @if (Route::has('user.register'))
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('user.register') }}">Sign Up</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('user.index') }}">My profile</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-9">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible mt-0" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ $message }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible mt-4" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
