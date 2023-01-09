@extends('layouts.dashboard-layout')

@section('title', 'Dashboard - Daftar Bulan')

@push('css')
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

@section('content-title', 'Dashboard - Daftar Bulan')

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
                            <h4>
                                <b>
                                    Daftar Bulan
                                </b>
                            </h4>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="table-responsive">
                                <table id="example" class="display table-bordered" style="width:100%">

                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No.</th>
                                            <th>Bulan</th>
                                            <th>Keterangan</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($bulan as $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>

                                                <td>{{ $item->bulan_nama }}</td>
                                                <td>{{ $item->bulan_keterangan }}</td>

                                                <td>
                                                    <div class="row">
                                                        <div
                                                            class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mx-auto btn-group">
                                                            <button href="#" data-toggle="modal"
                                                                data-target="#modallihat{{ $item->id }}"
                                                                class="btn btn-sm btn-success mr-1">Lihat</button>
                                                            <button href="#"
                                                                class="btn btn-sm btn-info mr-1">Ubah</button>
                                                            <button href="#"
                                                                class="btn btn-sm btn-danger mr-1">Hapus</button>
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
                                                                        Informasi Bulan
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
                                                                                    <td>Bulan </td>
                                                                                    <td> : {{ $item->bulan_nama }}</td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>Keterangan </td>
                                                                                    <td> : {{ $item->bulan_keterangan }}
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
@endpush
