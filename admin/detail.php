<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include '../config.php';

$id_pengaduan = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id_pengaduan <= 0) {
    header("Location: index.php");
    exit;
}

$sql = "SELECT pengaduan.*, users.*, satker.nama_satker, status_pengaduan.status
        FROM pengaduan
        JOIN satker ON satker.satker_id = pengaduan.satker_pengaduan
        JOIN status_pengaduan ON status_pengaduan.id_status = pengaduan.status_aduan
        JOIN users ON users.id_users = pengaduan.id_user
        WHERE pengaduan.id_pengaduan = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_pengaduan);
$stmt->execute();
$result = $stmt->get_result();
$detail = $result->fetch_assoc();

if (!$detail) {
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detail Pengaduan | Kanwil Kemenag DIY</title>

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
    <a href="index.php" class="brand-link elevation-4">
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
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fa-regular fa-face-angry"></i>
              <p>
                Pengaduan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pengaduan_kab.php" class="nav-link">
              <i class="nav-icon fa-regular fa-map"></i>
              <p>
                Klarifikasi Kab/Kota
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa-regular fa-envelope"></i>
              <p>
                Kritik/Saran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="manage_user.php" class="nav-link">
              <i class="nav-icon fa-regular fa-user"></i>
              <p>
                Manajemen User
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Pengaduan</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Detail Pengaduan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <tr>
                    <th>Nama Pelapor Pengaduan</th>
                    <td><?php echo htmlspecialchars($detail['nama']); ?></td>
                  </tr>
                  <tr>
                    <th>NIK</th>
                    <td><?php echo htmlspecialchars($detail['nik']); ?></td>
                  </tr>
                  <tr>
                    <th>Nomor HP</th>
                    <td><?php echo htmlspecialchars($detail['no_tlp']); ?></td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td><?php echo htmlspecialchars($detail['email']); ?></td>
                  </tr>
                  <tr>
                    <th>Jenis Kelamin</th>
                    <td><?php echo htmlspecialchars($detail['jenis_kelamin']); ?></td>
                  </tr>
                  <tr>
                    <th>Pekerjaan</th>
                    <td><?php echo htmlspecialchars($detail['pekerjaan']); ?></td>
                  </tr>
                  <tr>
                    <th>Judul Pengaduan</th>
                    <td><?php echo htmlspecialchars($detail['judul_pengaduan']); ?></td>
                  </tr>
                  <tr>
                    <th>No Tracking Pengaduan</th>
                    <td><?php echo htmlspecialchars($detail['tracking']); ?></td>
                  </tr>
                  <tr>
                    <th>Isi Pengaduan</th>
                    <td>
                      <div class="scrollable">
                        <?php echo nl2br(htmlspecialchars($detail['isi_pengaduan'])); ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th>Satker Pengaduan</th>
                    <td><?php echo htmlspecialchars($detail['nama_satker']); ?></td>
                  </tr>
                  <tr>
                    <th>Bukti</th>
                    <td>
                      <?php if (!empty($detail['bukti_pengaduan'])): ?>
                        <a href="<?php echo htmlspecialchars($detail['bukti_pengaduan']); ?>" target="_blank">Lihat PDF</a>
                      <?php else: ?>
                        Tidak Melampirkan Bukti
                      <?php endif; ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Status Aduan</th>
                    <td><?php echo htmlspecialchars($detail['status']); ?></td>
                  </tr>
                  <tr>
                    <th>Tindak Lanjut</th>
                    <td><?php echo nl2br(htmlspecialchars($detail['tanggapan_balik'])); ?></td>
                  </tr>
                  <tr>
                    <th>Klarifikasi Satker</th>
                    <td><?php echo nl2br(htmlspecialchars($detail['tanggapan_satker'])); ?></td>
                  </tr>
                  <tr>
                    <th>Tanggal Aduan</th>
                    <td><?php echo htmlspecialchars($detail['created_at']); ?></td>
                  </tr>
                </table>
                <div class="mt-3">
                  <a href="index.php" class="btn btn-secondary">Kembali</a>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <a href="https://www.instagram.com/kemenag_diy?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank">
        <img src="../adminlte/dist/img/ig.png" alt="Instagram">
      </a>
      <a href="#" target="_blank">
        <img src="../adminlte/dist/img/fb.png" alt="Facebook">
      </a>
      <a href="https://x.com/Kemenag_DIY" target="_blank">
        <img src="../adminlte/dist/img/x.png" alt="Twitter">
      </a>
      <a href="https://youtube.com/@kemenagdiy-hl6ux?si=MQv1TebCUS2tBZlp" target="_blank">
        <img src="../adminlte/dist/img/yt.png" alt="YouTube">
      </a>
      <a href="https://diy.kemenag.go.id/" target="_blank">
        <img src="../adminlte/dist/img/web.png" alt="Website">
      </a>
      <b>Version</b> 1.0
    </div>
    <strong>Hak Cipta &copy; 2024 <a href="https://diy.kemenag.go.id/">KANWIL KEMENAG DIY</a>.</strong>
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<!-- jQuery -->
<script src="../adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
