<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'tanggapans';
    protected $primaryKey = 'id_tanggapan';
    protected $fillable = ['pengaduan_id', 'petugas_id', 'tanggal_tanggapan', 'tanggapan'];

    public function pengaduan()
    {
        return $this->belongsTo('App\Pengaduan');
    }
    public function petugas()
    {
        return $this->belongsTo('App\Petugas');
    }
    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
}
