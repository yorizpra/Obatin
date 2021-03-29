<?php

namespace App\Http\Controllers;

use App\DetailPesanan;
use Illuminate\Http\Request;
use App\Obat;
use App\Kategori;
use App\Mitra;
use App\Pesanan;
use UxWeb\SweetAlert\SweetAlert;

use Illuminate\Support\Facades\Hash;

class DMitraController extends Controller
{
    public function tampil()
    {
        $title = 'Dashboard Mitra';
        $obat  = Obat::get();
        $kategori  = Kategori::get();
        $pesanan_detail  = DetailPesanan::get();
        $pesanan = Pesanan::get();



        return view('Mitra.mitra',compact('title','obat','kategori','pesanan_detail','pesanan'));

    }

    public function index(){
        $title ='Data Konsumen';
        $mitra = Mitra::orderBy('name','asc')->get();
        return view('Admin.mitra.index', compact('mitra','title'));
    }

    public function create()
    {
        return view('registermitra');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
    		'name' => 'required',
    		'email' => 'required',
    		'password' => 'required',
    		'alamat' => 'required',
    		'tanggal_lahir' => 'required',
    		'noHp' => 'numeric|required'

    	]);
        Mitra::create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => Hash::make($request->password),
    		'alamat' => $request->alamat,
    		'tanggal_lahir' => $request->tanggal_lahir,
    		'noHp' => $request->noHp

    	]);
        alert()->success('Data Mitra telah ditambahkan', 'Sukses');

        return redirect('/masuk');

    }

    public function edit($id){
        $mitra = Mitra::find($id);
        return view('Admin.mitra.edit', ['mitra' => $mitra]);
    }

    public function update(Request $request, Mitra $mitra , $id)
    {
        $this->validate($request,[
            'name' => 'required',
    		'email' => 'required',
    		'password' => 'required',
    		'alamat' => 'required',
    		'tanggal_lahir' => 'required',
            'noHp' => 'numeric|required',
            'no_rekening' => 'numeric|required'

         ]);

         $mitra = Mitra::find($id);
         $mitra->name = $request->name;
         $mitra->email = $request->email;
         $mitra->password = $request->name;
         $mitra->alamat = $request->alamat;
         $mitra->tanggal_lahir = $request->tanggal_lahir;
         $mitra->noHp = $request->noHp;
         $mitra->no_rekening = $request->no_rekening;

         $mitra->save();
        alert()->success('Data Mitra telah diedit', 'Sukses');

         return redirect('/admin/mitra');
    }

    public function destroy(Mitra $mitra , $id)
    {
        $mitra = Mitra::find($id);
            $mitra->delete();
        alert()->error('Data Mitra telah diedit', 'Delete');

            return redirect('/admin/mitra');
    }



}
