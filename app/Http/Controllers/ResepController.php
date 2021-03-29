<?php

namespace App\Http\Controllers;

use App\Konsumen;
use App\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SweetAlert;

class ResepController extends Controller
{
    public function store(Request $request)
    {

        $this->validate($request, [

            'id_konsumen'=> 'required',
            'resep' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			'keterangan' => 'required',



		]);

		// menyimpan data file yang diupload ke variabel $file
		$gambar_resep = $request->file('resep');

		$nama_file = time()."_".$gambar_resep->getClientOriginalName();

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'gambar_obat';
		$gambar_resep->move($tujuan_upload,$nama_file);


		Resep::create([
            'id_konsumen'=>$request->id_konsumen,
            'resep' => $nama_file,
			'keterangan' => $request->keterangan,




        ]);
        alert()->success('Sukses Menggunggah Resep', 'Sukses');
        return redirect('/konsumen/index');



    }
    public function index()
    {
        $reseps = Resep::with('konsumen')->get();
        $konsumens = Konsumen::all();
        $konsumens = Konsumen::select('id', 'name')->get();

        return view('Mitra.resep.index',compact('reseps', 'konsumens'));
    }
    public function edit($id)
    {
        $resep = Resep::find($id);

        return view('Mitra.resep.edit',compact('resep'));
    }

    public function update($id, Request $request){

        $resep = Resep::find($id);

        $resep->resep = $request->resep;
        $resep->keterangan = $request->keterangan;
        $resep->balasan = $request->balasan;

        $resep->save();
        alert()->success('Data rese$resep Telah diedit', 'Sukses');
        return redirect('upload');
    }

    public function destroy($id)
    {
            $resep = Resep::find($id);
            $resep->delete();

            alert()->error('Resep Telah dihapus', 'Delete');
            return redirect('upload');
    }
    public function resep()
    {
        $reseps = Resep::where('id_konsumen', Auth::guard('konsumen')->user()->id)->get();
        // $resep = Resep::all();
        // dd($resep);
        return view('konsumen.resep.index',compact('reseps'));

    }



}
