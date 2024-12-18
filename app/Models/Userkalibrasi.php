<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Userkalibrasi extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    protected $users;

    protected $table = 'user';
    protected $primaryKey = 'user_id';
    public $timestamps = false; // Nonaktifkan jika tabel tidak menggunakan timestamps
    protected $keyType = 'int'; // Ganti dengan 'string' jika primary key bukan integer

    protected $fillable = [
        'user_username',
        'user_password',
        'user_nama',
        'user_akses',
    ];

    public function getAuthIdentifierName()
    {
        return 'user_username';
    }

    public function getAuthIdentifier()
    {
        return $this->user_username;
    }

    public function getAuthPassword()
    {
        return $this->user_password;
    }
}
