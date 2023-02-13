@extends('layout.main-inventory', ['title'=>'Tambah Barang Masuk'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0">Tambah Barang Masuk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('inventory.barang-masuk.index') }}">List Barang Masuk</a></li>
                        <li class="breadcrumb-item active">Tambah Barang Masuk</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')


    <div class="row">
        <div class="col-md">
          <div class="card">
            <div class="card-header p-2">
              <a href="{{ route('inventory.master.barang.index') }}" class="btn btn-sm btn-secondary float-right"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div><!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('inventory.barang-masuk.store') }}" method="POST">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label>Barang <sup class="text-danger">*</sup></label>
                                <select name="barang_id" class="form-control @error('barang_id') is-invalid @enderror" id="selectBarang">
                                    <option value="">pilih barang</option>
                                    @foreach ($master_barang as $key => $value)
                                        <option value="{{ $value->id }}" data-nama="{{ $value->supplier->nama_supplier }}" data-id-supplier="{{ $value->supplier->id }}" data-alamat="{{ $value->supplier->alamat_supplier}}">{{ $value->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="supplier_id">
                            </div>
                            <div class="form-group">
                                <label>Satuan barang <sup class="text-danger">*</sup></label>
                                <select name="master_satuan_barang_id" class="form-control @error('master_satuan_barang_id') is-invalid @enderror" id="selectSatuanBarang">
                                    <option value="">pilih satuan barang</option>
                                    @foreach ($master_satuan_barang as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->quantity.' '.$value->nama_satuan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Quantity <sup class="text-danger">*</sup></label>
                                <input type="text" name="quantity" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Harga Beli/Kg <sup class="text-danger">*</sup></label>
                                <input type="number" name="harga_beli_perkilo" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-paper-plane"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

        <div class="col-md-4">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">

                <h4 class="profile-username text-center">Detail Supplier</h4>

                {{-- <p class="text-muted text-center">Software Engineer</p> --}}

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <p><b>Supplier :</b></p>
                    <p id="nama-supplier"><small ></small></p>
                  </li>
                  <li class="list-group-item">
                    <p><b>Alamat :</b></p>
                    <p id="alamat-supplier"><small ></small></p>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#selectBarang').select2({
                theme: 'bootstrap4'
            })
            $('#selectSatuanBarang').select2({
                theme: 'bootstrap4'
            })

            $('#selectBarang').on('change', function(){
                const namaSupplier = $('#selectBarang option:selected').data('nama');
                const alamatSupplier = $('#selectBarang option:selected').data('alamat');
                const idSupplier = $('#selectBarang option:selected').data('id-supplier');
                $('[name=supplier_id]').val(idSupplier);
                $('#nama-supplier').text(namaSupplier);
                $('#alamat-supplier').text(alamatSupplier);
            })
        })
    </script>
@endpush
