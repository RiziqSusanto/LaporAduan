<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'petugas';
    protected $guard = 'admin';
    protected $primaryKey = 'id_petugas';
    protected $fillable = ['nama_petugas', 'username', 'password', 'telp', 'level'];
    protected $hidden = ['password'];

    public function tanggapan()
    {
        return $this->hasMany('App\Tanggapan');
    }
}
