<?php


namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Obat;
use Illuminate\Http\Request;




class ApiObatController extends Controller
{
    public function getobatAll()
    {

        $obat = Obat::get()->toJson(JSON_PRETTY_PRINT);
        return response($obat, 200);

    }

    public function createobat(Request $request) {
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

        return response()->json([
        "message" => "obat record created"
        ], 201);

      }

      public function getobat($id) {

            if (Obat::where('id', $id)->exists()) {
                $obat = Obat::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
                return response($obat, 200);
            } else {
                return response()->json([
                "message" => "obat not found"
                ], 404);

            }
        }



      public function updateobat(Request $request, $id) {
        if (Obat::where('id', $id)->exists()) {
            $obat = Obat::find($id);

            $obat->nama_obat = is_null($request->nama_obat) ? $obat->nama_obat : $request->nama_obat;
            $obat->deskripsi_obat = is_null($request->deskripsi_obat) ? $obat->deskripsi_obat : $request->deskripsi_obat;
            $obat->stok = is_null($request->stok) ? $obat->stok : $request->stok;
            $obat->stok = is_null($request->stok) ? $obat->stok : $request->stok;
            $obat->save();

            return response()->json([
              "message" => "records updated successfully"
            ], 200);
          } else {
            return response()->json([
              "message" => "Data Obat not found"
            ], 404);
          }

      }

      public function deleteobat ($id) {

        if(Obat::where('id', $id)->exists()) {
            $obat = Obat::find($id);
            $obat->delete();

            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "obat not found"
            ], 404);
          }

      }
}
