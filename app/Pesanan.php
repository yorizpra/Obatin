<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $fillable = [
        'nama_konsumen','nama_obat','jumlah','total_harga','StatusPesanan'
    ];

    public function Detailpesanan(){
        return $this->hasMany('App\DetailPesanan', 'id_pemesanan');
    }
    public function konsumen(){
    	return $this->belongsTo(Konsumen::class,'id');
    }

    public function Konfirmasipembayaran(){
        return $this->hasMany('App\KonfirmasiPembayaran');
    }

    // public function detail()
    // {
    //     return $this->hasManyThrough(Obat::class, DetailPesanan::class, 'id_obat', 'id_pemesanan');
    // }

}
