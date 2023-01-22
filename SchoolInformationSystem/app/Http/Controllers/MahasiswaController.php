<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MahasiswaController extends Controller
{

    // list mahasiswa
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return response()->json([
            'data' => $mahasiswa
        ]);
    }

    // detail mahasiswa
    public function detailMahasiswa($id)
    {
        $matakuliah = Matakuliah::where('mahasiswa_id', $id)->project(['namaMK' => 1, 'nilai' => 1])->get();
        return response()->json([
            'matakuliah' => $matakuliah
        ]);
    }


    // add mahasiswa
    public function addMahasiswa(Request $request)
    {
        $mahasiswa = Mahasiswa::create([
            'nama' => $request->nama,
            'umur' => $request->umur,
            'kelas_id' => $request->kelas_id
        ]);
        return response()->json([
            'data' => $mahasiswa
        ]);
    }


    // update mahasiswa
    public function updateMahasiswa(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);
    
        $mahasiswa = Mahasiswa::find($id);
        if(!$mahasiswa) {
            return response()->json([
                'message' => 'mahasiswa not found'
            ],404);
        }
        $mahasiswa->nama = $validatedData['nama'];
        $mahasiswa->umur = $request->umur;
        $mahasiswa->kelas_id = $request->kelas_id;
        try {
            $mahasiswa->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update mahasiswa',
                'error' => $e->getMessage()
            ], 400);
        }
        return response()->json([
            'data' => $mahasiswa
        ]);
    }


    // delete mahasiswa
    public function deleteMahasiswa($id)
    {
        $matakuliah = Matakuliah::where('mahasiswa_id', $id)->delete();
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        return response()->json([
        'message' => 'mahasiswa deleted'
        ], 204);
    }




    // function for data nilai 






    // list nilai
    public function listNilai()
    {
        $matakuliah = Matakuliah::all();
        return response()->json([
            'data' => $matakuliah
        ]);
    }



    // detail nilai
    public function detailNilai($id)
    {
        $matakuliah = Matakuliah::where('mahasiswa_id', $id)->project(
            [
                'namaMK' => 1, 
                'LT1' => 1,
                'LT2' => 1,
                'LT3' => 1,
                'LT4' => 1,
                'UH1' => 1,
                'UH2' => 1,
                'UTS' => 1,
                'UAS' => 1
                ]
            )->get();
        return response()->json([
            'matakuliah' => $matakuliah
        ]);
    }


    // add nilai
    public function addNilai(Request $request)
    {
        $matakuliah = Matakuliah::create([
            'namaMK' => $request->namaMK,
            'LT1' => $request->LT1,
            'LT2' => $request->LT2,
            'LT3' => $request->LT3,
            'LT4' => $request->LT4,
            'UH1' => $request->UH1,
            'UH2' => $request->UH2,
            'UTS' => $request->UTS,
            'UAS' => $request->UAS,
            'nilai' => number_format(
            (
                ($request->LT1 + $request->LT2 + $request->LT3 + $request->LT4) / 4
            )*15/100 +
            (
                ($request->UH1 + $request->UH2) / 2
            )*20/100 +
            (
                $request->UTS*25/100
            ) +
            (
                $request->UAS*40/100
            ),2),



            'mahasiswa_id' => $request->mahasiswa_id
        ]);
        return response()->json([
            'data' => $matakuliah
        ]);
    }
}
