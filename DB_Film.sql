create database nontonapa
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    level ENUM('admin', 'user') DEFAULT 'user'
);

CREATE TABLE film (
  id_film VARCHAR(10) PRIMARY KEY,
  judul VARCHAR(150),
  genre VARCHAR(100),
  tahun VARCHAR(4),
  rating INT,
  durasi VARCHAR(50),
  sutradara VARCHAR(100),
  pemeran TEXT,
  deskripsi TEXT,
  kutipan TEXT,
  image VARCHAR(255),
  video VARCHAR(255)
);
