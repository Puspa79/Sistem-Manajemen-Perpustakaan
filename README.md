# 📚 Tugas Basis Data – Sistem Perpustakaan  
*(Tugas 1 & Tugas 2)*

## Identitas
- **Nama**        : Puspa Dwi Setyorini  
- **NIM**         : 60324003  
- **Mata Kuliah** : Pemrograman Website 2  
- **Semester**    : 4 (Empat)

---

## Deskripsi
Repository ini berisi implementasi database **Sistem Perpustakaan** yang mencakup:

- **Tugas 1**: Eksplorasi database menggunakan query SQL  
- **Tugas 2**: Desain database lengkap dengan relasi, foreign key, soft delete,
  stored procedure, dan ERD  

Seluruh query dijalankan menggunakan **phpMyAdmin** dan hasilnya
didokumentasikan dalam bentuk **screenshot**.

---

# 📝 TUGAS 1 – Eksplorasi Database dengan Query

## 1. Statistik Buku

### 1.1 Total buku seluruhnya
![Total Buku](images/query1-2.png)

### 1.2 Total nilai inventaris (harga × stok)
![Total Nilai Inventaris](images/query1-2.png)

### 1.3 Rata-rata harga buku
![Rata-rata Harga](images/query3-4.png)

### 1.4 Buku termahal
![Buku Termahal](images/query3-4.png)

### 1.5 Buku dengan stok terbanyak
![Stok Terbanyak](images/query5-6.png)

---

## 2. Filter dan Pencarian

### 2.1 Buku kategori Programming dengan harga < 100.000
![Programming < 100k](images/query5-6.png)

### 2.2 Buku dengan judul mengandung "PHP" atau "MySQL"
![Judul PHP atau MySQL](images/query7.png)

### 2.3 Buku yang terbit tahun 2024
![Tahun 2024](images/query8.png)

### 2.4 Buku dengan stok antara 5–10
![Stok 5–10](images/query9.png)

### 2.5 Buku dengan pengarang "Budi Raharjo"
![Pengarang Budi Raharjo](images/query10.png)

---

## 3. Grouping dan Agregasi

### 3.1 Jumlah buku dan total stok per kategori
![Jumlah & Stok per Kategori](images/query11-12.png)

### 3.2 Rata-rata harga buku per kategori
![Rata-rata Harga per Kategori](images/query11-12.png)

### 3.3 Kategori dengan total nilai inventaris terbesar
![Nilai Inventaris Terbesar](images/query13-14.png)

---

## 4. Update Data

### 4.1 Kenaikan harga buku kategori Programming sebesar 5%
![Update Harga](images/query13-14.png)

### 4.2 Penambahan stok buku dengan stok < 5
![Update Stok](images/query15-17.png)

---

## 5. Laporan Khusus

### 5.1 Daftar buku yang perlu restocking (stok < 5)
![Restocking Buku](images/query15-17.png)

### 5.2 Top 5 buku termahal
![Top 5 Buku Termahal](images/query15-17.png)

---

# 🗂️ TUGAS 2 – Desain Database

## 6. Struktur Database

### 6.1 Struktur Tabel Buku
![Struktur Tabel Buku](images/StrukturTabelBuku.png)

### 6.2 Struktur Tabel Kategori Buku
![Struktur Tabel Kategori](images/StrukturTabelKategori_Buku.png)

### 6.3 Struktur Tabel Penerbit
![Struktur Tabel Penerbit](images/StrukturTabelPenerbit.png)

### 6.4 Struktur Tabel Rak
![Struktur Tabel Rak](images/StrukturTabelRak.png)

---

## 7. Data Awal Tabel

### 7.1 Data Tabel Buku
![Data Buku](images/DataTabelBuku.png)

### 7.2 Data Tabel Kategori Buku
![Data Kategori Buku](images/DataTabelKategori_Buku.png)

### 7.3 Data Tabel Penerbit
![Data Penerbit](images/DataTabelPenerbit.png)

### 7.4 Data Tabel Rak
![Data Rak](images/DataTabelRak.png)

---

## 8. Relasi dan Query JOIN

### 8.1 Hasil JOIN Tabel Buku, Kategori, Penerbit, dan Rak
![Hasil Join](images/HasilQueryJoin.png)

---

## 9. Stored Procedure

### 9.1 Stored Procedure Tambah Buku
Stored procedure digunakan untuk menambahkan data buku baru secara otomatis
dengan relasi ke kategori, penerbit, dan rak.

![Stored Procedure](images/QueryJoin.png)

---

## 10. Entity Relationship Diagram (ERD)

### 10.1 ERD Database Perpustakaan
ERD menggambarkan hubungan antar tabel `buku`, `kategori_buku`,
`penerbit`, dan `rak` berdasarkan foreign key yang telah dibuat.

![ERD Perpustakaan](images/ERD.png)

---

## Kesimpulan
Melalui pengerjaan Tugas 1 dan Tugas 2, database perpustakaan berhasil dirancang
dan dianalisis secara menyeluruh. Sistem ini telah menerapkan relasi antar tabel,
foreign key, soft delete, stored procedure, serta dokumentasi visual berupa ERD
untuk mendukung pengelolaan data yang terstruktur dan efisien.