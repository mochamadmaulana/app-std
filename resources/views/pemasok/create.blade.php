@extends('layout.app', ['title'=>'Tambah Pemasok'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0"><i class="fas fa-store-alt"></i> Tambah Pemasok</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('pemasok.index') }}">List Data</a></li>
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
            <a href="{{ route('pemasok.index') }}" class="btn btn-sm btn-secondary float-right"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('pemasok.store') }}" method="POST">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Perusahaan <span class="text-danger">*</span></label>
                            <input type="text" name="perusahaan" class="form-control @error('perusahaan') is-invalid @enderror" autofocus>
                            @error('perusahaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama <sup><span class="text-warning font-italic">Opsional</span></sup></label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Telepone <span class="text-danger">*</span></label>
                            <input type="number" name="telepone" class="form-control @error('telepone') is-invalid @enderror" placeholder="08xxx">
                            @error('telepone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Alamat <sup><span class="text-warning font-italic">Opsional</span></sup></label>
                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="10" rows="3">{{ @old(alamat) }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Deskripsi <sup><span class="text-warning font-italic">Opsional</span></sup></label>
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="10" rows="3">{{ @old(deskripsi) }}</textarea>
                            @error('deskripsi')
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
