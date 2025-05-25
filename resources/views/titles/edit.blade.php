@extends('layouts.app')

@section('title', 'Edit Kegiatan')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <h3 class="fw-bold mb-3">Daftar Kegiatan</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="{{ route('dashboard') }}">
                    <i class="icon-home"></i></a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="{{ route('titles.index') }}">Daftar Kegiatan</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="">Edit Kegiatan</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('titles.update', $title) }}" method="POST">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">Edit Kegiatan</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6 col-lg-12">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="judul" class="form-label">Kegiatan</label>
                                <input type="text" class="form-control" name="judul" value="{{ $title->judul }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('titles.index') }}" class="btn btn-dark">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
