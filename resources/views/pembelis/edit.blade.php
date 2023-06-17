@extends('adminlte::page')
 
@section('title', 'Edit Data Barang')
 
@section('content_header')
    <h1 class="m-0 text-dark">Edit Data Pembeli</h1>
@stop
 
@section('content')
    <form action="{{route('pembelis.update', $pembeli)}}" method="post">
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
                        <td><label for="LabelNamapembeli">Nama Pembeli</label></td>
                        <td><input type="text" id="InputNamapembeli" placeholder="Nama Pembeli" name="nama_pembeli" value="{{$pembeli->nama_pembeli ?? old('nama_pembeli')}}"></td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td><label for="LabelNomertelepon">Nomer Telepon</label></td>
                        <td><input type="text" id="InputNomertelepon" placeholder="Nomer Telepon" name="no_tlp" value="{{$pembeli->no_tlp ?? old('no_tlp')}}"></td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td><label for="LabelAlamat">Alamat</label></td>
                        <td><input type="text" id="InputAlamat" placeholder="Alamat" name="alamat" value="{{$pembeli->alamat ?? old('alamat')}}"></td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td><label for="LabelNomermember">Nomer Member</label></td>
                        <td><input type="text" id="InputNomermember" placeholder="Nomer Member" name="no_member" value="{{$pembeli->no_member ?? old('no_member')}}"></td>
                    </tr>
                
                    </table>
                </div>
 
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('pembelis.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
