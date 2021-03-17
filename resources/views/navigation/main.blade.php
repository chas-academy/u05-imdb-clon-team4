
<nav class="navbar navbar-expand-lg navbar-light nav-container p-3">

    <div class="container-fluid">
    
        <a class="navbar-brand" href="{{ route('home') }}">IMDB Clonen</a>

        <form class="d-flex">
            <input
                class="form-control me-2"
                type="search"
                placeholder="Search"
                aria-label="Search"
            />
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

    
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


    
    </div>
</nav>
