-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 07 Kas 2016, 18:41:01
-- Sunucu sürümü: 5.7.14
-- PHP Sürümü: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bilgiler`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyuru`
--

CREATE TABLE `duyuru` (
  `id` int(11) NOT NULL,
  `kullanici_adi` varchar(50) NOT NULL,
  `mesaj_baslik` text NOT NULL,
  `mesaj_icerik` text NOT NULL,
  `dosya_yol` varchar(100) DEFAULT NULL,
  `dosya_tur` varchar(100) DEFAULT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `duyuru`
--

INSERT INTO `duyuru` (`id`, `kullanici_adi`, `mesaj_baslik`, `mesaj_icerik`, `dosya_yol`, `dosya_tur`, `tarih`) VALUES
(74, '140201075@kou.edu.tr', 'hfjdshfljsdk', ' ', 'dosya/e347d981d19e608.png', 'image/png', '2016-11-07 15:06:33'),
(72, '140201078@kou.edu.tr', 'Os Ders Notu', ' 2', NULL, NULL, '2016-11-07 07:16:21'),
(73, '140201075@kou.edu.tr', 'yerye', ' ', 'dosya/17d63b1625c816c.png', 'image/png', '2016-11-07 14:01:06'),
(69, '140201075@kou.edu.tr', 'Prof. Dr. Nevcihan Duru Dan Araştırma Ve Bitirme Projesi Alan Öğr. Dik.', '4', NULL, NULL, '2016-11-07 07:12:31'),
(70, '140201078@kou.edu.tr', ' Sınıf Ve Bolum Temsilcileri Secimi', '5', 'dosya/b88524c1561b782.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '2016-11-07 07:15:44'),
(68, '140201075@kou.edu.tr', 'Bilgisayar Grafikleri Projelerin Sunum Tarihleri', ' 3', NULL, NULL, '2016-11-07 07:12:28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `etkinlik`
--

CREATE TABLE `etkinlik` (
  `id` int(11) NOT NULL,
  `kullanici_adi` varchar(50) NOT NULL,
  `mesaj_baslik` text NOT NULL,
  `mesaj_icerik` text NOT NULL,
  `dosya_yol` varchar(100) DEFAULT NULL,
  `dosya_tur` varchar(100) DEFAULT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `etkinlik`
--

INSERT INTO `etkinlik` (`id`, `kullanici_adi`, `mesaj_baslik`, `mesaj_icerik`, `dosya_yol`, `dosya_tur`, `tarih`) VALUES
(5, '140201078@kou.edu.tr', 'otomatik', ' tarih ekleme', 'dosya/6b1d7eadb42d159.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '2016-11-06 16:58:22');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personel`
--

CREATE TABLE `personel` (
  `kullanici_adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `personel_isim` varchar(50) CHARACTER SET utf8 NOT NULL,
  `personel_soyisim` varchar(50) CHARACTER SET utf8 NOT NULL,
  `sifre` varchar(10) CHARACTER SET utf8 NOT NULL,
  `unvan` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `personel`
--

INSERT INTO `personel` (`kullanici_adi`, `personel_isim`, `personel_soyisim`, `sifre`, `unvan`) VALUES
('140201075@kou.edu.tr', 'nevcihan', 'duru', '0', 'Doç.Dr.'),
('140201078@kou.edu.tr', 'kerim', 'küçük', '0', 'Doç.Dr.');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `duyuru`
--
ALTER TABLE `duyuru`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `etkinlik`
--
ALTER TABLE `etkinlik`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `duyuru`
--
ALTER TABLE `duyuru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- Tablo için AUTO_INCREMENT değeri `etkinlik`
--
ALTER TABLE `etkinlik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
