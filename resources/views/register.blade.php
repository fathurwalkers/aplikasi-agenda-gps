<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Agenda Adat </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/style.css" />
    <link rel="stylesheet" href="{{ asset('assets/client') }}/vendors/feather/feather.css" />
    <link rel="stylesheet" href="{{ asset('assets/client') }}/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/client') }}/vendors/ti-icons/css/themify-icons.css" />
    <link rel="stylesheet" href="{{ asset('assets/client') }}/vendors/typicons/typicons.css" />
    <link rel="stylesheet" href="{{ asset('assets/client') }}/vendors/simple-line-icons/css/simple-line-icons.css" />
    <link rel="stylesheet" href="{{ asset('assets/client') }}/vendors/css/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/client') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="{{ asset('assets/client') }}/js/select.dataTables.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/vertical-layout-light/style.css" />
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/client') }}/images/favicon.png" />
</head>

<body>
    <div class="container1">

        <div class="card text-white bg-info mb-4 mt-4 pb-4" style="max-width: 18rem; margin:auto;">
            <div class="card-header text-center">DAFTAR AKUN</div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
                <form class="user" action="{{ route('post-register') }}" method="POST">
                    @csrf
                    <input type="hidden" name="cekrequest" value="user">
                    <div class="form-group">
                        <label for="pengguna_nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="pengguna_nama" aria-describedby="emailHelp" name="pengguna_nama" value="{{ old('pengguna_nama') }}">
                    <div class="form-group">
                        <label for="pengguna_telepon">No. HP / Telepon</label>
                        <input type="number" class="form-control" id="pengguna_telepon" aria-describedby="emailHelp" name="pengguna_telepon" value="{{ old('pengguna_telepon') }}">
                    </div>
                    <div class="form-group">
                        <label for="pengguna_alamat">Alamat</label>
                        <input type="text" class="form-control" id="pengguna_alamat" aria-describedby="emailHelp" name="pengguna_alamat" value="{{ old('pengguna_alamat') }}">
                    </div>
                    <div class="form-group">
                        <label for="pengguna_email">Jenis Kelamin</label>
                        <select class="form-select form-control" name="pengguna_jeniskelamin">
                            <option value="L">Laki - Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pengguna_email">Email</label>
                        <input type="text" class="form-control" id="pengguna_email" aria-describedby="emailHelp" name="pengguna_email" value="{{ old('pengguna_email') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="login_username" value="{{ old('login_username') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="login_password">
                    </div>
                    <div class="form-group">
                        <label for="password2">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password2" name="login_password2">
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">DAFTAR SEKARANG</button>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                            <p>
                                Atau
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                            <button type="button" class="btn btn-info" onclick="location.href = '{{ route('login-client') }}';">KEMBALI KE LOGIN</button>
                        </div>
                    </div>
                    </a>
                </form>
            </div>
        </div>


    </div>

        <!-- plugins:js -->
        <script src="{{ asset('assets/client') }}/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{ asset('assets/client') }}/vendors/chart.js/Chart.min.js"></script>
        <script src="{{ asset('assets/client') }}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="{{ asset('assets/client') }}/vendors/progressbar.js/progressbar.min.js"></script>

        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ asset('assets/client') }}/js/off-canvas.js"></script>
        <script src="{{ asset('assets/client') }}/js/hoverable-collapse.js"></script>
        <script src="{{ asset('assets/client') }}/js/template.js"></script>
        <script src="{{ asset('assets/client') }}/js/settings.js"></script>
        <script src="{{ asset('assets/client') }}/js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="{{ asset('assets/client') }}/js/dashboard.js"></script>
        <script src="{{ asset('assets/client') }}/js/Chart.roundedBarCharts.js"></script>
        <!-- End custom js for this page-->
</body>

</html>
