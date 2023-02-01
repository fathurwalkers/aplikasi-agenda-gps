@extends('layouts.client-layout')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .item img {
            width: 100% !important;
        }

        .carousel-inner>.item>img {
            height: 300px !important;
            width: 250px !important;
        }

        .carousel-item img {
            object-fit: cover !important;
            object-position: center !important;
            height: 40vh !important;
            overflow: hidden !important;
        }
    </style>
@endpush

@section('tombol-keluar')
@endsection

@section('main-content')
    @if (session('status'))
        <div class="row mt-1 mb-1">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="alert alert-info">
                    {{ session('status') }}
                </div>
            </div>
        </div>
    @endif

    <div class="row row-cols-1  justify-content-center">

        <div class="row mb-3">
            <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                <span class="selamatdatang">
                    <b>
                        Selamat Datang
                    </b>
                </span>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">

                        @for ($i = 1; $i < 5; $i++)
                            <div class="carousel-item @if ($i == 1) active @endif">
                                @php
                                    $slide = 'assets/slide' . $i . '.jpeg';
                                @endphp
                                <img class="img img-responsive" width="100%" height="60%" src="{{ asset($slide) }}"
                                    alt="First slide">
                            </div>
                        @endfor

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

        <br />

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

@push('js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
@endpush
