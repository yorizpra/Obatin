<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Konsumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ApiKonsumenController extends Controller
{
    public function getkonsumenAll()
    {

        $konsumen = Konsumen::get()->toJson(JSON_PRETTY_PRINT);
        return response($konsumen, 200);

    }

    public function createKonsumen(Request $request) {
        $konsumen = new Konsumen();
        $konsumen->name = $request->name;
        $konsumen->email = $request->email;
        $konsumen->password = Hash::make($request->password);


        $konsumen->save();

        return response()->json([
        "message" => "konsumen record created"
        ], 201);

      }

      public function getKonsumen($id) {

            if (Konsumen::where('id', $id)->exists()) {
                $konsumen = Konsumen::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
                return response($konsumen, 200);
            } else {
                return response()->json([
                "message" => "Student not found"
                ], 404);

            }
        }



      public function updateKonsumen(Request $request, $id) {
        if (Konsumen::where('id', $id)->exists()) {
            $konsumen = Konsumen::find($id);

            $konsumen->name = is_null($request->name) ? $konsumen->name : $request->name;
            $konsumen->email = is_null($request->email) ? $konsumen->email : $request->email;
            $konsumen->password = is_null($request->password) ? $konsumen->password : $request->password;
            $konsumen->save();

            return response()->json([
              "message" => "records updated successfully"
            ], 200);
          } else {
            return response()->json([
              "message" => "konsumen not found"
            ], 404);
          }

      }

      public function deleteKonsumen ($id) {

        if(Konsumen::where('id', $id)->exists()) {
            $konsumen = Konsumen::find($id);
            $konsumen->delete();

            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Konsumen not found"
            ], 404);
          }

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

            return response()->json([
                "message" => "Register lagi record created"
                ], 201);

        }
}
