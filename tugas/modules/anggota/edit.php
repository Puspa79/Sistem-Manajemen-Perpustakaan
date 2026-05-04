<?php
require_once __DIR__ . '/../../config/koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT * FROM anggota WHERE id_anggota=$id")
);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $foto = $data['foto'];
    if (!empty($_FILES['foto']['name'])) {
        if ($foto && file_exists("uploads/$foto")) {
            unlink("uploads/$foto");
        }
        $foto = time().'_'.$_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/$foto");
    }

    mysqli_query($conn,
        "UPDATE anggota SET 
        nama='$nama', email='$email', foto='$foto'
        WHERE id_anggota=$id");

    header("Location: index.php?success=Data berhasil diupdate");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

<h3>Edit Anggota</h3>

<div class="card p-4 shadow" style="max-width:500px;">

<form method="post" enctype="multipart/form-data">

<div class="mb-3 text-center">
<?php if (!empty($data['foto']) && file_exists("uploads/".$data['foto'])): ?>
    <img src="uploads/<?= $data['foto']; ?>" 
         width="100" height="100" 
         style="border-radius:50%; object-fit:cover;">
<?php else: ?>
    <div class="text-muted">Tidak ada foto</div>
<?php endif; ?>
</div>

<div class="mb-3">
    <label>Nama</label>
    <input name="nama" class="form-control" value="<?= $data['nama']; ?>" required>
</div>

<div class="mb-3">
    <label>Email</label>
    <input name="email" type="email" class="form-control" value="<?= $data['email']; ?>" required>
</div>

<div class="mb-3">
    <label>Ganti Foto</label>
    <input type="file" name="foto" class="form-control">
</div>

<button name="submit" class="btn btn-primary">Update</button>
<a href="index.php" class="btn btn-secondary">Kembali</a>

</form>

</div>

</body>
</html>