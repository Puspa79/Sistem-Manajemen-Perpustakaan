<?php
require_once __DIR__ . '/../../config/koneksi.php';

// ================= DASHBOARD =================
$total = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as t FROM anggota"))['t'];
$aktif = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as t FROM anggota WHERE status='Aktif'"))['t'];
$nonaktif = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as t FROM anggota WHERE status!='Aktif'"))['t'];

// ================= EXPORT =================
if (isset($_GET['export'])) {
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=data_anggota.xls");

    $q = mysqli_query($conn,"SELECT * FROM anggota");

    echo "Kode\tNama\tEmail\tTelepon\tJenis Kelamin\tStatus\n";
    while ($d = mysqli_fetch_assoc($q)) {
        echo "{$d['kode_anggota']}\t{$d['nama']}\t{$d['email']}\t{$d['telepon']}\t{$d['jenis_kelamin']}\t{$d['status']}\n";
    }
    exit;
}

// ================= SEARCH =================
$search = isset($_GET['search']) ? $_GET['search'] : '';
$where = "";

if ($search) {
    $searchSafe = mysqli_real_escape_string($conn, $search);
    $where = "WHERE nama LIKE '%$searchSafe%' 
              OR email LIKE '%$searchSafe%' 
              OR telepon LIKE '%$searchSafe%'";
}

// ================= PAGINATION =================
$limit = 10;
$page  = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page  = $page < 1 ? 1 : $page;
$offset = ($page - 1) * $limit;

$totalData = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) as total FROM anggota $where")
)['total'];

$totalPage = ceil($totalData / $limit);

// ================= QUERY =================
$result = mysqli_query($conn,
    "SELECT * FROM anggota 
     $where
     ORDER BY id_anggota DESC 
     LIMIT $limit OFFSET $offset");
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Anggota</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

<h3>Dashboard Anggota</h3>

<!-- DASHBOARD -->
<div class="row mb-3">
<div class="col">
<div class="card p-3 text-center bg-primary text-white">
Total<br><?= $total ?>
</div>
</div>

<div class="col">
<div class="card p-3 text-center bg-success text-white">
Aktif<br><?= $aktif ?>
</div>
</div>

<div class="col">
<div class="card p-3 text-center bg-danger text-white">
Nonaktif<br><?= $nonaktif ?>
</div>
</div>
</div>

<!-- ACTION -->
<div class="mb-3">
<button class="btn btn-primary" onclick="loadForm()">+ Tambah Anggota</button>
<a href="?export=1" class="btn btn-success">Export Excel</a>
</div>

<!-- SEARCH -->
<form class="mb-3">
<input type="text" name="search" class="form-control" placeholder="Cari..." value="<?= $search; ?>">
</form>

<!-- FORM AJAX -->
<div id="formContainer"></div>

<!-- TABEL -->
<table class="table table-bordered">
<tr>
<th>Foto</th>
<th>Kode</th>
<th>Nama</th>
<th>Email</th>
<th>Telepon</th>
<th>Jenis Kelamin</th>
<th>Status</th>
<th>Aksi</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)): ?>
<tr>

<td>
<?php if (!empty($row['foto']) && file_exists(__DIR__.'/uploads/'.$row['foto'])): ?>
<img src="uploads/<?= $row['foto']; ?>" width="50" height="50" style="border-radius:50%;object-fit:cover;">
<?php else: ?>-
<?php endif; ?>
</td>

<td><?= $row['kode_anggota']; ?></td>
<td><?= $row['nama']; ?></td>
<td><?= $row['email']; ?></td>
<td><?= $row['telepon']; ?></td>

<!-- JENIS KELAMIN -->
<td>
<span class="badge bg-<?= $row['jenis_kelamin']=='Laki-laki'?'primary':'warning'; ?>">
<?= $row['jenis_kelamin']; ?>
</span>
</td>

<td>
<span class="badge bg-<?= $row['status']=='Aktif'?'success':'danger'; ?>">
<?= $row['status']; ?>
</span>
</td>

<td>
<a href="edit.php?id=<?= $row['id_anggota']; ?>" class="btn btn-sm btn-warning">Edit</a>
<a href="delete.php?id=<?= $row['id_anggota']; ?>" 
   onclick="return confirm('Yakin hapus?')" 
   class="btn btn-sm btn-danger">Hapus</a>
</td>

</tr>
<?php endwhile; ?>
</table>

<!-- PAGINATION -->
<div class="mt-3">
<?php for ($i=1; $i<=$totalPage; $i++): ?>
<a href="?page=<?= $i; ?>&search=<?= $search; ?>" 
   class="btn btn-sm <?= ($i==$page?'btn-primary':'btn-secondary'); ?>">
   <?= $i; ?>
</a>
<?php endfor; ?>
</div>

<!-- JS -->
<script>
function loadForm() {
    fetch('create.php')
    .then(res => res.text())
    .then(data => {
        document.getElementById('formContainer').innerHTML = data;
    });
}
</script>

</body>
</html>