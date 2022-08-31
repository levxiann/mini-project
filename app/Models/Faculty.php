<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    protected $table = 'faculties';

    protected $primaryKey = 'kode_fakultas';

    public $incrementing = false;

    protected $keyType = 'string';

    public function majors()
    {
        return $this->hasMany(Major::class, 'kode_fakultas');
    }
}
