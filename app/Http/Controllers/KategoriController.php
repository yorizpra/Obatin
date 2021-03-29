<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;



class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $kategori= Kategori::All();
        return view('Mitra.kategori.kategori',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Mitra.kategori.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
    		'name_kategori' =>array('required','regex:/(^([a-zA-Z\s]+)(\d+)?$)/u')

    	]);

        Kategori::create([
    		'name_kategori' => $request->name_kategori,

    	]);
        alert()->success('Kategori Telah ditambahkan', 'Sukses');

    	return redirect('/kategori/tampil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori, $id)
    {
        $kategori = Kategori::find($id);
         return view('Mitra.kategori.edit', ['kategori' => $kategori]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori , $id)
    {
        $this->validate($request,[
            'name_kategori' => array('required','regex:/(^([a-zA-Z\s]+)(\d+)?$)/u')

         ]);

         $kategori = Kategori::find($id);
         $kategori->name_kategori = $request->name_kategori;

         $kategori->save();
         return redirect()->route('kategori.tampil')->with('sukses','Berhasil Mengubah Data Obat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori , $id)
    {
        $kategori = Kategori::find($id);
            $kategori->delete();
            return redirect('/kategori/tampil');
    }
}
