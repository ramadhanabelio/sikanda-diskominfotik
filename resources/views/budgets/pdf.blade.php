<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Anggaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 8px;
            margin: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            page-break-inside: auto;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 2px;
            /* text-align: center; */
            vertical-align: middle;
        }

        th {
            background-color: #f2f2f2;
        }

        .bg-primary {
            background-color: #007bff;
            color: #fff;
        }

        .bg-info {
            background-color: #d6eaff;
        }

        .bg-warning {
            background-color: #ffe699;
        }

        .bg-secondary {
            background-color: #dee2e6;
        }

        .bg-purple {
            background-color: #d9d2e9;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
            font-size: 12px;
        }

        .text-left {
            text-align: left;
        }

        .text-bold {
            font-weight: bold;
        }

        .signature-container {
            width: 100%;
            margin-top: 20px;
            text-align: right;
        }

        .signature-box {
            display: inline-block;
            text-align: left;
            margin-right: 40px;
            width: 200px;
        }

        .signature-title {
            margin-bottom: 50px;
        }

        .signature-name {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .calculation-box {
            width: 350px;
            margin: 10px 0;
            padding: 5px;
            font-size: 9px;
            text-align: left;
        }

        .calculation-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 10px;
        }

        .calculation-item {
            margin-bottom: 3px;
        }

        .calculation-label {
            display: inline-block;
            width: 200px;
            font-weight: bold;
        }

        .header-container {
            width: 100%;
            position: relative;
        }

        .judul-row {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .sub-judul-row {
            background-color: #d9edf7;
            font-weight: bold;
        }

        .sub-sub-judul-row {
            font-weight: bold;
        }

        .uraian-row td {
            padding-left: 20px;
        }

        @page {
            size: A4 landscape;
            margin: 5px;
        }
    </style>
</head>

<body>
    <h2>PERHITUNGAN REALISASI FISIK DAN KEUANGAN</h2>

    <div class="calculation-box">
        @php
            $totalPagu = $budgets->flatten(1)->sum('jumlah_anggaran');
            $totalRealisasiKeuangan = $budgets->flatten(1)->sum('rupiah_rk');
            $persenRealisasiKeuangan = $totalPagu > 0 ? ($totalRealisasiKeuangan / $totalPagu) * 100 : 0;

            $totalRealisasiFisik = $budgets->flatten(1)->sum('tertimbang_rf');
        @endphp

        <div class="calculation-item">
            <span class="calculation-label">TOTAL PAGU:</span>
            <span>Rp. {{ number_format($totalPagu, 0, ',', '.') }}</span>
        </div>
        <div class="calculation-item">
            <span class="calculation-label">TARGET:</span>
            <span>100%</span>
        </div>
        <div class="calculation-item">
            <span class="calculation-label">REALISASI KEUANGAN (Rp.) / (%):</span>
            <span>Rp. {{ number_format($totalRealisasiKeuangan, 0, ',', '.') }} /
                {{ number_format($persenRealisasiKeuangan, 2) }}%</span>
        </div>
        <div class="calculation-item">
            <span class="calculation-label">REALISASI FISIK (%):</span>
            <span>{{ number_format($totalRealisasiFisik, 2) }}%</span>
        </div>
    </div>

    <h2>Laporan Realisasi Anggaran</h2>

    <table class="budget-table">
        <thead>
            <tr>
                <th rowspan="2">No</th>
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
            @foreach ($budgets as $budget)
                @if ($budget->judul !== $lastJudul)
                    <tr class="judul-row">
                        <td colspan="21">{{ $budget->judul }}</td>
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
                        <td center>{{ $no++ }}.</td>
                        <td colspan="20">{{ $budget->sub_sub_judul }}</td>
                    </tr>
                    @php $lastSubSubJudul = $budget->sub_sub_judul; @endphp
                @endif

                <tr class="uraian-row">
                    <td></td>
                    <td>{{ $budget->uraian }}</td>
                    <td>{{ $budget->pejabat_penanggung_jawab }}</td>
                    <td>{{ $budget->waktu_pelaksanaan }}</td>
                    <td>{{ $budget->volume }}</td>
                    <td>{{ $budget->satuan }}</td>
                    <td>Rp. {{ number_format($budget->harga_satuan, 0, ',', '.') }}</td>
                    <td>Rp. {{ number_format($budget->jumlah_anggaran, 0, ',', '.') }}</td>
                    <td>{{ $budget->bobot }}</td>
                    <td>{{ $budget->volume_nominal_rr }}</td>
                    <td>{{ $budget->satuan_rr }}</td>
                    <td>{{ $budget->fisik_rr }}</td>
                    <td>{{ $budget->tertimbang_rr }}</td>
                    <td>{{ $budget->volume_nominal_rf }}</td>
                    <td>{{ $budget->satuan_rf }}</td>
                    <td>{{ $budget->fisik_rf }}</td>
                    <td>{{ $budget->tertimbang_rf }}</td>
                    <td>Rp. {{ number_format($budget->rupiah_rk, 0, ',', '.') }}</td>
                    <td>{{ $budget->persentase_rk }}</td>
                    <td>{{ $budget->tertimbang_rk }}</td>
                    <td>{{ $budget->sisa_anggaran ? 'Rp. ' . number_format($budget->sisa_anggaran, 0, ',', '.') : '-' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="signature-container">
        <div class="signature-box">
            <div class="signature-title">
                Pekanbaru, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                <br>
                PPTK
            </div>
            <div class="signature-name">DESI RIAWATI, S.Sos</div>
            <div>NIP. 19791228 201001 2 008</div>
        </div>
    </div>
</body>

</html>
