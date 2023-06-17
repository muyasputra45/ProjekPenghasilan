@extends('adminlte::page')
 
@section('title', 'Daftar Barang')
 
@section('content_header')
    <h1 class="m-0 text-dark">Daftar Penjualan</h1>
@stop
 
@section('content')
    <form action="{{route('penjualans.store')}}" method="post">
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
                        <td><label for="LabelTanggalpenjualan">Tanggal Penjualan</label></td>
                        <td><input type="date" id="InputTanggalpenjualan" placeholder="Tanggal Penjualan" name="tanggal_jual" value="{{old('tanggal_jual')}}"></td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td><label for="LabelIdbarang">Id Barang</label></td>
                        <td>
                        <select class="form-control" id="Inputbarang" name="id_barang">
                                <option></option>
                                @foreach ($barangs as $barang)
                                <option value="{{ $barang->id }}">{{$barang->nama_barang}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td><label for="LabelJumlahbarang">Jumlah Barang</label></td>
                        <td><input type="text" id="InputJumlahbarang" placeholder="Jumlah Barang" name="jumlah_barang" value="{{old('jumlah_barang')}}"></td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                    <td><label for="LabelIdpembeli">Id Pembeli</label></td>
                        <td>
                            <select class="form-control" id="Inputpembeli" name="id_pembeli">
                                <option></option>
                                @foreach ($pembelis as $pembeli)
                                <option value="{{ $pembeli->id }}">{{$pembeli->nama_pembeli}}</option>
                                @endforeach
                            </select>
</td>
</tr>
                    </table>
 
                </div>
 
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('penjualans.index')}}" class="btn btn-default">Batal</a>
                </div>
            </div>
        </div>
    </div>
@stop
