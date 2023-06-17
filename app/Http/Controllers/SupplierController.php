<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB ;
use App\Models\supplier;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = supplier::all();
        return view('suppliers.index',[
            'suppliers' =>$suppliers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier = new supplier;
        $supplier->kode_supplier = $request->kode_supplier;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->no_tlp = $request->no_tlp;
        $supplier->alamat = $request->alamat;
        $supplier->save();
       
        return redirect()->route('suppliers.index')
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
        $supplier = supplier::find($id);
        
        if (!$supplier) return redirect()->route('suppliers.index')
            ->with('error_message', 'data tidak ditemukan');
 
        return view('suppliers.edit', [
            'supplier' => $supplier
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
        $supplier = supplier::find($id);
        
        // $supplier->kode_supplier = $request->kode_supplier;
         $supplier->nama_supplier = $request->nama_supplier;
         $supplier->no_tlp = $request->no_tlp;
         $supplier->alamat = $request->alamat;
         $supplier->save();
  
         return redirect()->route('suppliers.index')
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
        $supplier = supplier::find($id);
        $supplier->delete();
       
        return redirect()->route('suppliers.index')
        ->with('success_message', 'Data berhasil dihapus');
    }
}
