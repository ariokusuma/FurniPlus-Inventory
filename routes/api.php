<?php

use App\Http\Controllers\DatabaseBarangController;
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


Route::GET('/data-barang', [DatabaseBarangController::class, 'index'])->name('dataBarang');

Route::GET('/data-barang/{id_barang}', [DatabaseBarangController::class, 'showbyid'])->name('detilbarang');


// Route::GET('tiketing/', [TiketController::class, 'index'])->name('showtickets');
