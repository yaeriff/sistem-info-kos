<div class="container py-5">
    <h1 class="mb-4">Dashboard Pengguna</h1>

    <div class="dashboard-card profile-section">
        </div>

    <div class="row">
        <div class="col-md-6">
            <div class="dashboard-card">
                <h4>Pesan & Notifikasi</h4>
                <?php
                // Logika PHP untuk mengambil jumlah pesan belum dibaca atau 3 pesan terbaru
                // Misalnya:
                $unreadMessagesCount = 5; // Contoh data
                $latestMessages = [
                    ['id' => 1, 'subject' => 'Pembayaran Anda Berhasil', 'read' => false],
                    ['id' => 2, 'subject' => 'Kamar Anda Telah Dikonfirmasi', 'read' => false],
                    ['id' => 3, 'subject' => 'Promo Diskon Bulan Ini', 'read' => true],
                ];
                ?>
                <?php if ($unreadMessagesCount > 0): ?>
                    <div class="alert alert-info">
                        Anda memiliki **<?= $unreadMessagesCount ?>** pesan baru.
                    </div>
                <?php else: ?>
                    <div class="alert alert-success">Tidak ada pesan baru.</div>
                <?php endif; ?>

                <h6>Pesan Terbaru:</h6>
                <ul class="list-group list-group-flush">
                    <?php foreach ($latestMessages as $msg): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= htmlspecialchars($msg['subject']) ?>
                            <?php if (!$msg['read']): ?>
                                <span class="badge bg-primary rounded-pill">Baru</span>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <a href="pesan_masuk.php" class="btn btn-link mt-2">Lihat Semua Pesan</a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="dashboard-card">
                <h4>Pesanan Aktif / Terbaru</h4>
                <?php if (empty($pesananAktif)): // Asumsi $pesananAktif dari contoh sebelumnya ?>
                    <div class="alert alert-info">Anda belum memiliki pesanan aktif.</div>
                <?php else: ?>
                    <ul class="list-group list-group-flush">
                        <?php
                        // Tampilkan hanya beberapa pesanan aktif/terbaru, misal 3
                        $displayCount = 0;
                        foreach ($pesananAktif as $pesanan):
                            if ($displayCount >= 3) break; // Batasi 3
                        ?>
                            <li class="list-group-item">
                                <strong>Kamar:</strong> <?= htmlspecialchars($pesanan['nama_kamar']) ?><br>
                                <strong>Mulai:</strong> <?= htmlspecialchars($pesanan['mulai_pemesanan']) ?><br>
                                <strong>Status:</strong> <span class="badge bg-success"><?= htmlspecialchars($pesanan['status_pemesanan']) ?></span>
                                <a href="detail_pesanan.php?id=<?= $pesanan['id_pemesanan'] ?>" class="float-end btn btn-sm btn-outline-primary">Detail</a>
                            </li>
                        <?php
                            $displayCount++;
                        endforeach;
                        ?>
                    </ul>
                    <a href="riwayat_pemesanan.php" class="btn btn-link mt-2">Lihat Semua Riwayat Pesanan</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>