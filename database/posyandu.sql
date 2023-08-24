-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 01:31 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posyandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayi`
--

CREATE TABLE `bayi` (
  `id` int(11) NOT NULL,
  `kode_sensus` varchar(100) NOT NULL,
  `tanggal_sensus` date NOT NULL,
  `nama_bayi` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayi`
--

INSERT INTO `bayi` (`id`, `kode_sensus`, `tanggal_sensus`, `nama_bayi`, `jenis_kelamin`, `tanggal_lahir`, `usia`, `nama_ibu`, `nama_ayah`, `no_telepon`, `alamat`, `rt`, `kelurahan`, `kecamatan`, `kabupaten`, `status`, `foto`) VALUES
(1, '01/SS/2023', '2023-06-02', 'Syafa', 'Perempuan', '2022-06-01', '', 'Siti', 'Madun', '083141025824', 'Jl Syekh Abdullah Al-hindi ', 'RT 1', 'Lokgabang', 'Astanbul', 'Banjar', 'Non Aktif', 'ebb5c-5-fakta-menarik-tentang-bayi-yang-mungkin-belum-kamu-ketahui.jpg'),
(2, '02/SS/2023', '2023-06-02', 'Ahmad Fatih Almubarok', 'Perempuan', '2022-05-22', '', 'Arbainah', 'Arman Arianto', '083141025824', 'Jl Syekh Abdullah Al-hindi ', 'RT 2', 'Lokgabang', 'Astanbul', 'Banjar', 'Aktif', '30edd-5-fakta-menarik-tentang-bayi-yang-mungkin-belum-kamu-ketahui.jpg'),
(3, '04/SS/2023', '2023-06-02', 'Irfan Badali', 'Laki-Laki', '2023-06-30', '', 'Nur Maulida', 'Ahmad Zaki', '083141025824', 'Jl Syekh Abdullah Al-hindi ', 'RT 3', 'Lokgabang', 'Astambul', 'Banjar', 'Aktif', 'b051d-5-fakta-menarik-tentang-bayi-yang-mungkin-belum-kamu-ketahui.jpg'),
(4, '03/SS/2023', '2022-12-22', 'Trias Nur Naura', 'Perempuan', '2022-12-15', '', 'Nur Hida', 'Tries jhon', '088744333321', 'Jl Syekh Abdullah Al-hindi ', 'RT 4', 'Lokgabang', 'Astambul', 'Banjar', 'Aktif', ''),
(5, '05/SS/2023', '2023-06-29', 'Aqila', 'Perempuan', '2023-07-10', '', 'Hamdiah', 'Zumrah', '088744533321', 'Jl Syekh Abdullah Al-Hindi', 'RT 3', 'Lokgabang', 'Astambul', 'Banjar', 'Aktif', ''),
(6, '06/SS/2023', '2023-01-15', 'Umi Latifah', 'Perempuan', '2023-01-05', '', 'Mina', 'Arifin', '088744533321', 'Jl Syekh Abdullah Al-Hindi', 'RT 1', 'Lokgabang', 'Astambul', 'Banjar', 'Aktif', ''),
(7, '07/SS/2023', '2023-03-19', 'Nur Halimah', 'Perempuan', '2023-03-01', '', 'Bahriah', 'Siwansah', '088744533321', 'Jl Syekh Abdullah Al-Hindi', 'RT 2', 'Lokgabang', 'Astambul', 'Banjar', 'Aktif', ''),
(8, '08/SS/2023', '2023-06-29', 'Muhammad Rafif Alfarisi', 'Laki-Laki', '2022-07-11', '', 'Melati Hudariani', 'Iwan Setiawan', '083132046224', 'Jl. Syekh Abdullah Al Hindi', 'RT 3', 'Lokgabang', 'Astambul', 'Banjar', 'Aktif', ''),
(9, '09/SS/2023', '2023-08-05', 'Meisya Azzahra', 'Perempuan', '2020-06-28', '', 'Mariana', 'M. Nor', '083137514700', 'Jl. Syekh Abdullah Al- Hindi', 'RT 4', 'Lokgabang', 'Astambul', 'Banjar', 'Aktif', ''),
(10, '010/SS/2023', '2023-08-06', 'Amira Zahra', 'Perempuan', '2022-03-15', '', 'Mahfuzah', 'Mujiburrahman', '081348239690', 'Jl. Syekh Abdullah Al-Hindi', 'RT 2', 'Lokgabang', 'Astambul', 'Banjar', 'Aktif', '');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_penimbangan`
--

CREATE TABLE `hasil_penimbangan` (
  `id_` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `jadwal_penimbangan` date NOT NULL,
  `nama_bayi` varchar(100) NOT NULL,
  `berat_badan` double NOT NULL,
  `panjang_badan` double NOT NULL,
  `lingkar_kepala` double NOT NULL,
  `lingkar_tangan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_penimbangan`
--

INSERT INTO `hasil_penimbangan` (`id_`, `id`, `jadwal_penimbangan`, `nama_bayi`, `berat_badan`, `panjang_badan`, `lingkar_kepala`, `lingkar_tangan`) VALUES
(1, 19, '2023-05-07', 'Umi Latifah', 3.7, 52, 3, 5),
(2, 27, '2023-06-05', 'Umi Latifah', 3.9, 52, 3, 5),
(3, 20, '2023-05-07', 'Ahmad Fatih Almubarok', 3.2, 80, 3, 5),
(4, 21, '2023-05-07', 'Amira Zahra', 3.7, 85, 3, 5),
(5, 22, '2023-05-08', 'Irfan Badali', 3, 159, 3, 5),
(6, 23, '2023-05-08', 'Aqila', 3.4, 65, 35, 0),
(7, 28, '2023-06-05', 'Nur Halimah', 3.6, 75, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ibu_hamil`
--

CREATE TABLE `ibu_hamil` (
  `id` int(11) NOT NULL,
  `kode_sensus` varchar(100) NOT NULL,
  `tanggal_sensus` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia` varchar(100) NOT NULL,
  `nama_suami` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ibu_hamil`
--

INSERT INTO `ibu_hamil` (`id`, `kode_sensus`, `tanggal_sensus`, `nama`, `tanggal_lahir`, `usia`, `nama_suami`, `no_telepon`, `alamat`, `rt`, `kelurahan`, `kecamatan`, `kabupaten`, `status`, `foto`) VALUES
(1, '011', '2023-07-02', 'Siti Fatimah', '2001-06-09', '', 'Muhammad Ikhsan', '083141025824', 'Jl Syekh Abdullah Al-hindi ', 'RT 1', 'Lokgabang', 'Astambul', 'Banjar', 'Aktif', '893e8-download.jpg'),
(2, '012', '2023-05-14', 'Arbasiah', '1998-12-29', '', 'Muhammad Randy Saputra', '085248447013', 'Jl Syekh Abdullah Al-hindi ', 'RT 2', 'Lokgabang', 'Astambul', 'Banjar', 'Aktif', ''),
(3, '013', '2023-05-05', 'Megawati', '1999-10-05', '', 'Gusaldi', '088744533321', 'Jl Syekh Abdullah Al-hindi ', 'RT 3', 'Lokgabang', 'Astambul', 'Banjar', 'Aktif', ''),
(4, '014', '2023-01-26', 'Nur Khalisah', '2006-02-19', '', 'Dani Nugraha', '085258912374', 'Jl Syekh Abdullah Al-hindi ', 'RT 4', 'Lokgabang', 'Astambul', 'Banjar', 'Aktif', ''),
(5, '015', '2022-12-29', 'Eka Dinayannti', '2001-05-25', '', 'Muhammad Riski', '088744533321', 'Jl Syekh Ablldullah Al-Hindi', 'RT 1', 'Lokgabang', 'Astambul', 'Banjar', 'Aktif', ''),
(6, '016', '2023-01-10', 'Firda Almira Shabrina', '1998-05-09', '', 'Syaifullah', '088744533321', 'Jl Syekh Abdullah AlHindi ', 'RT 2', 'Lokgabang', 'Astambul', 'Banjar', 'Aktif', ''),
(7, '017', '2023-05-05', 'Disya Nur Alfebri', '2001-02-20', '', 'Katon', '088744533321', 'Jl Syekh Abdullah Al-Hindi', 'RT 3', 'Lokgabang', 'Astambul', 'Banjar', 'Aktif', ''),
(8, '018', '2023-01-19', 'Nova Kumala Sari', '2001-06-29', '', 'Fadillah', '088744533321', 'Jl Syekh Abdullah Al-Hindi', 'RT 4', 'Lokgabang', 'Astambul', 'Banjar', 'Non Aktif', ''),
(9, '019', '2023-01-09', 'Rita Purnamsari', '1997-09-18', '', 'Hafizol Fahmi', '088744533321', 'Jl  Syekh Abdullah Al-Hindi', 'RT 3', 'Lokgabang', 'Astambul', 'Banjar', 'Aktif', ''),
(10, '020', '2022-09-09', 'Rosmala Dewi', '1976-09-29', '', 'Fimi Adianto', '088744533321', 'Jl  Syekh Abdullah Al-Hindi', 'RT 4', 'Lokgabang', 'Astambul', 'Banjar', 'Non Aktif', '');

-- --------------------------------------------------------

--
-- Table structure for table `imunisasi`
--

CREATE TABLE `imunisasi` (
  `id` int(11) NOT NULL,
  `jadwal_imunisasi` varchar(100) NOT NULL,
  `pukul` varchar(100) NOT NULL,
  `rt` varchar(100) NOT NULL,
  `tempat_posyandu` varchar(100) NOT NULL,
  `jenis_imunisasi` varchar(100) NOT NULL,
  `petugas` varchar(100) NOT NULL,
  `nama_bayi` varchar(100) NOT NULL,
  `berat_badan` varchar(100) NOT NULL,
  `panjang_badan` varchar(100) NOT NULL,
  `lingkar_kepala` varchar(100) NOT NULL,
  `lingkar_tangan` varchar(100) NOT NULL,
  `pemberian_obat` varchar(100) NOT NULL,
  `dosis` varchar(100) NOT NULL,
  `catatan_petugas` text NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imunisasi`
--

INSERT INTO `imunisasi` (`id`, `jadwal_imunisasi`, `pukul`, `rt`, `tempat_posyandu`, `jenis_imunisasi`, `petugas`, `nama_bayi`, `berat_badan`, `panjang_badan`, `lingkar_kepala`, `lingkar_tangan`, `pemberian_obat`, `dosis`, `catatan_petugas`, `foto`) VALUES
(3, '2023-06-02', '08.00 - Selesai', 'RT 1', 'Posyandu Dahlia 1', 'BCG Polio 1', 'Nurul', 'Syafa', '5,5 Kg', '100 Cm', '35 Cm', '20 Cm', 'Sanmol Paracetamol', '1 x Perhari', 'tes', ''),
(5, '2023-06-03', '09:00 - Selesai', 'RT 3', 'Posyandu Dahlia 2', 'BCG Polio 1', 'Siti Zainab', 'Irfan Badali', '3.9', '50 cm', '3', '4', 'Vitaman A ', '1x1hari', 'berjemur dipagi hari', '46b5f-bayi.jpg'),
(6, '2023-06-02', '08.00 - Selesai', 'RT 2', 'Posyandu Dahlia 1', 'DPT-HB-Hib 3 Polio 4', 'Sarinah', 'Nur Halimah', '6.0', '14 cm', '3 cm', '5 cm', 'Obat Cacing', '1xper 6 bulan', 'jangan makanan kemasan', '3052a-bayi.jpg'),
(7, '2023-06-03', '09:00 - Selesai', 'RT 4', 'Posyandu Dahlia 2', 'Campak ', 'Marzaniah', 'Trias Nur Naura', '9.0', '13 cm', '3 cm', '5 cm', 'Obat Cacing', '1xper 6 bulan', 'berjemur dipagi hari', '8ecea-bayi.jpg'),
(8, '2023-07-03', '09:00 - Selesai', 'RT 2', 'Posyandu Dahlia 1', 'BCG Polio 1', 'Marzaniah', 'Irfan Badali', '4.0', '51 cm', '4', '7', 'Obat Cacing', '1xper 6 bulan', 'berjemur dipagi hari', '7112c-bayi.jpg'),
(9, '2023-07-03', '09:00 - Selesai', 'RT 2', 'Posyandu Dahlia 1', 'DPT-HB-Hib 3 Polio 4', 'Rita', 'Nur Halimah', '6.2', ' 15 cm', '3', '4', 'Vitaman A ', '1x1hari', 'usahakan lebih rutin lagi untuk minum vitamin', 'f1619-bayi.jpg'),
(10, '2023-07-04', '09:00 - Selesai', 'RT 3', 'Posyandu Dahlia 2', 'Campak ', 'Baiti Rahmah', 'Trias Nur Naura', '9.1', '13 cm', '3 cm', '5 cm', 'Vitaman A ', '1x1hari', 'minum vitamin yang teratuir', '5072c-bayi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_imunisasi`
--

CREATE TABLE `jadwal_imunisasi` (
  `id` int(11) NOT NULL,
  `kode_kegiatan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `rt` varchar(100) NOT NULL,
  `pukul` varchar(100) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `pelaksanaan` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_imunisasi`
--

INSERT INTO `jadwal_imunisasi` (`id`, `kode_kegiatan`, `tanggal`, `rt`, `pukul`, `kegiatan`, `pelaksanaan`, `tempat`) VALUES
(1, '001/IMN/2023', '2023-06-02', 'RT 2', '08.00 - Selesai', 'imunisasi balita', 'Rumah Kepala Desa', 'Posyandu Dahlia 1'),
(2, '002/IMN/2023', '2023-06-02', 'RT 1', '08.00 - Selesai', 'imunisasi balita', 'Rumah Kepala Desa', 'Posyandu Dahlia 1'),
(3, '003/IMN/2023', '2023-06-03', 'RT 3', '09:00 - Selesai', 'Imunisasi  Balita', 'Balai Desa', 'Posyandu Dahlia 2'),
(4, '004/IMN/2023', '2023-06-03', 'RT 4', '09:00 - Selesai', 'Penimbangan Balita', 'Balai Desa', 'Posyandu Dahlia 2'),
(5, '005/IMN/2023', '2023-07-03', 'RT 1', '09:00 - Selesai', 'Imunisasi  Balita', 'Rumah Kepala Desa', 'Posyandu Dahlia 1'),
(6, '006/IMN/2023', '2023-07-03', 'RT 2', '09:00 - Selesai', 'Imunisasi  Balita', 'Rumah Kepala Desa', 'Posyandu Dahlia 1'),
(7, '007/IMN/2023', '2023-07-04', 'RT 3', '09:00 - Selesai', 'Imunisasi  Balita', 'Klinik Desa', 'Posyandu Dahlia 2'),
(8, '008/IMN/2023', '2023-07-04', 'RT 4', '09:00 - Selesai', 'Imunisasi  Balita', 'Klinik Desa', 'Posyandu Dahlia 2');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pemeriksaan`
--

CREATE TABLE `jadwal_pemeriksaan` (
  `id` int(11) NOT NULL,
  `kode_pemeriksaan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `rt` varchar(100) NOT NULL,
  `pukul` varchar(100) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `pelaksanaan` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_pemeriksaan`
--

INSERT INTO `jadwal_pemeriksaan` (`id`, `kode_pemeriksaan`, `tanggal`, `rt`, `pukul`, `kegiatan`, `pelaksanaan`, `tempat`) VALUES
(4, '004/CHECK/2023', '2023-06-01', 'RT 1', '09:00 - 12:00', 'Pemeriksaan Ibu Hamil', 'Klinik Desa', 'Posyandu Dahlia 1'),
(5, '005/CHECK/2023', '2023-06-01', 'RT 2', '09:00 - 12:00', 'Pemeriksaan Ibu Hamil', 'Klinik Desa', 'Posyandu Dahlia 1'),
(6, '006/CHECK/2023', '2023-06-02', 'RT 3', '09:00 - 12:00', 'Pemeriksaan Ibu Hamil', 'Klinik Desa', 'Posyandu Dahlia 2'),
(7, '007/CHECK/2023', '2023-06-02', 'RT 4', '09:00 - 12:00', 'Pemeriksaan Ibu Hamil', 'Klinik Desa', 'Posyandu Dahlia 2'),
(8, '008/CHECK/2023', '2023-07-02', 'RT 1', '09:00 - 12:00', 'Pemeriksaan Ibu Hamil', 'Klinik Desa', 'Posyandu Dahlia 1'),
(9, '009/CHECK/2023', '2023-07-02', 'RT 2', '09:00 - 12:00', 'Pemeriksaan Ibu Hamil', 'Klinik Desa', 'Posyandu Dahlia 1'),
(10, '010/CHECK/2023', '2023-07-03', 'RT 3', '09:00 - 12:00', 'Pemeriksaan Ibu Hamil', 'Klinik Desa', 'Posyandu Dahlia 2'),
(11, '011/CHECK/2023', '2023-07-03', 'RT 4', '09:00 - 12:00', 'Pemeriksaan Ibu Hamil', 'Klinik Desa', 'Posyandu Dahlia 2');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_penimbangan`
--

CREATE TABLE `jadwal_penimbangan` (
  `id` int(11) NOT NULL,
  `kode_kegiatan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `rt` varchar(100) NOT NULL,
  `pukul` varchar(100) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `pelaksanaan` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_penimbangan`
--

INSERT INTO `jadwal_penimbangan` (`id`, `kode_kegiatan`, `tanggal`, `rt`, `pukul`, `kegiatan`, `pelaksanaan`, `tempat`) VALUES
(6, '001/ACT/2023', '2023-05-07', 'RT 1', '09:00 - Selesai', 'Penimbangan Balita', 'Rumah Kepala Desa', 'Posyandu Dahlia 1'),
(7, '007/ACT/2023', '2023-05-07', 'RT 2', '09:00 - Selesai', 'Penimbangan Balita', 'Rumah Kepala Desa', 'Posyandu Dahlia 1'),
(8, '008/ACT/2023', '2023-05-08', 'RT 3', '09:00 - Selesai', 'Penimbangan Balita', 'Balai Desa', 'Posyandu Dahlia 2'),
(9, '009/ACT/2023', '2023-05-08', 'RT 4', '09:00 - Selesai', 'Penimbangan Balita', 'Balai Desa', 'Posyandu Dahlia 2'),
(10, '010/ACT/2023', '2023-06-05', 'RT 1', '09:00 - Selesai', 'Penimbangan Balita', 'Rumah Kepala Desa', 'Posyandu Dahlia 1'),
(11, '011/ACT/2023', '2023-06-05', 'RT 2', '09:00 - Selesai', 'Penimbangan Balita', 'Rumah Kepala Desa', 'Posyandu Dahlia 1'),
(12, '012/ACT/2023', '2023-06-06', 'RT 3', '09:00 - Selesai', 'Penimbangan Balita', 'Balai Desa', 'Posyandu Dahlia 2'),
(13, '013/ACT/2023', '2023-06-06', 'RT 4', '09:00 - Selesai', 'Penimbangan Balita', 'Balai Desa', 'Posyandu Dahlia 2'),
(14, '014/ACT/2023', '2023-07-07', 'RT 1', '09:00 - Selesai', 'Penimbangan Balita', 'Rumah Kepala Desa', 'Posyandu Dahlia 1'),
(15, '015/ACT/2023', '2023-07-07', 'RT 2', '09:00 - Selesai', 'Penimbangan Balita', 'Rumah Kepala Desa', 'Posyandu Dahlia 1'),
(16, '016/ACT/2023', '2023-07-08', 'RT 3', '09:00 - Selesai', 'Penimbangan Balita', 'Balai Desa', 'Posyandu Dahlia 2'),
(17, '017/ACT/2023', '2023-07-08', 'RT 4', '09:00 - Selesai', 'Penimbangan Balita', 'Balai Desa', 'Posyandu Dahlia 2');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_imunisasi`
--

CREATE TABLE `jenis_imunisasi` (
  `id` int(11) NOT NULL,
  `jenis_imunisasi` varchar(100) NOT NULL,
  `usia` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_imunisasi`
--

INSERT INTO `jenis_imunisasi` (`id`, `jenis_imunisasi`, `usia`, `keterangan`) VALUES
(1, 'BCG Polio 1', '1 Bulan', 'mencegah penularan tuberculosis dan polio.'),
(2, 'DPT-HB-Hib 1 Polio 2', '2 Bulan', 'Mencegah Polio, Difteri, Batuk Rejan, Retanus, Hepatitis B, Meningitis & Pneumonia.'),
(3, 'DPT-HB-Hib 2 Polio 3', '3 Bulan', 'Mencegah Lumpuh Layu'),
(4, 'DPT-HB-Hib 3 Polio 4', '4 Bulan', 'Agar Kekebalan yang terbentuk semakin sempurna'),
(5, 'Campak ', '9 Bulan', 'Mencegah Campak');

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner`
--

CREATE TABLE `kuesioner` (
  `id` int(11) NOT NULL,
  `tanggal_pengisian` date NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pertanyaan1` varchar(100) NOT NULL,
  `pertanyaan2` varchar(100) NOT NULL,
  `pertanyaan3` varchar(100) NOT NULL,
  `pertanyaan4` varchar(100) NOT NULL,
  `pertanyaan5` varchar(100) NOT NULL,
  `pertanyaan6` varchar(100) NOT NULL,
  `pertanyaan7` varchar(100) NOT NULL,
  `rekap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuesioner`
--

INSERT INTO `kuesioner` (`id`, `tanggal_pengisian`, `nik`, `nama`, `alamat`, `pertanyaan1`, `pertanyaan2`, `pertanyaan3`, `pertanyaan4`, `pertanyaan5`, `pertanyaan6`, `pertanyaan7`, `rekap`) VALUES
(3, '2023-08-06', '630300000000', 'Disya Nur', 'Bati-bati', 'Baik', 'Baik', 'Sangat Baik', 'Kurang Baik', 'Baik', 'Kurang Baik', 'Baik', 3),
(4, '2023-08-06', '630300000000', 'Nova Kul', 'Amuntai', 'Baik', 'Sangat Baik', 'Kurang Baik', 'Baik', 'Kurang Baik', 'Baik', 'Baik', 3);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `tanggal_input` date NOT NULL,
  `kode_obat` varchar(100) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `jenis_obat` varchar(100) NOT NULL,
  `untuk_usia` varchar(100) NOT NULL,
  `fungsi_obat` text NOT NULL,
  `masa_kadaluarsa` date NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `tanggal_input`, `kode_obat`, `nama_obat`, `jenis_obat`, `untuk_usia`, `fungsi_obat`, `masa_kadaluarsa`, `foto`) VALUES
(1, '2023-06-02', '001/OBT/2023', 'Sanmol Paracetamol', 'Sirup', '0 - 6 Bulan', '1. Meringankan Nyeri\r\n2. Menurunkan Demam', '2024-06-02', 'be97d-apotek_online_k24klik_20201020025034359225_sanmol-60-ml.jpg'),
(2, '2023-06-02', '002/OBT/2023', 'Gentle Baby', 'Sirup', '0 - 6 Bulan', 'meringankan pilek dan flu', '2024-06-02', 'd8068-91b1b77a-082f-4a3f-8cd6-2f4b834b1602.png'),
(3, '2023-08-15', '003/OBT/2023', 'Obat Cacing', 'Pil', '1-3 Tahun', 'Menjaga Anak Dari Cacingan', '2024-01-01', 'b60fc-1-d11360f402b7435daead6d1430ebaa60_600xauto.jpg'),
(4, '2023-08-15', '004/OBT/2023', 'Vitaman A ', 'Kapsul', '6-11 Bulan', 'meningkatkan daya tubuh terhadap penyakit dan infeksi seperti campak dan diare', '2023-12-22', 'f1e15-images.jpg'),
(5, '2023-08-15', '005/OBT/2023', 'Vitaman A', 'Kapsul', '12-59 Bulan', 'meningkatkan daya tahan tubuh terhadap penyakit dan infeksi seperti campak dan diare', '2024-02-16', '7df5e-download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `no_telepon` varchar(16) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `unit_posyandu` varchar(100) NOT NULL,
  `tanggal_penempatan` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `username`, `password`, `role`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pendidikan`, `agama`, `no_telepon`, `email`, `alamat`, `unit_posyandu`, `tanggal_penempatan`, `status`, `foto`) VALUES
(1, 'admin', 'admin', 'admin', '', 'Administrator', '', '0000-00-00', '', '', '', '083141025824', 'admin@gmail.com', '', '', '0000-00-00', '', ''),
(5, '-', '-', 'petugas', '630300000000', 'Baiti Rahmah', 'Maratpura', '1990-06-02', 'Perempuan', 'SMA', 'Islam', '083141025824', 'baiti@gmail.com', 'Jl Syekh Abdullah Al-hindi ', 'Posyandu Dahlia 2', '2021-06-02', 'Honorer', ''),
(6, '-', '-', 'petugas', '630300000000', 'Marzaniah', 'Maratpura', '1973-09-20', 'Perempuan', 'SMA', 'Islam', '083141025824', 'marzaniah@gmail.com', 'Jl Syekh Abdullah Al-hindi ', 'Posyandu Dahlia 2', '2020-06-02', 'Honorer', ''),
(8, '-', '-', 'petugas', '630300000000', 'Siti Zainab', 'Astambul', '1996-06-11', 'Perempuan', 'SMA', 'Islam', '083141025824', 'zainab@gmail.com', 'Jl Syekh Abdullah Al-hindi ', 'Posyandu Dahlia 2', '2022-06-02', 'Honorer', ''),
(10, '94/KADER/2023', 'kader', 'kader', '90', 'toto', 'pelaihari', '1990-07-10', 'Laki-Laki', 'S1', 'Islam', '083141025824', 'toto@gmail.com', 'Pindahan Baru Rt 004/ Rw 000 No 75', 'Posyandu Dahlia 2', '2023-07-10', '-', '07b4c-avatar.png'),
(11, 'bidan', 'bidan', 'bidan', '630300000000', 'Rahma Ahyina, A.Md.Keb.', 'Banjarmasin', '1990-08-06', 'Perempuan', 'D3', 'Islam', '088744533321', 'rahma@gmail.com', 'Jl Syekh Abdullah Al-hindi ', 'Posyandu Dahlia 2', '2019-03-05', 'PNS', ''),
(12, '-', '-', 'petugas', '630300000000', 'Nur Hayati', 'Maratpura', '1987-12-28', 'Perempuan', 'SMP', 'Islam', '088744533321', 'hayati@gmail.com', 'Jl.Syekh Abdullah Al-hindi', 'Posyandu Dahlia 2', '2020-03-02', 'Honorer', ''),
(13, '-', '-', 'petugas', '630300000000', 'Hidayatul Ulfah', 'Banjar', '1993-05-04', 'Perempuan', 'D3', 'Islam', '088744533321', 'ulfah@gmail.com', 'Jl.Syekh Abdullah Al-hindi', 'Posyandu Dahlia 1', '2020-03-02', 'Honorer', ''),
(14, '-', '-', 'petugas', '630300000000', 'Rita', 'Banjar', '1987-02-27', 'Perempuan', 'SMA', 'Islam', '088744533321', 'Rita@gmail.com', 'Jl.Syekh Abdullah Al-hindi', 'Posyandu Dahlia 1', '2020-03-02', 'Honorer', ''),
(15, '-', '-', 'petugas', '630300000000', 'Sarinah', 'Maratpura', '1995-08-25', 'Perempuan', 'SMA', 'Islam', '088744533321', 'Sarinah', 'Jl.Syekh Abdullah Al-hindi', 'Posyandu Dahlia 1', '2020-03-02', 'Honorer', ''),
(16, '-', '-', 'petugas', '630300000000', 'Mastiah', 'Banjarmasin', '1995-04-05', 'Perempuan', 'SMP', 'Islam', '088744533321', 'mastiah@gmail.com', 'Jl.Syekh Abdullah Al-hindi', 'Posyandu Dahlia 1', '2020-03-02', 'Honorer', ''),
(17, 'kader', 'KADER', 'admin', '', 'Petugas Kader', '', '0000-00-00', '', '', '', '088744533321', 'kader@gmail.com', '', '', '0000-00-00', '', ''),
(20, 'PPP', 'PPPP[[PPP0000000', 'bidan', '0000000000', 'KJHG', 'M JHJVN', '2022-05-10', 'Perempuan', 'SMA', 'Kristen', '088744533321', 'admin', 'Desa Kaliukan RT1 Kec.Astambul', 'Posyandu Dahlia 2', '2023-08-16', 'Kontrak', '');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `id` int(11) NOT NULL,
  `jadwal_pemeriksaan` varchar(100) NOT NULL,
  `pukul` varchar(100) NOT NULL,
  `rt` varchar(100) NOT NULL,
  `tempat_posyandu` varchar(100) NOT NULL,
  `petugas` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `berat_badan` varchar(100) NOT NULL,
  `panjang_badan` varchar(100) NOT NULL,
  `catatan_petugas` text NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id`, `jadwal_pemeriksaan`, `pukul`, `rt`, `tempat_posyandu`, `petugas`, `nama`, `berat_badan`, `panjang_badan`, `catatan_petugas`, `foto`) VALUES
(6, '2023-06-01', '09:00 - 12:00', 'RT 1', 'Posyandu Dahlia 1', 'Hidayatul Ulfah', 'Siti Fatimah', '60', '155', 'Perbanyak minum air putih', ''),
(7, '2023-06-01', '09:00 - 12:00', 'RT 1', 'Posyandu Dahlia 1', 'Rita', 'Eka Dinayannti', '45', '160', 'dianjurkan untuk minum obat penambah darah', ''),
(8, '2023-06-01', '09:00 - 12:00', 'RT 2', 'Posyandu Dahlia 1', 'Rita', 'Arbasiah', '67', '165', 'berjemur dipagi hari', ''),
(9, '2023-06-02', '09:00 - 12:00', 'RT 3', 'Posyandu Dahlia 2', 'Nur Hayati', 'Megawati', '58', '158', 'berjemur dipagi hari', ''),
(10, '2023-06-02', '09:00 - 12:00', 'RT 3', 'Posyandu Dahlia 2', 'Nur Hayati', 'Disya Nur Alfebri', '56', '165', 'berjermur dipagi hari dan perbanyak makan es cream', ''),
(11, '2023-06-02', '09:00 - 12:00', 'RT 4', 'Posyandu Dahlia 2', 'Siti Zainab', 'Nur Khalisah', '63', '155', 'lebih rutin minum vitamin asam folat', ''),
(12, '2023-07-02', '09:00 - 12:00', 'RT 1', 'Posyandu Dahlia 1', 'Rita', 'Siti Fatimah', '65', '165', 'berjemur dipagi hari\r\n', ''),
(13, '2023-06-01', '09:00 - 12:00', 'RT 2', 'Posyandu Dahlia 1', 'Sarinah', 'Arbasiah', '68', '165', 'berjemur dipagi hari', ''),
(14, '2023-07-03', '09:00 - 12:00', 'RT 3', 'Posyandu Dahlia 2', 'Marzaniah', 'Megawati', '60', '158', 'berjemur dipagi hari', '');

-- --------------------------------------------------------

--
-- Table structure for table `penimbangan`
--

CREATE TABLE `penimbangan` (
  `id` int(11) NOT NULL,
  `jadwal_penimbangan` varchar(100) NOT NULL,
  `pukul` varchar(100) NOT NULL,
  `rt` varchar(100) NOT NULL,
  `tempat_posyandu` varchar(100) NOT NULL,
  `petugas` varchar(100) NOT NULL,
  `nama_bayi` varchar(100) NOT NULL,
  `berat_badan` double NOT NULL,
  `panjang_badan` double NOT NULL,
  `lingkar_kepala` double NOT NULL,
  `lingkar_tangan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penimbangan`
--

INSERT INTO `penimbangan` (`id`, `jadwal_penimbangan`, `pukul`, `rt`, `tempat_posyandu`, `petugas`, `nama_bayi`, `berat_badan`, `panjang_badan`, `lingkar_kepala`, `lingkar_tangan`) VALUES
(19, '2023-05-07', '09:00 - Selesai', 'RT 1', 'Posyandu Dahlia 1', 'Hidayatul Ulfah', 'Umi Latifah', 3.7, 52, 3, 5),
(20, '2023-05-07', '09:00 - Selesai', 'RT 2', 'Posyandu Dahlia 1', 'Rita', 'Ahmad Fatih Almubarok', 3.2, 80, 3, 5),
(21, '2023-05-07', '09:00 - Selesai', 'RT 2', 'Posyandu Dahlia 1', 'Rita', 'Amira Zahra', 3.7, 85, 3, 5),
(22, '2023-05-08', '09:00 - Selesai', 'RT 3', 'Posyandu Dahlia 2', 'Baiti Rahmah', 'Irfan Badali', 3, 159, 3, 5),
(23, '2023-05-08', '09:00 - Selesai', 'RT 3', 'Posyandu Dahlia 2', 'Baiti Rahmah', 'Aqila', 3.4, 65, 35, 0),
(24, '2023-05-08', '09:00 - Selesai', 'RT 3', 'Posyandu Dahlia 2', 'Baiti Rahmah', 'Muhammad Rafif Alfarisi', 0, 0, 0, 0),
(25, '2023-05-08', '09:00 - Selesai', 'RT 4', 'Posyandu Dahlia 2', 'Marzaniah', 'Trias Nur Naura', 0, 0, 0, 0),
(27, '2023-06-05', '09:00 - Selesai', 'RT 1', 'Posyandu Dahlia 1', 'Sarinah', 'Umi Latifah', 3.9, 52, 3, 5),
(28, '2023-06-05', '09:00 - Selesai', 'RT 2', 'Posyandu Dahlia 1', 'Sarinah', 'Nur Halimah', 3.6, 75, 3, 5),
(29, '2023-06-06', '09:00 - Selesai', 'RT 3', 'Posyandu Dahlia 2', 'Siti Zainab', 'Muhammad Rafif Alfarisi', 0, 0, 0, 0),
(30, '2023-06-06', '09:00 - Selesai', 'RT 3', 'Posyandu Dahlia 2', 'Siti Zainab', 'Aqila', 0, 0, 0, 0),
(31, '2023-05-07', '09:00 - Selesai', 'RT 2', 'Posyandu Dahlia 1', 'Hidayatul Ulfah', 'Meisya Azzahra', 0, 0, 0, 0);

--
-- Triggers `penimbangan`
--
DELIMITER $$
CREATE TRIGGER `e p` AFTER UPDATE ON `penimbangan` FOR EACH ROW BEGIN
INSERT INTO hasil_penimbangan VALUES(NULL,new.id, new.jadwal_penimbangan, new.nama_bayi, new.berat_badan, new.panjang_badan, new.lingkar_kepala, new.lingkar_tangan);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `h p` AFTER DELETE ON `penimbangan` FOR EACH ROW BEGIN
DELETE FROM hasil_penimbangan WHERE id = old.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `posyandu`
--

CREATE TABLE `posyandu` (
  `id` int(11) NOT NULL,
  `kode_posyandu` varchar(100) NOT NULL,
  `nama_posyandu` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posyandu`
--

INSERT INTO `posyandu` (`id`, `kode_posyandu`, `nama_posyandu`, `no_telepon`, `email`, `alamat`, `kelurahan`, `kecamatan`, `kabupaten`, `foto`) VALUES
(1, '001/POS/2023', 'Posyandu Dahlia 1', '083141025824', 'posyandudahlia1@gmail.com', 'Jl Syekh Abdullah Al-hindi ', 'Lokgabang', 'Astanbul', 'Banjar', '49013-posyandu.jpg'),
(2, '002/POS/2023', 'Posyandu Dahlia 2', '083141025824', 'posyandudahlia2@gmail.com', 'Jl Syekh Abdullah Al-hindi ', 'Lokgabang', 'Astanbul', 'Banjar', 'dda96-posyandu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ttd`
--

CREATE TABLE `ttd` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `tanda_tangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ttd`
--

INSERT INTO `ttd` (`id`, `nama`, `nip`, `jabatan`, `tanda_tangan`) VALUES
(1, 'Rahma Ahyina, A.Md.Keb.', '1234567890', 'Pimpinan', '7248d-ttd.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayi`
--
ALTER TABLE `bayi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_penimbangan`
--
ALTER TABLE `hasil_penimbangan`
  ADD PRIMARY KEY (`id_`);

--
-- Indexes for table `ibu_hamil`
--
ALTER TABLE `ibu_hamil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imunisasi`
--
ALTER TABLE `imunisasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_bayi` (`nama_bayi`),
  ADD KEY `jadwal_imunisasi` (`jadwal_imunisasi`),
  ADD KEY `jenis_imunisasi` (`jenis_imunisasi`),
  ADD KEY `dosis` (`dosis`);

--
-- Indexes for table `jadwal_imunisasi`
--
ALTER TABLE `jadwal_imunisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_pemeriksaan`
--
ALTER TABLE `jadwal_pemeriksaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_penimbangan`
--
ALTER TABLE `jadwal_penimbangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_imunisasi`
--
ALTER TABLE `jenis_imunisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penimbangan`
--
ALTER TABLE `penimbangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posyandu`
--
ALTER TABLE `posyandu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ttd`
--
ALTER TABLE `ttd`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayi`
--
ALTER TABLE `bayi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hasil_penimbangan`
--
ALTER TABLE `hasil_penimbangan`
  MODIFY `id_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ibu_hamil`
--
ALTER TABLE `ibu_hamil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `imunisasi`
--
ALTER TABLE `imunisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `jadwal_imunisasi`
--
ALTER TABLE `jadwal_imunisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `jadwal_pemeriksaan`
--
ALTER TABLE `jadwal_pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `jadwal_penimbangan`
--
ALTER TABLE `jadwal_penimbangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `jenis_imunisasi`
--
ALTER TABLE `jenis_imunisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kuesioner`
--
ALTER TABLE `kuesioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `penimbangan`
--
ALTER TABLE `penimbangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `posyandu`
--
ALTER TABLE `posyandu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ttd`
--
ALTER TABLE `ttd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `imunisasi`
--
ALTER TABLE `imunisasi`
  ADD CONSTRAINT `imunisasi_ibfk_1` FOREIGN KEY (`id`) REFERENCES `bayi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
