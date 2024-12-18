<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriAlat extends Model
{
    use HasFactory;
    protected $table = 'kategori_alat';
    protected $fillable = [
        'kategori_alat_id',
        'kategori_alat_nama',
    ];
}
