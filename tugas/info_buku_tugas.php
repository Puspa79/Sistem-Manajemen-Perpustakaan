<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Buku - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h1 class="mb-4">Informasi Buku</h1>

        <?php
        // Buku 1
        $judul1 = "Laravel: From Beginner to Advanced";
        $pengarang1 = "Puspa Aja";
        $penerbit1 = "Informatika";
        $tahun_terbit1 = 2023;
        $harga1 = 125000;
        $stok1 = 8;
        $isbn1 = "978-602-1234-56-7";
        $kategori1 = "Programming";
        $bahasa1 = "Indonesia";
        $halaman1 = 350;
        $berat1 = 500;

        // Buku 2
        $judul2 = "Mastering MySQL Database";
        $pengarang2 = "Rudi Hartono";
        $penerbit2 = "Elex Media";
        $tahun_terbit2 = 2022;
        $harga2 = 98000;
        $stok2 = 5;
        $isbn2 = "978-602-7788-21-3";
        $kategori2 = "Database";
        $bahasa2 = "Indonesia";
        $halaman2 = 420;
        $berat2 = 600;

        // Buku 3
        $judul3 = "Modern Web Design";
        $pengarang3 = "John Carter";
        $penerbit3 = "TechPress";
        $tahun_terbit3 = 2021;
        $harga3 = 150000;
        $stok3 = 6;
        $isbn3 = "978-111-4567-89-0";
        $kategori3 = "Web Design";
        $bahasa3 = "Inggris";
        $halaman3 = 390;
        $berat3 = 550;

        // Buku 4
        $judul4 = "PHP Programming Guide";
        $pengarang4 = "Andi Wijaya";
        $penerbit4 = "Andi Publisher";
        $tahun_terbit4 = 2020;
        $harga4 = 110000;
        $stok4 = 10;
        $isbn4 = "978-602-9988-55-1";
        $kategori4 = "Programming";
        $bahasa4 = "Indonesia";
        $halaman4 = 300;
        $berat4 = 480;
        ?>

        <div class="row">

            <!-- Buku 1 -->
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">
                            <?php echo $judul1; ?>
                            <span class="badge bg-primary"><?php echo $kategori1; ?></span>
                        </h5>
                    </div>

                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th>Pengarang</th>
                                <td>: <?php echo $pengarang1; ?></td>
                            </tr>
                            <tr>
                                <th>Penerbit</th>
                                <td>: <?php echo $penerbit1; ?></td>
                            </tr>
                            <tr>
                                <th>Tahun Terbit</th>
                                <td>: <?php echo $tahun_terbit1; ?></td>
                            </tr>
                            <tr>
                                <th>ISBN</th>
                                <td>: <?php echo $isbn1; ?></td>
                            </tr>
                            <tr>
                                <th>Bahasa</th>
                                <td>: <?php echo $bahasa1; ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah Halaman</th>
                                <td>: <?php echo $halaman1; ?> halaman</td>
                            </tr>
                            <tr>
                                <th>Berat Buku</th>
                                <td>: <?php echo $berat1; ?> gram</td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>: Rp <?php echo number_format($harga1, 0, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <th>Stok</th>
                                <td>: <?php echo $stok1; ?> buku</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Buku 2 -->
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">
                            <?php echo $judul2; ?>
                            <span class="badge bg-success"><?php echo $kategori2; ?></span>
                        </h5>
                    </div>

                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th>Pengarang</th>
                                <td>: <?php echo $pengarang2; ?></td>
                            </tr>
                            <tr>
                                <th>Penerbit</th>
                                <td>: <?php echo $penerbit2; ?></td>
                            </tr>
                            <tr>
                                <th>Tahun Terbit</th>
                                <td>: <?php echo $tahun_terbit2; ?></td>
                            </tr>
                            <tr>
                                <th>ISBN</th>
                                <td>: <?php echo $isbn2; ?></td>
                            </tr>
                            <tr>
                                <th>Bahasa</th>
                                <td>: <?php echo $bahasa2; ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah Halaman</th>
                                <td>: <?php echo $halaman2; ?> halaman</td>
                            </tr>
                            <tr>
                                <th>Berat Buku</th>
                                <td>: <?php echo $berat2; ?> gram</td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>: Rp <?php echo number_format($harga2, 0, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <th>Stok</th>
                                <td>: <?php echo $stok2; ?> buku</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Buku 3 -->
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">
                            <?php echo $judul3; ?>
                            <span class="badge bg-warning"><?php echo $kategori3; ?></span>
                        </h5>
                    </div>

                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th>Pengarang</th>
                                <td>: <?php echo $pengarang3; ?></td>
                            </tr>
                            <tr>
                                <th>Penerbit</th>
                                <td>: <?php echo $penerbit3; ?></td>
                            </tr>
                            <tr>
                                <th>Tahun Terbit</th>
                                <td>: <?php echo $tahun_terbit3; ?></td>
                            </tr>
                            <tr>
                                <th>ISBN</th>
                                <td>: <?php echo $isbn3; ?></td>
                            </tr>
                            <tr>
                                <th>Bahasa</th>
                                <td>: <?php echo $bahasa3; ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah Halaman</th>
                                <td>: <?php echo $halaman3; ?> halaman</td>
                            </tr>
                            <tr>
                                <th>Berat Buku</th>
                                <td>: <?php echo $berat3; ?> gram</td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>: Rp <?php echo number_format($harga3, 0, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <th>Stok</th>
                                <td>: <?php echo $stok3; ?> buku</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Buku 4 -->
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">
                            <?php echo $judul4; ?>
                            <span class="badge bg-primary"><?php echo $kategori4; ?></span>
                        </h5>
                    </div>

                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th>Pengarang</th>
                                <td>: <?php echo $pengarang4; ?></td>
                            </tr>
                            <tr>
                                <th>Penerbit</th>
                                <td>: <?php echo $penerbit4; ?></td>
                            </tr>
                            <tr>
                                <th>Tahun Terbit</th>
                                <td>: <?php echo $tahun_terbit4; ?></td>
                            </tr>
                            <tr>
                                <th>ISBN</th>
                                <td>: <?php echo $isbn4; ?></td>
                            </tr>
                            <tr>
                                <th>Bahasa</th>
                                <td>: <?php echo $bahasa4; ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah Halaman</th>
                                <td>: <?php echo $halaman4; ?> halaman</td>
                            </tr>
                            <tr>
                                <th>Berat Buku</th>
                                <td>: <?php echo $berat4; ?> gram</td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>: Rp <?php echo number_format($harga4, 0, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <th>Stok</th>
                                <td>: <?php echo $stok4; ?> buku</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>