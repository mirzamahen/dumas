<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Matur Bapak Yo | Kanwil Kemenag DIY</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
  <link rel="icon" href="adminlte/dist/img/kemenag.png">
    <style>
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
    </style>
  <style>
    h2, h3, h5 {
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
    .card {
      margin-top: 20px;
    }
    .card-header {
      background-color: #ff2a00;
      color: white;
    }
  </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <img src="adminlte/dist/img/kemenag.png" alt="Dumas" class="brand-image" style="opacity: .8">
        <!--<span class="brand-text font-weight-light">MaturBapakYo</span>-->
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index.php" class="nav-link">BERANDA</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">TENTANG KAMI</a>
          </li>
          <li class="nav-item">
            <a href="satker.php" class="nav-link">SATUAN KERJA</a>
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

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="public">
            <i class="fa-solid fa-right-to-bracket"></i> LOGIN
          </a>
        </li>
      </ul>
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
            <!-- Content can go here if needed -->
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="adminlte/dist/img/welcome.png" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                <!-- Caption for slide 1 if needed -->
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="adminlte/dist/img/tatacara.png" alt="Second slide">
              <div class="carousel-caption d-none d-md-block">
     <!--       <h5>Slide 2</h5>
                <p>Description for slide 2.</p> -->
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="adminlte/dist/img/kelebihanmatur.png" alt="Third slide">
              <div class="carousel-caption d-none d-md-block">
      <!--      <h5>Slide 3</h5>
                <p>Description for slide 3.</p> -->
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="row mt-4 justify-content-center">
          <div class="col-lg-12">
            <div class="card">
              <a href="public"><img src="adminlte/dist/img/klikdisini.png" class="card-img-top" alt="..."></a>
            </div>
          </div>
          <div class="col-lg-12">

            <div class="card">
              <div class="card-header">
                <h2>TRACKING PENGADUAN ANDA</h2>
              </div>
              <div class="card-body">
                <form method="POST" action="">
                  <div class="form-group">
                    <label for="tracking_number">Masukan Nomor Tracking :</label>
                    <input type="text" class="form-control" id="tracking_number" name="tracking_number" placeholder="Enter Tracking Number" autocomplete="off" required>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Search</button>                    
                  </div>
                </form>
                <br>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $tracking_number = $_POST['tracking_number'];

                    // Sertakan file koneksi
                    require_once 'config.php';

                    $sql = "SELECT pengaduan.*, status_pengaduan.status FROM pengaduan 
                            JOIN status_pengaduan ON status_pengaduan.id_status = pengaduan.status_aduan
                            WHERE pengaduan.tracking ='$tracking_number'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<table class='table table-bordered table-hover'>
                                <thead>
                                    <tr>
                                        <th>Judul Pengaduan</th>
                                        <th>Status Aduan</th>
                                        <th>Tindak Lanjut</th>
                                        <th>Tracking Number</th>
                                    </tr>
                                </thead>
                                <tbody>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . htmlspecialchars($row["judul_pengaduan"]) . "</td>
                                    <td>" . htmlspecialchars($row["status"]) . "</td>
                                    <td>" . htmlspecialchars($row["tanggapan_balik"]) . "</td>
                                    <td>" . htmlspecialchars($row["tracking"]) . "</td>
                                </tr>";
                        }
                        echo "</tbody></table>";
                    } else {
                        echo "<div class='alert alert-warning mt-3'>Hasil Tidak Ditemukan</div>";
                    }

                    $conn->close();
                }
                ?>
              </div>
            </div>

          </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-12"><h3><b>TAHAPAN-TAHAPAN PENGADUAN</b></h3></div>
          <div class="col-md-3">
            <div class="card">
              <img src="adminlte/dist/img/diterima.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><b>Diterima</b></h5>
                <p class="card-text">Setiap aduan yang Anda sampaikan selalu kami terima dengan serius.<br><br><br><br><br></p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <img src="adminlte/dist/img/verifikasi.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><b>Dalam Proses Verifikasi</b></h5>
                <p class="card-text">Pengaduan Anda sedang kami verifikasi. Kami memastikan semua informasi dan bukti yang Anda berikan lengkap dan valid.<br><br></p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <img src="adminlte/dist/img/investigasi.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><b>Dalam Investigasi</b></h5>
                <p class="card-text">Pengaduan Anda sedang dalam proses investigasi. Kami meneliti masalah Anda secara mendalam untuk menemukan solusi terbaik.<br><br></p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <img src="adminlte/dist/img/selesai.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><b>Selesai</b></h5>
                <p class="card-text">Pengaduan Anda telah kami tangani dan solusi telah diberikan atau Pengaduan Anda ditolak karena hasil verifikasi/investigasi tidak sesuai kenyataan</p>
              </div>
            </div>
          </div>
        </div>
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
        <img src="adminlte/dist/img/ig.png" alt="Instagram">
      </a>
      <a href="#" target="_blank">
        <img src="adminlte/dist/img/fb.png" alt="Facebook">
      </a>
      <a href="https://x.com/Kemenag_DIY" target="_blank">
        <img src="adminlte/dist/img/x.png" alt="Twitter">
      </a>
      <a href="https://youtube.com/@kemenagdiy-hl6ux?si=MQv1TebCUS2tBZlp" target="_blank">
        <img src="adminlte/dist/img/yt.png" alt="YouTube">
      </a>
      <a href="https://diy.kemenag.go.id/" target="_blank">
        <img src="adminlte/dist/img/web.png" alt="Website">
      </a>
      <b>Version</b> 1.0
    </div>
    <strong>Hak Cipta &copy; 2024 <a href="https://diy.kemenag.go.id/">KANWIL KEMENAG DIY</a>.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
