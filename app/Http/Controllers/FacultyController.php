<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::all();
        return view('website.faculty', ['title' => 'Faculty Page', 'faculties' => $faculties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.faculty_add', ['title' => 'Add Faculty Page']);
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
            'kode_fakultas' => 'required|string|min:1|max:10|unique:faculties,kode_fakultas',
            'nama_fakultas' => 'required|string|min:3|max:50'
        ]);

        try
        {
            Faculty::create($data);
        }
        catch(QueryException $e)
        {
            return redirect('/faculty')->with('error', 'Terjadi kesalahan');
        }

        return redirect('/faculty')->with('success', 'Fakultas berhasil ditambah');
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
        $faculty = Faculty::findOrFail($id);

        return view('website.faculty_edit', ['title' => 'Edit Faculty Page', 'faculty' => $faculty]);
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
            'kode_fakultas' => 'required|string|min:1|max:10|unique:faculties,kode_fakultas,'. $id .',kode_fakultas',
            'nama_fakultas' => 'required|string|min:3|max:50'
        ]);

        try
        {
            Faculty::where('kode_fakultas', $id)->update($data);
        }
        catch(QueryException $e)
        {
            return redirect('/faculty')->with('error', 'Terjadi kesalahan');
        }

        return redirect('/faculty')->with('success', 'Fakultas berhasil diedit');
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
            Faculty::destroy($id);
        }
        catch(QueryException $e)
        {
            return redirect('/faculty')->with('error', 'Terjadi kesalahan');
        }
        
        return redirect('/faculty')->with('success', 'Fakultas berhasil dihapus');
    }
}
