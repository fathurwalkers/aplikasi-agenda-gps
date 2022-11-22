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

        @if ($siswa->eskul_id == null)
            <div class="col-10 mb-4 btn shadow ">
                <a href="{{ route('client-menu-daftar-eskul') }}">
                    <div class="card border-primary ">
                        <div class="card-body text-left">
                            <button type="button" class="btn btn-primary btn-sm">
                                <i class="bi bi-box-arrow-in-right" style="font-size: 1rem; display:inline-block;"></i>
                            </button>
                            <h6 class="card-title font-weight-bold"
                                style="font-size: 1rem; display: inline-block; margin-left: 40px;">Mendaftar</h6>
                        </div>
                    </div>
                </a>
            </div>
        @endif

        <div class="col-10 mb-4 btn shadow">
            <a href="{{ route('client-daftar-jadwal') }}">
                <div class="card border-warning  ">
                    <div class="card-body text-left">
                        <button type="button" class="btn btn-warning btn-sm">
                            <i class="bi bi-list-stars text-light" style="font-size: 1rem; display:inline-block;"></i>
                        </button>
                        <h6 class="card-title font-weight-bold text-warning"
                            style=" font-size: 1rem; display: inline-block; margin-left: 40px;">Jadwal</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-10 mb-4 btn shadow">
            <a href="{{ route('client-daftar-eskul') }}">
                <div class="card border-danger ">
                    <div class="card-body text-left">
                        <button type="button" class="btn btn-danger btn-sm">
                            <i class="bi bi-activity" style="font-size: 1rem; display:inline-block;"></i>
                        </button>
                        <h6 class="card-title font-weight-bold text-danger"
                            style="font-size: 1rem; display: inline-block; margin-left: 40px;">Kegiatan</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-10 mb-4 btn shadow">
            <a href="{{ route('client-prestasi-eskul') }}">
                <div class="card border-info ">
                    <div class="card-body text-left">
                        <button type="button" class="btn btn-info btn-sm">
                            <i class="bi bi-star-fill" style="font-size: 1rem; display:inline-block;"></i>
                        </button>
                        <h6 class="card-title font-weight-bold text-info"
                            style="font-size: 1rem; display: inline-block; margin-left: 40px;">Prestasi Extraculicullar</h6>
                    </div>
                </div>
            </a>
        </div>
        {{-- <div class="col-10 mb-4 btn shadow">
            <a href="prestasiSiswa.html">
                <div class="card border-success ">
                    <div class="card-body text-left">
                        <button type="button" class="btn btn-success btn-sm">
                            <i class="bi bi-award" style="font-size: 1rem; display:inline-block;"></i>
                        </button>
                        <h6 class="card-title font-weight-bold text-success"
                            style="font-size: 1rem; display: inline-block; margin-left: 40px;">Prestasi Siswa</h6>
                    </div>
                </div>
            </a>
        </div> --}}
        <div class="col-10 mb-4 btn shadow">
            <a href="{{ route('client-nilai') }}">
                <div class="card border-warning ">
                    <div class="card-body text-left">
                        <button type="button" class="btn btn-warning btn-sm">
                            <i class="bi bi-123 text-light" style="font-size: 1rem; display:inline-block;"></i>
                        </button>
                        <h6 class="card-title font-weight-bold text-warning"
                            style="font-size: 1rem; display: inline-block; margin-left: 40px;">Nilai Siswa</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-10 mb-1 btn shadow">
            <a href="{{ route('client-absen') }}">
                <div class="card border-primary ">
                    <div class="card-body text-left">
                        <button type="button" class="btn btn-primary btn-sm">
                            <i class="bi bi-person-check" style="font-size: 1rem; display:inline-block;"></i>
                        </button>
                        <h6 class="card-title font-weight-bold text-primary"
                            style="font-size: 1rem; display: inline-block; margin-left: 40px;">Daftar Hadir</h6>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
