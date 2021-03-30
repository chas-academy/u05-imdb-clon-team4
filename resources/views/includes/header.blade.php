<nav class="navbar sticky-top bg-primary navbar-dark navbar-expand-md p-2">
    <div class="container-fluid">
        <a class="navbar-brand bg-silver p-1 text-primary rounded-3 ms-3" href="{{ route('page_home') }}">IMDb</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <form class="d-flex my-3 my-md-0 w-50">
                <input id="search-field" type="text" class="form-control border-0 p-1" aria-label="Search" placeholder="Search IMDb">
            </form>
            <ul class="navbar-nav mb-2 mb-md-0 gap-3">
                <li class="nav-item">
                    <a href="{{ route('user_home') }}" class="nav-link header-link">
                        Watchlist
                    </a>
                </li>
            @auth
                <li class="nav-item">
                    <a href="{{ route('user_home') }}" class="fw-bold nav-link header-link">
                        {{ auth()->user()->name }}
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('user_logout') }}">
                        @csrf
                        <button class="nav-link header-link" type="submit">Logout</button>
                    </form>
                </li>
            @endauth
            @guest
                {{-- Don't use forms for login and create re-routes. We only user form for logout because we want CSRF --}}
                <li class="nav-item">
                    <a href="{{ route('user_login') }}" class="nav-link header-link">
                        Login
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user_create') }}" class="nav-link header-link">
                        Sign up
                    </a>
                </li>
            @endguest
            </ul>
        </div>
    </div>
</nav>

{{-- Search results section --}}
<div class="container mt-0 p-0">
    <div id="search-results" class="row m-0 mb-4"></div>
</div>
