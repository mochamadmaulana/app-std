@extends('layout.main-inventory', ['title' => 'Data Supplier'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0">List Supplier</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Supplier</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('inventory.supplier.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Supplier</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="datasupplier" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Supplier</th>
                        <th>Telephone</th>
                        <th>Alamat</th>
                        <th>Deskripsi</th>
                        <th>Aktif</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($supplier as $key => $value)
                        @php
                            $no_tlp = explode(',', $value->telephone_supplier);
                        @endphp
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->nama_supplier }}</td>
                            <td>
                                @if($no_tlp > 1)
                                    @foreach($no_tlp as $i => $val_no)
                                        <ul>
                                            <li>{{ $val_no }}</li>
                                        </ul>
                                    @endforeach
                                @endif
                            </td>
                            <td>{{ $value->alamat_supplier }}</td>
                            <td>@if(empty($value->desc_supplier)) <small class="text-gray-500"><i>Tidak ada data</i></small> @else {{ $value->desc_supplier }} @endif</td>
                            <td>
                                @if ($value->aktif == 1)
                                    <span class="badge badge-sm badge-pill badge-success">Aktif</span>
                                @else
                                    <span class="badge badge-sm badge-pill badge-danger">Tidak Aktif</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('inventory.supplier.edit', $value->id) }}" class="btn btn-sm btn-success mr-2 shadow-sm"><i class="fas fa-edit"></i></a>

                                <form action="{{ route('inventory.supplier.destroy', $value->id) }}" method="POST" style="display:inline">
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
            // $(document).on('click', '#btn-hapus', function(e){
            //     e.preventDefault();
            //     var form = event.target.form;
            //     // var form = $(this).attr('href');

            //     Swal.fire({
            //         title: 'Apakah kamu yakin?',
            //         text: 'Data supplier akan dihapus!',
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

            $('#datasupplier').DataTable({
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
