<?php

namespace App\Http\Controllers\API;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    public function create(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required'
            ]
            );
            $student = new Student;
            $student->nama = $request->nama;
            $student->alamat = $request->alamat;
            $student->no_telp = $request->no_telp;
            $student->save();
            
        return response()->json([
            'message' => 'data student berhasil ditambah',
            'data' => $student
        ],200);
    }

    public function edit($id)

    {
        $student = Student::find($id);
        return response()->json([
                    'message' => 'success',
                    'data' => $student
                ],200);
    }

    public function update(Request $request, $id)
    {
         $student = Student::find($id);
        $request->validate([
                'nama' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required'
                ]);

         $student->update([
            'nama' =>$request->nama,
            'alamat' =>$request->alamat,
            'no_telp' =>$request->no_telp

         ]);
          return response()->json([
            'message' => 'success',
            'data' => $student
        ],200);
    }

    public function delete($id)
    {
         $student = Student::find($id)->delete();
            
         return response()->json([
            'message' => 'success deleted'
        ],200);
    }

}
