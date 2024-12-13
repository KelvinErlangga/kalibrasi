<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Userkalibrasi extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    // Kolom-kolom yang ada di tabel 'userkalibrasi'
    protected $table = 'user'; // Sesuaikan dengan nama tabel Anda

    protected $fillable = ['user_username', 'user_password', 'user_nama']; // Sesuaikan dengan kolom yang Anda gunakan

    // Atur nama kolom ID dan password sesuai dengan tabel Anda
    public function getAuthIdentifierName()
    {
        return 'id';  // Nama kolom yang digunakan sebagai identifier
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();  // Biasanya mengembalikan ID pengguna
    }

    public function getAuthPassword()
    {
        return $this->user_password; // Kolom yang menyimpan password pengguna
    }
}
