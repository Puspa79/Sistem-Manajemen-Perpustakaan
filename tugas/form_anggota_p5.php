<?php
// ======================
// INISIALISASI
// ======================
$errors = [];
$data = [
    'nama' => '',
    'email' => '',
    'telepon' => '',
    'alamat' => '',
    'jk' => '',
    'tgl_lahir' => '',
    'pekerjaan' => ''
];
$sukses = false;

// ======================
// PROSES SUBMIT
// ======================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ambil data
    foreach ($data as $key => $val) {
        $data[$key] = trim($_POST[$key] ?? '');
    }

    // Validasi Nama
    if ($data['nama'] === '' || strlen($data['nama']) < 3) {
        $errors['nama'] = 'Nama minimal 3 karakter';
    }

    // Validasi Email
    if ($data['email'] === '' || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email tidak valid';
    }

    // Validasi Telepon
    if (!preg_match('/^08[0-9]{8,11}$/', $data['telepon'])) {
        $errors['telepon'] = 'Format telepon harus 08xxxxxxxxxx (10–13 digit)';
    }

    // Validasi Alamat
    if ($data['alamat'] === '' || strlen($data['alamat']) < 10) {
        $errors['alamat'] = 'Alamat minimal 10 karakter';
    }

    // Validasi Jenis Kelamin
    if ($data['jk'] === '') {
        $errors['jk'] = 'Pilih jenis kelamin';
    }

    // Validasi Tanggal Lahir (umur ≥ 10 tahun)
    if ($data['tgl_lahir'] === '') {
        $errors['tgl_lahir'] = 'Tanggal lahir wajib diisi';
    } else {
        $umur = date_diff(date_create($data['tgl_lahir']), date_create())->y;
        if ($umur < 10) {
            $errors['tgl_lahir'] = 'Umur minimal 10 tahun';
        }
    }

    // Validasi Pekerjaan
    if ($data['pekerjaan'] === '') {
        $errors['pekerjaan'] = 'Pilih pekerjaan';
    }

    // Jika tidak ada error
    if (empty($errors)) {
        $sukses = true;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Registrasi Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h3 class="mb-4">📚 Form Registrasi Anggota Perpustakaan</h3>

    <!-- SUCCESS MESSAGE -->
    <?php if ($sukses): ?>
        <div class="alert alert-success">Registrasi berhasil!</div>

        <div class="card mb-4">
            <div class="card-header bg-success text-white">Data Anggota</div>
            <div class="card-body">
                <p><strong>Nama:</strong> <?= htmlspecialchars($data['nama']) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($data['email']) ?></p>
                <p><strong>Telepon:</strong> <?= htmlspecialchars($data['telepon']) ?></p>
                <p><strong>Alamat:</strong> <?= htmlspecialchars($data['alamat']) ?></p>
                <p><strong>Jenis Kelamin:</strong> <?= $data['jk'] ?></p>
                <p><strong>Tanggal Lahir:</strong> <?= $data['tgl_lahir'] ?></p>
                <p><strong>Pekerjaan:</strong> <?= $data['pekerjaan'] ?></p>
            </div>
        </div>
    <?php endif; ?>

    <!-- FORM -->
    <form method="post" novalidate>

        <!-- Nama -->
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama"
                   class="form-control <?= isset($errors['nama']) ? 'is-invalid' : '' ?>"
                   value="<?= htmlspecialchars($data['nama']) ?>">
            <div class="invalid-feedback"><?= $errors['nama'] ?? '' ?></div>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email"
                   class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                   value="<?= htmlspecialchars($data['email']) ?>">
            <div class="invalid-feedback"><?= $errors['email'] ?? '' ?></div>
        </div>

        <!-- Telepon -->
        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon"
                   class="form-control <?= isset($errors['telepon']) ? 'is-invalid' : '' ?>"
                   value="<?= htmlspecialchars($data['telepon']) ?>">
            <div class="invalid-feedback"><?= $errors['telepon'] ?? '' ?></div>
        </div>

        <!-- Alamat -->
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat"
                      class="form-control <?= isset($errors['alamat']) ? 'is-invalid' : '' ?>"><?= htmlspecialchars($data['alamat']) ?></textarea>
            <div class="invalid-feedback"><?= $errors['alamat'] ?? '' ?></div>
        </div>

        <!-- Jenis Kelamin -->
        <div class="mb-3">
            <label>Jenis Kelamin</label><br>
            <input type="radio" name="jk" value="Laki-laki" <?= $data['jk']=='Laki-laki'?'checked':'' ?>> Laki-laki
            <input type="radio" name="jk" value="Perempuan" <?= $data['jk']=='Perempuan'?'checked':'' ?>> Perempuan
            <div class="text-danger small"><?= $errors['jk'] ?? '' ?></div>
        </div>

        <!-- Tanggal Lahir -->
        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir"
                   class="form-control <?= isset($errors['tgl_lahir']) ? 'is-invalid' : '' ?>"
                   value="<?= $data['tgl_lahir'] ?>">
            <div class="invalid-feedback"><?= $errors['tgl_lahir'] ?? '' ?></div>
        </div>

        <!-- Pekerjaan -->
        <div class="mb-3">
            <label>Pekerjaan</label>
            <select name="pekerjaan"
                    class="form-select <?= isset($errors['pekerjaan']) ? 'is-invalid' : '' ?>">
                <option value="">-- Pilih --</option>
                <?php
                $opsi = ['Pelajar','Mahasiswa','Pegawai','Lainnya'];
                foreach ($opsi as $o) {
                    $sel = $data['pekerjaan']==$o?'selected':'';
                    echo "<option $sel>$o</option>";
                }
                ?>
            </select>
            <div class="invalid-feedback"><?= $errors['pekerjaan'] ?? '' ?></div>
        </div>

        <button class="btn btn-primary">Daftar</button>
    </form>
</div>

</body>
</html>