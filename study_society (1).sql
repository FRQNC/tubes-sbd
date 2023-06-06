-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 07:54 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `study_society`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment_content` varchar(2048) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_content`, `user_id`, `post_id`) VALUES
(1, 'Materi Yang sangat membatu sekali\r\n', 2, 25),
(2, 'Mantapppp', 1, 26),
(3, 'Bagus sekali', 4, 23),
(4, 'Alhamdulilah jadi mengerti materinya', 3, 30);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(11) NOT NULL,
  `grade_name` varchar(64) NOT NULL,
  `grade_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `grade_name`, `grade_count`) VALUES
(0, 'Umum', 0),
(1, 'SD - Kelas 1', 0),
(2, 'SD - Kelas 2 ', 0),
(3, 'SD - Kelas 3', 0),
(4, 'SD - Kelas 4', 0),
(5, 'SD - Kelas 5', 0),
(6, 'SD - Kelas 6', 0),
(7, 'SMP - Kelas 1', 0),
(8, 'SMP - Kelas 2', 0),
(9, 'SMP - Kelas 3', 0),
(10, 'SMA - Kelas 1', 0),
(11, 'SMA - Kelas 2', 0),
(12, 'SMA - Kelas 3', 0),
(13, 'SMK - Kelas 1', 0),
(14, 'SMK - Kelas 2', 0),
(15, 'SMK - Kelas 3', 0),
(16, 'Kuliah - Semester 1', 0),
(17, 'Kuliah - Semester 2', 0),
(18, 'Kuliah - Semester 3', 0),
(19, 'Kuliah - Semester 4', 0),
(20, 'Kuliah - Semester 5', 0),
(21, 'Kuliah - Semester 6', 0),
(22, 'Kuliah - Semester 7', 0),
(23, 'Kuliah - Semester 8', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_title` varchar(256) NOT NULL,
  `post_content` longtext NOT NULL,
  `post_like_count` int(11) DEFAULT NULL,
  `post_dislike_count` int(11) DEFAULT NULL,
  `topic_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `post_title`, `post_content`, `post_like_count`, `post_dislike_count`, `topic_id`, `grade_id`) VALUES
(20, 1, 'kalkulus', '{\"time\":1686029047817,\"blocks\":[{\"id\":\"M_grFpkhlT\",\"type\":\"embed\",\"data\":{\"service\":\"youtube\",\"source\":\"https://youtu.be/4lgPiAITfuk\",\"embed\":\"https://www.youtube.com/embed/4lgPiAITfuk\",\"width\":580,\"height\":320,\"caption\":\"Penjelasan mengenai kalkulus dasar pada bagian ini yaitu konsep mengenai limit, turunan (diferensial), dan anti-turunan (integral).\"}}],\"version\":\"2.27.0\"}', 0, 0, 10, 16),
(21, 1, 'STATISTIKA DASAR', '{\"time\":1686029186950,\"blocks\":[{\"id\":\"MK4OpT8W-n\",\"type\":\"embed\",\"data\":{\"service\":\"youtube\",\"source\":\"https://youtu.be/zT4Pk6m0KtQ\",\"embed\":\"https://www.youtube.com/embed/zT4Pk6m0KtQ\",\"width\":580,\"height\":320,\"caption\":\"\"}}],\"version\":\"2.27.0\"}', 0, 0, 10, 12),
(22, 1, 'Pecahan', '{\"time\":1686029295973,\"blocks\":[{\"id\":\"aOf-jDbkEZ\",\"type\":\"embed\",\"data\":{\"service\":\"youtube\",\"source\":\"https://youtu.be/hiprF2LY1Og\",\"embed\":\"https://www.youtube.com/embed/hiprF2LY1Og\",\"width\":580,\"height\":320,\"caption\":\"\"}}],\"version\":\"2.27.0\"}', 0, 0, 10, 0),
(23, 2, 'Sejarah ', '{\"time\":1686029451317,\"blocks\":[{\"id\":\"0DNQ09kMu3\",\"type\":\"paragraph\",\"data\":{\"text\":\"&nbsp; Rangkuman Sejarah IndonesiaSebelum disebut sebagai Indonesia, wilayah Indonesia disebut dengan Nusantara. Pasalnya, nama \\\"Indonesia\\\" sendiri baru digunakan pertama kali saat Kongres Pemuda II 28 Oktober 1928.Simak rangkuman sejarah Indonesia dari berbagai peristiwa yang terjadi di Indonesia di bawah ini!Masa Prasejarah IndonesiaDikutip dari materi belajar dalam file.upi.edu, oleh Yeni Kurniawati, sejarah Indonesia diawali dengan zaman prasejarah, zaman sejak bumi Indonesia didiami dan berakhir setelah Indonesia mengenal tulisan.Dalam hal ini, prasasti tertua yang ada di wilayah Indonesia adalah prasasti Kutai. Berdasarkan hasil penelitian, diperkirakan prasasti Kutai dibuat pada abad ke-5 Masehi, tapi ada juga yang menyebutnya pada abad ke-4.Masa ini mungkin tidak dapat diteliti melalui prasasti, namun bisa diteliti melalui fosil-fosil yang ditemukan.Fosil banyak ditemukan di pulau Jawa. Adapun fosil manusia yang usia paling tua yang ditemukan di pulau Jawa yaitu Pithecanthropus mojokertensis dengan perkiraan usia sekitar 1,9 juta tahun.Masa Kerajaan (Hindu-Buddha dan Islam)Masuknya budaya dari India yang bercorak Hindu maupun Budha tidak terlepas dari jalur lalu lintas pelayaran dagang antara India dengan Cina pada abad ke-1.Kerajaan Kutai merupakan kerajaan Hindu-Buddha pertama di Indonesia. Masa kerajaan ini juga menumbuhkan kekuatan ekonomi dan politik yang besar di nusantara terutama pada era kerajaan Sriwijaya, Singhasari, serta Majapahit. Sejak masa itu dan setelahnya agama Hindu dan Buddha berkembang pesat di Indonesia.Setelah masa kerajaan Hindu-Budha, munculah peradaban kerajaan Islam sekitar abad ke-13. Mariana dalam e-modul Kemdikbud Sejarah Indonesia menuliskan, agama Islam masuk ke Indonesia juga melalui jalur perdagangan.Kerajaan Islam pertama di Indonesia adalah Kerajaan Samudra Pasai di pantai utara Aceh. Selain itu ada juga kerajaan Demak (Jawa Tengah) yang membuat agama Islam semakin berkembang di Nusantara.Masa Penjajahan (Kolonialisme)Di dalam sejarah Indonesia dan negara di dunia lainnya dikenal adanya masa penjelajahan samudra. Orang-orang Eropa berusaha untuk menemukan daerah penghasil rempah-rempah. Pasalnya, rempah-rempah ini menjadi komoditas perdagangan laris dan sangat penting di Eropa.Seperti yang kita tahu, di sini Nusantara merupakan daerah yang menghasilkan rempah rempah (orang-orang Eropa menyebut daerah Nusantara dengan nama tanah Hindia).Dirangkum dari buku Kemdikbud Sejarah Indonesia Kelas 11 oleh Sardiman AM dan Amurwani DL, petualangan, pelayaran, dan penjelajahan samudra bangsa-bangsa Eropa untuk menuju Kepulauan Nusantara dimulai dari Portugis tahun 1511, kemudian sampai ke Maluku tahun 1521. Begitu juga Spanyol yang datang ke Maluku pada tahun 1521.Tahun tahun 1579, orang-orang Inggris juga sampai ke Indonesia dipimpin oleh Francis Drake dan Thomas Cavendish. Belanda menjelajah Indonesia mengambil jalur laut yang sudah biasa dilalui orang-orang Portugis.Belanda mulai masuk ke Indonesia pada tahun 1596 di Banten. Kedatangan armada Belanda ke Kepulauan Nusantara dipimpin oleh Cornelis untuk mencari rempah-rempah.Pada masa penjajahan Belanda di abad ke-17, lahirlah Vereenigde Oost Indische Compagnie (VOC). VOC adalah kongsi dagang terbesar milik Belanda sebagai pusat perdagangan di wilayah Asia, dengan melakukan monopoli perdagangan serta intervensi politik di Nusantara. VOC dibubarkan pada tanggal 31 Desember 1799, karena korupsi, problem, manajemen, dan utang.Belanda menjajah Indonesia selama ratusan tahun, sekitar 126 tahun atau sampai tahun 1942. Perang yang terjadi pada abad ke-18, 19, dan awal 20.Adanya perlawanan rakyat Indonesia terhadap pemerintahan kolonial Hindia Belanda dilatarbelakangi karena tindakan monopoli, intervensi politik dengan devide et impera, dan keserakahan dari pemerintahan kongsi dagang itu.Saat Belanda menjajah Indonesia disebut juga dengan istilah imperialisme dan kolonialisme, muncullah kedatangan Jepang.Ketika Jepang menguasai Indonesia disebut dengan pendudukan, karena Jepang ingin merebut dan berkuasa di Indonesia dengan menggunakan sistem militer.Setelah Jepang berhasil menguasai beberapa wilayah di Nusantara, akhirnya tanggal 8 Maret 1942 Belanda secara resmi menyerah Nusantara kepada Jepang.Jepang masuk pertama kali ke Indonesia pada tanggal 11 Januari 1942 di pulau Tarakan, Kalimantan Timur. Pada masa penjajahan/pendudukan Jepang di Indonesia, Jepang juga melakukan perubahan-perubahan terkait budaya.Indonesia MerdekaDikutip dari e-modul Kemdikbud Sejarah Indonesia yang disusun oleh Ersontowi, ambisi Jepang dalam menguasai wilayah Asia Pasifik harus sirna, karena Jepang telah menandatangani penyerahan diri kepada Sekutu di atas kapal USS Missouri.Peristiwa tersebut juga merupakan penandatangan yang menandakan Jepang kalah sekaligus menandai berakhirnya Perang Dunia II. Kekalahan-kekalahan yang terjadi membuat Jepang semakin terdesak dalam pertempuran di Pasifik.Oleh sebab itu, dalam mendapatkan bantuan, Jepang pun berusaha menarik simpati dari bangsa Indonesia dengan cara memberikan janji kemerdekaan.Janji tersebut disampaikan oleh Perdana Menteri Koiso yang direalisasikan dengan pembentukan Badan Penyelidik Usaha-usaha Persiapan Kemerdekaan Indonesia (BPUPKI) pada 29 April 1945.Jepang bermaksud memberi kesempatan Indonesia untuk mempersiapkan kemerdekaannya. Setelah BPUPKI dibubarkan, lahirlah Panitia Persiapan Kemerdekaan Indonesia (PPKI).Singkat cerita, Jepang menyerah tanpa syarat kepada sekutu dan mengakui deklarasi Postdam, pada tanggal 15 Agustus 1945. Pada saat hari juga, malam harinya golongan muda memaksa Soekarno-Hatta untuk memproklamasikan kemerdekaan Indonesia.Golongan muda mendesak untuk mendeklarasikan kemerdekaan paling lambat 16 Agustus 1945. Namun, Soekarno-Hatta tetap pada pendirian, untuk melakukan proklamasi kemerdekaan Indonesia melalui PPKI.Kemudian pada 16 Agustus 1945 dini hari tepatnya pukul 04.00 WIB, golongan muda menculik/mengasingkan Soekarno, Moh. Hatta, Fatmawati, dan Guntur ke Rengasdengklok.Malam harinya, naskah Proklamasi disusun di rumah Laksamana Maeda oleh Soekarno, Hatta, dan Achmad Soebardjo. Naskah proklamasi Indonesia diketik Sayuti Melik, dan ditandatangani Soekarno-Hatta atas nama bangsa Indonesia.Akhirnya, pada tanggal 17 Agustus 1945 Indonesia merdeka. Kemerdekaan Indonesia ditandai dengan pembacaan naskah Proklamasi oleh Soekarno di Jalan Pegangsaan Timur No 56 tepatnya pukul 10.00 WIB.Dibarengi juga dengan peristiwa pengibaran bendera merah putih oleh Latief Hendraningrat dan S. Suhud. Kabar kemerdekaan Indonesia itu pun disebarkan melalui radio, media cetak, serta utusan daerah.Masa Awal Kemerdekaan IndonesiaSemenjak proklamasi kemerdekaan pada tahun 1945, Indonesia telah mengalami beberapa periode sistem pemerintahan. Masa orde lama merupakan sejarah politik Indonesia pada masa Presiden pertama Indonesia Ir. Soekarno (1945-1966).Kemudian dilanjut dengan masa orde baru (Orba). Orba juga merupakan bagian dari sejarah Indonesia, karena termasuk sistem yang bertahan cukup lama di Indonesia, yakni sekitar 32 tahun.Orde baru muncul setelah kekacauan yang terjadi selama masa kepemimpinan Presiden Soekarno atau suatu istilah untuk memisahkan antara periode kekuasaan Presiden Ir. Soekarno (orde lama) dengan periode kekuasaan presiden Soeharto.Setelah orde lama dan baru berakhir, muncullah masa reformasi pada tahun 1998 sebagai masa perubahan untuk masa selanjutnya.&nbsp;\"}}],\"version\":\"2.27.0\"}', 1, 0, 5, 0),
(24, 2, 'Alfabeth', '{\"time\":1686029513389,\"blocks\":[{\"id\":\"ug4xMkugZ2\",\"type\":\"embed\",\"data\":{\"service\":\"youtube\",\"source\":\"https://youtu.be/_UR-l3QI2nE\",\"embed\":\"https://www.youtube.com/embed/_UR-l3QI2nE\",\"width\":580,\"height\":320,\"caption\":\"\"}}],\"version\":\"2.27.0\"}', 0, 0, 2, 0),
(25, 2, 'seni', '{\"time\":1686029625502,\"blocks\":[{\"id\":\"xEa9hYTHO8\",\"type\":\"embed\",\"data\":{\"service\":\"youtube\",\"source\":\"https://youtu.be/VV13G4g3ZhM\",\"embed\":\"https://www.youtube.com/embed/VV13G4g3ZhM\",\"width\":580,\"height\":320,\"caption\":\"\"}}],\"version\":\"2.27.0\"}', 1, 0, 18, 0),
(26, 3, 'perulangan Bahasa C', '{\"time\":1686029767517,\"blocks\":[{\"id\":\"TE0viYiepv\",\"type\":\"code\",\"data\":{\"code\":\"#include<stdio.h>\\nint main(){\\n\\n    int n,i;\\n\\n    scanf(\\\"%d\\\", &n);\\n\\n    for ( i = 1; i <= n; i++)\\n    {\\n        printf(\\\"Wilujeng Sumping.\\\\n\\\");\\n    }\\n    \\n}\"}}],\"version\":\"2.27.0\"}', 1, 0, 0, 16),

-- --------------------------------------------------------

--
-- Table structure for table `post_like_data`
--

CREATE TABLE `post_like_data` (
  `post_like_data_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_has_liked` int(11) NOT NULL,
  `user_has_disliked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_like_data`
--

INSERT INTO `post_like_data` (`post_like_data_id`, `user_id`, `post_id`, `user_has_liked`, `user_has_disliked`) VALUES
(10, 2, 25, 1, 0),
(11, 1, 26, 1, 0),
(12, 4, 23, 1, 0),
(13, 3, 30, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `post_tags_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `resource_id` int(11) NOT NULL,
  `resource_file` varchar(1024) NOT NULL,
  `resource_type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resource`
--

INSERT INTO `resource` (`resource_id`, `resource_file`, `resource_type_id`, `user_id`, `post_id`) VALUES
(20, '', 0, 1, 20),
(21, '', 0, 1, 21),
(22, '', 0, 1, 22),
(23, '', 0, 2, 23),
(24, '', 0, 2, 24),
(25, '', 0, 2, 25),
(26, '', 0, 3, 26),
(27, '', 0, 3, 27),
(28, '', 0, 3, 28),
(29, '', 0, 4, 29),
(30, '', 0, 4, 30),
(31, '', 0, 4, 31);

-- --------------------------------------------------------

--
-- Table structure for table `resource_type`
--

CREATE TABLE `resource_type` (
  `resource_type_id` int(11) NOT NULL,
  `resource_type_name` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resource_type`
--

INSERT INTO `resource_type` (`resource_type_id`, `resource_type_name`) VALUES
(0, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(64) NOT NULL,
  `tag_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`tag_id`, `tag_name`, `tag_count`) VALUES
(1, 'Lorem', 3);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(64) NOT NULL,
  `topic_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `topic_name`, `topic_count`) VALUES
(0, 'Umum', 0),
(1, 'Bahasa Indonesia ', 0),
(2, 'Bahasa Inggris', 0),
(3, 'Bahasa jepang', 0),
(4, 'Ilmu pengetahuan alam', 0),
(5, 'Sejarah Indonesia', 0),
(6, 'Ilmu pengetahuan sosial', 0),
(7, 'Biologi', 0),
(8, 'Kimia', 0),
(9, 'Fisika', 0),
(10, 'Matematika', 0),
(11, 'Sosiologi', 0),
(12, 'Ekonomi', 0),
(13, 'Geografi', 0),
(14, 'Bahasa Prancis', 0),
(15, 'Bahasa Korea', 0),
(16, 'Bahasa Jerman', 0),
(17, 'Bahasa Sunda', 0),
(18, 'Seni budaya', 0),
(19, 'Pendidikan Agama dan budi pekerti', 0),
(20, 'pendidikn pancasila dan Kewarganegaraan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `user_login_id` int(11) NOT NULL,
  `user_fullname` varchar(64) NOT NULL,
  `user_birthday` date NOT NULL,
  `user_sex` char(1) DEFAULT NULL,
  `user_type` varchar(16) DEFAULT NULL,
  `user_institution` varchar(64) DEFAULT NULL,
  `user_bio` varchar(1024) DEFAULT NULL,
  `user_photo` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `user_login_id`, `user_fullname`, `user_birthday`, `user_sex`, `user_type`, `user_institution`, `user_bio`, `user_photo`) VALUES
(1, 24, 'M Alfi Faiz', '2003-08-05', 'L', 'Mahasiswa', 'UPI', '', 'default.png'),
(2, 25, 'Nur Ainun', '2023-06-06', 'P', 'Mahasiswa', 'UPI', '', 'default.png'),
(3, 26, 'M Furqon A', '2023-06-06', 'L', 'Mahasiswa', 'UPI', '', 'default.png'),
(4, 27, 'Raffi Ardhi N', '2023-06-06', 'L', 'Mahasiswa', 'UPI', '', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_login_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `user_login_email` varchar(128) NOT NULL,
  `user_login_password` varchar(256) NOT NULL,
  `user_login_privilege` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_login_id`, `username`, `user_login_email`, `user_login_password`, `user_login_privilege`) VALUES
(24, 'Alfi', 'alfi.faiz@upi.edu', '$2y$10$f4anctLbQz6gGXEveJWd/Ox1Bh7yL0a8Ysknb2.L.s74h1mEmGb.2', 'user'),
(25, 'Ainun', 'nurainunlubis@upi.edu', '$2y$10$yS4QZb7cIrZ6vbSfdpsMnevt7v0grsywYyxZOQd17SFi1b5E/4SRG', 'user'),
(26, 'Furqon', 'furqonalhaqqi@upi.edu', '$2y$10$/BDLQnI4DW4JAFKWC0kIt.9jJJIOzZAV0v2QmW9He1yY3dIszQoXu', 'user'),
(27, 'Raffi', 'ardhiraffi12@upi.edu', '$2y$10$DFpD3t.fRrXjtr8IW3VhUON./vsTEUb7exLwe9h/hItrc94E2dgRu', 'user');

--
-- Triggers `user_login`
--
DELIMITER $$
CREATE TRIGGER `tr_create_blank_user_info` AFTER INSERT ON `user_login` FOR EACH ROW INSERT INTO user_info VALUES('',NEW.user_login_id,NEW.username,CURDATE(),'','','','','')
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `grade_id` (`grade_id`);

--
-- Indexes for table `post_like_data`
--
ALTER TABLE `post_like_data`
  ADD PRIMARY KEY (`post_like_data_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`post_tags_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `resource`
--
ALTER TABLE `resource`
  ADD PRIMARY KEY (`resource_id`),
  ADD KEY `resource_type_id` (`resource_type_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `resource_type`
--
ALTER TABLE `resource_type`
  ADD PRIMARY KEY (`resource_type_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_login_id` (`user_login_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_login_id`),
  ADD UNIQUE KEY `Unique_username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `post_like_data`
--
ALTER TABLE `post_like_data`
  MODIFY `post_like_data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `post_tags_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `resource`
--
ALTER TABLE `resource`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `resource_type`
--
ALTER TABLE `resource_type`
  MODIFY `resource_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`grade_id`);

--
-- Constraints for table `post_like_data`
--
ALTER TABLE `post_like_data`
  ADD CONSTRAINT `post_like_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`),
  ADD CONSTRAINT `post_like_data_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`);

--
-- Constraints for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD CONSTRAINT `post_tags_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`),
  ADD CONSTRAINT `post_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`tag_id`);

--
-- Constraints for table `resource`
--
ALTER TABLE `resource`
  ADD CONSTRAINT `resource_ibfk_1` FOREIGN KEY (`resource_type_id`) REFERENCES `resource_type` (`resource_type_id`),
  ADD CONSTRAINT `resource_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`),
  ADD CONSTRAINT `resource_ibfk_3` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`user_login_id`) REFERENCES `user_login` (`user_login_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
