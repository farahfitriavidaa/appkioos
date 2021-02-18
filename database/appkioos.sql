-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 08:55 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appkioos`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `idakun` varchar(10) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `namalengkap` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `notelp` varchar(15) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `level` enum('admin','konsumen') DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`idakun`, `username`, `password`, `namalengkap`, `email`, `notelp`, `foto`, `level`, `status`) VALUES
('US0001', 'tester', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('US0002', 'admin', '3c5b2205777610707417f94ac92099eb', 'Farah Fitriavida A', 'admin@gmail.com', '085871659195', 'user.png', 'admin', 'aktif'),
('US0003', 'farahfitriavidaa', '3c5b2205777610707417f94ac92099eb', 'Farah Fitriavida A', 'farahfitriavidaa@gmail.com', '085871659195', 'user.png', 'konsumen', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `idbanner` varchar(10) NOT NULL,
  `judulbanner` varchar(255) DEFAULT NULL,
  `fotobanner` varchar(255) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`idbanner`, `judulbanner`, `fotobanner`, `keterangan`) VALUES
('BN0001', 'Mari Jaga Kesehatan Kita', 'a286ed8cadb4523b7942ea5d29d6dabb.jpeg', 'Vitamin sangat penting di masa pandemi Covid-19 untuk menjaga kualitas imun kita, yuk kita belanja perlengkapan imun KIOOS ??'),
('BN0002', 'Banner 1', '768e3fb05237b0e6ef714e6bab56cc5a.png', 'banner kioos'),
('BN0003', 'FREE DELIVERY', '13f651338432a1d28f825d18e768d688.png', 'gratis ongkir KIOOS');

-- --------------------------------------------------------

--
-- Table structure for table `detailtransaksi`
--

CREATE TABLE `detailtransaksi` (
  `iddetailtransaksi` varchar(10) NOT NULL,
  `idtransaksi` varchar(10) DEFAULT NULL,
  `idproduk` varchar(10) DEFAULT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailtransaksi`
--

INSERT INTO `detailtransaksi` (`iddetailtransaksi`, `idtransaksi`, `idproduk`, `jumlah_barang`, `total_harga`) VALUES
('DT0001', 'TR0006', 'PD0003', 3, 900000),
('DT0002', 'TR0006', 'PD0007', 1, 1680000),
('DT0003', 'TR0006', 'PD0006', 2, 240000);

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `iddiskon` varchar(10) NOT NULL,
  `namadiskon` varchar(100) DEFAULT NULL,
  `kodediskon` varchar(50) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `persen` int(11) DEFAULT NULL,
  `status` enum('aktif','nonaktif','','') NOT NULL,
  `tipe` enum('nominal','persen') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`iddiskon`, `namadiskon`, `kodediskon`, `nominal`, `persen`, `status`, `tipe`) VALUES
('ID0001', 'GRATISONGKIR', 'GOKIOOS', 11000, NULL, 'aktif', 'nominal'),
('ID0002', 'VITAMIN SEHAT', 'VOUCHERVIT', NULL, 5, 'aktif', 'persen');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriproduk`
--

CREATE TABLE `kategoriproduk` (
  `idkategoriproduk` varchar(10) NOT NULL,
  `judulkategori` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `fotokategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategoriproduk`
--

INSERT INTO `kategoriproduk` (`idkategoriproduk`, `judulkategori`, `keterangan`, `fotokategori`) VALUES
('KP0001', 'Test Rapid', 'macam-macam alat test corona virus disease-19 seperti swab test, saliva, dll', '2f24854becb7fa718e996d6571835c08.jpg'),
('KP0002', 'Obat-obatan', 'macam-macam obat-obatan yang sudah terjamin perizinan kemenkes', '3923de0f3d7692a7c7a01758c33be0dd.jpg'),
('KP0003', 'Alat Kesehatan', 'macam-macam alat kesehatan ', '0d4440ee6aeb138510d41d03c81c8c77.jpg'),
('KP0004', 'Vitamin', 'macam-macam vitamin bagi kesehatan', '89284117f6f6e5cb5165bf337499a064.jpg'),
('KP0005', 'Buah-buahan', 'macam-macam buah segar yang sudah teruji kualitasnya', '6b202f512feeda47501cb965ec87948f.jpg'),
('KP0006', 'Makanan sehat', 'macam-macam makanan sehat 4sehat 5sempurna', 'b312a55e8554017e1f221716c8847b94.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `idkeranjang` varchar(10) NOT NULL,
  `idakun` varchar(10) DEFAULT NULL,
  `idproduk` varchar(10) DEFAULT NULL,
  `jumlah_barang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`idkeranjang`, `idakun`, `idproduk`, `jumlah_barang`) VALUES
('K0001', 'US0003', 'PD0003', 3),
('K0002', 'US0003', 'PD0007', 1),
('K0003', 'US0003', 'PD0006', 2),
('K0004', 'US0003', 'PD0003', 1),
('K0005', 'US0003', 'PD0007', 1),
('K0006', 'US0003', 'PD0004', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kritik`
--

CREATE TABLE `kritik` (
  `namalengkap` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pesan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kritik`
--

INSERT INTO `kritik` (`namalengkap`, `email`, `pesan`) VALUES
(NULL, NULL, NULL),
('Farah Fitriavida A', 'farahfitriavidaa@gmail.com', 'seharusnya bla blabla'),
('Farah Fitriavida A', 'farahfitriavidaa@gmail.com', 'iniii');

-- --------------------------------------------------------

--
-- Table structure for table `langganan`
--

CREATE TABLE `langganan` (
  `idlangganan` varchar(10) NOT NULL,
  `inputan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `langganan`
--

INSERT INTO `langganan` (`idlangganan`, `inputan`) VALUES
('LG0001', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idproduk` varchar(10) NOT NULL,
  `idkategoriproduk` varchar(10) DEFAULT NULL,
  `judulproduk` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `fotoproduk` varchar(100) DEFAULT NULL,
  `hargaproduk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idproduk`, `idkategoriproduk`, `judulproduk`, `keterangan`, `fotoproduk`, `hargaproduk`) VALUES
('PD0001', 'KP0001', 'Biocredit COVID-19 AG', 'macam-macam alat test corona virus disease-19 seperti swab test, saliva, dll', 'cd19a92eb5b90679c94f8fd8c78c1f83.jpeg', 2600000),
('PD0002', 'KP0004', 'Nature\'s Way Kid Calcium + D3', 'Nature\'s Way Kids Smart Calcium + Vitamin D3 membantu:\r\nMendukung pertumbuhan dan perkembangan yang sehat\r\nMembantu perkembangan dan pertumbuhan tulang yang sehat\r\nMendukung kesehatan sistem saraf\r\n\r\nPola makan yang seimbang dan asupan vitamin dan mineral yang cukup dari makanan, sangat penting bagi anak.\r\n\r\nBahan\r\nBentuk sediaan: Kapsul, lembut\r\n\r\nJumlah: 50 kapsul lunak\r\n\r\nBahan aktif per kapsul lunak:\r\nKalsium hidrogen fosfat 678 mg\r\n- Equiv. kalsium 200 mg\r\n- Equiv. fosfor 154 mg\r\nColecalciferol (vitamin D3) 7,5 mikrogram (300 IU)\r\n\r\nMengandung gluten, sulfites, soya bean products dan sucralose ..\r\n\r\nSimpan di bawah 25C\r\n', '653d7241f60f530bb110928c19271550.jpeg', 260000),
('PD0003', 'KP0004', 'Nature\'s Way Kid C + Zinc', 'Kids Smart Vitamin C + Zinc + D3 mendukung fungsi sistem kekebalan anak Anda untuk melawan penyakit dan\r\n\r\nmenjaga kesehatan dan kesejahteraan umum.\r\n\r\nDiformulasikan khusus dengan 3 nutrisi utama untuk mendukung sistem kekebalan tubuh, mata, tulang, kulit\r\n\r\ndan kesejahteraan umum. Vitamin C - antioksidan kuat itu\r\n\r\nmendukung fungsi kekebalan dan penyerapan zat besi. Seng - penunjang mineral penting\r\n\r\nfungsi mata yang sehat, penglihatan, penglihatan dan sistem imun yang sehat. Vitamin D - tulang yang sehat\r\n\r\nnutrisi pendukung bangunan yang juga menjaga fungsi kekebalan tubuh.\r\n\r\nBahan\r\n\r\nSetiap tablet kunyah mengandung: Ascorbic Acid (Vitamin C) 250mg Zinc (sebagai amino acid chelate) 3mg Colecalciferol 2,5 mikrogram setara, dengan Vitamin D3 100IU\r\n\r\nPetunjuk arah\r\n\r\nAnak 2-8 tahun: Kunyah 1 tablet kunyah sehari (jangan telan utuh).\r\n\r\nAnak-anak 9+ tahun: Kunyah 2 tablet kunyah sehari (jangan telan utuh).', '1e2e802211f9f85c0e3beeeaade55b7c.jpg', 300000),
('PD0004', 'KP0004', 'Nature\'s Way Kid VitaGummies Vitamin C', 'Nature\'s Way Kids Smart Vita Gummies Vitamin C + Zinc adalah pastille kunyah rasa jeruk yang lezat (gummie).\r\nNature\'s Way Kids Smart Vita Gummies Vitamin C + Zinc telah dirancang untuk anak-anak sehingga mereka ingin meminumnya. Setiap pastil yang dapat dikunyah memiliki rasa jeruk yang enak.\r\n\r\nPola makan yang seimbang dan asupan vitamin dan mineral yang cukup dari makanan, sangat penting bagi anak.\r\n\r\nBahan\r\n\r\nBentuk sediaan: Pastille\r\n\r\nJumlah: 60 pastilles\r\n\r\nBahan aktif per pastil:\r\nAsam askorbat (vitamin C) 30 mg\r\nSeng sulfat heptahidrat 11,11 mg\r\n- Equiv. seng 2,5 mg\r\n\r\nBerisi total gula 1200mg per kue.\r\n\r\nMengandung gluten, sulfites, dan gula.\r\n\r\nPetunjuk arah\r\n\r\nAnak-anak 2+ tahun: 2 pastiles (permen karet) per hari dengan makanan, atau seperti yang disarankan oleh ahli kesehatan Anda.\r\n\r\nJika gejala berlanjut, bicarakan dengan profesional kesehatan Anda. Suplemen vitamin sebaiknya tidak menggantikan diet seimbang.', 'e9731b64035ce9d0324bb08d87be3342.jpeg', 225000),
('PD0005', 'KP0004', 'Blackmores Koala Kids Body Shield', 'Mengandung vitamin dan mineral untuk membantu memelihara kesehatan anak dengan rasa jeruk dan pemanis alami xylitol\r\n\r\nIngredients:\r\nVit A\r\nVit C\r\nVit D3\r\nVit E\r\nZinc', 'd2ecf16a3d90531f8d9f88fb8ae3f229.jpg', 194500),
('PD0006', 'KP0004', 'Blackmores Multivitamin + Mineral', 'Mengandung vitamin dan mineral yang penting untuk membantu memelihara kesehatan\r\n\r\nKomposisi:\r\nVitamin A 5000 IU (500 RE)\r\nVitamin B1 (6.1 mg)\r\nVitamin B2 (8.5 mg)\r\nVitamin B3 (60 mg)\r\nVitamin B5 (20 mg)\r\nVitamin B6 (8 mg)\r\nAsam Folat (200 µg)\r\nVitamin B12 (10 µg)\r\nVitamin C (180 mg)\r\nVitamin D3 400 IU (10 µg)\r\nVitamin E 20 IU (13.4 mg)\r\nBiotin (25 µg)\r\nKolin (10.3 mg)\r\nInositol (25 mg)\r\nKalsium (40 mg)\r\nBesi (5 mg)\r\nMagnesium (17.5 mg)\r\nMangan (2 mg)\r\nKalium (25 mg)\r\nZinc (5 mg)\r\n\r\n\r\nBPOM Numbers: POM SI 164 507 181', '9787ac994506624783da751bd485ade6.jpg', 120000),
('PD0007', 'KP0001', 'SALIVA Rapid Test Antigen', 'Harga di atas adalah harga 1 BOX isi 20 Set\r\n\r\n1 BOX terdiri dari :\r\n20 pcs kit cassette penguji\r\n20 btl berisi cairan\r\n20 corong ludah\r\n20 pcs pipet\r\n\r\nUntuk mendeteksi ada tidaknya virus yang masuk ke dalam tubuh. Akurat 98,82% tidak perlu menunggu lama dan hasil sudah dapat terdeteksi (Hanya butuh 15 menit!).\r\n\r\n\r\nCara Penggunaan :\r\n1) Letakkan lidah Anda di rahang atas dan tundukkan kepala Anda agar air liur keluar secara alami ke dalam Gelas Plastic Cup sekali pakai.\r\n2) Gunakan Pipet untuk memindahkan 0,5~1 mL air liur dari Plastic Cup ke Tabung Reaksi.\r\n3) Buka Cairan buffer dan Tuangkan semua Cairan Buffer ke dalam Tabung Reaksi yang sudah terdapat sampel air liur.\r\n4) Kocok Tabung Reaksi dengan cara diputar searah jarum jam atau sebaliknya hingga merata, dan Pertahankan sampel air liur tetap di dalam tabung reaksi selama 1 menit.\r\n5) Setelah 1 menit, kocok Tabung Reaksi sekali lagi.\r\n6) Buka kemasan sachet yang berisi papan uji (Test Casette).\r\n7) Sedot cairan sampel air liur yang telah dikocok menggunakan Pipet (Sedotan Jarum).\r\n8) Teteskan 3 kali pada Test Cassete.\r\n9) Menunggu hasil akhir sekitar 10-15 menit. (Lewat 15 menit hasil tidak valid!)\r\n\r\n\r\nCara Baca Hasil:\r\nGaris 1 = Negatif\r\nGaris 2 = Positif\r\nBlank / Tidak ada Garis = Invalid\r\n\r\nCocok untuk orang awam yang ingin mengetahui hasil Test sendiri dan takut menggunakan Swab test, mudah untuk dipakai.\r\nCocok untuk orang yang sering bepergian ke tempat umum atau keramaian.\r\nCocok untuk orang yang sering bepergian menggunakan Transportasi Umum seperti Pesawat Terbang dan Kapal Penyeberangan.\r\nsangat mudah digunakan tanpa harus ditusuk hidungnya atau tenggorokannya.\r\n\r\nCukup menggunakan air liur, sangat simple dan mudah, Aman ditest untuk anak-anak.\r\n\r\n\r\nProduk 100% original\r\nProduk resmi sudah terdaftar AKL\r\nKemenkes RI AKL 20303027393\r\nYang diimport oleh PT Bintang Cemerlang', '7f5293d63855b7f1ac0a2af423a430ae.jpeg', 1680000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` varchar(10) NOT NULL,
  `idakun` varchar(10) DEFAULT NULL,
  `jumlahproduk` int(11) NOT NULL,
  `totalharga` int(11) DEFAULT NULL,
  `kodediskon` varchar(100) DEFAULT NULL,
  `tanggaltransaksi` datetime DEFAULT NULL,
  `status` enum('pending','proses','terkirim') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `idakun`, `jumlahproduk`, `totalharga`, `kodediskon`, `tanggaltransaksi`, `status`) VALUES
('TR0001', 'US0003', 0, 902000, '', '0000-00-00 00:00:00', 'pending'),
('TR0002', 'US0003', 0, 2822000, '', '0000-00-00 00:00:00', 'pending'),
('TR0003', 'US0003', 0, 2822000, '', '0000-00-00 00:00:00', 'pending'),
('TR0004', 'US0003', 0, 2822000, '', '0000-00-00 00:00:00', 'pending'),
('TR0005', 'US0003', 0, 2822000, '', '0000-00-00 00:00:00', 'pending'),
('TR0006', 'US0003', 3, 2811000, 'GOKIOOS', '0000-00-00 00:00:00', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`idakun`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`idbanner`);

--
-- Indexes for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD PRIMARY KEY (`iddetailtransaksi`),
  ADD KEY `idproduk` (`idproduk`),
  ADD KEY `idtransaksi` (`idtransaksi`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`iddiskon`);

--
-- Indexes for table `kategoriproduk`
--
ALTER TABLE `kategoriproduk`
  ADD PRIMARY KEY (`idkategoriproduk`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`idkeranjang`),
  ADD KEY `idakun` (`idakun`),
  ADD KEY `idproduk` (`idproduk`);

--
-- Indexes for table `langganan`
--
ALTER TABLE `langganan`
  ADD PRIMARY KEY (`idlangganan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`),
  ADD KEY `idkategoriproduk` (`idkategoriproduk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD CONSTRAINT `detailtransaksi_ibfk_1` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`),
  ADD CONSTRAINT `detailtransaksi_ibfk_2` FOREIGN KEY (`idtransaksi`) REFERENCES `transaksi` (`idtransaksi`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`idakun`) REFERENCES `akun` (`idakun`),
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`idkategoriproduk`) REFERENCES `kategoriproduk` (`idkategoriproduk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
