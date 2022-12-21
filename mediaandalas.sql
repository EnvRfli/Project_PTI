-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 05:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mediaandalas`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(255) NOT NULL,
  `author_id` int(255) DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `gambar` text DEFAULT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `kategori` text NOT NULL,
  `views` int(11) NOT NULL,
  `rating` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `author_id`, `author`, `judul`, `gambar`, `content`, `created_at`, `updated_at`, `kategori`, `views`, `rating`) VALUES
(20, NULL, 'Kamisato Ayaka', 'Stres karena tubes, Seorang Mahasiswa Nekad Mengakhiri Hidupnya Dengan Meminum Baygon', 'thumbnail/baygon.png', '<p>Makassar (ANTARA) - Tim Satuan Polisi Pamong Praja (Satpol PP) Pemerintah Kota Makassar berhasil menyelamatkan seorang pengemudi ojek online (ojol) yang diduga hendak bunuh diri di teras Balai Kota Makassar, Sulawesi Selatan.<br><br>\"Korbannya berinisal DT, usia kira-kira 42 tahun. Kejadian itu Senin sore kemarin. Anggota melihat ada orang berbaring kemudian didekati, terlihat mulutnya berbusa lalu cepat dievakuasi,\" kata Sekertaris Satpol PP Makassar, Ikhsan saat dikonfirmasi, Selasa malam.<br><br>Kejadian tersebut sempat terekam video hingga viral di media sosial. Terlihat seorang pengemudi ojol berjaket hijau tergeletak di bawah pohon tempat duduk samping kolam pos teras halaman Balai Kota. Sejumlah anggota Satpol PP beserta petugas polisi dan pegawai Pemkot lalu mendekati korban.<br><br>Petugas berusaha membangunkannya, namun terlihat, korban sudah tidak bisa bergerak, kemudian langsung dievakuasi dengan membopong-nya untuk dibawa masuk ke dalam ruangan.<br><br>\"Kejadiannya kemarin, dan kita tidak sangka videonya beredar viral hari ini. Saat itu, petugas polisi dan Satpol langsung membawa ke rumah sakit Akademis dengan mobil Patroli Satpol. Di dalam tasnya ditemukan cairan Baygon (racun serangga), diduga sudah dia minum,\" papar Ikhsan.<br><br>Setelah dibawa ke Rumah Sakit Umum Akademis Jalan Bulusaraung, korban langsung ditangani di ruang gawat darurat. Beruntung, nyawanya berhasil diselamatkan beberapa jam kemudian setelah dirawat intensif.<br><br>\"Kami bersama petugas kepolisian terus memantau perkembangannya. Alhamdulilah, masih bisa diselamatkan. Setelah kondisi korban membaik, lalu dipanggilkan Ojol lain untuk mengantarkan pulang ke rumahnya,\" ucap dia menjelaskan.<br><br>Saat ditanyakan apa motif percobaan korban mengakhiri hidupnya dengan meminum racun, Ikhsan menuturkan, dugaannya bisa saja karena stres&nbsp;atau ada masalah serius dalam kehidupannya. Namun demikian, ia tidak menjelaskan lebih lanjut dan menyerahkan urusan penyelidikan itu ke pihak berwajib.<br><br>Terkait kejadian itu, pihaknya meminta publik tidak langsung percaya atas informasi sesat, apalagi memberikan komentar negatif merespon video tersebut.<br><br>Mengingat, Pemkot Makassar telah memberdayakan Ojol melalui kebijakan Wali Kota Makassar Moh Ramdhan Pomanto menghadirkan Ojol Day atau Hari Ojek Online guna membangkitkan perekonomian di Makassar pada masa pandemi COVID-19.</p>', '2022-12-04 07:44:54', '2022-12-04 07:44:54', 'Bencana', 0, '5'),
(21, NULL, 'Kamisato Ayaka', 'Terobosan Baru! Wanita Ini Dapat Menanam Padi Dengan Cara Maju', 'thumbnail/puan.jpg', '<p><strong>JAKARTA,KABARDAERAH.COM</strong> -Ketua DPR RI Puan Maharani melakukan kunjungan kerja ke Desa Adat Sedang, Abiansemal, Badung, Bali, pekan Rabu 28 September 2022. Setibanya di lokasi kunker, cucu Bung Karno itu langsung berbaur dengan para petani dan ikut menanam padi jenis Inpari 32 dengan sistim “tanam maju” atau tanju.</p><p>Melalui unggahan di Instagramnya @puanmaharaniri, Puan menyatakan bahwa Indonesia merupakan Negara yang sangat kaya. Bahkan, saking kayanya, dalam bercocok tanam padi satu daerah berbeda dengan daerah lainnya. Ada yang menggunakan sistem tanam mundur, ada juga yang menggunakan sistem tanah maju.</p><p>“Saking kaya rayanya Indonesia, beda daerah beda cara menanam padinya. Di sini di Desa Adat Sedang, Abiansemal, Kab Badung, sawahnya dibikin kotak-kotak segi empat dulu sebelum ditanam. Di daerah Jawa Timur dibikin garis lurus, di Sumatera berbeda lagi,” kata perempuan pertama yang menjabat sebagai Ketua DPR RI itu.</p><p>Dua sistem tanam itu mempunyai kelebihan dan kekurangan masing-masing. Lalu, apa sih kelebihan dari sistem tanam maju yang berlaku di Desa Adat Sedang, Abiansemal, Badung, sebagaimana dilakukan Ketua DPR RI saat bersama warga setempat pekan kemarin.</p><p>Sistem tanam maju yang juga berlaku di beberapa daerah lain di Indonesia, merujuk sampulpertanian.com, merupakan salah satu teknik menanam padi yang sudah diakui keunggulannya dalam dunia pertanian.</p><p>Keuntungan dari tanju ini salah satunya petani bisa lebih cepat melakukan penanaman bibit padinya dan bisa lebih jelas melihat garis jarak tanam yang sebelumnya dibuat oleh petani menggunakan caplakan. Caplakan ini adalah semacam alat pertanian tradisional yang berfungsi untuk membuat garis pola jarak tanam padi.</p><p>sudah dilaksanakan sejak lama, dan lebih menguntungkan petani,” jelas Agus yang menjadi pembawa acara, saat kunjungan Puan ke Desa Sedang.</p><p>Agus menyebut, sistem tanam maju lebih mudah diterapkan dari pada tanam mundur, sehinga cocok untuk petani milenial. Sebab tidak semua warga bisa menggunakan sistem tanam mundur. Namun dengan menggunakan sistem tanju/caplak, semua bisa karena sudah ada tanda berupa garis yang berbentuk kotak kotak.</p><p>“Dengan cara tanam caplak produktivitas tanaman bisa naik hingga 10 persen dibandingkan dengan cara tana konvensional (mundur). Makanya sangat dianjurkan oleh pemerintah,” ucapnya.</p><p>Terpisah, Kepala Dinas Pertanian dan Pangan I Wayan Wijana menjelaskan sistim caplak memang sangat dianjurkan untuk petani. Bahkan sistim caplak ini menurut Wijana, sekarang ini lebih ditingkatkan dengan sistim Jajar Legowo (Jarwo) yang cara tanamnya juga maju.</p><p>“Sistim caplak salah satu strategi untuk meningkatkan produksi karena jarak tanam yang diatur dengan tepat serta memudahkan petani dalam menanam karena mengikuti alur yang sudah dicaplak,” paparnya.</p>', '2022-12-04 07:49:39', '2022-12-04 07:49:39', 'Politik', 0, '5'),
(22, NULL, 'Kamisato Ayaka', 'yo ndak tahu kok tanya saya', 'thumbnail/yntkts.jpg', '<p>JAKARTA - Belum lama ini video kemunculan tulisan \"YNTKTS\" pada sebuah papan display Stasiun Pengisian Bahan Bakar Umum (SPBU) di Bogor viral. Akronim dari \"ya <i>ndak</i> tahu kok tanya saya\" tersebut dipopulerkan pertama kali oleh Presiden Joko Widodo. Pertanyaannya, kapan pertama kali Jokowi melontarkan ungkapan fenomenal tersebut sampai dijadikan meme seperti saat ini?&nbsp;</p><p>Salah satu yang menyebarkan video tersebut adalah pemilik akun Twitter @IbnuTasrip. Pihak Corporate Secretary PT Pertamina, Patra Niaga mengatakan teks berjalan bertuliskan \"YNTKTS\" adalah ulah peretas. \"Papan <i>running text</i> kena <i>hack</i>,\" kata Putut kepada <i>Kompas</i>.&nbsp;</p><p>SPBU tersebut kata Putut terletak di Jl. Mayor Oking, Cibinong, Bogor. Dan tulisan pada papan teks berjalan itu kini telah diperbaiki.&nbsp;</p><p>Istilah YNTKTS sudah lama menjadi fenomenal di media sosial khususnya Twitter. Bahkan tak sedikit warganet yang menjadikan meme.&nbsp;</p><p>Pemilik akun @lesserevile misalnya, membubuhkan istilah YNTKTS pada sebuah kaos. Akun tersebut membuat meme bertuliskan \"alasan aku malu bertamu ke rumah orang tuamu\" dan menaruh gambar kaos \"YNTKTS\" di memenya.&nbsp;</p><p>Selain itu di Facebook, meme YNTKTS juga bertebaran. Bahkan ada salah satu unggahan yang menambahkan istilah lain yang keluar dari mulut Presiden Soeharto yakni \"KKTBSYS\". Itu adalah kependekan dari \"kenapa kamu tanya begitu, siapa yang suruh.\" Video yang sama-sama pernah viral ketika ada anak kecil bertanya kepada penguasa Orde Baru mengenai kenapa presiden Indonesia cuma ada satu.&nbsp;</p><h3>Asal Usul YNTKTS</h3><p>Menurut pengertian populer di Urban Dictionary, YNTKTS adalah singkatan dari kalimat legendaris yang diucapkan Jokowi. Maknanya: \'saya tidak tahu, kenapa kamu bertanya kepada saya\'. Lalu kapan Jokowi pertama kali melontarkan kalimat tersebut?&nbsp;</p><p>Menurut penelusuran VOI, ungkapan Jokowi tersebut pernah terucap saat ia masih menjabat Gubernur DKI Jakarta, lebih tepatnya pada September 2013. Seperti dikutip <a href=\"https://20.detik.com/video-news/20130925-130925039/lucu-jurus-baru-jokowi-itu-anunya\"><i>detik</i></a>, video itu direkam ketika Jokowi mendapat serbuan pertanyaan dari wartawan. Saat itu pula Jokowi disebut punya jurus baru untuk menghindar dari serbuan wartawan dengan pura-pura mengelabui pers.&nbsp;</p>', '2022-12-04 07:51:45', '2022-12-04 07:51:45', 'Teknologi', 0, '5'),
(23, NULL, 'Kamisato Ayaka', 'Ella Musk Kembangkan Teknologi Dimana Manusia Dapat Memasuki Dunia Animee', 'thumbnail/elon_musk_catgirls.webp', '<p><strong>Jakarta, CNBC Indonesia -</strong> Elon Musk baru saja diajak jalan-jalan oleh bos Apple, Tim Cook ke markas produsen iPhone itu di Cuppertino, California, Amerika Serikat (AS). Pertemuan dua tokoh teknologi itu terjadi setelah Musk melancarkan kritikan pada Apple dan&nbsp; mengindikasikan akan memblokir Twitter dari App Store.</p><p>Dalam akun Twitternya, Musk mengabadikan pemandangan di kantor Apple melalui video singkat. Terlihat sebuah kolam yang dikelilingi pohon-pohon besar.</p><p>\"Terima kasih @tim_cook sudah mengajakku berkeliling marka Apple yang indah,\" tulis Musk, dikutip Kamis (1/12/2022).</p><p>Dalam beberapa hari terakhir, Musk melancarkan sejumlah serangan kepada Apple dan Tim Cook. Salah satunya terkait biaya komisi di App Store, toko aplikasi milik Apple, terlampau besar.</p><p>Melansir <i>Reuters,</i> Musk juga menambahkan meme yang menggambarkan dirinya siap \'berperang\' dengan Apple dibandingkan membayar komisi 30%.</p><p>Musk juga mengatakan Apple mengancam memblokir Twitter. Namun tidak ada penjelasan soal alasan pemblokiran tersebut.</p><p>Melansir <i>Reuters,</i> Musk juga menambahkan meme yang menggambarkan dirinya siap \'berperang\' dengan Apple dibandingkan membayar komisi 30%.</p><p>Musk juga mengatakan Apple mengancam memblokir Twitter. Namun tidak ada penjelasan soal alasan pemblokiran tersebut.</p>', '2022-12-04 07:55:48', '2022-12-04 07:55:48', 'Olahraga', 0, '0'),
(24, NULL, 'Kamisato Ayaka', 'Kesal Selalu Ditanyakan \"Kapan Sempro Bang?\" Oleh Temannya, Seorang Mahasiswa Nekat Menikam Teman Tersebut Dengan Palu.', 'thumbnail/Palu Godam Permainan Memukul Palu.jpg.crdownload', '<p>MEDAN, iNewsMedan.id - Pelaku DAS (16) yang menikam korbannya hingga meninggal dunia di Jalan Prajurit Kelurahan Glugur Darat 1 Kecamatan Medan Timur pada Kamis (13/10/2022) malam diduga sakit hati terhadap korban.</p><p>Kapolsek Medan Timur Kompol Rona Tambunan mengatakan bahwa kasus penikaman yang dilakukan pelaku DAS terhadap korbannya David Weren Christoper Simaremare (29) dikarenakan korban diduga sakit hati.</p><p>\"Diduga pelaku sakit hati dengan korban,\" katanya didampingi Kanit Reskrim Iptu J Simamora, Sabtu (15/10/2022).</p><p>Rona menceritakan bahwa kejadian itu bermula ketika pelaku yang merupakan warga Jalan Karantina Asrama Glugur Hong Kelurahan Glugur Darat II, Kecamatan Medan Timur bersama kawan-kawannya menjumpai korban. Mereka bertemu di depot air minim Jalan Prajurit Kelurahan Glugur Darat I Kecamatan Medan Timur.</p><p>\"Saat bertemu, antara korban dan pelaku sempat cekcok,\" terangnya.&nbsp;</p><p>Setelah cekcok, pelaku dan kawan-kawannya sempat pulang. Kemudian, pelaku dan kawan-kawannya kembali menjumpai korban di depan depot Jalan Prajurit Kecamatan Medan Timur.</p><p>\"Disitu sempat cekcok lagi, dan spontan pelaku menikam korban dengan pisau yang sudah disiapkan hingga menembus ulu hati,\" ujar Rona.</p><p>Setelah melihat korban meninggal dunia, pelaku kemudian melarikan diri. Keluarga korban langsung menghubungi pihak kepolisian. Polisi dari Polsek Medan Timur yang menerima laporan tersebut datang dan langsung mengejar pelaku.&nbsp;</p><p>\"Hanya tempo dua jam, kita (Polisi) mengamankan pelaku dari Asrama Glugur Hong Kecamatan Medan Perjuangan pada Kamis (13/10/2022) sekira pukul 00.00 WIB. Saat ini, pelaku masih dalam pemeriksaan,\" tandas Kapolsek.</p>', '2022-12-04 07:58:43', '2022-12-04 07:58:43', 'Wisata', 0, '1'),
(25, NULL, 'Kamisato Ayaka', 'Mahasiswa Ini Menganggap Dirinya Cocok Kuliah di Jurusan Informatika Karena Sering Main Warnet', 'thumbnail/f93.jpg', '<p>SUARA DENPASAR – Tiga pelaku perjudian ditangkap saat asyik main judi slot di warnet (warung internet). Tiga pelaku yang ditangkap saat asyik bermain judi slot ini terdiri dari dua pria dan satu wanita.</p><p>Dua pria dimaksud berinisial MY (25) dan MS (41). Satu orang lagi, yakni seorang wanita berinisial RN (30).</p><p>Arahan Kapolri Jenderal Listyo Sigit Prabowo agar menindak pelaku perjudian disertai ancaman pencotan kepala wilayah kepolisian bila membiarkan perjudian membuat mesin Polri bergerak menangkapi pelaku perjudian.</p><p>Ketiga pelaku ditangkap saat asyik main judi slot di sebuah warnet di wilayah Kecamatan Bekasi Selatan, Kota Bekasi, Jawa Barat.</p><p>\"Kami mengamankan tiga orang lagi main judi online berupa permainan slot di warnet wilayah Bekasi Selatan,\" kata Kasie Humas Polres Metro Bekasi Kota, Kompol Erna Ruswing Andari dikonfirmasi wartawan, Kamis (25/8/2022).</p><p>Kompol Erna Ruswina Andari menjelaskan, ketiga pelaku terbukti sedang asyik melakukan perjudian online berdasarkan rekaman CCTV. Saat itu, pelaku membuka link situs judi online di warnet, kemudian login dan memasukkan password.</p><p>\"Bermain (judi) dengan taruhan sejumlah uang yang telah ditransfer dan jika menang pelaku dapat menarik keuntungan berlipat-lipat,\" jelas dia.</p><p>Dari penangkapan ini, polisi menyita barang bukti berupa tiga unit komputer, layar monitor, dua unit handphone dan dua kartu ATM.</p><p>Pelaku yang sudah ditangkap itu dibawa ke Polsek Jatiasih. Mereka dijerat menggunakan Pasal 303 KUHP dengan ancaman hukuman 10 tahun penjara. (PMJNews)</p>', '2022-12-04 08:05:54', '2022-12-04 08:05:54', 'Pendidikan', 0, '5'),
(37, NULL, 'Kamisato Ayaka', 'asdasd', 'thumbnail/f93.jpg', '<p>asdasd<strong>asdasd</strong></p>', '2022-12-05 14:59:15', '2022-12-05 14:59:15', 'Politik', 0, '4'),
(38, NULL, 'Kamisato Ayaka', 'asdasd', 'thumbnail/puan.jpg', '<p>asdasd<strong>asdasd</strong></p>', '2022-12-05 15:01:25', '2022-12-05 15:01:25', 'Wisata', 0, '0'),
(39, NULL, 'Kamisato Ayaka', 'jalksdlkasjdklasdjaskld', 'thumbnail/yntkts.jpg', '<p>sadasdasd</p>', '2022-12-06 00:49:30', '2022-12-06 00:49:30', 'Wisata', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `iklan`
--

CREATE TABLE `iklan` (
  `id` int(255) NOT NULL,
  `nama_iklan` varchar(255) NOT NULL,
  `nama_pengiklan` text NOT NULL,
  `ukuran_iklan` varchar(255) NOT NULL,
  `Tanggal_mulai` date NOT NULL,
  `Tanggal_selesai` date NOT NULL,
  `harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `iklan`
--

INSERT INTO `iklan` (`id`, `nama_iklan`, `nama_pengiklan`, `ukuran_iklan`, `Tanggal_mulai`, `Tanggal_selesai`, `harga`) VALUES
(15, 'susu kental manis', 'frisianflag', '1013x125', '2022-11-25', '2022-12-25', 4500000),
(16, 'tupperware', 'Emak', '1013x125', '2022-10-25', '2022-11-25', 4650000),
(17, 'helm bogo', 'bogo', '256x617', '2022-11-08', '2022-11-25', 1700000),
(18, 'sarung wadimor', 'wadimor', '256x617', '2022-09-25', '2022-10-25', 3000000),
(19, 'Sarung Gajah Menara', 'Pak Saipul', '1013x125', '2022-08-25', '2022-09-25', 4650000),
(20, 'Titan Gel', 'Megajati', '256x617', '2022-09-18', '2022-11-10', 5300000),
(21, 'asdas', 'Rudi', '1013x125', '2022-12-03', '2022-12-13', 1500000),
(22, 'asdasd', 'asdasd', '256x617', '2022-12-03', '2023-01-02', 3000000),
(23, 'asd', 'adit', '1013x125', '2022-12-03', '2022-12-26', 3450000),
(24, 'asd', 'test', '1013x125', '2022-12-05', '2022-12-06', 150000),
(25, 'test', 't', '1013x124', '2022-12-06', '2022-12-08', 300000);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_q` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `profil`, `email_verified_at`, `password`, `phone`, `verification_q`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Rafli Agusta', 'viousenvious@gmail.com', 'admin', 'thumbnail/shaq.jpeg', NULL, '$2y$10$rn14lbNPffSiu6cC5SCq1.kQSLz1BV3o6Nj2QGfLkr.9QHcZtct/y', '085764278342', 'Pussy', NULL, '2022-11-16 04:43:32', '2022-11-16 04:43:32'),
(4, 'Yoimiya', 'yoimiya@gmail.com', 'author', '', NULL, '$2y$10$ODdhXN3ET/LbeftwR/oDZOjMpFCB9yXCBLpUk8G/7tlpH7d7rt6rW', '085808346354', '', NULL, '2022-11-16 04:43:32', '2022-11-16 04:43:32'),
(32, 'Kamisato Ayaka', 'kamisatoayaka@gmail.com', 'author', 'thumbnail/ayaka_002.webp', NULL, '$2y$10$eSW1RGiukq2WZAuVnmrJL.jYIUx/AlB0jvvWFYxJHJWW9HBxxs/pm', '12399501249', 'Pussy', NULL, '2022-12-03 06:36:40', '2022-12-03 06:36:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iklan`
--
ALTER TABLE `iklan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
