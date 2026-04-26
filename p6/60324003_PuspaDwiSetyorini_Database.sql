-- ================================
-- DATABASE
-- ================================
CREATE DATABASE IF NOT EXISTS perpustakaan;
USE perpustakaan;

-- ================================
-- TABLE: kategori_buku
-- ================================
CREATE TABLE kategori_buku (
    id_kategori INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ================================
-- TABLE: penerbit
-- ================================
CREATE TABLE penerbit (
    id_penerbit INT AUTO_INCREMENT PRIMARY KEY,
    nama_penerbit VARCHAR(100) NOT NULL,
    alamat VARCHAR(150),
    telepon VARCHAR(20),
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ================================
-- TABLE: buku
-- ================================
CREATE TABLE buku (
    id_buku INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(150) NOT NULL,
    penulis VARCHAR(100),
    tahun_terbit YEAR,
    harga DECIMAL(10,2),
    stok INT,
    id_kategori INT,
    id_penerbit INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ================================
-- INSERT DATA: kategori_buku
-- ================================
INSERT INTO kategori_buku (id_kategori, nama_kategori, deskripsi) VALUES
(1, 'Programming', 'Buku pemrograman dan pengembangan aplikasi'),
(2, 'Database', 'Buku tentang basis data dan SQL'),
(3, 'Web Design', 'Buku desain dan pengembangan web'),
(19, 'Data Science', 'Buku tentang analisis dan pengolahan data'),
(20, 'Mobile Development', 'Buku tentang pengembangan aplikasi mobile');

-- ================================
-- INSERT DATA: penerbit
-- ================================
INSERT INTO penerbit (id_penerbit, nama_penerbit, alamat, telepon, email) VALUES
(1, 'Informatika', 'Jakarta', '021111111', 'info@informatika.com'),
(2, 'Graha Ilmu', 'Yogyakarta', '0274111111', 'info@grahailmu.com'),
(3, 'Andi', 'Yogyakarta', '0274222222', 'info@andipublisher.com'),
(4, 'Packt Publishing', 'Birmingham, UK', '000111222', 'info@packtpub.com'),
(5, 'O''Reilly Media', 'California, USA', '000333444', 'info@oreilly.com');

-- ================================
-- INSERT DATA: buku (≥15 DATA)
-- ================================
INSERT INTO buku (judul, penulis, tahun_terbit, harga, stok, id_kategori, id_penerbit) VALUES
('Pemrograman PHP untuk Pemula', 'Budi Santoso', 2022, 85000, 10, 1, 1),
('Mastering MySQL Database', 'Andi Wijaya', 2021, 95000, 8, 2, 2),
('Laravel Framework Advanced', 'Rizki Ramadhan', 2023, 120000, 6, 1, 1),
('Web Design Principles', 'Dewi Lestari', 2020, 78000, 12, 3, 3),
('PHP Web Services', 'Agus Salim', 2022, 99000, 7, 1, 1),
('PostgreSQL Advanced', 'Rahmat Hidayat', 2021, 110000, 5, 2, 2),
('JavaScript Modern', 'Fajar Nugroho', 2023, 105000, 9, 1, 1),
('React Native Development', 'Siti Aminah', 2023, 115000, 4, 20, 4),
('Python for Data Science', 'Ahmad Fauzi', 2022, 130000, 6, 19, 5),
('Machine Learning Basics', 'Dian Pratama', 2021, 140000, 3, 19, 5),
('UI/UX Design Fundamentals', 'Putri Ayu', 2020, 80000, 10, 3, 3),
('Node.js Backend Development', 'Raka Putra', 2022, 125000, 7, 1, 4),
('Database Design Concept', 'Nanda Saputra', 2019, 90000, 8, 2, 2),
('Android App Development', 'Hendra Wijaya', 2023, 135000, 5, 20, 4),
('iOS Development with Swift', 'Kevin Tan', 2022, 145000, 4, 20, 5);

-- ================================
-- FOREIGN KEY CONSTRAINTS
-- ================================
ALTER TABLE buku
ADD CONSTRAINT fk_buku_kategori
FOREIGN KEY (id_kategori) REFERENCES kategori_buku(id_kategori)
ON UPDATE CASCADE
ON DELETE RESTRICT;

ALTER TABLE buku
ADD CONSTRAINT fk_buku_penerbit
FOREIGN KEY (id_penerbit) REFERENCES penerbit(id_penerbit)
ON UPDATE CASCADE
ON DELETE RESTRICT;

-- ================================
-- QUERY JOIN
-- ================================
SELECT 
    b.id_buku,
    b.judul,
    b.penulis,
    b.tahun_terbit,
    k.nama_kategori,
    p.nama_penerbit,
    b.harga,
    b.stok
FROM buku b
JOIN kategori_buku k ON b.id_kategori = k.id_kategori
JOIN penerbit p ON b.id_penerbit = p.id_penerbit;