<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    protected $table = 'mitra';

    protected $fillable = [
        'name','email','password','alamat','tanggal_lahir','noHp'
        // , 'no_rekening'
    ];
}
