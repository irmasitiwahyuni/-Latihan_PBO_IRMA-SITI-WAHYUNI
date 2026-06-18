-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2026 at 03:57 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan_pbo_trpl1b_irma siti wahyuni`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tiket`
--

CREATE TABLE `tabel_tiket` (
  `id_tiket` int NOT NULL,
  `nama_film` varchar(100) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int NOT NULL,
  `harga_dasar_tiket` decimal(10,2) NOT NULL,
  `jenis_studio` enum('Regular','IMAX','Velvet') NOT NULL,
  `tipe_audio` varchar(50) DEFAULT NULL,
  `lokasi_baris` varchar(20) DEFAULT NULL,
  `kacamata_3d_id` varchar(30) DEFAULT NULL,
  `efek_gerak_fitur` varchar(100) DEFAULT NULL,
  `bantal_selimut_pack` varchar(50) DEFAULT NULL,
  `layanan_butler` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_tiket`
--

INSERT INTO `tabel_tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(1, 'Avengers: Endgame', '2026-06-20 10:00:00', 50, 50000.00, 'Regular', 'Dolby Digital', 'B05', NULL, NULL, NULL, NULL),
(2, 'Spider-Man: No Way Home', '2026-06-20 13:00:00', 50, 50000.00, 'Regular', 'Dolby Digital', 'C10', NULL, NULL, NULL, NULL),
(3, 'The Batman', '2026-06-21 15:00:00', 50, 55000.00, 'Regular', 'DTS Surround', 'D08', NULL, NULL, NULL, NULL),
(4, 'Inside Out 2', '2026-06-21 18:30:00', 50, 45000.00, 'Regular', 'Dolby Digital', 'A12', NULL, NULL, NULL, NULL),
(5, 'Joker: Folie à Deux', '2026-06-22 20:00:00', 50, 60000.00, 'Regular', 'DTS Surround', 'E03', NULL, NULL, NULL, NULL),
(6, 'Kung Fu Panda 4', '2026-06-23 11:00:00', 50, 45000.00, 'Regular', 'Dolby Digital', 'B07', NULL, NULL, NULL, NULL),
(7, 'Mission Impossible 8', '2026-06-23 16:00:00', 50, 60000.00, 'Regular', 'Surround 7.1', 'C05', NULL, NULL, NULL, NULL),
(8, 'Moana 2', '2026-06-24 09:30:00', 50, 40000.00, 'Regular', 'Dolby Digital', 'A03', NULL, NULL, NULL, NULL),
(9, 'Avatar: The Way of Water', '2026-06-20 12:00:00', 80, 100000.00, 'IMAX', NULL, NULL, '3D001', 'Kursi Getar + Angin', NULL, NULL),
(10, 'Dune: Part Two', '2026-06-20 19:00:00', 80, 110000.00, 'IMAX', NULL, NULL, '3D002', 'Getaran dan Aroma', NULL, NULL),
(11, 'Interstellar', '2026-06-21 14:00:00', 80, 95000.00, 'IMAX', NULL, NULL, '3D003', 'Efek Getar', NULL, NULL),
(12, 'Doctor Strange', '2026-06-22 17:00:00', 80, 100000.00, 'IMAX', NULL, NULL, '3D004', 'Angin dan Cahaya', NULL, NULL),
(13, 'Top Gun: Maverick', '2026-06-23 20:00:00', 80, 105000.00, 'IMAX', NULL, NULL, '3D005', 'Getar + Suara Tambahan', NULL, NULL),
(14, 'Transformers: Rise of the Beasts', '2026-06-24 15:00:00', 80, 100000.00, 'IMAX', NULL, NULL, '3D006', 'Getaran Maksimal', NULL, NULL),
(15, 'Titanic', '2026-06-20 18:00:00', 30, 150000.00, 'Velvet', NULL, NULL, NULL, NULL, 'Paket Premium', 'Butler Aktif'),
(16, 'La La Land', '2026-06-21 20:00:00', 30, 140000.00, 'Velvet', NULL, NULL, NULL, NULL, 'Paket Deluxe', 'Butler Aktif'),
(17, 'The Notebook', '2026-06-22 19:00:00', 25, 160000.00, 'Velvet', NULL, NULL, NULL, NULL, 'Paket Couple', 'Butler Eksklusif'),
(18, 'Frozen 2', '2026-06-23 13:00:00', 30, 130000.00, 'Velvet', NULL, NULL, NULL, NULL, 'Paket Family', 'Butler Aktif'),
(19, 'Beauty and the Beast', '2026-06-24 16:00:00', 25, 155000.00, 'Velvet', NULL, NULL, NULL, NULL, 'Paket VIP', 'Butler Eksklusif'),
(20, 'Aladdin', '2026-06-25 19:30:00', 25, 145000.00, 'Velvet', NULL, NULL, NULL, NULL, 'Paket Gold', 'Butler Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  MODIFY `id_tiket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
