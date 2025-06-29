-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2025 pada 08.45
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nontonapa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `film`
--

CREATE TABLE `film` (
  `id_film` int(4) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `rating` decimal(2,1) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `durasi` varchar(10) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `sutradara` varchar(100) DEFAULT NULL,
  `pemeran` text DEFAULT NULL,
  `kutipan` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `film`
--

INSERT INTO `film` (`id_film`, `judul`, `deskripsi`, `rating`, `genre`, `durasi`, `tahun`, `sutradara`, `pemeran`, `kutipan`, `image`, `video`) VALUES
(2, 'Home Sweet Loan', 'Seorang wanita pekerja keras mencoba membantu keluarganya keluar dari masalah keuangan dengan meminjam uang. Tapi semakin dalam ia masuk, semakin rumit masalah yang harus dihadapinya.', 6.8, 'Drama, Komedi, Romantis', '1 jam 36 m', '2024', 'Danial Rifki', 'Caitlin Halderman, Mika Tambayong, Emir Mahira', 'Kadang, rumah bukan tentang tempat... tapi orang-orang yang membuatnya berarti.', 'home sweet loan.jpg', 'https://youtu.be/rWsnLS0Q7G0?si=C_tE4elBJhfHZ7oJ'),
(5, 'Miracle in Cell No. 7', 'Kisah haru seorang ayah penyandang disabilitas yang dipenjara atas tuduhan palsu, dan hubungan hangatnya dengan anak perempuannya.', 9.0, 'Drama, Keluarga', '2j 5m', '2019', 'Hanung Bramantyo', 'Vino G. Bastian, Graciella Abigail, Tora Sudiro', '\"Cinta bisa menembus dinding penjara.\"', 'mirachel in cell no 7.jpg', 'https://youtu.be/0uf6QUacVgs?si=L24mopDtf5p2jqp7'),
(6, 'Under Paris', 'Seekor hiu raksasa muncul di Sungai Seine dan mengancam jalannya kejuaraan triathlon dunia.', 8.3, 'Horor, Thriller', '1j 41m', '2024', 'Xavier Gens', 'Bérénice Bejo, Nassim Lyes, Léa Léviant', '\"Bahaya terbesar tak selalu datang dari laut lepas.\"', 'under paris.jpg', 'https://youtu.be/jnCefPQIH98?si=V-cAKHa8o7MkF6cE'),
(7, 'Hijack 1971', 'Berdasarkan kisah nyata pembajakan pesawat Woyla oleh aktivis di masa Orde Baru.', 8.0, 'Sejarah, Aksi', '2j 0m', '2023', 'Rahabi Mandra', 'Omar Daniel, Baskara Mahendra, Djenar Maesa Ayu', '\"Saat suara dibungkam, langit pun dijadikan panggung perlawanan.\"', 'hijack.png', 'https://youtu.be/UxyutkXQnvA?si=6QOAcNyG593chWOL'),
(8, 'Danur 3: Sunyaruri', 'Dalam upayanya untuk hidup normal tanpa melihat hantu, Risa memutuskan untuk menutup kemampuannya. Namun keputusan itu membuat Risa lebih rentan terhadap kehadiran roh jahat yang mengincarnya', 9.0, 'Horor, Triller', '1j 31m', '2019', 'Awi Suryadi', 'Prilly Latuconsina, Rizky Nazar', '\"Sunyaruri bukan berarti sendiri, tapi sepi yang menjerit.\"', 'danur.jpg', 'https://youtu.be/9EsGdyVx6HM?si=y9m--oQVXnZ_RsKY'),
(9, 'Kemah Terlarang', 'Sekelompok mahasiswa melakukan perjalanan ke hutan untuk berkemah, namun mereka tidak menyadari bahwa tempat tersebut menyimpan misteri kelam dan terlarang.', 7.1, 'Horor, Thriller', '1 jam 43 m', '2024', 'Sutrina Hartanto', 'Bryan Domani, Yasmin Napper, Fadly Faisal', 'Beberapa tempat seharusnya tidak pernah dikunjungi...', 'kemah terlarang.jpg', 'https://youtu.be/087ep9pV5bY?si=udjqI6YE-DU7bYGV'),
(10, 'Evil Dead Rise', 'Kisah dua saudara perempuan yang terpisah lama dan terjebak dalam apartemen penuh teror ketika mereka menemukan sebuah buku kutukan yang membangkitkan kekuatan jahat.', 6.8, 'Horor, Supernatural', '1 jam 36 m', '2023', 'Lee Cronin', 'Alyssa Sutherland, Lily Sullivan, Morgan Davies', 'This book doesn’t just read evil — it breathes it.', 'evil dead rise.jpg', 'https://youtu.be/smTK_AeAPHs?si=5M2X3yjHb4RtFP-n'),
(11, 'Kaka Boss', 'Ferdinand \"Kaka Boss\" Omakare, seorang debt collector dari Indonesia Timur, memutuskan menjadi penyanyi agar putrinya bangga padanya.', 7.6, 'Drama, Komedi', '2 jam', '2024', 'Arie Kriting', 'Godfred Orindeod, Glory Hillary, Ernest Prakasa, Mamat Alkatiri', 'Angel, mulai sekarang papa mau jadi penyanyi.', 'kakabos.jpg', 'https://youtu.be/LXRnwwpXz6s?si=x-bKhId02kAom4cr'),
(12, 'Jumbo', 'Don, anak berusia 10 tahun dengan tubuh besar, mulai petualangan magis setelah kehilangan buku dongeng warisan orang tuanya, dibantu peri Meri.', 7.1, 'Animasi, Petualangan, Fantasi', '1 jam 42 m', '2025', 'Ryan Adriandhy', 'Prince Poetiray, Muhammad Adhiyat, Graciella Abigail, Yusuf Özkan, Quinn Salman', 'Persahabatan dan keberanian tumbuh di antara halaman-halaman buku ajaib.', 'jumbo.jpg', 'https://youtu.be/yMqDgbZmBdk?si=395ryUiyfnHmXRGE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `role`) VALUES
(3, 'supperadmin@admin.com', 'superadmin', '$2y$10$r4ImLAF1Msa1fdm4NXNdieSwLGEg5lIDIaYx.EC.DunCeGnsv7KAC', 'admin'),
(11, 'hanifatulnadiva@gmail.com', 'hnd.nadiva', '$2y$10$DnlX1tiZO9I7AICPlBA4NeAOtvFlLGKgxeuQubtKY21pZ8TcXf6Wy', 'user'),
(12, 'user@gmail.com', 'user1', '$2y$10$vmQUjRBgPDH6gHxSjIECH.B3y.EAhQbYeD89/zEnNOi8UXzUCnFa2', 'user'),
(13, 'user@gmail.com', 'user', '$2y$10$uGjkbjQ.EAlEB2XT..qYG.Ia42PN0VOGiQ/f4i5IbOCJYsK.n/WGq', 'user'),
(14, 'hanifatulnadiva@gmail.com', 'diva', '$2y$10$upndXP2TnO/my.OswBEAFeo6tRHbyDFksFUCRZj8Nd4De4HWl0why', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
