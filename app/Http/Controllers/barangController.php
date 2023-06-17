<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB ;
use App\Models\Barang;
use App\Models\Supplier;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $barangs = Barang::all();
        $barangs = Barang::leftjoin('supplier as s', 's.id', '=', 'barang.id_supplier')
                    ->select('barang.*', 's.nama_supplier')
                    ->get();
        return view('barangs.index',[
            'barangs' =>$barangs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
    {
        $suppliers = supplier::all();
        return view('barangs.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = new Barang;
        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_jual = $request->harga_jual;
        $barang->stok_barang = $request->stok_barang;
        $barang->id_supplier = $request->id_supplier;
        $barang->save();
       
        return redirect()->route('barangs.index')
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
        $suppliers = supplier::all();
        $barang = Barang::find($id);
        
        if (!$barang) return redirect()->route('barangs.index')
            ->with('error_message', 'data tidak ditemukan');
 
        return view('barangs.edit', [
            'barang' => $barang
            ], compact('suppliers'));
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
        $barang = Barang::find($id);
        
       // $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_jual = $request->harga_jual;
        $barang->stok_barang = $request->stok_barang;
        $barang->id_supplier = $request->id_supplier;
        $barang->save();
 
        return redirect()->route('barangs.index')
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
        $barang = Barang::find($id);
        $barang->delete();
       
        return redirect()->route('barangs.index')
        ->with('success_message', 'Data berhasil dihapus');

    }
}
