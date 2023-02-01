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

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="..." alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="..." alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="..." alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-10 mb-4 btn shadow ">
            <a href="{{ route('client-daftar-agenda') }}">
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
            <a href="{{ route('client-daftar-informasi') }}">
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

        {{-- <div class="col-10 mb-4 btn shadow">
            <a href="{{ route('client-kategori-agenda') }}">
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
        </div> --}}

    </div>
@endsection
