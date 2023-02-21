@extends('layout.app', ['title' => 'Role Akses'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0"><i class="fas fa-settings"></i> Role Akses</h1>
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
            <button type="button" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahModal">
                <i class="fas fa-plus"></i> Akses
            </button>
        </div>
        <div class="card-body">
            <table id="dataRoleAkses" class="table table-bordered table-hover">
                <thead class="table-secondary">
                    <tr>
                        <th>Role</th>
                        <th>Akses</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($role_akses as $val)
                    <tr>
                            <td>{{ $val->name }}</td>
                            <td>
                                @if($val->permissions->count() >=1)
                                    @foreach($val->permissions->pluck('name') as $p)
                                        <span class="badge badge-pill badge-primary">{{ $p }}</span>
                                    @endforeach
                                @else
                                    <span class="text-muted font-italic text-sm">Null</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('pengaturan.role-akses.destroy', $val->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-xs btn-danger shadow-sm" onclick="return confirm('Yakin untuk menghapus role {{ $val->name }}?')" id="btn-hapus"><i class="fas fa-trash-alt"></i> Akses</button>
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

@push('modal')
<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahModalLabel">Tambah Akses ke Role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('pengaturan.role-akses.store') }}" method="POST">
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label>Role <span class="text-danger">*</span></label>
                    <select name="role" class="form-control @error('role') is-invalid @enderror" id="selectRole">
                        <option value="">-pilih role-</option>
                        @foreach($role as $val)
                            <option value="{{ $val->id }}" {{ @old("role") == $val->id ? "selected" : "" }}>{{ $val->name }}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Akses <span class="text-danger">*</span></label>
                    <select name="akses" class="form-control @error('akses') is-invalid @enderror" id="selectAkses">
                        <option value="">-pilih akses-</option>
                        @foreach($akses as $val)
                            <option value="{{ $val->id }}" {{ @old("akses") == $val->id ? "selected" : "" }}>{{ $val->name }}</option>
                        @endforeach
                    </select>
                    @error('akses')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-paper-plane"></i> Simpan</button>
            </div>
        </form>
      </div>
    </div>
</div>
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            $('#selectRole').select2({
                dropdownParent: $("#tambahModal"),
                theme: 'bootstrap4',
                // placeholder: 'Pilih Supplier',
            })
            $('#selectAkses').select2({
                dropdownParent: $("#tambahModal"),
                theme: 'bootstrap4',
                // placeholder: 'Pilih Supplier',
            })
            $('#dataRoleAkses').DataTable({
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
