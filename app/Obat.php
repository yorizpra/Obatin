<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';

    protected $fillable = [
        'nama_obat','deskripsi_obat','stok','gambar','indikasi','komposisi','dosis','penyajian','keterangan','kategori_id','harga'
    ];

    public function kategori(){
    	return $this->belongsTo('App\Kategori');
    }

    public function Detailpesanan(){
        return $this->hasMany('App\DetailPesanan');
    }
}
