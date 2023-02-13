@extends('layout.app', ['title'=>'Edit Jabatan Pegawai'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0"><i class="fas fa-server"></i> Edit Jabatan Pegawai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('data-master.jabatan-pegawai.index') }}">List Data</a></li>
                        <li class="breadcrumb-item active">Edit Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('data-master.jabatan-pegawai.index') }}" class="btn btn-sm btn-secondary float-right"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('data-master.jabatan-pegawai.update', $jabatan_pegawai->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Jabatan <span class="text-danger">*</span></label>
                            <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ $jabatan_pegawai->nama }}" autofocus>
                            @error('jabatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status <span class="text-danger">*</span></label><br>
                            <div class="form-check form-check-inline">
                                <input name="aktif" class="form-check-input" type="radio" value="1" id="aktif"
                                    @if($jabatan_pegawai->aktif == 1) checked @endif/>
                                <label class="form-check-label" for="aktif"> Aktif </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input name="aktif" class="form-check-input" type="radio" value="0" id="tidakAktif"
                                    @if($jabatan_pegawai->aktif == 0) checked @endif/>
                                <label class="form-check-label" for="tidakAktif"> Tidak Aktif </label>
                            </div>
                            @error('aktif')
                            <div class="invalid-feedback">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
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
