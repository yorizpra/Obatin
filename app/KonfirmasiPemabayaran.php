<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KonfirmasiPemabayaran extends Model
{
    protected $table = 'konfirmasipembayaran';
    protected $fillable = [
        'id_pemesanan','tanggal','nominal','bukti_tf','status'
    ];

    public function pesanan(){
    	return $this->belongsTo(Pesanan::class);
    }
}
