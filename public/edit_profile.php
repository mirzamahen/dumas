<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
include '../config.php';

// Fetch current user data
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $no_tlp = $_POST['no_tlp'];
    $pekerjaan = $_POST['pekerjaan'];
    $new_username = $_POST['username'];

    // Check if the new username is already taken by another user
    if ($new_username != $username) {
        $checkUsernameQuery = "SELECT * FROM users WHERE username = '$new_username'";
        $checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);

        if (mysqli_num_rows($checkUsernameResult) > 0) {
            $error = 'Username Sudah Dipakai User Lain.';
        } else {
            $updateQuery = "UPDATE users SET username='$new_username', email='$email', nama='$nama', no_tlp='$no_tlp', pekerjaan='$pekerjaan' WHERE username='$username'";
            if (mysqli_query($conn, $updateQuery)) {
                $_SESSION['username'] = $new_username;
                $_SESSION['email'] = $email;
                $_SESSION['nama'] = $nama;
                $_SESSION['no_tlp'] = $no_tlp;
                $_SESSION['pekerjaan'] = $pekerjaan;
                header("Location: profile.php");
                exit;
            } else {
                $error = "Error updating record: " . mysqli_error($conn);
            }
        }
    } else {
        $updateQuery = "UPDATE users SET email='$email', nama='$nama', no_tlp='$no_tlp', pekerjaan='$pekerjaan' WHERE username='$username'";
        if (mysqli_query($conn, $updateQuery)) {
            $_SESSION['email'] = $email;
            $_SESSION['nama'] = $nama;
            $_SESSION['no_tlp'] = $no_tlp;
            $_SESSION['pekerjaan'] = $pekerjaan;
            header("Location: profile.php");
            exit;
        } else {
            $error = "Error updating record: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Profile | Kanwil Kemenag DIY</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
  <link rel="icon" href="../adminlte/dist/img/kemenag.png">
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
            <a href="index.php" class="nav-link">
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
            <a href="profile.php" class="nav-link">
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
            <h1>EDIT PROFILE</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Profil Anda</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php if ($error != ''): ?>
                  <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                  </div>
                <?php endif; ?>
                <form action="edit_profile.php" method="post">
                  <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $user['nama']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="no_tlp">No. Telepon:</label>
                    <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="<?php echo $user['no_tlp']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="pekerjaan">Pekerjaan:</label>
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $user['pekerjaan']; ?>">
                  </div>
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                  <a href="profile.php" class="btn btn-secondary">Cancel</a>
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
