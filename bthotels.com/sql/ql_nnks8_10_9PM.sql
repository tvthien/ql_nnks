-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2017 at 04:04 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ql_nnks`
--

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_gdv`
--

CREATE TABLE `chi_tiet_gdv` (
  `ma_gdv` int(10) UNSIGNED NOT NULL,
  `ma_tk` int(10) UNSIGNED NOT NULL,
  `ngay_kich_hoat` date NOT NULL,
  `ngay_het_han` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chi_tiet_gdv`
--

INSERT INTO `chi_tiet_gdv` (`ma_gdv`, `ma_tk`, `ngay_kich_hoat`, `ngay_het_han`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-09-14', '2017-09-29', NULL, NULL, NULL),
(2, 2, '2017-09-11', '2017-09-30', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chuc_vu`
--

CREATE TABLE `chuc_vu` (
  `id_cv` int(10) UNSIGNED NOT NULL,
  `ma_nnks_cv` int(10) UNSIGNED NOT NULL,
  `ten_cv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dien_giai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_gia`
--

CREATE TABLE `danh_gia` (
  `ma_nnks_dg` int(10) UNSIGNED NOT NULL,
  `tkk_email_dg` int(10) UNSIGNED NOT NULL,
  `ngay_dg` date NOT NULL,
  `so_sao_dg` int(11) DEFAULT NULL,
  `binh_luan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dat_phong`
--

CREATE TABLE `dat_phong` (
  `ma_kv_dp` int(10) UNSIGNED NOT NULL,
  `ma_tang_dp` int(10) UNSIGNED NOT NULL,
  `ma_phong_dp` int(10) UNSIGNED NOT NULL,
  `ma_pdp_dp` int(10) UNSIGNED NOT NULL,
  `ngay_den` date NOT NULL,
  `ngay_di` date NOT NULL,
  `tinh_trang` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dd_quan_tam`
--

CREATE TABLE `dd_quan_tam` (
  `id_ddqt` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dich_vu`
--

CREATE TABLE `dich_vu` (
  `id_dv` int(10) UNSIGNED NOT NULL,
  `ma_loaidv` int(10) UNSIGNED NOT NULL,
  `ten` int(11) NOT NULL,
  `dvt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gia_dv`
--

CREATE TABLE `gia_dv` (
  `ma_dv` int(10) UNSIGNED NOT NULL,
  `gia_dv` double NOT NULL,
  `ngay_dv` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gia_gdv`
--

CREATE TABLE `gia_gdv` (
  `ma_gdv` int(10) UNSIGNED NOT NULL,
  `gia_gdv` double NOT NULL,
  `ngay_gdv` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gia_phong`
--

CREATE TABLE `gia_phong` (
  `ma_lp` int(10) UNSIGNED NOT NULL,
  `ma_kp` int(10) UNSIGNED NOT NULL,
  `ngay_gp` date NOT NULL,
  `gia_ngay` double NOT NULL,
  `gia_gio_bd` double NOT NULL,
  `gia_gio_tt` double NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goi_dv`
--

CREATE TABLE `goi_dv` (
  `id_gdv` int(10) UNSIGNED NOT NULL,
  `ten_gdv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoi_han_sd` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goi_dv`
--

INSERT INTO `goi_dv` (`id_gdv`, `ten_gdv`, `thoi_han_sd`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Gói 60 ngày', 60, NULL, NULL, NULL),
(2, 'Gói 30 ngày', 30, NULL, NULL, NULL),
(3, 'Gói 90 ngày', 90, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hang`
--

CREATE TABLE `hang` (
  `h_ang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hang`
--

INSERT INTO `hang` (`h_ang`, `remember_token`, `created_at`, `updated_at`) VALUES
('1', NULL, NULL, NULL),
('2', NULL, NULL, NULL),
('3', NULL, NULL, NULL),
('4', NULL, NULL, NULL),
('5', NULL, NULL, NULL),
('6', NULL, NULL, NULL),
('7', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `id_hd` int(10) UNSIGNED NOT NULL,
  `ma_ptg_hd` int(10) UNSIGNED NOT NULL,
  `ma_nv_hd` int(10) UNSIGNED NOT NULL,
  `ma_pdp_hd` int(10) UNSIGNED NOT NULL,
  `ngay_gio_lap` datetime NOT NULL,
  `thue_vat` int(11) NOT NULL,
  `tri_gia` double NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khach_dl`
--

CREATE TABLE `khach_dl` (
  `id_kdl` int(10) UNSIGNED NOT NULL,
  `ma_qt_kdl` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmnd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khoang_cach`
--

CREATE TABLE `khoang_cach` (
  `ma_ddqt` int(10) UNSIGNED NOT NULL,
  `ma_nnks` int(10) UNSIGNED NOT NULL,
  `khoang_cach` double NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khu_vuc`
--

CREATE TABLE `khu_vuc` (
  `id_kv` int(10) UNSIGNED NOT NULL,
  `ma_nnks_kv` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dien_giai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kieu_phong`
--

CREATE TABLE `kieu_phong` (
  `id_kp` int(10) UNSIGNED NOT NULL,
  `don_gia` double NOT NULL,
  `so_nguoi` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loaiphong_tbi`
--

CREATE TABLE `loaiphong_tbi` (
  `ma_lp` int(10) UNSIGNED NOT NULL,
  `ma_ltbi` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loai_dv`
--

CREATE TABLE `loai_dv` (
  `id_ldv` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_nnks` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loai_nnks`
--

CREATE TABLE `loai_nnks` (
  `id_lnnks` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loai_nnks`
--

INSERT INTO `loai_nnks` (`id_lnnks`, `ten`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nhà nghỉ', NULL, NULL, NULL),
(2, 'Khách sạn', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loai_phong`
--

CREATE TABLE `loai_phong` (
  `id_lp` int(10) UNSIGNED NOT NULL,
  `ma_nnks_lp` int(10) UNSIGNED NOT NULL,
  `ten_lp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta_lp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loai_phong`
--

INSERT INTO `loai_phong` (`id_lp`, `ma_nnks_lp`, `ten_lp`, `mo_ta_lp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Phòng Vip', 'Phòng dành cho khách vip', NULL, NULL, NULL),
(2, 0, 'Phòng thương gia', 'Phòng dành cho khách thương gia', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loai_tbi`
--

CREATE TABLE `loai_tbi` (
  `id_ltb` int(10) UNSIGNED NOT NULL,
  `ma_nnks_ltb` int(10) UNSIGNED NOT NULL,
  `ten_ltb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loai_tbi`
--

INSERT INTO `loai_tbi` (`id_ltb`, `ma_nnks_ltb`, `ten_ltb`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Chiếu sáng', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_09_27_010943_nhanghi_khachsan', 1),
(4, '2017_09_27_011007_loai_phong', 1),
(5, '2017_09_27_011234_loai_tb', 1),
(6, '2017_09_27_011303_gia_phong', 1),
(7, '2017_09_27_011317_thiet_bi', 1),
(8, '2017_09_27_011342_trang_bi', 1),
(9, '2017_09_27_011356_tang', 1),
(10, '2017_09_27_011414_khuvuc', 1),
(11, '2017_09_27_011426_phong', 1),
(12, '2017_09_27_011444_kieu_phong', 1),
(13, '2017_09_27_011455_ngay', 1),
(14, '2017_09_27_011550_khach_dl', 1),
(15, '2017_09_27_011603_quoc_tich', 1),
(16, '2017_09_27_011617_tinh_tp', 1),
(17, '2017_09_27_011645_dat_phong', 1),
(18, '2017_09_27_011756_phieu_thue_gio', 1),
(19, '2017_09_27_011816_nguoi_di_cung', 1),
(20, '2017_09_27_011828_hoa_don', 1),
(21, '2017_09_27_011841_su_dung_dv', 1),
(22, '2017_09_27_011908_quan_huyen', 1),
(23, '2017_09_27_011930_phuong_xa', 1),
(24, '2017_09_27_011948_diadiem_quantam', 1),
(25, '2017_09_27_012017_khoang_cach', 1),
(26, '2017_09_27_012034_loai_nnks', 1),
(27, '2017_09_27_012047_nhan_vien', 1),
(28, '2017_09_27_012102_chuc_vu', 1),
(29, '2017_09_27_012120_quang_cao', 1),
(30, '2017_09_27_012132_hang', 1),
(31, '2017_09_27_012148_tk_khach', 1),
(32, '2017_09_27_012201_danh_gia', 1),
(33, '2017_09_27_012226_dich_vu', 1),
(34, '2017_09_27_012238_yeu_cau_dv', 1),
(35, '2017_09_27_012248_gia_dv', 1),
(36, '2017_09_27_012259_loai_dv', 1),
(37, '2017_09_27_012330_quyen', 1),
(38, '2017_09_27_012344_chi_tiet_gdv', 1),
(39, '2017_09_27_012357_goi_dv', 1),
(40, '2017_09_27_012416_gia_gdv', 1),
(41, '2017_09_27_012559_loaiphong_tbi', 1),
(42, '2017_09_28_040841_phieu_dat_phong', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ngay`
--

CREATE TABLE `ngay` (
  `n_gay` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_di_cung`
--

CREATE TABLE `nguoi_di_cung` (
  `id_ndc` int(10) UNSIGNED NOT NULL,
  `ma_ptg_ndc` int(10) UNSIGNED NOT NULL,
  `cmnd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ho_ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `id_nv` int(10) UNSIGNED NOT NULL,
  `ma_nnks_nv` int(10) UNSIGNED NOT NULL,
  `ma_cv_nv` int(10) UNSIGNED NOT NULL,
  `ten_nv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmnd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_sinh` date NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL,
  `dia_chi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhan_vien`
--

INSERT INTO `nhan_vien` (`id_nv`, `ma_nnks_nv`, `ma_cv_nv`, `ten_nv`, `cmnd`, `ngay_sinh`, `gioi_tinh`, `dia_chi`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Lê Minh Khang', '215478563', '1987-10-10', 1, 'ABCDV', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nn_ks`
--

CREATE TABLE `nn_ks` (
  `id_nnks` int(10) UNSIGNED NOT NULL,
  `ma_lnnks` int(10) UNSIGNED NOT NULL,
  `hang_nnks` int(10) UNSIGNED NOT NULL,
  `ma_px` int(10) UNSIGNED NOT NULL,
  `ten_nnks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giay_pkd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nn_ks`
--

INSERT INTO `nn_ks` (`id_nnks`, `ma_lnnks`, `hang_nnks`, `ma_px`, `ten_nnks`, `sdt`, `dia_chi`, `giay_pkd`, `email`, `facebook`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'NNKS1', '', '', '', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phieu_dat_phong`
--

CREATE TABLE `phieu_dat_phong` (
  `id_pdp` int(10) UNSIGNED NOT NULL,
  `ma_nnks_pdp` int(10) UNSIGNED NOT NULL,
  `ma_kdl_pdp` int(10) UNSIGNED NOT NULL,
  `ma_nv_pdp` int(10) UNSIGNED NOT NULL,
  `ngay_dp` date NOT NULL,
  `tien_coc` double NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phieu_thue_gio`
--

CREATE TABLE `phieu_thue_gio` (
  `id_ptg` int(10) UNSIGNED NOT NULL,
  `ma_nnks_ptg` int(10) UNSIGNED NOT NULL,
  `ma_kv_ptg` int(10) UNSIGNED NOT NULL,
  `ma_tang_ptg` int(10) UNSIGNED NOT NULL,
  `ma_phong_ptg` int(10) UNSIGNED NOT NULL,
  `ma_nv_ptg` int(10) UNSIGNED NOT NULL,
  `ngay_gio_lap` datetime NOT NULL,
  `cmnd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ho_ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gio_bd` datetime NOT NULL,
  `gio_kt` datetime NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `id_p` int(10) UNSIGNED NOT NULL,
  `ma_kv_p` int(10) UNSIGNED NOT NULL,
  `ma_tang_p` int(10) UNSIGNED NOT NULL,
  `ma_nnks_p` int(10) UNSIGNED NOT NULL,
  `ma_lp_p` int(10) UNSIGNED NOT NULL,
  `ma_kp_p` int(10) UNSIGNED NOT NULL,
  `ten_p` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinh_trang` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phuong_xa`
--

CREATE TABLE `phuong_xa` (
  `id_px` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_qh` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phuong_xa`
--

INSERT INTO `phuong_xa` (`id_px`, `ten`, `ma_qh`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tân Thiềng', 2, NULL, NULL, NULL),
(2, 'An Lạc', 1, NULL, NULL, NULL),
(3, 'Xuân Khánh', 1, NULL, NULL, NULL),
(4, 'Vĩnh Thành', 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quang_cao`
--

CREATE TABLE `quang_cao` (
  `id_qc` int(10) UNSIGNED NOT NULL,
  `ma_nnks_qc` int(10) UNSIGNED NOT NULL,
  `tieu_de` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_dang` datetime NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quan_huyen`
--

CREATE TABLE `quan_huyen` (
  `id_qh` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_ttp` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quan_huyen`
--

INSERT INTO `quan_huyen` (`id_qh`, `ten`, `ma_ttp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ninh Kiều', 1, NULL, NULL, NULL),
(2, 'Chợ Lách', 2, NULL, NULL, NULL),
(3, 'Châu Thành', 2, NULL, NULL, NULL),
(4, 'Cái Răng', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quoc_tich`
--

CREATE TABLE `quoc_tich` (
  `id_qt` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quoc_tich`
--

INSERT INTO `quoc_tich` (`id_qt`, `ten`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Việt Nam', NULL, NULL, NULL),
(2, 'Lào', NULL, NULL, NULL),
(3, 'Campuchia', NULL, NULL, NULL),
(4, 'Trung Quốc', NULL, NULL, NULL),
(5, 'Đài Loan', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `id_quyen` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dien_giai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`id_quyen`, `ten`, `dien_giai`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'Quản trị hệ thống', NULL, NULL, NULL),
(2, 'Quản lý', 'Quản lý nhà nghỉ - khách sạn', NULL, NULL, NULL),
(3, 'Disabled', 'Hủy tất cả các quyền', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `su_dung_dv`
--

CREATE TABLE `su_dung_dv` (
  `ma_dv_sddv` int(10) UNSIGNED NOT NULL,
  `ma_ptg_sddv` int(10) UNSIGNED NOT NULL,
  `so_luong` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tang`
--

CREATE TABLE `tang` (
  `id_tang` int(10) UNSIGNED NOT NULL,
  `ma_nnks_tang` int(10) UNSIGNED NOT NULL,
  `ma_kv_tang` int(10) UNSIGNED NOT NULL,
  `ghi_chu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thiet_bi`
--

CREATE TABLE `thiet_bi` (
  `id_tb` int(10) UNSIGNED NOT NULL,
  `ma_ltb_tb` int(10) UNSIGNED NOT NULL,
  `ma_nnks_tb` int(10) UNSIGNED NOT NULL,
  `ten_tb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tinh_tp`
--

CREATE TABLE `tinh_tp` (
  `id_ttp` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tinh_tp`
--

INSERT INTO `tinh_tp` (`id_ttp`, `ten`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cần Thơ', NULL, NULL, NULL),
(2, 'Bến Tre', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tk_khach`
--

CREATE TABLE `tk_khach` (
  `tkk_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trang_bi`
--

CREATE TABLE `trang_bi` (
  `ma_kv_trbi` int(10) UNSIGNED NOT NULL,
  `ma_tang_trbi` int(10) UNSIGNED NOT NULL,
  `ma_p_trbi` int(10) UNSIGNED NOT NULL,
  `ma_thbi_trbi` int(10) UNSIGNED NOT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` double NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_nnks_user` int(10) UNSIGNED DEFAULT NULL,
  `ma_quyen_user` int(10) UNSIGNED NOT NULL,
  `ma_nv_user` int(10) UNSIGNED DEFAULT NULL,
  `ho_ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_gio_tao` datetime NOT NULL,
  `nguoi_tao` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `ma_nnks_user`, `ma_quyen_user`, `ma_nv_user`, `ho_ten`, `password`, `ngay_gio_tao`, `nguoi_tao`, `remember_token`, `created_at`, `updated_at`) VALUES
('1', NULL, 1, NULL, 'Superadmin', '$2y$10$7P9OiiJrbz/KFtQvHbQQSOrUK5625FrR4Fco.lR5qcQcZ4ADO6wUm', '2017-10-07 06:32:31', '1', NULL, '2017-10-06 23:32:31', '2017-10-06 23:32:31'),
('10000011', 0, 1, 0, 'Nguyễn Lê', '$2y$10$KcerMcEduVNSt.VFty6G6u8vIvoffmaS0kkvdh4RRdVsoiMqBr6YK', '2017-10-02 09:11:11', '1', NULL, '2017-10-02 02:11:11', '2017-10-02 02:11:11'),
('10000100', NULL, 2, NULL, 'Lle', '$2y$10$ojHxAUmUxJEYR/e8oF.I0.TFMyK93IF/F8qxbyYRau7XVSD.PIlAa', '2017-09-29 16:29:36', '1', NULL, '2017-09-30 19:18:54', '2017-09-30 19:18:54'),
('10000200', NULL, 1, NULL, 'Superadmin', '$2y$10$RP3p5ue2AIYAwvnCoRCca.3dkY.6JMWbMEzc1mUEzMLhly8X3c0lK', '2017-10-07 06:50:44', '1', NULL, '2017-10-06 23:50:44', '2017-10-06 23:50:44'),
('10001000', 1, 1, 1, 'Nguyễn Văn Ánh', '$2y$10$uB.jKHUw37MPjqdDndP4FOUX8dHZ5Z7DGPpgx1dLRXiS2BKl3LIBq', '0000-00-00 00:00:00', '1', NULL, NULL, '2017-10-06 00:32:40'),
('10001111', 0, 3, 0, 'Trần Hữu Trí', '$2y$10$BceAjcvAkHdvw7gQQZ2KaupcJ9JI/buXz96vJ4Ql0l/YkGgLYQAyW', '2017-10-02 19:46:57', '1', NULL, '2017-10-02 12:46:57', '2017-10-02 12:47:20'),
('10010010', NULL, 1, NULL, 'Superadmin', '$2y$10$KeGA0/RmMh6u8j0aRSYMAOkXJ.CVEZ195PrGFGhReEUhVZ.nsrH2C', '2017-10-07 06:51:34', '1', NULL, '2017-10-06 23:51:34', '2017-10-06 23:51:34'),
('10010011', NULL, 2, NULL, 'Nguyễn Lê Anh Kỳ', '$2y$10$LqYQkABKXWK7UvqYFe9Zx.ajjwWCPKbTQInVmAfyiRCQNewanBiWq', '2017-09-29 16:29:36', '1', NULL, '2017-09-29 22:20:56', '2017-09-29 22:20:56'),
('10011010', NULL, 2, NULL, 'Nguyễn Lê Anh Kỳ', '$2y$10$oRIS5zTXI9l78ckA..v/Q.1K3su0c4C8uuT6c1la.ihTN.s6JZz92', '2017-09-29 16:29:36', '1', NULL, '2017-09-29 22:21:39', '2017-09-29 22:21:39'),
('10100001', 0, 2, 0, 'ABCD', '$2y$10$9g7Fp5p7CjcReqqYGJXj8uRnInesT3Nd46VvPPeu8vsGXWHK82fS.', '2017-10-07 07:09:55', '1', NULL, '2017-10-07 00:09:55', '2017-10-07 00:15:51'),
('10100100', NULL, 2, NULL, 'Nguyễn Lê Kỳ Anh', '$2y$10$0GoXRkHuKcGz03uwLQtWk.Vp/hKrPxr2ZPygrkBVU6eQSa/xBK07a', '2017-09-29 16:29:36', '1', NULL, '2017-09-29 22:19:21', '2017-10-02 12:12:21'),
('10101000', 0, 2, 0, 'Lê Thị Chanh', '', '0000-00-00 00:00:00', '1', NULL, NULL, '2017-10-07 00:20:12'),
('QL111101', 0, 2, 0, 'Quản lý khách sạn', '$2y$10$V3ljVC2LVhdM2I1V53X6mOEF59m5CXRGn9hOacQbiR0fTjwAxfcBe', '2017-10-08 02:55:23', 'superad', 'OuBh36NRTufQfpyYnrnKGk28rUreGM49NrbMtRIAMUu3c0sebZPN3iHKr6T6', '2017-10-07 19:55:23', '2017-10-07 19:55:23'),
('superad', NULL, 1, NULL, 'Superadmin', '$2y$10$6iWUBxw4yxzbDB/qr/3QX.MyIimbZlAtQnj9dI37wuYBjF0RMQks6', '2017-10-07 07:31:39', '1', 'YWlKSADgg8lREEimVPTErPLNyfBGQ4915y51cSxfZfaSHN9HaD6W81t4iUzo', '2017-10-07 00:31:39', '2017-10-07 00:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `yeu_cau_dv`
--

CREATE TABLE `yeu_cau_dv` (
  `ma_nnks_ycdv` int(10) UNSIGNED NOT NULL,
  `ma_kv_ycdv` int(10) UNSIGNED NOT NULL,
  `ma_tang_ycdv` int(10) UNSIGNED NOT NULL,
  `ma_p_ycdv` int(10) UNSIGNED NOT NULL,
  `ma_dv_ycdv` int(10) UNSIGNED NOT NULL,
  `gio_yeu_cau` datetime NOT NULL,
  `so_luong` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chuc_vu`
--
ALTER TABLE `chuc_vu`
  ADD PRIMARY KEY (`id_cv`);

--
-- Indexes for table `dd_quan_tam`
--
ALTER TABLE `dd_quan_tam`
  ADD PRIMARY KEY (`id_ddqt`);

--
-- Indexes for table `dich_vu`
--
ALTER TABLE `dich_vu`
  ADD PRIMARY KEY (`id_dv`),
  ADD UNIQUE KEY `dich_vu_ten_unique` (`ten`);

--
-- Indexes for table `gia_dv`
--
ALTER TABLE `gia_dv`
  ADD KEY `gia_dv_ngay_dv_foreign` (`ngay_dv`);

--
-- Indexes for table `gia_gdv`
--
ALTER TABLE `gia_gdv`
  ADD KEY `gia_gdv_ngay_gdv_foreign` (`ngay_gdv`);

--
-- Indexes for table `goi_dv`
--
ALTER TABLE `goi_dv`
  ADD PRIMARY KEY (`id_gdv`),
  ADD UNIQUE KEY `goi_dv_ten_gdv_unique` (`ten_gdv`);

--
-- Indexes for table `hang`
--
ALTER TABLE `hang`
  ADD UNIQUE KEY `hang_h_ang_unique` (`h_ang`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`id_hd`);

--
-- Indexes for table `khach_dl`
--
ALTER TABLE `khach_dl`
  ADD PRIMARY KEY (`id_kdl`);

--
-- Indexes for table `khu_vuc`
--
ALTER TABLE `khu_vuc`
  ADD PRIMARY KEY (`id_kv`);

--
-- Indexes for table `kieu_phong`
--
ALTER TABLE `kieu_phong`
  ADD PRIMARY KEY (`id_kp`);

--
-- Indexes for table `loai_dv`
--
ALTER TABLE `loai_dv`
  ADD PRIMARY KEY (`id_ldv`);

--
-- Indexes for table `loai_nnks`
--
ALTER TABLE `loai_nnks`
  ADD PRIMARY KEY (`id_lnnks`),
  ADD UNIQUE KEY `loai_nnks_ten_unique` (`ten`);

--
-- Indexes for table `loai_phong`
--
ALTER TABLE `loai_phong`
  ADD PRIMARY KEY (`id_lp`);

--
-- Indexes for table `loai_tbi`
--
ALTER TABLE `loai_tbi`
  ADD PRIMARY KEY (`id_ltb`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngay`
--
ALTER TABLE `ngay`
  ADD PRIMARY KEY (`n_gay`);

--
-- Indexes for table `nguoi_di_cung`
--
ALTER TABLE `nguoi_di_cung`
  ADD PRIMARY KEY (`id_ndc`);

--
-- Indexes for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`id_nv`);

--
-- Indexes for table `nn_ks`
--
ALTER TABLE `nn_ks`
  ADD PRIMARY KEY (`id_nnks`),
  ADD UNIQUE KEY `nn_ks_sdt_unique` (`sdt`),
  ADD UNIQUE KEY `nn_ks_dia_chi_unique` (`dia_chi`),
  ADD UNIQUE KEY `nn_ks_giay_pkd_unique` (`giay_pkd`),
  ADD UNIQUE KEY `nn_ks_email_unique` (`email`),
  ADD UNIQUE KEY `nn_ks_facebook_unique` (`facebook`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `phieu_dat_phong`
--
ALTER TABLE `phieu_dat_phong`
  ADD PRIMARY KEY (`id_pdp`);

--
-- Indexes for table `phieu_thue_gio`
--
ALTER TABLE `phieu_thue_gio`
  ADD PRIMARY KEY (`id_ptg`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`id_p`);

--
-- Indexes for table `phuong_xa`
--
ALTER TABLE `phuong_xa`
  ADD PRIMARY KEY (`id_px`);

--
-- Indexes for table `quang_cao`
--
ALTER TABLE `quang_cao`
  ADD PRIMARY KEY (`id_qc`);

--
-- Indexes for table `quan_huyen`
--
ALTER TABLE `quan_huyen`
  ADD PRIMARY KEY (`id_qh`);

--
-- Indexes for table `quoc_tich`
--
ALTER TABLE `quoc_tich`
  ADD PRIMARY KEY (`id_qt`),
  ADD UNIQUE KEY `quoc_tich_ten_unique` (`ten`);

--
-- Indexes for table `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`id_quyen`),
  ADD UNIQUE KEY `quyen_ten_unique` (`ten`);

--
-- Indexes for table `tang`
--
ALTER TABLE `tang`
  ADD PRIMARY KEY (`id_tang`);

--
-- Indexes for table `thiet_bi`
--
ALTER TABLE `thiet_bi`
  ADD PRIMARY KEY (`id_tb`);

--
-- Indexes for table `tinh_tp`
--
ALTER TABLE `tinh_tp`
  ADD PRIMARY KEY (`id_ttp`);

--
-- Indexes for table `tk_khach`
--
ALTER TABLE `tk_khach`
  ADD UNIQUE KEY `tk_khach_tkk_email_unique` (`tkk_email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chuc_vu`
--
ALTER TABLE `chuc_vu`
  MODIFY `id_cv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dd_quan_tam`
--
ALTER TABLE `dd_quan_tam`
  MODIFY `id_ddqt` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dich_vu`
--
ALTER TABLE `dich_vu`
  MODIFY `id_dv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `goi_dv`
--
ALTER TABLE `goi_dv`
  MODIFY `id_gdv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id_hd` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `khach_dl`
--
ALTER TABLE `khach_dl`
  MODIFY `id_kdl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `khu_vuc`
--
ALTER TABLE `khu_vuc`
  MODIFY `id_kv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kieu_phong`
--
ALTER TABLE `kieu_phong`
  MODIFY `id_kp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loai_dv`
--
ALTER TABLE `loai_dv`
  MODIFY `id_ldv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loai_nnks`
--
ALTER TABLE `loai_nnks`
  MODIFY `id_lnnks` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `loai_phong`
--
ALTER TABLE `loai_phong`
  MODIFY `id_lp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `loai_tbi`
--
ALTER TABLE `loai_tbi`
  MODIFY `id_ltb` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `nguoi_di_cung`
--
ALTER TABLE `nguoi_di_cung`
  MODIFY `id_ndc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `id_nv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nn_ks`
--
ALTER TABLE `nn_ks`
  MODIFY `id_nnks` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `phieu_dat_phong`
--
ALTER TABLE `phieu_dat_phong`
  MODIFY `id_pdp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `phieu_thue_gio`
--
ALTER TABLE `phieu_thue_gio`
  MODIFY `id_ptg` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `phong`
--
ALTER TABLE `phong`
  MODIFY `id_p` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `phuong_xa`
--
ALTER TABLE `phuong_xa`
  MODIFY `id_px` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `quang_cao`
--
ALTER TABLE `quang_cao`
  MODIFY `id_qc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quan_huyen`
--
ALTER TABLE `quan_huyen`
  MODIFY `id_qh` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `quoc_tich`
--
ALTER TABLE `quoc_tich`
  MODIFY `id_qt` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `quyen`
--
ALTER TABLE `quyen`
  MODIFY `id_quyen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tang`
--
ALTER TABLE `tang`
  MODIFY `id_tang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thiet_bi`
--
ALTER TABLE `thiet_bi`
  MODIFY `id_tb` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tinh_tp`
--
ALTER TABLE `tinh_tp`
  MODIFY `id_ttp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `gia_dv`
--
ALTER TABLE `gia_dv`
  ADD CONSTRAINT `gia_dv_ngay_dv_foreign` FOREIGN KEY (`ngay_dv`) REFERENCES `ngay` (`n_gay`);

--
-- Constraints for table `gia_gdv`
--
ALTER TABLE `gia_gdv`
  ADD CONSTRAINT `gia_gdv_ngay_gdv_foreign` FOREIGN KEY (`ngay_gdv`) REFERENCES `ngay` (`n_gay`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
