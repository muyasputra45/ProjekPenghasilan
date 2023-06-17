@extends('adminlte::page')
 
@section('title', 'Edit Data Barang')
 
@section('content_header')
    <h1 class="m-0 text-dark">Edit Data Barang</h1>
@stop
 
@section('content')
    <form action="{{route('barangs.update', $barang)}}" method="post">
        @method('PUT')
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
                        <td><input type="text" id="InputKodebarang" placeholder="Kode Barang" name="kode_barang" value="{{$barang->kode_barang ?? old('kode_barang')}}"disabled="true"></td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td><label for="LabelNamabarang">Nama Barang</label></td>
                        <td><input type="text" id="InputNamabarang" placeholder="Nama Barang" name="nama_barang" value="{{$barang->nama_barang ?? old('nama_barang')}}"></td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td><label for="LabelHargajual">Harga Jual</label></td>
                        <td><input type="text" id="InputHarjual" placeholder="Harga Jual" name="harga_jual" value="{{$barang->harga_jual ?? old('harga_jual')}}"></td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td><label for="LabelStokbarang">Stok Barang</label></td>
                        <td><input type="text" id="InputStokbarang" placeholder="Stok Barang" name="stok_barang" value="{{$barang->stok_barang ?? old('stok_barang')}}"></td>
                    </tr>
                   
                    <tr>
                    <td><label for="LabelSupplier">Supplier</label></td>
                        <td>
                            <select class="form-control" id="InputSupplier" name="id_supplier">
                                <option></option>
                                @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}"{{$supplier->id == $barang->id_supplier ? 'selected' : ''}}>{{$supplier->nama_supplier}}</option>
                                @endforeach
                            </select>
</td>
                    </table>
                </div>
 
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('barangs.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
