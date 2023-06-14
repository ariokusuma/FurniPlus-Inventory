<?php

use App\Http\Controllers\DatabaseBarangController;
use App\Http\Controllers\DatabasePesananController;
use App\Http\Controllers\DatabasePengemasanController;
use App\Http\Controllers\DatabaseRefundController;
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
Route::GET('/data-barang', [DatabaseBarangController::class, 'index']); // No 1
Route::GET('/data-barang/{id_barang}', [DatabaseBarangController::class, 'showbyid']); // No 2
Route::POST('/data-barang/add/', [DatabaseBarangController::class, 'store']); // No 3
Route::PUT('/data-barang/update/{id}', [DatabaseBarangController::class, 'updateBarang']); // No 4
Route::DELETE('/data-barang/delete/{id}', [DatabaseBarangController::class, 'destroy']);


/*
|--------------------------------------------------------------------------
========================== Inventory =========================
|--------------------------------------------------------------------------
*/
//endpoint nomor 7
// Route::apiResource('pesanan', DatabasePesananController::class); //No 5 & 6
// Route::get('pesanan', DatabasePesananController::class, 'index'); //No 5 & 6
Route::get('pesanan', [DatabasePesananController::class, 'fetch']); //fetch data
Route::GET('pesanan/show', [DatabasePesananController::class, 'show']);
Route::get('pesanan/show/{id}', [DatabasePesananController::class, 'showbyid']);
Route::GET('updateStatus', [DatabasePesananController::class, 'updateStatus']); //resi


// Route::GET('fill', [DatabasePesananController::class, 'fillNullData']);

// update data resi
// Route::PUT('pesanan/update/{id_pesanan}', [DatabasePesananController::class, 'update']); //No 7



/*
|--------------------------------------------------------------------------
========================== Shipping =========================
|--------------------------------------------------------------------------
*/
//Endpoint untuk Shipping
Route::GET('pengiriman/kirim', [DatabasePesananController::class, 'kirimbarang']); //

// Route::GET('pengiriman/kirim', [DatabasePengemasanController::class, 'index']); //No 8
Route::GET('pengiriman/kirim/{id}', [DatabasePengemasanController::class, 'pengiriman']); //No 9


/*
|--------------------------------------------------------------------------
========================== Refund =========================
|--------------------------------------------------------------------------
*/
Route::get('refund', [DatabaseRefundController::class, 'fetch']); //fetch data
Route::get('refund2', [DatabaseRefundController::class, 'fillNullData']); //fetch data
Route::GET('refund/show', [DatabaseRefundController::class, 'show']); //show all data
Route::get('refund/show/{id}', [DatabaseRefundController::class, 'showbyid']);
Route::get('refundfix', [DatabaseRefundController::class, 'refundfix']); //copy data, null


Route::get('refund/data', [DatabaseRefundController::class, 'refundbarang']); //copy data, null

/*
|--------------------------------------------------------------------------
========================== Vendor =========================
|--------------------------------------------------------------------------
*/
Route::get('vendor', [VendorBarangController::class, 'fetch']); //fetch data


