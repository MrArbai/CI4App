-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2019 at 03:12 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogdesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `kode_komentar` int(10) NOT NULL,
  `kode_konten` int(10) NOT NULL,
  `nama_pengirim` varchar(100) NOT NULL,
  `komentar` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `tgl_posting` varchar(15) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_komentar`
--

INSERT INTO `tbl_komentar` (`kode_komentar`, `kode_konten`, `nama_pengirim`, `komentar`, `email`, `tgl_posting`, `status`) VALUES
(2, 1, 'Suma Wijaya', '<p>Oeh karenanya mayoritas masyarakat Desa Badean adalah pendatang.</p>', 'gedelumbung@gmail.com', ' 17-05-2011', '1'),
(3, 2, 'Gede Lumbung', 'Potensi yang ada baik sumber daya alam maupun sumber daya manusianya perlu terus digali dan dikembangkan untuk kemakmuran masyrakat secara umum.', 'gedelumbung@gmail.com', ' 19-05-2011', '1'),
(4, 2, 'Suma Wijaya', 'Halo..\nTes komen dulu achh...', 'gede@gmail.com', ' 19-05-2011', '1'),
(5, 3, 'Gede Lumbung', '<p>Plengkung atau yang dikenal oleh wisatawan mancanegara dengan nama G-Land merupakan surga bagi para peselancar profesional</p>', 'gedelumbung@gmail.com', ' 19-05-2011', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konten`
--

CREATE TABLE `tbl_konten` (
  `kode_konten` int(10) NOT NULL,
  `kode_wilayah` varchar(10) NOT NULL,
  `kode_sitemap` varchar(10) NOT NULL,
  `kode_user` varchar(10) NOT NULL,
  `judul_konten` varchar(150) NOT NULL,
  `isi_konten` text NOT NULL,
  `tgl_posting` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_konten`
--

INSERT INTO `tbl_konten` (`kode_konten`, `kode_wilayah`, `kode_sitemap`, `kode_user`, `judul_konten`, `isi_konten`, `tgl_posting`) VALUES
(1, 'des0001', 'pm02_02', 'ades001', 'Sejarah Desa/Kelurahan Badean', 'Sejarah Desa Badean pada mulanya jadi satu dengan desa yang berseblahan, yaitu Desa Karang Bendo dengan nama ENGGALBADE, yang berarti ENGGAL artinya baru, dan BADE berarti akan. Pada perkembangannya Desa Enggalbade dipecah menjadi dua Desa, yaitu Desa KarangBendo yang masuk dalam wilayah Kecamatan Rogojampi dan Desa Badean masuk dalam wilayah Kecamatan Kabat. Karna pada waktu itu yang ada hanya wilayah kerajan, maka nama Badean dijadikan nama untuk Desa Badean.\r\n\r\nPada mulanya wilayah Desa Badean adalah wilayah hutan, oleh karenanya mayoritas masyarakat Desa Badean adalah Pendatang. Sebagian dari Tuban, yaitu Mbah Yahya yang sekaligus adalah penyebar agama Islam pertama di Desa Badean. Ada juga yang dari Daerah Kediri dan Sidoarjo. Sementara kapan tahun berdirinya Desa Badean Belum dapat diketahui.', '17/05/2011'),
(2, 'des0001', 'pm02', 'ades001', 'Profil Desa/Kelurahan Badean', '<p>2.1.2 Geografis Desa  Desa Badean secara geografis terletak di  dataran rendah berjarak &Acirc;&plusmn; 3 Km arah Barat Daya dari pusat kecamatan dan  memiliki potensi yang cukup strategis dengan luas wilayah 279.270 Ha  yang terbagi menjadi 4 Dusun, yakni: Dusun Krajan, Dusun Donosuko, Dusun  Cungkingan, dan Dusun Jatisari dengan perbatasan wilayah sebagai  berikut :  Utara      : Berbatasan dengan Desa Sukojati dan Desa  Pakistaji    Kecamatan   Kabatondan  Barat      : Berbatasan dengan Desa  Karang Bendo Kecamatan Rogojampi  Selatan   : Berbatasan dengan Desa  Blimbingsari  Kecamatan Rogojampi  Timur     : Berbatasan dengan Pantai  Selat BalitaGedangan  Desa Badean Kecamatan Kabat memiliki jumlah  penduduk &Acirc;&plusmn; 6.956 jiwa yang terdiri dari 3.491 jiwa penduduk laki-laki  dan 3.465 jiwa perempuan. Potensi Desa Badean cukup besar, baik potensi  yang sudah dimanfaatkan maupun yang belum dimanfaatkan secara maksimal.  Potensi yang ada baik sumber daya alam maupun sumber daya manusianya  perlu terus digali dan dikembangkan untuk kemakmuran masyrakat secara  umum.</p>', '17/05/2011'),
(3, 'kec09', 'pm03_01_01', 'ades001', 'Pengurus Karang Karuna Desa Badean', '<p>1. RUSLAN EFENDI - Ketua <br />2. ANTON ALMUQSITH, SH - Wakil Ketua <br />3. IBNU MUBAROK - Wakil Ketua <br />4. ROSULIK, SE - Sekretaris <br />5. DARUSSALAM - Wakil Sekretaris <br />6. M. SAUQI, ST - Bendahara <br />7. LIMASY RIFAH - Wakil Bendahara <br />8. WAHIDNI - Bidang Usaha- Usaha Kesejahteraan Sosial <br />9. AL- AMIN - Bidang Usaha- Usaha Kesejahteraan Sosial <br />10. M. ROTIB - Bidang Usaha- Usaha Kesejahteraan Sosial <br />11. ABD. MALIK - Bidang Seni Budaya dan Pariwisata <br />12. M. SUKRON - Bidang Seni Budaya dan Pariwisata <br />13. M. ALFIAN - Bidang Seni Budaya dan Pariwisata <br />14. AH. KATGAN - Bidang Pengembangan Kelompok Usaha Bersama (KUBE)</p>', '17/05/2011');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_media`
--

CREATE TABLE `tbl_media` (
  `kode_media` int(10) NOT NULL,
  `kode_wilayah` varchar(10) NOT NULL,
  `judul_file` varchar(200) NOT NULL,
  `nama_file` varchar(150) NOT NULL,
  `tipe_file` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_media`
--

INSERT INTO `tbl_media` (`kode_media`, `kode_wilayah`, `judul_file`, `nama_file`, `tipe_file`) VALUES
(5, 'kec09', 'Penyembelihan Hewan Kurban Idul Adha 20100', 'media/image/imgthumb/panitia-wisuda.jpg', 'image');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_per_daerah`
--

CREATE TABLE `tbl_menu_per_daerah` (
  `kode_wilayah` varchar(10) NOT NULL,
  `kode_sitemap` varchar(10) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_per_daerah`
--

INSERT INTO `tbl_menu_per_daerah` (`kode_wilayah`, `kode_sitemap`, `status`) VALUES
('kab01', 'pm03_02_05', '1'),
('kab01', 'pm03_02_04', '1'),
('kab01', 'pm03_02_03', '1'),
('kab01', 'pm03_02_02', '1'),
('kab01', 'pm03_02_01', '1'),
('kab01', 'pm03_02', '1'),
('kab01', 'pm03_01_12', '1'),
('kab01', 'pm03_01_11', '1'),
('kab01', 'pm03_01_10', '1'),
('kab01', 'pm03_01_09', '1'),
('kab01', 'pm03_01_08', '1'),
('kab01', 'pm03_01_07', '1'),
('kab01', 'pm03_01_06', '1'),
('kec09', 'pm03_03_05', '1'),
('kec09', 'pm03_03', '1'),
('kec09', 'pm03_02', '1'),
('kec09', 'pm03_01', '1'),
('kec09', 'pm03', '1'),
('kec09', 'pm02_04', '1'),
('kec09', 'pm02_03', '1'),
('kec09', 'pm02_02', '1'),
('kec14', 'pm04', '1'),
('kec14', 'pm04_06', '1'),
('kab01', 'pm03_01_05', '1'),
('kab01', 'pm03_01_04', '1'),
('kab01', 'pm03_01_03', '1'),
('kab01', 'pm03_01_02', '1'),
('kab01', 'pm03_01_01', '1'),
('kec06', 'pm04_08', '1'),
('kec06', 'pm04_07', '1'),
('kec06', 'pm04_06', '1'),
('kec06', 'pm04', '1'),
('kec06', 'pm03_04_11', '1'),
('kec06', 'pm03_04_10', '1'),
('kec06', 'pm03_04_09', '1'),
('kec06', 'pm03_04', '1'),
('kec06', 'pm03_03_04', '1'),
('kec06', 'pm03_03_03', '1'),
('kec06', 'pm03_03_02', '1'),
('kec06', 'pm03_03', '1'),
('kec06', 'pm03_02_08', '1'),
('kec06', 'pm03_02_07', '1'),
('kec06', 'pm03_02_06', '1'),
('kec06', 'pm03_02', '1'),
('kec06', 'pm03_01_11', '1'),
('kec06', 'pm03_01_10', '1'),
('kec06', 'pm03_01_02', '1'),
('kec06', 'pm03_01_01', '1'),
('kec06', 'pm03_01', '1'),
('kec06', 'pm03', '1'),
('kec06', 'pm02_03', '1'),
('kec06', 'pm02_02', '1'),
('kec06', 'pm02_01', '1'),
('kec06', 'pm02', '1'),
('kec06', 'pm01', '1'),
('kab01', 'pm03_01', '1'),
('kab01', 'pm03', '1'),
('kab01', 'pm02_07', '1'),
('kab01', 'pm02_06', '1'),
('kab01', 'pm02_05', '1'),
('kab01', 'pm02_04', '1'),
('kab01', 'pm02_03', '1'),
('kab01', 'pm02_02', '1'),
('kab01', 'pm02_01', '1'),
('kab01', 'pm02', '1'),
('kab01', 'pm01', '1'),
('kec09', 'pm02_01', '1'),
('kec09', 'pm02', '1'),
('kec12', 'pm03', '1'),
('kec12', 'pm03_01', '1'),
('kec12', 'pm03_02', '1'),
('kec12', 'pm03_02_01', '1'),
('kab01', 'pm03_02_06', '1'),
('kec09', 'pm04_09', '1'),
('des0002', 'pm04', '1'),
('des0002', 'pm02', '1'),
('des0002', 'pm01', '1'),
('kec09', 'pm04_08', '1'),
('kec09', 'pm04_02', '1'),
('kec09', 'pm04_01', '1'),
('kec09', 'pm04', '1'),
('kec09', 'pm03_03_09', '1'),
('kec09', 'pm03_03_08', '1'),
('kec09', 'pm03_03_07', '1'),
('kec09', 'pm03_03_06', '1'),
('kec14', 'pm03', '1'),
('kec09', 'pm01', '1'),
('', '', '1'),
('', '', '1'),
('des0001', 'pm04', '1'),
('des0001', 'pm03', '1'),
('des0001', 'pm02', '1'),
('des0001', 'pm01', '1'),
('kab01', 'pm03_02_07', '1'),
('kab01', 'pm03_02_08', '1'),
('kab01', 'pm03_02_09', '1'),
('kab01', 'pm03_03', '1'),
('kab01', 'pm03_03_01', '1'),
('kab01', 'pm03_03_02', '1'),
('kab01', 'pm03_03_03', '1'),
('kab01', 'pm03_03_04', '1'),
('kab01', 'pm03_03_05', '1'),
('kab01', 'pm03_03_06', '1'),
('kab01', 'pm03_03_07', '1'),
('kab01', 'pm03_03_08', '1'),
('kab01', 'pm03_03_09', '1'),
('kab01', 'pm03_04', '1'),
('kab01', 'pm03_04_01', '1'),
('kab01', 'pm03_04_02', '1'),
('kab01', 'pm03_04_03', '1'),
('kab01', 'pm03_04_04', '1'),
('kab01', 'pm03_04_05', '1'),
('kab01', 'pm03_04_06', '1'),
('kab01', 'pm03_04_07', '1'),
('kab01', 'pm03_04_08', '1'),
('kab01', 'pm03_04_09', '1'),
('kab01', 'pm03_04_10', '1'),
('kab01', 'pm03_04_11', '1'),
('kab01', 'pm03_04_12', '1'),
('kab01', 'pm03_04_13', '1'),
('kab01', 'pm04', '1'),
('kab01', 'pm04_01', '1'),
('kab01', 'pm04_02', '1'),
('kab01', 'pm04_03', '1'),
('kab01', 'pm04_04', '1'),
('kab01', 'pm04_05', '1'),
('kab01', 'pm04_06', '1'),
('kab01', 'pm04_07', '1'),
('kab01', 'pm04_08', '1'),
('kab01', 'pm04_09', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `kode_setting` int(10) NOT NULL,
  `isi_setting` text NOT NULL,
  `tipe_setting` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`kode_setting`, `isi_setting`, `tipe_setting`) VALUES
(1, '192', 'counter');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sitemap`
--

CREATE TABLE `tbl_sitemap` (
  `kode_sitemap` varchar(10) NOT NULL,
  `parent` varchar(10) NOT NULL,
  `judul_sitemap` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sitemap`
--

INSERT INTO `tbl_sitemap` (`kode_sitemap`, `parent`, `judul_sitemap`) VALUES
('pm01', 'induk', 'Informasi'),
('pm02', 'induk', 'Profil Daerah'),
('pm03', 'induk', 'Sumber Daya'),
('pm04', 'induk', 'Tingkat Perkembangan'),
('pm02_01', 'pm02', 'Peta Wilayah'),
('pm02_02', 'pm02', 'Sejarah Daerah'),
('pm02_03', 'pm02', 'Obyek Wisata'),
('pm02_04', 'pm02', 'Seni Budaya dan Olahraga'),
('pm02_05', 'pm02', 'Struktur Organisasi Daerah'),
('pm02_06', 'pm02', 'Visi dan Misi'),
('pm02_07', 'pm02', 'Peraturan Daerah'),
('pm03_01', 'pm03', 'Sumber Daya Alam'),
('pm03_02', 'pm03', 'Sumber Daya Manusia'),
('pm03_03', 'pm03', 'Sumber Daya Kelembagaan'),
('pm03_04', 'pm03', 'Prasarana dan Sarana'),
('pm03_01_01', 'pm03_01', 'Potensi Umum'),
('pm03_01_02', 'pm03_01', 'Kualitas Lingkungan'),
('pm03_01_03', 'pm03_01', 'Ruang Publik'),
('pm03_01_04', 'pm03_01', 'Wisata'),
('pm03_01_05', 'pm03_01', 'Orbitasi'),
('pm03_01_06', 'pm03_01', 'Pertanian'),
('pm03_01_07', 'pm03_01', 'Perkebunan'),
('pm03_01_08', 'pm03_01', 'Kehutanan'),
('pm03_01_09', 'pm03_01', 'Peternakan'),
('pm03_01_10', 'pm03_01', 'Perikanan'),
('pm03_01_11', 'pm03_01', 'Bahan Galian'),
('pm03_01_12', 'pm03_01', 'Sumber Daya Air'),
('pm03_02_01', 'pm03_02', 'Jumlah'),
('pm03_02_02', 'pm03_02', 'Usia'),
('pm03_02_03', 'pm03_02', 'Pendidikan'),
('pm03_02_04', 'pm03_02', 'Mata Pencaharian'),
('pm03_02_05', 'pm03_02', 'Agama dan Kepercayaan'),
('pm03_02_06', 'pm03_02', 'Kewarganegaraan'),
('pm03_02_07', 'pm03_02', 'Etnis/Suku Bangsa'),
('pm03_02_08', 'pm03_02', 'Cacat Fisik dan Mental'),
('pm03_02_09', 'pm03_02', 'Tenaga Kerja'),
('pm03_03_01', 'pm03_03', 'Lembaga Pemerintahan'),
('pm03_03_02', 'pm03_03', 'Lembaga Kemasyarakatan'),
('pm03_03_03', 'pm03_03', 'Lembaga Sosial Kemsyarakatan'),
('pm03_03_04', 'pm03_03', 'Organisasi Profesi'),
('pm03_03_05', 'pm03_03', 'Partai Politik'),
('pm03_03_06', 'pm03_03', 'Lembaga Perekonomian'),
('pm03_03_07', 'pm03_03', 'Lembaga Pendidikan'),
('pm03_03_08', 'pm03_03', 'Lembaga Adat'),
('pm03_03_09', 'pm03_03', 'Lembaga Keamanan dan Ketertiban'),
('pm03_04_01', 'pm03_04', 'Transportasi'),
('pm03_04_02', 'pm03_04', 'Pendidikan'),
('pm03_04_03', 'pm03_04', 'Energi dan Penerangan'),
('pm03_04_04', 'pm03_04', 'Hiburan dan Wisata'),
('pm03_04_05', 'pm03_04', 'Kebersihan'),
('pm03_04_06', 'pm03_04', 'Informasi dan Komunikasi'),
('pm03_04_07', 'pm03_04', 'Air Bersih dan Sanitasi'),
('pm03_04_08', 'pm03_04', 'Kondisi Irigasi'),
('pm03_04_09', 'pm03_04', 'Pemerintahan'),
('pm03_04_10', 'pm03_04', 'Lembaga Kemasyarakatan'),
('pm03_04_11', 'pm03_04', 'Peribadatan'),
('pm03_04_12', 'pm03_04', 'Olah Raga'),
('pm03_04_13', 'pm03_04', 'Kesehatan'),
('pm04_01', 'pm04', 'Ekonomi Masyarakat'),
('pm04_02', 'pm04', 'Pendidikan Masyarakat'),
('pm04_03', 'pm04', 'Kesehatan'),
('pm04_04', 'pm04', 'Keamanan dan Ketertiban'),
('pm04_05', 'pm04', 'Kedaulatan Politik Masyarakat'),
('pm04_06', 'pm04', 'Peran Masyarakat Dalam Pembangunan'),
('pm04_07', 'pm04', 'Lembaga Kemasyarakatan'),
('pm04_08', 'pm04', 'Kinerja Pemerintahan'),
('pm04_09', 'pm04', 'Pembinaan dan Pengawasan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `kode_user` varchar(10) NOT NULL,
  `kode_wilayah` varchar(10) NOT NULL,
  `nama_user` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`kode_user`, `kode_wilayah`, `nama_user`, `username`, `password`) VALUES
('ades001', 'des0001', 'Gede Lumbung', 'admindesabadean', '09ed14f6f2d7b3222487a6d2b9dee0d4'),
('akec09', 'kec09', 'Gede Lumbung', 'adminkecamatankabat', '4983ed581a1bbff8f9e30e295a854402'),
('sua01', 'kab01', 'Gede Lumbung', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
('ades002', 'des0002', 'Gede Suma Wijaya', 'admindesabareng', '640d572be48b0f3e2c570199aa1c892b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wilayah`
--

CREATE TABLE `tbl_wilayah` (
  `kode_wilayah` varchar(10) NOT NULL,
  `parent` varchar(10) NOT NULL,
  `nama_wilayah` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wilayah`
--

INSERT INTO `tbl_wilayah` (`kode_wilayah`, `parent`, `nama_wilayah`) VALUES
('kab01', 'induk', 'Kab. Banyuwangi'),
('kec01', 'kab01', 'Bangorejo'),
('kec02', 'kab01', 'Banyuwangi'),
('kec03', 'kab01', 'Cluring'),
('kec04', 'kab01', 'Gambiran'),
('kec05', 'kab01', 'Genteng'),
('kec06', 'kab01', 'Giri'),
('kec07', 'kab01', 'Glagah'),
('kec08', 'kab01', 'Glenmore'),
('kec09', 'kab01', 'Kabat'),
('kec10', 'kab01', 'Kalibaru'),
('kec11', 'kab01', 'Kalipuro'),
('kec12', 'kab01', 'Licin'),
('kec13', 'kab01', 'Muncar'),
('kec14', 'kab01', 'Pesanggaran'),
('kec15', 'kab01', 'Purwoharjo'),
('kec16', 'kab01', 'Rogojampi'),
('kec17', 'kab01', 'Sempu'),
('kec18', 'kab01', 'Siliragung'),
('kec19', 'kab01', 'Singojuruh'),
('kec20', 'kab01', 'Songgon'),
('kec21', 'kab01', 'Srono'),
('kec22', 'kab01', 'Tegaldlimo'),
('kec23', 'kab01', 'Tegalsari'),
('kec24', 'kab01', 'Wongsorejo'),
('des0001', 'kec09', 'Badean'),
('des0002', 'kec09', 'Bareng'),
('des0003', 'kec09', 'Benelan Lor'),
('des0004', 'kec09', 'Bunder'),
('des0005', 'kec09', 'Dadapan'),
('des0006', 'kec09', 'Gombolirang'),
('des0007', 'kec09', 'Kabat'),
('des0008', 'kec09', 'Kalirejo'),
('des0009', 'kec09', 'Kedayunan'),
('des0010', 'kec09', 'Labanasem'),
('des0011', 'kec09', 'Macan Putih'),
('des0012', 'kec09', 'Pakistaji'),
('des0013', 'kec09', 'Pendarungan'),
('des0014', 'kec09', 'Pondoknongko'),
('des0015', 'kec09', 'Sukotaji'),
('des0016', 'kec09', 'Tambong');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`kode_komentar`);

--
-- Indexes for table `tbl_konten`
--
ALTER TABLE `tbl_konten`
  ADD PRIMARY KEY (`kode_konten`);

--
-- Indexes for table `tbl_media`
--
ALTER TABLE `tbl_media`
  ADD PRIMARY KEY (`kode_media`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`kode_setting`);

--
-- Indexes for table `tbl_sitemap`
--
ALTER TABLE `tbl_sitemap`
  ADD PRIMARY KEY (`kode_sitemap`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`kode_user`);

--
-- Indexes for table `tbl_wilayah`
--
ALTER TABLE `tbl_wilayah`
  ADD PRIMARY KEY (`kode_wilayah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  MODIFY `kode_komentar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_konten`
--
ALTER TABLE `tbl_konten`
  MODIFY `kode_konten` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_media`
--
ALTER TABLE `tbl_media`
  MODIFY `kode_media` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `kode_setting` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
