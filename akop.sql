-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 10 Oca 2025, 19:35:42
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `akop`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `ayar_id` int(11) NOT NULL,
  `ayar_logo` varchar(250) NOT NULL,
  `ayar_url` varchar(50) NOT NULL,
  `ayar_title` varchar(250) NOT NULL,
  `ayar_description` varchar(250) NOT NULL,
  `ayar_keywords` text NOT NULL,
  `ayar_author` varchar(50) NOT NULL,
  `ayar_tel` varchar(50) NOT NULL,
  `ayar_gsm` varchar(50) NOT NULL,
  `ayar_faks` varchar(50) NOT NULL,
  `ayar_mail` varchar(50) NOT NULL,
  `ayar_ilce` varchar(50) NOT NULL,
  `ayar_il` varchar(50) NOT NULL,
  `ayar_adres` varchar(250) NOT NULL,
  `ayar_mesai` varchar(250) NOT NULL,
  `ayar_maps` varchar(250) NOT NULL,
  `ayar_analytics` varchar(50) NOT NULL,
  `ayar_zopim` varchar(250) NOT NULL,
  `ayar_facebook` varchar(50) NOT NULL,
  `ayar_x` varchar(50) NOT NULL,
  `ayar_instagram` varchar(50) NOT NULL,
  `ayar_linkedin` varchar(50) NOT NULL,
  `ayar_tiktok` varchar(50) NOT NULL,
  `ayar_youtube` varchar(50) NOT NULL,
  `ayar_smtphost` varchar(50) NOT NULL,
  `ayar_smtpuser` varchar(50) NOT NULL,
  `ayar_smtppassword` varchar(50) NOT NULL,
  `ayar_smtpport` varchar(50) NOT NULL,
  `ayar_bakim` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_logo`, `ayar_url`, `ayar_title`, `ayar_description`, `ayar_keywords`, `ayar_author`, `ayar_tel`, `ayar_gsm`, `ayar_faks`, `ayar_mail`, `ayar_ilce`, `ayar_il`, `ayar_adres`, `ayar_mesai`, `ayar_maps`, `ayar_analytics`, `ayar_zopim`, `ayar_facebook`, `ayar_x`, `ayar_instagram`, `ayar_linkedin`, `ayar_tiktok`, `ayar_youtube`, `ayar_smtphost`, `ayar_smtpuser`, `ayar_smtppassword`, `ayar_smtpport`, `ayar_bakim`) VALUES
(0, 'dimg/26941akop-logo.png', 'http://www.akop.com', 'AKOP | Ahi Kooperatifleri ', 'AKOP: Türkiye\'nin Doğal Ürünlerini Alıcılarla Buluşturan E-Ticaret Pazar Yeri', 'eticaret, shopping, kooperatif, doğal, yöresel, köy, doğadan, meyve, sebze, doğal meyve, doğal sebze, market,', 'Atakan Bıyıkoğlu | AKOP Admin', '0551 064 05 05', '0551 064 05 05', '0551 064 05 05', '', 'Kaman', 'Kırşehir', 'KAMANUBYO', '7 / 24', 'ayar_maps_api', 'ayar_analytics', 'ayar_zopima', 'www.facebook.com/akop', 'www.x.com/akop', 'www.instagram.com/akop', 'www.linkedin.com/akop', 'www.tiktok.com/akop', 'www.youtube.com/akop', 'mail.akop.com', 'Admin', 'password', '587', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hakkimizda_id` int(11) NOT NULL,
  `hakkimizda_baslik` varchar(250) NOT NULL,
  `hakkimizda_icerik` text NOT NULL,
  `hakkimizda_video` varchar(50) NOT NULL,
  `hakkimizda_vizyon` text NOT NULL,
  `hakkimizda_misyon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_icerik`, `hakkimizda_video`, `hakkimizda_vizyon`, `hakkimizda_misyon`) VALUES
(0, 'AKOP: Türkiye\'nin Doğal Ürünlerini Alıcılarla Buluşturan E-Ticaret Pazar Yeri', '<blockquote>\r\n<hr />\r\n<p><strong>AKOP, T&uuml;rkiye&#39;nin d&ouml;rt bir yanındaki &uuml;reticilerin, t&uuml;keticilere ve işletmelere (B2B ve B2C) kendi doğal &uuml;r&uuml;nlerini satabileceği bir e-ticaret pazar platformudur. Bu proje, organik ve doğal &uuml;r&uuml;nlerin &uuml;reticilerden doğrudan alıcılara ulaşmasını sağlayarak, daha g&uuml;venilir ve s&uuml;rd&uuml;r&uuml;lebilir bir ticaret modeli oluşturmayı ama&ccedil;lamaktadır.</strong></p>\r\n</blockquote>\r\n\r\n<p><strong><img alt=\"\" src=\"http://localhost/AKOP/images/akop-logo.png\" style=\"height:300px; margin-left:210px; margin-right:210px; width:300px\" /></strong></p>\r\n\r\n<blockquote>\r\n<h3><strong>Neden AKOP?</strong></h3>\r\n\r\n<ul>\r\n	<li><strong>Yerli &Uuml;retici Destekleme: T&uuml;rkiye&#39;nin &ccedil;eşitli b&ouml;lgelerinden gelen &uuml;reticilerin &uuml;r&uuml;nleri, ulusal ve uluslararası alıcılara sunularak ekonomik b&uuml;y&uuml;me desteklenir.</strong></li>\r\n	<li><strong>S&uuml;rd&uuml;r&uuml;lebilir Tarım ve &Uuml;retim: Doğal ve organik &uuml;r&uuml;nlere odaklanarak &ccedil;evre dostu &uuml;retim y&ouml;ntemlerinin yaygınlaştırılması teşvik edilir.</strong></li>\r\n	<li><strong>Geniş &Uuml;r&uuml;n Yelpazesi: Farklı kategorilerdeki doğal &uuml;r&uuml;nler, gıda maddelerinden el yapımı &uuml;r&uuml;nlere kadar &ccedil;eşitlendirilir.</strong></li>\r\n	<li><strong>Kolay Kullanım ve G&uuml;venli Alışveriş: Kullanıcı dostu aray&uuml;z&uuml; ve g&uuml;venli &ouml;deme sistemleri sayesinde kullanıcılar rahat&ccedil;a alışveriş yapabilir.</strong></li>\r\n	<li><strong>B2B ve B2C Modeli: Hem son kullanıcılar (B2C) hem de işletmeler (B2B) i&ccedil;in uygun alışveriş olanakları sunar, b&ouml;ylece farklı m&uuml;şteri ihtiya&ccedil;larına hitap eder.</strong></li>\r\n</ul>\r\n</blockquote>\r\n\r\n<blockquote>\r\n<h3><strong>&Ouml;zellikler</strong></h3>\r\n\r\n<ul>\r\n	<li><strong>Gelişmiş Arama ve Filtreleme: Kullanıcılar, aradıkları &uuml;r&uuml;nleri kolayca bulabilir, &uuml;r&uuml;nlerin fiyatlarını ve &ouml;zelliklerini karşılaştırabilir.</strong></li>\r\n	<li><strong>Satıcı Profilleri: &Uuml;reticiler, kendilerine &ouml;zel mağaza profilleri oluşturabilir, &uuml;r&uuml;nlerini detaylı bir şekilde sergileyebilir ve m&uuml;şteri ilişkilerini y&ouml;netebilir.</strong></li>\r\n	<li><strong>G&uuml;venli &Ouml;deme Sistemi: Platform, kullanıcıların g&uuml;venli bir şekilde alışveriş yapmasını sağlayan gelişmiş &ouml;deme &ccedil;&ouml;z&uuml;mleri sunar.</strong></li>\r\n	<li><strong>Entegrasyonlar: Tedarik zinciri ve lojistik &ccedil;&ouml;z&uuml;mleriyle entegrasyon, &uuml;r&uuml;nlerin hızlı ve g&uuml;venli bir şekilde teslim edilmesine olanak tanır.</strong></li>\r\n	<li><strong>Kampanya ve İndirimler: Satıcılar, &ouml;zel promosyonlar ve indirimlerle m&uuml;şteri &ccedil;ekebilir, satışlarını artırabilir.</strong></li>\r\n	<li><strong>M&uuml;şteri Desteği: Kullanıcılar i&ccedil;in kapsamlı bir destek hizmeti sunularak, alışveriş deneyimi sırasında herhangi bir sorun yaşandığında yardım sağlanır.</strong></li>\r\n</ul>\r\n</blockquote>\r\n\r\n<blockquote>\r\n<h3><strong>AKOP&#39;un Geleceği</strong></h3>\r\n\r\n<p><strong>AKOP, yalnızca T&uuml;rkiye&#39;deki kullanıcıları değil, uluslararası alıcıları da hedefleyen bir b&uuml;y&uuml;me stratejisi izlemektedir. Gelecekte, platformun sunduğu hizmet yelpazesi genişletilerek, dijital tarım ve ticaret alanında daha fazla yenilik getirilmesi hedeflenmektedir.</strong></p>\r\n</blockquote>\r\n', 'video_kodu', 'AKOP\'un vizyonu, Türkiye\'nin yerel üreticilerini ve zanaatkarlarını, global çapta tanınan ve tercih edilen bir pazar yeri haline getirmektir. Geniş ürün yelpazesi, güvenilir ve sürdürülebilir ticaret anlayışı ile AKOP, doğal ve organik ürünlerin buluşma noktası olarak tarım ve üretim sektöründe öncü bir platform olmayı hedefler. Misyonumuz doğrultusunda, yerel üreticilerin küresel pazarda sesini duyurmasını sağlamak ve kullanıcılar için kaliteli, sağlıklı ürünlere erişim imkanı sunmak en büyük önceliğimizdir.  AKOP, teknolojiyi ve inovasyonu kullanarak, çevre dostu ve sürdürülebilir iş modellerini destekleyen bir platform oluşturarak, gelecekte tarım ve ticaret alanında lider bir e-ticaret pazar yeri olmayı hedeflemektedir.', 'AKOP\'un misyonu, yerel üreticilerin ürünlerini geniş bir müşteri kitlesine ulaştırmasını kolaylaştırmak ve tüketicilere taze, sağlıklı ve güvenilir doğal ürünler sunmaktır. Aynı zamanda, pazarımız, küçük ve orta ölçekli işletmelerin büyümesi için destekleyici bir ekosistem sunar.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_ad` varchar(100) NOT NULL,
  `kategori_ust` int(2) NOT NULL,
  `kategori_seourl` varchar(250) NOT NULL,
  `kategori_sira` int(2) NOT NULL,
  `kategori_durum` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_ad`, `kategori_ust`, `kategori_seourl`, `kategori_sira`, `kategori_durum`) VALUES
(2, 'Sebzeler', 0, 'sebzeler', 1, '1'),
(3, 'Meyveler', 0, 'meyveler', 2, '1'),
(4, 'Bakliyat', 0, 'bakliyat', 3, '1'),
(8, 'Doğal Otlar', 0, 'dogal-otlar', 4, '1'),
(9, 'Hayvansal Ürünler', 0, 'hayvansal-ueruenler', 5, '1'),
(10, 'Doğal Yağlar', 0, 'dogal-yaglar', 6, '1'),
(11, 'Makarna-Erişte', 0, 'makarna-eriste', 7, '1'),
(12, 'Doğal Şekerleme', 0, 'dogal-sekerleme', 8, '1'),
(13, 'Sarmalık', 0, 'sarmalik', 9, '1'),
(14, 'Peynir', 0, 'peynir', 10, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_zaman` datetime NOT NULL DEFAULT current_timestamp(),
  `kullanici_resim` varchar(250) NOT NULL,
  `kullanici_tc` varchar(50) NOT NULL,
  `kullanici_ad` varchar(50) NOT NULL,
  `kullanici_mail` varchar(100) NOT NULL,
  `kullanici_gsm` varchar(50) NOT NULL,
  `kullanici_password` text NOT NULL,
  `kullanici_adsoyad` varchar(50) NOT NULL,
  `kullanici_adres` varchar(250) NOT NULL,
  `kullanici_il` varchar(100) NOT NULL,
  `kullanici_ilce` varchar(100) NOT NULL,
  `kullanici_unvan` varchar(100) NOT NULL,
  `kullanici_yetki` varchar(50) NOT NULL,
  `kullanici_durum` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_zaman`, `kullanici_resim`, `kullanici_tc`, `kullanici_ad`, `kullanici_mail`, `kullanici_gsm`, `kullanici_password`, `kullanici_adsoyad`, `kullanici_adres`, `kullanici_il`, `kullanici_ilce`, `kullanici_unvan`, `kullanici_yetki`, `kullanici_durum`) VALUES
(164, '2024-12-21 15:03:25', '', '', 'Qanxan', '', '0551 064 05 05', '$2y$10$vsoQFOZ6aX6veBWwsQZXg.ErF7DWb9d1zi0Iaa.F6iqoSlXE1Z.tu', 'Atakan Bıyıkoğlu', 'KAMANUBYO', 'Kırşehir', 'Kaman', 'Admin', '5', 1),
(165, '2024-12-22 20:24:50', '', '', '', 'atakanbiyikoglu@outlook.com', '', '$2y$10$E6tX7EqYIXXfYC/pOTPvPuwQHFjnrWrfMzlt5TORmD1EeJfEQv.eq', '', '', '', '', '', '5', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_ust` varchar(50) NOT NULL,
  `menu_ad` varchar(100) NOT NULL,
  `menu_detay` text NOT NULL,
  `menu_url` varchar(250) NOT NULL,
  `menu_sira` int(2) NOT NULL,
  `menu_durum` enum('0','1') NOT NULL,
  `menu_seourl` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_ust`, `menu_ad`, `menu_detay`, `menu_url`, `menu_sira`, `menu_durum`, `menu_seourl`) VALUES
(1, '0', 'Hakkımızda', '', 'hakkimizda', 0, '1', 'hakk脹m脹zda'),
(2, '0', 'İletişim', '', 'iletisim.php', 0, '1', ''),
(3, '0', 'Kategoriler', '', 'kategoriler.php', 0, '1', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_ad` varchar(100) NOT NULL,
  `slider_resimyol` varchar(250) NOT NULL,
  `slider_sira` int(2) NOT NULL,
  `slider_url` varchar(250) NOT NULL,
  `slider_durum` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_ad`, `slider_resimyol`, `slider_sira`, `slider_url`, `slider_durum`) VALUES
(18, 'slider-1', 'dimg/slider/31509234892835024278slider-1.jpg', 1, '', '1'),
(19, 'slider-2', 'dimg/slider/22187270912804828001slider-2.png', 2, '', '1'),
(20, 'slider-3', 'dimg/slider/29951298303116621960slider-3.png', 3, '', '1'),
(21, 'slider-4', 'dimg/slider/22052205103058528852slider-4.jpg', 4, '', '1'),
(23, 'slider-5', 'dimg/slider/2813826489315832826931218219383159322073slider-5.jpg', 5, '', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun`
--

CREATE TABLE `urun` (
  `urun_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `urun_zaman` timestamp NOT NULL DEFAULT current_timestamp(),
  `urun_ad` varchar(250) NOT NULL,
  `urun_resimyol` varchar(250) NOT NULL,
  `urun_url` varchar(250) NOT NULL,
  `urun_seourl` varchar(250) NOT NULL,
  `urun_detay` text NOT NULL,
  `urun_fiyat` float(9,2) NOT NULL,
  `urun_video` varchar(50) DEFAULT NULL,
  `urun_keyword` varchar(250) NOT NULL,
  `urun_stok` int(11) NOT NULL,
  `urun_durum` enum('0','1') NOT NULL,
  `urun_onecikar` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urun`
--

INSERT INTO `urun` (`urun_id`, `kategori_id`, `urun_zaman`, `urun_ad`, `urun_resimyol`, `urun_url`, `urun_seourl`, `urun_detay`, `urun_fiyat`, `urun_video`, `urun_keyword`, `urun_stok`, `urun_durum`, `urun_onecikar`) VALUES
(39, 14, '2024-12-23 16:31:24', 'İzmir Tulum Peyniri 1 Kg', 'dimg/urun/25267228952897126361WhatsApp Görsel 2024-12-23 saat 18.28.50_e23eddeb.jpg', 'http://www.akop.com/izmir-tulum-peyniri-1-kg', 'izmir-tulum-peyniri-1-kg', '', 400.00, '', 'doğal, yöresel, tulum, izmir', 100, '1', '1'),
(40, 12, '2024-12-23 16:33:48', 'Anne Eli Dubai Çikolatası', 'dimg/urun/21815282722149628706evde-daha-ucuza-dogal-dubai-cikolatasi-nasil-yapilir-iste-tarifi-161221-20241017.jpg', 'http://www.akop.com/anne-eli-dubai-cikolatasi', 'anne-eli-dubai-cikolatasi', '', 100.00, '', 'doğal, yöresel, dubai', 100, '1', '1'),
(42, 12, '2024-12-23 16:43:29', 'Bol Cevizli Sucuk 500 Gr', 'dimg/urun/2917124880images.jpeg', 'http://www.akop.com/bol-cevizli-sucuk-500-gr', 'bol-cevizli-sucuk-500-gr', '', 170.00, '', 'cevizli sucuk, doğal', 300, '1', '1'),
(43, 13, '2024-12-23 16:48:35', 'Tokat Yaprağı 5 Kg', 'dimg/urun/3190729802yaprak.jpeg', 'http://www.akop.com/tokat-yapragi-5-l', 'tokat-yapragi-5-kg', '', 600.00, '', 'tokat, tokat yaprağı, doğal, yöresel ', 30, '1', '1'),
(44, 11, '2024-12-23 16:51:15', 'Bol Yumurtalı Erişte 1 Kg', 'dimg/urun/2561431011erişte.jpeg', 'http://www.akop.com/bol-yumurtalı-eriste-1-kg', 'bol-yumurtali-eriste-1-kg', '', 200.00, '', 'erişte, makarna, doğal,', 30, '1', '1'),
(45, 9, '2024-12-23 16:53:01', 'Köy Yumurtası 30\'lu', 'dimg/urun/25652241232123527197koy-yumurtasi-02.jpeg', 'http://www.akop.com/koy-yumurtasi', 'koey-yumurtasi-30-lu', '', 300.00, '', 'yumurta, köy, doğal', 500, '1', '1'),
(46, 10, '2024-12-23 16:54:21', '5 L Zeytinyağı', 'dimg/urun/25621297503023024842zeytinyag-5lt.jpg', 'http://www.akop.com/5-l-zeytinyagi', '5-l-zeytinyagi', '', 1500.00, '', 'zeytinyağı, doğal, yöresel, sağlıklı', 20, '1', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`hakkimizda_id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `urun`
--
ALTER TABLE `urun`
  ADD PRIMARY KEY (`urun_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `urun`
--
ALTER TABLE `urun`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
