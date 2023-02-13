@extends('layout.app', ['title' => 'Edit Role'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0"><i class="fas fa-server"></i> Edit Role</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('data-master.role.index') }}">List Data</a></li>
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
            <a href="{{ route('data-master.role.index') }}" class="btn btn-sm btn-secondary float-right"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('data-master.role.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Role <span class="text-danger">*</span></label>
                            <input type="text" name="role" value="{{ $role->nama }}" class="form-control @error('role') is-invalid @enderror" autofocus>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status <span class="text-danger">*</span></label><br>
                            <div class="form-check form-check-inline">
                                <input name="aktif" class="form-check-input" type="radio" value="1" id="aktif"
                                    @if($role->aktif == 1) checked @endif/>
                                <label class="form-check-label" for="aktif"> Aktif </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input name="aktif" class="form-check-input" type="radio" value="0" id="tidakAktif"
                                    @if($role->aktif == 0) checked @endif/>
                                <label class="form-check-label" for="tidakAktif"> Tidak Aktif </label>
                            </div>
                            @error('aktif')
                            <div class="invalid-feedback">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
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
