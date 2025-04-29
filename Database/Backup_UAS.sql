-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: login_systems
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buku`
--

DROP TABLE IF EXISTS `buku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul_buku` varchar(100) DEFAULT NULL,
  `pengarang` varchar(20) DEFAULT NULL,
  `kategori` enum('horor','fantasy','romance','comedy') DEFAULT NULL,
  `sinopsis` text DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok_tersedia` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT 'default.jpg',
  PRIMARY KEY (`id`),
  KEY `fk_buku_buku` (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buku`
--

LOCK TABLES `buku` WRITE;
/*!40000 ALTER TABLE `buku` DISABLE KEYS */;
INSERT INTO `buku` VALUES (0,'Bulan','Tere Liye','horor','Namaku Seli. Aku hanyalah seorang anak biasa dari Desa Tua, desa kecil di tepi pantai yang indah. Hidupku sederhana, tapi aku selalu bermimpi besar. Aku suka mendengar cerita-cerita dari kakek tentang badai, laut, dan legenda desa kami.  Semua berubah ketika badai besar datang, bukan hanya badai di langit, tapi juga badai yang mengguncang kehidupan kami. Desa kami terancam oleh orang-orang serakah yang ingin merusaknya. Aku tidak bisa tinggal diam. Bersama teman-temanku, aku harus menghadapi bahaya dan menemukan cara untuk melindungi desa kami, meski itu berarti melawan rasa takutku sendiri.  Dalam perjalanan ini, aku belajar bahwa keberanian tidak berarti tidak takut, tapi tetap melangkah meski takut. Aku juga menyadari betapa pentingnya menjaga alam dan tradisi yang diwariskan oleh leluhur kami. Ini adalah ceritaku, tentang badai yang mengubah segalanya—dan tentang bagaimana aku mencoba menjadi ',90000,100,1,'uploads/Tere Liye (1).jpeg'),(2,'The Truth Lies Here','Lindsey Klingele','horor','Aku tidak pernah percaya pada hal-hal seperti UFO atau teori konspirasi. Itu semua terasa seperti lelucon bagiku. Tapi ayahku, seorang jurnalis yang terlalu sering terobsesi dengan hal-hal aneh, justru hidup untuk itu. Ketika aku tiba di kota kecil Michigan untuk menghabiskan musim panas bersamanya, semuanya berubah saat dia tiba-tiba menghilang tanpa jejak.  Bersama Dylan, sahabat masa kecilku, dan Jakob, seorang anak aneh yang yakin alien benar-benar ada, aku mulai menyelidiki ke mana ayahku pergi. Kami menemukan petunjuk-petunjuk yang tidak masuk akal—catatan lama, rekaman misterius, dan cerita tentang penampakan aneh yang membuat bulu kuduk merinding. Apa yang awalnya terasa seperti permainan konyol berubah menjadi sesuatu yang lebih besar dan lebih berbahaya.  Aku tidak tahu apa yang sebenarnya terjadi, tapi satu hal pasti: aku harus menemukan ayahku. Meski itu berarti menghadapi hal-hal yang selama ini aku yakini tidak pernah nyata.',105000,150,1,'uploads/8 New Horror Novels To Give You Goosebumps This Fall.jpeg'),(3,'NEDERA ','Alexia Chen','fantasy','Nedere: Negeri Kegelapan bercerita tentang Nadia, seorang gadis yang terjebak di dunia gelap bernama Nedere. Di sana, ia menemukan bahwa dirinya memiliki kekuatan khusus. Bersama teman-teman baru, termasuk seorang ksatria dan penyihir, Nadia berusaha melarikan diri dari negeri yang dikuasai oleh kegelapan dan sihir jahat. Namun, semakin dalam ia menyelidiki, ia menyadari bahwa kegelapan itu lebih besar dari yang ia bayangkan, dan ia harus menghadapi takdirnya untuk menyelamatkan dunia dari kehancuran.',85000,150,1,'uploads/Nedera_ Negeri Kegelapan.jpeg'),(4,'Pride and Prejudice','Jane Austen','romance','Pride and Prejudice adalah kisah tentang Elizabeth Bennet, seorang wanita cerdas yang memiliki pandangan skeptis tentang cinta dan pernikahan. Ia bertemu dengan Mr. Darcy, seorang pria kaya dan angkuh yang awalnya tampak sombong di matanya. Meskipun keduanya saling membenci, mereka perlahan mulai memahami satu sama lain, dan cinta mereka berkembang melalui proses perenungan dan perubahan pandangan.  Novel ini menggali tema-tema tentang kebanggaan, prasangka, dan bagaimana kesan pertama bisa menipu. Dengan kecerdasan dan ketegaran Elizabeth, serta karakter Mr. Darcy yang berlapis, cerita ini memberikan pandangan mendalam tentang bagaimana cinta bisa tumbuh dari saling pengertian dan perbaikan diri.',105000,240,1,'uploads/English literature.jpeg'),(5,'Dilan 1990','Pidi Baiq','romance','Di tahun 1990, Milea adalah gadis yang baru pindah ke Bandung, yang kemudian bertemu dengan Dilan, seorang pemuda yang penuh pesona, humor, dan sedikit misterius. Dilan yang kerap membuat Milea bingung dengan sikapnya, akhirnya berhasil mencuri perhatian hatinya. Walaupun hubungan mereka dipenuhi dengan perasaan canggung dan banyak kejutan, mereka mulai saling jatuh cinta.  Kisah ini mengisahkan cinta pertama yang penuh dengan kenangan manis dan lucu di era 90-an. Namun, Dilan juga membawa tantangan yang membuat Milea ragu. Cerita ini penuh dengan emosi yang menyentuh, memperlihatkan perjalanan cinta yang dipenuhi dengan ketulusan dan pencarian jati diri pada usia muda.',90000,200,1,'uploads/Dilan1990 (Dilan1).jpeg'),(6,'Cinta Brontosaurus','Raditya Dika','comedy','Saya adalah Raditya Dika, seorang pria muda yang merasa seperti sedang berada di tengah-tengah kebingungan hidup. Ketika saya mulai jatuh cinta pada seorang wanita yang terlihat sempurna di mata saya, semua yang saya harapkan justru berakhir menjadi sebuah komedi konyol. Saya tahu, mungkin saya tidak pernah cukup serius atau pandai dalam hal cinta, tetapi tidak ada yang bisa mengalahkan betapa canggungnya saya dalam menjalani hubungan. Masalahnya, saya bukanlah orang yang bisa dengan mudah mengungkapkan perasaan atau mengatasi segala ketegangan dalam hubungan.  Di sepanjang perjalanan saya dengan wanita itu, saya menemukan bahwa cinta bukan hanya soal perasaan atau harapan, melainkan tentang belajar menerima kekonyolan diri sendiri dan orang lain. Meskipun saya sering kali berada dalam situasi yang memalukan, saya tidak bisa menahan tawa atas segala kejadian kocak yang terjadi, baik itu antara kami berdua atau dengan teman-teman saya yang punya cara unik mereka sendiri dalam menghadapi kehidupan. Cinta Brontosaurus mengajarkan saya banyak hal, termasuk bahwa cinta itu bisa datang dengan cara yang paling tak terduga dan penuh dengan ketidakpastian, namun hal itulah yang membuatnya begitu berharga dan berwarna.',90000,250,1,'uploads/Order Cinta Brontosaurus (Edisi Revisi) Ayo Beli.jpeg'),(7,'Rasuk','Risa Saraswati','horor','Aku adalah Langgir Janaka, seorang gadis yang selalu merasa asing di tengah dunia. Hidupku penuh kehampaan—tanpa cinta, tanpa arti, seolah aku hanya bayangan yang melewati kehidupan. Teman-temanku pun seperti tidak benar-benar peduli, hanya sibuk dengan urusan mereka sendiri. Tapi semuanya berubah ketika aku mengalami kejadian yang tak bisa dijelaskan: tubuhku tiba-tiba dirasuki oleh sosok lain.  Saat itu, aku mulai melihat dan merasakan hal-hal yang tidak kasatmata. Kejadian-kejadian aneh terus menghantui, dan aku semakin terseret ke dunia yang lebih gelap—dunia arwah yang menyimpan dendam dan rahasia. Di tengah ketakutan, aku harus menemukan keberanian untuk menghadapi mereka, termasuk menemukan arti dari rasa kehilangan dan cinta yang selama ini kucari. Namun, apakah aku bisa keluar dari semua ini hidup-hidup? Atau takdirku adalah menjadi bagian dari dunia yang tak pernah kukenal sebelumnya?',85000,170,1,'uploads/Risa Saraswati.jpeg'),(8,'Dompet Ayah Sepatu Ibu','J.S Khairen','fantasy','Dompet ayah yang lusuh menggambarkan betapa kerasnya sang ayah bekerja untuk memenuhi kebutuhan keluarga, menahan segala lelah demi kebahagiaan anak-anaknya. Sementara sepatu ibu yang sudah usang mencerminkan langkah-langkah penuh cinta dan pengorbanan dalam merawat, mengasuh, serta mendampingi keluarga di setiap situasi.  Seiring berjalannya waktu, sang anak menyadari bahwa di balik benda-benda sederhana tersebut tersimpan kisah perjuangan, harapan, dan cinta yang tak terucapkan. Cerita ini mengajak pembaca untuk lebih menghargai orang tua dan memahami bahwa cinta mereka sering kali hadir dalam bentuk yang sederhana, namun penuh makna.',89000,200,1,'uploads/Screenshot 2025-02-10 145918.png'),(9,'School Horror','Ratu Bintang','horor','Mereka bertujuh menghadapi cobaan yang sangat berat. Mereka terpaksa harus mengubur mayat pukul dua belas malam tepat hari Jumat. Berawal dari mereka yang penasaran dengan isi gudang atas yang tidak pernah ditempati dan selalu kosong. Mereka sekarang terus dihantui. Dan cara agar mereka tidak dihantui adalah mengubur mayat yang dua puluh tahun sudah dianggurkan. Apa yang akan mereka lakukan? Apakah mereka akan menguburnya? Atau mereka membiarkan mereka dihantui arwah penasaran?',50000,230,1,'uploads/photo_2025-02-10_15-19-01.jpg'),(11,'Tumbal Lentera Merah','Agil Sri Rahayu & Ku','horor','Sudah bertahun-tahun, SMA Lentera Merah menyimpan banyak misteri. Salah satunya, tiap hari kamis, tepatnya menjelang malam Jumat Kliwon, aktivitas di sekolah Lentera Merah selalu diliburkan. Akibat kejanggalan-kejanggalan tersebut, Nevan—seorang siswa kelas XII—bertekad mencari tau yang sebenarnya terjadi. Namun, nasib berkata lain. Nevan malah ditemukan tergeletak tak bernyawa.  Akibat kematian sahabatnya yang tidak wajar, Marva, Ansel, Hedy, Jarvis, Raden dan Elio pun murka. Mereka bertekad menemukan pembunuh Nevan. Namun, semakin dicari tahu, keenamnya justru mendapati hal yang mengerikan, yaitu adanya pesugihan yang melibatkan pihak sekolah. Benarkah kematian Nevan ada hubungannya dengan pesugihan itu? Lantas, siapa dalang yang sebenarnya dibalik kejadian itu semua?',99000,140,1,'uploads/image_2025-02-10_15-21-39.png'),(12,'Perundungan Maut','Ranissa Tya','horor','DENDAM HARUS DIBALASKAN, BAHKAN SETELAH MATI. Suatu hari, Mia tak sengaja memergoki perundungan di sekolahnya. Dia memilih bungkam karena takut berdampak pada dirinya jika melapor. Namun, siapa sangka, perundungan itu berujung fatal. Tujuh tahun kemudian, Janu, sepupu Mia, sekolah di SMA yang sama. Beberapa kali Janu diganggu sosok yang jelas bukan manusia. Sementara itu, para perundung yang dulu dipergoki Mia tewas satu per satu. Mata dibalas mata. Sang korban perundungan tak akan berhenti sebelum dendamnya terbalas sempurna. Maka, Mia pun berpacu dengan waktu, sebelum Janu dan dirinya sendiri menjadi korban berikutnya.',82000,210,1,'uploads/image_2025-02-10_15-22-36.png'),(13,'My Stupid Boss Vol 1','Tim Kumata','comedy','Melanjutkan perjalanan para karakter yang muncul di seri buku dan film layar lebar My Stupid Boss 1 dan 2, serial komedi situasi ini menggambarkan suka duka para karyawan sebuah perusahaan dalam menghadapi beban pekerjaan sehari-hari demi mencapai mimpi dan harapan di bawah kepemimpinan bos mereka yang jauh dari kompeten. Diana, atau yang biasa disapa Kerani, dipindahtugaskan ke kantor baru oleh Bossman, meski ada rasa sedih karena harus berpisah dengan teman-teman di kantor lama, tapi ia tetap senang menerimanya karena berarti merdeka dari Bossman. Namun, harapan tidak seindah kenyataan. Ternyata Bossman si kumis lele juga ikut pindah bersamanya!',76000,180,1,'uploads/image_2025-02-10_15-25-43.png'),(14,'Martin Si Anak Magang','Vernando Altamirano','comedy','Selamat datang di dunia Martin, si anak magang jenaka dengan bakat alami untuk membuat kesalahan menjadi sebuah tawa. jadilah saksi dari kejenakaan tak terduga ketika Martin magang sebagai si tukang cabut nyawa. Meski tak henti-hentinya membuat kesalahan, Martin selalu saja bisa mengubah setiap kegagalan menjadi ledakan tawa. Bersiaplah untuk terpingkal-pingkal dan ikut dalam petualangan Martin, di mana setiap kesalahan adalah tiket menuju tawa yang tak terbendung selanjutnya! Komik ini berisi cerita-cerita eksklusif dan segar yang belum pernah dipublikasikan di mana pun.',79500,180,1,'uploads/image_2025-02-10_15-29-10.png'),(15,'Sky Academy','Cindyana H','fantasy','Sky Academy telah dibuka secara resmi. Anda diundang secara terhormat oleh pihak kami untuk mengunjungi Sky Academy yang terletak di xx, persimpangan xxx, dari utara.  Kembali dengan perjalanan Piya dan teman-temannya untuk melanjutkan pendidikan sihir mereka di Sky Academy. Sekolah sihir itu konon katanya menyediakan fasilitas terbaik untuk para penyihir.  Namun, kedatangan Piya dan teman-temannya ternyata bukan hanya untuk bersekolah, melainkan untuk menyelesaikan sebuah misi mengumpulkan para peri dari dimensi lain. Dunia sihir sekali lagi terancam, kali ini oleh penyusup. Dunia sihir membutuhkan para hidden power dan penyihir lain untuk menyelamatkan mereka.  Namun, bagaimana jika di antara pemilik hidden power justru terlempar ke linimasa bertahun-tahun lalu? Akankah mereka berhasil?',98500,175,1,'uploads/image_2025-02-10_15-33-24.png'),(16,'White Lies, Red Lies','Shirley Du & Evelyne','romance','Bagi Danika, pulang ke Bandung berarti menghadapi kembali masa lalu kelam dan monster yang telah menghantuinya selama tujuh tahun.  Bagi Nanda, kehadiran Danika justru membuka luka lama—kesendirian, kerinduan, dan pertanyaan yang tak kunjung terjawab.  Terang tak selalu menyatu dengan gelap, seperti hitam dan putih yang tak pernah berpadu. Namun, di antara keduanya, ada abu-abu yang menanti untuk diwarnai. Matahari memberi cahaya, pelangi membawa warna. Tak ada yang benar atau salah—hanya cinta yang dibutuhkan untuk menemukan kebahagiaan.',80000,250,1,'uploads/image_2025-02-10_15-34-51.png'),(17,'Sirah Cinta Tanah Baghdad','Berliana Kimberly','romance','Menikah dengan seseorang yang pernah kamu cintai dalam diam? Bukankah itu indah? Begitulah harapan Keisya saat menerima lamaran Fikra, usai menghadapi kenyataan kalau dia bukanlah anak kandung Umi dan Abah yang sangat dicintainya.  Namun, 12 tahun sudah lebih dari cukup bagi Kota Jakarta dan London mengubah sifat, gaya hidup, dan pergaulan seseorang. Fikra bukan lagi putra kiai yang Keisya kenal, kehidupan Fikra terlalu metropolitan. Perbedaan itu kian membesar dan menaruh luka. Apalagi sejak Alenta, sahabat Fikra saat berkuliah di London, datang ke tengah-tengah rumah tangga mereka.  Dalam kehancuran hatinya, Keisya memutuskan pergi ke Uzbekistan. Mewujudkan impiannya menapaki jejak peradaban Islam.  Akankah Keisya temukan bahagia dalam perjalanannya? Bagaimana nasib rumah tangganya dengan Fikra?',99000,150,1,'uploads/image_2025-02-10_15-41-17.png'),(18,'Harry Potter and The Cursed Child','J.K. Rowling','fantasy','Menjadi Harry Potter memang sulit dan sekarang pun tidak lebih mudah ketika ia menjadi pegawai Kementerian Sihir yang kelelahan, suami, dan ayah tiga anak usia sekolah Sementara Harry berjuang menghadapi masa lalu yang mengikutinya, putra bungsunya, Albus, harus berjuang menghadapi beban warisan keluarga yang tak pernah ia inginkan. Ketika masa lalu dan masa sekarang melebur, ayah dan anak pun mengetahui fakta yang tidak menyenangkan: terkadang kegelapan datang dari tempat-tempat yang tak terduga.',105000,190,1,'uploads/image_2025-02-10_15-49-58.png'),(19,'Red Queen #2 : Glass Sword','Victoria Aveyard','romance','Setelah melarikan diri dari pengkhianatan yang mengubah segalanya, Mare Barrow menemukan bahwa dirinya bukan hanya seorang \"Merah\" biasa dengan kekuatan perak—dia adalah sesuatu yang lebih, simbol dari harapan sekaligus ancaman bagi kerajaan yang penuh ketidakadilan.  Dalam Glass Sword, Mare berjuang untuk menemukan dan merekrut orang-orang seperti dirinya, para \"Merah\" yang memiliki kemampuan istimewa, sebelum mereka diburu dan dimusnahkan oleh Raja Maven, mantan sahabat yang kini menjadi musuh paling berbahaya. Mare harus menghadapi dilema antara mempertahankan kemanusiaannya atau tenggelam dalam ambisi dan balas dendam.  Di tengah peperangan dan pemberontakan yang semakin membara, Mare mulai merasakan beban menjadi simbol revolusi. Persahabatan diuji, kepercayaan hancur, dan cinta menjadi sesuatu yang penuh luka. Mare sadar bahwa garis antara pahlawan dan penjahat semakin kabur ketika kekuasaan menjadi tujuan.',155000,200,1,'uploads/image_2025-02-10_15-52-31.png');
/*!40000 ALTER TABLE `buku` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `book_id` (`book_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `buku` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_keranjang`
--

DROP TABLE IF EXISTS `data_keranjang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_keranjang` (
  `username` varchar(30) DEFAULT NULL,
  `waktu_masuk` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_keranjang`
--

LOCK TABLES `data_keranjang` WRITE;
/*!40000 ALTER TABLE `data_keranjang` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_keranjang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembeli`
--

DROP TABLE IF EXISTS `pembeli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembeli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembeli`
--

LOCK TABLES `pembeli` WRITE;
/*!40000 ALTER TABLE `pembeli` DISABLE KEYS */;
INSERT INTO `pembeli` VALUES (1,'aisha','$2y$10$FLS47995GmBjgfIjIf8rQu/ovIhSXht0ZbjVzKSfmtg75wQseVmR.','2025-01-29 10:27:22',NULL),(2,'alia','$2y$10$8wGytrNt.Y.UeYwmseoHJ.MZbNf2fK1d9XAlBQJAsWwfrmBaAO4uS','2025-01-29 11:05:16',NULL),(3,'nakyn','$2y$10$EhESwhbFIVv7zEUGJ/lese2zGZcm50umIyZ2FiVfGCTxS1DX44Fde','2025-01-29 11:17:15',NULL),(4,'laura','$2y$10$X4.8amtsMU/zAwMGVu6cZuqWLyw7ZUPZzwxwPUpBRk8A2yPrwD3.O','2025-01-31 02:23:24',NULL),(45,'mumtaz','$2y$10$qU7S3d2kqeQGAJirrazdjuQna.dFZ58dyMQblsS1zO9mr06Rg7p16','2025-02-10 08:57:52',NULL);
/*!40000 ALTER TABLE `pembeli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','0192023a7bbd73250516f069df18b500'),(2,'admin','admin123'),(3,'admin','0192023a7bbd73250516f069df18b500'),(4,'admin','879d48da363ec3a079ddaf7751314465'),(5,'Haura','879d48da363ec3a079ddaf7751314465');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-10 16:28:52
