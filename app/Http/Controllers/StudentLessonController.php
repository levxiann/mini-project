<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Student;
use App\Models\StudentLesson;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class StudentLessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

        return view('website.studentlesson', ['title' => 'Student Lesson Page', 'students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id, $sem = NULL)
    {
        $student = Student::findOrFail($id);

        if($request->has('semester'))
        {
            $semester = (int) $request->semester;
        }
        elseif(in_array($sem, [1, 2, 3, 4, 5, 6, 7, 8]))
        {
            $semester = (int) $sem;
        }
        else
        {
            $semester = (int) $student->semester;
        }

        $stuless = StudentLesson::where('nim', $student->nim)->where('semester', $semester)->get();

        return view('website.studentlesson_detail', ['title' => 'KRS Page', 'student' => $student, 'stuless' => $stuless, 'semester' => $semester]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $sem)
    {
        $student = Student::findOrFail($id);

        if($sem % 2 == 1)
        {
            $lessons = Lesson::whereIn('semester', [1, 3, 5, 7])->where('kode_jurusan', $student->kode_jurusan)->get();
        }
        else
        {
            $lessons = Lesson::whereIn('semester', [2, 4, 6, 8])->where('kode_jurusan', $student->kode_jurusan)->get();
        }

        $stuless = StudentLesson::where('nim', $student->nim)->where('semester', $sem)->pluck('kode_matkul')->toArray();

        return view('website.studentlesson_edit', ['title' => 'Edit KRS Page', 'student' => $student, 'lessons' => $lessons, 'stuless' => $stuless, 'semester' => $sem]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $sem)
    {
        $request->validate([
            'kode_matkul' => 'required'
        ]);

        $student = Student::findOrFail($id);

        $sks = 0;

        foreach($request->kode_matkul as $km)
        {
            $matkul = Lesson::findOrFail($km);

            $sks += $matkul->sks;
        }

        if($sks > 24)
        {
            return redirect('/stuless/' . $student->nim . '/' . $sem)->with('error', 'Maksimum SKS yang dapat diambil hanya 24 SKS');
        }

        try
        {
            StudentLesson::where('nim', $student->nim)->where('semester', $sem)->delete();

            foreach($request->kode_matkul as $km)
            {
                StudentLesson::create([
                    'nim' => $student->nim,
                    'kode_matkul' => $km,
                    'semester' => $sem
                ]);
            }
        }
        catch(QueryException $e)
        {
            return redirect('/stuless/' . $student->nim . '/' . $sem)->with('error', 'Terjadi kesalahan');
        }

        return redirect('/stuless/' . $student->nim . '/' . $sem)->with('success', 'KRS berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
