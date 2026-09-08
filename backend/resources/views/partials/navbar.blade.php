<!-- Topbar + Navbar -->
<div class="container-fluid px-5 d-none d-lg-block">
    <div class="row gx-5">
        <div class="col-lg-4 text-center py-3">
            <div class="d-inline-flex align-items-center">
                <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                <div class="text-start">
                    <h6 class="text-uppercase fw-bold">Notre Bureau</h6>
                    <span>Colobane, Dakar, Sénégal</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 text-center border-start border-end py-3">
            <div class="d-inline-flex align-items-center">
                <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                <div class="text-start">
                    <h6 class="text-uppercase fw-bold">Envoyez-nous un email</h6>
                    <span>info@gaindeholding.com</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 text-center py-3">
            <div class="d-inline-flex align-items-center">
                <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                <div class="text-start">
                    <h6 class="text-uppercase fw-bold">Appelez-nous</h6>
                    <span>+221 77 781 95 95</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid sticky-top bg-dark bg-light-radial shadow-sm px-5 pe-lg-0">
    <nav class="navbar navbar-expand-lg bg-dark bg-light-radial navbar-dark py-3 py-lg-0">
        <a href="/" class="navbar-brand">
            <h1 class="m-0 display-4 text-uppercase text-white"><img src="{{ secure_asset('img/logo.png') }}" alt="GAÏNDE-HOLDING" style="height: 70px; margin-right: 15px;">GAÏNDE-HOLDING</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ route('home') }}#home" class="nav-item nav-link">Accueil</a>
                <a href="{{ route('home') }}#about" class="nav-item nav-link">À propos</a>
                <a href="{{ route('home') }}#services" class="nav-item nav-link">Services</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ route('home') }}#projects" class="dropdown-item">Nos Projets</a>
                        <a href="{{ route('home') }}#team" class="dropdown-item">L'équipe</a>
                        <a href="{{ route('home') }}#testimonials" class="dropdown-item">Témoignages</a>
                        <a href="{{ route('blog.index') }}" class="dropdown-item {{ request()->routeIs('blog.*') ? 'active' : '' }}">Blog</a>
                        <a href="{{ route('detail') }}" class="dropdown-item {{ request()->routeIs('detail') ? 'active' : '' }}">Détail du blog</a>
                    </div>
                </div>
                <a href="{{ route('home') }}#contact" class="nav-item nav-link">Contact</a>
                <a href="{{ route('home') }}#quote" class="nav-item nav-link bg-primary text-white px-5 ms-3 d-none d-lg-block">Obtenir un devis <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </nav>
</div>
