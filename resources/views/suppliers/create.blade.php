@extends('adminlte::page')
 
@section('title', 'Daftar Barang')
 
@section('content_header')
    <h1 class="m-0 text-dark">Daftar Barang</h1>
@stop
 
@section('content')
    <form action="{{route('suppliers.store')}}" method="post">
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
                        <td><label for="LabelKodesupplier">Kode Supplier</label></td>
                        <td><input type="text" id="InputKodesupplier" placeholder="Kode Supplier" name="kode_supplier" value="{{old('kode_supplier')}}"></td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td><label for="LabelNamasupplier">Nama Supplier</label></td>
                        <td><input type="text" id="InputNamasupplier" placeholder="Nama Supplier" name="nama_supplier" value="{{old('nama_supplier')}}"></td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td><label for="LabelNomertelepon">Nomer Telepon</label></td>
                        <td><input type="text" id="InputNomertelepon" placeholder="Nomer Telepon" name="no_tlp" value="{{old('no_tlp')}}"></td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td><label for="LabelAlamat">Alamat</label></td>
                        <td><input type="text" id="InputAlamat" placeholder="Alamat" name="alamat" value="{{old('alamat')}}"></td>
                    </tr>
                    </table>
 
                </div>
 
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('suppliers.index')}}" class="btn btn-default">Batal</a>
                </div>
            </div>
        </div>
    </div>
@stop
