@extends('layouts.app')

@section('title', 'Daftar Sub Kegiatan')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <h3 class="fw-bold mb-3">Daftar Sub Kegiatan</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="{{ route('dashboard') }}">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="{{ route('subtitles.index') }}">Daftar Sub Kegiatan</a>
            </li>
        </ul>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{ route('subtitles.create') }}" class="btn btn-primary btn-round">Tambah Sub Kegiatan</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                        <div class="card-title">Daftar Sub Kegiatan</div>
                    </div>
                </div>

                <div class="card-body budget-card-wrapper">
                    <div class="container">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>

                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Sub Kegiatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subtitles as $index => $subtitle)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}.</td>
                                    <td>{{ $subtitle->sub_judul }}</td>
                                    <td>
                                        <a href="{{ route('subtitles.edit', $subtitle) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        </a>
                                        <form action="{{ route('subtitles.destroy', $subtitle) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
