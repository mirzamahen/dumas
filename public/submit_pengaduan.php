<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

require_once '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul_pengaduan = $_POST['judul_pengaduan'];
    $isi_pengaduan = $_POST['isi_pengaduan'];
    $satker_pengaduan = $_POST['satker_pengaduan'];
    $id_user = $_SESSION['id_users']; // Get user ID from session
    $status_aduan = '1';
    $created_at = date("Y-m-d H:i:s"); // Get current date and time
    
    // Process upload PDF bukti
    $target_dir_bukti = "../bukti/";
    if (!file_exists($target_dir_bukti)) {
        mkdir($target_dir_bukti, 0777, true);
    }
    $new_file_name_bukti = uniqid('bukti_', true) . '.pdf';
    $target_file_bukti = $target_dir_bukti . $new_file_name_bukti;
    if (move_uploaded_file($_FILES["pdf_bukti"]["tmp_name"], $target_file_bukti)) {
        $bukti_pengaduan = $target_file_bukti;
    } else {
        $bukti_pengaduan = NULL; // If the upload fails, set to NULL
    }

    // Generate nomor tracking
    $tracking_number = "PGD" . time() . rand(1000, 9999);

    // Insert data into database
    $stmt = $conn->prepare("INSERT INTO pengaduan (judul_pengaduan, isi_pengaduan, satker_pengaduan, bukti_pengaduan, id_user, tracking, status_aduan, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $judul_pengaduan, $isi_pengaduan, $satker_pengaduan, $bukti_pengaduan, $id_user, $tracking_number, $status_aduan, $created_at);

    if ($stmt->execute()) {
        // Redirect to a confirmation page with tracking number
        header("Location: confirmation.php?tracking_number=" . $tracking_number);
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
