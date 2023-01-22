<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class KelasController extends Controller
{
    // list kelas
    public function index()
    {
        $kelas = Kelas::all();
        return response()->json([
            'data' => $kelas
        ]);
    }

    // detail kelas
    public function detailKelas($id)
    {
        $mahasiswa = Mahasiswa::where('kelas_id', $id)->project(['nama' => 1, 'umur' => 1])->get();
        return response()->json([
            'mahasiswa' => $mahasiswa
        ]);
    }

    // add kelas
    public function addKelas(Request $request)
    {
        $kelas = Kelas::create([
            'prodi' => $request->prodi,
            'kaprodi' => $request->kaprodi
            // 'semester' => $request->semester, 
        ]);
        return response()->json([
            'data' => $kelas
        ]);
    }

    // update kelas
    public function updateKelas(Request $request, $id)
    {
        $validatedData = $request->validate([
            'prodi' => 'required|string|max:255',
        ]);
    
        $kelas = Kelas::find($id);
        if(!$kelas) {
            return response()->json([
                'message' => 'kelas not found'
            ],404);
        }
        $kelas->prodi = $validatedData['prodi'];
        $kelas->kaprodi = $request->kaprodi;
        try {
            $kelas->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update kelas prodi',
                'error' => $e->getMessage()
            ], 400);
        }
        return response()->json([
            'data' => $kelas
        ]);
    }

    // delete kelas
    public function deleteKelas($id)
    {
    $kelas = Kelas::find($id);
    $kelas->delete();
    return response()->json([
    'message' => 'kelas deleted'
    ], 204);
    }
}
