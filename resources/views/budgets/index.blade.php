@extends('layouts.app')

@section('title', 'Anggaran')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <h3 class="fw-bold mb-3">Anggaran</h3>
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
                <a href="{{ route('budgets.index') }}">Anggaran</a>
            </li>
        </ul>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{ route('budgets.create') }}" class="btn btn-primary btn-round">Tambah Anggaran</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                        <div class="card-title">Anggaran</div>
                        <div class="card-tools">
                            <a href="{{ route('budgets.exportExcel') }}"
                                class="btn btn-label-success btn-round btn-sm me-2">
                                <span class="btn-label"><i class="fa fa-file-excel me-2"></i></span>
                                Excel
                            </a>
                            <a href="{{ route('budgets.exportPdf') }}" class="btn btn-label-danger btn-round btn-sm"
                                target="_blank">
                                <span class="btn-label"><i class="fa fa-file-pdf me-2"></i></span>
                                PDF
                            </a>
                        </div>
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

                    <div class="mb-2">
                        <label for="search" class="form-label fw-bold">Pencarian</label>
                        <input type="text" id="searchInput" class="form-control" placeholder="Pencarian...">
                    </div>

                    <form method="GET" action="{{ route('budgets.index') }}" class="row g-2 mb-4 align-items-end">
                        <div class="col-lg-5 col-md-6">
                            <label for="bulan" class="form-label fw-bold">Bulan</label>
                            <select name="bulan" id="bulan" class="form-select">
                                <option value="">Semua Bulan</option>
                                @foreach (range(1, 12) as $b)
                                    <option value="{{ $b }}" {{ request('bulan') == $b ? 'selected' : '' }}>
                                        {{ DateTime::createFromFormat('!m', $b)->format('F') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-5 col-md-6">
                            <label for="tahun" class="form-label fw-bold">Tahun</label>
                            <select name="tahun" id="tahun" class="form-select">
                                <option value="">Semua Tahun</option>
                                @foreach (range(date('Y'), 2020) as $y)
                                    <option value="{{ $y }}" {{ request('tahun') == $y ? 'selected' : '' }}>
                                        {{ $y }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-2 col-md-12">
                            <label class="form-label d-block invisible">Tombol</label>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary w-50 me-1">Filter</button>
                                <a href="{{ route('budgets.index') }}" class="btn btn-dark w-50 ms-1">Reset</a>
                            </div>
                        </div>
                    </form>

                    <table class="table budget-table">
                        <thead>
                            <tr>
                                <th rowspan="2" style="width: 5%;">No.</th>
                                <th rowspan="2">Uraian</th>
                                <th rowspan="2">Pejabat / Penanggung Jawab</th>
                                <th rowspan="2">Waktu Pelaksanaan</th>
                                <th rowspan="2">Volume</th>
                                <th rowspan="2">Satuan</th>
                                <th rowspan="2">Harga Satuan</th>
                                <th rowspan="2">Jumlah Anggaran</th>
                                <th rowspan="2">Bobot (%)</th>
                                <th colspan="4" class="group-rr">Rencana Realisasi</th>
                                <th colspan="4" class="group-rf">Realisasi Fisik</th>
                                <th colspan="3" class="group-rk">Realisasi Keuangan</th>
                                <th rowspan="2">Sisa Anggaran</th>
                                {{-- <th rowspan="2">Aksi</th> --}}
                            </tr>
                            <tr>
                                <th>Volume/Nominal</th>
                                <th>Satuan</th>
                                <th>Fisik (%)</th>
                                <th>Tertimbang (%)</th>
                                <th>Volume/Nominal</th>
                                <th>Satuan</th>
                                <th>Fisik (%)</th>
                                <th>Tertimbang (%)</th>
                                <th>Rupiah</th>
                                <th>Persentase (%)</th>
                                <th>Tertimbang (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $lastJudul = '';
                                $lastSubJudul = '';
                                $lastSubSubJudul = '';
                            @endphp

                            @forelse ($budgets as $budget)
                                @if ($budget->judul !== $lastJudul)
                                    <tr class="judul-row">
                                        <td colspan="21" class="bg-primary text-white">{{ $budget->judul }}</td>
                                    </tr>
                                    @php $lastJudul = $budget->judul; @endphp
                                @endif

                                @if ($budget->sub_judul !== $lastSubJudul)
                                    <tr class="sub-judul-row">
                                        <td colspan="21">{{ $budget->sub_judul }}</td>
                                    </tr>
                                    @php $lastSubJudul = $budget->sub_judul; @endphp
                                @endif

                                @if ($budget->sub_sub_judul !== $lastSubSubJudul)
                                    <tr class="sub-sub-judul-row">
                                        <td class="text-center">{{ $no++ }}.</td>
                                        <td colspan="20">{{ $budget->sub_sub_judul }}</td>
                                    </tr>
                                    @php $lastSubSubJudul = $budget->sub_sub_judul; @endphp
                                @endif

                                <tr class="uraian-row">
                                    <td></td>
                                    <td>{{ $budget->uraian ?? '-' }}</td>
                                    <td>{{ $budget->pejabat_penanggung_jawab ?? '-' }}</td>
                                    <td>{{ $budget->waktu_pelaksanaan ?? '-' }}</td>
                                    <td>{{ $budget->volume ?? '-' }}</td>
                                    <td>{{ $budget->satuan ?? '-' }}</td>
                                    <td>{{ $budget->harga_satuan ? 'Rp. ' . number_format($budget->harga_satuan, 0, ',', '.') : '-' }}
                                    </td>
                                    <td>{{ $budget->jumlah_anggaran ? 'Rp. ' . number_format($budget->jumlah_anggaran, 0, ',', '.') : '-' }}
                                    </td>
                                    <td>{{ $budget->bobot !== null ? number_format($budget->bobot, 2) . '%' : '-' }}</td>
                                    <td>{{ $budget->volume_nominal_rr ?? '-' }}</td>
                                    <td>{{ $budget->satuan_rr ?? '-' }}</td>
                                    <td>{{ $budget->fisik_rr ?? '-' }}</td>
                                    <td>{{ $budget->tertimbang_rr ?? '-' }}</td>
                                    <td>{{ $budget->volume_nominal_rf ?? '-' }}</td>
                                    <td>{{ $budget->satuan_rf ?? '-' }}</td>
                                    <td>{{ $budget->fisik_rf ?? '-' }}</td>
                                    <td>{{ $budget->tertimbang_rf ?? '-' }}</td>
                                    <td>{{ $budget->rupiah_rk ? 'Rp. ' . number_format($budget->rupiah_rk, 0, ',', '.') : '-' }}
                                    </td>
                                    <td>{{ $budget->persentase_rk ?? '-' }}</td>
                                    <td>{{ $budget->tertimbang_rk ?? '-' }}</td>
                                    <td>{{ $budget->sisa_anggaran ? 'Rp. ' . number_format($budget->sisa_anggaran, 0, ',', '.') : '-' }}
                                    </td>
                                    {{-- <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('budgets.edit', $budget->id) }}" type="button"
                                                data-bs-toggle="tooltip" title=""
                                                class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('budgets.destroy', $budget->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link btn-danger"
                                                    data-bs-toggle="tooltip" data-original-title="Remove"
                                                    onclick="return confirm('Yakin ingin menghapus?')">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td> --}}
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="21" class="text-center">TIDAK ADA DATA</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $budgets->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('.uraian-row');

            rows.forEach(row => {
                const cells = Array.from(row.children);
                const matches = cells.some(cell => cell.textContent.toLowerCase().includes(searchValue));
                row.style.display = matches ? '' : 'none';
            });
        });
    </script>
@endsection
