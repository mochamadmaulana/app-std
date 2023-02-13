@extends('layout.app', ['title' => 'Pemasok'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0"><i class="fas fa-store-alt"></i> Pemasok</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">List Datar</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('pemasok.create') }}" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus"></i> Pemasok</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="dataPemasok" class="table table-bordered table-hover">
                <thead class="table-secondary">
                    <tr>
                        <th>Perushaan</th>
                        <th>Telepone</th>
                        <th>Alamat</th>
                        <th>Deskripsi</th>
                        <th>Aktif</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemasok as $value)
                        <tr>
                            <td>{{ $value->perusahaan }}</td>
                            <td>{{ $value->telepone }}</td>
                            <td>{{ $value->alamat }}</td>
                            <td>{{ $value->deskripsi }}</td>
                            <td>
                                @if ($value->aktif == 1)
                                    <span class="text-success font-italic">Aktif</span>
                                @else
                                    <span class="text-danger font-italic">Tidak Aktif</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('pemasok.edit', $value->id) }}" class="btn btn-xs btn-success mr-2 shadow-sm"><i class="fas fa-edit"></i> Edit</a>

                                <form action="{{ route('pemasok.destroy', $value->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-xs btn-danger shadow-sm" onclick="return confirm('Yakin untuk menghapus pemasok {{ $value->perusahaan }}?')" id="btn-hapus"><i class="fas fa-trash-alt"></i> Hapus</button>
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
            $('#dataPemasok').DataTable({
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
