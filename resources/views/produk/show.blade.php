@extends('layout.app', ['title' => 'Detail Produk'])

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0"><i class="fas fa-server"></i> Detail Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">List Data</a></li>
                        <li class="breadcrumb-item active">Detail Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title float-right"><a href="{{ route('produk.index') }}" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a></h3>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <strong><i class="fas fa-boxes mr-1"></i> Nama</strong>
                        <p class="text-muted">{{ $produk->nama }}</p>
                        <hr>

                        <strong><i class="fas fa-code mr-1"></i> Kode/SKU</strong>
                        <p class="text-muted">{{ $produk->kode }}</p>
                        <hr>

                        <strong><i class="fas fa-tags mr-1"></i> Kategori</strong>
                        <p class="text-muted"><span class="badge badge-xs badge-secondary">{{ $produk->kategori_produk->nama }}</span></p>
                        <hr>

                        <strong><i class="fas fa-store-alt mr-1"></i> Pemasok</strong>
                        <p class="text-muted">{{ $produk->pemasok->perusahaan }}</p>
                        <hr>

                        <strong><i class="fas fa-phone mr-1"></i> Telepone</strong>
                        <p class="text-muted">{{ $produk->pemasok->telepone }}</p>
                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat Pemasok</strong>
                        <p class="text-muted">@if($produk->pemasok->alamat != null) {{ $produk->pemasok->alamat }} @else <small class="text-gray-400 font-italic">No Data</small> @endif</p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
