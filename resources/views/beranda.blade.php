@extends('layout.app', ['title' => 'Beranda'])

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm">
                <h1 class="m-0"><i class="fas fa-home"></i> Beranda</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total User</span>
                    <span class="info-box-number">0</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-tie"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Jabatan</span>
                    <span class="info-box-number">0</span>
                </div>
            </div>
        </div>
    </div>
@endsection
