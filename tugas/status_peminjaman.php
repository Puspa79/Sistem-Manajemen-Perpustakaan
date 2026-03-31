<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Status Peminjaman Perpustakaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f7;
            display: flex;
            justify-content: center;
            padding-top: 40px;
        }

        .container {
            background: #fff;
            width: 420px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        .line {
            margin: 8px 0;
        }

        .status {
            margin-top: 10px;
            padding: 10px;
            border-radius: 6px;
            font-weight: bold;
        }

        .danger {
            background: #ffe5e5;
            color: red;
        }

        .success {
            background: #e5ffe5;
            color: green;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Status Peminjaman</h2>

        <?php
        // =======================
        // DATA ANGGOTA
        // =======================
        $nama_anggota = "Budi Santoso";
        $total_pinjaman = 2;
        $buku_terlambat = 1;
        $hari_keterlambatan = 5;

        // =======================
        // ATURAN
        // =======================
        $max_pinjam = 3;
        $denda_per_hari = 1000;
        $max_denda = 50000;

        // =======================
        // HITUNG DENDA
        // =======================
        $total_denda = 0;

        if ($buku_terlambat > 0) {
            $total_denda = $buku_terlambat * $hari_keterlambatan * $denda_per_hari;

            if ($total_denda > $max_denda) {
                $total_denda = $max_denda;
            }
        }

        // =======================
        // STATUS PINJAM (IF-ELSEIF-ELSE)
        // =======================
        if ($buku_terlambat > 0) {
            $status = "Tidak bisa meminjam (ada keterlambatan)";
            $class_status = "danger";
        } elseif ($total_pinjaman >= $max_pinjam) {
            $status = "Tidak bisa meminjam (maksimal tercapai)";
            $class_status = "danger";
        } else {
            $status = "Boleh meminjam buku";
            $class_status = "success";
        }

        // =======================
        // LEVEL MEMBER (SWITCH)
        // =======================
        switch (true) {
            case ($total_pinjaman >= 0 && $total_pinjaman <= 5):
                $level = "Bronze";
                break;
            case ($total_pinjaman >= 6 && $total_pinjaman <= 15):
                $level = "Silver";
                break;
            case ($total_pinjaman > 15):
                $level = "Gold";
                break;
            default:
                $level = "Tidak diketahui";
        }
        ?>

        <div class="line"><strong>Nama:</strong> <?= $nama_anggota; ?></div>
        <div class="line"><strong>Total Pinjaman:</strong> <?= $total_pinjaman; ?></div>
        <div class="line"><strong>Level Member:</strong> <?= $level; ?></div>

        <div class="status <?= $class_status; ?>">
            <?= $status; ?>
        </div>

        <hr>

        <?php if ($buku_terlambat > 0): ?>
            <div class="line"><strong>Peringatan!</strong></div>
            <div class="line">Buku Terlambat: <?= $buku_terlambat; ?></div>
            <div class="line">Hari Terlambat: <?= $hari_keterlambatan; ?> hari</div>
            <div class="line">
                Total Denda: <strong>Rp <?= number_format($total_denda, 0, ',', '.'); ?></strong>
            </div>
        <?php else: ?>
            <div class="line" style="color:green;">Tidak ada keterlambatan</div>
        <?php endif; ?>

    </div>

</body>

</html>