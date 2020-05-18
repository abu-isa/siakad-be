<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    public function index()
    {
        $posts = Student::all();

        return response()->json([
            'success' => true,
            'message' => 'List data students',
            'data' => $posts
        ], 200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_number' => 'required',
            'student_name'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib di isi !',
                'data' => $validator->errors()
            ], 401);
        } else {
            $student = Student::create([
                'student_number'     => $request->input('student_number'),
                'student_name'   => $request->input('student_name'),
                'student_email'   => $request->input('student_email'),
                'student_phone'   => $request->input('student_phone'),
                'student_address'   => $request->input('student_address'),
            ]);

            if ($student) {
                return response()->json([
                    'success' => true,
                    'message' => 'Post Berhasil Disimpan!',
                    'data' => $student
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post Gagal Disimpan!',
                ], 400);
            }
        }
    }
    public function show($id)
    {
        $student = Student::find($id);

        if ($student) {
            return response()->json([
                'success'   => true,
                'message'   => 'Detail Post!',
                'data'      => $student
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post Tidak Ditemukan!',
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'student_number'   => 'required',
            'student_name' => 'required',
            'student_email' => 'required',
            'student_phone' => 'required',
            'student_address' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ], 401);
        } else {

            $student = Student::whereId($id)->update([
                'student_number'     => $request->input('student_number'),
                'student_name'   => $request->input('student_name'),
                'student_email'   => $request->input('student_email'),
                'student_phone'   => $request->input('student_phone'),
                'student_address'   => $request->input('student_address'),
            ]);

            if ($student) {
                return response()->json([
                    'success' => true,
                    'message' => 'Student Berhasil Diupdate!',
                    'data' => $student
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Student Gagal Diupdate!',
                ], 400);
            }
        }
    }
    public function destroy($id)
    {
        $student = Student::whereId($id)->first();
        $student->delete();

        if ($student) {
            return response()->json([
                'success' => true,
                'message' => 'Student Berhasil Dihapus!',
            ], 200);
        }
    }
}
