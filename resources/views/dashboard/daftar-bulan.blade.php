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
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <h4>
                                    <b>
                                        Daftar Bulan
                                    </b>
                                </h4>
                            </div>
                            {{-- <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-end">
                                <button type="button" class="btn btn-md btn-info" data-toggle="modal"
                                    data-target="#modaltambah">
                                    Tambah Bulan
                                </button>
                            </div> --}}
                        </div>

                        {{-- MODAL TAMBAH DATA Bulan --}}
                        <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabelLogout">
                                            Tambah Bulan
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form action="{{ route('tambah-bulan') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="bulan_nama">Nama Bulan : </label>
                                                        <input type="text" class="form-control" id="bulan_nama"
                                                            aria-describedby="emailHelp" name="bulan_nama">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="bulan_keterangan">Keterangan : </label>
                                                        <input type="text" class="form-control" id="bulan_keterangan"
                                                            aria-describedby="emailHelp" name="bulan_keterangan">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info"
                                                data-dismiss="modal"><i class="fas fa-arrow-left"></i> Batalkan</button>
                                            <button type="submit"
                                                class="btn btn-success">Ubah</button>
                                        </div>
                                    </form>

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
                                                                class="btn btn-sm btn-success mr-1"><i class="fas fa-info-circle"></i></button>
                                                            <button href="#" data-toggle="modal" data-target="#modalubahagenda{{ $item->id }}" class="btn btn-sm btn-info mr-1"><i class="fas fa-pen"></i></button>
                                                            <button href="#" data-toggle="modal"
                                                            data-target="#hapusModal{{ $item->id }}" class="btn btn-sm btn-danger mr-1"><i class="fas fa-trash"></i></button>
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
                                                                                Apakah anda yakin ingin menghapus Bulan
                                                                                ini?
                                                                            </p>
                                                                        </div>
                                                                    </div>
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

                                                                    <form action="{{ route('hapus-bulan', $item->id) }}"
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
                                                                        Ubah Bulan
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('ubah-bulan', $item->id) }}" method="POST">
                                                                    @csrf
                                                                    <div class="modal-body">

                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label for="bulan_nama">Bulan : </label>
                                                                                    <input type="text" class="form-control" id="bulan_nama"
                                                                                        aria-describedby="emailHelp" name="bulan_nama" value="{{ $item->bulan_nama }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label for="bulan_keterangan">Tempat : </label>
                                                                                    <input type="text" class="form-control" id="bulan_keterangan"
                                                                                        aria-describedby="emailHelp" name="bulan_keterangan" value="{{ $item->bulan_keterangan }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>

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
@endpush
