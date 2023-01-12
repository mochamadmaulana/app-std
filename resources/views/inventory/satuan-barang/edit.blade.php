@extends('layout.main-inventory', ['title' => 'Edit Satuan Barang'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0">Edit Satuan Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('inventory.satuan-barang.index') }}">List Satuan Barang</a></li>
                        <li class="breadcrumb-item active">Edit Satuan Barang</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('inventory.satuan-barang.index') }}" class="btn btn-sm btn-secondary float-right"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('inventory.satuan-barang.update', $satuan_barang->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nama Satuan <span class="text-danger">*</span></label>
                            <input type="text" name="nama_satuan" value="{{ $satuan_barang->nama_satuan }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Quantity <span class="text-danger">*</span></label>
                            <input type="text" name="quantity" value="{{ $satuan_barang->quantity }}" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection