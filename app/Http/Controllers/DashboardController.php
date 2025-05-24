<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Models\Subtitle;
use App\Models\Description;
use App\Models\SubSubtitle;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalJudul = Title::count();
        $totalSubJudul = Subtitle::count();
        $totalUraian = Description::count();
        $totalSubSubJudul = SubSubtitle::count();

        return view('dashboard', compact(
            'totalJudul',
            'totalUraian',
            'totalSubJudul',
            'totalSubSubJudul',
        ));
    }
}
