@extends('layouts.dashboard-layout')

@section('title', 'Dashboard - Daftar Akun')

@push('css')
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

@section('content-title', 'Dashboard - Daftar Akun')

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
                                    Daftar Akun
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
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>No. Telepon</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            {{-- <th>Kelola</th> --}}
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($akun as $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>

                                                <td>{{ $item->login_nama }}</td>
                                                <td>{{ $item->login_username }}</td>
                                                <td>{{ $item->login_telepon }}</td>
                                                <td>{{ $item->login_email }}</td>
                                                <td>{{ $item->login_level }}</td>

                                                {{-- <td>
                                                    <div class="row">
                                                        <div
                                                            class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mx-auto">
                                                            <button href="#"
                                                                class="btn btn-sm btn-primary mr-1">Lihat</button>
                                                        </div>
                                                    </div>
                                                </td> --}}

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
@endpush
