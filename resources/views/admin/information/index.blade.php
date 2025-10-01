@extends('layouts.admin.master')

@section('informationActive')
    text-primary
@endsection

@section('content')
    <h1 class="mb-4" style="font-size:x-large">Manajemen Informasi</h1>
    <hr><br>

    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                {{-- Form Pencarian --}}
                <form action="{{ route('admin.information.index') }}" method="GET" class="d-flex me-3">
                    <input type="text" name="search" class="form-control form-control-sm me-2"
                        placeholder="Cari Informasi..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-sm btn-outline-secondary">
                        Cari
                    </button>
                    @if (request('search') !== null)
                        <a href="{{ route('admin.information.index') }}" class="btn btn-sm btn-outline-danger ms-2">
                            Reset
                        </a>
                    @endif
                </form>

                <a href="{{ route('admin.information.create') }}" class="btn btn-sm btn-primary px-3">
                    <i class="fas fa-plus me-1"></i> Tambah Informasi
                </a>
            </div>

            @if ($information->isEmpty())
                <div class="alert alert-warning text-center" role="alert">
                    Tidak ada informasi yang ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped small">
                    <thead>
                        <tr class="text-center">
                            <th width="5%">No.</th>
                            <th>Judul Informasi</th>
                            <th width="20%">Status</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($information as $val)
                            <tr>
                                <td class="text-center">
                                    {{ $loop->iteration + ($information->currentPage() - 1) * $information->perPage() }}
                                </td>
                                <td>{{ $val->title }}</td>
                                <td class="text-center">
                                    @if ($val->status)
                                        <span class="badge bg-primary">Published</span>
                                    @else
                                        <span class="badge bg-danger">Draft</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.information.show', $val->slug) }}"
                                        class="btn btn-sm btn-info text-white" title="Lihat">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.information.edit', $val->slug) }}"
                                        class="btn btn-sm btn-success">
                                        <i class="fas fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.information.destroy', $val->slug) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus Informasi ini? Tindakan ini tidak dapat dibatalkan.')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $information->appends(['search' => request('search')])->links('pagination::bootstrap-4') }}
                </div>
            @endif
        </div>
    </div>
@endsection
