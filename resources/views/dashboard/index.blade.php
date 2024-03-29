@extends('layouts.dashboard-layout')

@section('title', 'Dashboard - Halaman Utama')

@push('css')
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

@section('content-title', 'Dashboard')

{{--------------------- main content ---------------------}}
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
<div class="row">
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total Pengguna</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pengguna }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total Agenda</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $agenda }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total Informasi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $informasi }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="card mb-3">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <h4>
                    <b>
                        Log Aktifitas
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
                                <th>Jenis Aktifitas</th>
                                <th>Kode</th>
                                <th>Waktu</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Hasnah</td>
                                <td>User Login</td>
                                <td>LOG93D9CG</td>
                                <td>Login</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Dion Pramudya</td>
                                <td>User Login</td>
                                <td>LOG9V49CG</td>
                                <td>Login</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Usman Azis</td>
                                <td>Ubah</td>
                                <td>LOG96VSCG</td>
                                <td>Manajemen Data</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Ahmad M</td>
                                <td>Hapus</td>
                                <td>LOG96VSCG</td>
                                <td>Manajemen Data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection
{{--------------------- end main content ---------------------}}

@push('js')
    <script src="{{ asset('datatables') }}/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endpush
