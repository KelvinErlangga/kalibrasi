<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisAlat extends Model
{
    use HasFactory;
    protected $table = 'jenis_alat';
    protected $primaryKey = 'jenis_alat_id'; // Ganti dengan nama kolom primary key Anda

    protected $fillable = [
        'jenis_alat_id',
        'jenis_alat_nama',
    ];
    public $timestamps = false;

}