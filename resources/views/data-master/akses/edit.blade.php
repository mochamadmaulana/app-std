@extends('layout.app', ['title' => 'Edit Akses'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0"><i class="fas fa-server"></i> Edit Akses</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('data-master.akses.index') }}">List Data</a></li>
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
            <a href="{{ route('data-master.akses.index') }}" class="btn btn-sm btn-secondary float-right"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('data-master.akses.update', $akses->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nama <span class="text-danger">*</span></label>
                            <input type="text" name="nama" value="{{ $akses->name }}" class="form-control @error('nama') is-invalid @enderror" autofocus>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-pencil-alt"></i> Update</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
