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
    <link rel="stylesheet" href="{{ asset('leafletjs') }}/leaflet.css" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
      integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/client') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/js/select.dataTables.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/vertical-layout-light/style.css" />
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/client') }}/images/favicon.png" />
    @stack('css')
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-dark bg-primary shadow mb-5 fixed-top" style="height:85px;">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="{{ asset('assets') }}/Logo-Tut-Wuri.png" width="45" height="45" class="d-inline-block align-top mr-1" alt=""/>
          <h6 style=" font: size 15px; display: inline; my-auto"> Ekstrakulikuler</h6>
        </a>
        <span class="navbar-text" style="margin-left: auto; font-size: 10px;">
            {{ $users->login_nama }}
          </span>
        <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-item" href="{{ route('client-profile') }}">
                  <img class="rounded-circle shadow" style="width: 2rem; margin-left: 5px;" src="{{ asset('assets') }}/{{ $siswa->siswa_foto }}" alt="">
              </a>
            </li>
      </div>
    </nav>

    <!-- akhir navbar -->

    <!-- konten -->
    <div class="container " style="margin-top: 120px; height: 800px;">
      @yield('tombol-keluar')
      @yield('main-content')
    </div>
    <!-- akhir konten -->

    <!-- footer -->
    <footer>
    <div class="container-fluid bg-primary fixed-bottom">
          <ul>
            <li><a href="{{ route('client') }}"><i class="bi bi-house-fill text-light "></i></a>Home</li>
            <li><a href="{{ route('client-daftar-jadwal') }}"><i class="bi bi-list-stars text-light"></i></a>Jadwal</li>
            <li><a href="{{ route('client-absen') }}"><i class="bi bi-person-check text-light "></i></a>Daftar Hadir</li>
            <li><a href="{{ route('client-profile') }}"><i class="bi bi-person-circle text-light"></i></a>profil</li>
          </ul>
      </div>
    </footer>
    <!-- akhir footer -->

    <!-- akhir footer -->
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
    <script src="{{ asset('leafletjs') }}/leaflet.js"></script>
    <!-- End custom js for this page-->
    @stack('js')
  </body>
</html>
