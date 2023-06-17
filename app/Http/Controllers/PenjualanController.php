<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB ;
use App\Models\penjualan;
use App\Models\pembeli;
use App\Models\barang;
class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualans = penjualan::leftjoin('barang as b', 'b.id', '=','penjualan.id_barang')
        ->leftjoin('pembeli as p', 'p.id', '=', 'penjualan.id_pembeli')
        ->select('penjualan.*', 'b.nama_barang', 'p.nama_pembeli')
        ->get();
        return view('penjualans.index',[
            'penjualans' =>$penjualans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pembelis = pembeli::all();
        $barangs = barang::all();
        $penjualans = penjualan::all();
        return view('penjualans.create',compact('pembelis','barangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penjualan = new penjualan;
        $penjualan->tanggal_jual = $request->tanggal_jual;
        $penjualan->id_barang = $request->id_barang;
        $penjualan->jumlah_barang = $request->jumlah_barang;
        $penjualan->id_pembeli = $request->id_pembeli;
        $penjualan->save();
       //
       $barang = Barang::find($request->id_barang);
       $barang->stok_barang = $barang->stok_barang - $request->jumlah_barang;
       $barang->save();
        return redirect()->route('penjualans.index')
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
        $penjualan = penjualan::find($id);
        $barangs = barang::all();
        $pembelis = pembeli::all();
        if (!$penjualan) return redirect()->route('penjualans.index')
            ->with('error_message', 'data tidak ditemukan');
 
        return view('penjualans.edit', [
            'penjualan' => $penjualan
            ], compact('pembelis','barangs'));
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
        $penjualan = penjualan::find($id);
        
        $penjualan->tanggal_jual = $request->tanggal_jual;
        $penjualan->id_barang = $request->id_barang;
        $penjualan->jumlah_barang = $request->jumlah_barang;
        $penjualan->id_pembeli = $request->id_pembeli;
        $penjualan->save();
 
        return redirect()->route('penjualans.index')
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
        $penjualan = penjualan::find($id);
        $penjualan->delete();
       
        return redirect()->route('penjualans.index')
        ->with('success_message', 'Data berhasil dihapus');

    }
}
