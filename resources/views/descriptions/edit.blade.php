@extends('layouts.app')

@section('title', 'Edit Uraian')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <h3 class="fw-bold mb-3">Daftar Uraian</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="{{ route('dashboard') }}">
                    <i class="icon-home"></i></a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="{{ route('descriptions.index') }}">Daftar Uraian</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="">Edit Uraian</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('descriptions.update', $description) }}" method="POST">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">Edit Uraian</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6 col-lg-12">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="sub_subtitle_id" class="form-label">Pilih Sub Sub Kegiatan</label>
                                <select name="sub_subtitle_id" class="form-control" required>
                                    <option value="">Pilih Sub Sub Kegiatan</option>
                                    @foreach ($sub_subtitles as $sub)
                                        <option value="{{ $sub->id }}"
                                            {{ $description->sub_subtitle_id == $sub->id ? 'selected' : '' }}>
                                            {{ $sub->sub_sub_judul }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="uraian" class="form-label">Uraian</label>
                                <input type="text" class="form-control" name="uraian" value="{{ $description->uraian }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('descriptions.index') }}" class="btn btn-dark">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
