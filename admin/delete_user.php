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

// Prepare delete query
$sql = "DELETE FROM users_admin WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('User Sudah Dihapus'); window.location.href='manage_user.php';</script>";
} else {
    echo "<script>alert('Error: " . $conn->error . "'); window.location.href='manage_user.php';</script>";
}

// Close connection
$conn->close();
?>