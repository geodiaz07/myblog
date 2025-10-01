<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="MyBlog - Home" />

    <!-- Favicon - Using a generic placeholder -->
    <link rel="icon" href="https://placehold.co/16x16/0000FF/FFFFFF?text=My" type="image/x-icon" />
    <link rel="shortcut icon" href="https://placehold.co/16x16/0000FF/FFFFFF?text=My" type="image/x-icon" />

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- Custom CSS -->
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
            /* Apply Inter font family */
            font-family: var(--tblr-font-sans-serif);
        }

        /* Hero Section Modern */
        .hero-section {
            background: linear-gradient(rgba(25, 135, 84, 0.7), rgba(13, 110, 253, 0.7)), url('https://wallpapercave.com/wp/wp10992174.png');
            /* Gradien modern dengan overlay */
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            /* Padding lebih sedikit */
            text-align: center;
            border-radius: 0 0 15px 15px;
            /* Sudut membulat di bagian bawah */
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 400px;
            /* Tinggi minimal */
        }

        .hero-section h1 {
            font-size: 3rem;
            /* Ukuran font lebih kecil */
            margin-bottom: 15px;
            font-weight: 700;
        }

        .hero-section p {
            font-size: 1rem;
            /* Ukuran font lebih kecil */
            margin-bottom: 25px;
            color: white;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }

        .newsletter-section {
            background-color: rgb(172, 210, 248);
            padding: 50px 0;
            border-radius: 15px;
            margin-top: 50px;
        }

        /* Adjust footer to stick to the bottom */
        footer {
            flex-shrink: 0;
            /* Prevents footer from shrinking */
        }

        /* Responsive adjustments for smaller screens */
        @media (max-width: 768px) {
            .hero-section {
                padding: 70px 0;
                min-height: 300px;
            }

            .hero-section h1 {
                font-size: 2.5rem;
            }

            .hero-section p {
                font-size: 0.9rem;
            }

            .newsletter-section {
                padding: 30px 15px;
                margin: 30px 15px;
                /* Add horizontal margin for smaller screens */
            }
        }
    </style>
</head>

<body>
    <!-- Navigasi Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top navbar-minimal shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ __('Artikel') }}</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="#">{{ __('Informasi') }}</a>
                    </li>
                    <ul class="navbar-nav">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link fw-bold text-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle fw-bold text-primary" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('admin.dashboard')}}">
                                        {{ __('Dashboard') }}
                                    </a>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                 this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </a>
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bagian Hero -->
    <header class="hero-section mb-5">
        <div class="container">
            <h1 class="display-4 mb-3">Jelajahi Dunia Pengetahuan</h1>
            <p class="lead mb-4">Selami artikel-artikel mendalam kami tentang teknologi, gaya hidup, dan inovasi
                terbaru.</p>
            <a href="#" class="btn btn-warning btn-lg rounded-pill shadow">Buka Artikel</a>
        </div>
    </header>

    <!-- Bagian Artikel Terbaru -->
    <section class="container-xl my-5">
        <h2 class="text-center mb-5 fw-bold">Artikel Terbaru</h2>
        <div class="row g-4 justify-content-center">
            <!-- Contoh Card Artikel 1 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm border-0 rounded-4">
                    <img src="https://placehold.co/400x200/ced4da/6c757d?text=Gambar+Artikel+1"
                        class="card-img-top rounded-top-4" alt="Gambar Artikel 1">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold text-primary">Menguasai Laravel 12 untuk Pemula</h5>
                        <p class="card-text text-muted flex-grow-1">Pelajari dasar-dasar Laravel 12 dan bagaimana
                            membangun aplikasi web pertama Anda dengan mudah.</p>
                        <a href="#" class="btn btn-outline-primary mt-3 rounded-pill">Read More</a>
                    </div>
                    <div class="card-footer bg-light border-0 text-center py-3 rounded-bottom-4">
                        <small class="text-muted">Dipublikasikan pada 2024-06-23</small>
                    </div>
                </div>
            </div>
            <!-- Contoh Card Artikel 2 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm border-0 rounded-4">
                    <img src="https://placehold.co/400x200/ced4da/6c757d?text=Gambar+Artikel+2"
                        class="card-img-top rounded-top-4" alt="Gambar Artikel 2">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold text-primary">Integrasi Vite dengan Proyek Frontend Anda</h5>
                        <p class="card-text text-muted flex-grow-1">Panduan lengkap tentang cara menggunakan Vite untuk
                            aset frontend yang super cepat.</p>
                        <a href="#" class="btn btn-outline-primary mt-3 rounded-pill">Read More</a>
                    </div>
                    <div class="card-footer bg-light border-0 text-center py-3 rounded-bottom-4">
                        <small class="text-muted">Dipublikasikan pada 2024-06-22</small>
                    </div>
                </div>
            </div>
            <!-- Contoh Card Artikel 3 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm border-0 rounded-4">
                    <img src="https://placehold.co/400x200/ced4da/6c757d?text=Gambar+Artikel+3"
                        class="card-img-top rounded-top-4" alt="Gambar Artikel 3">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold text-primary">Membangun UI Responsif dengan Bootstrap 5</h5>
                        <p class="card-text text-muted flex-grow-1">Tips dan trik untuk mendesain antarmuka pengguna
                            yang indah dan responsif.</p>
                        <a href="#" class="btn btn-outline-primary mt-3 rounded-pill">Read More</a>
                    </div>
                    <div class="card-footer bg-light border-0 text-center py-3 rounded-bottom-4">
                        <small class="text-muted">Dipublikasikan pada 2024-06-21</small>
                    </div>
                </div>
            </div>
            <!-- Contoh Card Artikel 4 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm border-0 rounded-4">
                    <img src="https://placehold.co/400x200/ced4da/6c757d?text=Gambar+Artikel+4"
                        class="card-img-top rounded-top-4" alt="Gambar Artikel 4">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold text-primary">Teknologi Terbaru dalam Pengembangan Web</h5>
                        <p class="card-text text-muted flex-grow-1">Ikuti tren terkini seperti WebAssembly, GraphQL,
                            dan Serverless Functions.</p>
                        <a href="#" class="btn btn-outline-primary mt-3 rounded-pill">Read More</a>
                    </div>
                    <div class="card-footer bg-light border-0 text-center py-3 rounded-bottom-4">
                        <small class="text-muted">Dipublikasikan pada 2024-06-20</small>
                    </div>
                </div>
            </div>
            <!-- Anda bisa menambahkan lebih banyak card artikel di sini -->
        </div>
    </section>

    <!-- Bagian Newsletter / CTA -->
    <section class="newsletter-section text-center container-xl">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="mb-3 fw-bold">Bergabunglah dengan Newsletter Kami</h2>
                <p class="lead mb-4">Dapatkan pembaruan terbaru, artikel eksklusif, dan penawaran langsung ke kotak
                    masuk Anda.</p>
                <form class="d-flex justify-content-center">
                    <div class="input-group" style="max-width: 500px;">
                        <input type="email" class="form-control form-control-lg rounded-start-pill border-end-0"
                            placeholder="Masukkan alamat email Anda" aria-label="Email Anda"
                            aria-describedby="button-addon2">
                        <button class="btn btn-primary btn-lg rounded-end-pill" type="button"
                            id="button-addon2">Berlangganan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <br>
    <hr class="mt-5 mb-0 text-light">
    <footer class="footer footer-transparent d-print-none bg-dark text-white-50 py-4">
        <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
                <div class="col-lg-auto ms-lg-auto">
                    <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item"><a href="#" target="_blank"
                                class="link-secondary text-white-50" rel="noopener">Documentation</a></li>
                        <li class="list-inline-item"><a href="#" target="_blank"
                                class="link-secondary text-white-50" rel="noopener">Support</a></li>
                    </ul>
                </div>
                <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                    <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item">
                            Copyright &copy; 2024
                            <a href="#" class="link-secondary text-white-50">Emilogi</a>. All rights reserved.
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="link-secondary text-white-50" rel="noopener"> v1.3.2 </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS CDN (Popper.js and Bootstrap JS bundle) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        xintegrity="sha384-I7E8VVD/ismYTF4hNIPjVpZVxpLtGfZuH5njoBuuWVqXQ+oR9byP2xHAuzK5Vzddy" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        xintegrity="sha384-0pUGZvbkm6XF6gxjEnlco4jN+CAngLhVIsEMTTJXwZTRhNEhftGRpBG5hGzJIyK8" crossorigin="anonymous">
    </script>

</body>

</html>
