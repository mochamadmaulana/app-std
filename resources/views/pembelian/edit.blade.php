@extends('layout.main-inventory', ['title'=>'Edit Barang Masuk'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0">Edit Barang Masuk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('inventory.barang-masuk.index') }}">List Barang Masuk</a></li>
                        <li class="breadcrumb-item active">Edit Barang Masuk</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('inventory.barang-masuk.index') }}" class="btn btn-sm btn-secondary float-right"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('inventory.barang-masuk.update', $barang_masuk->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nama barang <sup class="text-danger">*</sup></label>
                            <input type="text" name="nama_barang" value="{{ $barang_masuk->nama_barang }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Supplier <sup class="text-danger">*</sup></label>
                            <select name="supplier_id" class="form-control @error('supplier_id') is-invalid @enderror" id="selectSupplier">
                                <option value="">-pilih supplier-</option>
                                @foreach ($supplier as $key => $sp)
                                    <option value="{{ $sp->id }}" @if($barang_masuk->supplier_id == $sp->id) selected @endif>{{ $sp->nama_supplier }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Satuan barang <sup class="text-danger">*</sup></label>
                            <select name="satuan_barang_id" class="form-control @error('satuan_barang_id') is-invalid @enderror" id="selectSatuanBarang">
                                <option value="">-pilih satuan barang-</option>
                                @foreach ($satuan_barang as $key => $sb)
                                    <option value="{{ $sb->id }}" @if($barang_masuk->satuan_barang_id == $sb->id) selected @endif>{{ $sb->quantity.' '.$sb->nama_satuan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Quantity <sup class="text-danger">*</sup></label>
                            <input type="text" name="quantity" value="{{ $barang_masuk->quantity }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Harga Beli/Kg <sup class="text-danger">*</sup></label>
                            <input type="number" name="harga_beli_perkilo" value="{{ $barang_masuk->harga_beli_perkilo }}" class="form-control">
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
            $('#selectSupplier').select2({
                theme: 'bootstrap4'
            })
            $('#selectSatuanBarang').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@endpush
