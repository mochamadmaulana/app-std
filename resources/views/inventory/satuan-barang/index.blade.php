@extends('layout.main-inventory', ['title' => 'Data Satuan Barang'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0">List Satuan Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Satuan Barang</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('inventory.satuan-barang.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Satuan Barang</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="dataSatuanBarang" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Satuan</th>
                        <th>Quantity</th>
                        <th style="width:10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($satuan_barang as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->nama_satuan }}</td>
                            <td>{{ $value->quantity }}</td>
                            <td>
                                <a href="{{ route('inventory.satuan-barang.edit', $value->id) }}" class="btn btn-sm btn-success mr-2 shadow-sm"><i class="fas fa-edit"></i></a>

                                <form action="{{ route('inventory.satuan-barang.destroy', $value->id) }}" method="POST"
                                    style="display:inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger shadow-sm" id="btn-hapus"><i class="fas fa-trash-alt"></i></button>
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
    @if (session()->has('success'))
    <script>
        toastr.success('{{ session('success') }}')
    </script>
    @endif
    @if (session()->has('error'))
    <script>
        $(document).ready(function() {
            toastr.error('{{ session('error') }}')
        });
    </script>
    @endif

    <script>
        $(document).ready(function() {
            $('#dataSatuanBarang').DataTable({
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
