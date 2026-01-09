-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jan 2026 pada 17.02
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
-- Database: `wisata_desa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`id`, `name`, `location`, `description`, `photo`, `created_at`, `updated_at`) VALUES
(2, 'Desa Wisata Ubud', 'Ubud, Bali', 'Desa seni dan budaya dengan terasering sawah yang indah. Nikmati keindahan alam dan seniman lokal yang bekerja di desa ini.', 'ubud.jpg', '2026-01-01 04:29:05', NULL),
(3, 'Kelapa Gading', 'jakarta', 'halloo semuanya ', '1767243500_68918ceba0f0073d0a05.jpg', '2026-01-01 04:58:20', '2026-01-01 14:26:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `description` longtext NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `name`, `date`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Lomba Pertanian', '2026-03-02', 'Lomba hasil pertanian terbaik se-desa dengan hadiah menarik. Menampilkan hasil panen terbaik dan produk olahan pertanian lokal.', '2026-01-01 04:29:05', NULL),
(3, 'Ai-Server', '2026-01-08', 'menyenangkan ', '2026-01-01 04:59:16', '2026-01-01 04:59:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(5, '2024-01-01-000001', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1767241736, 1),
(6, '2024-01-01-000002', 'App\\Database\\Migrations\\CreateDesaTable', 'default', 'App', 1767241736, 1),
(7, '2024-01-01-000003', 'App\\Database\\Migrations\\CreatePaketTable', 'default', 'App', 1767241736, 1),
(8, '2024-01-01-000004', 'App\\Database\\Migrations\\CreateEventTable', 'default', 'App', 1767241736, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id` int(11) NOT NULL,
  `desa_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id`, `desa_id`, `name`, `price`, `description`, `created_at`, `updated_at`) VALUES
(2, 2, 'Paket Trekking Sawah', 300000.00, 'Paket trekking melalui terasering sawah yang indah. Jelajahi keindahan alam sambil belajar tentang pertanian lokal. Termasuk makan siang tradisional.', '2026-01-01 04:29:05', NULL),
(3, 3, 'Paket Arum Jeram', 30000.00, 'enak dan asik', '2026-01-01 04:58:57', '2026-01-01 04:58:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin Wisata', 'admin@wisatadesa.com', '$2y$10$ee5EAubqxkEYI55NkEP8Z.5jJrgLWE9V4Gp4I3dv7woxFUaE2nJhi', 'admin', '2026-01-01 04:29:05', NULL),
(3, 'Zaky', 'bangzaky0029@gmail.com', '$2y$10$i/DTY5pUSsfFqru4mLRzJ.gWeBiXGW9ebbxIk15wghO9rpl8b4rDC', 'user', '2026-01-01 04:47:47', '2026-01-01 04:47:47');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `paket_desa_id_foreign` (`desa_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `desa`
--
ALTER TABLE `desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD CONSTRAINT `paket_desa_id_foreign` FOREIGN KEY (`desa_id`) REFERENCES `desa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
