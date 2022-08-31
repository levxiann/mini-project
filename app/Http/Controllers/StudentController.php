<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Student;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('website.student', ['title' => 'Lesson Page', 'students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors = Major::all();

        return view('website.student_add', ['title' => 'Add Student Page', 'majors' => $majors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nim' => 'required|string|min:1|max:9|unique:students,nim',
            'nama' => 'required|string|min:3|max:50',
            'tanggal_lahir' => 'required|before:today',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'email' => 'required|string|email:dns|max:255|unique:students',
            'no_telp' => 'required|min:7|max:20',
            'alamat' => 'required|min:1|max:255',
            'semester' => 'required',
            'kode_jurusan' => 'required',
        ]);

        try
        {
            Student::create($data);
        }
        catch(QueryException $e)
        {
            return redirect('/student')->with('error', 'Terjadi kesalahan');
        }

        return redirect('/student')->with('success', 'Mahasiswa berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('website.student_detail', ['title' => 'Lesson Page', 'student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $majors = Major::all();
        $student = Student::findOrFail($id);

        return view('website.student_edit', ['title' => 'Edit Student Page', 'student' => $student, 'majors' => $majors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nim' => 'required|string|min:1|max:9|unique:students,nim,' . $id . ',nim',
            'nama' => 'required|string|min:3|max:50',
            'tanggal_lahir' => 'required|before:today',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'email' => 'required|string|email:dns|max:255|unique:students,email,' . $id . ',nim',
            'no_telp' => 'required|min:7|max:20',
            'alamat' => 'required|min:1|max:255',
            'semester' => 'required',
            'kode_jurusan' => 'required',
        ]);

        try
        {
            Student::where('nim', $id)->update($data);
        }
        catch(QueryException $e)
        {
            return redirect('/student')->with('error', 'Terjadi kesalahan');
        }

        return redirect('/student')->with('success', 'Mahasiswa berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            Student::destroy($id);
        }
        catch(QueryException $e)
        {
            return redirect('/student')->with('error', 'Terjadi kesalahan');
        }
        
        return redirect('/student')->with('success', 'Mahasiswa berhasil dihapus');
    }
}
