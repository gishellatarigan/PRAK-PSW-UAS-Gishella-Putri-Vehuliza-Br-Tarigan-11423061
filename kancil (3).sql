-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jun 2024 pada 05.14
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
USE kancil;
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` BIGINT(20) UNSIGNED NOT NULL,
  `namaAdmin` VARCHAR(255) NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `role` VARCHAR(255) NOT NULL DEFAULT 'admin'
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `namaAdmin`, `username`, `password`, `role`) VALUES
(1, 'Admin', 'Admin', '$2y$10$8T8JhLwDC9CZ3k8rG0QkZu43h5EgK4IZrp0OecFmdcAorboR1aF.W', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` BIGINT(20) UNSIGNED NOT NULL,
  `namaPemesan` VARCHAR(255) NOT NULL,
  `noHp` VARCHAR(255) NOT NULL,
  `waktuMulai` VARCHAR(255) NOT NULL,
  `waktuSelesai` VARCHAR(255) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking_lapangan`
--

CREATE TABLE `booking_lapangan` (
  `id_booking_lapangan` INT(11) NOT NULL,
  `id_user` INT(11) NOT NULL,
  `id_lapangan` INT(11) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapangan`
--

CREATE TABLE `lapangan` (
  `id_lapangan` INT(100) NOT NULL,
  `nama_lapangan` VARCHAR(100) NOT NULL,
  `jam_buka` DATETIME NOT NULL,
  `jam_tutup` DATETIME NOT NULL,
  `harga_per_jam` BIGINT(50) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `created_by` VARCHAR(50) NOT NULL,
  `updated_at` DATETIME NOT NULL,
  `updated_by` VARCHAR(100) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapangans`
--

CREATE TABLE `lapangans` (
  `id` BIGINT(20) UNSIGNED NOT NULL,
  `namaLapangan` VARCHAR(255) NOT NULL,
  `pengelola` BIGINT(20) UNSIGNED NOT NULL,
  `hargaLapangan` VARCHAR(255) NOT NULL,
  `fotoLapangan` VARCHAR(255) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasis`
--

CREATE TABLE `lokasis` (
  `id` BIGINT(20) UNSIGNED NOT NULL,
  `namaLokasi` VARCHAR(255) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lokasis`
--

INSERT INTO `lokasis` (`id`, `namaLokasi`) VALUES
(1, 'Tarutung'),
(2, 'Balige'),
(3, 'Sipiongot'),
(4, 'Samosir'),
(5, 'Laguboti'),
(6, 'Lubuk Pakam'),
(12, 'Jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_lapangan`
--

CREATE TABLE `lokasi_lapangan` (
  `id_lokasi_lapangan` INT(50) NOT NULL,
  `id_lapangan` INT(100) NOT NULL,
  `nama_lokasi_lapangan` VARCHAR(100) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id` INT(11) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(15) NOT NULL,
  `address` VARCHAR(255) DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` INT(10) UNSIGNED NOT NULL,
  `migration` VARCHAR(255) NOT NULL,
  `batch` INT(11) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_05_16_023019_user', 1),
(4, '2024_05_16_025658_booking', 1),
(5, '2024_05_16_025705_lokasi', 1),
(6, '2024_05_16_033436_admin', 1),
(7, '2024_05_20_121324_pengelolas', 1),
(8, '2024_05_20_121534_lapangan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengelolas`
--

CREATE TABLE `pengelolas` (
  `id` BIGINT(20) UNSIGNED NOT NULL,
  `namaPengelola` VARCHAR(255) NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `lokasi_id` BIGINT(20) UNSIGNED NOT NULL,
  `role` VARCHAR(255) NOT NULL DEFAULT 'pengelola'
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengelolas`
--

INSERT INTO `pengelolas` (`id`, `namaPengelola`, `username`, `password`, `lokasi_id`, `role`) VALUES
(1, 'pengelola1', 'pengelola1', '$2y$10$yajIPUyfM0oS11JoRrX.BOLKh9DJaFp1G69oQahYtsgpRP9gyNMDK', 1, 'pengelola');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggunas`
--

CREATE TABLE `penggunas` (
  `id` BIGINT(20) UNSIGNED NOT NULL,
  `nama` VARCHAR(255) NOT NULL,
  `noHp` VARCHAR(255) NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `role` VARCHAR(255) NOT NULL DEFAULT 'user'
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` BIGINT(20) UNSIGNED NOT NULL,
  `tokenable_type` VARCHAR(255) NOT NULL,
  `tokenable_id` BIGINT(20) UNSIGNED NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `token` VARCHAR(64) NOT NULL,
  `abilities` TEXT DEFAULT NULL,
  `last_used_at` TIMESTAMP NULL DEFAULT NULL,
  `expires_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `report_lapangan`
--

CREATE TABLE `report_lapangan` (
  `id_report_lapangan` INT(50) NOT NULL,
  `id_lapangan` INT(50) NOT NULL,
  `id_booking_lapangan` INT(50) NOT NULL,
  `total_harga` BIGINT(20) NOT NULL,
  `id_user` INT(50) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_pemesan VARCHAR(255) NOT NULL,
    lapangan VARCHAR(255) NOT NULL,
    lokasi VARCHAR(255) NOT NULL
);
--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` INT(11) NOT NULL,
  `role_name` VARCHAR(50) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Gishella', 'cell12345@gmail.com', '0000-00-00 00:00:00', 'Gishel123', NULL, NULL, NULL),
(2, 'cell123', 'cell123@gmail.com', NULL, '$2y$10$4kz5ntzUe.dkXQYeaxFhO.pdLDA5m76VHWCJzHuEijzBT1KYI2.da', NULL, '2024-05-29 20:15:23', '2024-05-29 20:15:23'),
(3, 'celltrg', 'cell@gmail.com', NULL, '$2y$10$Acs0nr2D5Pk77.2nsHMiO.Kd4HQI.3KHimAJsUBQ3N8eMt74ctND2', NULL, '2024-05-29 20:31:22', '2024-05-29 20:31:22'),
(4, 'gishell', 'sell@gmail.com', NULL, '$2y$10$KYmQ6rMtrYyCMArB8HsKeuObypNIU/NSDkdLMJUJeRee4BaYOkibe', NULL, '2024-05-29 20:38:13', '2024-05-29 20:38:13'),
(5, 'gisell', 'gisel@gmail.com', NULL, '$2y$10$hl6ZO35yWybRppNbL.hpOuBE2ZrK1iYdwsexfysTmjvwK4EtRa05O', NULL, '2024-05-29 20:43:00', '2024-05-29 20:43:00'),
(6, 'user1', 'user@gmail.com', NULL, '$2y$10$6uLhS6Ilp3cW.amMZNEO0efiOyXXGQIPJ20/WHHR6J4PPmF.CX0Li', NULL, '2024-05-31 08:28:27', '2024-05-31 08:28:27'),
(7, 'Tanishaaa', 'tan@gmail.com', NULL, '$2y$10$FoKufQqWDb74AbaF7cbjy.zD6f3qT8zV7m25KvM3SSQqMYULoEJXO', NULL, '2024-06-06 07:46:10', '2024-06-06 07:46:10'),
(8, 'gishellaa', 'Gishellaa@gmail.com', NULL, '$2y$10$utAxzeAKzXJydBSc0g9I2ubG1PaPBbQr3r.tW0zUBIoL/OxnrX3Vu', NULL, '2024-06-06 20:11:57', '2024-06-06 20:11:57');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lapangans`
--
ALTER TABLE `lapangans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lapangans_pengelola_foreign` (`pengelola`);

--
-- Indeks untuk tabel `lokasis`
--
ALTER TABLE `lokasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengelolas`
--
ALTER TABLE `pengelolas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengelolas_lokasi_foreign` (`lokasi_id`);

--
-- Indeks untuk tabel `penggunas`
--
ALTER TABLE `penggunas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lapangans`
--
ALTER TABLE `lapangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lokasis`
--
ALTER TABLE `lokasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pengelolas`
--
ALTER TABLE `pengelolas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penggunas`
--
ALTER TABLE `penggunas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `lapangans`
--
ALTER TABLE `lapangans`
  ADD CONSTRAINT `lapangans_pengelola_foreign` FOREIGN KEY (`pengelola`) REFERENCES `pengelolas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengelolas`
--
ALTER TABLE `pengelolas`
  ADD CONSTRAINT `pengelolas_lokasi_foreign` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasis` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
