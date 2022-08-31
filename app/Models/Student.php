<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    protected $table = 'students';

    protected $primaryKey = 'nim';

    public $incrementing = false;

    protected $keyType = 'string';

    public function studentslessons()
    {
        return $this->hasMany(StudentLesson::class, 'nim');
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'kode_jurusan');
    }
}
