<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Blog</title>
        <link href="{{ asset('frontend/css/styles.css') }}" rel="stylesheet" />
    </head>

    <body>
        
        {{-- Navbar --}}
        @include('layouts.navbar')

        {{-- Header --}}
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Selamat datang di halaman Blog</h1>
                    <p class="lead mb-0">Halaman blog selalu update berita atau informasi terbaru</p>
                </div>
            </div>
        </header>
        
        {{-- Content --}}
        <div class="container">
            @yield('content')
        </div>

        <!-- Footer-->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('frontend/js/scripts.js') }}"></script>
    </body>
</html>