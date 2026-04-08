<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Anggota Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<?php
require_once 'functions_anggota.php';

// DATA ANGGOTA
$anggota_list = [
    [
        "id" => "AGT-001",
        "nama" => "Puspa Dwi",
        "email" => "puspa@email.com",
        "status" => "Aktif",
        "total_pinjaman" => 5,
        "tanggal_daftar" => "2024-01-15"
    ],
    [
        "id" => "AGT-002",
        "nama" => "Ramona Aprilia",
        "email" => "ramona@email.com",
        "status" => "Aktif",
        "total_pinjaman" => 8,
        "tanggal_daftar" => "2024-02-01"
    ],
    [
        "id" => "AGT-003",
        "nama" => "Lintang Tsaniatu",
        "email" => "lintang@email.com",
        "status" => "Non-Aktif",
        "total_pinjaman" => 2,
        "tanggal_daftar" => "2023-12-10"
    ],
    [
        "id" => "AGT-004",
        "nama" => "Syafira",
        "email" => "syafira@email.com",
        "status" => "Aktif",
        "total_pinjaman" => 10,
        "tanggal_daftar" => "2024-03-05"
    ],
    [
        "id" => "AGT-005",
        "nama" => "Arum Rahma",
        "email" => "arum@email.com",
        "status" => "Non-Aktif",
        "total_pinjaman" => 1,
        "tanggal_daftar" => "2023-11-20"
    ],
];

// SEARCH & SORT
$keyword = $_GET['search'] ?? '';
if ($keyword) {
    $anggota_list = search_anggota_by_nama($anggota_list, $keyword);
}
$anggota_list = sort_anggota_by_nama($anggota_list);

// STATISTIK
$total = hitung_total_anggota($anggota_list);
$aktif = hitung_anggota_aktif($anggota_list);
$nonaktif = $total - $aktif;
$rata = hitung_rata_rata_pinjaman($anggota_list);
$teraktif = cari_anggota_teraktif($anggota_list);
?>

<div class="container mt-4">
    <h1 class="mb-4"><i class="bi bi-people"></i> Sistem Anggota Perpustakaan</h1>

    <!-- DASHBOARD -->
    <div class="row mb-4">
        <div class="col-md-3"><div class="card text-bg-primary h-100"><div class="card-body"><h6>Total</h6><h3><?= $total ?></h3></div></div></div>
        <div class="col-md-3"><div class="card text-bg-success h-100"><div class="card-body"><h6>Aktif</h6><h3><?= $aktif ?></h3></div></div></div>
        <div class="col-md-3"><div class="card text-bg-danger h-100"><div class="card-body"><h6>Non-Aktif</h6><h3><?= $nonaktif ?></h3></div></div></div>
        <div class="col-md-3"><div class="card text-bg-warning h-100"><div class="card-body"><h6>Rata-rata Pinjam</h6><h3><?= $rata ?></h3></div></div></div>
    </div>

    <!-- SEARCH -->
    <form class="mb-3">
        <input type="text" name="search" class="form-control w-25" placeholder="Cari nama..." value="<?= $keyword ?>">
    </form>

    <!-- TABEL -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Daftar Anggota</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th><th>Nama</th><th>Email</th><th>Status</th><th>Pinjaman</th><th>Tgl Daftar</th>
                </tr>
                <?php foreach ($anggota_list as $a): ?>
                <tr>
                    <td><?= $a['id'] ?></td>
                    <td><?= $a['nama'] ?></td>
                    <td><?= $a['email'] ?></td>
                    <td>
                        <span class="badge <?= $a['status']=='Aktif'?'bg-success':'bg-secondary' ?>">
                            <?= $a['status'] ?>
                        </span>
                    </td>
                    <td><?= $a['total_pinjaman'] ?></td>
                    <td><?= format_tanggal_indo($a['tanggal_daftar']) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <!-- TERAKTIF -->
    <div class="card">
        <div class="card-header bg-success text-white">Anggota Teraktif</div>
        <div class="card-body">
            <h4><?= $teraktif['nama'] ?></h4>
            <p><?= $teraktif['total_pinjaman'] ?> kali pinjam</p>
        </div>
    </div>
</div>
<script>
    function handleSearch(value) {
        if (value.trim() === '') {
            window.location.href = 'sistem_anggota.php';
        }
    }
</script>
</body>
</html>