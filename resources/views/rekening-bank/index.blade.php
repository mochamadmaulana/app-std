@extends('layout.app', ['title' => 'Rekening Bank'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0"><i class="far fa-credit-card"></i> Rekening Bank</h1>
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
            <a href="{{ route('rekening-bank.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Rekening Bank</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="dataSatuan" class="table table-bordered table-hover">
                <thead class="table-secondary">
                    <tr>
                        <th>Pemilik</th>
                        <th>No Rekening</th>
                        <th>Bank</th>
                        <th>Deskripsi</th>
                        <th style="width:20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rekening_bank as $val)
                        <tr>
                            <td>{{ $val->pemilik }}</td>
                            <td>{{ $val->nomor }}</td>
                            <td>{{ $val->bank->nama }}</td>
                            <td>{{ $val->bank->deskripsi }}</td>
                            <td>
                                <a href="{{ route('rekening-bank.edit', $val->id) }}" class="btn btn-xs btn-success mr-2 shadow-sm"><i class="fas fa-edit mr-1"></i> Edit</a>
                                <form action="{{ route('rekening-bank.destroy', $val->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-xs btn-danger shadow-sm border-0" onclick="return confirm('Yakin, untuk menghapus Rekening {{ $val->nama }}?')"><i class="fas fa-trash-alt mr-1"></i> Hapus</button>
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
