@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Data Penjualan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="overflow:auto">
                <a href="{{route('penjualans.create')}}"class="btn btn-primary mb-2">
                    Tambah
</a>
 
                    <table class="table table-hover table-bordered table-stripped" id="example2" style="font-size: 10px">
                        <thead>
                        <tr>
                            <!-- <th>Id Unit</th> -->
                            <th>No</th>
                            <th>Tanggal Jual</th>
                            <th>Id Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Id Pembeli</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($penjualans as $key => $penjualan)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$penjualan->tanggal_jual}}</td>
                                <td>{{$penjualan->id_barang}}{{$penjualan->nama_barang}}</td>
                                <td>{{$penjualan->jumlah_barang}}</td>
                                <td>{{$penjualan->id_pembeli}}{{$penjualan->nama_pembeli}}</td>
                                <td>
                                    <a href="{{route('penjualans.edit', $penjualan)}}" class="fas fa-edit fa-lg"></a>
                
                                &nbsp;
                                <a href="{{route('penjualans.destroy', $penjualan)}}" onclick="notificationBeforeDelete(event, this)" class="fas fa-trash fa-lg text-danger"></a>
</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
 
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
 
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
