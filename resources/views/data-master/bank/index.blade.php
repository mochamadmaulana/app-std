@extends('layout.app', ['title' => 'Bank'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0"><i class="fas fa-server"></i> Bank</h1>
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
            <a href="{{ route('data-master.bank.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Bank</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="dataSatuan" class="table table-bordered table-hover">
                <thead class="table-secondary">
                    <tr>
                        <th>Bank</th>
                        <th>Deskripsi</th>
                        <th style="width:20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bank as $val)
                        <tr>
                            <td>{{ $val->nama }}</td>
                            <td>{{ $val->deskripsi }}</td>
                            <td>
                                <a href="{{ route('data-master.bank.edit', $val->id) }}" class="btn btn-xs btn-success mr-2 shadow-sm"><i class="fas fa-edit mr-1"></i> Edit</a>
                                <form action="{{ route('data-master.bank.destroy', $val->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-xs btn-danger shadow-sm border-0" onclick="return confirm('Yakin, untuk menghapus bank {{ $val->nama }}?')"><i class="fas fa-trash-alt mr-1"></i> Hapus</button>
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
            $('#dataSatuan').DataTable({
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
