<?php
require_once '../../helper/connection.php';

if (isset($_GET['id'])) {
    $id_pesan = $_GET['id'];
    $query = "UPDATE pesan SET status = 'dibaca' WHERE id_pesan = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id_pesan);
    mysqli_stmt_execute($stmt);
}

header("Location: ../index.php?page=pesan");
exit;
