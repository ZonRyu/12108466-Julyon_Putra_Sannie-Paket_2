<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

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

Route::get('/produk-list', [ProdukController::class, 'index'])->name('produk-list');

Route::view('/produk-add', 'produk-add');
Route::get('/produk-edit/{id}', [ProdukController::class, 'index_edit'])->name('produk-edit');
Route::post('/func-produk-add', [ProdukController::class, 'create'])->name('func-produk-add');
Route::patch('/func-produk-edit/{id}', [ProdukController::class, 'update'])->name('func-produk-edit');
Route::delete('/func-produk-delete/{id}', [ProdukController::class, 'destroy'])->name('func-produk-delete');
