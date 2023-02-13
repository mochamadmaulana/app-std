@extends('layout.main-pengaturan', ['title' => 'Tambah Karyawan'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0">Tambah Karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('pengaturan.karyawan.index') }}">List Karyawan</a></li>
                        <li class="breadcrumb-item active">Tambah Karyawan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('pengaturan.karyawan.index') }}" class="btn btn-sm btn-secondary float-right"><i
                    class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('pengaturan.karyawan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nama Lengkap <sup class="text-danger">*</sup></label>
                            <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap') }}">
                            @error('nama_lengkap')
                                <div class="invalid-feedback">
                                    <sup>{{ $message }}</sup>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Username <sup class="text-danger">*<small> huruf kecil</small></sup></label>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
                            @error('username')
                                <div class="invalid-feedback">
                                    <sup>{{ $message }}</sup>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email <sup class="text-danger">*</sup></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    <sup>{{ $message }}</sup>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Hak Akses <sup class="text-danger">*</sup></label>
                            <select name="hak_akses" class="form-control @error('hak_akses') is-invalid @enderror selectHakAkses" style="width: 100%;">
                                <option value="">-pilih hak akses-</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Keuangan">Keuangan</option>
                                <option value="Pembukuan">Pembukuan</option>
                                <option value="Sales">Sales</option>
                                <option value="Manajer">Manajer</option>
                                <option value="Owner">Owner</option>
                                <option value="User">User</option>
                            </select>
                            @error('hak_akses')
                                <div class="invalid-feedback">
                                    <sup>{{ $message }}</sup>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jabatan <sup class="text-danger">*</sup></label>
                            <select class="form-control selectJabatan @error('jabatan_id') is-invalid @enderror" name="jabatan_id" style="width: 100%;">
                                <option value="">-pilih jabatan-</option>
                                @foreach ($jabatan as $value)
                                    <option value="{{ $value->id }}">{{ $value->nama_jabatan }}</option>
                                @endforeach
                            </select>
                            @error('jabatan_id')
                                <div class="invalid-feedback">
                                    <sup>{{ $message }}</sup>
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Password <sup class="text-danger">*</sup></label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            <sup>{{ $message }}</sup>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Konfirmasi Password <sup class="text-danger">*</sup></label>
                                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            <sup>{{ $message }}</sup>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-paper-plane"></i>
                            Simpan</button>
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
            $('.selectJabatan').select2()
            $('.selectHakAkses').select2()
        })
    </script>
@endpush
