<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $table = 'instansi';
    protected $primaryKey = 'instansi_id';

    protected $fillable = [
        'instansi_id',
        'instansi_jenis',
        'instansi_nama',
        'instansi_alamat',
    ];
    public function jenisInstansi()
    {
        return $this->belongsTo(JenisInstansi::class, 'instansi_jenis', 'jenis_instansi_id');
    }
    public $timestamps = false;

}