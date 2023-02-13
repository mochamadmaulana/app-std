@extends('layout.app', ['title' => 'Data Master'])

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm">
                <h1 class="m-0"><i class="fas fa-cogs"></i> Data Master</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
{{-- <div class="row justify-content-center">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="card">
            <div class="card-body">
                <a href="#" class="shadow blur">
                    <img src="{{ asset('assets') }}/img/undraw_account.svg" class="rounded img-thumbnail" alt="Account">
                    <p class="text-center text-dark">Pengguna</p>
                </a>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@push('css')
<style>
.blur:hover {
    opacity: 0.5;
}
.blur img {
    border: 0;
}
</style>
@endpush
