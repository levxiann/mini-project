<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Major;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majors = Major::all();
        return view('website.major', ['title' => 'Major Page', 'majors' => $majors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::all();

        return view('website.major_add', ['title' => 'Add Major Page', 'faculties' => $faculties]);
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
            'kode_jurusan' => 'required|string|min:1|max:10|unique:majors,kode_jurusan',
            'nama_jurusan' => 'required|string|min:3|max:50',
            'kode_fakultas' => 'required'
        ]);

        try
        {
            Major::create($data);
        }
        catch(QueryException $e)
        {
            return redirect('/major')->with('error', 'Terjadi kesalahan');
        }

        return redirect('/major')->with('success', 'Jurusan berhasil ditambah');
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
        $faculties = Faculty::all();
        $major = Major::findOrFail($id);

        return view('website.major_edit', ['title' => 'Edit Major Page', 'major' => $major, 'faculties' => $faculties]);
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
            'kode_jurusan' => 'required|string|min:1|max:10|unique:majors,kode_jurusan,' . $id . ',kode_jurusan',
            'nama_jurusan' => 'required|string|min:3|max:50',
            'kode_fakultas' => 'required'
        ]);

        try
        {
            Major::where('kode_jurusan', $id)->update($data);
        }
        catch(QueryException $e)
        {
            return redirect('/major')->with('error', 'Terjadi kesalahan');
        }

        return redirect('/major')->with('success', 'Jurusan berhasil diedit');
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
            Major::destroy($id);
        }
        catch(QueryException $e)
        {
            return redirect('/major')->with('error', 'Terjadi kesalahan');
        }
        
        return redirect('/major')->with('success', 'Jurusan berhasil dihapus');
    }
}
