@extends('layout.app', ['title' => 'Pegawai'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0"><i class="fas fa-users"></i> Pegawai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Pegawai</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('pegawai.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Pegawai</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="dataPegawai" class="table table-bordered table-hover">
                <thead class="table-secondary">
                    <tr>
                        <th>Nama</th>
                        <th>Panggilan</th>
                        <th>username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pegawai as $val)
                        <tr>
                            <td>{{ $val->nama }}</td>
                            <td>{{ $val->panggilan }}</td>
                            <td>{{ $val->username }}</td>
                            <td>{{ $val->email }}</td>
                            <td>
                                @if($val->roles->count() >=1)
                                    @foreach($val->roles->pluck('name') as $p)
                                        <span class="badge badge-secondary">{{ $p }}</span>
                                    @endforeach
                                @else
                                    <span class="text-muted font-italic text-sm">Null</span>
                                @endif
                            </td>
                            <td>
                            @if(Auth::user()->username != $val->username)
                                <a href="#" class="btn btn-xs btn-info mr-2 shadow-sm" title="Detail"><i class="fas fa-eye"></i> Detail</a>
                                <a href="{{ route('pegawai.edit', $val->id) }}" class="btn btn-xs btn-success mr-2 shadow-sm"><i class="fas fa-edit"></i> Edit</a>

                                <form action="{{ route('pegawai.destroy', $val->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-xs btn-danger shadow-sm" id="btn-hapus"><i class="fas fa-trash-alt"></i> Hapus</button>
                                </form>
                            @endif
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
            $('#dataPegawai').DataTable({
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
