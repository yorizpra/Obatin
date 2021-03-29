<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obat;
use App\Kategori;
use UxWeb\SweetAlert\SweetAlert;
class ObatController extends Controller
{
    public function index(){



        $obat = Obat::All();

        return view('Mitra.Obat.index',compact('obat'));
    }
public function getObat(Request $request)
{
    if($request->has("id_obat")==null){
        return response()->json([
            "status" => true,
            "code" =>200,
            "messgae" => "Get Data Sucesss!",
            "data" => Obat::with(['kategori'])->All()
        ]);
    }else{
        return response()->json([
            "status" => true,
            "code" =>200,
            "messgae" => "Get Data Sucesss!",
            "data" => Obat::with(['kategori'])->where('id',$request->id_obat)->first()
        ]);
    }

}
    public function create()
    {
        $kategori = kategori::orderBy('name_kategori', 'DESC')->get();
        return view('Mitra.Obat.tambah',compact('kategori'));
        // dd($kategori);
    }
    public function store(Request $request)
    {

        $this->validate($request, [

			'nama_obat' => 'required',
			'deskripsi_obat' => 'required',
            'stok' => 'required',
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			'indikasi' => 'required',
			'komposisi' => 'required',
			'dosis' => 'required',
			'penyajian' => 'required',
			'keterangan' => 'required',
			'kategori_id' => 'required',
			'harga' => 'required',
		]);

		// menyimpan data file yang diupload ke variabel $file
		$gambar = $request->file('gambar');

		$nama_file = time()."_".$gambar->getClientOriginalName();

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'gambar_obat';
		$gambar->move($tujuan_upload,$nama_file);

		Obat::create([

			'nama_obat' => $request->nama_obat,
			'deskripsi_obat' => $request->deskripsi_obat,
            'stok' => $request->stok,
            'gambar' => $nama_file,
			'indikasi' => $request->indikasi,
			'komposisi' => $request->komposisi,
			'dosis' => $request->dosis,
			'penyajian' => $request->penyajian,
			'keterangan' => $request->keterangan,
			'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,

        ]);
        alert()->success('Data Obat telah ditambahkan', 'Sukses');
        return redirect('mitra/obat');

    }

    public function edit($id){

        $obat = Obat::where('id', $id)->first();
        $kategori = kategori::All();

        return view('Mitra.Obat.edit', compact('kategori' ,'obat'));
    }

    public function update($id, Request $request){
            $this->validate($request,[
                'nama_obat' => 'required',
                'deskripsi_obat' => 'required',
                'stok' => 'numeric|required',
                'gambar' => 'required|file|image|mimes:jpeg,png,jpg',
                'indikasi' => 'required',
                'komposisi' => 'required',
                'dosis' => 'required',
                'penyajian' => 'required',
                'keterangan' => 'required',
                'kategori_id' => 'required',
                'harga' => 'numeric|required',
            ]);

            $obat = Obat::find($id);
            $obat->nama_obat = $request->nama_obat;
            $obat->deskripsi_obat = $request->deskripsi_obat;
            $obat->stok = $request->stok;
            if($request->file('gambar') == "")
            {
                    $obat->gambar=$obat->gambar;

                }
                else
                {

                $filename = time(). '.png'; '.jpg'; '.jpeg';
                $request->file('gambar')->move("../public/gambar_obat", $filename);
                $obat->gambar = $filename;
            }
            $obat->indikasi = $request->indikasi;
            $obat->komposisi = $request->komposisi;
            $obat->dosis = $request->dosis;
            $obat->penyajian = $request->penyajian;
            $obat->keterangan = $request->keterangan;
            $obat->kategori_id = $request->kategori_id;
            $obat->harga = $request->harga;
            $obat->save();
            alert()->success('Data Obat Telah diedit', 'Sukses');
            return redirect()->route('mitra.obat');
    }

    public function delete($id)
    {
            $obat = Obat::find($id);
            $obat->delete();

            alert()->error('Data Obat Telah dihapus', 'Delete');
            return redirect()->route('mitra.obat');
    }


}
