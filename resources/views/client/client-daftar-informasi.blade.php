@extends('layouts.client-layout')

@section('tombol-keluar')
    <div class="tombol-keluar mt-2">
        <a href="{{ route('client') }}">
            <i class="bi bi-arrow-left-circle" style="font-size: 2rem; margin-right: 30px;"></i>
        </a>
        <h5 style="display: inline-block;">Daftar Informasi</h5>
    </div>
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

    <div class="container">
        <div class="card text-center mb-5 shadow-sm mt-4">
            <div class="card-header">
                Daftar Informasi
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row mt-4 justify-content-center">

                        @foreach ($informasi as $item)
                            <div class="col-11 mb-5 shadow-sm">
                                <div class="card border-primary mb-3">
                                    <div class="card-header border-primary card-title font-weight-bold">
                                        {{ $item->informasi_judul }}
                                    </div>
                                    <div class="card-body text-primary">
                                        <h5 class="card-title">{{ date('d, M Y', strtotime($item->agenda_waktu)) }}
                                            ({{ date('H:i', strtotime($item->agenda_waktu)) }})</h5>
                                        <p class="card-text h6">
                                            {{ $item->informasi_isi }}
                                        </p>
                                        <p class="card-text h6">
                                            Agenda : {{ $item->agenda->agenda_nama }}
                                        </p>
                                    </div>
                                    {{-- <button class="btn btn-success mb-3 mx-4" onclick="location.href = '{{ route('client-lihat-agenda', $item->id) }}';">
                                        Lihat Agenda
                                    </button> --}}
                                </div>
                            </div>
                        @endforeach

                        <div class="col-12 mb-5 shadow-sm">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br />
    <br />
    <br />
@endsection
