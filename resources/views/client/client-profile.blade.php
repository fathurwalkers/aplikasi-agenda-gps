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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="{{ asset('assets/client') }}/js/select.dataTables.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/vertical-layout-light/style.css" />
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/client') }}/images/favicon.png" />
    <script src="{{ asset('assets/client') }}/js/jquery-3.6.0.js"></script>
</head>

<body>
    <!-- konten -->
    <div class="container">
        <div class="tombol-keluar mt-2">
            <a href="{{ route('client') }}">
                <i class="bi bi-arrow-left-circle" style="font-size: 2rem;"></i>
            </a>
        </div>
        <div class="row mx-auto d-flex align-items-center justify-content-center">

            <form action="{{ route('client-ubah-foto') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 mx-auto d-flex align-items-center justify-content-center">
                        <img id="output_image" class="border border-1" src="{{ asset('assets') }}/{{ $pengguna->pengguna_foto }}"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 mx-auto d-flex align-items-center justify-content-center">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Foto : </label>
                            <input type="file" class="form-control-file" onchange="preview_image(event)" name="foto">
                            <small class="form-text text-muted">Upload Pas Foto ekstensi .jpg</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 mx-auto d-flex align-items-center justify-content-center">
                        <button type="submit" class="btn btn-md btn-info">
                            Update Foto Profil
                        </button>
                    </div>
                </div>
            </form>

        </div>
        <div class="container">
            <div class="card" style="margin-top: 60px;">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-4">
                            Nama
                        </div>
                        <div class="col-8">
                            : {{ $pengguna->pengguna_nama }}
                        </div>
                        <div class="col-4">
                            Alamat
                        </div>
                        <div class="col-8">
                            : {{ $pengguna->pengguna_alamat }}
                        </div>
                        <div class="col-4">
                            No. Hp
                        </div>
                        <div class="col-8">
                            : {{ $pengguna->pengguna_telepon }}
                        </div>
                        <div class="col-4">
                            E-mail
                        </div>
                        <div class="col-8">
                            : {{ $pengguna->login->login_email }}
                        </div>
                        <div class="col-4">
                            Status
                        </div>
                        <div class="col-8">
                            : {{ $pengguna->pengguna_status }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tombol text-center">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <input type="hidden" name="logoutrequest" value="user">
                <button type="submit" class="btn btn-primary btn-lg mt-5 mb-5"><i class="bi bi-box-arrow-left"></i>
                    Keluar</button>
            </form>
        </div>
    </div>
    </div>
    </div>

    <!-- akhir konten -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/client') }}/js/script.js"></script>
    <!-- End custom js for this page-->
</body>

</html>
