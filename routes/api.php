<?php

use App\Http\Controllers\DatabaseBarangController;
use App\Http\Controllers\DatabasePesananController;
use App\Http\Controllers\DatabasePengemasanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/*
|--------------------------------------------------------------------------
========================== Buat E-Commerce =========================
|--------------------------------------------------------------------------
*/

// Buat E-Commerce
Route::GET('/data-barang', [DatabaseBarangController::class, 'index'])->name('dataBarang'); // No 1
Route::GET('/data-barang/{id_barang}', [DatabaseBarangController::class, 'showbyid'])->name('detilbarang'); // No 2
Route::POST('/data-barang/add/', [DatabaseBarangController::class, 'store'])->name('detilbarang'); // No 3
Route::PUT('/data-barang/update/{id}', [DatabaseBarangController::class, 'updateBarang'])->name('detilbarang'); // No 4
Route::DELETE('/data-barang/delete/{id}', [DatabaseBarangController::class, 'destroy']);


/*
|--------------------------------------------------------------------------
========================== Inventory =========================
|--------------------------------------------------------------------------
*/
//endpoint nomor 7
// Route::apiResource('pesanan', DatabasePesananController::class); //No 5 & 6
// Route::get('pesanan', DatabasePesananController::class, 'index'); //No 5 & 6
Route::get('pesanan', [DatabasePesananController::class, 'index']);
Route::PUT('pesanan/update/{id_pesanan}', [DatabasePesananController::class, 'update']); //No 7



/*
|--------------------------------------------------------------------------
========================== Shipping =========================
|--------------------------------------------------------------------------
*/
Route::GET('pengiriman/kirim', [DatabasePengemasanController::class, 'index']); //No 8
Route::GET('pengiriman/kirim/{id}', [DatabasePengemasanController::class, 'pengiriman']); //No 9
