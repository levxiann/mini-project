<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Major;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();
        return view('website.lesson', ['title' => 'Lesson Page', 'lessons' => $lessons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors = Major::all();

        return view('website.lesson_add', ['title' => 'Add Lesson Page', 'majors' => $majors]);
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
            'kode_matkul' => 'required|string|min:1|max:10|unique:lessons,kode_matkul',
            'nama_matkul' => 'required|string|min:3|max:100',
            'sks' => 'required',
            'kode_jurusan' => 'required',
            'semester' => 'required' 
        ]);

        try
        {
            Lesson::create($data);
        }
        catch(QueryException $e)
        {
            return redirect('/lesson')->with('error', 'Terjadi kesalahan');
        }

        return redirect('/lesson')->with('success', 'Mata Kuliah berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $lesson = Lesson::findOrFail($id);

        return view('website.lesson_edit', ['title' => 'Edit Lesson Page', 'lesson' => $lesson, 'majors' => $majors]);
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
            'kode_matkul' => 'required|string|min:1|max:10|unique:lessons,kode_matkul,'. $id . ',kode_matkul',
            'nama_matkul' => 'required|string|min:3|max:100',
            'sks' => 'required',
            'kode_jurusan' => 'required',
            'semester' => 'required' 
        ]);

        try
        {
            Lesson::where('kode_matkul', $id)->update($data);
        }
        catch(QueryException $e)
        {
            return redirect('/lesson')->with('error', 'Terjadi kesalahan');
        }

        return redirect('/lesson')->with('success', 'Mata Kuliah berhasil diedit');
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
            Lesson::destroy($id);
        }
        catch(QueryException $e)
        {
            return redirect('/lesson')->with('error', 'Terjadi kesalahan');
        }
        
        return redirect('/lesson')->with('success', 'Mata Kuliah berhasil dihapus');
    }
}
