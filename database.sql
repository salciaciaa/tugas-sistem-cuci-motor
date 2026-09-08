CREATE DATABASE IF NOT EXISTS cuci_motor CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE cuci_motor;

CREATE TABLE users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 username VARCHAR(50) NOT NULL UNIQUE,
 password VARCHAR(100) NOT NULL,
 nama VARCHAR(100) NOT NULL
);

INSERT INTO users(username,password,nama) VALUES ('admin','admin123','Administrator');

CREATE TABLE pelanggan (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nama VARCHAR(100) NOT NULL,
 no_hp VARCHAR(20) NOT NULL,
 no_polisi VARCHAR(20) NOT NULL UNIQUE,
 jenis_motor VARCHAR(50) NOT NULL,
 alamat TEXT
);

CREATE TABLE layanan (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nama_layanan VARCHAR(100) NOT NULL,
 harga INT NOT NULL,
 keterangan VARCHAR(255)
);

INSERT INTO layanan(nama_layanan,harga,keterangan) VALUES
('Cuci Motor Reguler',15000,'Cuci body dan bilas'),
('Cuci Motor Premium',25000,'Cuci, shampoo, wax dan pengeringan'),
('Cuci Motor + Detailing',50000,'Paket lengkap dengan detailing');

CREATE TABLE transaksi (
 id INT AUTO_INCREMENT PRIMARY KEY,
 pelanggan_id INT NOT NULL,
 layanan_id INT NOT NULL,
 tanggal DATE NOT NULL,
 total INT NOT NULL,
 status ENUM('Menunggu','Selesai') DEFAULT 'Menunggu',
 FOREIGN KEY (pelanggan_id) REFERENCES pelanggan(id) ON DELETE RESTRICT,
 FOREIGN KEY (layanan_id) REFERENCES layanan(id) ON DELETE RESTRICT
);