@extends('layout.app', ['title' => 'Pembelian'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0"> Pembelian</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">List Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('pembelian.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Pembelian</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="dataPembelian" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Quantity</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Harga Beli/Kg</th>
                        <th>Harga Total</th>
                        <th>Supplier</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembelian as $val)
                        <tr>
                            <td>{{ $val->quantity }}</td>
                            <td>{{ $val->nama_barang }}</td>
                            <td>{{ $val->satuan_barang->quantity.' '.$val->satuan_barang->nama_satuan }}</td>
                            <td>Rp. {{ number_format($val->harga_beli_perkilo) }}</td>
                            <td>Rp. {{ number_format($val->harga_total) }}</td>
                            <td>{{ $val->supplier->nama_supplier }}</td>
                            <td>
                                <a href="{{ route('pembelian.edit', $val->id) }}" class="btn btn-xs btn-success mr-2 shadow-sm"><i class="fas fa-edit"></i> Edit</a>

                                <!-- Delete cara pertama -->
                                {{-- <a href="{{ route('inventory.Barang Masuk.destroy', $val->id) }}" class="btn btn-xs btn-danger mr-2 shadow-sm" id="btn-hapus" title="Hapus"><i class="fas fa-trash-alt"></i></a> --}}

                                <!-- Delete cara kedua -->
                                <form action="{{ route('pembelian.destroy', $val->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-xs btn-danger shadow-sm" id="btn-hapus"><i class="fas fa-trash-alt"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#dataPembelian').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
