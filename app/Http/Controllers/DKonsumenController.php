<?php

namespace App\Http\Controllers;

use App\DetailPesanan;
use Illuminate\Http\Request;
use App\Konsumen;
use App\Obat;
use App\Pesanan;
use Illuminate\Support\Facades\Hash;
use SweetAlert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpKernel\Exception\HttpException;


class DKonsumenController extends Controller
{
    public function pesan($id)
    {

      $obat = Obat::where('id',$id)->first();
       $pesanan_detail= DetailPesanan::where('id',$id)->first();

        return view('konsumen.pesan.index',compact('obat','pesanan_detail'));


    }
    public function pesancheckout(Request $request, $id)
    {
        $obat = Obat::where('id',$id )->first();
          $tanggal = Carbon::now();
        // Validasi melebihi Stok
        if ($request->jumlah_pesan > $obat->stok) {

           return redirect('/pesan/'.$id);
        }
          //cek Validasi
           $cek_pesanan = Pesanan::where('id_konsumen', Auth::guard('konsumen')->user()->id)->where('status', 0)->first();
           if (empty($cek_pesanan)) {
               # code...  //simpan data pesanan
                $pesanan = new Pesanan;
                $pesanan->id_konsumen = Auth::guard('konsumen')->user()->id;
                $pesanan->tanggal = $tanggal;
                $pesanan->status= 0;
                $pesanan->jumlah_harga = 0;
                $pesanan->kode = mt_rand(100, 999);
                $pesanan->metodepembayaran=null;
                $pesanan->alamat = null;
                $pesanan->save();
           }

          //
          $pesanan_baru = Pesanan::where('id_konsumen', Auth::guard('konsumen')->user()->id)->where('status', 0)->first();
           // cek pesanan detail
           $cek_pesanan_detail = DetailPesanan::where('id_obat', $obat->id)->where('id_pemesanan',$pesanan_baru->id)->first();

           if (empty($cek_pesanan_detail)) {

                $pesanan_detail = new DetailPesanan;
                $pesanan_detail->id_pemesanan = $pesanan_baru->id;
                $pesanan_detail->id_obat = $obat->id;
                $pesanan_detail->jumlah = $request->jumlah_pesan;
                $pesanan_detail->jumlah_total = $obat->harga*$request->jumlah_pesan;
                $pesanan_detail->save();
           } else{
                $pesanan_detail = DetailPesanan::where('id_obat', $obat->id)->where('id_pemesanan',$pesanan_baru->id)->first();
                $pesanan_detail->jumlah = $pesanan_detail->jumlah + $request->jumlah_pesan;

                //harga sekarang
                $harga_pesanan_detail_baru = $obat->harga*$request->jumlah_pesan;
                $pesanan_detail->jumlah_total = $pesanan_detail->jumlah_total + $harga_pesanan_detail_baru ;

                $pesanan_detail->update();
           }
           //Jumlah Total
           $pesanan = Pesanan::where('id_konsumen', Auth::guard('konsumen')->user()->id)->where('status', 0)->first();
           $pesanan->jumlah_harga = $pesanan->jumlah_harga+ $obat->harga*$request->jumlah_pesan;
           $pesanan->update();
           alert()->success('Pesanan Sukses Masuk Keranjang', 'Success');
            return redirect('check-out');
    }
    public function check_out()
    {
        $pesanan = Pesanan::where('id_konsumen', Auth::guard('konsumen')->user()->id)->where('status', 0)->first();
        if(!empty($pesanan)){
        $pesanan_details = DetailPesanan::where('id_pemesanan', $pesanan->id)->get();
        // $pesanan = Pesanan::find(Auth::guard('konsumen')->user()->id)->fisrt();
        // $detail_pesanan = DetailPesanan::where('id_pemesanan', $pesanan)->get();
        return view('konsumen.pesan.check_out', compact('pesanan','pesanan_details'));
        }
        return view('konsumen.pesan.check_out');
    }

    public function delete($id)
    {
        $pesanan_detail = DetailPesanan::where('id', $id)->first();
        $pesanan = Pesanan::where('id', $pesanan_detail->id_pemesanan)->first();
        $pesanan ->jumlah_harga = $pesanan->jumlah_harga - $pesanan_detail->jumlah_total;
        $pesanan->update();
        $pesanan_detail->delete();
        alert()->error('Pesanan Telah dihapus', 'Delete');
        return redirect('check-out');

    }

    public function konfirmasi(Request $request , $id_pemesanan)
    {

        $pesanan = Pesanan::where('id_konsumen', Auth::guard('konsumen')->user()->id)->where('status', 0)->first();
        $pesanan_detail = DetailPesanan::where('id_pemesanan', $id_pemesanan)->get();
        $id_pemesanan= $pesanan->id;

        if ($request->metodepembayaran == "Transfer") {
            $pesanan->metodepembayaran = "Transfer";
            $pesanan->status = 1;
        } elseif ($request->metodepembayaran =="Cash On Dilevery"){
            $pesanan->metodepembayaran = "Cash On Dilevery";
            $pesanan->status = 2;
        }
        $pesanan->alamat = $request->alamat;
        $pesanan->update();

        $pesanan_detail = DetailPesanan::where('id_pemesanan', $id_pemesanan)->get();
        foreach ($pesanan_detail as $pd) {
            $obat = Obat::where('id',$pd->id_obat)->first();
            $obat->stok = $obat->stok - $pd->jumlah;
            $obat->update();
        }
        alert()->success('Pesanan telah di check out', 'Sukses');

        return redirect('/history');
    }

    public function tampil()
    {


        $obat = Obat::all();

        return view('konsumen.konsumen',compact('obat'));


    }

    public function index(){
        $title ='Data Konsumen';
        $konsumen= Konsumen::orderBy('name','asc')->get();
        return view('admin.konsumen.index', compact('konsumen','title'));
    }

    public function create()
    {
        return view('admin.konsumen.tambah');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
    		'name' => 'required',
    		'email' => 'required',
    		'password' => 'required',
    		'alamat' => 'required',
    		'tanggal_lahir' => 'required',
    		'noHp' => 'required'

    	]);
        Konsumen::create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => Hash::make($request->password),
    		'alamat' => $request->alamat,
    		'tanggal_lahir' => $request->tanggal_lahir,
    		'noHp' => $request->noHp

    	]);
        alert()->success('Data Konsumen telah ditambahkan', 'Sukses');

        return redirect('/admin/konsumen');

    }

    public function edit($id){
        $konsumen = Konsumen::find($id);
        return view('admin.konsumen.edit', ['konsumen' => $konsumen]);
    }

    public function update(Request $request, Konsumen $konsumen , $id)
    {
        $this->validate($request,[
            'name' => 'required',
    		'email' => 'required',
    		'password' => 'required',
    		'alamat' => 'required',
    		'tanggal_lahir' => 'required',
    		'noHp' => 'required'

         ]);

         $konsumen = Konsumen::find($id);
         $konsumen->name = $request->name;
         $konsumen->email = $request->email;
         $konsumen->password = $request->name;
         $konsumen->alamat = $request->alamat;
         $konsumen->tanggal_lahir = $request->tanggal_lahir;
         $konsumen->noHp = $request->noHp;

         $konsumen->save();
        alert()->success('Data Konsumen telah diedit', 'Sukses');

         return redirect('/admin/konsumen');
    }

    public function destroy(Konsumen $konsumen , $id)
    {
        $konsumen = Konsumen::find($id);
            $konsumen->delete();
        alert()->error('Data Konsumen telah diedit', 'Delete');

            return redirect('/admin/konsumen');
    }




}

