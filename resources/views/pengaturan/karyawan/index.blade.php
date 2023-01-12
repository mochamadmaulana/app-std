@extends('layout.main-pengaturan', ['title' => 'Data Karyawan'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0">List Karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Karyawan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('pengaturan.karyawan.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Karyawan</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="dataKaryawan" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Lengkap</th>
                        <th>username</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>Hak Akses</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawan as $key => $value)
                        <tr>
                            <td>{{ $key +1 }}</td>
                            <td>{{ $value->nama_lengkap }}</td>
                            <td>{{ $value->username }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->jabatan->nama_jabatan }}</td>
                            <td><span class="badge badge-sm badge-secondary">{{ $value->hak_akses }}</span></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info mr-2 shadow-sm" title="Detail"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('pengaturan.karyawan.edit', $value->id) }}" class="btn btn-sm btn-success mr-2 shadow-sm"><i class="fas fa-edit"></i></a>

                                <form action="{{ route('pengaturan.karyawan.destroy', $value->id) }}" method="POST" style="display:inline">
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
            $('#dataKaryawan').DataTable({
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
