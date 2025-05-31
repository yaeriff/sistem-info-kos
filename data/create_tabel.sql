CREATE TABLE pengguna(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    create_time DATETIME COMMENT 'Create Time',
    nama_pengguna VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    role VARCHAR(255) DEFAULT 'user' COMMENT 'user, admin',
    telepon VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    alamat VARCHAR(255) NOT NULL,
    ktp VARCHAR(255) NOT NULL
) COMMENT '';

CREATE TABLE pesanan
(
  id_pemesanan VARCHAR(8) NOT NULL PRIMARY KEY,
  mulai_pemesanan DATE NOT NULL,
  status_pembayaran ENUM('lunas', 'belum lunas'),
  durasi INT NOT NULL,
  catatan VARCHAR(200) NOT NULL,
  metode_pembayaran ENUM('bri', 'dana', 'qris'),
  no_kamar VARCHAR(8) NOT NULL,
  id_pengguna INT NOT NULL,
  FOREIGN KEY (id_pengguna) REFERENCES pengguna(id),
  FOREIGN KEY (no_kamar) REFERENCES kamar(id_kamar)
);

DROP table user;