@extends('layouts.frontend.master')

@section('articlesActive')
    active
@endsection

@section('metaDesc')
    {{$articles->meta_desc}}
@endsection

@section('content')
    <section class="container-xl my-5">
        <div class="row gx-4">
            <div class="col-lg-9">
                <div class="card shadow-sm border-0 rounded-lg">
                    @if ($articles->image)
                        {{-- Jika ada gambar artikel, tampilkan gambar tersebut --}}
                        <div class="ratio ratio-21x9">
                            <img class="card-img-top object-fit-cover rounded-top"
                                src="{{ asset('storage/' . $articles->image) }}" alt="Gambar Artikel: {{ $articles->title }}">
                        </div>
                    @else
                        {{-- Jika gambar artikel null, tampilkan gambar dummy --}}
                        <div class="ratio ratio-21x9 rounded-top d-flex align-items-center"
                            style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(13, 110, 253, 0.7)), url('https://wallpapercave.com/wp/wp10992174.png'); background-size: cover; background-position: center;">
                            <h1 class="text-white ms-lg-5 ms-3" style="margin-top: 18%"><b>MyBlog </b> <br> <small>Aplikasi
                                    CMS Terbaik</small></h1>
                        </div>
                    @endif
                    <div class="card-body p-4 p-md-5">
                        <h1 class="card-title mb-3" style="font-size: 2rem; font-weight: 700;">{{ $articles->title }}</h1>
                        <div class="text-muted mb-4 d-flex flex-wrap align-items-center small">
                            <span class="me-3">
                                <i class="fas fa-user me-1"></i> Penulis: <strong>{{ $articles->user->name }}</strong>
                            </span>
                            <span class="me-3">
                                <i class="fas fa-tag me-1"></i> Kategori: <strong>{{ $articles->category->name }}</strong>
                            </span>
                            <span class="me-3">
                                <i class="fas fa-calendar-alt me-1"></i> Diperbaharui :
                                {{ $articles->updated_at->format('d M Y') }}
                            </span>
                            <span>
                                <i class="fas fa-info-circle me-1"></i> Status:
                                @if ($articles->status)
                                    <span class="badge bg-primary">Published</span>
                                @else
                                    <span class="badge bg-danger">Draft</span>
                                @endif
                            </span>
                        </div>

                        <hr class="my-3">

                        <div class="note-editable mt-4" style="font-size: 1rem; line-height: 1.5;">
                            {!! $articles->content !!}
                        </div>

                        <hr class="my-3">

                        <div class="text-end">
                            <a href="{{ route('home.articles.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- sidebar -->
            @include('home.articles.sidebar')

        </div>
    </section>
@endsection
