<?php
session_start();
require_once('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind the statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users_admin WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Store all the user's data in the session, except the password
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['nip'] = $row['nip'];
            $_SESSION['satker_id'] = $row['satker_id'];

            // Redirect based on satker_id
            if ($row['satker_id'] == 1) {
                header("Location: index.php");
            } else {
                header("Location: tindak_lanjut_satker.php");
            }
            exit();  // Make sure to exit after header redirection
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Username tidak ditemukan.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
    <link rel="icon" href="../adminlte/dist/img/kemenag.png">
    <style>
        .login-logo img {
            width: 100px; /* Adjust the width as needed */
            height: auto; /* Maintain the aspect ratio */
        }
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a><img src="../adminlte/dist/img/kemenag.png" alt="kemenag"></a>
        <br>
        <a>KANTOR WILAYAH KEMENTERIAN AGAMA DIY</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg"><b>LOGIN ADMIN MATUR BAPAK YO</b></p>
            <form action="login.php" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="username" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="../adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../adminlte/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>