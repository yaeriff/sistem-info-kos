<?php
session_start();
require_once '../../helper/connection.php';

if (!isset($_SESSION['login'])) {
  header('Location: ../../forms/auth/login.php');
  exit;
}

$id_user = $_SESSION['login']['id'];
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

// Validasi password baru dan konfirmasi
if ($new_password !== $confirm_password) {
  header("Location: ../index.php?page=profile&status=confirm_mismatch");
  exit;
}

// Ambil password lama dari database
$query = "SELECT password FROM pengguna WHERE id = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "i", $id_user);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $hashed_password_db);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

// Verifikasi password lama
if (!password_verify($old_password, $hashed_password_db)) {
  header("Location: ../index.php?page=profile&status=wrong_old");
  exit;
}

// Hash password baru dan update ke database
$new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
$query_update = "UPDATE pengguna SET password = ? WHERE id = ?";
$stmt_update = mysqli_prepare($connection, $query_update);
mysqli_stmt_bind_param($stmt_update, "si", $new_password_hash, $id_user);
$success = mysqli_stmt_execute($stmt_update);
mysqli_stmt_close($stmt_update);

// Redirect sesuai hasil
if ($success) {
  header("Location: ../index.php?page=profile&status=success");
} else {
  header("Location: ../index.php?page=profile&status=fail");
}
