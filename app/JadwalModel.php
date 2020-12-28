<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalModel extends Model
{
    //
    protected $table = 'jadwal';
    //Table yg digunakan adalah table bernama jadwal

    protected $primaryKey = 'Kode_Bus';
    //PK adalah kode_bus bukan id
}
