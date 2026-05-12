<?php
// ================================
// DATA ANGGOTA PERPUSTAKAAN
// ================================
$anggota_list = [
    [
        "id" => "AGT-001",
        "nama" => "Budi Santoso",
        "email" => "budi@email.com",
        "telepon" => "081234567890",
        "alamat" => "Jakarta",
        "tanggal_daftar" => "2024-01-15",
        "status" => "Aktif",
        "total_pinjaman" => 5
    ],
    [
        "id" => "AGT-002",
        "nama" => "Siti Aminah",
        "email" => "siti@email.com",
        "telepon" => "081298765432",
        "alamat" => "Bandung",
        "tanggal_daftar" => "2024-02-01",
        "status" => "Aktif",
        "total_pinjaman" => 8
    ],
    [
        "id" => "AGT-003",
        "nama" => "Andi Wijaya",
        "email" => "andi@email.com",
        "telepon" => "082112345678",
        "alamat" => "Surabaya",
        "tanggal_daftar" => "2023-12-10",
        "status" => "Non-Aktif",
        "total_pinjaman" => 2
    ],
    [
        "id" => "AGT-004",
        "nama" => "Dewi Lestari",
        "email" => "dewi@email.com",
        "telepon" => "083312345678",
        "alamat" => "Yogyakarta",
        "tanggal_daftar" => "2024-03-05",
        "status" => "Aktif",
        "total_pinjaman" => 10
    ],
    [
        "id" => "AGT-005",
        "nama" => "Rizky Pratama",
        "email" => "rizky@email.com",
        "telepon" => "084412345678",
        "alamat" => "Semarang",
        "tanggal_daftar" => "2023-11-20",
        "status" => "Non-Aktif",
        "total_pinjaman" => 1
    ],
];

// ================================
// PERHITUNGAN STATISTIK
// ================================
$total_anggota = count($anggota_list);

$aktif = 0;
$non_aktif = 0;
$total_pinjaman = 0;
$teraktif = $anggota_list[0];

foreach ($anggota_list as $anggota) {
    $total_pinjaman += $anggota['total_pinjaman'];

    if ($anggota['status'] === "Aktif") {
        $aktif++;
    } else {
        $non_aktif++;
    }

    if ($anggota['total_pinjaman'] > $teraktif['total_pinjaman']) {
        $teraktif = $anggota;
    }
}

$persen_aktif = ($aktif / $total_anggota) * 100;
$persen_non_aktif = ($non_aktif / $total_anggota) * 100;
$rata_pinjaman = round($total_pinjaman / $total_anggota);

// ================================
// FILTER STATUS
// ================================
$filter_status = $_GET['status'] ?? 'Semua';

$anggota_filtered = array_filter($anggota_list, function ($a) use ($filter_status) {
    if ($filter_status === 'Semua') return true;
    return $a['status'] === $filter_status;
});
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Anggota Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-4">
    <h2 class="mb-4 text-center">📚 Data Anggota Perpustakaan</h2>

    <!-- STATISTIK -->
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card text-bg-primary">
                <div class="card-body">
                    <h5>Total Anggota</h5>
                    <h3><?= $total_anggota ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-bg-success">
                <div class="card-body">
                    <h5>Anggota Aktif</h5>
                    <h3><?= number_format($persen_aktif, 1) ?>%</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-bg-danger">
                <div class="card-body">
                    <h5>Anggota Non-Aktif</h5>
                    <h3><?= number_format($persen_non_aktif, 1) ?>%</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-bg-warning">
                <div class="card-body">
                    <h5>Rata-rata Pinjaman</h5>
                    <h3><?= number_format($rata_pinjaman, 1) ?> Buku</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
        <div class="card text-bg-info h-100 position-relative">
            
            <!-- Badge kanan atas -->
            <span class="position-absolute top-0 end-0 badge bg-dark m-2">
                <?= $teraktif['total_pinjaman'] ?>x pinjam
            </span>

            <div class="card-body d-flex flex-column justify-content-center">
                <h5>Anggota Teraktif</h5>
                <h3><?= $teraktif['nama'] ?></h3>
            </div>

        </div>
        </div>

    <!-- FILTER -->
    <form method="get" class="mb-3">
        <select name="status" class="form-select w-25" onchange="this.form.submit()">
            <option value="Semua">Semua Status</option>
            <option value="Aktif" <?= $filter_status == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
            <option value="Non-Aktif" <?= $filter_status == 'Non-Aktif' ? 'selected' : '' ?>>Non-Aktif</option>
        </select>
    </form>

    <!-- TABEL ANGGOTA -->
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Tanggal Daftar</th>
                        <th>Status</th>
                        <th>Total Pinjaman</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($anggota_filtered as $a): ?>
                    <tr>
                        <td><?= $a['id'] ?></td>
                        <td><?= $a['nama'] ?></td>
                        <td><?= $a['email'] ?></td>
                        <td><?= $a['telepon'] ?></td>
                        <td><?= $a['alamat'] ?></td>
                        <td><?= $a['tanggal_daftar'] ?></td>
                        <td>
                            <span class="badge <?= $a['status'] == 'Aktif' ? 'bg-success' : 'bg-secondary' ?>">
                                <?= $a['status'] ?>
                            </span>
                        </td>
                        <td><?= $a['total_pinjaman'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>