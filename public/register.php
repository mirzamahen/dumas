<!DOCTYPE html>
<!-- This is a starter template page. Use this page to start your new project from scratch. This page gets rid of all links and provides the needed markup only. -->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Matur Bapak Yooo | Kanwil Kemenag DIY</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
  <link rel="icon" href="../adminlte/dist/img/kemenag.png">
  <style>
    h3 {
          text-align: center;
        }
    h5 {
          text-align: center;
        }
      .main-footer {
          padding: 10px;
          background-color: #f8f9fa;
          border-top: 1px solid #dee2e6;
      }

      .float-right {
          float: right;
      }

      .float-right a {
          margin-right: 10px;
      }

      .float-right a img {
          vertical-align: middle;
          width: 20px;
          height: 20px;
      }
  </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../index.php" class="navbar-brand">
        <img src="../adminlte/dist/img/kemenag.png" alt="Dumas" class="brand-image">
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="../index.php" class="nav-link">BERANDA</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">TENTANG KAMI</a>
          </li>
          <li class="nav-item">
            <a href="../satker.php" class="nav-link">SATUAN KERJA</a>
          </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-12">
            <!-- general form elements disabled -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Register Akun</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="submit_register.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Isikan Username Anda" required>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Isikan Password Anda" required>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Isikan Nama Lengkap Anda" required>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Isikan Email Anda" required>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number" class="form-control" name="nik" id="nik" placeholder="Isikan NIK Anda" required>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="no_tlp">No Telephone</label>
                        <input type="number" class="form-control" name="no_tlp" id="no_tlp" placeholder="Isikan Nomor yang Terhubung Ke WA" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                          <option disabled selected>Pilih Jenis Kelamin</option>
                          <option value="Laki-Laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Isikan Pekerjaan Anda" required>
                      </div>
                    </div>
                  </div>
                    <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">

          </div>
        </div>
        <!-- /.row -->
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <a href="https://www.instagram.com/kemenag_diy?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank">
      <img src="../adminlte/dist/img/ig.png" alt="Instagram" style="width:20px;height:20px;">
    </a>
    <a href="#" target="_blank">
      <img src="../adminlte/dist/img/fb.png" alt="Facebook" style="width:20px;height:20px;">
    </a>
    <a href="https://x.com/Kemenag_DIY" target="_blank">
      <img src="../adminlte/dist/img/x.png" alt="Twitter" style="width:20px;height:20px;">
    </a>
    <a href="https://youtube.com/@kemenagdiy-hl6ux?si=MQv1TebCUS2tBZlp" target="_blank">
      <img src="../adminlte/dist/img/yt.png" alt="YouTube" style="width:20px;height:20px;">
    </a>
    <a href="https://diy.kemenag.go.id/" target="_blank">
      <img src="../adminlte/dist/img/web.png" alt="Website" style="width:20px;height:20px;">
    </a>
    <b>Version</b> 1.0
  </div>
  <strong>Hak Cipta &copy; 2024 <a href="https://diy.kemenag.go.id/">KANWIL KEMENAG DIY</a>.</strong>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
