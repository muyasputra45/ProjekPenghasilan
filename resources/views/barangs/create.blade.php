@extends('adminlte::page')
 
@section('title', 'Daftar Barang')
 
@section('content_header')
    <h1 class="m-0 text-dark">Daftar Barang</h1>
@stop
 
@section('content')
    <form action="{{route('barangs.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="overflow:auto">
 
                    <table style="width:100%">
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td><label for="LabelKodebarang">Kode Barang</label></td>
                        <td><input type="text" id="InputKodebarang" placeholder="Kode Barang" name="kode_barang" value="{{old('kode_barang')}}"></td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td><label for="LabelNamabarang">Nama Barang</label></td>
                        <td><input type="text" id="InputNamabarang" placeholder="Nama Barang" name="nama_barang" value="{{old('nama_barang')}}"></td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td><label for="LabelHargajual">Harga Jual</label></td>
                        <td><input type="text" id="InputHargajual" placeholder="Harga Jual" name="harga_jual" value="{{old('harga_jual')}}"></td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td><label for="LabelStokbarang">Stok Barang</label></td>
                        <td><input type="text" id="InputStokbarang" placeholder="Stok Barang" name="stok_barang" value="{{old('stok_barang')}}"></td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                    <td><label for="LabelSupplier">Supplier</label></td>
                        <td>
                            <select class="form-control" id="InputSupplier" name="id_supplier">
                                <option></option>
                                @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{$supplier->nama_supplier}}</option>
                                @endforeach
                            </select>
</td>
</tr>
                    </table>
 
                </div>
 
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('barangs.index')}}" class="btn btn-default">Batal</a>
                </div>
            </div>
        </div>
    </div>
@stop
