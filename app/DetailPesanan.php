<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    protected $table = 'detailpesanan';
    protected $fillable = [
        'id_pemesanan','id_obat','jumlah','jumlah_total','updated_at','created_at'
    ];

    public function obatku(){
    	return $this->belongsTo(Obat::class, 'id_obat');
    }


    public function pesanan(){
    	return $this->belongsTo(Pesanan::class);
    }


}
