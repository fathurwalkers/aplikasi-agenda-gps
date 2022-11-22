<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Extraculicullar SMADA</title>
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
        {{-- <div class="header">
            <img class="img1" src="images/logosmada.png" alt="" />
            <h5>Sistem Informasi Extraculicullar</h5>
            <br />
            <h6>SMA NEGERI 2 BAUBAU</h6>
        </div> --}}
        <br />
        <br />
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="card text-white bg-info mb-3 mt-4" style="max-width: 18rem; margin:auto;">
            <div class="card-header text-center">LOGIN</div>
            <div class="card-body">
                <form class="user" action="{{ route('post-login') }}" method="POST">
                    @csrf
                    <input type="hidden" name="cekrequest" value="user">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="login_username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="login_password">
                    </div>
                    {{-- <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Ingat Saya</label>
                    </div> --}}
                    <button type="submit" class="btn btn-success">LOGIN</button>
                    </a>
                </form>
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
