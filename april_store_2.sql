-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jan 2021 pada 11.00
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `april store 2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cashier`
--

CREATE TABLE `cashier` (
  `Id` int(10) NOT NULL,
  `c_name` varchar(30) NOT NULL,
  `C_address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cashier`
--

INSERT INTO `cashier` (`Id`, `c_name`, `C_address`) VALUES
(8, 'Adriannn', 'Jl. Jalan Gak tau Kemana'),
(10, 'Fadhlil', 'Jl. Jalan Gak tau Kemana'),
(9, 'Jabal', 'Buah Batu'),
(2, 'Jubaedah', 'Jl. Jalan - Jalan Gak tau Kema'),
(11, 'Renny', 'tes1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `manager`
--

CREATE TABLE `manager` (
  `Id` int(10) NOT NULL,
  `M_name` varchar(30) NOT NULL,
  `M_address` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `manager`
--

INSERT INTO `manager` (`Id`, `M_name`, `M_address`) VALUES
(1, 'Dendi', 'Jl Roshan no 15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `P_Id` int(10) NOT NULL,
  `P_name` varchar(20) NOT NULL,
  `P_mfdate` date NOT NULL,
  `P_expdate` date NOT NULL,
  `P_price` double NOT NULL,
  `P_suplier` varchar(15) NOT NULL,
  `P_sell` double NOT NULL,
  `P_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`P_Id`, `P_name`, `P_mfdate`, `P_expdate`, `P_price`, `P_suplier`, `P_sell`, `P_stock`) VALUES
(10, 'Canon 50D', '2021-01-08', '2100-01-08', 13900, 'Suntoro', 14500, 4),
(11, 'Mistar', '2021-01-08', '2021-01-31', 1000, 'Suntoro', 1200, 100),
(12, 'Voucher Netflx', '2021-01-01', '2021-02-28', 180000, 'Netflix.Ltd', 195000, 98),
(13, 'Aquda', '2021-01-01', '2022-01-20', 2022, 'Suntoro', 4000, 98),
(14, 'Freeman', '2021-01-08', '2021-09-29', 85000, 'Freeman.LTD', 90000, 21),
(15, 'Okay Jelly Drink', '2021-01-01', '2022-01-01', 1000, 'ElangFood', 1500, 98),
(16, 'Sirup Marjin', '2021-01-08', '2022-05-09', 18000, '50', 22000, 33),
(17, 'Raxina', '2021-01-03', '2022-01-04', 15500, 'Mimimi', 16000, 35),
(18, 'Fermina', '2021-01-10', '2022-02-28', 2000, 'Suntoro', 3000, 8),
(19, 'Skecher', '2021-01-01', '2023-02-01', 1000, 'ElangFood', 1200, 48),
(20, 'kerupuk', '2021-01-17', '2021-01-31', 100, 'Morgan Freeman', 500, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `receipdetail`
--

CREATE TABLE `receipdetail` (
  `bill_Id` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `subtotal` double NOT NULL,
  `P_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `receipdetail`
--

INSERT INTO `receipdetail` (`bill_Id`, `jumlah`, `subtotal`, `P_name`) VALUES
(63, 2, 390000, 'Voucher Netflx'),
(64, 1, 14500, 'Canon 50D'),
(65, 2, 180000, 'Freeman'),
(66, 2, 6000, 'Fermina'),
(67, 2, 3000, 'Okay Jelly Drink'),
(68, 12, 14400, 'Skecher'),
(68, 3, 270000, 'Freeman'),
(68, 1, 1200, 'Mistar'),
(69, 12, 12000, 'Okay Jelly Drink'),
(70, 13, 13000, 'Okay Jelly Drink'),
(71, 2, 8000, 'Aquda'),
(71, 3, 270000, 'Freeman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `receipt`
--

CREATE TABLE `receipt` (
  `bill_Id` int(10) NOT NULL,
  `bill_date` date NOT NULL,
  `amount` double NOT NULL,
  `Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `receipt`
--

INSERT INTO `receipt` (`bill_Id`, `bill_date`, `amount`, `Id`) VALUES
(63, '2021-01-19', 390000, 8),
(64, '2021-01-19', 14500, 8),
(65, '2021-01-19', 180000, 8),
(66, '2021-01-19', 6000, 8),
(67, '2021-01-19', 3000, 8),
(68, '2021-01-19', 285600, 8),
(69, '2021-01-10', 12000, 8),
(70, '2021-01-14', 13000, 1),
(71, '2021-01-19', 278000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
--

CREATE TABLE `staff` (
  `Id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`Id`, `username`, `password`) VALUES
(1, 'manager', 'managerCool'),
(2, 'cashier1', 'cashier1Cool'),
(8, 'cashier2', 'cashier2Cool'),
(9, 'cashier3', 'cashier3cool'),
(10, 'cashier4', 'cashier4Cool'),
(11, 'cashier5', 'cashier5cool');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cashier`
--
ALTER TABLE `cashier`
  ADD PRIMARY KEY (`c_name`),
  ADD KEY `Id` (`Id`);

--
-- Indeks untuk tabel `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`M_name`),
  ADD KEY `Id` (`Id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`P_Id`),
  ADD KEY `P_name` (`P_name`) USING BTREE;

--
-- Indeks untuk tabel `receipdetail`
--
ALTER TABLE `receipdetail`
  ADD KEY `receipdetail_ibfk_1` (`bill_Id`);

--
-- Indeks untuk tabel `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`bill_Id`),
  ADD KEY `Id` (`Id`);

--
-- Indeks untuk tabel `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `P_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `receipt`
--
ALTER TABLE `receipt`
  MODIFY `bill_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `staff`
--
ALTER TABLE `staff`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cashier`
--
ALTER TABLE `cashier`
  ADD CONSTRAINT `cashier_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `staff` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `staff` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `receipdetail`
--
ALTER TABLE `receipdetail`
  ADD CONSTRAINT `receipdetail_ibfk_1` FOREIGN KEY (`bill_Id`) REFERENCES `receipt` (`bill_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `staff` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
