<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StatusPembayaran;

class StatusPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statusbayar= StatusPembayaran::All();
        return view('admin.status_bayar.index',compact('statusbayar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.status_bayar.tambah');
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
    		'nama_status' => 'required',
    		
    		
    	]);
 
        StatusPembayaran::create([
    		'nama_status' => $request->nama_status,
    		
    		
    	]);
 
    	return redirect('admin/status-pembayaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statusbayar = StatusPembayaran::find($id);
        return view('admin.status_bayar.edit', ['statusbayar' => $statusbayar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_status' => 'required',
            
            
         ]);
      
         $statusbayar = StatusPembayaran::find($id);
         $statusbayar->nama_status = $request->nama_status;
         
        
         $statusbayar->save();
         return redirect('admin/status-pembayaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statusbayar = StatusPembayaran::find($id);
        $statusbayar->delete();
        return redirect('admin/status-pembayaran');
    }
}
