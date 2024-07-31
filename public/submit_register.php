<?php
// Include config file
include '../config.php';

// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Get form data
$user = $_POST['username'];
$pass = $_POST['password'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$nik = $_POST['nik'];
$no_tlp = $_POST['no_tlp'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$pekerjaan = $_POST['pekerjaan'];

// Hash the password before storing it in the database
$hashed_password = password_hash($pass, PASSWORD_BCRYPT);

try {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, nama, nik, no_tlp, jenis_kelamin, pekerjaan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $user, $email, $hashed_password, $nama,  $nik, $no_tlp, $jenis_kelamin, $pekerjaan);

    // Execute the statement
    $stmt->execute();
    echo "<script>alert('Akun Berhasil Dibuat, Silahkan Login'); window.location.href='login.php';</script>";
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) { // 1062 is the code for duplicate entry
        // Check which field caused the duplicate entry error
        if (strpos($e->getMessage(), 'username') !== false) {
            echo "<script>alert('Username sudah terdaftar, silakan gunakan username lain.'); window.location.href='register.php';</script>";
        } elseif (strpos($e->getMessage(), 'email') !== false) {
            echo "<script>alert('Email sudah terdaftar, silakan gunakan email lain.'); window.location.href='register.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan, silakan coba lagi.'); window.location.href='register.php';</script>";
        }
    } else {
        echo "Error: " . $e->getMessage();
    }
}

// Close connection
$stmt->close();
$conn->close();
?>
