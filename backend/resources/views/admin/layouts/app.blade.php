@include('partials.head')
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('admin.projects.index') }}">Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="adminNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}" href="{{ route('admin.projects.index') }}">Projects</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}">Services</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}" href="{{ route('admin.posts.index') }}">Posts</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}" href="{{ route('admin.testimonials.index') }}">Testimonials</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.team-members.*') ? 'active' : '' }}" href="{{ route('admin.team-members.index') }}">Team</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">Users</a></li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item"><form method="POST" action="{{ route('logout') }}">@csrf<button class="btn btn-outline-light">Logout</button></form></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <main class="col-12 py-4">
            @yield('content')
        </main>
    </div>
</div>
@include('partials.footer')
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
    @stack('scripts')
</body>
