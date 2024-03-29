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
                                    <i class="fa fa-arrow-up"></i> Tambah Agenda
                                </button>
                            </div>

                            {{-- MODAL TAMBAH DATA Bulan --}}
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

                                        <form action="{{ route('tambah-agenda') }}" method="POST" id="formtambah">
                                            @csrf
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="agenda_nama">Agenda : </label>
                                                            <input type="text" class="form-control" id="agenda_nama"
                                                                aria-describedby="emailHelp" name="agenda_nama" required id="tambah_agenda_nama" oninvalid="this.setCustomValidity('anda harus mengisi Nama Agenda.')" oninput="setCustomValidity('')">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="agenda_tempat">Tempat : </label>
                                                            <input type="text" class="form-control" id="agenda_tempat"
                                                                aria-describedby="emailHelp" name="agenda_tempat" id="tambah_agenda_tempat" required oninvalid="this.setCustomValidity('anda harus mengisi Tempat Agenda.')" oninput="setCustomValidity('')">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    {{-- <div class="col-sm-6 col-md-6 col-lg-6">
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
                                                    </div> --}}
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label for="agenda_bulan">Bulan : </label>
                                                            <select class="form-control" id="exampleFormControlSelect1"
                                                            name="agenda_bulan" onchange="var optionVal = $(this).find(':selected').val(); doSomething(optionVal)">
                                                                @foreach ($bulan as $bul)
                                                                    <option id="{{ $bul->id }}" value="{{ $bul->id }}">{{ $bul->bulan_nama }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label for="bulan_keterangan">Keterangan Bulan : </label>
                                                            <input type="text" class="form-control"
                                                                id="bulan_keterangan" aria-describedby="emailHelp"
                                                                name="bulan_keterangan" value="" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label for="agenda_penyelenggara">Penyelenggara : </label>
                                                            <input type="text" class="form-control"
                                                                id="agenda_penyelenggara" aria-describedby="emailHelp"
                                                                name="agenda_penyelenggara" id="tambah_agenda_penyelenggara" required oninvalid="this.setCustomValidity('anda harus mengisi form penyelenggara.')" oninput="setCustomValidity('')">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label for="tambah_agenda_keterangan" class="textareaContainer">Keterangan : </label>
                                                            <textarea name="agenda_keterangan" id="tambah_agenda_keterangan" required oninvalid="this.setCustomValidity('anda harus memberikan Keterangan Agenda.')" oninput="setCustomValidity('')"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="agenda_tanggal">Tanggal</label>
                                                            <input type="date" class="form-control" id="agenda_tanggal" name="agenda_tanggal" required oninvalid="this.setCustomValidity('anda harus menentukan Tanggal Agenda.')" oninput="setCustomValidity('')">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="agenda_waktu">Waktu</label>
                                                            <input type="time" class="form-control" id="agenda_waktu" name="agenda_waktu" required oninvalid="this.setCustomValidity('anda harus menentukan waktu pelaksanaan Agenda.')" oninput="setCustomValidity('')">
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
                                                            <label for="Bulan_telepon">Longitude : </label>
                                                            <input type="text" class="form-control" id="Bulan_telepon"
                                                                aria-describedby="emailHelp" name="Bulan_telepon">
                                                        </div>
                                                    </div> --}}
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal"><i class="fas fa-arrow-left"></i> Batalkan</button>
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-arrow-up"></i>Tambah
                                                </button>
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

                                                <td>
                                                    <div class="row">
                                                        <div
                                                            class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mx-auto">
                                                            <button data-toggle="modal"
                                                                data-target="#modallihat{{ $item->id }}"
                                                                class="btn btn-sm btn-primary mr-1"><i class="fas fa-info-circle"></i></button>
                                                            @if ($users->login_level == 'admin')
                                                                <button data-toggle="modal"
                                                                    data-target="#modalubahagenda{{ $item->id }}"
                                                                    class="btn btn-sm btn-success mr-1"><i class="fas fa-pen"></i></button>
                                                                <button data-toggle="modal"
                                                                    data-target="#hapusModal{{ $item->id }}"
                                                                    class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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
                                                    <div class="modal fade" id="modalubahagenda{{ $item->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabelLogout">
                                                                        Ubah Data Agenda
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
                                                                            {{-- <div class="col-sm-6 col-md-6 col-lg-6">
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
                                                                            </div> --}}
                                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label for="agenda_bulan">Bulan : </label>
                                                                                    <select class="form-control" id="exampleFormControlSelect1"
                                                                                    name="agenda_bulan" onchange="var optionVal = $(this).find(':selected').val(); doSomething2(optionVal)">
                                                                                        <option selected value="{{ intval($item->bulan_id) }}">{{ $item->bulan->bulan_nama }}</option>
                                                                                        @foreach ($bulan as $bul)
                                                                                            <option value="{{ $bul->id }}">{{ $bul->bulan_nama }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        {{-- <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label for="bulan_keterangan">Keterangan Bulan : </label>
                                                                                    <input type="text" class="form-control"
                                                                                        id="bulan_keterangan{{ $item->id }}" aria-describedby="emailHelp"
                                                                                        name="bulan_keterangan" value="" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div> --}}

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
            $('#example').DataTable({
                oLanguage: {
                    "sSearch": "Pencarian berdasarkan : ",
                    "sLengthMenu": "Menampilkan _MENU_ Data",
                    "sInfo": "menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "sZeroRecords":      "Hasil yang dicari tidak ditemukan",
                    oPaginate: {
                        sNext: "Selanjutnya",
                        sPrevious: "Sebelumnya",
                    }
                }
            });
            // $("#example_previous").text("Sebelumnya").replace("Hi", "Bye");
            // $("#example_next").text("Selanjutnya").replace("Hi", "Bye");
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

    <script>
        function doSomething(param) {
            if ($(param.selected)) {
                console.log(param);

                <?php foreach($bulan as $buls) {?>
                    var bulanid = "{{ $buls->id }}";
                    if (param == bulanid) {
                        $('#bulan_keterangan').attr('value', '{{ $buls->bulan_keterangan }}');
                        console.log("{{$buls->bulan_keterangan}}");
                        console.log(checkmodal);
                    }
                <?php } ?>
            }
        }

        function doSomething2(param) {
            if ($(param.selected)) {
                console.log(param);

                <?php foreach($agenda as $agen) { ?>
                    <?php $cek2 = "#modalubahagenda" . $agen->id; ?>
                    var cekvar = $('{{$cek2}}').hasClass('in');
                    // console.log("{{$cek2}}");
                    if (cekvar == true) {
                        console.log(cekvar);
                        // if (cekvar) {
                        //     console.log();
                        // }
                    }

                <?php } ?>

                <?php foreach($bulan as $buls) {?>
                    var bulanid = "{{ $buls->id }}";
                    <?php $cek1 = "#bulan_keterangan" . $buls->id; ?>
                    if (param == bulanid) {
                        console.log("{{$cek1}}");
                        $('{{$cek1}}').attr('value', '{{ $buls->bulan_keterangan }}');
                        var cekcek = $('{{$cek1}}').attr('value', '{{ $buls->bulan_keterangan }}');
                        console.log("{{$buls->bulan_keterangan}}");
                    }
                <?php } ?>
            }
        }

        // $('#formtambah').submit(function() {
        //     var res = true;
        //     // here I am checking for textFields, password fields, and any
        //     // drop down you may have in the form
        //     $("input[id='tambah_agenda_nama'],]",this).each(function() {
        //         if($(this).val().trim() == "") {
        //             res = false;
        //         }
        //     })
        //     return res; // returning false will prevent the form from submitting.
        // });
    </script>
@endpush
