<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB ;
use App\Models\Pembeli;

class pembelicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelis = Pembeli::all();
        return view('pembelis.index',[
            'pembelis' =>$pembelis
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembelis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pembeli = new pembeli;
        $pembeli->nama_pembeli = $request->nama_pembeli;
        $pembeli->no_tlp = $request->no_tlp;
        $pembeli->alamat = $request->alamat;
        $pembeli->no_member = $request->no_member;
        $pembeli->save();
       
        return redirect()->route('pembelis.index')
            ->with('success_message', 'Berhasil menambah data baru');
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
        $pembeli = pembeli::find($id);
        
        if (!$pembeli) return redirect()->route('pembelis.index')
            ->with('error_message', 'data tidak ditemukan');
 
        return view('pembelis.edit', [
            'pembeli' => $pembeli
            ]);
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
        $pembeli = pembeli::find($id);
         $pembeli->nama_pembeli = $request->nama_pembeli;
         $pembeli->no_tlp = $request->no_tlp;
         $pembeli->alamat = $request->alamat;
         $pembeli->no_member = $request->no_member;
         $pembeli->save();
  
         return redirect()->route('pembelis.index')
             ->with('success_message', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembeli = pembeli::find($id);
        $pembeli->delete();
       
        return redirect()->route('pembelis.index')
        ->with('success_message', 'Data berhasil dihapus');
    }
}
