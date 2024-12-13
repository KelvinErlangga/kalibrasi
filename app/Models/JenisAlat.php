<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisAlat extends Model
{
    use HasFactory;
    protected $table = 'jenis_alat';
    protected $fillable = [
        'jenis_alat_id',
        'jenis_alat_nama',
    ];
}