<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [CompanyController::class, 'index']);
Route::post('/store', [CompanyController::class, 'store'])->name('store');
Route::get('/show/{symbol}', [CompanyController::class, 'show'])->name('show');
Route::get('/symbolData', [CompanyController::class, 'symbolData'])->name('symbolData');




