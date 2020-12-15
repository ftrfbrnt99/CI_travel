-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2020 at 04:20 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tour_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, '123456', 1, 0, 0, '1', 1),
(2, 2, '78910', 1, 0, 0, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `limits`
--

CREATE TABLE `limits` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `limits`
--

INSERT INTO `limits` (`id`, `uri`, `count`, `hour_started`, `api_key`) VALUES
(1, 'uri:Pelanggan/index:get', 2, 1608045227, '123456'),
(2, 'method-name:index_get', 1, 1608045347, '123456'),
(3, 'api-key:123456', 2, 1608045452, '123456'),
(4, 'ip-address:::1', 2, 1608045496, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id` varchar(5) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `asal` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `tujuan` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id`, `nama`, `alamat`, `asal`, `tujuan`) VALUES
('00001', 'Andi', 'jl.mendut', 'Malang', 'Surabaya'),
('00002', 'Budi', 'jl.tengku usaman', 'kalimantan tengah', 'Malang'),
('00003', 'lala', 'jl.sudirman', 'Surabaya', 'Kalimantan Tengah'),
('00004', 'Andini', 'jl.W.R.Supratman', 'Malang', 'Jember'),
('00005', 'Faiz', 'jl.Jakarta', 'Surabaya ', 'Malang'),
('00006', 'Dwi', 'jl. Bandung', 'Surabaya', 'Kepanjen'),
('00007', 'Nanda', 'jl.Hamid Rusdi', 'Malang', 'Kediri'),
('00008', 'Zakiya', 'jl.Karangploso', 'Malang', 'Surabaya'),
('00009', 'Sintiya', 'jl. Perusahaan', 'Kediri', 'Malang'),
('00010', 'sela', 'Jl.Golf', 'Lumajang', 'Malang'),
('00011', 'Vira', 'jl.Akrodion', 'Batu', 'Surabaya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `limits`
--
ALTER TABLE `limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `limits`
--
ALTER TABLE `limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
