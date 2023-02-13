@extends('layout.app', ['title'=>'Tambah Rekening Bank'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0"><i class="far fa-credit-card"></i> Tambah Rekening Bank</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('rekening-bank.index') }}">List Data</a></li>
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
            <a href="{{ route('rekening-bank.index') }}" class="btn btn-sm btn-secondary float-right"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('rekening-bank.store') }}" method="POST">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Pemilik <span class="text-danger">*</span></label>
                            <input type="text" name="pemilik" class="form-control @error('pemilik') is-invalid @enderror" value="{{ @old('pemilik') }}" autofocus>
                            @error('pemilik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>No Rekening <span class="text-danger">*</span></label>
                            <input type="text" name="nomor_rekening" class="form-control @error('nomor_rekening') is-invalid @enderror" value="{{ @old('nomor_rekening') }}">
                            @error('nomor_rekening')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Bank <span class="text-danger">*</span></label>
                            <select name="bank" class="form-control @error('bank') is-invalid @enderror" id="selectBank">
                                <option value="">-pilih bank-</option>
                                @foreach($bank as $val)
                                    <option value="{{ $val->id }}" {{ @old("bank") == $val->id ? "selected" : "" }}>{{ $val->nama }} - {{ $val->deskripsi }}</option>
                                @endforeach
                            </select>
                            @error('bank')
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

@push('js')
    <script>
        $(function() {
            $('#selectBank').select2({
                theme: 'bootstrap4',
                // placeholder: 'Pilih Supplier',
            })
        })
    </script>
@endpush
