<nav class="navbar navbar-expand-lg navbar-light nav-container p-3">
    <a class="navbar-brand" href="http://imdb-clone-dev.herokuapp.com">IMDb</a>
    <div class="menu">
        <div class="ham-menu">
            <div class="ham"></div>
            <div class="ham"></div>
            <div class="ham"></div>
        </div>
            <p> Menu </p>
    </div>

    <div class="input-group">
        {{-- Filtering might be a later option --}}
        {{-- <div class="input-group-prepend">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Movies</a>
                    <a class="dropdown-item" href="#">Most watch</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
        </div> --}}

        <input
            id="search-field"
            type="text"
            class="search-input"
            aria-label="Text input with dropdown button" placeholder="Search IMDb">
        {{-- <button class="btn" type="button" id="button-addon2">🔍</button> --}}
    </div>

    <ul class="navbar-nav sign-flex mb-2 mb-lg-0">
        <li class="nav-item">
            <button class="imdb-pro">IMDbPro</button>
        </li>
        <li class="nav-item">
            <button class="watch-list"> Watchlist</button>
        </li>
    
    @auth
        <li class="nav-item">
            <button class="nav-link">
                <a href="{{ route('user_home') }}">{{ auth()->user()->name }}
                </a>
            </button>
        </li>
        <li class="nav-item">
            <form action="{{ route('user_logout') }}">
                <button class="nav-link" type="submit">Logout</button>
            </form>
        </li>
    @endauth
    @guest
        {{-- Don't use forms for login and create re-routes. We only user form for logout because we want CSRF --}}
        <li class="nav-item">
            <button class="btn-secondary">
                <a href="{{ route('user_login') }}">Login</a>
            </button>
        </li>
        <li class="nav-item">
            <button class="btn-secondary">
                <a href="{{ route('user_create') }}">Sign up</a>
            </button>
        </li>
    @endguest
    </ul>
</nav>

{{-- Search results section --}}
<div class="container mt-0 p-0">
    <div id="search-results" class="row m-0 mb-4"></div>
</div>
