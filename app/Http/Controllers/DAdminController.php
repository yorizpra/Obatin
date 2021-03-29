<?php

namespace App\Http\Controllers;

use App\DetailPesanan;
use App\KonfirmasiPemabayaran;
use App\Konsumen;
use App\Mitra;
use App\Obat;
use App\Pesanan;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;



class DAdminController extends Controller
{
    public function tampil()
    {
        $title = 'Dashboard Admin';
        $mitra = Mitra::all();
        $pesanan_detail = DetailPesanan::all();
        $konsumen = Konsumen::all();

        return view('Admin.admin',compact('title','mitra','pesanan_detail','konsumen'));

    }

    public function index()
    {
        $pesanan = Pesanan:: All();
        return view ('Admin.transaksi.index', compact('pesanan'));
    }

    public function edit($id)
    {
        $obat = Obat::orderBy('nama_obat','asc')->get();
        // $status = StatusPemesanan::orderBy('nama_status','asc')->get();
        // $status_bayar = StatusPembayaran::orderBy('nama_status','asc')->get();
        $pesanan = Pesanan::find($id);
        return view('Admin.transaksi.edit', compact('obat','pesanan'));
    }

    public function update(Request $request, $id)
    {
        // $pesanan_baru = Pesanan::where('id_konsumen', Auth::guard('konsumen')->user()->id)->where('status', 0)->first();

        $obat = Obat::where('id',$id )->first();
        $pesanan = Pesanan::find($id);
            // $pesanan_detail->id_pemesanan = $request->id_pemesanan;
            $pesanan->id_konsumen = $request->id_konsumen;
            $pesanan->jumlah_harga = $request->jumlah_harga;
            $pesanan->metodepembayaran = $request->metodepembayaran;
            $pesanan->status = $request->status;

            // $pesanan_detail = DetailPesanan::where('id_obat', $obat->id)->where('id_pemesanan',$pesanan_baru->id)->first();
            // $pesanan_detail->jumlah = $pesanan_detail->jumlah + $request->jumlah_pesan;
            // $harga_pesanan_detail_baru = $obat->harga*$request->jumlah_pesan;
            // $pesanan_detail->jumlah_total = $pesanan_detail->jumlah_total + $harga_pesanan_detail_baru ;

            // $pesanan_detail->update();
            $pesanan->save();
            alert()->success('Status Transaksi Pesanan Telah diedit', 'Sukses');
            return redirect('/pemesanan');

    }

    public function destroy($id)
    {
        $pesanan = Pesanan::find($id);
            $pesanan->delete();
            alert()->error('Pesanan telah dihapus ', 'Sukses');

            return redirect('/pemesanan');
    }

    public function buktiTF()
    {
        $buktitf = KonfirmasiPemabayaran:: All();
        return view ('Mitra.pesanan.buktibayar', compact('buktitf'));
    }
}
