<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Userkalibrasi extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    protected $table = 'user';
    protected $primaryKey = 'user_id';

    protected $fillable = ['user_username', 'user_password', 'user_nama', 'user_akses']; // Sesuaikan dengan kolom yang Anda gunakan

    public function getAuthIdentifierName()
    {
        return 'user_username';  // Nama kolom yang digunakan sebagai identifier
    }

    public function getAuthIdentifier()
    {
        return $this->user_username;  // Mengembalikan username sebagai identifier
    }

    public function getAuthPassword()
    {
        return $this->user_password; // Kolom yang menyimpan password pengguna
    }
}
