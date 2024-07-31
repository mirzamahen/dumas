<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include '../config.php';

// Check if an ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: manage_user.php");
    exit;
}

$id = $conn->real_escape_string($_GET['id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $username = $conn->real_escape_string($_POST['username']);
    $password = !empty($_POST['password']) ? password_hash($conn->real_escape_string($_POST['password']), PASSWORD_BCRYPT) : null;
    $nama = $conn->real_escape_string($_POST['nama']);
    $nip = $conn->real_escape_string($_POST['nip']);
    $satker_id = $conn->real_escape_string($_POST['satker_id']);

    // Prepare update query
    $sql = "UPDATE users_admin SET username='$username', nama='$nama', nip='$nip', satker_id='$satker_id'";
    if ($password) {
        $sql .= ", password='$password'";
    }
    $sql .= " WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('User Berhasil Diupdate'); window.location.href='manage_user.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

// Fetch user details
$user_query = "SELECT * FROM users_admin WHERE id='$id'";
$user_result = $conn->query($user_query);
$user = $user_result->fetch_assoc();

// Fetch satker options for the select input
$satker_query = "SELECT * FROM satker";
$satker_result = $conn->query($satker_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit User | Matur Bapak Yooo</title>

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
          <div class="col-sm-2">
            <button type="button" class="btn btn-block btn-primary" onclick="window.location.href='manage_user.php'">Back to User Management</button>
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
                <h3 class="card-title">Edit User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="update_user.php?id=<?php echo $id; ?>" method="post">
                  <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="password">Password (leave blank to keep current):</label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($user['nama']); ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="nip">NIP:</label>
                    <input type="text" class="form-control" id="nip" name="nip" value="<?php echo htmlspecialchars($user['nip']); ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="satker_id">Satker:</label>
                    <select class="form-control" id="satker_id" name="satker_id" required>
                      <option value="">Select Satker</option>
                      <?php
                      if ($satker_result->num_rows > 0) {
                          while ($satker = $satker_result->fetch_assoc()) {
                              $selected = $satker['satker_id'] == $user['satker_id'] ? 'selected' : '';
                              echo "<option value='".$satker["satker_id"]."' $selected>".$satker["nama_satker"]."</option>";
                          }
                      }
                      ?>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Update User</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

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
// Close connection
$conn->close();
?>
