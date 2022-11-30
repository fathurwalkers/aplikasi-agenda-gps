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

        @foreach ($kategori as $item)
            <div class="col-10 mb-4 btn shadow ">
                <a href="{{ route('client-daftar-agenda-kategori', $item->id) }}">
                    <div class="card border-primary ">
                        <div class="card-body text-left">
                            <button type="button" class="btn btn-primary btn-sm">
                                <i class="bi bi-box-arrow-in-right" style="font-size: 1rem; display:inline-block;"></i>
                            </button>
                            <h6 class="card-title font-weight-bold"
                                style="font-size: 1rem; display: inline-block; margin-left: 40px;">{{ $item->kategori_nama }}</h6>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
@endsection
