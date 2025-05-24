<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\SubtitleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\SubSubtitleController;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('budgets', BudgetController::class);
Route::get('budgets-export-pdf', [BudgetController::class, 'exportPdf'])->name('budgets.exportPdf');
Route::get('budgets-export-excel', [BudgetController::class, 'exportExcel'])->name('budgets.exportExcel');
Route::resource('titles', TitleController::class);
Route::resource('subtitles', SubtitleController::class);
Route::resource('sub-subtitles', SubSubtitleController::class);
Route::resource('descriptions', DescriptionController::class);
