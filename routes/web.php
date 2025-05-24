<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BudgetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('budgets', BudgetController::class);
Route::get('budgets-export-pdf', [BudgetController::class, 'exportPdf'])->name('budgets.exportPdf');
Route::get('budgets-export-excel', [BudgetController::class, 'exportExcel'])->name('budgets.exportExcel');
