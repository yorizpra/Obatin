<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StatusPemesanan;

class StatusPemesananController extends Controller
{
    public function index()
    {
        
        $status= StatusPemesanan::All();
        return view('admin.status.index',compact('status'));
    }

    public function create()
    {
        return view('admin.status.tambah');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
    		'nama_status' => 'required',
    		'urutan' => 'required',
    		
    	]);
 
        StatusPemesanan::create([
    		'nama_status' => $request->nama_status,
    		'urutan' => $request->urutan,
    		
    	]);
 
    	return redirect('admin/status-pemesanan');
    }

    public function edit(StatusPemesanan $status, $id)
    {
        $status = StatusPemesanan::find($id);
         return view('admin.status.edit', ['status' => $status]);
    }

    public function update(Request $request, StatusPemesanan $status , $id)
    {
        $this->validate($request,[
            'nama_status' => 'required',
            'urutan' => 'required',
            
         ]);
      
         $status = StatusPemesanan::find($id);
         $status->nama_status = $request->nama_status;
         $status->urutan = $request->urutan;
        
         $status->save();
         return redirect('admin/status-pemesanan');
    }

    public function destroy(StatusPemesanan $status , $id)
    {
        $status = StatusPemesanan::find($id);
            $status->delete();
            return redirect('admin/status-pemesanan');
    }

}
