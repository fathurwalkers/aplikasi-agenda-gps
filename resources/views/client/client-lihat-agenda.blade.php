@extends('layouts.client-layout')

@push('css')
    <style>
        #mapid {
            height: 200px;
            width: 280px;
        }
    </style>
@endpush

@section('tombol-keluar')
    <div class="tombol-keluar mt-2">
        <a href="{{ route('client') }}">
            <i class="bi bi-arrow-left-circle" style="font-size: 2rem; margin-right: 30px;"></i>
        </a>
        <h5 style="display: inline-block;">Informasi Agenda</h5>
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
                Informasi Agenda
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row mt-2 justify-content-center">

                        <div class="card-body text-primary">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">

                                    <div id="mapid" width="500px" height="500px"></div>

                                    {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6679.343619177634!2d122.5813251303054!3d-5.483270245620529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2da470d9c857504b%3A0x694512d8b7e672c8!2sLipu%2C%20Betoambari%2C%20Bau-Bau%20City%2C%20South%20East%20Sulawesi!5e0!3m2!1sen!2sid!4v1669224159932!5m2!1sen!2sid" width="270" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}

                                </div>
                            </div>
                            <br />
                            <br />
                            <h5 class="card-title">{{ $agenda->agenda_tempat }}</h5>
                            <p class="card-text h6">{{ date('d, M Y', strtotime($agenda->agenda_waktu)) }}
                                ({{ date('H:i', strtotime($agenda->agenda_waktu)) }})</p>
                            <p class="card-text h6">
                                {{ $agenda->agenda_keterangan }}
                            </p>
                        </div>

                        <div class="col-12 mb-1 shadow-sm">
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

@push('js')
    <script>
        // var map = L.map('mapid', {
        //     center: [{{ $agenda->agenda_lat }}, {{ $agenda->agenda_long }}],
        //     zoom: 13
        // });
        let mymap = L.map('mapid').setView([{{ $agenda->agenda_lat }}, {{ $agenda->agenda_long }}], 13);
        // let mymap = L.map('mapid').setView([-5.47486, 122.58998], 13);

        // let mymap = L.map('mapid').setView([51.505, -0.09], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {foo: 'bar', attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(mymap);

        let marker = L.marker([{{ $agenda->agenda_lat }}, {{ $agenda->agenda_long }}]).addTo(mymap);
        // let marker = L.marker([-5.47486, 122.58998]).addTo(mymap);

    </script>
@endpush
