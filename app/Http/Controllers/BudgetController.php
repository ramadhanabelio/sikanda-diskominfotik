<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;
use App\Exports\BudgetsExport;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class BudgetController extends Controller
{
    public function index(Request $request)
    {
        $query = Budget::query();

        if ($request->filled('bulan') && $request->filled('tahun')) {
            $query->whereMonth('tanggal_anggaran', $request->bulan)
                ->whereYear('tanggal_anggaran', $request->tahun);
        } elseif ($request->filled('bulan')) {
            $query->whereMonth('tanggal_anggaran', $request->bulan);
        } elseif ($request->filled('tahun')) {
            $query->whereYear('tanggal_anggaran', $request->tahun);
        }

        $budgets = $query->paginate(10);

        return view('budgets.index', compact('budgets'));
    }

    public function create()
    {
        return view('budgets.create', [
            'judulList' => Budget::distinct()->pluck('judul'),
            'subJudulList' => Budget::distinct()->pluck('sub_judul'),
            'subSubJudulList' => Budget::distinct()->pluck('sub_sub_judul'),
            'uraianList' => Budget::distinct()->pluck('uraian'),
            'satuanList' => Budget::distinct()->pluck('satuan'),
            'satuan_rrList' => Budget::distinct()->pluck('satuan_rr'),
            'satuan_rfList' => Budget::distinct()->pluck('satuan_rf'),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal_anggaran' => 'required|date',
            'judul' => 'nullable|string',
            'judul_baru' => 'nullable|string',
            'sub_judul' => 'nullable|string',
            'sub_judul_baru' => 'nullable|string',
            'sub_sub_judul' => 'nullable|string',
            'sub_sub_judul_baru' => 'nullable|string',
            'uraian' => 'nullable|string',
            'uraian_baru' => 'nullable|string',
            'satuan' => 'nullable|string',
            'satuan_baru' => 'nullable|string',
            'volume' => 'required|numeric',
            'harga_satuan' => 'required|numeric',
            'pejabat_penanggung_jawab' => 'nullable|string',
            'waktu_pelaksanaan' => 'nullable|string',

            'volume_nominal_rr' => 'nullable|numeric',
            'satuan_rr' => 'nullable|string',
            'fisik_rr' => 'nullable|numeric',
            'tertimbang_rr' => 'nullable|numeric',

            'volume_nominal_rf' => 'nullable|numeric',
            'satuan_rf' => 'nullable|string',
            'fisik_rf' => 'nullable|numeric',
            'tertimbang_rf' => 'nullable|numeric',

            'rupiah_rk' => 'nullable|numeric',
            'persentase_rk' => 'nullable|numeric',
            'tertimbang_rk' => 'nullable|numeric',
            'sisa_anggaran' => 'nullable|numeric',
        ]);

        $budget = new Budget();
        $budget->tanggal_anggaran = $request->tanggal_anggaran;

        $budget->judul = $request->judul_baru ?: $request->judul;
        $budget->sub_judul = $request->sub_judul_baru ?: $request->sub_judul;
        $budget->sub_sub_judul = $request->sub_sub_judul_baru ?: $request->sub_sub_judul;
        $budget->uraian = $request->uraian_baru ?: $request->uraian;
        $budget->satuan = $request->satuan_baru ?: $request->satuan;

        $budget->volume = $request->volume;
        $budget->harga_satuan = $request->harga_satuan;
        $budget->jumlah_anggaran = $request->volume * $request->harga_satuan;

        $budget->pejabat_penanggung_jawab = $request->pejabat_penanggung_jawab;
        $budget->waktu_pelaksanaan = $request->waktu_pelaksanaan;

        $budget->volume_nominal_rr = $request->volume_nominal_rr;
        $budget->satuan_rr = $request->satuan_rr_baru ?: $request->satuan_rr;
        $budget->fisik_rr = $request->fisik_rr;
        $budget->tertimbang_rr = $request->tertimbang_rr;

        $budget->volume_nominal_rf = $request->volume_nominal_rf;
        $budget->satuan_rf = $request->satuan_rf_baru ?: $request->satuan_rf;
        $budget->fisik_rf = $request->fisik_rf;
        $budget->tertimbang_rf = $request->tertimbang_rf;

        $budget->rupiah_rk = $request->rupiah_rk;
        $budget->persentase_rk = $request->persentase_rk;
        $budget->tertimbang_rk = $request->tertimbang_rk;
        $budget->sisa_anggaran = $request->sisa_anggaran;

        $budget->save();

        return redirect()->route('budgets.index')->with('success', 'Anggaran berhasil ditambahkan.');
    }

    public function edit(Budget $budget)
    {
        return view('budgets.edit', [
            'budget' => $budget,
            'judulList' => Budget::distinct()->pluck('judul'),
            'subJudulList' => Budget::distinct()->pluck('sub_judul'),
            'subSubJudulList' => Budget::distinct()->pluck('sub_sub_judul'),
            'uraianList' => Budget::distinct()->pluck('uraian'),
            'satuanList' => Budget::distinct()->pluck('satuan'),
            'satuan_rrList' => Budget::distinct()->pluck('satuan_rr'),
            'satuan_rfList' => Budget::distinct()->pluck('satuan_rf'),
        ]);
    }

    public function update(Request $request, Budget $budget)
    {
        $validated = $request->validate([
            'tanggal_anggaran' => 'required|date',
            'judul' => 'nullable|string',
            'judul_baru' => 'nullable|string',
            'sub_judul' => 'nullable|string',
            'sub_judul_baru' => 'nullable|string',
            'sub_sub_judul' => 'nullable|string',
            'sub_sub_judul_baru' => 'nullable|string',
            'uraian' => 'nullable|string',
            'uraian_baru' => 'nullable|string',
            'satuan' => 'nullable|string',
            'satuan_baru' => 'nullable|string',
            'volume' => 'required|numeric',
            'harga_satuan' => 'required|numeric',
            'pejabat_penanggung_jawab' => 'nullable|string',
            'waktu_pelaksanaan' => 'nullable|string',

            'volume_nominal_rr' => 'nullable|numeric',
            'satuan_rr' => 'nullable|string',
            'satuan_rr_baru' => 'nullable|string',
            'fisik_rr' => 'nullable|numeric',
            'tertimbang_rr' => 'nullable|numeric',

            'volume_nominal_rf' => 'nullable|numeric',
            'satuan_rf' => 'nullable|string',
            'satuan_rf_baru' => 'nullable|string',
            'fisik_rf' => 'nullable|numeric',
            'tertimbang_rf' => 'nullable|numeric',

            'rupiah_rk' => 'nullable|numeric',
            'persentase_rk' => 'nullable|numeric',
            'tertimbang_rk' => 'nullable|numeric',
            'sisa_anggaran' => 'nullable|numeric',
        ]);

        $budget->tanggal_anggaran = $request->tanggal_anggaran;

        $budget->judul = $request->judul_baru ?: $request->judul;
        $budget->sub_judul = $request->sub_judul_baru ?: $request->sub_judul;
        $budget->sub_sub_judul = $request->sub_sub_judul_baru ?: $request->sub_sub_judul;
        $budget->uraian = $request->uraian_baru ?: $request->uraian;
        $budget->satuan = $request->satuan_baru ?: $request->satuan;

        $budget->volume = $request->volume;
        $budget->harga_satuan = $request->harga_satuan;
        $budget->jumlah_anggaran = $request->volume * $request->harga_satuan;

        $budget->pejabat_penanggung_jawab = $request->pejabat_penanggung_jawab;
        $budget->waktu_pelaksanaan = $request->waktu_pelaksanaan;

        $budget->volume_nominal_rr = $request->volume_nominal_rr;
        $budget->satuan_rr = $request->satuan_rr_baru ?: $request->satuan_rr;
        $budget->fisik_rr = $request->fisik_rr;
        $budget->tertimbang_rr = $request->tertimbang_rr;

        $budget->volume_nominal_rf = $request->volume_nominal_rf;
        $budget->satuan_rf = $request->satuan_rf_baru ?: $request->satuan_rf;
        $budget->fisik_rf = $request->fisik_rf;
        $budget->tertimbang_rf = $request->tertimbang_rf;

        $budget->rupiah_rk = $request->rupiah_rk;
        $budget->persentase_rk = $request->persentase_rk;
        $budget->tertimbang_rk = $request->tertimbang_rk;
        $budget->sisa_anggaran = $request->sisa_anggaran;

        $budget->save();

        return redirect()->route('budgets.index')->with('success', 'Anggaran berhasil diperbarui.');
    }

    public function destroy(Budget $budget)
    {
        $budget->delete();
        return redirect()->route('budgets.index')->with('success', 'Anggaran berhasil dihapus.');
    }

    public function exportPdf()
    {
        $budgets = Budget::all();
        $pdf = PDF::loadView('budgets.pdf', compact('budgets'))->setPaper('a4', 'landscape');
        return $pdf->stream('data-anggaran.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new BudgetsExport, 'Data Anggaran.xlsx');
    }
}
