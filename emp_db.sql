-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for emp_db
CREATE DATABASE IF NOT EXISTS `emp_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `emp_db`;

-- Dumping structure for table emp_db.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table emp_db.category: ~1 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `created_at`, `updated_at`, `name`, `kategori_id`, `deleted_at`) VALUES
	(1, '2018-12-15 11:34:02', '2018-12-15 11:34:02', 'VCA Check uP', '123', NULL),
	(193, '2019-01-17 03:45:13', '2019-01-17 03:45:13', 'Medical Check Up', '124', NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table emp_db.city
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `state_id` int(10) unsigned NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `city_state_id_foreign` (`state_id`),
  CONSTRAINT `city_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table emp_db.city: ~4 rows (approximately)
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` (`id`, `state_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'Yogyakarta', '2019-01-03 15:05:03', '2019-01-03 15:05:03', NULL),
	(2, 1, 'Malang', '2019-01-03 15:05:14', '2019-01-03 15:05:14', NULL),
	(3, 1, 'Solo', '2019-01-03 15:05:26', '2019-01-03 15:05:26', NULL),
	(4, 2, '123', '2019-01-03 15:18:53', '2019-01-03 15:18:53', NULL);
/*!40000 ALTER TABLE `city` ENABLE KEYS */;

-- Dumping structure for table emp_db.country
CREATE TABLE IF NOT EXISTS `country` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table emp_db.country: ~2 rows (approximately)
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` (`id`, `country_code`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '123', 'Afghanistan', '2019-01-03 15:03:54', '2019-01-03 15:03:54', NULL),
	(2, '312', 'Nigeria', '2019-01-03 15:04:14', '2019-01-03 15:04:14', NULL);
/*!40000 ALTER TABLE `country` ENABLE KEYS */;

-- Dumping structure for table emp_db.department
CREATE TABLE IF NOT EXISTS `department` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table emp_db.department: ~0 rows (approximately)
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'VCA Department', '2019-01-03 15:00:07', '2019-01-03 15:00:07', NULL);
/*!40000 ALTER TABLE `department` ENABLE KEYS */;

-- Dumping structure for table emp_db.division
CREATE TABLE IF NOT EXISTS `division` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table emp_db.division: ~2 rows (approximately)
/*!40000 ALTER TABLE `division` DISABLE KEYS */;
INSERT INTO `division` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Cancer Anatomy', '2019-01-03 15:00:39', '2019-01-03 15:00:39', NULL),
	(2, 'Gestonomy', '2019-01-03 15:02:16', '2019-01-03 15:02:16', NULL);
/*!40000 ALTER TABLE `division` ENABLE KEYS */;

-- Dumping structure for table emp_db.dokters
CREATE TABLE IF NOT EXISTS `dokters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatLahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalLahir` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dokters_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table emp_db.dokters: ~0 rows (approximately)
/*!40000 ALTER TABLE `dokters` DISABLE KEYS */;
INSERT INTO `dokters` (`id`, `created_at`, `updated_at`, `nama`, `alamat`, `password`, `email`, `tempatLahir`, `tanggalLahir`) VALUES
	(1, '2018-10-30 08:01:27', '2018-10-30 08:01:27', 'Dokter Boyke', 'Jalan Mulyosari 14', '$2y$10$0ss6QvtuYx.4v9BsA9RA4uarfFCgLvB4DvzGV4EdCmv9WMWNcNPQ2', 'boyke@gmail.com', 'Magelang', '2008-09-02');
/*!40000 ALTER TABLE `dokters` ENABLE KEYS */;

-- Dumping structure for table emp_db.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lastname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `state_id` int(10) unsigned NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `zip` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(10) unsigned NOT NULL,
  `birthdate` date NOT NULL,
  `date_hired` date NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  `division_id` int(10) unsigned NOT NULL,
  `picture` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employees_city_id_foreign` (`city_id`),
  KEY `employees_state_id_foreign` (`state_id`),
  KEY `employees_country_id_foreign` (`country_id`),
  KEY `employees_department_id_foreign` (`department_id`),
  KEY `employees_division_id_foreign` (`division_id`),
  CONSTRAINT `employees_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `employees_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
  CONSTRAINT `employees_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`),
  CONSTRAINT `employees_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `division` (`id`),
  CONSTRAINT `employees_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table emp_db.employees: ~3 rows (approximately)
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` (`id`, `lastname`, `firstname`, `middlename`, `address`, `city_id`, `state_id`, `country_id`, `zip`, `age`, `birthdate`, `date_hired`, `department_id`, `division_id`, `picture`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 'Ahsalam', 'Badui', 'Kirsan', 'Jalan Melati Indah 19', 2, 1, 1, '65190', 19, '2019-01-16', '2019-01-30', 1, 2, 'avatars/UchGzDezaeYpHStmRwULbQCRYGmdX0DtDkBVup9b.jpeg', '2019-01-21 14:36:51', '2019-01-21 14:36:51', NULL),
	(3, 'Boea', 'Hailey Saoora', 'Noer', 'Jl Perumahan Simpang Indah 90 Surabaya', 4, 2, 1, '65147', 19, '2019-01-30', '2019-01-31', 1, 2, 'avatars/PxRvM4wKlR7nDiQVvbMF5W2fZXn4stx4axazlECO.png', '2019-01-21 14:44:15', '2019-01-21 14:44:15', NULL),
	(4, 'Faradila', 'Karina', 'Hapsari', 'Jalan Simpang 91A', 2, 1, 1, '65148', 24, '1999-01-18', '2019-01-14', 1, 2, 'avatars/O22H2Ri0UumoBQZmsKGls0mLug5WUbikt8dA48Vf.jpeg', '2019-01-21 15:46:55', '2019-01-21 15:46:55', NULL);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;

-- Dumping structure for table emp_db.employee_salary
CREATE TABLE IF NOT EXISTS `employee_salary` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(10) unsigned NOT NULL,
  `salary` decimal(16,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_salary_employee_id_foreign` (`employee_id`),
  CONSTRAINT `employee_salary_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table emp_db.employee_salary: ~0 rows (approximately)
/*!40000 ALTER TABLE `employee_salary` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_salary` ENABLE KEYS */;

-- Dumping structure for table emp_db.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table emp_db.migrations: ~11 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2017_02_18_003431_create_department_table', 1),
	(3, '2017_02_18_004142_create_division_table', 1),
	(4, '2017_02_18_004326_create_country_table', 1),
	(5, '2017_02_18_005005_create_state_table', 1),
	(6, '2017_02_18_005241_create_city_table', 1),
	(7, '2017_03_17_163141_create_employees_table', 1),
	(8, '2017_03_18_001905_create_employee_salary_table', 1),
	(9, '2018_10_05_132355_create_pasiens_table', 1),
	(10, '2018_10_08_141855_create_dokters_table', 1),
	(11, '2018_10_08_161045_create_category_table', 1),
	(12, '2018_10_09_035553_create_pemeriksaans_table', 1),
	(13, '2018_10_21_144349_create_prediksis_table', 1),
	(14, '2018_12_04_035627_create_prediksiku_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table emp_db.pasiens
CREATE TABLE IF NOT EXISTS `pasiens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatLahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalLahir` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pasiens_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table emp_db.pasiens: ~0 rows (approximately)
/*!40000 ALTER TABLE `pasiens` DISABLE KEYS */;
INSERT INTO `pasiens` (`id`, `created_at`, `updated_at`, `nama`, `alamat`, `password`, `email`, `tempatLahir`, `tanggalLahir`) VALUES
	(1, '2018-10-25 01:23:21', '2018-10-25 01:23:21', 'Ahmad Saiful', 'Jalan Jalan Kemana', '$2y$10$qOvTsZ2kIzuvhk./oJ4n4.68xyhdbwRfQvmFm3OPiykqZ1a35YEIm', 'saiful@gmail.com', 'Yogyakarta', '1997-02-12'),
	(2, '2018-11-13 14:07:53', '2018-11-13 14:07:53', 'Tiara Nur Annisa', 'Jalan Kutilang Barat 19', '$2y$10$P9EwY19UUQDhzyRhnJmgHe//A9ge5Qxtqy2uIOkPZ..9Wie3scnIC', 'tiara@yahoo.com', 'Madiun', '1997-02-13'),
	(3, '2019-01-10 07:21:57', '2019-01-10 07:21:57', 'Zainal Abidin', 'Jalan Asah Asih Asuh', '$2y$10$Ze2zyhUNfFZATKcOrdCjueQFvoe5sj0xi..ULOjXi4tzqrQG/NRYe', 'abidin@gmail.com', 'Surabaya', '1997-08-09'),
	(4, '2019-01-17 03:48:48', '2019-01-17 07:07:49', 'Nissa Sayban', 'Jalan Melati no 90 A', '$2y$10$swsokZKAFCzom.kJmGkeM.M7B1Zutk6KW1ObDvjvoi7E0AIddm0EK', 'Nisa@gmail.com', 'Sampang', '2001-12-09'),
	(5, '2019-01-21 14:54:58', '2019-01-21 14:54:58', 'Hailey Saoora Noer Boea', 'Jalan Asempayung 67A Surabaya', '$2y$10$4QH1hfDnl0uRnSsUszsVDOWlwkvlhElMc9A/unZTbfBrdsL9jxFvy', 'haile@gmail.com', 'Yogyakarta', '0000-00-00');
/*!40000 ALTER TABLE `pasiens` ENABLE KEYS */;

-- Dumping structure for table emp_db.pemeriksaans
CREATE TABLE IF NOT EXISTS `pemeriksaans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `pasiens_id` int(10) unsigned NOT NULL,
  `dokters_id` int(10) unsigned NOT NULL,
  `tgl_periksa` date NOT NULL,
  `hasil_periksa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resep_obat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `treatment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pemeriksaans_category_id_foreign` (`category_id`),
  KEY `pemeriksaans_pasiens_id_foreign` (`pasiens_id`),
  KEY `pemeriksaans_dokters_id_foreign` (`dokters_id`),
  CONSTRAINT `pemeriksaans_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `pemeriksaans_dokters_id_foreign` FOREIGN KEY (`dokters_id`) REFERENCES `dokters` (`id`),
  CONSTRAINT `pemeriksaans_pasiens_id_foreign` FOREIGN KEY (`pasiens_id`) REFERENCES `pasiens` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table emp_db.pemeriksaans: ~4 rows (approximately)
/*!40000 ALTER TABLE `pemeriksaans` DISABLE KEYS */;
INSERT INTO `pemeriksaans` (`id`, `created_at`, `updated_at`, `category_id`, `pasiens_id`, `dokters_id`, `tgl_periksa`, `hasil_periksa`, `resep_obat`, `treatment`) VALUES
	(1, '2018-12-15 11:36:00', '2018-12-15 11:36:00', 1, 1, 1, '2018-12-10', 'Baik Baik Saja', 'Amoxilin', 'Belum Ada yang serius'),
	(2, '2019-01-21 02:02:51', '2019-01-21 02:02:51', 1, 2, 1, '2019-01-15', 'Masih sakit di daerah pergelangan kaki', 'Bemaxolin', 'Belum ada yang serius'),
	(3, '2019-01-21 14:57:42', '2019-01-21 14:57:42', 193, 5, 1, '2019-01-15', 'Menggganti Luka di daerah sekita pergelangan tangan', 'HCI Ephed', 'Baik'),
	(4, '2019-01-21 15:50:14', '2019-01-21 15:50:14', 193, 2, 1, '2019-01-23', 'Masih sakit di daerah pergelangan kaki', 'Bemaxolin', 'Belum ada yang serius');
/*!40000 ALTER TABLE `pemeriksaans` ENABLE KEYS */;

-- Dumping structure for table emp_db.prediksiku
CREATE TABLE IF NOT EXISTS `prediksiku` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pasiens_id` int(10) unsigned NOT NULL,
  `STATUS_NIKAH_PASIEN` tinyint(1) NOT NULL,
  `umur` int(11) NOT NULL,
  `Pernah_Menggunakan_Pil` tinyint(1) NOT NULL,
  `Pernah_Menggunakan_Suntik` tinyint(1) NOT NULL,
  `Pernah_Menggunakan_Susuk` tinyint(1) NOT NULL,
  `Pernah_Menggunakan_IUD` tinyint(1) NOT NULL,
  `Pernah_Menggunakan_Kontrasepsi_Lain` tinyint(1) NOT NULL,
  `Sekarang_Menggunakan_Pil` tinyint(1) NOT NULL,
  `Sekarang_Menggunakan_Suntik` tinyint(1) NOT NULL,
  `Sekarang_Menggunakan_Susuk` tinyint(1) NOT NULL,
  `Sekarang_Menggunakan_IUD` tinyint(1) NOT NULL,
  `Sekarang_Menggunakan_Kontrasepsi_Lain` tinyint(1) NOT NULL,
  `Jumlah_Anak_LK` int(11) NOT NULL,
  `Jml_Anak_Pr` int(11) NOT NULL,
  `Jml_Anak_Meninggal` int(11) NOT NULL,
  `Status_Hormonal_` tinyint(1) NOT NULL,
  `Usia_Menstruasi_Pertama_Kali` int(11) NOT NULL,
  `Status_mens` tinyint(1) NOT NULL,
  `Usia_menopause` int(11) NOT NULL,
  `Usia_melahirkan_anak_pertama` int(11) NOT NULL,
  `Lama_menyusui_anak1` int(11) NOT NULL,
  `Lama_menyusui_anak2` int(11) NOT NULL,
  `Lama_menyusui_anak3` int(11) NOT NULL,
  `Jumlah_berapa_kali_keguguran` int(11) NOT NULL,
  `Pasien_tanpa_keluhan` tinyint(1) NOT NULL,
  `Lama_keluhan_yg_dirasakan_di_payudara` int(11) NOT NULL,
  `Keluhan_puting_susu_tertarik_kedlm` tinyint(1) NOT NULL,
  `Keluhan_payudara_keluar_cairan` tinyint(1) NOT NULL,
  `Keluhan_perubahan_pada_kulit_payudara` tinyint(1) NOT NULL,
  `Keluhan_lain_di_payudara` tinyint(1) NOT NULL,
  `Terdapat_benjolan_pada_payudara` tinyint(1) NOT NULL,
  `Memiliki_keluarga_dengan_kanker` tinyint(1) NOT NULL,
  `Keluhan_brt_badan_turun` tinyint(1) NOT NULL,
  `Tiroid_berdebar_mr3` tinyint(1) NOT NULL,
  `Keluhan_lain_pada_tiroid` tinyint(1) NOT NULL,
  `Terdapat_benjolan_pada_tiroid` tinyint(1) NOT NULL,
  `Lama_keluhan_lain` int(11) NOT NULL,
  `Benjolan_pd_organ_lain` tinyint(1) NOT NULL,
  `Keluhan_rasa_sakit` tinyint(1) NOT NULL,
  `Keluhan_lain` tinyint(1) NOT NULL,
  `Menderita_penyakit_lain_lain_pada_mr3` tinyint(1) NOT NULL,
  `Menderita_penyakit_di_payudara` tinyint(1) NOT NULL,
  `Terapi_hormonal_u_penyakit_di_payudara` tinyint(1) NOT NULL,
  `Thn_kemoterapi_u_penyakit_di_payudara` int(11) NOT NULL,
  `Penggunaan_obat_lainnya` tinyint(1) NOT NULL,
  `Riwayat_penggunaan_radioterapi` tinyint(1) NOT NULL,
  `Terapi_lainnya` tinyint(1) NOT NULL,
  `Pasien_menderita_hipertensi` tinyint(1) NOT NULL,
  `Mendapatkan_pengobatan_u_hypertensi` tinyint(1) NOT NULL,
  `Pasien_menderita_kencing_manis` tinyint(1) NOT NULL,
  `Mendapatkan_pengobatan_untuk_kencing_manis` tinyint(1) NOT NULL,
  `Pasienmenderit_asma` tinyint(1) NOT NULL,
  `Mendapatkan_pengobatan_asma` tinyint(1) NOT NULL,
  `Pasien_memiliki_alergi_obat` tinyint(1) NOT NULL,
  `Pasien_menderita_penyakit_lain` tinyint(1) NOT NULL,
  `Penyakit_lain_pd_keluarga` tinyint(1) NOT NULL,
  `Penyakit_hipertensi_pd_keluarga` tinyint(1) NOT NULL,
  `Penyakit_kencing_manis_pd_keluarga` tinyint(1) NOT NULL,
  `Penyakit_asma_pada_keluarga` tinyint(1) NOT NULL,
  `Riwayat_alergi_pd_keluarga` tinyint(1) NOT NULL,
  `IS_USG` tinyint(1) NOT NULL,
  `IS_MAMMOGRAPHY` tinyint(1) NOT NULL,
  `IS_VC` tinyint(1) NOT NULL,
  `IS_HPA` tinyint(1) NOT NULL,
  `IS_IHC` tinyint(1) NOT NULL,
  `IS_IOC` tinyint(1) NOT NULL,
  `IS_SITOLOGI` tinyint(1) NOT NULL,
  `IS_FNA` tinyint(1) NOT NULL,
  `CLASS` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prediksiku_pasiens_id_foreign` (`pasiens_id`),
  CONSTRAINT `prediksiku_pasiens_id_foreign` FOREIGN KEY (`pasiens_id`) REFERENCES `pasiens` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=206 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table emp_db.prediksiku: ~2 rows (approximately)
/*!40000 ALTER TABLE `prediksiku` DISABLE KEYS */;
INSERT INTO `prediksiku` (`id`, `created_at`, `updated_at`, `pasiens_id`, `STATUS_NIKAH_PASIEN`, `umur`, `Pernah_Menggunakan_Pil`, `Pernah_Menggunakan_Suntik`, `Pernah_Menggunakan_Susuk`, `Pernah_Menggunakan_IUD`, `Pernah_Menggunakan_Kontrasepsi_Lain`, `Sekarang_Menggunakan_Pil`, `Sekarang_Menggunakan_Suntik`, `Sekarang_Menggunakan_Susuk`, `Sekarang_Menggunakan_IUD`, `Sekarang_Menggunakan_Kontrasepsi_Lain`, `Jumlah_Anak_LK`, `Jml_Anak_Pr`, `Jml_Anak_Meninggal`, `Status_Hormonal_`, `Usia_Menstruasi_Pertama_Kali`, `Status_mens`, `Usia_menopause`, `Usia_melahirkan_anak_pertama`, `Lama_menyusui_anak1`, `Lama_menyusui_anak2`, `Lama_menyusui_anak3`, `Jumlah_berapa_kali_keguguran`, `Pasien_tanpa_keluhan`, `Lama_keluhan_yg_dirasakan_di_payudara`, `Keluhan_puting_susu_tertarik_kedlm`, `Keluhan_payudara_keluar_cairan`, `Keluhan_perubahan_pada_kulit_payudara`, `Keluhan_lain_di_payudara`, `Terdapat_benjolan_pada_payudara`, `Memiliki_keluarga_dengan_kanker`, `Keluhan_brt_badan_turun`, `Tiroid_berdebar_mr3`, `Keluhan_lain_pada_tiroid`, `Terdapat_benjolan_pada_tiroid`, `Lama_keluhan_lain`, `Benjolan_pd_organ_lain`, `Keluhan_rasa_sakit`, `Keluhan_lain`, `Menderita_penyakit_lain_lain_pada_mr3`, `Menderita_penyakit_di_payudara`, `Terapi_hormonal_u_penyakit_di_payudara`, `Thn_kemoterapi_u_penyakit_di_payudara`, `Penggunaan_obat_lainnya`, `Riwayat_penggunaan_radioterapi`, `Terapi_lainnya`, `Pasien_menderita_hipertensi`, `Mendapatkan_pengobatan_u_hypertensi`, `Pasien_menderita_kencing_manis`, `Mendapatkan_pengobatan_untuk_kencing_manis`, `Pasienmenderit_asma`, `Mendapatkan_pengobatan_asma`, `Pasien_memiliki_alergi_obat`, `Pasien_menderita_penyakit_lain`, `Penyakit_lain_pd_keluarga`, `Penyakit_hipertensi_pd_keluarga`, `Penyakit_kencing_manis_pd_keluarga`, `Penyakit_asma_pada_keluarga`, `Riwayat_alergi_pd_keluarga`, `IS_USG`, `IS_MAMMOGRAPHY`, `IS_VC`, `IS_HPA`, `IS_IHC`, `IS_IOC`, `IS_SITOLOGI`, `IS_FNA`, `CLASS`) VALUES
	(203, '2019-01-17 06:04:22', '2019-01-17 06:06:36', 2, 0, 90, 1, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, 1, 0, 0, 18, 1, 15, 1, 2, 2, 2, 0, 0, 12, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 2001, 0, 1, 0, 1, 1, 1, 0, 0, 0, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 'jinak'),
	(204, '2019-01-17 06:27:12', '2019-01-17 06:27:16', 1, 0, 88, 0, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 2, 0, 0, 26, 0, 10, 15, 19, 20, 21, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, 1, 0, 1, 0, 1, 1, 0, 'jinak'),
	(205, '2019-01-21 15:49:27', '2019-01-21 15:49:35', 5, 0, 21, 1, 0, 1, 0, 0, 1, 1, 0, 1, 0, 2, 21, 0, 0, 14, 0, 40, 12, 15, 18, 21, 0, 0, 11, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 1, 0, 1, 0, 0, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 0, 0, 1, 'normal');
/*!40000 ALTER TABLE `prediksiku` ENABLE KEYS */;

-- Dumping structure for table emp_db.prediksis
CREATE TABLE IF NOT EXISTS `prediksis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pasiens_id` int(10) unsigned NOT NULL,
  `status_nikah` tinyint(3) unsigned NOT NULL,
  `umur` int(11) NOT NULL,
  `status_pil` tinyint(1) NOT NULL,
  `pernah_pil` tinyint(1) NOT NULL,
  `pernah_suntik` tinyint(1) NOT NULL,
  `pernah_susuk` tinyint(1) NOT NULL,
  `pernah_iud` tinyint(1) NOT NULL,
  `pernah_kontra` tinyint(1) NOT NULL,
  `sekarang_pil` tinyint(1) NOT NULL,
  `sekarang_suntik` tinyint(1) NOT NULL,
  `sekarang_susuk` tinyint(1) NOT NULL,
  `sekarang_iud` tinyint(1) NOT NULL,
  `sekarang_kontra` tinyint(1) NOT NULL,
  `jml_anaklk` int(11) NOT NULL,
  `jml_anakpr` int(11) NOT NULL,
  `jml_anak_mnggl` int(11) NOT NULL,
  `status_meno` tinyint(1) NOT NULL,
  `status_mens` tinyint(1) NOT NULL,
  `usia_mens_1` int(11) NOT NULL,
  `usia_meno` int(11) NOT NULL,
  `usia_lahir_anak1` int(11) NOT NULL,
  `lama_asi_anak1` int(11) NOT NULL,
  `lama_asi_anak2` int(11) NOT NULL,
  `lama_asi_anak3` int(11) NOT NULL,
  `jml_gugur` int(11) NOT NULL,
  `tanpa_keluh` tinyint(1) NOT NULL,
  `lama_keluhan` int(11) NOT NULL,
  `keluhan_ptng_kdlm` tinyint(1) NOT NULL,
  `keluhan_keluar_cairan` tinyint(1) NOT NULL,
  `keluhan_kulit_pyd` tinyint(1) NOT NULL,
  `keluhan_lain_pyd` tinyint(1) NOT NULL,
  `ada_benjolan` tinyint(1) NOT NULL,
  `klg_kanker` tinyint(1) NOT NULL,
  `keluhan_bb_turun` tinyint(1) NOT NULL,
  `tiroid_berbedar` tinyint(1) NOT NULL,
  `keluhan_lain_tiroid` tinyint(1) NOT NULL,
  `benjolan_tiroid` tinyint(1) NOT NULL,
  `lama_keluhan_lain` int(11) NOT NULL,
  `benjol_organ_lain` tinyint(1) NOT NULL,
  `keluhan_rs_skt` tinyint(1) NOT NULL,
  `keluhan_lain` tinyint(1) NOT NULL,
  `pnykt_lain_mr3` tinyint(1) NOT NULL,
  `pnykt_pyd` tinyint(1) NOT NULL,
  `derita_pyd` tinyint(1) NOT NULL,
  `terapi_hormon` tinyint(4) NOT NULL,
  `thn_kemo_pyd` int(11) NOT NULL,
  `pakai_obat_lain` tinyint(1) NOT NULL,
  `pakai_radioterapi` tinyint(1) NOT NULL,
  `terapi_lain` tinyint(1) NOT NULL,
  `hipertensi` tinyint(1) NOT NULL,
  `obat_hipertensi` tinyint(1) NOT NULL,
  `kencing_mns` tinyint(1) NOT NULL,
  `obat_kencing_mns` tinyint(1) NOT NULL,
  `asma` tinyint(1) NOT NULL,
  `obat_asma` tinyint(1) NOT NULL,
  `alergi_obat` tinyint(1) NOT NULL,
  `penyakit_lain` tinyint(1) NOT NULL,
  `penyakit_pd_klg` tinyint(1) NOT NULL,
  `kencing_mns_klg` tinyint(1) NOT NULL,
  `asma_pd_klg` tinyint(1) NOT NULL,
  `alergi_klg` tinyint(1) NOT NULL,
  `penyakit_lain_klg` tinyint(1) NOT NULL,
  `is_usg` tinyint(1) NOT NULL,
  `is_mammo` tinyint(1) NOT NULL,
  `is_vc` tinyint(1) NOT NULL,
  `is_hpa` tinyint(1) NOT NULL,
  `is_ihc` tinyint(1) NOT NULL,
  `is_ioc` tinyint(1) NOT NULL,
  `is_sito` tinyint(1) NOT NULL,
  `is_fna` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `prediksis_pasiens_id_foreign` (`pasiens_id`),
  CONSTRAINT `prediksis_pasiens_id_foreign` FOREIGN KEY (`pasiens_id`) REFERENCES `pasiens` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table emp_db.prediksis: ~0 rows (approximately)
/*!40000 ALTER TABLE `prediksis` DISABLE KEYS */;
/*!40000 ALTER TABLE `prediksis` ENABLE KEYS */;

-- Dumping structure for table emp_db.prediksis_copy
CREATE TABLE IF NOT EXISTS `prediksis_copy` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pasiens_id` int(10) unsigned NOT NULL,
  `status_nikah` tinyint(3) unsigned NOT NULL,
  `umur` int(11) NOT NULL,
  `status_pil` tinyint(1) NOT NULL,
  `pernah_pil` tinyint(1) NOT NULL,
  `pernah_suntik` tinyint(1) NOT NULL,
  `pernah_susuk` tinyint(1) NOT NULL,
  `pernah_iud` tinyint(1) NOT NULL,
  `pernah_kontra` tinyint(1) NOT NULL,
  `sekarang_pil` tinyint(1) NOT NULL,
  `sekarang_suntik` tinyint(1) NOT NULL,
  `sekarang_susuk` tinyint(1) NOT NULL,
  `sekarang_iud` tinyint(1) NOT NULL,
  `sekarang_kontra` tinyint(1) NOT NULL,
  `jml_anaklk` int(11) NOT NULL,
  `jml_anakpr` int(11) NOT NULL,
  `jml_anak_mnggl` int(11) NOT NULL,
  `status_meno` tinyint(1) NOT NULL,
  `status_mens` tinyint(1) NOT NULL,
  `usia_mens_1` int(11) NOT NULL,
  `usia_meno` int(11) NOT NULL,
  `usia_lahir_anak1` int(11) NOT NULL,
  `lama_asi_anak1` int(11) NOT NULL,
  `lama_asi_anak2` int(11) NOT NULL,
  `lama_asi_anak3` int(11) NOT NULL,
  `jml_gugur` int(11) NOT NULL,
  `tanpa_keluh` tinyint(1) NOT NULL,
  `lama_keluhan` int(11) NOT NULL,
  `keluhan_ptng_kdlm` tinyint(1) NOT NULL,
  `keluhan_keluar_cairan` tinyint(1) NOT NULL,
  `keluhan_kulit_pyd` tinyint(1) NOT NULL,
  `keluhan_lain_pyd` tinyint(1) NOT NULL,
  `ada_benjolan` tinyint(1) NOT NULL,
  `klg_kanker` tinyint(1) NOT NULL,
  `keluhan_bb_turun` tinyint(1) NOT NULL,
  `tiroid_berbedar` tinyint(1) NOT NULL,
  `keluhan_lain_tiroid` tinyint(1) NOT NULL,
  `benjolan_tiroid` tinyint(1) NOT NULL,
  `lama_keluhan_lain` int(11) NOT NULL,
  `benjol_organ_lain` tinyint(1) NOT NULL,
  `keluhan_rs_skt` tinyint(1) NOT NULL,
  `keluhan_lain` tinyint(1) NOT NULL,
  `pnykt_lain_mr3` tinyint(1) NOT NULL,
  `pnykt_pyd` tinyint(1) NOT NULL,
  `derita_pyd` tinyint(1) NOT NULL,
  `terapi_hormon` tinyint(4) NOT NULL,
  `thn_kemo_pyd` int(11) NOT NULL,
  `pakai_obat_lain` tinyint(1) NOT NULL,
  `pakai_radioterapi` tinyint(1) NOT NULL,
  `terapi_lain` tinyint(1) NOT NULL,
  `hipertensi` tinyint(1) NOT NULL,
  `obat_hipertensi` tinyint(1) NOT NULL,
  `kencing_mns` tinyint(1) NOT NULL,
  `obat_kencing_mns` tinyint(1) NOT NULL,
  `asma` tinyint(1) NOT NULL,
  `obat_asma` tinyint(1) NOT NULL,
  `alergi_obat` tinyint(1) NOT NULL,
  `penyakit_lain` tinyint(1) NOT NULL,
  `penyakit_pd_klg` tinyint(1) NOT NULL,
  `kencing_mns_klg` tinyint(1) NOT NULL,
  `asma_pd_klg` tinyint(1) NOT NULL,
  `alergi_klg` tinyint(1) NOT NULL,
  `penyakit_lain_klg` tinyint(1) NOT NULL,
  `is_usg` tinyint(1) NOT NULL,
  `is_mammo` tinyint(1) NOT NULL,
  `is_vc` tinyint(1) NOT NULL,
  `is_hpa` tinyint(1) NOT NULL,
  `is_ihc` tinyint(1) NOT NULL,
  `is_ioc` tinyint(1) NOT NULL,
  `is_sito` tinyint(1) NOT NULL,
  `is_fna` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `prediksis_pasiens_id_foreign` (`pasiens_id`),
  CONSTRAINT `prediksis_copy_ibfk_1` FOREIGN KEY (`pasiens_id`) REFERENCES `pasiens` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table emp_db.prediksis_copy: ~0 rows (approximately)
/*!40000 ALTER TABLE `prediksis_copy` DISABLE KEYS */;
/*!40000 ALTER TABLE `prediksis_copy` ENABLE KEYS */;

-- Dumping structure for table emp_db.state
CREATE TABLE IF NOT EXISTS `state` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `state_country_id_foreign` (`country_id`),
  CONSTRAINT `state_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table emp_db.state: ~2 rows (approximately)
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` (`id`, `country_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'United State', '2019-01-03 15:04:35', '2019-01-03 15:04:35', NULL),
	(2, 1, 'Stateless', '2019-01-03 15:04:46', '2019-01-03 15:04:46', NULL);
/*!40000 ALTER TABLE `state` ENABLE KEYS */;

-- Dumping structure for table emp_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table emp_db.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `email`, `password`, `lastname`, `firstname`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(2, 'tiara', 'tiara@gmail.com', '123456', 'hehe', 'hoho', NULL, NULL, NULL, NULL),
	(4, 'admin', 'admin@gmail.com', '$2y$10$jWP6H0ecpbVjAgD09Lw/Ded1g4mfLmx1pticH4O1N6/XYdqY13vAa', 'Mr', 'admin', 'yo9dKCr3j2hzQ7iSfPLOFe0nGhxNF9CTPQb8RvicC9mvBrK1P1T8gcy5kPRI', NULL, '2018-10-25 01:21:38', '2018-10-25 01:21:38'),
	(5, 'jimin', 'jimin@gmail.com', '$2y$10$XpE/kHeKdin5qJkxZ5iK5.aIZ/QBQFxtWGbVAMPyxhLjJP8/5W6ga', 'saiful', 'jimin', NULL, NULL, '2019-01-05 10:51:01', '2019-01-05 10:51:01');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
