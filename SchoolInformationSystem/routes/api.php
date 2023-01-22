<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KelasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// list kelas
Route::get('kelas', [KelasController::class, 'index']);
// detail kelas dengan data mahasiswa 
Route::get('kelas/detail/{id}', [KelasController::class, 'detailKelas']);
// add new kelas
Route::post('kelas', [KelasController::class, 'addKelas']);
// update kelas
Route::put('kelas/{id}', [KelasController::class, 'updateKelas']);
// delete kelas
Route::delete('kelas/{id}', [KelasController::class, 'deleteKelas']); // additional fitur


// list mahasiswa
Route::get('mahasiswa', [MahasiswaController::class, 'index']);
// detail mahasiswa dengan nilai permatakuliah
Route::get('mahasiswa/detail/{id}', [MahasiswaController::class, 'detailMahasiswa']);
// add new mahasiswa
Route::post('mahasiswa', [MahasiswaController::class, 'addMahasiswa']); // additional fitur
// update mahasiswa
Route::put('mahasiswa/{id}', [MahasiswaController::class, 'updateMahasiswa']); // additional fitur
// delete mahasiswa
Route::delete('mahasiswa/{id}', [MahasiswaController::class, 'deleteMahasiswa']); // additional fitur



// list all nilai
Route::get('mahasiswa/nilai', [MahasiswaController::class, 'listNilai']); // additional fitur 
// detail nilai per matakuliah
Route::get('mahasiswa/nilai/{id}', [MahasiswaController::class, 'detailNilai']);
// add new nilai
Route::post('mahasiswa/nilai', [MahasiswaController::class, 'addNilai']);