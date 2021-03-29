<?php

namespace App\Http\Controllers\API;

use App\DetailPesanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiDetailPesananController extends Controller
{
    public function getDetailPesanan()
    {
        $pesanan = DetailPesanan::all();
        return response()->json($pesanan);


    }

    public function getDetailPesananId($id)
    {
        if (DetailPesanan::where('id', $id)->exists()) {
            $pesanan_detail= DetailPesanan::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($pesanan_detail, 200);
        } else {
            return response()->json([
            "message" => "Detail pesanan not found"
            ], 404);

        }
    }
    public function updateDetailPesanan(Request $request, $id) {
        if (DetailPesanan::where('id', $id)->exists()) {
            $pesanan_detail = DetailPesanan::find($id);

            $pesanan_detail->id_pemesanan = is_null($request->id_pemesanan) ? $pesanan_detail->id_pemesanan : $request->id_pemesanan;
            $pesanan_detail->id_obat = is_null($request->id_obat) ? $pesanan_detail->id_obat : $request->id_obat;
            $pesanan_detail->jumlah = is_null($request->jumlah) ? $pesanan_detail->jumlah : $request->jumlah;
            $pesanan_detail->jumlah_total = is_null($request->jumlah_total) ? $pesanan_detail->jumlah_total : $request->jumlah_total;
            $pesanan_detail->save();

            return response()->json([
              "message" => "records updated successfully"
            ], 200);
          } else {
            return response()->json([
              "message" => "Data Detail pesanan not found"
            ], 404);
          }

      }

      public function createDetailPemesanan(Request $request) {
        $pesanan = new DetailPesanan();
        $pesanan->id_pemesanan = $request->id_pemesanan;
        $pesanan->jumlah_harga = $request->jumlah_harga;
        $pesanan->kode = $request->kode;
        $pesanan->metodepembayaran = $request->metodepembayaran;
        $pesanan->alamat = $request->alamat;
        $pesanan->tanggal = $request->tanggal;
        $pesanan->status = $request->status;

        $pesanan->save();

        return response()->json([
        "message" => "konsumen record created"
        ], 201);

      }
      public function deleteDetailPesanan ($id) {

        if(DetailPesanan::where('id', $id)->exists()) {
            $pesanan_detail = DetailPesanan::find($id);
            $pesanan_detail->delete();

            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "pesanan not found"
            ], 404);
          }

      }

}
