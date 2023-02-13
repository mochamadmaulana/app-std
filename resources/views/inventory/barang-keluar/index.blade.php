@extends('layout.main-inventory', ['title' => 'Data Barang Keluar'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0">List Barang Keluar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Barang Keluar</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('inventory.barang-keluar.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Barang Keluar</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="dataBarangMasuk" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>#</th>
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
                    @foreach ($barang_masuk as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->quantity }}</td>
                            <td>{{ $value->nama_barang }}</td>
                            <td>{{ $value->satuan_barang->quantity.' '.$value->satuan_barang->nama_satuan }}</td>
                            <td>Rp. {{ number_format($value->harga_beli_perkilo) }}</td>
                            <td>Rp. {{ number_format($value->harga_total) }}</td>
                            <td>{{ $value->supplier->nama_supplier }}</td>
                            <td>
                                <a href="{{ route('inventory.barang-keluar.edit', $value->id) }}" class="btn btn-sm btn-success mr-2 shadow-sm"><i class="fas fa-edit"></i></a>

                                <!-- Delete cara pertama -->
                                {{-- <a href="{{ route('inventory.Barang Masuk.destroy', $value->id) }}" class="btn btn-sm btn-danger mr-2 shadow-sm" id="btn-hapus" title="Hapus"><i class="fas fa-trash-alt"></i></a> --}}

                                <!-- Delete cara kedua -->
                                <form action="{{ route('inventory.barang-keluar.destroy', $value->id) }}" method="POST" style="display:inline">
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
            //         text: 'Data Barang Masuk akan dihapus!',
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

            $('#dataBarangMasuk').DataTable({
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
