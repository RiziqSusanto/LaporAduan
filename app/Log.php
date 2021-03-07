<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{

    protected $fillable = ['event_log', 'table_name', 'id_referensi', 'id_petugas', 'desc'];
    protected $table = 'logs';
}