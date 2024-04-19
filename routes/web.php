<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ReceiptController;
use Mockery\ReceivedMethodCalls;

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


Route::group(['middleware' => 'isGuest'], function() {
    Route::redirect('/', '/login');
    Route::post('/func-login', [UserController::class, 'func_login'])->name('func-login');

    Route::view('/login', 'login')->name('login')->middleware('isGuest');
});

Route::group(['middleware' => 'isLogin'], function() {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::get('/produk-list', [ProdukController::class, 'index'])->name('produk-list');
    Route::get('/produk-add', [ProdukController::class, 'index_add'])->name('produk-add');
    Route::get('/produk-edit/{id}', [ProdukController::class, 'index_edit'])->name('produk-edit');
    Route::post('/func-produk-add', [ProdukController::class, 'create'])->name('func-produk-add');
    Route::patch('/func-produk-edit/{id}', [ProdukController::class, 'update'])->name('func-produk-edit');
    Route::delete('/func-produk-delete/{id}', [ProdukController::class, 'destroy'])->name('func-produk-delete');

    Route::get('/checkout',[SaleController::class, 'index'])->name('checkout');
    Route::post('/func-checkout', [SaleController::class, 'create'])->name('func-checkout');
    Route::patch('/func-quantity/{id}', [SaleController::class, 'store'])->name('func-quantity');
    Route::delete('/func-delete/{id}', [SaleController::class, 'destroy'])->name('func-delete');

    Route::get('/receipt-detail/{id}', [ReceiptController::class, 'receipt_detail'])->name('receipt-detail');
    Route::get('/receipt-list', [ReceiptController::class, 'index'])->name('receipt-list');
    Route::patch('/func-receipt/{id}', [ReceiptController::class, 'create'])->name('func-receipt');
    Route::delete('/func-receipt-delete/{id}', [ReceiptController::class, 'destroy'])->name('func-receipt-delete');
    Route::get('/func-receipt-pdf/{id}', [ReceiptController::class, 'cetak_receipt'])->name('func-receipt-pdf');

    Route::post('/func-logout', [UserController::class, 'logout'])->name('func-logout');

    Route::get('/export_excel', [ProdukController::class, 'export_excel'])->name('export-excel');



    Route::get('/logout', [UserController::class, 'logout'])->name('logout');



});


