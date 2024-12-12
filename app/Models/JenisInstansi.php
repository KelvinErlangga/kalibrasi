<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisInstansi extends Model
{
    use HasFactory;
    protected $table = 'jenis_instansi';
    protected $fillable = [
        'jenis_instansi_id',
        'jenis_instansi_nama',
    ];
}
