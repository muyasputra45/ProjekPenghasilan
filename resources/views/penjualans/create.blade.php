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
                                <td><label for="LabelTanggalPemasukan">Tanggal Pemasukan</label></td>
                                <td><input type="date" id="InputTanggalPemasukan" placeholder="Tanggal Pemasukan" name="tanggal_pemasukan" value="{{old('tanggal_pemasukan')}}"></td>
                            </tr>
                            <tr></tr>
                            <tr></tr>
                            <tr></tr>
                            <tr>
                                <td><label for="LabelIdbarang">Nama Driver</label></td>
                                <td>
                                    <select class="form-control" id="Inputbarang" name="id_barang">
                                        <option></option>
                                        @foreach ($barangs as $barang)
                                            <option value="{{ $barang->id }}">{{$barang->nama_driver}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr></tr>
                            <tr></tr>
                            <tr></tr>
                            <tr>
                                <td><label for="LabelPemasukan">Jumlah Pemasukan</label></td>
                                <td><input type="text" id="InputPenghasilan" placeholder="Jumlah Pemasukan" name="penghasilan_driver" value="{{old('penghasilan_driver')}}"></td>
                            </tr>
                            <tr></tr>
                            <tr></tr>
                            <tr></tr>

                        </table>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('penjualans.index')}}" class="btn btn-default">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        // Fungsi untuk mengubah format input jumlah pemasukan menjadi format rupiah
        function formatRupiah(angka) {
            var number_string = angka.toString().replace(/[^,\d]/g, ''),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            return  rupiah;
        }

        // Fungsi untuk mengubah format rupiah saat input jumlah pemasukan berubah
        document.getElementById('InputPenghasilan').addEventListener('input', function (e) {
            var nominal = e.target.value;
            e.target.value = formatRupiah(nominal);
        });
    </script>
@stop
