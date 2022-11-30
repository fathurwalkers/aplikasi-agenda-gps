@extends('layouts.dashboard-layout')

@section('title', 'Dashboard - Daftar Informasi')

@push('css')
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">

    <style>
        table,
        tr,
        td {
            border: none !important;
            border-color: none !important;
        }

        #mapid {
            height: 210px;
            width: 350px;
        }

        .textareaContainer {
            display: block;
            padding: 10px;
        }
        textarea {
            width: 100%;
            margin: 0;
            padding: 0;
            border-width: 1;
        }
    </style>
@endpush

@section('content-title', 'Dashboard - Daftar Informasi')

{{-- ------------------- main content ------------------- --}}
@section('main-content')

    <div class="row mt-1 mb-1">
        <div class="col-sm-12 col-md-12 col-lg-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <h4>
                                    <b>
                                        Daftar Informasi
                                    </b>
                                </h4>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-end">
                                <button type="button" class="btn btn-md btn-info" data-toggle="modal"
                                    data-target="#modaltambah">
                                    Tambah Informasi
                                </button>
                            </div>

                            {{-- MODAL TAMBAH DATA INFORMASI --}}
                            <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabelLogout">
                                                Tambah Agenda
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form action="{{ route('tambah-informasi') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label for="informasi_judul">Judul Informasi : </label>
                                                            <input type="text" class="form-control" id="informasi_judul"
                                                                aria-describedby="emailHelp" name="informasi_judul">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label for="informasi_agenda">Agenda : </label>
                                                            <select class="form-control" id="exampleFormControlSelect1"
                                                            name="informasi_agenda">
                                                                @foreach ($agenda as $agen)
                                                                    <option value="{{ $agen->id }}">{{ $agen->agenda_nama }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label for="informasi_isi" class="textareaContainer">Isi Informasi : </label>
                                                            <textarea name="informasi_isi" id="informasi_isi"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="informasi_tanggal">Tanggal</label>
                                                            <input type="date" class="form-control" id="informasi_tanggal" name="informasi_tanggal">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="informasi_waktu">Waktu</label>
                                                            <input type="time" class="form-control" id="informasi_waktu" name="informasi_waktu">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info"
                                                    data-dismiss="modal">Batalkan</button>
                                                <button type="submit" class="btn btn-success">Tambah Agenda</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr />
                        <div class="row">
                            <div class="table-responsive">
                                <table id="example" class="display table-bordered" style="width:100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No.</th>

                                            <th>Judul Informasi</th>
                                            <th>Status</th>
                                            <th>Tanggal / Waktu</th>
                                            <th>Agenda</th>

                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($informasi as $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>

                                                <td>{{ $item->informasi_judul }}</td>
                                                <td>{{ $item->informasi_status }}</td>
                                                <td>{{ date('d-M-Y / H:i', strtotime($item->informasi_waktu)) }}</td>
                                                <td>{{ $item->agenda->agenda_nama }}</td>

                                                <td>
                                                    <div class="row">
                                                        <div
                                                            class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mx-auto">
                                                            <button data-toggle="modal"
                                                                data-target="#modallihat{{ $item->id }}"
                                                                class="btn btn-sm btn-primary mr-1">Lihat</button>
                                                            @if ($users->login_level == 'admin')
                                                                <button data-toggle="modal"
                                                                    data-target="#modaltambahsiswa{{ $item->id }}"
                                                                    class="btn btn-sm btn-success mr-1">Ubah</button>
                                                                <button data-toggle="modal"
                                                                    data-target="#hapusModal{{ $item->id }}"
                                                                    class="btn btn-sm btn-danger">Hapus</button>
                                                            @endif
                                                        </div>
                                                    </div>


                                                    {{-- MODAL LIHAT --}}
                                                    <div class="modal fade" id="modallihat{{ $item->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabelLogout">
                                                                        Informasi Agenda
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row border-1">
                                                                        <div
                                                                            class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mx-auto">
                                                                            <img src="#" alt=""
                                                                                width="150px">
                                                                        </div>
                                                                    </div>
                                                                    <br />
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12">

                                                                            <table class="table table-borderless"
                                                                                cellspacing="0" cellpadding="0">

                                                                                <tr>
                                                                                    <td>Judul Informasi </td>
                                                                                    <td> : {{ $item->informasi_judul }}</td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>Status </td>
                                                                                    <td> : {{ $item->informasi_status }}</td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>Tanggal / Waktu </td>
                                                                                    <td> :
                                                                                        {{ date('d-M-Y / H:i', strtotime($item->informasi_waktu)) }}
                                                                                    </td>
                                                                                </tr>

                                                                            </table>

                                                                            <p>
                                                                                <b> Isi Informasi : </b><br />
                                                                                {{ $item->informasi_isi }}
                                                                            </p>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-warning"
                                                                        data-dismiss="modal">Batalkan</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- END MODAL LIHAT --}}


                                                    {{-- MODAL HAPUS --}}
                                                    <div class="modal fade" id="hapusModal{{ $item->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabelLogout">
                                                                        Konfirmasi
                                                                        Tindakan Penghapusan!</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                                            <p>
                                                                                Apakah anda yakin ingin menghapus Informasi
                                                                                ini?
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12">

                                                                            <table class="table table-borderless"
                                                                                cellspacing="0" cellpadding="0">

                                                                                <tr>
                                                                                    <td>Judul Informasi </td>
                                                                                    <td> : {{ $item->informasi_judul }}</td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>Status </td>
                                                                                    <td> : {{ $item->informasi_status }}</td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>Tanggal / Waktu </td>
                                                                                    <td> :
                                                                                        {{ date('d-M-Y / H:i', strtotime($item->informasi_waktu)) }}
                                                                                    </td>
                                                                                </tr>

                                                                            </table>

                                                                            <p>
                                                                                <b> Isi Informasi : </b><br />
                                                                                {{ $item->informasi_isi }}
                                                                            </p>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">

                                                                    <form action="{{ route('hapus-informasi', $item->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="hapusrequest">
                                                                        <button type="button" class="btn btn-warning"
                                                                            data-dismiss="modal">Batalkan</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Hapus</button>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- END MODAL HAPUS --}}


                                                    {{-- MODAL UBAH --}}
                                                    <div class="modal fade" id="modaltambahsiswa{{ $item->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabelLogout">
                                                                        Ubah Data Informasi
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('ubah-informasi', $item->id) }}" method="POST">
                                                                    @csrf
                                                                    <div class="modal-body">

                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label for="informasi_judul">Judul Informasi : </label>
                                                                                    <input type="text" class="form-control" id="informasi_judul"
                                                                                        aria-describedby="emailHelp" name="informasi_judul" value="{{ $item->informasi_judul }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label for="informasi_agenda">Agenda : </label>
                                                                                    <select class="form-control" id="exampleFormControlSelect1"
                                                                                    name="informasi_agenda">
                                                                                        <option selected value="{{ $item->agenda_id }}">{{ $item->agenda->agenda_nama }}</option>
                                                                                        @foreach ($agenda as $agen)
                                                                                            <option value="{{ $agen->id }}">{{ $agen->agenda_nama }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label for="informasi_isi" class="textareaContainer">Isi Informasi : </label>
                                                                                    <textarea name="informasi_isi" id="informasi_isi">{{ $item->informasi_isi }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label for="informasi_tanggal">Tanggal</label>
                                                                                    <input type="date" class="form-control" id="informasi_tanggal" name="informasi_tanggal">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label for="informasi_waktu">Waktu</label>
                                                                                    <input type="time" class="form-control" id="informasi_waktu" name="informasi_waktu">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-info"
                                                                            data-dismiss="modal">Batalkan</button>
                                                                        <button type="submit" class="btn btn-success">Tambah Agenda</button>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- END MODAL UBAH --}}


                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
{{-- ------------------- end main content ------------------- --}}

@push('js')
    <script src="{{ asset('datatables') }}/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script type='text/javascript'>
        function preview_image(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <script>
        let mymap = L.map('mapid').setView(['-5.47540', '122.58787'], 13);
        // let mymap = L.map('mapid').setView([-5.47486, 122.58998], 13);

        // let mymap = L.map('mapid').setView([51.505, -0.09], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {foo: 'bar', attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(mymap);

        var popup = L.popup();
        var marker;

        function onMapClick(e) {
            popup
                // .setLatLng(e.latlng)
                // .setContent("You clicked the map at " + e.latlng.toString())
                // .openOn(mymap);
                document.getElementById('agenda_latlong').value = e.latlng.toString();
                let marker = L.marker(e.latlng, {draggable:true}).addTo(mymap);
                console.log(e.latlng);
                console.log(marker);
        }
        mymap.on('click', onMapClick);
        // let marker = L.marker([-5.47486, 122.58998]).addTo(mymap);

    </script>
@endpush
