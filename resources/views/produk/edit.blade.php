@extends('layout.app', ['title'=>'Edit Produk'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0"><i class="fas fa-server"></i> Edit Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">List Data</a></li>
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
            <a href="{{ route('produk.index') }}" class="btn btn-sm btn-secondary float-right"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('produk.update', $produk->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Kode/SKU</label>
                            <input type="text" class="form-control @error('kode') is-invalid @enderror" value="{{ $produk->kode }}" disabled readonly>
                            @error('kode')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama <span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $produk->nama }}" autofocus>
                            @error('nama')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group" id="parrent-select-dropdown">
                            <label>Kategori <sup class="text-danger">*</sup></label>
                            <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" id="selectKategori">
                                <option value="">-pilih kategori-</option>
                                @foreach ($kategori as $key => $value)
                                    <option value="{{ $value->id }}" @if($value->id == $produk->kategori_produk_id) selected @endif>{{ $value->nama }}</option>
                                @endforeach
                            </select>
                            @error('kategori')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group" id="parrent-select-dropdown">
                            <label>Pemasok <sup class="text-danger">*</sup></label>
                            <select name="pemasok" class="form-control @error('pemasok') is-invalid @enderror" id="selectPemasok">
                                <option value="">-pilih pemasok-</option>
                                @foreach ($pemasok as $key => $value)
                                    <option value="{{ $value->id }}" @if($value->id == $produk->pemasok_id) selected @endif>{{ $value->perusahaan }}</option>
                                @endforeach
                            </select>
                            @error('pemasok')
                                <span class="invalid-feedback">{{ $message }}</span>
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

@push('js')
    <script>
        $(function() {
            $('#selectKategori').select2({
                theme: 'bootstrap4',
                // placeholder: 'Pilih Supplier',
            })
            $('#selectPemasok').select2({
                theme: 'bootstrap4',
                // placeholder: 'Pilih Supplier',
            })
        })
    </script>
@endpush
