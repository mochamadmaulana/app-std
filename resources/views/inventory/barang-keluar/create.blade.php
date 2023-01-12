@extends('layout.main-inventory', ['title'=>'Tambah supplier'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0">Tambah Supplier</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('inventory.supplier.index') }}">List Supplier</a></li>
                        <li class="breadcrumb-item active">Tambah Supplier</li>
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
            <form action="{{ route('inventory.supplier.store') }}" method="POST">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nama supplier <sup class="text-danger">*</sup></label>
                            <input type="text" name="nama_supplier" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Telephone <sup class="text-danger">! <small>Optional</small></sup></label>
                            <input type="text" name="telephone_supplier" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Alamat <sup class="text-warning">!<small> Opsional</small></sup></label>
                            <textarea name="alamat_supplier" class="form-control" cols="10" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi <sup class="text-warning">!<small> Opsional</small></sup></label>
                            <textarea name="desc_supplier" class="form-control" cols="10" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-paper-plane"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
