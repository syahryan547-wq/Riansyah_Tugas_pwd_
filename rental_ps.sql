CREATE DATABASE rental_ps;

USE rental_ps;

CREATE TABLE ps (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_penyewa VARCHAR(100),
    jenis_ps VARCHAR(50),
    lama_sewa INT,
    harga_per_jam INT
);