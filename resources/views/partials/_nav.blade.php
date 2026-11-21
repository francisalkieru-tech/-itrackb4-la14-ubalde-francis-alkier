<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">My Products Lists records</a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}"
                       href="{{ route('products.index') }}">Products</a>
                </li>
            </ul>

            <div class="d-flex align-items-center gap-2">
                @guest
                    <a class="nav-link text-white" href="{{ route('login') }}">Log in</a>
                    <a class="nav-link text-white" href="{{ route('register') }}">Register</a>
                @endguest

                @auth
                    <span class="navbar-text text-white me-2">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-light">Log out</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>