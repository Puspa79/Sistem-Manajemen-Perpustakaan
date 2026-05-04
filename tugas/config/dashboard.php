<?php
require_once __DIR__ . '/koneksi.php';

// Total anggota
$query_total = mysqli_query($conn, "SELECT COUNT(*) AS total FROM anggota");
$data_total = mysqli_fetch_assoc($query_total);

// Anggota aktif
$query_aktif = mysqli_query($conn, "SELECT COUNT(*) AS aktif FROM anggota WHERE status='Aktif'");
$data_aktif = mysqli_fetch_assoc($query_aktif);

// Anggota nonaktif
$query_nonaktif = mysqli_query($conn, "SELECT COUNT(*) AS nonaktif FROM anggota WHERE status='Nonaktif'");
$data_nonaktif = mysqli_fetch_assoc($query_nonaktif);