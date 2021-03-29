<?php

namespace App\Http\Controllers;

use App\DetailPesanan;
use App\KonfirmasiPemabayaran;
use App\Pesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SweetAlert;
use Illuminate\Support\Facades\Auth;

class KonfirmasiPembayaranController extends Controller
{
    public function bukti_tf(Request $request , $id ){
        $pesanan = Pesanan::find($id);

        // $pesanan = Pesanan::where('id', $id)->where('id_konsumen', Auth::guard('konsumen')->user()->id)->where('status', 0)->first();
        // $pembayaran = KonfirmasiPemabayaran::where('id_pemesanan',$id)->get();
        $total = DetailPesanan::where('id_pemesanan',$id)->sum('jumlah_total');

        $file = $request->file('bukti_tf');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'bukti_transfer';
        $file -> move($tujuan_upload,$nama_file);

        $tanggal = Carbon::now();

        $pembayaran = new KonfirmasiPemabayaran();

        $pembayaran->id_pemesanan = $pesanan->id;
        $pembayaran->tanggal = $tanggal;
        $pembayaran->nominal = $total;
        $pembayaran->bukti_tf = $nama_file;
        $pembayaran->status = 1;
        $pembayaran->save();

        $pesanan->status=2;
        $pesanan->update();

        alert()->success('Bukti transfer sukses di Upload', 'Success');
        return redirect('history');


    }

    public function upload($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();

        return view('konsumen.history.upload', compact('pesanan'));
    }
}
