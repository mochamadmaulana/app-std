@extends('layout.app', ['title' => 'Data Produk'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0"><i class="fas fa-server"></i> Data Produk</h1>
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
            <a href="{{ route('produk.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Produk</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="dataProduk" class="table table-bordered table-hover">
                <thead class="table-secondary">
                    <tr>
                        <th>Nama</th>
                        <th>Kode/SKU</th>
                        <th>Kategori</th>
                        <th>Pemasok</th>
                        <th style="width:20%">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-hover">
                    @foreach ($produk as $value)
                        <tr>
                            <td>{{ $value->nama }}</td>
                            <td>{{ $value->kode }}</td>
                            <td>{{ $value->kategori_produk->nama }}</td>
                            <td>{{ $value->pemasok->perusahaan }}</td>
                            <td>
                                <a href="{{ route('produk.show', $value->id) }}" class="btn btn-xs btn-info mr-2 shadow-sm"><i class="fas fa-eye"></i> Detail</a>
                                <a href="{{ route('produk.edit', $value->id) }}" class="btn btn-xs btn-success mr-2 shadow-sm"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('produk.destroy', $value->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-xs btn-danger shadow-sm border-0" onclick="return confirm('Yakin untuk menghapus produk dengan kode {{ $value->kode }}?')"><i class="fas fa-trash-alt"></i> Hapus</button>
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
            $('#dataProduk').DataTable({
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
