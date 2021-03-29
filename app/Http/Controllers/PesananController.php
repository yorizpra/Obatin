<?php

namespace App\Http\Controllers;

use App\DetailPesanan;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;
use App\Obat;
use App\StatusPemesanan;
use App\StatusPembayaran;
use App\Pesanan;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = Pesanan:: All();
        return view ('Mitra.pesanan.index', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {

    //     $obat = Obat::orderBy('nama_obat','asc')->get();
    //     $status = StatusPemesanan::orderBy('nama_status','asc')->get();
    //     // $status_bayar = StatusPembayaran::orderBy('nama_status','asc')->get();
    //     return view('Mitra.pesanan.tambah', compact('obat','status'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $this->validate($request,[
    //         'nama_konsumen'=>'required',
    //         'nama_obat'=>'required',
    //         'jumlah'=>'required',
    //         'StatusPesanan'=>'required',

    //     ]);

    //     $harga = Obat::find($request->nama_obat);
    //     $hargaobat = $harga->harga;
    //     $jumlah = $request->jumlah;
    //     $total_harga = $hargaobat * $jumlah;



    //     Pesanan::create([
    //     'nama_konsumen' => $request->nama_konsumen,
    //     'nama_obat' => $request->nama_obat,
    //     'jumlah' => $request->jumlah,
    //     'StatusPesanan' => $request->StatusPesanan,
    //     'total_harga' => $total_harga,
    //     ]);
    //     $harga->stok=$harga->stok - $jumlah;
    //     $harga->save();
    //     alert()->success('You have been logged out.', 'Good bye!');
    //     return redirect('transaksi-pesanan');

    // }
    public function getPesanan()
    {
        $pesanan = Pesanan::all();
        return response()->json($pesanan);


    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obat = Obat::orderBy('nama_obat','asc')->get();
        // $status = StatusPemesanan::orderBy('nama_status','asc')->get();
        // $status_bayar = StatusPembayaran::orderBy('nama_status','asc')->get();
        $pesanan = Pesanan::find($id);
        return view("Mitra.pesanan.edit", compact('obat','pesanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            return redirect('transaksi-pesanan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesanan = Pesanan::find($id);
            $pesanan->delete();
            return redirect('transaksi-pesanan');
    }




}
