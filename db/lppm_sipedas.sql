-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 07:57 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lppm_sipedas`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_keluarga`
--

CREATE TABLE `data_keluarga` (
  `id` int(11) NOT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `rw` varchar(10) DEFAULT NULL,
  `rt` varchar(10) DEFAULT NULL,
  `dasa_wisma` varchar(100) DEFAULT NULL,
  `nama_kepala_rumah_tangga` varchar(100) DEFAULT NULL,
  `no_reg` varchar(50) DEFAULT NULL,
  `nama_anggota_keluarga` varchar(100) DEFAULT NULL,
  `status_dalam_keluarga` varchar(50) DEFAULT NULL,
  `status_dalam_perkawinan` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `pendidikan_terakhir` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `kelompok_umur` varchar(50) DEFAULT NULL,
  `bumil` varchar(10) DEFAULT NULL,
  `ibu_menyusui` varchar(10) DEFAULT NULL,
  `pasangan_subur` varchar(10) DEFAULT NULL,
  `wanita_usia_subur` varchar(10) DEFAULT NULL,
  `apa_3buta` varchar(10) DEFAULT NULL,
  `makanan_pokok_sehari_hari` varchar(100) DEFAULT NULL,
  `mempunyai_jaminan_keluarga` varchar(10) DEFAULT NULL,
  `jumlah_jaminan_keluarga` int(11) DEFAULT NULL,
  `sumber_air_keluarga` varchar(100) DEFAULT NULL,
  `tempat_pembuangan_sampah` varchar(10) DEFAULT NULL,
  `saluran_pembuangan_air_limbah` varchar(10) DEFAULT NULL,
  `stiker_p4k` varchar(10) DEFAULT NULL,
  `kriteria_rumah` varchar(100) DEFAULT NULL,
  `aktifitas_up2k` varchar(10) DEFAULT NULL,
  `aktifitas_usaha_kesling` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_keluarga`
--

INSERT INTO `data_keluarga` (`id`, `kelurahan`, `rw`, `rt`, `dasa_wisma`, `nama_kepala_rumah_tangga`, `no_reg`, `nama_anggota_keluarga`, `status_dalam_keluarga`, `status_dalam_perkawinan`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `umur`, `pendidikan_terakhir`, `pekerjaan`, `kelompok_umur`, `bumil`, `ibu_menyusui`, `pasangan_subur`, `wanita_usia_subur`, `apa_3buta`, `makanan_pokok_sehari_hari`, `mempunyai_jaminan_keluarga`, `jumlah_jaminan_keluarga`, `sumber_air_keluarga`, `tempat_pembuangan_sampah`, `saluran_pembuangan_air_limbah`, `stiker_p4k`, `kriteria_rumah`, `aktifitas_up2k`, `aktifitas_usaha_kesling`) VALUES
(5, 'Gumuruh', '13', '14', 'ssss', 'fitroh', '22', 'ica', 'Kepala Keluarga', 'menikah', 'Laki Laki', 'cimahi not bandung', '1994-01-01', 78, 'S1', 'TNI/Polri', 'Kanak Kanak', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'NonBeras', 'Ya', 4, 'Sumur', 'Ya', 'Ya', 'Ya', 'Sehat', 'Tidak', 'Ya'),
(6, 'Kebon Gedang', '13', '05', 'lukmantul', 'cimol bojot', 'as', 'sasasa', 'Kepala Keluarga', 'menikah', 'Laki Laki', 'subangs', '1999-02-02', 76, 'SMA', 'TNI/Polri', 'Dewasa', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'NonBeras', 'Ya', 3, 'Sumur', 'Ya', 'Ya', 'Ya', 'Sehat', 'Tidak', 'Ya'),
(7, 'Samoja', '10', '08', 'Tri', 'Adnan Djundjunan', '01.02.003.01.06.69', 'Ida Sukaesih', 'Istri', 'belumenikah', 'Laki Laki', 'Bandung', '2001-06-09', 21, 'S1', 'Wiraswasta', 'Remaja', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Beras', 'Ya', 9, 'Sungai', 'Ya', 'Ya', 'Ya', 'Sehat', 'Tidak', 'Ya'),
(8, 'Samoja', '02', '10', 'Nawa', 'Dadang', '21', '-', 'Kepala Keluarga', 'Menikah', 'Laki Laki', 'Bandung', '2112-12-12', 12, 'SMA', 'Wiraswasta', 'Dewasa', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'NonBeras', 'Ya', 7, 'PDAM', 'Ya', 'Ya', 'Ya', 'Tidak Sehat', 'Tidak', 'Ya'),
(9, 'Kacapiring', '12', '12', 'Nawa', 'Adnan Djundjunan', '01.02.003.01.06.69', '-', 'Istri', 'Belum Menikah', 'Laki Laki', 'Bandung', '4241-12-12', 1, 'S3', 'Wiraswasta', 'Bayi', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'NonBeras', 'Ya', 7, 'Sumur', 'Ya', 'Ya', 'Ya', 'Tidak Sehat', 'Tidak', 'Ya'),
(10, 'Kacapiring', '09', '07', 'Nawa', 'Dadang', '21', 'Ida Sukaesih', 'Anak', 'menikah', 'Laki Laki', 'Bandung', '2055-11-11', 12, 'S2', 'Pegawai Swasta', 'Kanak Kanak', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'NonBeras', 'Ya', 3, 'Sumur', 'Ya', 'Ya', 'Ya', 'Sehat', 'Tidak', 'Ya'),
(11, 'Binong', '13', '14', 'Nawa', 'Dadang', '21', 'Ida Sukaesih', 'Anak', 'menikah', 'Laki Laki', 'Bandung', '2055-11-11', 12, 'S2', 'Pegawai Swasta', 'Kanak Kanak', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'NonBeras', 'Ya', 3, 'Sumur', 'Ya', 'Ya', 'Ya', 'Sehat', 'Tidak', 'Ya'),
(12, 'Samoja', '12', '11', 'Tri', 'Adnan Djundjunan', '01.02.003.01.06.69', 'Ida Sukaesih', 'Kepala Keluarga', 'menikah', 'Laki Laki', 'Bandung', '2009-05-02', 2, 'S3', 'Pegawai Swasta', 'Lansia', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'NonBeras', 'Ya', 3, 'PDAM', 'Ya', 'Ya', 'Ya', 'Tidak Sehat', 'Tidak', 'Ya'),
(13, 'Samoja', '12', '11', 'Tri', 'Adnan Djundjunan', '01.02.003.01.06.69', 'Ida Sukaesih', 'Kepala Keluarga', 'menikah', 'Laki Laki', 'Bandung', '2009-05-02', 2, 'S3', 'Pegawai Swasta', 'Lansia', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'NonBeras', 'Ya', 3, 'PDAM', 'Ya', 'Ya', 'Ya', 'Tidak Sehat', 'Tidak', 'Ya'),
(14, 'Maleer', '13', '03', 'Panca', 'Adnan Djundjunan', '01.02.003.01.06.69', 'Ida Sukaesih', 'Anak', 'belumenikah', 'Laki Laki', 'Bandung', '2006-06-06', 2, 'SMP', 'ASN', 'Kanak Kanak', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Beras', 'Ya', 7, 'Sumur', 'Ya', 'Ya', 'Ya', 'Sehat', 'Tidak', 'Ya'),
(15, 'Kacapiring', '04', '14', 'WISMA ATLIT', 'Nurudin Jamal', '01.02.003.01.06.69', 'Syamal nur achmad', 'Kepala Keluarga', 'menikah', 'Laki Laki', 'Bandung', '2024-10-25', 12, 'SD', 'ASN', 'Bayi', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'NonBeras', 'Ya', 4, 'PDAM', 'Ya', 'Ya', 'Ya', 'Tidak Sehat', 'Tidak', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `data_per_dasawisma`
--

CREATE TABLE `data_per_dasawisma` (
  `id` int(11) NOT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kelompok_pkk_rw` varchar(10) DEFAULT NULL,
  `kelompok_pkk_rt` varchar(10) DEFAULT NULL,
  `kelompok_pkk_dasa_wisma` varchar(100) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `no_reg` varchar(20) DEFAULT NULL,
  `nama_kepala_keluarga` varchar(100) DEFAULT NULL,
  `jumlah_kk` int(11) DEFAULT 0,
  `total_laki_laki` int(11) DEFAULT 0,
  `total_perempuan` int(11) DEFAULT 0,
  `balita_laki_laki` int(11) DEFAULT 0,
  `balita_perempuan` int(11) DEFAULT 0,
  `pasangan_usia_subur` int(11) DEFAULT 0,
  `wanita_usia_subur` int(11) DEFAULT 0,
  `ibu_hamil` int(11) DEFAULT 0,
  `ibu_menyusui` int(11) DEFAULT 0,
  `lansia` int(11) DEFAULT 0,
  `tiga_buta` int(11) DEFAULT 0,
  `berkebutuhan_khusus` int(11) DEFAULT 0,
  `sehat_dan_layak_huni` varchar(10) DEFAULT NULL,
  `memiliki_tempat_pembuangan_sampah` varchar(10) DEFAULT NULL,
  `memiliki_spal` varchar(10) DEFAULT NULL,
  `memiliki_jamban` varchar(10) DEFAULT NULL,
  `sumber_air_keluarga` varchar(100) DEFAULT NULL,
  `makanan_pokok` varchar(100) DEFAULT NULL,
  `kegiatan_up2k` varchar(100) DEFAULT NULL,
  `pemanfaatan_tanah` varchar(100) DEFAULT NULL,
  `industri_rumah` varchar(100) DEFAULT NULL,
  `kerja_bakti` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_per_dasawisma`
--

INSERT INTO `data_per_dasawisma` (`id`, `kelurahan`, `kelompok_pkk_rw`, `kelompok_pkk_rt`, `kelompok_pkk_dasa_wisma`, `tahun`, `no_reg`, `nama_kepala_keluarga`, `jumlah_kk`, `total_laki_laki`, `total_perempuan`, `balita_laki_laki`, `balita_perempuan`, `pasangan_usia_subur`, `wanita_usia_subur`, `ibu_hamil`, `ibu_menyusui`, `lansia`, `tiga_buta`, `berkebutuhan_khusus`, `sehat_dan_layak_huni`, `memiliki_tempat_pembuangan_sampah`, `memiliki_spal`, `memiliki_jamban`, `sumber_air_keluarga`, `makanan_pokok`, `kegiatan_up2k`, `pemanfaatan_tanah`, `industri_rumah`, `kerja_bakti`, `keterangan`) VALUES
(2, 'Kebon waru', '10', '12', '21', 2024, '2', 'reyhan', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'ya', 'ya', 'ya', 'ya', 'Sumur', 'Beras', 'ya', 'ya', 'ya', 'ya', 'sdf'),
(3, 'Meleer', '13', '13', '11', 2023, '3', 'diva', 2, 1, 1, 1, 1, 2, 3, 1, 1, 1, 1, 1, 'ya', 'ya', 'ya', 'ya', 'PDAM', 'Beras', 'ya', 'ya', 'ya', 'ya', 'dfdf'),
(4, '', '', '', '', 0000, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', ''),
(5, '', '', '', '', 0000, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', ''),
(6, '', '', '', '', 0000, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', ''),
(7, '', '', '', '', 0000, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', ''),
(8, 'Meleer', '', '', '', 0000, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', ''),
(9, 'Kecaping', '', '', '', 0000, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', ''),
(10, 'Samoja', '14', '05', 'Panca', 2000, '01.02.033.023.3', 'Adang Daradangdang', 1, 12, 3, 4, 42, 2, 3, 4, 4, 2, 3, 2, 'tidak', 'ya', 'ya', 'tidak', 'PDAM', 'Beras', 'tidak', 'ya', 'ya', 'tidak', 'asdasdasdasdad'),
(11, 'Samoja', '13', '10', 'awdad', 0000, 'a', 'd', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'ya', 'ya', 'ya', 'ya', 'Sumur', 'Beras', 'ya', 'ya', 'tidak', 'ya', 'adawd'),
(12, 'Samoja', '10', '11', 'Catur', 2000, '01.02.033.023.3', 'Adang Daradangdang', 1, 0, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 'ya', 'tidak', 'ya', 'tidak', 'PDAM', 'Beras', 'tidak', 'ya', 'tidak', 'tidak', 'Test Resubmision'),
(13, 'Gumuruh', '11', '13', 'Wisma Atlit 3', 1998, '01.02.033.023.3', 'Nemanja Luiz Tudic', 12, 121, 3, 4, 42, 21, 31, 41, 41, 12, 3, 2, 'ya', 'ya', 'ya', 'ya', 'PDAM', 'Beras', 'ya', 'tidak', 'tidak', 'ya', 'Semuanya baik :)');

-- --------------------------------------------------------

--
-- Table structure for table `form_rekap_bumil_rt`
--

CREATE TABLE `form_rekap_bumil_rt` (
  `id` int(11) NOT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kelompok_pkk_rw` varchar(10) DEFAULT NULL,
  `kelompok_pkk_rt` varchar(10) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `kelompok_pkk_dasawisma` varchar(100) DEFAULT NULL,
  `hamil` int(11) DEFAULT 0,
  `melahirkan` int(11) DEFAULT 0,
  `nifas` int(11) DEFAULT 0,
  `meninggal` int(11) DEFAULT 0,
  `lahir_laki_laki` int(11) DEFAULT 0,
  `lahir_perempuan` int(11) DEFAULT 0,
  `memiliki_akte_kelahiran` int(11) DEFAULT 0,
  `tidak_memiliki_akte_kelahiran` int(11) DEFAULT 0,
  `meninggal_laki_laki_bayi` int(11) DEFAULT 0,
  `meninggal_perempuan_bayi` int(11) DEFAULT 0,
  `meninggal_laki_laki_balita` int(11) DEFAULT 0,
  `meninggal_perempuan_balita` int(11) DEFAULT 0,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_rekap_bumil_rt`
--

INSERT INTO `form_rekap_bumil_rt` (`id`, `kelurahan`, `kelompok_pkk_rw`, `kelompok_pkk_rt`, `tahun`, `bulan`, `kelompok_pkk_dasawisma`, `hamil`, `melahirkan`, `nifas`, `meninggal`, `lahir_laki_laki`, `lahir_perempuan`, `memiliki_akte_kelahiran`, `tidak_memiliki_akte_kelahiran`, `meninggal_laki_laki_bayi`, `meninggal_perempuan_bayi`, `meninggal_laki_laki_balita`, `meninggal_perempuan_balita`, `keterangan`) VALUES
(6, 'Cibangkong', '12', '13', 2024, 'Januari', '21', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '123'),
(7, 'Kebon gedang', '13', '11', 2000, 'November', 'Panca', 2, 3, 4, 5, 5, 4, 3, 2, 1, 2, 2, 3, 'AAAAA'),
(8, 'Binong', '14', '07', 2000, 'November', 'Panca', 2, 2, 3, 3, 2, 2, 2, 2, 2, 2, 2, 2, 'Test Resubmission'),
(9, 'Kebon waru', '04', '12', 2008, 'Desember', 'Panca', 2, 2, 4, 5, 1, 1, 1, 1, 1, 1, 1, 1, 'Test Resubmission Lagi'),
(10, 'Kebon waru', '12', '11', 2008, 'Oktober', 'Panca', 2, 2, 4, 5, 2, 2, 3, 2, 2, 2, 2, 3, 'Test Resubmission'),
(11, 'Gumuruh', '14', '14', 2000, 'Desember', 'Wisma Atlit 2', 2, 2, 4, 5, 5, 2, 3, 2, 1, 2, 2, 3, 'all good');

-- --------------------------------------------------------

--
-- Table structure for table `form_rekap_bumil_rw`
--

CREATE TABLE `form_rekap_bumil_rw` (
  `id` int(11) NOT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kelompok_pkk_rw` varchar(100) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `nama_kelompok_dasawisma` varchar(100) DEFAULT NULL,
  `hamil` int(11) DEFAULT 0,
  `melahirkan` int(11) DEFAULT 0,
  `nifas` int(11) DEFAULT 0,
  `meninggal` int(11) DEFAULT 0,
  `lahir_laki_laki` int(11) DEFAULT 0,
  `lahir_perempuan` int(11) DEFAULT 0,
  `memiliki_akte_kelahiran` int(11) DEFAULT 0,
  `tidak_memiliki_akte_kelahiran` int(11) DEFAULT 0,
  `meninggal_laki_laki_bayi` int(11) DEFAULT 0,
  `meninggal_perempuan_bayi` int(11) DEFAULT 0,
  `meninggal_laki_laki_balita` int(11) DEFAULT 0,
  `meninggal_perempuan_balita` int(11) DEFAULT 0,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_rekap_bumil_rw`
--

INSERT INTO `form_rekap_bumil_rw` (`id`, `kelurahan`, `kelompok_pkk_rw`, `tahun`, `nama_kelompok_dasawisma`, `hamil`, `melahirkan`, `nifas`, `meninggal`, `lahir_laki_laki`, `lahir_perempuan`, `memiliki_akte_kelahiran`, `tidak_memiliki_akte_kelahiran`, `meninggal_laki_laki_bayi`, `meninggal_perempuan_bayi`, `meninggal_laki_laki_balita`, `meninggal_perempuan_balita`, `keterangan`) VALUES
(1, 'Gumuruh', '11', 2024, '21', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '23'),
(2, 'Gumumu', '11', 2024, '21', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '23'),
(3, 'Kebon Gedang', '13', 2008, 'Nawa', 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 3, 3, '4'),
(4, '', '', 0000, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(5, '', '', 0000, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(6, '', '', 0000, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(7, '', '', 0000, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(8, '', '', 0000, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(9, 'Binong', '', 0000, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(10, 'Kebonwaru', '10', 2000, 'Nawa', 4, 4, 4, 4, 4, 4, 4, 4, 5, 6, 3, 4, 'AAAAA'),
(11, 'Binong', '11', 2000, 'Nawa', 1, 2, 3, 4, 1, 1, 2, 3, 4, 5, 2, 3, 'Test resubmission'),
(12, 'Kacapiring', '14', 2008, 'Eka', 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'test resub'),
(13, 'Gumuruh', '03', 2008, 'Nawawi Rusun Sehat ', 100, 3, 4, 93, 1, 100, 12, 80, 334, 401, 1, 234, 'Sedih :('),
(14, 'Kacapiring', '14', 2012, 'Nawa', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'test resubmit'),
(15, 'Kacapiring', '14', 2000, 'Nawawi Rusun Sehat ', 2, 3, 4, 5, 2, 3, 4, 5, 2, 3, 2, 3, 'cek value 0');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_warga`
--

CREATE TABLE `kegiatan_warga` (
  `id` int(11) NOT NULL,
  `kegiatan` varchar(100) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `pemilihan_sampah` varchar(10) DEFAULT NULL,
  `lubang_biopori` varchar(10) DEFAULT NULL,
  `tanaman_obat_keluarga` varchar(10) DEFAULT NULL,
  `kampung_berkebun` varchar(10) DEFAULT NULL,
  `buruan_sae` varchar(10) DEFAULT NULL,
  `sumur_resapan` varchar(10) DEFAULT NULL,
  `loseda` varchar(10) DEFAULT NULL,
  `industri_makanan` varchar(10) DEFAULT NULL,
  `industri_minuman` varchar(10) DEFAULT NULL,
  `industri_kerajinan` varchar(10) DEFAULT NULL,
  `industri_rajut` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan_warga`
--

INSERT INTO `kegiatan_warga` (`id`, `kegiatan`, `keterangan`, `pemilihan_sampah`, `lubang_biopori`, `tanaman_obat_keluarga`, `kampung_berkebun`, `buruan_sae`, `sumur_resapan`, `loseda`, `industri_makanan`, `industri_minuman`, `industri_kerajinan`, `industri_rajut`) VALUES
(8, 'Rukun Kematian', 'rukun kematian', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya'),
(9, 'Penghayatan & Pengamalan Pancasila', '-', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Ya', 'Tidak'),
(10, 'Penghayatan & Pengamalan Pancasila', '-', 'Ya', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak'),
(11, 'Kerja Bakti', '-', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak'),
(12, 'Penghayatan & Pengamalan Pancasila', '231', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak'),
(13, 'Kerja Bakti', '-', 'Ya', 'Ya', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak'),
(14, 'Kerja Bakti', '-', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak'),
(15, 'Penghayatan & Pengamalan Pancasila', '231', 'Tidak', 'Ya', 'Ya', 'Ya', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak'),
(16, 'Kerja Bakti', '-', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Ya', 'Ya', 'Tidak', 'Tidak'),
(17, 'Kerja Bakti', '1234567', 'Tidak', 'Ya', '', '', '', '', '', '', '', '', ''),
(18, 'Kerja Bakti', '1234567', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya'),
(19, 'Jimpitan', '6425235', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya'),
(20, 'Kerja Bakti', '11111', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Tidak'),
(21, 'Kegiatan Keagamaan', '11111', 'Tidak', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya'),
(22, 'Kerja Bakti', '1212312123', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya'),
(23, 'Rukun Kematian', '6425235', 'Tidak', 'Tidak', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak'),
(24, 'Penghayatan & Pengamalan Pancasila', 'test resubmission', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Tidak'),
(25, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(26, 'Penghayatan & Pengamalan Pancasila', 'test resubmission lagi', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Tidak'),
(27, 'Penghayatan & Pengamalan Pancasila', 'test resubmission', 'Ya', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Ya', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `rekap_catatan_per_dasawisma`
--

CREATE TABLE `rekap_catatan_per_dasawisma` (
  `id` int(11) NOT NULL,
  `kelompok_dasa_wisma` varchar(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `nama_anggota_keluarga` varchar(100) NOT NULL,
  `status_perkawinan` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `umur` int(11) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `berkebutuhan_khusus` varchar(100) NOT NULL,
  `penghayatan_pengamalan_pancasila` varchar(100) NOT NULL,
  `gotong_royong` varchar(10) NOT NULL,
  `pendidikan_keterampilan` varchar(100) NOT NULL,
  `pengembangan_keh_berkoperasi` varchar(100) NOT NULL,
  `pangan` varchar(100) NOT NULL,
  `sandang` varchar(100) NOT NULL,
  `kesehatan` varchar(100) NOT NULL,
  `perencanaan_sehat` varchar(100) NOT NULL,
  `kriteria_rumah` varchar(100) NOT NULL,
  `jamban_keluarga` varchar(100) NOT NULL,
  `jumlah_jamban_keluarga` int(11) DEFAULT NULL,
  `sumber_air` varchar(100) NOT NULL,
  `memiliki_tempat_sampah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekap_catatan_per_dasawisma`
--

INSERT INTO `rekap_catatan_per_dasawisma` (`id`, `kelompok_dasa_wisma`, `tahun`, `nama_anggota_keluarga`, `status_perkawinan`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `umur`, `agama`, `pendidikan`, `pekerjaan`, `berkebutuhan_khusus`, `penghayatan_pengamalan_pancasila`, `gotong_royong`, `pendidikan_keterampilan`, `pengembangan_keh_berkoperasi`, `pangan`, `sandang`, `kesehatan`, `perencanaan_sehat`, `kriteria_rumah`, `jamban_keluarga`, `jumlah_jamban_keluarga`, `sumber_air`, `memiliki_tempat_sampah`) VALUES
(5, '4', 2023, 'asep', 'Menikah', 'Laki-Laki', 'bdg', '2009-02-02', 19, 'Kristen', 'Ya', 'ASN', 'Fisik', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'kriteriaRumah', 'Ada', 2, 'Sumur', 'Ya'),
(6, 'Nawa', 2000, 'Wawan', 'Cerai Mati', 'Laki-Laki', 'Jakarsdah', '2000-02-02', 2, 'Khonghucu', 'Ya', 'TNI/Polri', 'Sensorik', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Tidak Layak Huni', 'Tidak Ada', 3, 'Sumur', 'Tidak'),
(7, 'Nawa', 0000, 'Wawan', 'Menikah', 'Laki-Laki', 'Jakarsdah', '2222-02-02', 2, 'Islam', 'Ya', 'Wiraswasta', 'Intelektual', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Tidak Layak Huni', 'Ada', 2, 'PDAM', 'Tidak'),
(8, 'Panca', 0000, '123', 'Cerai Mati', 'Laki-Laki', 'Jakarsdah', '2221-01-01', 2, 'Katolik', 'Ya', 'Mengurus Rumah Tangga', 'Mental', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'kriteriaRumah', 'Ada', 2, 'PDAM', 'Ya'),
(9, 'Panca', 0000, 'Wawan', 'Belum Menikah', 'Perempuan', 'Jakarsdah', '2231-01-01', 21, 'Islam', 'Ya', 'Wiraswasta', 'Sensorik', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Tidak Layak Huni', 'Tidak Ada', 2, 'PDAM', 'Tidak'),
(10, 'Nawa', 0000, 'Wawan', 'Belum Menikah', 'Laki-Laki', 'Jakarsdah', '2000-02-23', 20, 'Kristen', 'Ya', 'Pegawai Swasta', 'Sensorik', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', 'kriteriaRumah', 'Ada', 3, 'PDAM', 'Tidak'),
(11, 'Eka', 2000, '123123', 'Cerai Mati', 'Laki-Laki', 'Jakarsdah', '2022-03-31', 1, 'Khonghucu', 'Ya', 'TNI/Polri', 'Intelektual', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', 'kriteriaRumah', 'Ada', 7, 'PDAM', 'Tidak'),
(12, 'Eka', 0000, 'Test resubmission lagi', 'Menikah', 'Laki-Laki', 'Jakarsdah', '2024-10-16', 2, 'Islam', 'Tidak', 'Pelajar', 'Mental', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', 'kriteriaRumah', 'Ada', 2, 'PDAM', 'Tidak'),
(13, 'Eka', 2000, 'Test resubmission lagih', 'Belum Menikah', 'Perempuan', 'Jakarsdah', '2024-10-05', 1, 'Khonghucu', 'Ya', 'ASN', 'Fisik', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'kriteriaRumah', 'Tidak Ada', 4, 'Sumur', 'Ya'),
(14, 'Panca', 2008, 'Test resubmission lagihch', 'Belum Menikah', 'Laki-Laki', 'Jakarsdah', '2024-10-25', 20, 'Kristen', 'Ya', 'Mengurus Rumah Tangga', 'Mental', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'kriteriaRumah', 'Ada', 23, 'PDAM', 'Tidak'),
(15, 'Panca', 2008, 'Test resubmission lagihch', 'Belum Menikah', 'Laki-Laki', 'Jakarsdah', '2024-10-25', 20, 'Kristen', 'Ya', 'Mengurus Rumah Tangga', 'Mental', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'kriteriaRumah', 'Ada', 23, 'PDAM', 'Tidak'),
(16, 'Nawawi Rusun Sehat 12', 2000, 'Theodore Luzi dorothea', 'Cerai Mati', 'Perempuan', 'IKN', '2024-10-22', 12, 'Lainnya', 'Ya', 'Pegawai Swasta', 'Sensorik', 'Ya', 'Tidak', 'Ya', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Ya', 'kriteriaRumah', 'Ada', 31, 'Sumur', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `rekap_catatan_pkk_rt`
--

CREATE TABLE `rekap_catatan_pkk_rt` (
  `id` int(11) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kelompok_pkk_rw` varchar(100) NOT NULL,
  `kelompok_pkk_rt` varchar(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `nama_dasa_wisma` varchar(100) NOT NULL,
  `jumlah_krt` int(11) NOT NULL,
  `jumlah_kk` int(11) NOT NULL,
  `total_laki_laki` int(11) NOT NULL,
  `total_perempuan` int(11) NOT NULL,
  `balita_laki_laki` int(11) NOT NULL,
  `balita_perempuan` int(11) NOT NULL,
  `pasangan_usia_subur` int(11) NOT NULL,
  `wanita_usia_subur` int(11) NOT NULL,
  `ibu_hamil` int(11) NOT NULL,
  `ibu_menyusui` int(11) NOT NULL,
  `lansia` int(11) NOT NULL,
  `tiga_buta` int(11) NOT NULL,
  `berkebutuhan_khusus` int(11) NOT NULL,
  `sehat` int(11) NOT NULL,
  `kurang_sehat` int(11) NOT NULL,
  `memiliki_tempat_pembuangan_sampah` varchar(10) NOT NULL,
  `memiliki_spal` varchar(10) NOT NULL,
  `memiliki_jamban_keluarga` varchar(10) NOT NULL,
  `menempel_stiker_p4k` varchar(10) NOT NULL,
  `pdam` varchar(10) NOT NULL,
  `sumur` varchar(10) NOT NULL,
  `dll` varchar(10) NOT NULL,
  `beras` int(11) NOT NULL,
  `non_beras` int(11) NOT NULL,
  `up2k` varchar(10) NOT NULL,
  `pemanfaatan_tanah` varchar(10) NOT NULL,
  `industri_rumah_tangga` varchar(10) NOT NULL,
  `kesehatan_lingkungan` varchar(10) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekap_catatan_pkk_rt`
--

INSERT INTO `rekap_catatan_pkk_rt` (`id`, `kelurahan`, `kelompok_pkk_rw`, `kelompok_pkk_rt`, `tahun`, `bulan`, `nama_dasa_wisma`, `jumlah_krt`, `jumlah_kk`, `total_laki_laki`, `total_perempuan`, `balita_laki_laki`, `balita_perempuan`, `pasangan_usia_subur`, `wanita_usia_subur`, `ibu_hamil`, `ibu_menyusui`, `lansia`, `tiga_buta`, `berkebutuhan_khusus`, `sehat`, `kurang_sehat`, `memiliki_tempat_pembuangan_sampah`, `memiliki_spal`, `memiliki_jamban_keluarga`, `menempel_stiker_p4k`, `pdam`, `sumur`, `dll`, `beras`, `non_beras`, `up2k`, `pemanfaatan_tanah`, `industri_rumah_tangga`, `kesehatan_lingkungan`, `keterangan`) VALUES
(6, 'Gumuruh', '12', '13', 2023, 'Oktober', '2', 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, '2', '2', '2', '2', '2', '2', '2', 2, 2, '2', '2', '2', '2', 'asddd'),
(7, '', '', '', 0000, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, '', '', '', '', ''),
(8, '', '', '', 0000, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, '', '', '', '', ''),
(9, 'Kebonwaru', '12', '06', 2008, 'Oktober', '12', 123, 3121, 99, 89, 99, 898989, 989898, 9898, 9898, 98989, 98989, 98980, 80, 123, 123123, '323123', '123123', '12313', '123123', '123123', '123', '123123', 6069669, 123, '123', '32', '3213', '123', 'Teuing ah'),
(10, 'Gumuruh', '01', '01', 2000, 'Desember', '12', 12, 12, 12, 12, 121, 12, 12, 12, 21, 2, 12, 12, 12, 12, 12, '12', '12', '12', '12', '12', '12', '12', 12, 2, '12', '12', '12', '12', 'Cik nyobain'),
(11, '', '', '', 0000, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, '', '', '', '', ''),
(12, 'Kacapiring', '07', '05', 2000, 'September', '12', 0, 5, 0, 5, 5, 4, 4, 4, 0, 3, 64, 3, 3, 6, 6, '6', '6', '6', '6', '0', '4', '4', 6, 6, '1', '1', '1', '1', 'test 0'),
(13, 'Maleer', '03', '10', 2000, 'Agustus', '12', 21, 12, 0, 0, 0, 2, 2, 2, 2, 2, 2, 2, 2, 1, 1, '1', '1', '1', '1', '1', '1', '1', 1, 1, '1', '1', '1', '1', 'cek form value 0'),
(14, 'Kebonwaru', '11', '10', 2008, 'November', '2', 2, 2, 0, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 1, 1, '1', '1', '1', '1', '1', '1', '1', 1, 1, '1', '1', '1', '1', 'cek value 0'),
(15, 'Kacapiring', '10', '04', 2000, 'September', '12', 2, 2, 0, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, '2', '2', '2', '2', '2', '2', '2', 2, 2, '2', '2', '2', '2', 'tes pindah page sama value 0'),
(16, 'Kebonwaru', '11', '14', 2000, 'November', '12', 5, 5, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '1', '1', '1', '1', '1', '1', '1', 1, 1, '1', '1', '1', '1', 'test value 0');

-- --------------------------------------------------------

--
-- Table structure for table `rekap_catatan_pkk_rw`
--

CREATE TABLE `rekap_catatan_pkk_rw` (
  `id` int(11) NOT NULL,
  `kelurahan` varchar(255) DEFAULT NULL,
  `anggota_pkk_rw` varchar(255) DEFAULT NULL,
  `anggota_pkk_rt` varchar(255) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `bulan` varchar(255) DEFAULT NULL,
  `no_rw` int(11) DEFAULT NULL,
  `jumlah_dasa_wisma` int(11) DEFAULT NULL,
  `jumlah_rt` int(11) DEFAULT NULL,
  `jumlah_kk` int(11) DEFAULT NULL,
  `total_laki_laki` int(11) DEFAULT NULL,
  `total_perempuan` int(11) DEFAULT NULL,
  `balita_laki_laki` int(11) DEFAULT NULL,
  `balita_perempuan` int(11) DEFAULT NULL,
  `pasangan_usia_subur` int(11) DEFAULT NULL,
  `wanita_usia_subur` int(11) DEFAULT NULL,
  `ibu_hamil` int(11) DEFAULT NULL,
  `ibu_menyusui` int(11) DEFAULT NULL,
  `lansia` int(11) DEFAULT NULL,
  `tiga_buta` int(11) DEFAULT NULL,
  `berkebutuhan_khusus` int(11) DEFAULT NULL,
  `sehat` int(11) DEFAULT NULL,
  `kurang_sehat` int(11) DEFAULT NULL,
  `memiliki_tempat_pembuangan_sampah` int(11) DEFAULT NULL,
  `memiliki_spal` int(11) DEFAULT NULL,
  `memiliki_jamban_keluarga` int(11) DEFAULT NULL,
  `menempel_stiker_p4k` int(11) DEFAULT NULL,
  `pdam` int(11) DEFAULT NULL,
  `sumur` int(11) DEFAULT NULL,
  `dll` int(11) DEFAULT NULL,
  `beras` int(11) DEFAULT NULL,
  `non_beras` int(11) DEFAULT NULL,
  `up2k` int(11) DEFAULT NULL,
  `pemanfaatan_tanah_perkarangan` int(11) DEFAULT NULL,
  `industri_rumah_tangga` int(11) DEFAULT NULL,
  `kesehatan_lingkungan` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekap_catatan_pkk_rw`
--

INSERT INTO `rekap_catatan_pkk_rw` (`id`, `kelurahan`, `anggota_pkk_rw`, `anggota_pkk_rt`, `tahun`, `bulan`, `no_rw`, `jumlah_dasa_wisma`, `jumlah_rt`, `jumlah_kk`, `total_laki_laki`, `total_perempuan`, `balita_laki_laki`, `balita_perempuan`, `pasangan_usia_subur`, `wanita_usia_subur`, `ibu_hamil`, `ibu_menyusui`, `lansia`, `tiga_buta`, `berkebutuhan_khusus`, `sehat`, `kurang_sehat`, `memiliki_tempat_pembuangan_sampah`, `memiliki_spal`, `memiliki_jamban_keluarga`, `menempel_stiker_p4k`, `pdam`, `sumur`, `dll`, `beras`, `non_beras`, `up2k`, `pemanfaatan_tanah_perkarangan`, `industri_rumah_tangga`, `kesehatan_lingkungan`, `keterangan`) VALUES
(1, 'Maleer', '13', '13', 2424, 'September', 9, 7, 7, 8, 4, 5, 4, 2, 4, 5, 6, 7, 4, 2, 4, 24, 4, 5, 6, 2, 4, 5, 5, 5, 5, 5, 5, 2, 5, 4, 'teu aya'),
(2, 'Gumuruh', '11', '04', 2424, 'November', 2, 2, -1, 1, 1, 2, 1, 1, 1, 1, 1, 1, 1, 1, -1, 2, 2, 1, 2, 2, 2, 2, 3, 3, 3, 2, 2, 1, 1, 2, 'Okelah'),
(3, 'Samoja', '13', '15', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Bismilah'),
(4, '', '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(5, '', '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(6, '', '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(7, 'Maleer', '10', '12', 2008, 'Agustus', 2, 2, 2, 2, 0, 100, 0, 0, 10, 10, 10, 0, 0, 2, 3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'cek 0'),
(8, 'Binong', '11', '07', 2000, 'Oktober', 9, 3, 4, 6, 0, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 1, 1, 111, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 'test 0');

-- --------------------------------------------------------

--
-- Table structure for table `rekap_data_ibu_hamil_per_dasa_wisma`
--

CREATE TABLE `rekap_data_ibu_hamil_per_dasa_wisma` (
  `id` int(11) NOT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kelompok_pkk_rw` varchar(10) DEFAULT NULL,
  `kelompok_pkk_rt` varchar(10) DEFAULT NULL,
  `kelompok_dasa_wisma` varchar(100) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `nama_ibu_hmn` varchar(100) DEFAULT NULL,
  `nama_suami_hmn` varchar(100) DEFAULT NULL,
  `hamil_status` varchar(10) DEFAULT NULL,
  `melahirkan_status` varchar(10) DEFAULT NULL,
  `nifas_status` varchar(10) DEFAULT NULL,
  `nama_bayi_ml` varchar(100) DEFAULT NULL,
  `jenis_kelamin_ml` varchar(10) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `akte_kelahiran` varchar(10) DEFAULT NULL,
  `nama_ibu_mt` varchar(100) DEFAULT NULL,
  `nama_bayi_mt` varchar(100) DEFAULT NULL,
  `nama_balita` varchar(100) DEFAULT NULL,
  `jenis_kelamin_mt` varchar(10) DEFAULT NULL,
  `tanggal_meninggal` date DEFAULT NULL,
  `sebab_meninggal` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekap_data_ibu_hamil_per_dasa_wisma`
--

INSERT INTO `rekap_data_ibu_hamil_per_dasa_wisma` (`id`, `kelurahan`, `kelompok_pkk_rw`, `kelompok_pkk_rt`, `kelompok_dasa_wisma`, `tahun`, `bulan`, `nama_ibu_hmn`, `nama_suami_hmn`, `hamil_status`, `melahirkan_status`, `nifas_status`, `nama_bayi_ml`, `jenis_kelamin_ml`, `tempat_lahir`, `tanggal_lahir`, `akte_kelahiran`, `nama_ibu_mt`, `nama_bayi_mt`, `nama_balita`, `jenis_kelamin_mt`, `tanggal_meninggal`, `sebab_meninggal`, `keterangan`) VALUES
(7, 'Cibangkong', '15', '01', '01', 2000, 'Januari', '-', 'Deden Saepul', 'tidak', 'tidak', 'tidak', '-', 'laki', 'Jakarta', '2012-12-12', 'tidak-ada', '-', '-', '-', 'laki', '0001-12-13', '-', '-'),
(8, 'Gumuruh', '01', '01', '01', 2000, 'Oktober', '-', 'Deden Saepul', 'tidak', 'tidak', 'tidak', '-', 'laki', 'Jakarta', '2022-12-21', 'ada', '-', '-', '-', 'laki', '0001-01-01', '-', '-'),
(9, 'Samoja', '08', '03', '15', 2008, 'November', '-', 'Rahman', 'tidak', 'ya', 'ya', '-', 'perempuan', 'Jakarta', '2221-02-21', 'ada', '-', '-', '-', 'perempuan', '2009-02-02', '-', '-'),
(10, 'Maleer', '12', '14', '11', 2000, 'Desember', 'Alyavira Matsuda', 'Deden Saepul', 'tidak', 'tidak', 'ya', 'Udin Didindin', 'laki', 'Jakarta', '1998-05-12', 'tidak-ada', 'Alyavira Matsuda', 'Udin Didindin', '-', 'laki', '3231-12-12', '13', '3'),
(11, 'Gumuruh', '01', '01', '01', 0000, 'Januari', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '', ''),
(12, 'Gumuruh', '01', '01', '01', 0000, 'Januari', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '', ''),
(13, 'Gumuruh', '01', '01', '01', 0000, 'Januari', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '', ''),
(14, 'Gumuruh', '01', '01', '01', 0000, 'Oktober', 'Alyavira Matsuda', 'Tatang', 'tidak', 'ya', 'tidak', 'Udin Didindin', 'laki', 'Jakarta', '2024-11-07', 'tidak-ada', NULL, NULL, '-', 'laki', '2024-10-11', '13', 'test resubmission'),
(15, 'Cibangkong', '14', '12', '15', 0000, 'April', 'Alyavira Matsuda', 'Tatang', 'tidak', 'ya', 'ya', '-', 'perempuan', 'Jakarta', '2022-03-19', 'tidak-ada', 'Alyavira Matsuda', '-', '-', 'perempuan', '2024-10-11', '13', '1234567'),
(16, 'Gumuruh', '01', '01', '01', 2000, 'Januari', 'Nining', 'Deden Saepul', 'tidak', 'ya', 'ya', 'Udin Didindin', 'perempuan', 'Jakarta', '2024-10-10', 'tidak-ada', 'Nining', 'Udin Didindin', '-', 'perempuan', '2024-10-02', '13', 'test resubmission lagi'),
(17, 'Cibangkong', '12', '08', '13', 2077, 'Januari', 'Alyavira Matsuda', 'Rahman Jaelani lubis', 'tidak', 'ya', 'ya', 'Nikholas Luiz de Souza', 'perempuan', 'Jakarta', '2024-10-22', 'ada', 'Alyavira Matsuda', 'Nikholas Luiz de Souza', 'Theodore Alfonso Dorothea', 'perempuan', '2024-10-22', 'Kanker ', 'test resubmission');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_keluarga`
--
ALTER TABLE `data_keluarga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_per_dasawisma`
--
ALTER TABLE `data_per_dasawisma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_rekap_bumil_rt`
--
ALTER TABLE `form_rekap_bumil_rt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_rekap_bumil_rw`
--
ALTER TABLE `form_rekap_bumil_rw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan_warga`
--
ALTER TABLE `kegiatan_warga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekap_catatan_per_dasawisma`
--
ALTER TABLE `rekap_catatan_per_dasawisma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekap_catatan_pkk_rt`
--
ALTER TABLE `rekap_catatan_pkk_rt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekap_catatan_pkk_rw`
--
ALTER TABLE `rekap_catatan_pkk_rw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekap_data_ibu_hamil_per_dasa_wisma`
--
ALTER TABLE `rekap_data_ibu_hamil_per_dasa_wisma`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_keluarga`
--
ALTER TABLE `data_keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `data_per_dasawisma`
--
ALTER TABLE `data_per_dasawisma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `form_rekap_bumil_rt`
--
ALTER TABLE `form_rekap_bumil_rt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `form_rekap_bumil_rw`
--
ALTER TABLE `form_rekap_bumil_rw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kegiatan_warga`
--
ALTER TABLE `kegiatan_warga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `rekap_catatan_per_dasawisma`
--
ALTER TABLE `rekap_catatan_per_dasawisma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rekap_catatan_pkk_rt`
--
ALTER TABLE `rekap_catatan_pkk_rt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rekap_catatan_pkk_rw`
--
ALTER TABLE `rekap_catatan_pkk_rw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rekap_data_ibu_hamil_per_dasa_wisma`
--
ALTER TABLE `rekap_data_ibu_hamil_per_dasa_wisma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
