<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::apiResource('students', StudentController::class);

// route kelas
Route::get('students/listKelas', [StudentController::class, 'listKelas']);
Route::get('students/detailKelas/{kelas}', [StudentController::class, 'detailKelas']);
Route::post('students/addKelas', [StudentController::class, 'addKelas']);
Route::put('students/updateKelas/{id}', [StudentController::class, 'updateKelas']);

// route mahasiswa
Route::get('students/listMahasiswa', [StudentController::class, 'listMahasiswa']);
Route::get('students/detailMahasiswa/{id}', [StudentController::class, 'detailMahasiswa']);
Route::get('students/index', [StudentController::class, 'index']);

// Route Nilai
Route::get('students/detailNilai/{id}', [StudentController::class, 'detailNilai']);

// Route::post('students/store', [StudentController::class, 'store']);
// Route::get('students/show/{id}', [StudentController::class, 'show']);
// Route::put('students/update/{id}', [StudentController::class, 'update']);
// Route::delete('students/destroy/{id}', [StudentController::class, 'destroy']);

// Route::get('/students', [StudentController::class, 'index']);
// Route::post('/students', [StudentController::class, 'store']);
// Route::get('/students/{id}', [StudentController::class, 'show']);
// Route::put('/students/{id}', [StudentController::class, 'update']);
// Route::delete('/students/{id}', [StudentController::class, 'destroy']);
