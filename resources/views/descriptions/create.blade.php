@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <h3 class="fw-bold mb-3">Daftar Uraian</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="/">
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
                <a href="">Tambah Uraian</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('descriptions.store') }}" method="POST">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">Tambah Uraian</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6 col-lg-12">
                            @csrf
                            <div class="mb-3">
                                <label for="uraian" class="form-label">Uraian</label>
                                <input type="text" class="form-control" name="uraian" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('descriptions.index') }}" class="btn btn-dark">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
