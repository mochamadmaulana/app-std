@extends('layout.app', ['title'=>'Role Akses'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0"><i class="fas fa-store-alt"></i> Role Akses</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('pengaturan.role-akses.index') }}">List Data</a></li>
                        <li class="breadcrumb-item active">Tambah Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('pengaturan.role-akses.index') }}" class="btn btn-sm btn-secondary float-right"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('pengaturan.role-akses.store') }}" method="POST">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-6">
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
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-paper-plane"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@push('js')
    <script>
        $(function() {
            $('#selectRole').select2({
                theme: 'bootstrap4',
                // placeholder: 'Pilih Supplier',
            })
            $('#selectAkses').select2({
                theme: 'bootstrap4',
                // placeholder: 'Pilih Supplier',
            })
        })
    </script>
@endpush
