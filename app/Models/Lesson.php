<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    protected $table = 'lessons';

    protected $primaryKey = 'kode_matkul';

    public $incrementing = false;

    protected $keyType = 'string';

    public function studentslessons()
    {
        return $this->hasMany(StudentLesson::class, 'kode_matkul');
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'kode_jurusan');
    }
}
