<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route: 


// jwt



// Route::apiResource('/barang',BarangController::class);

Route::get('/barang',[BarangController::class, 'index']);
Route::post('/barang',[BarangController::class, 'store']);
Route::get('/barang/{id}',[BarangController::class, 'show']);
Route::put('/barang/{id}',[BarangController::class, 'update']);
Route::delete('/barang/{id}',[BarangController::class, 'destroy']);
