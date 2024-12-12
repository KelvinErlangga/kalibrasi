<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $table = 'instansi';
    protected $fillable = [
        'instansi_id',
        'instansi_jenis',
        'instansi_nama',
        'instansi_alamat',
    ];
}
