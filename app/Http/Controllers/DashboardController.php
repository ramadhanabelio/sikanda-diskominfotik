<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Models\Budget;
use App\Models\Subtitle;
use App\Models\Description;
use App\Models\SubSubtitle;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalJudul = Title::count();
        $totalSubJudul = Subtitle::count();
        $totalUraian = Description::count();
        $totalSubSubJudul = SubSubtitle::count();

        $budgetChart = Budget::select('sub_judul', DB::raw('SUM(jumlah_anggaran) as total_anggaran'))
            ->groupBy('sub_judul')
            ->orderByDesc('total_anggaran')
            ->limit(10)
            ->get();

        return view('dashboard', compact(
            'totalJudul',
            'budgetChart',
            'totalUraian',
            'totalSubJudul',
            'totalSubSubJudul',
        ));
    }
}
