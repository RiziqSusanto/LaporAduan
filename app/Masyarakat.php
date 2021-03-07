<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Masyarakat extends Authenticatable
{
    protected $table = 'masyarakats';
    protected $primaryKey = 'nik';
    protected $fillable = ['nik', 'nama', 'username', 'password', 'telp'];
    protected $hidden = ['password'];
    protected $guard = 'masyarakat';

    public function pengaduans()
    {
        return $this->hasMany('App\Pengaduan');
    }
}
