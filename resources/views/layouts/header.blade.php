<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IMDB Clonen</title>
    {{-- Bootstrap --}}
    {{-- Scripts --}}
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    {{-- Styles --}}
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/e7d0d2ed9d.js" crossorigin="anonymous"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-light nav-container p-3">

        <a class="navbar-brand" href="{{ route('home') }}">IMDb</a>
        
        <div class="menu">
        <div class="ham-menu">
        <div class="ham"></div>
        <div class="ham"></div>
        <div class="ham"></div>
        </div>
        <p> Menu </p>
        </div>
        
        
            <div class="input-group">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                </div>
                <input type="text" class="search-input" aria-label="Text input with dropdown button" placeholder="Search IMDb">
                <button class="btn" type="button" id="button-addon2">🔍</button>

            </div>
            <ul class="navbar-nav sign-flex mb-2 mb-lg-0">
           <li class="nav-item">
            <button class="imdb-pro">IMDbPro</button>
            </li>
            <li class="nav-item">
            <div class="divider"><div>
            </li>
            <li class="nav-item">
            <button class="watch-list"> Watchlist</button>
            </li>
                    @auth
                        <li class="nav-item">
                            <a class="signin-link" href="{{ route('user_home') }}">{{ auth()->user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('user_logout') }}" class="inline">
                                <button type="submit" class="btn">Logout</button>
                            </form>
                        </li>
                    @endauth
            </div>

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user_login') }}">Login</a>
                        </li>

                    <!--    <li class="nav-item">
                            <a class="nav-link" href="{{ route('user_create') }}">Create account</a>
                        </li> -->
                    @endguest
                </ul>

</nav>