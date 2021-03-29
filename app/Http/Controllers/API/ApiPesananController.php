<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Pesanan;
use Illuminate\Http\Request;

class ApiPesananController extends Controller
{
    public function getPesanan()
    {
        $pesanan = Pesanan::all();
        return response()->json($pesanan);


    }

    public function getPesananId($id)
    {
        if (Pesanan::where('id', $id)->exists()) {
            $pesanan = Pesanan::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($pesanan, 200);
        } else {
            return response()->json([
            "message" => "Pesanan not found"
            ], 404);

        }
    }
    public function updatePesanan(Request $request, $id) {
        if (Pesanan::where('id', $id)->exists()) {
            $pesanan = Pesanan::find($id);

            $pesanan->jumlah_harga = is_null($request->jumlah_harga) ? $pesanan->jumlah_harga : $request->jumlah_harga;
            $pesanan->metodepembayaran = is_null($request->metodepembayaran) ? $pesanan->metodepembayaran : $request->metodepembayaran;
            $pesanan->alamat = is_null($request->alamat) ? $pesanan->alamat : $request->alamat;
            $pesanan->tanggal = is_null($request->tanggal) ? $pesanan->tanggal : $request->tanggal;
            $pesanan->status = is_null($request->status) ? $pesanan->status : $request->status;
            $pesanan->save();

            return response()->json([
              "message" => "records updated successfully"
            ], 200);
          } else {
            return response()->json([
              "message" => "Data pesanan not found"
            ], 404);
          }

      }

      public function createPesanan(Request $request) {
        $pesanan = new Pesanan();
        $pesanan->id_konsumen = $request->id_konsumen;
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
      public function deletePesanan ($id) {

        if(Pesanan::where('id', $id)->exists()) {
            $pesanan = Pesanan::find($id);
            $pesanan->delete();

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

