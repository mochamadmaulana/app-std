@extends('layout.main-inventory', ['title' => 'Edit Supplier'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0">Edit Supplier</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('inventory.supplier.index') }}">List Supplier</a></li>
                        <li class="breadcrumb-item active">Edit Supplier</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('inventory.supplier.index') }}" class="btn btn-sm btn-secondary float-right"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('inventory.supplier.update', $supplier->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nama supplier <sup class="text-danger">*</sup></label>
                            <input type="text" name="nama_supplier" value="{{ $supplier->nama_supplier }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Telephone <sup class="text-danger">! <small>Optional</small></sup></label>
                            <input type="text" name="telephone_supplier" value="{{ $supplier->telephone_supplier }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Alamat <sup class="text-warning">!<small> Opsional</small></sup></label>
                            <textarea name="alamat_supplier" class="form-control" cols="10" rows="5">{{ $supplier->alamat_supplier }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi <sup class="text-warning">!<small> Opsional</small></sup></label>
                            <textarea name="desc_supplier" class="form-control" cols="10" rows="5">{{ $supplier->desc_supplier }}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="aktif" @if($supplier->aktif == 1) checked @endif id="aktif" value="1">
                                <label class="form-check-label badge badge-sm badge-pill badge-success" for="aktif">Aktif</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="aktif" @if($supplier->aktif == 0) checked @endif id="tidakAktif" value="0">
                                <label class="form-check-label badge badge-sm badge-pill badge-danger" for="tidakAktif">Tidak Aktif</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-paper-plane"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
