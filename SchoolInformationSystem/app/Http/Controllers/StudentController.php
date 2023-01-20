<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate(15);
        return response()->json([
            'data' => $students
        ]);
        // $students = Student::all();
        // return response()->json($students);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = Student::create([
            'name' => $request->name,
            'kelas' => $request->kelas,
            'latihan1' => $request->latihan1,
            'latihan2' => $request->latihan2,
            'latihan3' => $request->latihan3,
            'latihan4' => $request->latihan4,
            'ulanganHarian1' => $request->ulanganHarian1,
            'ulanganHarian2' => $request->ulanganHarian2,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'nilai' => $request->nilai
        ]);
        return response()->json([
            'data' => $student
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return response()->json([
            'data' => $student
        ]); 
    }

    // list kelas
    public function listKelas()
    {
        $students = Student::all();
        $kelas = [];
        foreach($students as $student) {
            if(!in_array($student->kelas,$kelas))
            array_push($kelas, $student->kelas);
        }
        return response()->json([
            'kelas' => $kelas
        ]);
    }

    // detail kelas
    public function detailKelas($kelas)
    {
        $students = Student::where('kelas', $kelas)->get();
        $nama = [];
        foreach($students as $student) {
            array_push($nama, $student->name);
        }
        return response()->json([
            'nama' => $nama
        ]);
    }

    // add kelas
    public function addkelas(Request $request)
    {
        $student = Student::create([
            'kelas' => $request->kelas
        ]);
        return response()->json([
            'data' => $student
        ]);
    }

    // update kelas
    public function updateKelas(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kelas' => 'required|string|max:255',
        ]);
    
        $student = Student::find($id);
        if(!$student) {
            return response()->json([
                'message' => 'Student not found'
            ],404);
        }
        $student->kelas = $validatedData['kelas'];
        try {
            $student->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update student kelas',
                'error' => $e->getMessage()
            ], 400);
        }
        return response()->json([
            'data' => $student
        ]);
    }
    





    // list mahasiswa
    public function listMahasiswa()
    {
        $students = Student::all();
        $data = [];
        foreach($students as $student) {
                // $nilai = ($student->matakuliah['LT1'] + $student->matakuliah['LT2'] + $student->matakuliah['LT3'] + $student->matakuliah['LT4'] + $student->matakuliah['UH1'] + $student->matakuliah['UH2'] + $student->matakuliah['UTS'] + $student->matakuliah['UAS']) / 8;
                $data[] = [
                    'name' => $student->name,
                    // 'nilai' => $nilai
                ];
        }
        return response()->json([
            'data' => $data
        ]);
    }





    // detail mahasiswa
    public function detailMahasiswa($id)
    {
        $student = Student::find($id);
        if(!$student) {
            return response()->json([
                'message' => 'Student not found'
            ],404);
        }

        $LT = (
            (
            $student->matakuliah['LT1'] + 
            $student->matakuliah['LT2'] + 
            $student->matakuliah['LT3'] + 
            $student->matakuliah['LT4'] 
            )/4
        )*15/100;

        $UH = (
            (
            $student->matakuliah['UH1'] + 
            $student->matakuliah['UH2'] 
            )/2
        )*20/100;



        $nilai = (
            $LT+
            $UH+
            ($student->matakuliah['UTS']*25)/100 + 
            ($student->matakuliah['UAS']*40)/100
            ) / 4;
        
        return response()->json([
        'name' => $student->name,
        'namaMK' => $student->matakuliah['namaMK'],
        'nilai' => $nilai
        ]);
    }    
    
    


    // detail nilai
    public function detailNilai($id)
    {
        $student = Student::find($id);
        if(!$student) {
            return response()->json([
                'message' => 'Student not found'
            ],404);
        }
    
        $data = [
            'namaMK' => $student->matakuliah['namaMK'],
            'LT1' => $student->matakuliah['LT1'],
            'LT2' => $student->matakuliah['LT2'],
            'LT3' => $student->matakuliah['LT3'],
            'LT4' => $student->matakuliah['LT4'],
            'UH1' => $student->matakuliah['UH1'],
            'UH2' => $student->matakuliah['UH2'],
            'UTS' => $student->matakuliah['UTS'],
            'UAS' => $student->matakuliah['UAS']
        ];
        return response()->json([
            'data' => $data
        ]);
    }
    


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->name = $request->name;
        $student->kelas = $request->kelas;
        $student->latihan1 = $request->latihan1;
        $student->latihan2 = $request->latihan2;
        $student->latihan3 = $request->latihan3;
        $student->latihan4 = $request->latihan4;
        $student->ulanganHarian1 = $request->ulanganHarian1;
        $student->ulanganHarian2 = $request->ulanganHarian2;
        $student->uts = $request->uts;
        $student->uas = $request->uas;
        $student->nilai = $request->nilai;
        $student->save();

        return response()->json([
            'data' => $student
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json([
            'message' => 'student deleted'
        ], 204);
    }
}
