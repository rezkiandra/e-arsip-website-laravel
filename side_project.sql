-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Bulan Mei 2024 pada 06.42
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `side_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_05_04_143014_create_websites_table', 2),
(7, '2024_05_05_085057_change_column_description_to_websites_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$.6.k8RuYfL4Qbwj0Ez9CVem.6sWkOK9wC/2OTqgqq1YCircrk2JqG', NULL, '2024-05-04 06:53:42', '2024-05-04 06:53:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `websites`
--

CREATE TABLE `websites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `websites`
--

INSERT INTO `websites` (`id`, `uuid`, `name`, `slug`, `url`, `description`, `logo`, `created_at`, `updated_at`) VALUES
(1, '70b2d3d2-022f-4828-a797-3c27f8b49147', 'Sistem Informasi Akademik', 'sistem-informasi-akademik', 'https://siakad.go.id', 'Sistem informasi akademik merupakan sistem yang berguna untuk mengelola data akademik mahasiswa di politeknik negeri sambas. Dengan adanya sistem ini dapat memudahkan dosen dalam mengelola data mahasiswa.', 'website-logo/eUuMIOwHeX32B27ExTLabg7z9txuvkVB6wah3LAV.jpg', '2024-05-04 09:05:10', '2024-05-04 18:25:08'),
(2, '8c35b53a-d558-4950-9301-b9ab5aac744b', 'Sistem Pendaftaran Mahasiswa Magang', 'sistem-pendaftaran-mahasiswa-magang', 'https://sispensisma.go.id', 'Sistem pendaftaan mahasiswa magang digunakan untuk pendaftaran mahasiswa yang akan melakukan magang industri berdasarkan ketentuan perguruan tinggi. Sistem ini juga dapat mengelola data mahasiswa dan data tempat magang yang tersedia. Sistem ini dibuat menggunakan teknologi laravel versi 8 dan bootstrap 5', 'website-logo/7i4owHcMHiGdTaj46oqbOoMyD6iZFiKoKIxNfE9w.jpg', '2024-05-05 01:54:40', '2024-05-05 03:53:39'),
(3, 'bf705e63-f8d5-475f-96f3-ffdc77b2ed6a', 'Sistem Informasi Administrasi Keuangan POLTESA', 'sistem-informasi-administrasi-keuangan-poltesa', 'https://siadik.go.id', 'Sistem informasi aplikasi keuangan digunakan untuk mengelola keuangan yang ada di Politeknik Negeri Sambas. Sistem informasi ini dibuat menggunakan laravel versi 8 dan bootstrap versi 5', 'website-logo/cOp6KysokPUzMtOnbMhDgPDMbyLkNvjIpi84tpZE.jpg', '2024-05-05 02:02:18', '2024-05-05 02:05:35'),
(4, '233718b7-9334-4299-b453-4e6abf2a6b3c', 'Sistem Pendataan Barang', 'sistem-pendataan-barang', 'https://sipendata', 'Sistem pendataan barang digunakan untuk melakukan pendataan barang masuk dan barang keluar. Sistem ini dibuat menggunakan teknologi laravel versi 8 dan bootstrap versi 5.', 'website-logo/VF70jppOvi0y2qHayILiubh7MZ078Sxq8FtTLz8k.jpg', '2024-05-05 04:05:36', '2024-05-05 04:05:36'),
(5, '25da9ebc-7638-44ae-a275-a07aa06360a3', 'Sistem Peminjaman Buku', 'sistem-peminjaman-buku', 'https://sispembuk.go.id', 'Sistem peminjaman buku digunakan untuk mengelola data peminjaman buku di perpustakaan. Sistem ini dibuat menggunakan teknologi laravel versi 8 dan bootstrap versi 5', 'website-logo/qT4S7PGEIFAhmuMpV71yFC0uTy4SLEzEaGW5XGqM.jpg', '2024-05-05 04:30:14', '2024-05-05 04:30:14');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indeks untuk tabel `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `websites`
--
ALTER TABLE `websites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
