<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLesson extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    protected $table = 'students_lessons';

    public function student()
    {
        return $this->belongsTo(Student::class, 'nim');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'kode_matkul');
    }
}
