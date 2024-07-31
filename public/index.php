
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Matur Bapak Yooo | Kanwil Kemenag DIY</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
  <link rel="icon" href="../adminlte/dist/img/kemenag.png">
  <style>
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
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="logout.php" role="button">
          <i class="fas fa-solid fa-arrow-right-from-bracket"></i> Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link elevation-4">
      <img src="../adminlte/dist/img/kemenag.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MATUR BAPAK YO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../adminlte/dist/img/users.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['username']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa-regular fa-pen-to-square"></i>
              <p>
                Kirim Pengaduan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pengaduan_user.php" class="nav-link">
              <i class="nav-icon fa-solid fa-list"></i>
              <p>
                Pengaduan Anda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa-regular fa-user"></i>
              <p>
                Profil
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PENGADUAN</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Form Pengaduan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="submit_pengaduan.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="judul_pengaduan">Judul Pengaduan</label>
                        <input type="text" class="form-control" name="judul_pengaduan" id="judul_pengaduan" placeholder="Isikan Judul Pengaduan Anda" required>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="isi_pengaduan">Isi Pengaduan</label>
                        <textarea type="text" class="form-control" name="isi_pengaduan" id="isi_pengaduan" placeholder="Isikan isi Pengaduan Anda" required></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="satker_pengaduan">Satker Tujuan Pengaduan</label>
                        <select class="form-control" name="satker_pengaduan" id="satker_pengaduan" required>
                          <option disabled selected>Pilih Satker Yang Diadukan</option>
                          <option value="1">Kantor Wilayah Kementerian Agama Daerah Istimewa Yogyakarta</option>
                          <option value="2">Kantor Kementerian Agama Kota Yogyakarta</option>
                          <option value="3">Kantor Kementerian Agama Kabupaten Sleman</option>
                          <option value="4">Kantor Kementerian Agama Kabupaten Bantul</option>
                          <option value="5">Kantor Kementerian Agama Kabupaten Kulonprogo</option>
                          <option value="6">Kantor Kementerian Agama Kabupaten Gunungkidul</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bukti Pengaduan (jika Ada)</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="pdf_bukti" id="pdf_ktp" accept="application/pdf">
                            <label class="custom-file-label" for="pdf_bukti">Upload Disini</label>
                          </div>
                          <p>* File PDF Max 500Kb</p>
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
        <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
