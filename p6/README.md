# Tugas 1 – Eksplorasi Database Perpustakaan

## Identitas
- Nama : Puspa Aja
- NIM  : (isi NIM kamu)
- Mata Kuliah : Basis Data

## Deskripsi
Repository ini berisi file query SQL (`query_tugas.sql`) yang digunakan untuk
melakukan eksplorasi database perpustakaan, meliputi statistik data, filter,
grouping, update data, dan laporan khusus.  
Setiap query dijalankan di phpMyAdmin dan hasilnya didokumentasikan dalam bentuk
screenshot.

---

## 1. Statistik Buku

### 1. Total Buku & Total Nilai Inventaris
Query untuk menghitung total buku dan total nilai inventaris.
![Query 1-2](images/query1-2.png)

### 2. Rata-rata Harga & Buku Termahal
Query untuk menghitung rata-rata harga buku dan menampilkan buku termahal.
![Query 3-4](images/query3-4.png)

### 3. Buku dengan Stok Terbanyak
Query untuk menampilkan buku dengan stok terbanyak.
![Query 5-6](images/query5-6.png)

---

## 2. Filter dan Pencarian

### 4. Buku Kategori Programming Harga < 100.000
![Query 7](images/query7.png)

### 5. Buku dengan Judul Mengandung PHP atau MySQL
![Query 8](images/query8.png)

### 6. Buku Terbit Tahun 2024
![Query 9](images/query9.jpeg)

### 7. Buku dengan Stok antara 5 sampai 10
![Query 10](images/query10.png)

---

## 3. Grouping dan Agregasi

### 8. Jumlah Buku dan Total Stok per Kategori
![Query 11-12](images/query11-12.png)

### 9. Kategori dengan Total Nilai Inventaris Terbesar
![Query 13-14](images/query13-14.png)

---

## 4. Update Data dan Laporan Khusus

### 10. Update Harga dan Stok Buku
Query untuk menaikkan harga buku kategori Programming sebesar 5%
dan menambah stok buku yang stoknya kurang dari 5.
![Query 15-17](images/query15-17.png)

---

## Kesimpulan
Dengan menggunakan query SQL, data dalam database perpustakaan dapat dianalisis
dan dikelola dengan lebih mudah, mulai dari melihat statistik buku, melakukan
filter dan pencarian, hingga melakukan update data dan menentukan kebutuhan
restocking.