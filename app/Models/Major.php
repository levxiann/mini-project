<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    protected $table = 'majors';

    protected $primaryKey = 'kode_jurusan';

    public $incrementing = false;

    protected $keyType = 'string';

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'kode_fakultas');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'kode_jurusan');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'kode_jurusan');
    }
}
