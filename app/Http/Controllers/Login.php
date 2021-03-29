<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Mitra;
use App\Konsumen;
use Auth;
use Illuminate\Support\Facades\Hash;
use UxWeb\SweetAlert\SweetAlert;




class Login extends Controller
{
    public function index(){

        return view('masuk');
    }
    public function register(){

        return view('register');
    }
    public function registerm(){

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
        alert()->success('Registrasi Konsumen telah berhasil', 'Berhasil');

        return redirect('/masuk');

    }

    public function storemitra(Request $request)
    {
        $this->validate($request,[
    		'name' => 'required',
    		'email' => 'required',
    		'password' => 'required',
    		'alamat' => 'required',
    		'tanggal_lahir' => 'required',
            'noHp' => 'numeric|required',
            // 'no_rekening' => 'numeric|required'

    	]);
        Mitra::create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => Hash::make($request->password),
    		'alamat' => $request->alamat,
    		'tanggal_lahir' => $request->tanggal_lahir,
    		'noHp' => $request->noHp,
    		// 'no_rekening' => $request->no_rekening

    	]);
        alert()->success('Registrasi Mitra telah berhasil', 'Berhasil');

        return redirect('/masuk');

    }

    function masuk(Request $request)
    {
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // if successful, then redirect to their intended location
            return redirect()->intended('/admin/index');
        }else if (Auth::guard('mitra')->attempt(['email' => $request->email, 'password' => $request->password])) {

            alert()->success('Login Sebagai Mitra', 'Berhasil');
            return redirect()->intended('/mitra/index');
        }else if (Auth::guard('konsumen')->attempt(['email' => $request->email, 'password' => $request->password])) {

            alert()->success('Login Sebagai Konsumen', 'Berhasil');
            return redirect()->intended('/konsumen/index');
        }else{
            //Gagal Login
            alert()->error('Gagal Login', 'Error');
            return redirect('/masuk')->with('alert','Password atau Email, Salah !');
        }
    }

    function keluar()
    {
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }else if(Auth::guard('mitra')->check()){
            Auth::guard('mitra')->logout();
        }else if(Auth::guard('konsumen')->check()){
            Auth::guard('konsumen')->logout();
        }
        alert()->success('Anda Telah Logout', 'Berhasil');

        return redirect('/');
    }
}
