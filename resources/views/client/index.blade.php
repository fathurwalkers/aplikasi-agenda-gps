@extends('layouts.client-layout')

@push('css')
    <style>
        /* .container {
                    height: 800px!important;
                } */
    </style>
@endpush

@section('tombol-keluar')
@endsection

@section('main-content')
    <div class="row mt-1 mb-1">
        <div class="col-sm-12 col-md-12 col-lg-12">
            @if (session('status'))
                <div class="alert alert-info">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row row-cols-1  justify-content-center">

        <div class="col-10 mb-4 btn shadow ">
            <a href="#">
                <div class="card border-primary ">
                    <div class="card-body text-left">
                        <button type="button" class="btn btn-primary btn-sm">
                            <i class="bi bi-box-arrow-in-right" style="font-size: 1rem; display:inline-block;"></i>
                        </button>
                        <h6 class="card-title font-weight-bold"
                            style="font-size: 1rem; display: inline-block; margin-left: 40px;">AGENDA</h6>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-10 mb-4 btn shadow">
            <a href="#">
                <div class="card border-warning  ">
                    <div class="card-body text-left">
                        <button type="button" class="btn btn-warning btn-sm">
                            <i class="bi bi-list-stars text-light" style="font-size: 1rem; display:inline-block;"></i>
                        </button>
                        <h6 class="card-title font-weight-bold text-warning"
                            style=" font-size: 1rem; display: inline-block; margin-left: 40px;">INFORMASI</h6>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-10 mb-4 btn shadow">
            <a href="#">
                <div class="card border-danger ">
                    <div class="card-body text-left">
                        <button type="button" class="btn btn-danger btn-sm">
                            <i class="bi bi-activity" style="font-size: 1rem; display:inline-block;"></i>
                        </button>
                        <h6 class="card-title font-weight-bold text-danger"
                            style="font-size: 1rem; display: inline-block; margin-left: 40px;">KATEGORI AGENDA</h6>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-10 mb-4 btn shadow">
            <a href="#">
                <div class="card border-warning ">
                    <div class="card-body text-left">
                        <button type="button" class="btn btn-warning btn-sm">
                            <i class="bi bi-123 text-light" style="font-size: 1rem; display:inline-block;"></i>
                        </button>
                        <h6 class="card-title font-weight-bold text-warning"
                            style="font-size: 1rem; display: inline-block; margin-left: 40px;">PETUNJUK</h6>
                    </div>
                </div>
            </a>
        </div>

    </div>
@endsection
