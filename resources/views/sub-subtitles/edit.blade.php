@extends('layouts.app')

@section('title', 'Edit Sub Sub Kegiatan')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <h3 class="fw-bold mb-3">Daftar Sub Sub Kegiatan</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="{{ route('dashboard') }}">
                    <i class="icon-home"></i></a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="{{ route('sub-subtitles.index') }}">Daftar Sub Sub Kegiatan</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="">Edit Sub Sub Kegiatan</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('sub-subtitles.update', $sub_subtitle) }}" method="POST">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">Edit Sub Sub Kegiatan</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6 col-lg-12">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="subtitle_id" class="form-label">Pilih Sub Kegiatan</label>
                                <select name="subtitle_id" class="form-control" required>
                                    <option value="">Pilih Sub Kegiatan</option>
                                    @foreach ($subtitles as $subtitle)
                                        <option value="{{ $subtitle->id }}"
                                            {{ $sub_subtitle->subtitle_id == $subtitle->id ? 'selected' : '' }}>
                                            {{ $subtitle->sub_judul }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sub_sub_judul" class="form-label">Sub Sub Kegiatan</label>
                                <input type="text" class="form-control" name="sub_sub_judul"
                                    value="{{ $sub_subtitle->sub_sub_judul }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('sub-subtitles.index') }}" class="btn btn-dark">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
