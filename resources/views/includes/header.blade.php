
<nav class="navbar navbar-expand-lg navbar-light nav-container p-3">
    <a class="navbar-brand" href="{{ route('page_home') }}">IMDb</a>
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
                            <a class="dropdown-item" href="#">Movies</a>
                            <a class="dropdown-item" href="#">Most watch</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div role="sepa<!--  -->rator" class="dropdown-divider"></div>
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
                    <div class="divider"></div>
                </li>
                <li class="nav-item">
                    <button class="watch-list"> Watchlist</button>
                </li>
            
            @auth
                <li class="nav-item">
                    <form action="{{ route('user_home') }}" class="signin-link">{{ auth()->user()->name }}
                </li>
                <li class="nav-item">
                    <form action="{{ route('user_logout') }}" class="inline">
                        <button type="submit" class="btn">Logout</button>
                    </form>
                        </li>
            @endauth
            @guest
                <li class="nav-item">
                    <form action="{{ route('user_login') }}" class="nav-link">
                        <button type="submit" class="btn-secondary">Login</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="{{ route('user_create') }}" class="nav-link">
                        <button type="submit" class="btn-secondary">Sign Up</button>
                    </form>
                </li>
            @endguest
            </ul>
</nav>
