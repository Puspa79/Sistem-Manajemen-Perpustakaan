<?php
require_once __DIR__ . '/../../config/koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT foto FROM anggota WHERE id_anggota=$id")
);

if ($data['foto'] && file_exists("uploads/".$data['foto'])) {
    unlink("uploads/".$data['foto']);
}

mysqli_query($conn,"DELETE FROM anggota WHERE id_anggota=$id");

header("Location: index.php?success=Data berhasil dihapus");
?>