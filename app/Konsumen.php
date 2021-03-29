<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    protected $table = 'konsumen';
    protected $fillable = [
        'name','email','password','alamat','tanggal_lahir','noHp'
    ];
    public function pesanan(){
        return $this->hasMany('App\Pesanan');
    }
    public function resep(){
        return $this->hasMany('App\Resep');
    }



}
