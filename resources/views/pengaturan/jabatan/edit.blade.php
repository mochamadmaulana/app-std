@extends('layout.main-pengaturan', ['title' => 'Edit Jabatan'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0">Edit Jabatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('pengaturan.jabatan.index') }}">List Jabatan</a></li>
                        <li class="breadcrumb-item active">Edit Jabatan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('pengaturan.jabatan.index') }}" class="btn btn-sm btn-secondary float-right"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('pengaturan.jabatan.update', $jabatan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nama Jabatan <span class="text-danger">*</span></label>
                            <input type="text" name="nama_jabatan" class="form-control" value="{{ $jabatan->nama_jabatan }}" id="">
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="aktif" @if($jabatan->aktif == 1) checked @endif id="aktif" value="1">
                                <label class="form-check-label badge badge-sm badge-pill badge-success" for="aktif">Aktif</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="aktif" @if($jabatan->aktif == 0) checked @endif id="tidakAktif" value="0">
                                <label class="form-check-label badge badge-sm badge-pill badge-danger" for="tidakAktif">Tidak Aktif</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
