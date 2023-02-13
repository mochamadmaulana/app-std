@extends('layout.app', ['title' => 'Jabatan Pegawai'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0"><i class="fas fa-server"></i> Jabatan Pegawai</h1>
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
            <a href="{{ route('data-master.jabatan-pegawai.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Jabatan</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="dataJabatan" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Aktif</th>
                        <th style="width:20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jabatan_pegawai as $val)
                        <tr>
                            <td>{{ $val->nama }}</td>
                            <td>
                                @if ($val->aktif == 1)
                                    <small><span class="badge badge-pill badge-success">Aktif</span></small>
                                @else
                                    <small><span class="badge badge-pill badge-danger">Tidak Aktif</span></small>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('data-master.jabatan-pegawai.edit', $val->id) }}" class="btn btn-xs btn-success mr-2 shadow-sm"><i class="fas fa-edit"></i> Edit</a>

                                <form action="{{ route('data-master.jabatan-pegawai.destroy', $val->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-xs btn-danger shadow-sm" onclick="return confirm('Yakin, untuk menghapus jabatan {{ $val->nama }}?')"><i class="fas fa-trash-alt"></i> Hapus</button>
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
            $('#dataJabatan').DataTable({
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
