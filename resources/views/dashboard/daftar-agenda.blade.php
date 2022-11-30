@extends('layouts.dashboard-layout')

@section('title', 'Dashboard - Daftar Agenda')

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

@section('content-title', 'Dashboard - Daftar Agenda')

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
                                        Daftar Agenda
                                    </b>
                                </h4>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-end">
                                <button type="button" class="btn btn-md btn-info" data-toggle="modal"
                                    data-target="#modaltambah">
                                    Tambah Agenda
                                </button>
                            </div>

                            {{-- MODAL TAMBAH DATA SISWA --}}
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

                                        <form action="{{ route('tambah-agenda') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="agenda_nama">Agenda : </label>
                                                            <input type="text" class="form-control" id="agenda_nama"
                                                                aria-describedby="emailHelp" name="agenda_nama">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="agenda_tempat">Tempat : </label>
                                                            <input type="text" class="form-control" id="agenda_tempat"
                                                                aria-describedby="emailHelp" name="agenda_tempat">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="agenda_kategori">Kategori Agenda : </label>
                                                            <select class="form-control" id="exampleFormControlSelect1"
                                                            name="agenda_kategori">
                                                                @foreach ($kategori as $kat)
                                                                    <option value="{{ $kat->id }}">{{ $kat->kategori_nama }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="agenda_bulan">Bulan : </label>
                                                            <select class="form-control" id="exampleFormControlSelect1"
                                                            name="agenda_bulan">
                                                                @foreach ($bulan as $bul)
                                                                    <option value="{{ $bul->id }}">{{ $bul->bulan_nama }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label for="agenda_penyelenggara">Penyelenggara : </label>
                                                            <input type="text" class="form-control"
                                                                id="agenda_penyelenggara" aria-describedby="emailHelp"
                                                                name="agenda_penyelenggara">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label for="agenda_keterangan" class="textareaContainer">Keterangan : </label>
                                                            <textarea name="agenda_keterangan" id="agenda_keterangan"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="agenda_tanggal">Tanggal</label>
                                                            <input type="date" class="form-control" id="agenda_tanggal" name="agenda_tanggal">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="agenda_waktu">Waktu</label>
                                                            <input type="time" class="form-control" id="agenda_waktu" name="agenda_waktu">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row d-flex mt-2 mb-3">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mx-auto">
                                                        <div id="mapid"></div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label for="agenda_latlong">Latitude & Longitude : </label>
                                                            <input type="text" class="form-control" id="agenda_latlong"
                                                                aria-describedby="emailHelp" name="agenda_latlong">
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="siswa_telepon">Longitude : </label>
                                                            <input type="text" class="form-control" id="siswa_telepon"
                                                                aria-describedby="emailHelp" name="siswa_telepon">
                                                        </div>
                                                    </div> --}}
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

                                            <th>Agenda</th>
                                            <th>Tempat</th>
                                            <th>Bulan</th>
                                            <th>Tanggal / Waktu</th>
                                            <th>Kategori</th>

                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($agenda as $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>

                                                <td>{{ $item->agenda_nama }}</td>
                                                <td>{{ $item->agenda_tempat }}</td>
                                                <td>{{ $item->bulan->bulan_nama }}</td>
                                                <td>{{ date('d-M-Y / H:i', strtotime($item->agenda_waktu)) }}</td>
                                                <td>{{ $item->kategori->kategori_nama }}</td>

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
                                                                                    <td>Agenda </td>
                                                                                    <td> : {{ $item->agenda_nama }}</td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>Tempat </td>
                                                                                    <td> : {{ $item->agenda_tempat }}</td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>Bulan </td>
                                                                                    <td> : {{ $item->bulan->bulan_nama }}
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>Tanggal / Waktu </td>
                                                                                    <td> :
                                                                                        {{ date('d-M-Y / H:i', strtotime($item->agenda_waktu)) }}
                                                                                    </td>
                                                                                </tr>


                                                                                <tr>
                                                                                    <td>Kategori Agenda </td>
                                                                                    <td> :
                                                                                        {{ $item->kategori->kategori_nama }}
                                                                                    </td>
                                                                                </tr>

                                                                            </table>

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
                                                                                Apakah anda yakin ingin menghapus Agenda
                                                                                ini?
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                                            <table class="table table-borderless"
                                                                                cellspacing="0" cellpadding="0">

                                                                                <tr>
                                                                                    <td>Agenda </td>
                                                                                    <td> : {{ $item->agenda_nama }}</td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>Tempat </td>
                                                                                    <td> : {{ $item->agenda_tempat }}</td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>Bulan </td>
                                                                                    <td> : {{ $item->bulan->bulan_nama }}
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>Tanggal / Waktu </td>
                                                                                    <td> :
                                                                                        {{ date('d-M-Y / H:i', strtotime($item->agenda_waktu)) }}
                                                                                    </td>
                                                                                </tr>


                                                                                <tr>
                                                                                    <td>Kategori Agenda </td>
                                                                                    <td> :
                                                                                        {{ $item->kategori->kategori_nama }}
                                                                                    </td>
                                                                                </tr>

                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">

                                                                    <form action="{{ route('hapus-agenda', $item->id) }}"
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
                                                                        Ubah Data Siswa
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('ubah-agenda', $item->id) }}" method="POST">
                                                                    @csrf
                                                                    <div class="modal-body">

                                                                        <div class="row">
                                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label for="agenda_nama">Agenda : </label>
                                                                                    <input type="text" class="form-control" id="agenda_nama"
                                                                                        aria-describedby="emailHelp" name="agenda_nama" value="{{ $item->agenda_nama }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label for="agenda_tempat">Tempat : </label>
                                                                                    <input type="text" class="form-control" id="agenda_tempat"
                                                                                        aria-describedby="emailHelp" name="agenda_tempat" value="{{ $item->agenda_tempat }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label for="agenda_kategori">Kategori Agenda : </label>
                                                                                    <select class="form-control" id="exampleFormControlSelect1"
                                                                                    name="agenda_kategori">
                                                                                        <option selected value="{{ intval($item->kategori_id) }}">{{ $item->kategori->kategori_nama }}</option>
                                                                                        @foreach ($kategori as $kat)
                                                                                            <option value="{{ $kat->id }}">{{ $kat->kategori_nama }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label for="agenda_bulan">Bulan : </label>
                                                                                    <select class="form-control" id="exampleFormControlSelect1"
                                                                                    name="agenda_bulan">
                                                                                        <option selected value="{{ intval($item->bulan_id) }}">{{ $item->bulan->bulan_nama }}</option>
                                                                                        @foreach ($bulan as $bul)
                                                                                            <option value="{{ $bul->id }}">{{ $bul->bulan_nama }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label for="agenda_penyelenggara">Penyelenggara : </label>
                                                                                    <input type="text" class="form-control"
                                                                                        id="agenda_penyelenggara" aria-describedby="emailHelp"
                                                                                        name="agenda_penyelenggara" value="{{ $item->agenda_penyelenggara }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label for="agenda_keterangan" class="textareaContainer">Keterangan : </label>
                                                                                    <textarea name="agenda_keterangan" id="agenda_keterangan">{{ $item->agenda_keterangan }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label for="agenda_tanggal">Tanggal</label>
                                                                                    <input type="date" class="form-control" id="agenda_tanggal" name="agenda_tanggal">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label for="agenda_waktu">Waktu</label>
                                                                                    <input type="time" class="form-control" id="agenda_waktu" name="agenda_waktu">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        {{-- <div class="row d-flex mt-2 mb-3">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mx-auto">
                                                                                <div id="mapid"></div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label for="agenda_latlong">Latitude & Longitude : </label>
                                                                                    <input type="text" class="form-control" id="agenda_latlong"
                                                                                        aria-describedby="emailHelp" name="agenda_latlong">
                                                                                </div>
                                                                            </div>
                                                                        </div> --}}

                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-info"
                                                                            data-dismiss="modal">Batalkan</button>
                                                                        <button type="submit"
                                                                            class="btn btn-success">Ubah</button>
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
