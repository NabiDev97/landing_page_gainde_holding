<!doctype html>
<html lang="fr">

@include('partials.head')

<body>
    @include('partials.navbar')

    <main class="py-4">
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="{{ secure_asset('js/main.js') }}"></script>
    <script src="{{ secure_asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ secure_asset('lib/lightbox/js/lightbox.min.js') }}"></script>
</body>

</html>
