<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obat;


class WellcomeController extends Controller
{
    public function tampilobat(){
        $obat = Obat::paginate(8);


        // dd($obat);
        return view('welcome1',compact('obat'));
    }
    public function profil(){

        // dd($obat);
        return view('profil');
    }
}
