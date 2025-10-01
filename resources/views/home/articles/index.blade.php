@extends('layouts.frontend.master')

@section('articlesActive')
    active
@endsection

@section('content')
    <!-- Header Section -->
    <header class="text-white text-center py-5"
        style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(13, 110, 253, 0.7)), url('https://wallpapercave.com/wp/wp10992174.png'); background-size: cover; background-position: center;">
        <div class="container">
            <h2 class="fw-bold mt-2">Daftar Artikel</h2>
            <p>Selami dunia pengetahuan melalui artikel-artikel mendalam kami</p>
        </div>
    </header>

    <!-- Main Content Section -->
    <section class="container-xl my-5">
        <div class="row gx-4">
            <div class="col-lg-9">
                <div class="row">
                    @forelse ($articles as $key => $val)
                        <div class="col-md-12 mb-3">
                            <div class="card shadow-sm border-0">
                                <div class="row g-0">
                                    <div class="col-md-3">
                                        @if ($val->image)
                                            <img class="img-fluid" style="height: 100%"
                                                src="{{ asset('storage/' . $val->image) }}"
                                                alt="Gambar Artikel: {{ $val->title }}">
                                        @else
                                            <div class="img-fluid d-flex align-items-center justify-content-center text-white-50"
                                                style=" height: 100%; background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(13, 110, 253, 0.7)), url('https://wallpapercave.com/wp/wp10992174.png'); background-size: cover; background-position: center;">
                                                MyBlog Image
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body py-2 small">
                                            <h5 class="card-title mt-2"><small>{{ $val->title }}</small></h5>
                                            <span
                                                class="text-dark">{{ Str::limit(strip_tags($val->meta_desc), 150) }}</span>
                                            <hr class="mb-2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-body-secondary">Diperbaharui :
                                                    {{ $val->updated_at->format('d M Y') }}</small>
                                                <a href="{{ route('home.articles.show', $val->slug) }}"
                                                    class="btn btn-primary btn-sm stretched-link">Baca Artikel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center" role="alert">
                                Belum ada artikel yang tersedia.
                            </div>
                        </div>
                    @endforelse
                </div>
                <br>
                <div class="row">
                    <div class="d-flex justify-content-center">
                        {{ $articles->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>

            <!-- sidebar -->
            @include('home.articles.sidebar')

        </div>
    </section>
@endsection
