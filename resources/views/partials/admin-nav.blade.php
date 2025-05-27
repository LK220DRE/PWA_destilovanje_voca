<nav class="navbar navbar-dark bg-dark navbar-expand-lg mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
            <i class="bi bi-shop"></i> Admin Panel
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="adminNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.products.index') }}">
                        <i class="bi bi-box-seam"></i> Proizvodi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.distilleries.index') }}">
                        <i class="bi bi-building"></i> Destilerije
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link">
                            <i class="bi bi-box-arrow-right"></i> Odjavi se
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>