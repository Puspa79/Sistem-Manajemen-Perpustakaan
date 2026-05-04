<?php
require_once __DIR__ . '/../../config/koneksi.php';

$errors = [];

if (isset($_POST['submit'])) {

    $kode = trim($_POST['kode']);
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $telepon = trim($_POST['telepon']);
    $alamat = trim($_POST['alamat']);
    $tgl_lahir = $_POST['tanggal_lahir'];
    $gender = $_POST['jenis_kelamin'];
    $pekerjaan = $_POST['pekerjaan'];

    // ================= VALIDASI =================
    if (!$kode || !$nama || !$email || !$telepon || !$alamat || !$tgl_lahir) {
        $errors[] = "Semua field wajib diisi!";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid!";
    }

    if (!preg_match('/^08[0-9]{8,11}$/', $telepon)) {
        $errors[] = "Telepon harus format 08xxxxxxxxxx";
    }

    $umur = date_diff(date_create($tgl_lahir), date_create('today'))->y;
    if ($umur < 10) {
        $errors[] = "Umur minimal 10 tahun!";
    }

    // ================= JIKA VALID =================
    if (empty($errors)) {

        $tgl_daftar = date('Y-m-d');
        $status = "Aktif";

        $foto = null;
        if (!empty($_FILES['foto']['name'])) {
            $foto = time().'_'.$_FILES['foto']['name'];
            move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/$foto");
        }

        $stmt = mysqli_prepare($conn,
            "INSERT INTO anggota 
            (kode_anggota,nama,email,telepon,alamat,tanggal_lahir,jenis_kelamin,pekerjaan,tanggal_daftar,status,foto)
            VALUES (?,?,?,?,?,?,?,?,?,?,?)");

        mysqli_stmt_bind_param($stmt,"sssssssssss",
            $kode,$nama,$email,$telepon,$alamat,$tgl_lahir,$gender,$pekerjaan,$tgl_daftar,$status,$foto);

        mysqli_stmt_execute($stmt);

        echo "<script>alert('Data berhasil ditambahkan');window.location='index.php';</script>";
        exit;
    }
}
?>

<div class="card p-4 mb-3">
<h5>Tambah Anggota</h5>

<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
<?php foreach ($errors as $e) echo "<div>$e</div>"; ?>
</div>
<?php endif; ?>

<form method="post" enctype="multipart/form-data">

<input name="kode" class="form-control mb-2" placeholder="Kode" required>
<input name="nama" class="form-control mb-2" placeholder="Nama" required>
<input name="email" type="email" class="form-control mb-2" placeholder="Email" required>
<input name="telepon" class="form-control mb-2" placeholder="08xxxxxxxxxx" required>
<textarea name="alamat" class="form-control mb-2" placeholder="Alamat"></textarea>
<input type="date" name="tanggal_lahir" class="form-control mb-2" required>

<select name="jenis_kelamin" class="form-select mb-2">
<option>Laki-laki</option>
<option>Perempuan</option>
</select>

<input name="pekerjaan" class="form-control mb-2" placeholder="Pekerjaan">
<input type="file" name="foto" class="form-control mb-2">

<button name="submit" class="btn btn-success">Simpan</button>
</form>
</div>