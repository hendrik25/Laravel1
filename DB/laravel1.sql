-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Bulan Mei 2023 pada 16.50
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `nik` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bagian` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_masuk` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`nik`, `name`, `tempat_lahir`, `tgl_lahir`, `agama`, `jenis_kelamin`, `no_hp`, `email`, `alamat`, `jabatan`, `bagian`, `tgl_masuk`, `remember_token`, `created_at`, `updated_at`) VALUES
(20160900050, 'Muhamad Hendrik Kurniawan', 'Kabupaten Tangerang', '1996-01-25', 'Islam', 'Laki-Laki', '089999', 'hendrik@gmail.com', 'Pabuaran', 'Admin', 'Development', '2016-09-08', NULL, '2023-05-14 02:41:18', '2023-05-14 02:41:18'),
(20160900051, 'Novita Elinda', 'Tangerang Selatan', '1999-11-15', 'Islam', 'Perempuan', '1', 'novi@gmail.com', 'cd', 'Manager', 'Development', '2022-01-12', NULL, NULL, NULL),
(20160900052, 'Riri Septiyani', 'Kota Tangerang', '2003-04-09', 'Islam', 'Perempuan', '0', 'riri@gmail.com', 'pb', 'Kepala Bagian', 'Development', '2022-03-12', NULL, NULL, NULL),
(20160900053, 'Muhamad Haris', 'Tangerang', '2006-04-25', 'Islam', 'Laki-Laki', '5000', 'haris@gmail.com', 'Pabuaran', 'Operator', 'Development', '2021-04-12', NULL, NULL, NULL),
(20160900054, 'Muhamad Hamzah', 'Tangerang', '2002-07-29', 'Islam', 'Laki-Laki', '0852', 'hamzah@gmail.com', 'PB', 'Admin', 'Plant C', '2019-02-21', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cutis`
--

CREATE TABLE `cutis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` bigint(20) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `nama_cuti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_cuti` int(11) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approval_kabag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approval_manager` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vertifikasi_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cutis`
--

INSERT INTO `cutis` (`id`, `nik`, `tgl_pengajuan`, `nama_cuti`, `jumlah_cuti`, `tgl_awal`, `tgl_akhir`, `keterangan`, `approval_kabag`, `approval_manager`, `vertifikasi_admin`, `created_at`, `updated_at`) VALUES
(4, 20160900053, '2023-05-14', 'Cuti Tahunan', 2, '2023-05-25', '2023-05-26', 'Nikah', 'Pending', 'Pending', 'Pending', '2023-05-14 07:22:59', '2023-05-14 07:22:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_cutis`
--

CREATE TABLE `data_cutis` (
  `id_cuti` bigint(20) UNSIGNED NOT NULL,
  `nik` bigint(20) NOT NULL,
  `nama_cuti` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hak_cuti` int(11) NOT NULL,
  `cuti_diambil` int(11) NOT NULL,
  `sisa_cuti` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_cutis`
--

INSERT INTO `data_cutis` (`id_cuti`, `nik`, `nama_cuti`, `periode`, `hak_cuti`, `cuti_diambil`, `sisa_cuti`, `created_at`, `updated_at`) VALUES
(1, 20160900053, 'Cuti Tahunan', '2023', 8, 0, 8, NULL, NULL),
(2, 20160900052, 'Cuti Tahunan', '2023', 9, 0, 9, NULL, NULL),
(3, 20160900051, 'Cuti Tahunan', '2023', 11, 0, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_25_011411_create_admins_table', 1),
(6, '2023_05_01_021036_create_data_cutis_table', 1),
(7, '2023_05_07_080949_create_cutis_table', 1),
(8, '2023_05_13_105327_create_vertifikasis_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nik` bigint(20) NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nik`, `username`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 20160900050, 'admin', '$2y$10$sVy9gKTeZcnQhn4MGl0AFeE97nDmpVy2l.pGe9WA94Y4SpgihBPYW', 'Admin', NULL, '2023-05-14 02:41:18', '2023-05-14 02:41:18'),
(2, 20160900053, 'operator', '$2y$10$q33taqGre3ZjzrIaQWTpdOEWRVARqrcSBrjOBc/nkPgl5EblV5LvS', 'Operator', NULL, '2023-05-14 02:46:35', '2023-05-14 02:46:35'),
(3, 20160900052, 'kabag', '$2y$10$V2G33XEQJI7eD8TTk9w1x.0/rGq9dLH0TXKcyZrWFiwiSKpfY4/Zq', 'Kepala Bagian', NULL, '2023-05-14 07:52:58', '2023-05-14 07:52:58'),
(4, 20160900051, 'manager', '$2y$10$HF9wmbxAmKR6fFc2KcPrTOyvIFQwYU5z5fI/RNdEVkI9j3VDpFFUq', 'Manager', NULL, '2023-05-14 09:37:25', '2023-05-14 09:37:25'),
(5, 20160900054, 'admin2', '$2y$10$LfjklwRiKT5.meWvAj6.ju5BU8Y1KaX109SP/uDri82mOZ8uot9la', 'Admin', NULL, '2023-05-15 02:01:06', '2023-05-15 02:01:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vertifikasis`
--

CREATE TABLE `vertifikasis` (
  `id_vertif` bigint(20) UNSIGNED NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_cuti` bigint(20) UNSIGNED NOT NULL,
  `nik` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `cutis`
--
ALTER TABLE `cutis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_cutis`
--
ALTER TABLE `data_cutis`
  ADD PRIMARY KEY (`id_cuti`);

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
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `vertifikasis`
--
ALTER TABLE `vertifikasis`
  ADD PRIMARY KEY (`id_vertif`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cutis`
--
ALTER TABLE `cutis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_cutis`
--
ALTER TABLE `data_cutis`
  MODIFY `id_cuti` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `vertifikasis`
--
ALTER TABLE `vertifikasis`
  MODIFY `id_vertif` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
