<?php

// Pastikan user sudah login
if (!isset($_SESSION['login']['id'])) {
    echo "Silakan login terlebih dahulu.";
    exit;
}

// Ambil data pesanan user
$id_pengguna = $_SESSION['login']['id'];

$query = "SELECT *, DATE_ADD(mulai_pemesanan, INTERVAL durasi MONTH) AS akhir_pemesanan 
          FROM pesanan 
          WHERE id_pengguna = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, 'i', $id_pengguna);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

while ($row = mysqli_fetch_assoc($result)) {
    $akhir_pesan = new DateTime($row['akhir_pemesanan']);
    $sekarang = new DateTime();

    $status_sewa = $sekarang > $akhir_pesan ? 'Perlu Bayar Ulang' : 'Aktif';
    $sisa_hari = $sekarang->diff($akhir_pesan)->format('%r%a');

    echo "<div class='card p-3 mb-2'>";
    echo "<p><strong>Status:</strong> {$status_sewa}</p>";
    echo "<p><strong>Berakhir:</strong> " . $akhir_pesan->format('Y-m-d') . "</p>";
    echo "<p><strong>Sisa waktu:</strong> ";

    if ($sisa_hari >= 0) {
        echo "{$sisa_hari} hari lagi";
    } else {
        $hari_terlewat = $sisa_hari * -1;
        echo "Sudah habis {$hari_terlewat} hari lalu";
    }

    echo "</p>";
    echo "<p><strong>Status Pembayaran:</strong> {$row['status_pembayaran']}</p>";
    echo "</div>";

    // Tampilkan tombol pembayaran ulang jika sudah lewat
    if ($sekarang > $akhir_pesan) {
        echo "<a href='pages/bayar_ulang.php?id={$row['id_pemesanan']}' class='btn btn-danger'>Bayar Ulang</a>";
    }
}
?>
