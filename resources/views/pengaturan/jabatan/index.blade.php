@extends('layout.main-pengaturan', ['title' => 'Data Jabatan'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0">List Jabatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Jabatan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('pengaturan.jabatan.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Jabatan</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="dataJabatan" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Jabatan</th>
                        <th>Aktif</th>
                        <th style="width:10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jabatan as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->nama_jabatan }}</td>
                            <td>
                                @if ($value->aktif == 1)
                                    <span class="badge badge-sm badge-pill badge-success">Aktif</span>
                                @else
                                    <span class="badge badge-sm badge-pill badge-danger">Tidak Aktif</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('pengaturan.jabatan.edit', $value->id) }}" class="btn btn-sm btn-success mr-2 shadow-sm"><i class="fas fa-edit"></i></a>

                                <form action="{{ route('pengaturan.jabatan.destroy', $value->id) }}" method="POST"
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
        //  $(document).on('click', '#btn-hapus', function(e){
        //     e.preventDefault();
        //     var form = event.target.form;
        //     // var form = $(this).attr('href');

        //     Swal.fire({
        //         title: 'Apakah kamu yakin?',
        //         text: 'Data jabatan akan dihapus!',
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Ya, hapus!'
        //     }).then((result) => {
        //     if (result.isConfirmed) {
        //         // window.location = url
        //             form.submit();
        //         }
        //     })
        // })

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
