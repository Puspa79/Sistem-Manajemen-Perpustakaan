<?php
// ======================
// DATA BUKU (MINIMAL 10)
// ======================
$buku_list = [
    ['kode'=>'B001','judul'=>'Pemrograman PHP','kategori'=>'Teknologi','pengarang'=>'Andi','penerbit'=>'Informatika','tahun'=>2020,'harga'=>85000,'stok'=>5],
    ['kode'=>'B002','judul'=>'Dasar HTML CSS','kategori'=>'Teknologi','pengarang'=>'Budi','penerbit'=>'Elex','tahun'=>2019,'harga'=>65000,'stok'=>0],
    ['kode'=>'B003','judul'=>'Algoritma dan Logika','kategori'=>'Teknologi','pengarang'=>'Cici','penerbit'=>'Andi','tahun'=>2021,'harga'=>90000,'stok'=>3],
    ['kode'=>'B004','judul'=>'Novel Senja','kategori'=>'Fiksi','pengarang'=>'Rama','penerbit'=>'Gramedia','tahun'=>2018,'harga'=>75000,'stok'=>2],
    ['kode'=>'B005','judul'=>'Cerita Nusantara','kategori'=>'Fiksi','pengarang'=>'Putri','penerbit'=>'Bentang','tahun'=>2017,'harga'=>70000,'stok'=>0],
    ['kode'=>'B006','judul'=>'Matematika Dasar','kategori'=>'Pendidikan','pengarang'=>'Siti','penerbit'=>'Erlangga','tahun'=>2022,'harga'=>80000,'stok'=>4],
    ['kode'=>'B007','judul'=>'Fisika SMA','kategori'=>'Pendidikan','pengarang'=>'Ahmad','penerbit'=>'Yudhistira','tahun'=>2020,'harga'=>88000,'stok'=>6],
    ['kode'=>'B008','judul'=>'Sejarah Dunia','kategori'=>'Pendidikan','pengarang'=>'Nina','penerbit'=>'Gramedia','tahun'=>2016,'harga'=>95000,'stok'=>1],
    ['kode'=>'B009','judul'=>'Bisnis Digital','kategori'=>'Bisnis','pengarang'=>'Dewi','penerbit'=>'Elex','tahun'=>2023,'harga'=>120000,'stok'=>7],
    ['kode'=>'B010','judul'=>'Manajemen Waktu','kategori'=>'Bisnis','pengarang'=>'Rizki','penerbit'=>'Elex','tahun'=>2021,'harga'=>78000,'stok'=>0],
];

// ======================
// AMBIL PARAMETER GET
// ======================
$keyword   = $_GET['keyword'] ?? '';
$kategori  = $_GET['kategori'] ?? '';
$min_harga = $_GET['min_harga'] ?? '';
$max_harga = $_GET['max_harga'] ?? '';
$tahun     = $_GET['tahun'] ?? '';
$status    = $_GET['status'] ?? 'semua';
$sort      = $_GET['sort'] ?? 'judul';
$page      = $_GET['page'] ?? 1;

// ======================
// VALIDASI
// ======================
$errors = [];
$currentYear = date('Y');

if ($min_harga !== '' && $max_harga !== '' && $min_harga > $max_harga) {
    $errors[] = "Harga minimum tidak boleh lebih besar dari harga maksimum";
}

if ($tahun !== '' && ($tahun < 1900 || $tahun > $currentYear)) {
    $errors[] = "Tahun harus antara 1900 - $currentYear";
}

// ======================
// FILTER DATA
// ======================
$hasil = array_filter($buku_list, function($b) use ($keyword,$kategori,$min_harga,$max_harga,$tahun,$status) {

    if ($keyword && !stristr($b['judul'],$keyword) && !stristr($b['pengarang'],$keyword)) return false;
    if ($kategori && $b['kategori'] !== $kategori) return false;
    if ($min_harga !== '' && $b['harga'] < $min_harga) return false;
    if ($max_harga !== '' && $b['harga'] > $max_harga) return false;
    if ($tahun && $b['tahun'] != $tahun) return false;
    if ($status === 'tersedia' && $b['stok'] <= 0) return false;
    if ($status === 'habis' && $b['stok'] > 0) return false;

    return true;
});

// ======================
// SORTING
// ======================
usort($hasil, function($a,$b) use ($sort) {
    return $a[$sort] <=> $b[$sort];
});

// ======================
// PAGINATION
// ======================
$perPage = 10;
$totalData = count($hasil);
$totalPage = ceil($totalData / $perPage);
$start = ($page - 1) * $perPage;
$hasilPage = array_slice($hasil, $start, $perPage);

// ======================
// FUNCTION HIGHLIGHT
// ======================
function highlight($text, $keyword) {
    if (!$keyword) return $text;
    return preg_replace("/($keyword)/i", "<mark>$1</mark>", $text);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pencarian Buku Lanjutan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
<h3>🔍 Sistem Pencarian Buku</h3>

<!-- ERROR -->
<?php foreach ($errors as $e): ?>
<div class="alert alert-danger"><?= $e ?></div>
<?php endforeach; ?>

<!-- FORM -->
<form method="get" class="row g-3 mb-4">
    <div class="col-md-3">
        <input type="text" name="keyword" class="form-control" placeholder="Judul / Pengarang" value="<?= $keyword ?>">
    </div>

    <div class="col-md-2">
        <select name="kategori" class="form-select">
            <option value="">Semua Kategori</option>
            <?php foreach (['Teknologi','Fiksi','Pendidikan','Bisnis'] as $k): ?>
                <option <?= $kategori==$k?'selected':'' ?>><?= $k ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-1">
        <input type="number" name="min_harga" class="form-control" placeholder="Min" value="<?= $min_harga ?>">
    </div>

    <div class="col-md-1">
        <input type="number" name="max_harga" class="form-control" placeholder="Max" value="<?= $max_harga ?>">
    </div>

    <div class="col-md-1">
        <input type="number" name="tahun" class="form-control" placeholder="Tahun" value="<?= $tahun ?>">
    </div>

    <div class="col-md-2">
        <select name="sort" class="form-select">
            <option value="judul">Judul</option>
            <option value="harga">Harga</option>
            <option value="tahun">Tahun</option>
        </select>
    </div>

    <div class="col-md-2">
        <div class="form-check">
            <input type="radio" name="status" value="semua" <?= $status=='semua'?'checked':'' ?>> Semua
            <input type="radio" name="status" value="tersedia" <?= $status=='tersedia'?'checked':'' ?>> Tersedia
            <input type="radio" name="status" value="habis" <?= $status=='habis'?'checked':'' ?>> Habis
        </div>
    </div>

    <div class="col-md-12">
        <button class="btn btn-primary">Cari</button>
    </div>
</form>

<!-- HASIL -->
<p><strong><?= $totalData ?></strong> buku ditemukan</p>

<table class="table table-bordered table-striped">
<thead>
<tr>
<th>Kode</th><th>Judul</th><th>Pengarang</th><th>Kategori</th>
<th>Tahun</th><th>Harga</th><th>Stok</th>
</tr>
</thead>
<tbody>
<?php foreach ($hasilPage as $b): ?>
<tr>
<td><?= $b['kode'] ?></td>
<td><?= highlight($b['judul'],$keyword) ?></td>
<td><?= highlight($b['pengarang'],$keyword) ?></td>
<td><?= $b['kategori'] ?></td>
<td><?= $b['tahun'] ?></td>
<td>Rp <?= number_format($b['harga']) ?></td>
<td><?= $b['stok'] > 0 ? 'Tersedia' : 'Habis' ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

</div>
</body>
</html>