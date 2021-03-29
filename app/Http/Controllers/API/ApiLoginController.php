<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Konsumen;
use Auth;



class ApiLoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::guard('konsumen')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $konsumen = Konsumen::where('email', $request->email)->first();
            return response()->json([
                'konsumen' => $konsumen,
                'message' => 'berhasil login'
            ]);
        }else{
            return response()->json(['message' => 'gagal']);
        }
    }
}
