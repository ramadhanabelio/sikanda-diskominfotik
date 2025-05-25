@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <h3 class="fw-bold mb-3">Anggaran</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="{{ route('dashboard') }}">
                    <i class="icon-home"></i></a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="{{ route('budgets.index') }}">Anggaran</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="">Edit Anggaran</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('budgets.update', $budget->id) }}" method="POST">
                @method('PUT')
                @include('budgets.form', ['title' => 'Edit Anggaran'])
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const volumeInput = document.getElementById('volume');
            const hargaInput = document.getElementById('harga_satuan');
            const jumlahInput = document.getElementById('jumlah_anggaran');

            function updateJumlah() {
                const volume = parseFloat(volumeInput.value) || 0;
                const harga = parseFloat(hargaInput.value) || 0;
                jumlahInput.value = volume * harga;
            }

            volumeInput.addEventListener('input', updateJumlah);
            hargaInput.addEventListener('input', updateJumlah);
        });
    </script>
@endsection
