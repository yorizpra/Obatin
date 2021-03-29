<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPemesanan extends Model
{
    protected $table = 'StatusPesanan';

    protected $fillable = [
        'nama_status','urutan',
    ];

    public function Pesanan(){
        return $this->hasMany('App\Pesanan');
    }
}
