<?php

namespace App\Http\Controllers;

use App\DetailPesanan;
use App\KonfirmasiPemabayaran;
use App\Mitra;
use App\Obat;
use App\Pesanan;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class HistoryController extends Controller
{

    public function index()
    {
        $pesanans = Pesanan::where('id_konsumen', Auth::guard('konsumen')->user()->id)->where('status','!=', 0)->get();
        return view('konsumen.history.index', compact('pesanans'));
    }
    public function detail($id)
    {
        $pesanans = Pesanan::where('id',$id)->first();
        $mitra = Mitra::all();
        $pesanan_details = DetailPesanan::where('id_pemesanan', $pesanans->id)->get();

        return view('konsumen.history.detail', compact('pesanans','pesanan_details','mitra'));

    }

    public function cetakPDF($id)
    {
       $obat     = Obat::all();
       $pesanan = Pesanan::where('id',$id)->first();
       $pesanan_detail = DetailPesanan::where('id_pemesanan', $pesanan->id)->get();
       $total = DetailPesanan::where('id_pemesanan', $pesanan->id)->sum('jumlah_total');

       $pdf = PDF::loadview('konsumen.history.cetakpdf', compact('obat','pesanan','pesanan_detail','total'));
       return $pdf->stream('cetak-pemesanan-obat.pdf');
    }
}
