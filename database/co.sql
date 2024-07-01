-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2024 pada 17.55
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
-- Database: `co`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `contacts`
--

CREATE TABLE `contacts` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `contacts`
--

INSERT INTO `contacts` (`ID`, `name`, `email`, `message`, `tanggal`) VALUES
(3, 'jiajaiaj', '2300018068@webmail.com', 'mantap banget kak', '2024-06-24 10:15:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `produk` varchar(255) NOT NULL,
  `kapasitas` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `ewallet` varchar(50) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `nama`, `email`, `produk`, `kapasitas`, `alamat`, `ewallet`, `bank`, `total`, `created_at`) VALUES
(1, 'Fadhila', '2300018068@webmail.com', 'Asus ROG Zephyrus G14', '1tb', 'jogja', '-', 'BANK MANDIRI', 30.00, '2024-07-01 15:54:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_info`
--

CREATE TABLE `product_info` (
  `id` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `product_info`
--

INSERT INTO `product_info` (`id`, `brand`, `product_name`, `product_description`, `price`, `stock`) VALUES
(1, 'Asus', 'Asus ROG Zephyrus G14', 'Laptop gaming dengan prosesor AMD Ryzen 9, grafis NVIDIA RTX 4050, dan layar 14 inci Full HD.', 3000.00, 25),
(2, 'Asus', 'Asus TUF Gaming A15', 'Laptop gaming dengan prosesor AMD Ryzen 7, grafis NVIDIA GTX 1660 Ti, dan layar 15.6 inci Full HD.', 1540.00, 30),
(3, 'Acer', 'Acer Predator Helios 300', 'Laptop gaming dengan prosesor Intel i7, grafis NVIDIA RTX 3070, dan layar 15.6 inci Full HD.', 1950.00, 25),
(4, 'Acer', 'Acer Nitro 5', 'Laptop gaming dengan prosesor Intel i5, grafis NVIDIA GTX 1650, dan layar 15.6 inci Full HD.', 1300.00, 30),
(5, 'HP', 'HP Omen 15', 'Laptop gaming dengan prosesor Intel i7, grafis NVIDIA RTX 2060, dan layar 15.6 inci Full HD.', 1300.00, 30),
(6, 'HP', 'HP Pavilion Gaming', 'Laptop gaming dengan prosesor AMD Ryzen 5, grafis NVIDIA GTX 1650, dan layar 15.6 inci Full HD.', 2100.00, 30),
(7, 'Dell', 'Dell G5 15', 'Laptop gaming dengan prosesor Intel i7, grafis NVIDIA GTX 1660 Ti, dan layar 15.6 inci Full HD.', 2700.00, 25),
(8, 'Dell', 'Dell Alienware M15', 'Laptop gaming dengan prosesor Intel i9, grafis NVIDIA RTX 3080, dan layar 15.6 inci Full HD.', 2700.00, 25),
(9, 'Lenovo', 'Lenovo Legion 5', 'Laptop gaming dengan prosesor AMD Ryzen 7, grafis NVIDIA RTX 2060, dan layar 15.6 inci Full HD.', 1700.00, 30),
(10, 'Lenovo', 'Lenovo IdeaPad Gaming 3', 'Laptop gaming dengan prosesor AMD Ryzen 5, grafis NVIDIA GTX 1650, dan layar 15.6 inci Full HD.', 1350.00, 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`ID`, `username`, `email`, `password`) VALUES
(1, 'adadda', '2300018068@webmail.com', '$2y$10$3YyMnaANuH4nK5I54vffwuKyW4CqLisX6/X/fEIGAU.n5Zr5puh0.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `contacts`
--
ALTER TABLE `contacts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `product_info`
--
ALTER TABLE `product_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
