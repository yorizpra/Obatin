<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = [
        'name_kategori'
    ];

    public function obat(){
        return $this->hasMany('App\Obat');
    }
}
