@extends('layouts.frontend.master')

@section('contactActive')
    active
@endsection

@section('content')
    <header class="text-white text-center py-5"
        style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(13, 110, 253, 0.7)), url('https://wallpapercave.com/wp/wp10992174.png'); background-size: cover; background-position: center;">
        <div class="container">
            <h2 class="fw-bold mt-2">Kontak Kami</h2>
            <p>Kami siap membantu Anda. Jangan ragu untuk menghubungi kami!</p>
        </div>
    </header>

    <section class="container-xl my-5">
        <div class="row gx-4">
            <div class="col-lg-6 mb-3">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body m-3">
                        <h5>Kantor Kami</h5>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <div class="ratio ratio-16x9">
                                    <div id="map"></div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <h5 class="mb-3">Detail Kontak</h5>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1"><i class="fas fa-map-marker-alt text-primary me-2"></i> Permata
                                        Regency
                                        Blok F1 No 6 Ciparay Kab. Bandung</li>
                                    <li class="mb-1"><i class="fas fa-phone-alt text-primary me-2"></i> (022) 8888-9999
                                    </li>
                                    <li class="mb-1"><i class="fas fa-envelope text-primary me-2"></i> info@myblog.com
                                    </li>
                                    <li class="mb-1"><i class="fas fa-clock text-primary me-2"></i> Senin - Jumat: 09:00 -
                                        17:00 WIB
                                    </li>
                                </ul>
                                <hr>
                                <div class="d-flex justify-content-start social-icons">
                                    <span class="me-3 my-2">Ikuti Kami di : </span>
                                    <a href="#" class="me-3" title="Facebook"><i class="fab fa-facebook"></i></a>
                                    <a href="#" class="me-3" title="Twitter"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="me-3" title="Instagram"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="me-3" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body m-3">
                        <h5>Kirim Pesan Kepada Kami</h5>
                        <hr>

                        {{-- Menampilkan pesan sukses --}}
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Menampilkan pesan error --}}
                        @if (Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ Session::get('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Form untuk mengirim pesan kontak --}}
                        <form action="{{ route('home.contact.store') }}" method="POST" id="contactForm">
                            @csrf {{-- Token CSRF untuk keamanan --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Masukkan nama lengkap Anda"
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="nama@contoh.com" value="{{ old('email') }}"
                                    required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subjek</label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                    id="subject" name="subject" placeholder="Subjek pesan Anda"
                                    value="{{ old('subject') }}" required>
                                @error('subject')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Pesan Anda</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="6"
                                    placeholder="Tulis pesan Anda di sini..." required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                           {{-- kotak ceklis untuk recaptcha--}}
                            <div class="g-recaptcha mt-4" data-sitekey="{{ config('services.recaptcha.key') }}"></div>
                            @error('g-recaptcha-response')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="btn btn-primary w-100 py-2 mt-3">Kirim Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        var map = L.map('map').setView([-7.037515336883947, 107.69569900885396], 15);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([-7.037515336883947, 107.69569900885396]).addTo(map)
            .bindPopup('Our Office')
            .openPopup();
    </script>
    {{-- Script reCAPTCHA --}}
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush
