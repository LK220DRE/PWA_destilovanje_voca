<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Destilacija Voća</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Home link -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Početna</a>
                </li>

                <!-- Catalog link -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('catalog') }}">Katalog</a>
                </li>

                <!-- Contact link -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Kontakt</a>
                </li>

                @auth
                    <!-- Dashboard dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Proverite da li je admin -->
                            @if(Auth::user()->role === 'admin')
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Panel</a></li>
                            @endif
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Profil</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Odjavi se</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <!-- Login/Register links -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Prijava</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registracija</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>