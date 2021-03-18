<nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
    <div class="container-fluid">
    
        <a class="navbar-brand" href="{{ route('home') }}">IMDB Clone</a>

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user_home') }}">{{ auth()->user()->name }}</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('user_logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="btn">Logout</button>
                    </form>
                </li>
            @endauth
            
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user_login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user_create') }}">Create account</a>
                </li>
            @endguest
        </ul>

        <form class="d-flex">
            <input
                class="form-control me-2"
                type="search"
                placeholder="Search"
                aria-label="Search"
            />
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    
    </div>
</nav>