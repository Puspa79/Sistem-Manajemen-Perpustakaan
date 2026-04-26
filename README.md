# Tugas 1 – Eksplorasi Database dengan Query

## Identitas
- Nama        : Puspa Dwi Setyorini
- NIM         : 60324003 
- Mata Kuliah : Pemprograman Website 2
- Semester    : 4 (Empat)

## Deskripsi
Repository ini berisi file `query_tugas.sql` yang digunakan untuk melakukan
eksplorasi database perpustakaan. Query meliputi statistik buku, filter dan
pencarian, grouping dan agregasi, update data, serta laporan khusus.
Hasil eksekusi setiap query di phpMyAdmin didokumentasikan dalam bentuk screenshot.

---

## A. Statistik Buku (5 Query)

### 1. Total buku seluruhnya
![Total Buku](images/query1-2.png)

### 2. Total nilai inventaris (sum harga × stok)
![Total Nilai Inventaris](images/query1-2.png)

### 3. Rata-rata harga buku
![Rata-rata Harga](images/query3-4.png)

### 4. Buku termahal (judul dan harga)
![Buku Termahal](images/query3-4.png)

### 5. Buku dengan stok terbanyak
![Stok Terbanyak](images/query5-6.png)

---

## B. Filter dan Pencarian (5 Query)

### 6. Buku kategori Programming dengan harga < 100.000
![Programming < 100k](images/query5-6.png)

### 7. Buku dengan judul mengandung kata "PHP" atau "MySQL"
![Judul PHP atau MySQL](images/query7.png)

### 8. Buku yang terbit tahun 2024
![Tahun 2024](images/query8.jpeg)

### 9. Buku dengan stok antara 5–10
![Stok 5-10](images/query9.png)

### 10. Buku dengan pengarang "Budi Raharjo"
![Pengarang Budi Raharjo](images/query10.png)

---

## C. Grouping dan Agregasi (3 Query)

### 11. Jumlah buku per kategori dan total stok per kategori
![Jumlah & Stok per Kategori](images/query11-12.png)

### 12. Rata-rata harga per kategori
![Rata-rata Harga per Kategori](images/query11-12.png)

### 13. Kategori dengan total nilai inventaris terbesar
![Nilai Inventaris Terbesar](images/query13-14.png)

---

## D. Update Data (2 Query)

### 14. Naikkan harga buku kategori Programming sebesar 5%
![Update Harga](images/query13-14.png)

### 15. Tambah stok 10 untuk buku dengan stok < 5
![Update Stok](images/query15-17.png)

---

## E. Laporan Khusus (2 Query)

### 16. Daftar buku yang perlu restocking (stok < 5)
![Restocking Buku](images/query15-17.png)

### 17. Top 5 buku termahal
![Top 5 Buku Termahal](images/query15-17.png)


## Tugas 2 – Perancangan & Implementasi Database

### A. Struktur Database

#### 1. Struktur Tabel Buku
![Struktur Tabel Buku](images/StrukturTabelBuku.png)

#### 2. Struktur Tabel Kategori Buku
![Struktur Tabel Kategori](images/StrukturTabelKategori_Buku.png)

#### 3. Struktur Tabel Penerbit
![Struktur Tabel Penerbit](images/StrukturTabelPenerbit.png)

#### 4. Struktur Tabel Rak
![Struktur Tabel Rak](images/StrukturTabelRak.png)

---

### B. Data Awal Tabel

#### 5. Data Tabel Buku
![Data Buku](images/DataTabelBuku.png)

#### 6. Data Tabel Kategori Buku
![Data Kategori Buku](images/DataTabelKategori_Buku.png)

#### 7. Data Tabel Penerbit
![Data Penerbit](images/DataTabelPenerbit.png)

#### 8. Data Tabel Rak
![Data Rak](images/DataTabelRak.png)

---

### C. Relasi Antar Tabel (JOIN)

#### 9. Hasil Query JOIN Buku, Kategori, Penerbit, dan Rak
![Query Join](images/QueryJoin.png)
![Hasil Join](images/HasilQueryJoin.png)

---

### D. Stored Procedure

#### 10. Stored Procedure Tambah Buku
Stored procedure digunakan untuk menambahkan data buku ke dalam tabel `buku`
dengan relasi ke tabel `kategori_buku`, `penerbit`, dan `rak`.

---

### E. Soft Delete

#### 11. Implementasi Soft Delete
Setiap tabel memiliki kolom `deleted_at` untuk mendukung penghapusan data
secara logis tanpa menghapus data secara permanen.