@extends('adminlte::page')
 
@section('title', 'Edit Data Barang')
 
@section('content_header')
    <h1 class="m-0 text-dark">Edit Data Penjualan</h1>
@stop
 
@section('content')
    <form action="{{route('penjualans.update', $penjualan)}}" method="post">
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
                        <td><label for="LabelTanggaljual">Tanggal Jual</label></td>
                        <td><input type="date" id="InputTanggaljual" placeholder="Tanggal Jual" name="tanggal_jual" value="{{$penjualan->tanggal_jual ?? old('tanggal_jual')}}"></td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                    <td><label for="LabelIdbarang">Id Barang</label></td>
                        <td>
                            <select class="form-control" id="InputIdbarang" name="id_barang">
                                <option></option>
                                @foreach ($barangs as $barang)
                                <option value="{{ $barang->id }}"{{$barang->id == $penjualan->id_barang ? 'selected' : ''}}>{{$barang->nama_barang}}</option>
                                @endforeach
                            </select>
</td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td><label for="LabelJumlahbarang">Jumlah Barang</label></td>
                        <td><input type="text" id="InputJumlahbarang" placeholder="jumlah Barang" name="jumlah_barang" value="{{$penjualan->jumlah_barang ?? old('jumlah_barang')}}"></td>
                    </tr>
                   
                    <tr>
                    <td><label for="LabelIdpembeli">Id Pembeli</label></td>
                        <td>
                            <select class="form-control" id="InputIdpembeli" name="id_pembeli">
                                <option></option>
                                @foreach ($pembelis as $pembeli)
                                <option value="{{ $pembeli->id }}">{{$pembeli->nama_pembeli}}</option>
                                @endforeach
                            </select>
</td>
                    </table>
                </div>
 
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('penjualans.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
