-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2020 at 09:12 PM
-- Server version: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vasinala_1`
--
CREATE DATABASE IF NOT EXISTS `vasinala_1` DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci;
USE `vasinala_1`;

-- --------------------------------------------------------

--
-- Table structure for table `atributy`
--

CREATE TABLE `atributy` (
  `idAtributu` int(10) UNSIGNED NOT NULL,
  `atribut` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `jednotka` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `atributy`
--

INSERT INTO `atributy` (`idAtributu`, `atribut`, `jednotka`) VALUES
(1, 'RAM', 'GB'),
(2, 'Kapacita_baterie', 'mAh'),
(3, 'Operační_systém', NULL),
(4, 'Typ_displeje', NULL),
(5, 'Interní_paměť', 'GB'),
(6, 'Barva', NULL),
(7, 'Počet_jader_procesoru', NULL),
(8, 'Rozlišení_displeje', NULL),
(9, 'Výrobce', NULL),
(10, 'Úhlopříčka_displeje', '\"'),
(11, 'Kapacita_SSD', 'GB'),
(12, 'Kapacita_HDD', 'GB'),
(13, 'Druh_grafické_karty', NULL),
(14, 'Typ_procesoru', NULL),
(15, 'Frekvence', 'Hz'),
(16, 'Odezva', 'ms'),
(17, 'Vstupy', NULL),
(18, 'Povrch_displeje', NULL),
(19, 'Spotřeba', 'W'),
(20, 'Délka_kabelu', 'm'),
(21, 'Způsob_připojení', NULL),
(22, 'Podsvícení_klávesnice', NULL),
(23, 'Layout_klávesnice', NULL),
(24, 'Konektor', NULL),
(25, 'Mikrofon', NULL),
(26, 'Hmotnost', 'g'),
(27, 'Typ_sluchátek', NULL),
(28, 'Technologie', 'nm'),
(29, 'Počet_vláken', NULL),
(30, 'Generace_procesoru', NULL),
(31, 'Patice', NULL),
(32, 'Modelové_označení_CPU', NULL),
(33, 'Grafický_čip', NULL),
(34, 'Velikost_grafické_paměti', 'MB'),
(35, 'Doporučený_výkon_zdroje', 'W'),
(36, 'Výkon_zdroje', 'W'),
(37, 'Konektory_zdroje', NULL),
(38, 'Velikost_ventilátoru', 'mm'),
(39, 'Pracovní_frekvence', 'MHz'),
(40, 'Chlazení', NULL),
(41, 'Konfigurace_paměti', 'GB'),
(42, 'Typ_paměti', NULL),
(43, 'Grafická_karta', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategorie`
--

CREATE TABLE `kategorie` (
  `idKategorie` int(10) UNSIGNED NOT NULL,
  `nazevKategorie` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `nadrazenaKategorie` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `kategorie`
--

INSERT INTO `kategorie` (`idKategorie`, `nazevKategorie`, `nadrazenaKategorie`) VALUES
(1, 'Notebooky', NULL),
(2, 'Mobily', NULL),
(3, 'Monitory', NULL),
(4, 'Audio', NULL),
(5, 'Komponenty', NULL),
(6, 'PC doplňky', NULL),
(7, 'Procesory', 5),
(8, 'Grafické karty', 5),
(9, 'Zdroje', 5),
(10, 'Operační paměti', 5),
(11, 'Myši', 6),
(12, 'Klávesnice', 6);

-- --------------------------------------------------------

--
-- Table structure for table `kategorie_has_atributy`
--

CREATE TABLE `kategorie_has_atributy` (
  `kategorie_idKategorie` int(10) UNSIGNED NOT NULL,
  `atributy_idAtributu` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `kategorie_has_atributy`
--

INSERT INTO `kategorie_has_atributy` (`kategorie_idKategorie`, `atributy_idAtributu`) VALUES
(1, 1),
(1, 3),
(1, 6),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 18),
(1, 22),
(1, 23),
(1, 26),
(1, 43),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 26),
(3, 4),
(3, 6),
(3, 8),
(3, 9),
(3, 10),
(3, 15),
(3, 16),
(3, 17),
(3, 18),
(3, 19),
(4, 6),
(4, 9),
(4, 20),
(4, 21),
(4, 24),
(4, 25),
(4, 26),
(4, 27),
(7, 9),
(7, 28),
(7, 29),
(7, 30),
(7, 31),
(7, 32),
(8, 9),
(8, 33),
(8, 34),
(8, 35),
(9, 9),
(9, 36),
(9, 37),
(9, 38),
(10, 9),
(10, 39),
(10, 40),
(10, 41),
(10, 42),
(11, 6),
(11, 9),
(11, 20),
(11, 21),
(11, 26),
(12, 6),
(12, 9),
(12, 20),
(12, 21),
(12, 22),
(12, 23),
(12, 26);

-- --------------------------------------------------------

--
-- Table structure for table `kosik`
--

CREATE TABLE `kosik` (
  `idUzivatele` int(10) UNSIGNED NOT NULL,
  `idProduktu` int(10) UNSIGNED NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `kosik`
--

INSERT INTO `kosik` (`idUzivatele`, `idProduktu`, `qty`) VALUES
(1, 12, 4),
(1, 68, 5),
(3, 13, 3),
(3, 25, 3),
(40, 12, 1),
(45, 5, 2),
(45, 19, 1),
(51, 6, 3),
(51, 8, 1),
(53, 72, 2),
(64, 25, 1),
(635, 7, 1),
(635, 11, 103),
(635, 23, 1),
(635, 37, 1),
(635, 57, 1),
(638, 5, 144);

-- --------------------------------------------------------

--
-- Table structure for table `objednavky`
--

CREATE TABLE `objednavky` (
  `idObjednavky` int(10) UNSIGNED NOT NULL,
  `idUzivatele` int(10) UNSIGNED NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `objednavky`
--

INSERT INTO `objednavky` (`idObjednavky`, `idUzivatele`, `datum`) VALUES
(54, 4, '2020-02-03'),
(55, 4, '2020-02-03'),
(64, 4, '2020-02-03'),
(71, 4, '2020-02-06'),
(75, 4, '2020-02-12'),
(80, 4, '2020-02-17'),
(86, 4, '2020-02-22'),
(89, 4, '2020-03-08'),
(90, 50, '2020-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `objednavky_has_produkty`
--

CREATE TABLE `objednavky_has_produkty` (
  `objednavky_idObjednavky` int(10) UNSIGNED NOT NULL,
  `produkty_idProduktu` int(10) UNSIGNED NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `cenaPriObjednani` decimal(8,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `objednavky_has_produkty`
--

INSERT INTO `objednavky_has_produkty` (`objednavky_idObjednavky`, `produkty_idProduktu`, `qty`, `cenaPriObjednani`) VALUES
(54, 5, 1, '21992.00'),
(55, 7, 1, '4990.00'),
(64, 7, 4, '4990.00'),
(64, 8, 1, '257990.00'),
(64, 10, 1, '32990.00'),
(71, 11, 1, '53990.00'),
(75, 25, 1, '3890.00'),
(75, 75, 1, '38990.00'),
(80, 13, 4, '25990.00'),
(86, 5, 1, '21992.00'),
(86, 11, 1, '53990.00'),
(89, 13, 1, '25990.00'),
(90, 8, 1, '257990.00');

-- --------------------------------------------------------

--
-- Table structure for table `oblibene`
--

CREATE TABLE `oblibene` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUzivatele` int(10) UNSIGNED NOT NULL,
  `idProduktu` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `oblibene`
--

INSERT INTO `oblibene` (`id`, `idUzivatele`, `idProduktu`) VALUES
(30, 40, 11),
(32, 38, 7),
(42, 52, 999),
(43, 52, 0),
(44, 52, 1),
(45, 52, 2),
(48, 52, 3982),
(49, 52, 7136),
(51, 53, 23),
(53, 55, 123),
(55, 64, 25),
(56, 69, 19),
(57, 51, 7),
(59, 635, 57),
(66, 635, 47),
(67, 4, 6),
(71, 4, 58),
(72, 50, 5),
(73, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `produkty`
--

CREATE TABLE `produkty` (
  `idProduktu` int(10) UNSIGNED NOT NULL,
  `nazevProduktu` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `cenaProduktu` decimal(8,2) UNSIGNED NOT NULL,
  `popisProduktu` text COLLATE utf8_czech_ci,
  `kategorieId` int(10) UNSIGNED NOT NULL,
  `imageSource` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`idProduktu`, `nazevProduktu`, `cenaProduktu`, `popisProduktu`, `kategorieId`, `imageSource`) VALUES
(5, 'ASUS TUF Gaming FX505DT-BQ051T', '21992.00', ' Herní notebook populární řady TUF Gaming pro perfektní herní zábavu. 15.6&quot; IPS-level Full HD displej (1920x1080 bodů); 4jádrový procesor AMD Ryzen 5 3550H (2.1GHz, turbo 3.7GHz, 8 vláken); 8GB operační paměti DDR4; grafika NVIDIA GeForce GTX 1650 4GB GDDR5; disk 512GB SSD M.2 PCIe NVMe; bez mechaniky; Bluetooth 5.0, Wi-Fi ac, 3x USB (2x 3.0/3.1/3.2 Gen 1, 1x 2.0), HDMI, HD kamera, RGB podsvícená klávesnice; OS Windows 10 Home.', 1, '../productImages/asusTufGaming.png'),
(6, 'Apple MacBook Pro 13', '34499.00', ' Inovovaný Apple MacBook Pro (2019) s vyšším výkonem, vylepšenou klávesnicí, skleněným vícedotykovým proužkem Touch Bar a snímačem Touch ID. 4jádrový procesor Intel Core i5 (1.4GHz, TB 3.9GHz); 8GB operační paměti DDR3; 13.3&quot; Retina displej 2560 × 1600 bodů; grafika Intel Iris Plus Graphics 645; 128GB SSD PCIe; bez mechaniky; Wi-Fi ac, Bluetooth 5.0, 2x Thunderbolt 3/USB Type-C 3.1/3.2, kamera FaceTime HD, podsvícená klávesnice; operační systém macOS.', 1, '../productImages/MacBookPro13.png'),
(7, 'Acer Aspire 1', '4990.00', ' Dostupný notebook pro každodenní běžné požadavky na práci i zábavu. 2jádrový procesor Intel Celeron N4000 (1.1GHz, TB 2.6GHz); 4GB operační paměti DDR4; 14&quot; HD displej; grafika Intel UHD Graphics; disk 64GB eMMC; bez mechaniky; Bluetooth, Wi-Fi ac, kamera, 3x USB (1x 3.0/3.1/3.2 Gen 1, 2x 2.0), HDMI, čtečka paměťových karet; OS Windows 10 v režimu S.', 1, '../productImages/AcerAspire1.png'),
(8, 'EUROCOM Sky X9C', '257990.00', ' Výkonný herní notebook a pracovní stanice s možností upgradu jako stolní počítač. 8jádrový procesor Intel Core i9-9900K (3.6GHz, TB 5GHz, HyperThreading); 128GB RAM DDR4; 17.3&quot; IPS Ultra HD displej (3840x2160 bodů); 2x grafika NVIDIA GeForce GTX 1080 8GB GDDR5X v zapojení SLI; disky 1TB SSD M.2 PCIe NVMe a 1TB HDD; bez mechaniky; Wi-Fi ac, Bluetooth 5.0, 2x GLAN, 5x USB 3.0/3.1, 2x USB 3.1 Type-C/Thunderbolt 3, HDMI 2.0, 2x mini DisplayPort, Full HD kamera, čtečka paměťových karet, čtečka otisků prstů, zvuk Sound BlasterX Pro Gaming 360, podsvícená klávesnice; operační systém Windows 10 Pro.', 1, '../productImages/EurocomSkyX9C.png'),
(9, 'MSI GF63 Thin 9SC-255CZ', '22990.00', ' Herní notebook v tenkém a lehkém provedení s minimálním rámečkem kolem displeje. 4jádrový procesor Intel Core i5-9300H (2.4GHz, TB 4.1GHz, HyperThreading), 8GB RAM DDR4, 15.6&quot; IPS-level Full HD displej (1920 x 1080 bodů), grafika NVIDIA GeForce GTX 1650 Max-Q 4GB GDDR5, disk 512GB SSD M.2 PCIe, bez mechaniky, Wi-Fi ac, Bluetooth 5.0, GLAN, 3x USB 3.0/3.1/3.2 Gen 1, 1x USB Type-C 3.1/3.2 Gen 1, HDMI, HD kamera, zvuková technologie Nahimic 3, červeně podsvícená herní klávesnice, operační systém Windows 10 Home.', 1, '../productImages/MSI_GF63.png'),
(10, 'Apple MacBook Air 13', '32990.00', ' Nová generace Apple MacBook Air pro rok 2019 s 13.3palcovým Retina displejem s technologií True Tone, Touch ID a Force Touch trackpadem. 2jádrový procesor Intel Core i5 8. generace (1.6GHz, TB až 3.6GHz); 8GB RAM DDR3; 13.3&quot; IPS Retina displej 2560 × 1600 bodů; grafika Intel UHD Graphics; disk 128GB SSD PCIe; hliníková konstrukce; Wi-Fi ac, Bluetooth, 2x Thunderbolt 3/Type-C, kamera FaceTime HD; operační systém macOS.', 1, '../productImages/AppleMacBookAir13.png'),
(11, 'Samsung Galaxy Fold, 12GB/512GB', '53990.00', ' Revoluční chytrý telefon se skládací konstrukcí, který je nabitý nejnovější technologií. Hlavní displej Infinity Flex 7.3&quot; Dynamic AMOLED s rozlišením 2152 x 1536 bodů, vnější displej 4.6&quot; Super AMOLED s rozlišením 1680 x 720 bodů, 8jádrový procesor s frekvencí až 2.84GHz, 12GB operační paměti, 512GB interní paměť, fotoaparáty: zadní 12Mpx Super Speed Dual pixel F1.5/2.4 OIS, teleobjektiv 12Mpx F2.4 OIS, ultraširokoúhlý 16Mpx F2.2, vnitřní přední 10Mpx F2.2 + 8Mpx F1.9, vnější přední 10Mpx F2.2, podpora sítí 5G a LTE, Bluetooth 5.0, NFC, WiFi ax, GPS/Glonass/BDS/Galileo, USB Type-C, podpora bezdrátového nabíjení a sdílení energie Qi, rychlé nabíjení, čtečka otisků prstů, podpora DeX, 4235 mAh baterie, platforma Android 9 Pie.', 2, '../productImages/SamsungGalaxFold.png'),
(12, 'Apple iPhone 11 Pro Max, 512GB', '43788.00', 'Nová generace iPhone s revoluční trojitou fotosoustavou, displejem OLED Super Retina XDR, ještě vyšším výkonem, umělou inteligencí a řadou novinek. 6.5&quot; displej s širokým barevným gamutem, technologií TrueTone a Haptic Touch, rozlišení 2688 × 1242 bodů; 6jádrový čip A13 Bionic; 512 GB interní paměti; trojitý 12MP fotoaparát (AI, ƒ/1.8 wide, ƒ/2.4 ultrawide a ƒ/2.0 tele, objektivy 13/26/52mm, dvojitá OIS); přední 12MP kamera TrueDepth s vylepšeným Face ID; LTE. Bluetooth 5.0, NFC, Wi-Fi ax, GPS/ Glonass, rozhraní Lightning, odolnost proti vodě a prachu IP68, podpora bezdrátového nabíjení Qi, rychlé nabíjení a prodloužená výdrž baterie, operační systém iOS 13.', 2, '../productImages/Apple iPhone11ProMax.png'),
(13, 'GOOGLE Pixel 4, 6GB/64GB', '25990.00', ' Chytrý telefon Pixel 4. generace s vynikajícím výkonem, duálním fotoaparátem, skvělou výbavou, nejnovějším Androidem a zárukou pravidelných aktualizací. 5.7&quot; OLED displej s Full HD+ rozlišením 2280 x 1080 bodů, 8jádrový procesor Qualcomm Snapdragon 855 až 2.84GHz, 6GB RAM, 64GB interní paměti, zadní fotoaparáty 12.2Mpx (f/1.7, DP PDAF, OIS) a telefoto 16Mpx (f/2.4, OIS), přední fotoaparát 8Mpx f/2.0, Wi-Fi ac, Bluetooth 5.0, podpora LTE, USB Type-C, GPS/ Glonass/ BDS/ Galileo, identifikace tváře, technologie Soli radar, baterie 2800mAh s funkcí rychlého nabíjení a bezdrátového nabíjení Qi, OS Android.', 2, '../productImages/GooglePixel4.png'),
(14, 'OnePlus 7T Pro, McLaren Edition', '21990.00', ' Prémiový chytrý telefon s exkluzivním trojitým fotoaparátem, obrovským výkonem, umělou inteligencí a fantastickým Fluid AMOLED Full Screen displejem. 6.67&quot; 90Hz displej s QHD+ rozlišením 3120 x 1440 bodů, 8jádrový procesor Snapdragon 855+ až 2.96GHz, 12GB operační paměti, 256GB interní paměti, zadní fotoaparáty 48 Mpx (f/1.6), 16 Mpx (117°, f/2.2) a 8 Mpx (3x optický zoom, f/2.4), výsuvná přední selfie kamera 16Mpx f/2.0, LTE, Bluetooth 5.0, WiFi ac, GPS/ Glonass/ BeiDou /Galileo, USB Type-C, čtečka otisků prstů v displeji, baterie 4085 mAh s podporou rychlého nabíjení Warp Charge 30T, platforma OxygenOS (Android).', 2, '../productImages/OnePlus7TPro McLaren Edition.png'),
(15, 'Xiaomi Mi 9T Pro, 6GB/128GB', '9490.00', ' Úžasný chytrý telefon se špičkovým výkonem, oceňovaným trojitým fotoaparátem, umělou inteligencí a AMOLED Full Screen displejem. 6.39&quot; displej s Full HD+ rozlišením 2340 x 1080 bodů, 8jádrový procesor Snapdragon 855 až 2.84GHz, 6GB operační paměti, 128GB interní paměti, zadní fotoaparáty 48 Mpx, 13 Mpx a 8 Mpx (teleobjektiv), přední selfie kamera 20Mpx, LTE, Bluetooth 5.0, WiFi ac, GPS/Glonass/BeiDou/Galileo, USB Type-C, čtečka otisků prstů v displeji, Li-Pol baterie 4000 mAh, platforma Android 9 s uživatelským rozhraním MIUI 10.', 2, '../productImages/XiaomiMi9TPro.png'),
(16, 'Samsung Galaxy S10 Lite, 8GB/128GB', '16490.00', ' Chytrý telefon top řady Galaxy S v inovovaném provedení s obrovským Infinity-O bezrámečkovým displejem, trojitým fotoaparátem a řadou pokročilých funkcí. 6.7&quot; Super AMOLED Plus displej s Full HD+ rozlišením 2400 x 1080 bodů, 8jádrový procesor Snapdragon 855, 8GB operační paměti, 128GB interní paměti, zadní fotoaparáty 48Mpx (f/2.0) + 12Mpx (123 stupňů, f/2.2) + 5Mpx (makro, f/2.4), přední selfie kamera 32Mpx (f/2.2), LTE, Bluetooth 5.0, NFC, Wi-Fi ac, GPS/ GLONASS/ GALILEO/ BDS, USB Type-C, čtečka otisků v displeji, baterie 4500 mAh s podporou rychlého nabíjení, platforma Android.', 2, '../productImages/SamsungGlaxyS10lite.png'),
(17, 'Apple Pro Display XDR - bez stojanu', '139990.00', ' Monitor Apple obohatí vaši počítačovou sestavu o panel o úhlopříčce 32&quot;. Poměr stran je 16:9. Obraz se vykresluje pomocí technologie IPS, která boduje špičkovým podáním barev a velkými pozorovacími úhly. Povrch panelu je Lesklý, obraz je proto živý a patřičně výrazný. Co do rozlišení obdržel monitor hodnoty 6016 × 3384 px. Obnovovací frekvence 60 Hz platí za obvyklý standard. Značka Apple nastavila hodnotu jasu na 1600 cd/m2. Pro uživatele, kteří pracují s grafikou je důležitá barevná hloubka, tento model má 10 bit. K propojení s počítačem budete mít k dispozici Thunderbolt a USB-C.', 3, '../productImages/Apple Pro Display XDR.png'),
(18, 'ProStand', '28990.00', ' \r\nKaždý aspekt Pro Standu počítá s potřebami profesionálů. Výška, náklon, otočení, všechno se dá nastavit. Hladce tak Pro Display XDR začleníš do jakéhokoli pracovního prostředí. ( ͡° ͜ʖ ͡°) ', 3, '../productImages/ProStand.png'),
(19, 'AOC C24G1 - LED monitor 24&quot;', '4690.00', ' Herní 24&quot; monitor s Full HD 1920x1080 rozlišením, zakřivením v hodnotě 1500R, obnovovací frekvencí 144 Hz, dobou odezvy 1 ms, poměrem stran 16:9, VA podsvícením, podporou 16,7 milionu barev a technologií FreeSync.', 3, '../productImages/AOC C24G1.png'),
(20, 'LG 38WK95C - LED monitor 38&quot;', '27490.00', ' IPS monitor, úhlopříčka 38&quot;, UltraPanoramic zakřivení, formát obrazovky 21:9, rozlišení 3840 x 1600 pixelů, sRGB 99%, 1,07 miliard barev, jas 300 cd/m2, kontrastní poměr 1000:1, úhly pohledu (horizontální/vertikální) 178°/178°, odezva 5 ms. Rozhraní: HDMI, DP, USB 3.0, USB-C, Audio. Reproduktory 2x 10 W.', 3, '../productImages/LG 38WK95C.png'),
(21, 'Samsung CRG90 - LED monitor 49&quot;', '24469.00', ' Zakřivený herní monitor s VA panelem a obnovovací frekvencí 120 Hz, který vám umožní vychutnat si neuvěřitelné herní výkony bez rozmazání zobrazovaného obsahu na obrazovce. Herní módy. Quantum dot. Ultra-široká 49&quot; obrazovka s poměrem 32:9. VA panel, zakřivení 1800R, rozlišení 5120 x 1440 px, pozorovací úhly 178°, odezva 4ms, konektory: 1x HDMI, 2x DisplayPort.', 3, '../productImages/Samsung CRG90.png'),
(22, 'ZOWIE by BenQ XL2411P - LED monitor 24&quot;', '4998.00', ' Herní monitor 24&quot; širokoúhlý 1920 x 1080 Full HD, 144 Hz, doba odezvy 1ms, jas 350cd/m2, kontrast 1000:1, DVI-DL, 16,7 milionů barev, TN, HDMI x 1, reproduktory.', 3, '../productImages/ZOWIE XL2411P.png'),
(23, 'Apple AirPods 2019 s nabíjecím pouzdrem', '4770.00', ' Bezdrátová sluchátka Apple AirPods 2019 mají oproti minulé verzi až 2x rychlejší přepínání mezi aktivními zařízeními, 1,5x rychlejší spojení telefonních hovorů, až o 30 procent nižší latenci při hraní her a vydrží až 5 hodin poslechu. Bohatý, vysoce kvalitní zvuk a hlas. Automaticky se zapnou, automaticky se připojí. Snadné nastavení pro všechna zařízení Apple a jejich hladké přepínání. Rychlý přístup k Siri, zapnutí přehrávání nebo přeskakování skladeb dvojitým klepnutím. Rychlé nabíjení v pouzdře, které se dá nabíjet konektorem Lightning.', 4, '../productImages/Apple AirPods 2019.png'),
(24, 'HyperX Cloud II, červená', '2490.00', ' Kvalitní uzavřená poslechová nebo herní sluchátka s mikrofonem a externí zvukovou kartou do portu USB, odolná konstrukce, pasivní potlačení okolního hluku, pohodlné náušníky, frekvenční rozsah 15 - 25 000 Hz, impedance 60 ohmů, citlivost 98dB, 53mm dynamické měniče, délka kabelu 1m + 2m prodlužovací kabel, konektor 3,5mm jack, elegantní HyperX design.', 4, '../productImages/HyperXCloud2.png'),
(25, 'Samsung Galaxy Buds (2019), černá', '3890.00', ' Bezdrátová Bluetooth sluchátka v komfortním a praktickém provedení s dokonalým zvukem prémiové značky AKG. Podporují bezdrátové nabíjení Qi a dobíjení formou bezdrátového sdílení energie (Galaxy S10). Vestavěná baterie 58mAh ve sluchátkách a 252mAh v pouzdru. Až 6 hodin poslechu na jedno nabití.', 4, '../productImages/SamsungGalaxyBuds2019.png'),
(26, 'SteelSeries Arctis Pro Wireless, černá', '8490.00', ' Úžasná bezdrátová herní sluchátka SteelSeries Arctis Pro Wireless nabízí perfektní zvuk s frekvenčním rozsahem od 10 Hz do 40 kHz, což je dvojnásobek oproti standardu. Impedance činí 32 ohmů, citlivost 102 dB. Impedance mikrofonu je 2200 ohmů, citlivost -38 dB, frekvence 100 – 10 000 Hz. Jsou kompatibilní s Windows 7+ a Mac OS X 10.9+. Navíc disponují řadou zajímavých technologií.', 4, '../productImages/SteelSeries Articts Pro Wireless.png'),
(27, 'Samsung Sluchátka AKG Titanium Gray (Bulk)', '299.00', ' Kvalitní sluchátka do uší vyladěná legendárními mistry zvuku AKG. Frekvenční rozsah 20 Hz až 20 kHz, citlivost 93.2 dB, impedance 32 ohmů. Dálkový ovladač a mikrofon na kabelu. Rozhraní: 3.5 mm. Bulk balení.', 4, '../productImages/AKG Titanium.png'),
(28, 'Razer Hammerhead True Wireless, černá', '3149.00', ' Bezdrátová sluchátka s vychytaným designem, velice detailní zvuk podkreslený jemnou dynamikou, redukce okolního šumu, široký frekvenční rozsah 20 Hz až 20 kHz s citlivostí 91 +/- 3 dB a impedancí 32 Ohmů. Připojují se přes Bluetooth s dosahem do 10 m. Vydrží hrát 4 hodiny a 12 dalších hodin s nabíjecím krytem, nabíjí se 1,5 h.', 4, '../productImages/RazerHammerhead.png'),
(29, 'AMD Ryzen Threadripper 3970X', '54990.00', ' Extrémně výkonný procesor 3. generace AMD Ryzen s označením Threadripper, socket sTRX4, 32 fyzických jader (64 vláken), frekvence 3,7 GHz (až 4,5 GHz boost), vyrovnávací paměť cache 16 MB (L2), 7 nm výrobní proces, TDP 280 W, podpora PCI 4.0.', 7, '../productImages/AMD Ryzen Threadripper.png'),
(32, 'Intel Core i5-9400F', '3999.00', ' Výkonný procesor 9. generace Coffee Lake Refresh, socket LGA 1151, 6 fyzických jader (6 vláken), frekvence 2,9 GHz (až 4,1 GHz v Turbo režimu), vyrovnávací paměť 9 MB SmartCache, 14 nm výrobní proces, podpora pamětí DDR4 2666 MHz, PCI-Express 3.0, TDP 65 W.', 7, '../productImages/i5-9400F.png'),
(33, 'Intel Core i7-9700K', '9999.00', ' Výkonný procesor 9. generace Coffee Lake Refresh, socket LGA 1151, 8 fyzických jader (8 vláken), frekvence 3,6 GHz (až 4,9 GHz v Turbo režimu), vyrovnávací paměť 12 MB SmartCache, 14 nm výrobní proces, podpora pamětí DDR4 2666 MHz, PCI-Express 3.0, integrovaná grafika Intel UHD Graphics 630, TDP 95 W, odemčený násobič.', 7, '../productImages/i7-9700K.png'),
(34, 'Intel Pentium Gold G5400', '1540.00', ' Intel Pentium G5400, výkonný procesor Intel 8. generace, architektura Coffee Lake, socket LGA 1151, 2 fyzická jádra (4 vlákna), frekvence 3,7 GHz, vyrovnávací paměť cache 4 MB, 14 nm výrobní proces, podpora pamětí DDR4 2400, PCI-Express 3.0 (x16), integrovaná grafika Intel UHD Graphics 610, TDP: 54 W.', 7, '../productImages/PentiumGold.png'),
(35, 'Intel Xeon Gold 6252', '101027.00', ' Výkonný škálovatelný procesor určený pro servery, socket 3647, 24 fyzických jader (48 vláken), frekvence 2,1 GHz (3,7 GHz v Turbo režimu), vyrovnávací paměť cache 36 MB, 14 nm výrobní proces, podpora pamětí DDR4 až 2933 MHz, maximálně 1 TB paměti, PCI-Express 3.0, TDP 150 W.', 7, '../productImages/xeonGold.png'),
(36, 'Intel Core i9-9900K', '13990.00', ' Výkonný procesor 9. generace Coffee Lake Refresh, socket LGA 1151, 8 fyzických jader (16 vláken), frekvence 3,6 GHz (až 5,0 GHz v Turbo režimu), vyrovnávací paměť 16 MB SmartCache, 14 nm výrobní proces, podpora pamětí DDR4 2666 MHz, PCI-Express 3.0, integrovaná grafika Intel UHD Graphics 630, TDP 95 W, odemčený násobič.', 7, '../productImages/i9-9900K.png'),
(37, 'MSI GeForce RTX 2070 SUPER VENTUS OC', '12990.00', ' Extrémně výkonná herní grafická karta v podání MSI, rozhraní PCIe 3.0 x16, architektura Turing, frekvence až 1785 MHz (boost), 8 GB GDDR6 paměti, 256-bit sběrnice, 1x HDMI, 3x DisplayPort, OpenGL 4.5, DirectX 12, VR Ready, MSI Afterburner, NVIDIA: Ansel, G-Sync a HDR.', 8, '../productImages/rtx2070.png'),
(38, 'MSI GeForce GTX 1660 SUPER, 6GB GDDR6', '6465.00', ' Vysoce výkonná herní grafická karta v podání MSI, rozhraní PCIe 3.0 x16, architektura Turing, frekvence až 1815 MHz (boost), 6 GB GDDR6 paměti, 192-bit sběrnice, 1x HDMI, 3x DisplayPort, OpenGL 4.5, DirectX 12, VR Ready, NVIDIA: Ansel a G-Sync.', 8, '../productImages/gtx1660.png'),
(39, 'MSI GeForce GTX 1050 Ti GAMING X 4G', '4202.00', ' Výkonná herní grafická karta, PCIe 3.0, architektura Pascal, základní frekvence 1290/1354/1379 MHz (Silent/Gaming/OC mód), 4 GB GDDR5 paměti s frekvencí 7 008 MHz, 128-bit sběrnice, 1x HDMI, 1x DisplayPort, 1x DVI-D, maximální digitální rozlišení 7680 x 4320, OpenGL 4.5, DirectX 12, NVIDIA GPU Boost 2.0.', 8, '../productImages/gtx1050ti.png'),
(40, 'HP NVIDIA Quadro RTX 6000, 24GB GDDR6', '99990.00', ' Extrémně výkonná grafická karta pro pracovní stanice HP Z4/Z8 G4, PCIe 3.0 x16, architektura Turing, 4608 CUDA, 24 GB GDDR6 paměti, 4x DisplayPort, VirtualLink, maximální rozlišení 2x 7680 x 4320 @ 60 Hz, OpenGL 4.6, Shader Model 5.1, DirectX 12, Vulkan 1.1, NVIDIA NVLink, profesionální 3D podpora.', 8, '../productImages/quadroRTX6000.png'),
(41, 'MSI GeForce RTX 2080Ti', '33990.00', ' Extrémně výkonná herní grafická karta v podání MSI, rozhraní PCIe 3.0 x16, architektura Turing, 11 GB GDDR6 paměti, 352-bit sběrnice, 1x HDMI, 3x DisplayPort, 1x USB typ-C, OpenGL 4.5, DirectX 12, VR Ready, MSI Afterburner, NVIDIA: Ansel, SLI, G-Sync a HDR.', 8, '../productImages/rtx2080ti.png'),
(42, 'MSI GeForce RTX 2060 SUPER , 8GB GDDR6', '11490.00', ' Vysoce výkonná herní grafická karta v podání MSI, rozhraní PCIe 3.0 x16, architektura Turing, frekvence až 1695 MHz (boost), 8 GB GDDR6 paměti, 256-bit sběrnice, 1x HDMI, 3x DisplayPort, 1x USB typ-C, OpenGL 4.5, DirectX 12, VR Ready, MSI Afterburner, NVIDIA: Ansel, G-Sync a HDR.', 8, '../productImages/rtx2060.png'),
(46, 'Seasonic Focus Plus Gold - 750W', '2749.00', ' Počítačový zdroj, výkon 750 W, certifikace 80 Plus Gold, standard Intel ATX 12 V, plně modulární, střední doba mezi poruchami 100 000 hodin, fluidní ventilátor (průměr 120 mm), ochrana: OPP, OVP, UVP, OCP, OTP, SCP. ', 9, '../productImages/seasonicZdroj.png'),
(47, 'Be quiet! System Power 9 - 600W', '1599.00', ' Velmi výkonný zdroj Be quiet! System Power 9 se 600 W a dvěma 12V napájecími dráhami udělá z vašeho  počítace velmi účinný a tichý nástroj pro práci i zábavu. Energetická účinnost je 80 Plus BRONZE a velikost ventilátoru 120 mm. Najdete zde konektory 4pin CPU (2x), ATX 20+4pin, MOLEX (2x), PCI-Express 6+2pin (4x), SATA (6x).', 9, '../productImages/BeQuietZdroj.png'),
(48, 'ASUS ROG THOR 1200P - 1200W', '8399.00', ' Vysoce kvalitní a účinný napájecí zdroj, výkon 1200 W, certifikace 80Plus Platinum, modulární design, adresovatelné RGB LED osvětlení, 0 dB technologie, OLED power displej, ventilátor s ochranou proti prachu IP5X, konektory: 1x 20+4-pin, 2x 4+4-pin, 8x 6+2-pin, 12x SATA, 5x molex a 1x FDD.', 9, '../productImages/asusZdroj.png'),
(50, 'Thermaltake Toughpower GF1 ARGB - 750W', '3599.00', ' Kvalitní napájecí zdroj, výkon 750 W, 80Plus Gold certifikace, standard ATX, plně modulární plochá kabeláž, 140 mm ARGB LED ventilátor, 1x 24-pin, 1x 4+4-pin, 4x 6+2-pin, 9x SATA, 4x Molex, 1x FDD (adaptér).', 9, '../productImages/ThermaltakeZdroj.png'),
(51, 'ASUS ROG-STRIX-750G ', '3990.00', ' Vysoce kvalitní napájecí zdroj, výkon 750 W, certifikace 80Plus Gold, plně modulární, Axial-tech ventilátor, 0 dB technologie, konektory: 1x 20+4-pin, 2x 4+4-pin, 4x 6+2-pin, 8x SATA a 3x molex.', 9, '../productImages/AsusRogZdroj.png'),
(56, 'Corsair Vengeance RGB LED 64GB', '25427.00', ' Kvalitní a rychlá sada paměťových modulů, typ DDR4, frekvence 3466 MHz, kapacita 4x 16 GB, časování CL16 při napětí 1.35 V, optimalizované pro základní desky s nejnovějšími čipsety Intel, podpora Intel XMP 2.0, RGB LED osvětlení chladiče.', 10, '../productImages/CorsairRam.png'),
(57, 'G.SKill TridentZ RGB 4x8GB DDR4 3200', '16490.00', ' Kvalitní a výkonná sada paměťových modulů typu DDR4 ze série TridentZ, RGB LED osvětlení, kapacita 4x 8 GB, rychlost 3200 MHz, časování CL14, napětí 1,35 V, podpora Intel XMP 2.0 profilů.', 10, '../productImages/GSkillZdroj.png'),
(58, 'HyperX Predator RGB 64GB', '9490.00', ' Kvalitní a rychlé paměťové moduly typu DDR4 ze série HyperX Predator, frekvence 3200 MHz, kapacita 4x 16 GB, časování CL16, pracovní napětí 1,35 V, chladič HyperX Predator, RGB LED osvětlení.', 10, '../productImages/HyperxRam.png'),
(59, 'Crucial Ballistix Sport LT Red 32GB ', '8699.00', ' Velmi kvalitní výkonná sada UDIMM operačních pamětí, typ DDR4, kapacita 2x 16 GB, frekvence 2666 MHz, časování CL16, napětí 1,2V, Intel XMP, Dual Rank, designový chladič.', 10, '../productImages/CrucialRam.png'),
(60, 'HyperX Fury Black 16GB', '1989.00', ' Sada kvalitních paměťových modulů typu DDR4 ze série HyperX Fury, frekvence 3200 MHz, kapacita 2x 8 GB, časování CL16 při napětí 1.35 V, asymetrický chladič HyperX Fury, podpora Intel XMP.', 10, '../productImages/HyperxRam16GB.png'),
(61, 'Corsair Dominator Platinum ROG 16GB', '8207.00', ' Kvalitní a rychlá sada paměťových modulů typu DDR4 ze série Dominator Platinum ROG, frekvence 3200 MHz, kapacita 4x 4 GB, časování CL16 při napájení 1.35 V, stylový chladiče, optimalizované pro základní desky s čipsety Intel řady 100.', 10, '../productImages/corsairDominatorRam.png'),
(62, 'SteelSeries Rival 700', '1834.00', ' Herní myš s optickým snímačem, 7 tlačítek, pogumovaný povrch, možnost výběru podsvícení, USB připojení, ergonomický design, RGB podsvícení, Game Sense.', 11, '../productImages/rival700.png'),
(63, 'HyperX Pulsefire Dart, černá', '2890.00', ' Bezdrátová herní myš s podporou bezdrátového Qi nabíjení. Dokonalá ergonomie a koženkový potah pro příjemný úchop. Životnost baterie až 50 hodin. Senzor Pixart 3389. Rozlišení až 16000 DPI, 450 IPS, 50G. Bezdrátové připojení 2,4 GHz. Dělená tlačítka. Bezdrátový USB adaptér součástí.', 11, '../productImages/HyperXMouse.png'),
(64, 'Razer DeathAdder Essential', '699.00', ' Skvělá herní myš populární řady DeathAdder s rozlišením optického senzoru až 6400 dpi, mechanické spínače s životností 10 milionů stisknutí, 5 programovatelných tlačítek, zrychlení až 30 G, rychlost 220 ips, polling rate 1000Hz/1ms, jednobarevné zelené podsvícení.', 11, '../productImages/RazerMouse.png'),
(65, 'SteelSeries Rival 110', '599.00', 'Rival 110 je skvělá herní myš pro profesionální hráče navržena tak, aby vyhovovala všem eSport hrám. S exkluzivním optickým senzorem TrueMove1, dlouhou životností až 30 milionů kliknutí a vysoce odolnou 87,5g lehkou konstrukcí. Díky univerzálnímu ergonomickému tvaru je vhodná pro všechny styly uchopení. ', 11, '../productImages/rival110.png'),
(66, 'Logitech G403 Hero, černá', '1395.00', ' Skvělá herní myš s ergonomickým designem. Volitelné závaží o hmotnosti 10 g. Maximální DPI 16000. Nulové vyhlazování, zrychlení a filtrování. Podsvícení LIGHTSYNC RGB. Dvojitě vstřikované pogumované boční úchyty. 6 programovatelných tlačítek. Mechanický systém zdvihu tlačítek. Volitelné závaží o hmotnosti 10 g. Senzor HERO 16K. Rozlišení 100–16 000 DPI. Frekvence rozhraní USB 1000 Hz (1 ms). Mikroprocesor 32bitový ARM.', 11, '../productImages/LogitechMouse.png'),
(67, 'Logitech G502 Lightspeed, černá', '2990.00', ' Herní optická bezdrátová myš s vynikající rychlostí 1 ms a bezdrátovým připojením LIGHTSPEED je vybavena senzorem HERO 16K s rozlišením 100-16000 DPI a rychlostí 400 palců za sekundu (IPS). Maximální zrychlení 40G, zabudovaná baterie s výdrží až 60 hodin, 11 plně programovatelných tlačítek, primární jsou vybavena mechanickým zdvihem, integrovaná paměť, podsvícení LIGHTSYNC RGB 2 zóny, systém optimalizace hmotnosti.', 11, '../productImages/LogitechWirelessMouse.png'),
(68, 'HyperX Alloy FPS, Cherry MX Red, US', '2249.00', ' Herní klávesnice se stylovým designem, mechanická, kovová vrchní deska, Cherry MX Red, červené nastavitelné podsvícení kláves, červené texturované vybrané herní klávesy, USB, odnímatelný kabel, napájecí USB port, anti-ghosting, plný N-key rollover, 1,8 m opletený kabel, US rozložení kláves.', 12, '../productImages/HyperXAlloyFPS.png'),
(69, 'Razer Huntsman Elite, Razer Linear Optical, US', '5459.00', ' Skvělá herní klávesnice obsahující opto-mechanické spínače, které jsou ovládané světelným paprskem – o 30% rychlejší než konkurenční mechanické spínače. Vysoká odolnost kláves – až 100 milionů kliknutí. Magnetická podložka pod zápěstí. Nad numerickým blokem jsou tři multimediální klávesy a otočný knoflík. Nastavitelné RGB podsvícení ovládané pomocí aplikace Razer Synapse 3. Povrch vyroben z hliníku, klávesnice nabízí 1000Hz ultrapolling a antighosting pro 10 kláves. US rozložení kláves.', 12, '../productImages/RazerHuntsman.png'),
(70, 'SteelSeries Apex 7, QX2 Brown, US', '4890.00', ' Mechanická herní klávesnice s pevnou konstrukcí z hliníku řady 5000, OLED displejem pro zobrazení důležitých informací, odolnými mechanickými spínači QX2, individuálně nastavitelným RGB podsvícením kláves anebo s funkcí anti-ghosting a n-key rollover. US layout.', 12, '../productImages/SteelSeriesKeyboard.png'),
(71, 'ZOWIE by BenQ Celeritas II, US', '3699.00', ' Herní klávesnice osloví svým jednobarevným podsvícením s nastavitelnou intenzitou nebo speciálními optickými spínači a frekvencí 1000Hz Polling. K dispozici 100% N-Key Rollover. Unikátní pevná konstrukce s dlouhou životností. Připojení USB + PS2. Tento model má anglické rozložení kláves.', 12, '../productImages/ZowieKeyboard.png'),
(72, 'Fnatic Gear Streak, Cherry MX Silent Red', '3199.00', ' Extra tenká mechanická klávesnice s vysoce odolnými spínači Cherry MX Silent Red. Klávesnice disponuje odnímatelnou ergonomickou PU koženou podložkou, RGB podsvícením s různými režimy, USB portem, možností vložení speciálně vytištěného jména v zadní části klávesnice anebo FN klávesami a možností naprogramování kláves F1-F6. Pro jednoduché a rychlé nastavení je ke klávesnici dodáván OP software.', 12, '../productImages/FnaticKeyboard.png'),
(73, 'Xtrfy K4 RGB, černá', '2999.00', ' Mechanická klávesnice s přizpůsobitelným RGB osvětlením. Odolná konstrukce. Spínače Kailh Red s životností až 70 milionů kliknutí. Rychlost odezvy 1000 Hz. Funkce N-key rollover. Podsvícení v 6 zónách.', 12, '../productImages/XtrfyKeyboard.png'),
(74, 'Corsair AX850 - 850W', '6680.00', ' Vysoce kvalitní a výkonný zdroj s modulární kabeláží, výkon 850 W, 80Plus Titanium certifikace, standard ATX, 135 mm ventilátor, bezotáčkový režim, konektory: 1x 20+4-pin, 2x 4+4-pin, 6x 6+2-pin, 16x SATA, 6x Molex, 1x FDD.', 9, '../productImages/CorsairZdroj850.png'),
(75, 'Samsung Galaxy S20 Ultra 5G', '38990.00', ' Prémiový chytrý telefon řady Galaxy S, který přináší vylepšené fotoaparáty, superrychlý 120Hz displej, skvělý výkon, nové funkce a podporu připojení 5G. 6.9&quot; displej Dynamic AMOLED 2X Infinity-O s rozlišením 3200 x 1440 bodů, 8jádrový procesor Exynos 990, 16GB operační paměti, 512GB interní paměť, slot pro paměťové karty microSD; fotoaparáty: zadní Ultra Wide: 12 Mpx, F2.2 (120˚) + Wide-angle: 108 Mpx, F1.8 (79˚), PDAF, OIS + Telephoto: 48 Mpx, PDAF, F3.5 (24˚), OIS + DepthVision: snímač hloubky, přední 40 Mpx F2.2 PDAF, 5G a LTE cat.20, Bluetooth 5.0, NFC, WiFi ac/ax, GPS/Glonass/BDS/Galileo, USB Type-C, podpora bezdrátového nabíjení a sdílení energie Qi, rychlé nabíjení, čtečka otisků prstů v displeji, odolné provedení IP68, podpora DeX, zvuk AKG, 5000 mAh baterie, platforma Android 10 s One UI 2.', 2, '../productImages/S20Ultra5G1581524089.png'),
(81, 'Samsung Galaxy Z Flip', '37990.00', ' Revoluční chytrý telefon se skládací konstrukcí, který uchvátí svým designem a překvapí malými rozměry. Hlavní displej Infinity Flex 6.7&quot; Dynamic AMOLED s rozlišením 2636 x 1080 bodů, vnější displej 1.1&quot; Super AMOLED s rozlišením 300 x 112 bodů, 8jádrový procesor Snapdragon 855+, 8GB operační paměti, 256GB interní paměť, fotoaparáty: zadní Wide-angle: 12 Mpx, Super Speed Dual Pixel AF, OIS, F1.8, 1.4μm, FOV: 78˚ + Ultra Wide: 12 Mpx, F2.2, 1.12μm FOV: 123˚, selfie fotoaparát 10 Mpx F2.4 (80˚), LTE, Bluetooth 5.0, NFC, WiFi ac, GPS/Glonass/BDS/Galileo, USB Type-C, podpora bezdrátového nabíjení a sdílení energie Qi, rychlé nabíjení, čtečka otisků prstů, 3300 mAh baterie, platforma Android 10 s One UI 2.', 2, '../productImages/SamsungZFlip1582799640.png'),
(82, 'Huawei P30 Pro, černá', '16991.00', ' Exkluzivní chytrý telefon s revolučním čtyřnásobný fotoaparátem Leica se SuperZoom objektivem, obrovským výkonem, umělou inteligencí a špičkovým OLED FullView displejem. 6.47&quot; displej s Full HD+ rozlišením 2340 x 1080 bodů, 8jádrový procesor Kirin 980 až 2.6GHz, 6GB operační paměti, 128GB interní paměti, slot pro paměťové karty, zadní fotoaparáty 40Mpx (f/1.6), 20Mpx (ultraširokoúhlý, f/2.2) a 8Mpx (10x SuperZoom teleobjektiv, f/3.4), přední selfie kamera 32Mpx f/2.0, LTE, Bluetooth 5.0, NFC, WiFi ac, GPS/ Glonass/ BeiDou /Galileo/ QZSS, USB Type-C, 3.5mm jack, čtečka otisků prstů v displeji, identifikace tváře, baterie 4200 mAh s s podporou rychlého nabíjení SuperCharge a bezdrátového 15W, platforma Android s uživatelským rozhraním EMUI.', 2, '../productImages/p30pro1583343951.png'),
(83, 'Oppo Reno 2Z, černá', '12990.00', ' Chytrý telefon s kvalitním čtyřnásobným fotoaparátem, vysouvací selfie kamerou, velkým displejem, vysokým vykonem a precizním designem. 6.5&quot; displej AMOLED s Full HD+ rozlišením 2340 x 1080 bodů, 8jádrový procesor Helio P90 až 2.2 GHz, 8GB RAM, 128GB interní paměti, zadní fotoaparáty 48 (f/1.7) + 8 + 2 + 2 MPx, přední fotoaparát 16 MPx, Wi-Fi ac, Bluetooth 5.0, NFC, LTE, USB Type-C, GPS/ Glonass/ Beidou, čtečka otisků prstů v displeji, baterie 4000mAh s funkcí rychlonabíjení, OS Android s rozhraním ColorOS.', 2, '../productImages/oppoReno2Z1583344217.png'),
(84, 'Samsung Galaxy A51, černá', '8990.00', ' Chytrý telefon řady Galaxy A s novým čtyřnásobným fotoaparátem, řadou pokročilých funkcí a parádním Infinity-O bezrámečkovým displejem. 6.5&quot; Super AMOLED displej s Full HD+ rozlišením 2400 x 1080 bodů, 8jádrový procesor Exynos 9611 až 2.3GHz, 4GB operační paměti, 128GB interní paměti, zadní fotoaparáty 48Mpx (f/2.0) + 12Mpx (123 stupňů, f/2.2) + 5Mpx (makro, f/2.4) + 5Mpx (bokeh, f/2.2), přední selfie kamera 32Mpx (f/2.2), LTE, Bluetooth 5.0, NFC, Wi-Fi ac, GPS/ GLONASS/ GALILEO/ BDS, USB Type-C, 3.5mm jack, čtečka otisků v displeji, baterie 4000 mAh s podporou rychlého nabíjení 15W, platforma Android.', 2, '../productImages/SamsungA511583344564.png'),
(85, 'OnePlus 7T', '13990.00', ' Prémiový chytrý telefon s obrovským výkonem, špičkovým trojitým fotoaparátem, umělou inteligencí a rychlým 90Hz Fluid AMOLED Full Screen displejem. 6.55&quot; displej s Full HD+ rozlišením 2400 x 1080 bodů, 8jádrový procesor Snapdragon 855+, 8GB operační paměti, 128GB interní paměti, zadní fotoaparáty 48 Mpx (f/1.6), 16 Mpx (117°,f/2.2) a 12 Mpx (2x optický zoom,f/2.2), přední selfie kamera 16Mpx f/2.0, LTE, Bluetooth 5.0, WiFi ac, GPS/ Glonass/ BeiDou /Galileo, USB Type-C, čtečka otisků prstů v displeji, baterie 3800 mAh s podporou rychlého nabíjení Warp Charge 30T, platforma OxygenOS (Android).', 2, '../productImages/OnePlus7T1583344769.png'),
(86, 'Dell XPS 15', '52990.00', ' Velmi kompaktní 15.6&quot; notebook s úžasným InfinityEdge displejem a vysokým výkonem pro firmy i domácnosti. 6jádrový procesor Intel Core i7-9750H (2.6GHz, TB 4.5GHz, HyperThreading); 16GB RAM DDR4; 15.6&quot; OLED Ultra HD displej (3840 x 2160 bodů, 100% DCI-P3); grafika NVIDIA GeForce GTX 1650 4GB GDDR5; disk 512GB SSD M.2 PCIe NVMe; bez mechaniky; Wi-Fi ax, Bluetooth 5.0, 2x USB 3.0/3.1/3.2 Gen 1, USB 3.1/3.2 Gen 2 Type-C/Thunderbolt 3, HDMI, čtečka paměťových karet, čtečka otisků prstů, HD kamera, podsvícená klávesnice; operační systém Windows 10 Home.', 1, '../productImages/DellXps151585046558.png'),
(87, 'ASUS StudioBook W700G2T', '64990.00', 'Výkonný notebook pro profesionální použití designéry, architekty, animátory nebo programátory. 6jádrový procesor Intel Core i7-9750H (2.6GHz, TB 4.5GHz, HyperThreading); 32GB operační paměti DDR4; 17&quot; IPS WUXGA displej (1920 x 1200 bodů, DCI-P3: 97%); grafika NVIDIA Quadro T2000 4GB GDDR5; 1TB SSD M.2 PCIe NVMe; Bluetooth 5.0, Wi-Fi ax, HD kamera, 3x USB 3.1/3.2 Gen 2, 1x Thunderbolt 3/Type-C Gen 2, HDMI, čtečka paměťových karet, čtečka otisků prstů, podsvícená klávesnice, zvuk SonicMaster Premium; OS Windows 10 Pro. ', 1, '../productImages/AsusStudioBook1585046987.png'),
(88, 'Lenovo ThinkPad E15-IML, černá', '27990.00', 'Firemní notebook pro každodenní použití nejen v kanceláři, ale i na cestách se solidní výdrží při práci na baterii. 15.6&quot; IPS Full HD displej (1920x1080 bodů), 4jádrový procesor Intel Core i7-10510U (1.8GHz, TB 4.9GHz, HyperThreading), 16GB RAM DDR4, disk 512GB SSD M.2 PCIe NVMe, bez mechaniky, grafika AMD Radeon RX 640 2GB GDDR5, Wi-Fi ax, Bluetooth 5.0, 2x USB 3.0/3.1/3.2 Gen 1, 1x USB 2.0, 1x USB 3.1/3.2 Type-C Gen 1, HDMI, HD kamera, čtečka otisků prstů, podsvícená klávesnice, OS Windows 10 Pro. ', 1, '../productImages/LenovoThinkPadE151585047294.png'),
(89, 'Acer Aspire 3, černá', '15090.00', ' Notebook v elegantním designu pro každodenní běžné požadavky na práci i zábavu. 2jádrový procesor Intel Core i3-10110U (2.1GHz, TB 4.1GHz HyperThreading); 8GB operační paměti DDR4; 15.6&quot; Full HD displej; grafika Intel UHD Graphics; disk 512GB SSD M.2 PCIe NVMe; bez mechaniky; Bluetooth 4.2, Wi-Fi ac, kamera, 3x USB (1x USB 3.0/3.1/3.2 Gen 1, 2x 2.0), HDMI; OS Windows 10 Home.', 1, '../productImages/AcerAspire31585047534.png'),
(90, 'ASUS Zenbook Flip, šedá', '35899.00', ' Skvěle přenosný notebook v konvertibilním provedení otočného displeje s odolnou kovovou konstrukcí a dlouhou výdrží provozu na baterii. 4jádrový procesor Intel Core i7-8565U (1.8GHz, TB 4.6GHz, HyperThreading); 16GB operační paměti DDR4; dotykový 15.6&quot; IPS Full HD displej; grafika NVIDIA GeForce GTX 1050 Max-Q 2GB GDDR5; disk 512GB SSD M.2 PCIe NVMe; USB (1x Type-C 3.1/3.2 Gen 1, 1x 3.1/3.2 Gen 1, 1x 2.0), Bluetooth 5.0, Wi-Fi ac, IR/HD kamera, čtečka paměťových karet, čtečka čipových karet, zvuk SonicMaster, podsvícená klávesnice; OS Windows 10 Home.', 1, '../productImages/AsusZenBookFlip1585047861.png'),
(91, 'Lenovo Chromebook, růžová', '6890.00', ' Tenký, lehký a snadno přenosný 14&quot; Chromebook pro všestranné využití. 2jádrový procesor Intel Celeron N4000 (1.1GHz, TB 2.6GHz), 4GB RAM DDR4, 14&quot; Full HD displej, grafika Intel UHD Graphics, disk 64GB eMMC, bez mechaniky, Wi-Fi ac, Bluetooth 4.2, 4x USB (2x Type-C 3.1/3.2 Gen 1, 2x 3.0/3.1/3.2 Gen 1), čtečka paměťových karet, HD kamera, operační systém Chrome OS.', 1, '../productImages/LenovoChromebook1585048187.png'),
(92, 'Alienware AW5520QF - OLED', '88888.00', ' První 55&quot; herní monitor na světě. Je vybaven UHD rozlišením 3840 x 2160 s OLED technologií, antireflexní úpravou a tvrdým povrchem. Má 81 PPI, jas 400 cd/m2, podporuje 1,07 miliardy barev. Obnovovací frekvence je 120 Hz, doba odezvy 0,5 ms. Pozorovací úhly 120 ° horizontálně i vertikálně. Z konektorů nabízí 3x HDMI 2.0, 1x DP 1.4, 1x USB 3.0 pro připojení k počítači, 4 x USB 3.0 pro připojení periferních zařízení. Rozměry včetně stojanu 770,55 x 1225,9 x 263,9 mm. Hmotnost 25,5 kg.', 3, '../productImages/OledAlienware1585505935.png'),
(93, 'Dell Alienware AW2720HF - 27&quot;', '11690.00', ' Herní monitor pro hraní na maximum. Úžasný herní design v robustním provedení. Technologie AMD Freesync, obnovovací frekvence 240 Hz, 1ms odezva. Velikost obrazovky 27&quot; s FullHD rozlišením 1920 x 1080 bodů, poměr stran 16:9. Konektory USB 3.1, audio, 2x HDMI, DisplayPort. Rozměry 443,1 - 559,4 x 612,7 x 215,9 mm. Hmotnost 4,8 kg.', 3, '../productImages/Aw27201585506162.png'),
(94, 'HP OMEN - LED monitor 27&quot;', '11790.00', ' LCD monitor s LED podsvícením, úhlopříčka 27&quot;, typ panelu: TN s LED podsvícením, rozlišení 2560 x 1440, 16:9, jas 350 nit, kontrastní poměr: 1000 : 1 (statický), 10 mil. : 1 (dynamický), doba odezvy: 1.8 ms GtG, náklon: - 5 až + 23°, nastavitelná výška, Nvidia G-Sync, frekvence 165 Hz. Rozhraní: 1 x HDMI, 1 x audio in, 1 x DP 1.2 s podporou HDCP, 2 x USB 3.0.', 3, '../productImages/OmenMonitor1585506545.png'),
(95, 'ASUS ProArt PA34VC 34&quot;', '30990.00', ' Zakřivený herní monitor od firmy Asus je vybaven 34&quot; displejem s UWQHD rozlišením 3440 x 1440 pixelů a IPS panelem. Kombinací rychlé obnovovací frekvence 100 Hz a krátké doby odezvy 1 ms je dosaženo plynulého zobrazení obrazu bez sekání. Pro co možná nejlepší zážitek ze hry je monitor zakřivený s pozorovacím úhlem 178 °. Podpora HDR, Thunderbolt 3 pro přenosy dat, 100 % sRGB s přesností (?E &lt; 2) a kalibrace hardwaru. Připojení k monitoru je možné přes 2 x HDMI, 2 x Thunderbolt3 port a Display port.', 3, '../productImages/AsusProArt1585508304.png'),
(96, 'Dell UltraSharp', '16990.00', ' Širokoúhlý 43“ monitor Dell s rozlišením 4K 3840 x 2160, široké pozorovací úhly 178°, technologie IPS, odezva 8 ms, kontrast 1000:1, jas 350 cd/m2, 1,07 miliard barev, 16:9, konektory: 2x HDMI, VGA, DP, mDP, RS232, sluchátka, audio, USB HUB – 5x USB 3.0, reproduktory 2x 8 W.', 3, '../productImages/DellUltraSharp1585508576.png'),
(97, 'Samsung C27R500 27&quot;', '3990.00', ' Zakřivený monitor s rozlišením 1920 x 1080 bodů. 27&quot; displej s jasem 250 cd/m2, VA panel pro intenzivnější a jednotnější černou, statický kontrast 3000:1, doba odezvy 4 ms, poměr stran 16:9, technologie Flicker Free, FreeSync, Eco Saving Plus. Rozhraní D-Sub, HDMI.', 3, '../productImages/SamsungC27R5001585508894.png');

-- --------------------------------------------------------

--
-- Table structure for table `produkty_has_atributy`
--

CREATE TABLE `produkty_has_atributy` (
  `produkty_idProduktu` int(10) UNSIGNED NOT NULL,
  `atributy_idAtributu` int(10) UNSIGNED NOT NULL,
  `hodnota` varchar(100) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `produkty_has_atributy`
--

INSERT INTO `produkty_has_atributy` (`produkty_idProduktu`, `atributy_idAtributu`, `hodnota`) VALUES
(5, 1, '8'),
(5, 3, 'Windows 10 Home'),
(5, 6, 'černá'),
(5, 8, '1920x1080'),
(5, 9, 'Asus'),
(5, 10, '15.6'),
(5, 11, '512'),
(5, 12, '0'),
(5, 13, 'Dedikovaná'),
(5, 14, 'AMD Ryzen 5'),
(5, 18, 'Matný'),
(5, 22, 'ANO'),
(5, 23, 'CZ'),
(5, 26, '2300'),
(5, 43, 'NVIDIA GeForce 1650'),
(6, 1, '8'),
(6, 3, 'Apple Mac OS'),
(6, 6, 'stříbrná'),
(6, 8, '2560x1600'),
(6, 9, 'Apple'),
(6, 10, '13.3'),
(6, 11, '128'),
(6, 12, '0'),
(6, 13, 'Integrovaná'),
(6, 14, 'Intel Core i5'),
(6, 18, 'Matný'),
(6, 22, 'ANO'),
(6, 23, 'EN'),
(6, 26, '1370'),
(6, 43, 'Intel Iris Plus Graphics 645'),
(7, 1, '4'),
(7, 3, 'Windows 10 v režimu S'),
(7, 6, 'černá'),
(7, 8, '1366x768'),
(7, 9, 'Acer'),
(7, 10, '14'),
(7, 11, '64'),
(7, 12, '0'),
(7, 13, 'Integrovaná'),
(7, 14, 'Intel Celeron'),
(7, 18, 'Matný'),
(7, 22, 'NE'),
(7, 23, 'CZ'),
(7, 26, '1650'),
(7, 43, 'Intel UHD Graphics'),
(8, 1, '128'),
(8, 3, 'Windows 10 Pro'),
(8, 6, 'černá'),
(8, 8, '3840x2160'),
(8, 9, 'Eurocom'),
(8, 10, '17.3'),
(8, 11, '1024'),
(8, 12, '1000'),
(8, 13, 'Dedikovaná'),
(8, 14, 'Intel Core i9'),
(8, 18, 'Matný'),
(8, 22, 'ANO'),
(8, 23, 'CZ'),
(8, 26, '5500'),
(8, 43, 'NVIDIA GeForce GTX 1080 SLI'),
(9, 1, '8'),
(9, 3, 'Windows 10 Home'),
(9, 6, 'černá'),
(9, 8, '1920x1080'),
(9, 9, 'MSI'),
(9, 10, '15.6'),
(9, 11, '512'),
(9, 12, '0'),
(9, 13, 'Dedikovaná'),
(9, 14, 'Intel Core i5'),
(9, 18, 'Matný'),
(9, 22, 'ANO'),
(9, 23, 'CZ'),
(9, 26, '1860'),
(9, 43, 'NVIDIA GeForce GTX 1650'),
(10, 1, '8'),
(10, 3, 'Apple Mac OS'),
(10, 6, 'stříbrná'),
(10, 8, '2560x1600'),
(10, 9, 'Apple'),
(10, 10, '13.3'),
(10, 11, '128'),
(10, 12, '0'),
(10, 13, 'Integrovaná'),
(10, 14, 'Intel Core i5'),
(10, 18, 'Lesklý'),
(10, 22, 'ANO'),
(10, 23, 'EN'),
(10, 26, '1250'),
(10, 43, 'Intel UHD Graphics 617'),
(11, 1, '12'),
(11, 2, '4235'),
(11, 3, 'Android'),
(11, 4, 'AMOLED'),
(11, 5, '512'),
(11, 6, 'stříbrná'),
(11, 7, '8'),
(11, 8, '2152x1536'),
(11, 9, 'Samsung'),
(11, 10, '7.3'),
(11, 26, '263'),
(12, 1, '4'),
(12, 2, '3969'),
(12, 3, 'Apple iOS'),
(12, 4, 'OLED'),
(12, 5, '512'),
(12, 6, 'zlatá'),
(12, 7, '6'),
(12, 8, '2688x1242'),
(12, 9, 'Apple'),
(12, 10, '6.5'),
(12, 26, '226'),
(13, 1, '6'),
(13, 2, '2800'),
(13, 3, 'Android'),
(13, 4, 'OLED'),
(13, 5, '64'),
(13, 6, 'Oh So Orange'),
(13, 7, '8'),
(13, 8, '2280x1080'),
(13, 9, 'Google'),
(13, 10, '5.7'),
(13, 26, '162'),
(14, 1, '12'),
(14, 2, '4085'),
(14, 3, 'Android'),
(14, 4, 'AMOLED'),
(14, 5, '256'),
(14, 6, 'McLaren Edition'),
(14, 7, '8'),
(14, 8, '3120x1440'),
(14, 9, 'OnePlus'),
(14, 10, '6.67'),
(14, 26, '206'),
(15, 1, '6'),
(15, 2, '4000'),
(15, 3, 'Android'),
(15, 4, 'AMOLED'),
(15, 5, '128'),
(15, 6, 'Glacier Blue'),
(15, 7, '8'),
(15, 8, '2340x1080'),
(15, 9, 'Xiaomi'),
(15, 10, '6.39'),
(15, 26, '191'),
(16, 1, '8'),
(16, 2, '4500'),
(16, 3, 'Android'),
(16, 4, 'SAMOLED'),
(16, 5, '128'),
(16, 6, 'Prism Black'),
(16, 7, '8'),
(16, 8, '2400x1080'),
(16, 9, 'Samsung'),
(16, 10, '6.7'),
(16, 26, '186'),
(17, 4, 'IPS'),
(17, 6, 'stříbrná'),
(17, 8, '6016x3384'),
(17, 9, 'Apple'),
(17, 10, '32'),
(17, 15, '60'),
(17, 16, '1'),
(17, 17, 'Thunderbolt, USB-C'),
(17, 18, 'Matný'),
(17, 19, '96'),
(18, 4, '-'),
(18, 6, '-'),
(18, 8, '-'),
(18, 9, 'Apple'),
(18, 10, '0'),
(18, 15, '0'),
(18, 16, '0'),
(18, 17, '-'),
(18, 18, '-'),
(18, 19, '0'),
(19, 4, 'VA'),
(19, 6, 'černá'),
(19, 8, '1920x1080'),
(19, 9, ' AOC'),
(19, 10, '24'),
(19, 15, '144'),
(19, 16, '1'),
(19, 17, 'DisplayPort, HDMI'),
(19, 18, 'Matný'),
(19, 19, '20'),
(20, 4, 'IPS'),
(20, 6, 'Bílá, Černá, Stříbrná'),
(20, 8, '3840x1600'),
(20, 9, 'LG'),
(20, 10, '37.5'),
(20, 15, '75'),
(20, 16, '5'),
(20, 17, 'DisplayPort, HDMI'),
(20, 18, 'Matný'),
(20, 19, '70'),
(21, 4, 'VA'),
(21, 6, 'Tmavě šedá'),
(21, 8, '5120x1440'),
(21, 9, 'Samsung'),
(21, 10, '48.8'),
(21, 15, '120'),
(21, 16, '4'),
(21, 17, 'DisplayPort, HDMI'),
(21, 18, 'Matný'),
(21, 19, '100'),
(22, 4, 'TN'),
(22, 6, 'černá'),
(22, 8, '1920x1080'),
(22, 9, 'ZOWIE by BenQ'),
(22, 10, '24'),
(22, 15, '144'),
(22, 16, '1'),
(22, 17, 'DisplayPort, HDMI'),
(22, 18, 'Matný'),
(22, 19, '45'),
(23, 6, 'Bílá'),
(23, 9, 'Apple'),
(23, 20, '0'),
(23, 21, 'Bluetooth'),
(23, 24, '-'),
(23, 25, 'ANO'),
(23, 26, '38'),
(23, 27, 'Pecky'),
(24, 6, 'černá'),
(24, 9, 'HyperX'),
(24, 20, '3'),
(24, 21, '3.5mm (TRRS)'),
(24, 24, '3.5mm (TRRS)'),
(24, 25, 'ANO'),
(24, 26, '350'),
(24, 27, 'Náhlavní'),
(25, 6, 'Samsung Galaxy Buds (2019), černá'),
(25, 9, 'Samsung'),
(25, 20, '0'),
(25, 21, 'Bluetooth'),
(25, 24, '-'),
(25, 25, 'ANO'),
(25, 26, '5.6'),
(25, 27, 'Špunty'),
(26, 6, 'černá'),
(26, 9, 'SteelSeries'),
(26, 20, '0'),
(26, 21, 'Bluetooth'),
(26, 24, '-'),
(26, 25, 'ANO'),
(26, 26, '357'),
(26, 27, 'Náhlavní'),
(27, 6, 'šedá'),
(27, 9, 'AKG'),
(27, 20, '1.2'),
(27, 21, '3.5mm (TRRS)'),
(27, 24, '3.5mm (TRRS)'),
(27, 25, 'ANO'),
(27, 26, '18'),
(27, 27, 'Špunty'),
(28, 6, 'černá'),
(28, 9, 'Razer'),
(28, 20, '0'),
(28, 21, 'Bluetooth'),
(28, 24, '-'),
(28, 25, 'ANO'),
(28, 26, '45'),
(28, 27, 'Pecky'),
(29, 9, 'AMD'),
(29, 28, '7'),
(29, 29, '64'),
(29, 30, '3. generace procesorů Ryzen Threadripper'),
(29, 31, 'TR4X socket'),
(29, 32, 'Ryzen (Threadripper)'),
(32, 9, 'Intel'),
(32, 28, '14'),
(32, 29, '6'),
(32, 30, 'Intel - 9. generace'),
(32, 31, '1151 socket'),
(32, 32, 'Core i5'),
(33, 9, 'Intel'),
(33, 28, '14'),
(33, 29, '8'),
(33, 30, 'Intel - 9. generace'),
(33, 31, '1151 socket'),
(33, 32, 'Core i7'),
(34, 9, 'Intel'),
(34, 28, '14'),
(34, 29, '4'),
(34, 30, 'Intel - 8. generace'),
(34, 31, '1151 socket'),
(34, 32, 'Pentium G'),
(35, 9, 'Intel'),
(35, 28, '14'),
(35, 29, '48'),
(35, 30, '-'),
(35, 31, '3647 socket'),
(35, 32, 'Xeon'),
(36, 9, 'Intel'),
(36, 28, '14'),
(36, 29, '16'),
(36, 30, 'Intel - 9. generace'),
(36, 31, '1151 socket'),
(36, 32, 'Core i9'),
(37, 9, 'NVIDIA'),
(37, 33, 'GeForce RTX 2070 Super'),
(37, 34, '8192'),
(37, 35, '650'),
(38, 9, 'NVIDIA'),
(38, 33, 'GeForce GTX 1660 Super'),
(38, 34, '6144'),
(38, 35, '450'),
(39, 9, 'NVIDIA'),
(39, 33, 'GeForce GTX 1050 Ti'),
(39, 34, '4096'),
(39, 35, '300'),
(40, 9, 'NVIDIA'),
(40, 33, 'Quadro RTX 6000'),
(40, 34, '24576'),
(40, 35, '900'),
(41, 9, 'NVIDIA'),
(41, 33, 'GeForce RTX 2080 Ti'),
(41, 34, '11264'),
(41, 35, '650'),
(42, 9, 'NVIDIA'),
(42, 33, 'GeForce RTX 2060 Super'),
(42, 34, '8192'),
(42, 35, '550'),
(46, 9, 'Seasonic'),
(46, 36, '750'),
(46, 37, '4pin CPU (4x), ATX 20+4pin, FDD (1x), MOLEX (3x), PCI-Express 6+2pin (4x), SATA (8x)'),
(46, 38, '120'),
(47, 9, 'Be quiet!'),
(47, 36, '600'),
(47, 37, '4pin CPU (2x), ATX 20+4pin, MOLEX (2x), PCI-Express 6+2pin (4x), SATA (6x)'),
(47, 38, '120'),
(48, 9, 'Asus'),
(48, 36, '1200'),
(48, 37, ' 4pin CPU (4x), ATX 20+4pin, FDD (1x), MOLEX (5x), PCI-Express 6+2pin (8x), SATA (12x)'),
(48, 38, '135'),
(50, 9, 'Thermaltake'),
(50, 36, '750'),
(50, 37, '4pin CPU (2x), ATX 24pin, FDD (1x), MOLEX (4x), PCI-Express 6+2pin (4x), SATA (9x)'),
(50, 38, '140'),
(51, 9, 'Asus'),
(51, 36, '750'),
(51, 37, '4pin CPU (4x), ATX 20+4pin, MOLEX (3x), PCI-Express 6+2pin (4x), SATA (8x)'),
(51, 38, '135'),
(56, 9, 'Corsair'),
(56, 39, '3466'),
(56, 40, 'pasivní'),
(56, 41, '64'),
(56, 42, 'DDR4 DIMM'),
(57, 9, 'G.Skill'),
(57, 39, '3200'),
(57, 40, 'pasivní'),
(57, 41, '32'),
(57, 42, 'DDR4 DIMM'),
(58, 9, 'HyperX'),
(58, 39, '3200'),
(58, 40, 'pasivní'),
(58, 41, '64'),
(58, 42, 'DDR4 DIMM'),
(59, 9, 'Crucial'),
(59, 39, '2666'),
(59, 40, 'pasivní'),
(59, 41, '32'),
(59, 42, 'DDR4 DIMM'),
(60, 9, 'HyperX'),
(60, 39, '3200'),
(60, 40, 'pasivní'),
(60, 41, '16'),
(60, 42, 'DDR4 DIMM'),
(61, 9, 'Corsair'),
(61, 39, '3200'),
(61, 40, 'pasivní'),
(61, 41, '16'),
(61, 42, 'DDR4 DIMM'),
(62, 6, 'černá'),
(62, 9, 'SteelSeries'),
(62, 20, '1'),
(62, 21, 'usb'),
(62, 26, '131'),
(63, 6, 'černá'),
(63, 9, 'HyperX'),
(63, 20, '0'),
(63, 21, 'Bluetooth'),
(63, 26, '130'),
(64, 6, 'černá'),
(64, 9, 'Razer'),
(64, 20, '1.8'),
(64, 21, 'usb'),
(64, 26, '130'),
(65, 6, 'černá'),
(65, 9, 'SteelSeries'),
(65, 20, '2'),
(65, 21, 'usb'),
(65, 26, '89'),
(66, 6, 'černá'),
(66, 9, 'Logitech'),
(66, 20, '2.1'),
(66, 21, 'usb'),
(66, 26, '87'),
(67, 6, 'černá'),
(67, 9, 'Logitech'),
(67, 20, '0'),
(67, 21, 'Bluetooth'),
(67, 26, '114'),
(68, 6, 'černá'),
(68, 9, 'HyperX'),
(68, 20, '1.8'),
(68, 21, 'usb'),
(68, 22, 'ANO'),
(68, 23, 'US'),
(68, 26, '1049'),
(69, 6, 'černá'),
(69, 9, 'Razer'),
(69, 20, '1.5'),
(69, 21, 'usb'),
(69, 22, 'ANO'),
(69, 23, 'US'),
(69, 26, '1760'),
(70, 6, 'černá'),
(70, 9, 'SteelSeries'),
(70, 20, '1.6'),
(70, 21, 'usb'),
(70, 22, 'ANO'),
(70, 23, 'US'),
(70, 26, '950'),
(71, 6, 'černá'),
(71, 9, 'ZOWIE by BenQ'),
(71, 20, '1.4'),
(71, 21, 'usb, ps2'),
(71, 22, 'ANO'),
(71, 23, 'US'),
(71, 26, '1330'),
(72, 6, 'černá'),
(72, 9, 'Fnatic'),
(72, 20, '2.2'),
(72, 21, 'usb'),
(72, 22, 'ANO'),
(72, 23, 'US'),
(72, 26, '962'),
(73, 6, 'černá'),
(73, 9, 'Xtrfy'),
(73, 20, '2'),
(73, 21, 'usb'),
(73, 22, 'ANO'),
(73, 23, 'US'),
(73, 26, '1250'),
(74, 9, 'Corsair'),
(74, 36, '850'),
(74, 37, '4pin CPU (4x), ATX 20+4pin, FDD (1x), MOLEX (6x), PCI-Express 6+2pin (6x), SATA (16x)'),
(74, 38, '135'),
(75, 1, '16'),
(75, 2, '5000'),
(75, 3, 'Android'),
(75, 4, 'AMOLED'),
(75, 5, '512'),
(75, 6, 'Cosmic Black'),
(75, 7, '8'),
(75, 8, '3200x1400'),
(75, 9, 'Samsung'),
(75, 10, '6.9'),
(75, 26, '188'),
(81, 1, '8'),
(81, 2, '3300'),
(81, 3, 'Android'),
(81, 4, 'AMOLED'),
(81, 5, '256'),
(81, 6, 'černá'),
(81, 7, '8'),
(81, 8, '2636x1080'),
(81, 9, 'Samsung'),
(81, 10, '6.7'),
(81, 26, '183'),
(82, 1, '6'),
(82, 2, '4200'),
(82, 3, 'Android'),
(82, 4, 'OLED'),
(82, 5, '128'),
(82, 6, 'černá'),
(82, 7, '8'),
(82, 8, '23401080'),
(82, 9, 'Huawei'),
(82, 10, '6.47'),
(82, 26, '192'),
(83, 1, '8'),
(83, 2, '4000'),
(83, 3, 'Android'),
(83, 4, 'AMOLED'),
(83, 5, '128'),
(83, 6, 'černá'),
(83, 7, '8'),
(83, 8, '2340x1080'),
(83, 9, 'Oppo'),
(83, 10, '6.5'),
(83, 26, '195'),
(84, 1, '4'),
(84, 2, '4000'),
(84, 3, 'Android'),
(84, 4, 'SAMOLED'),
(84, 5, '128'),
(84, 6, 'černá'),
(84, 7, '8'),
(84, 8, '2400x1080'),
(84, 9, 'Samsung'),
(84, 10, '6.5'),
(84, 26, '172'),
(85, 1, '8'),
(85, 2, '3800'),
(85, 3, 'Android'),
(85, 4, 'AMOLED'),
(85, 5, '128'),
(85, 6, 'Glacierr Blue'),
(85, 7, '8'),
(85, 8, '2400x1080'),
(85, 9, 'OnePlus'),
(85, 10, '6.55'),
(85, 26, '190'),
(86, 1, '16'),
(86, 3, 'Windows 10 Home'),
(86, 6, 'stříbrná'),
(86, 8, ' 3840x2160'),
(86, 9, 'Dell'),
(86, 10, '15.6'),
(86, 11, '512'),
(86, 12, '0'),
(86, 13, 'Dedikovaná'),
(86, 14, 'Intel Core i7'),
(86, 18, 'Matný'),
(86, 22, 'ANO'),
(86, 23, 'EN'),
(86, 26, '2000'),
(86, 43, 'NVIDIA GeForce GTX 1650'),
(87, 1, '32'),
(87, 3, 'Windows 10 Pro'),
(87, 6, 'šedá'),
(87, 8, '1920x1200'),
(87, 9, 'Asus'),
(87, 10, '17'),
(87, 11, '1000'),
(87, 12, '0'),
(87, 13, 'Dedikovaná'),
(87, 14, 'Intel Core i7'),
(87, 18, 'Matný'),
(87, 22, 'ANO'),
(87, 23, 'EN'),
(87, 26, '2390'),
(87, 43, 'NVIDIA Quadro T2000'),
(88, 1, '16'),
(88, 3, 'Windows 10 Pro'),
(88, 6, 'černá'),
(88, 8, '1920x1080'),
(88, 9, 'Lenovo'),
(88, 10, '15.6'),
(88, 11, '512'),
(88, 12, '0'),
(88, 13, 'Dedikovaná'),
(88, 14, 'Intel Core i7'),
(88, 18, 'Matný'),
(88, 22, 'ANO'),
(88, 23, 'EN'),
(88, 26, '1900'),
(88, 43, 'AMD Radeon RX 640'),
(89, 1, '8'),
(89, 3, 'Windows 10 Home'),
(89, 6, 'černá'),
(89, 8, '1920x1080'),
(89, 9, 'Acer'),
(89, 10, '15.6'),
(89, 11, '512'),
(89, 12, '0'),
(89, 13, 'Integrovaná'),
(89, 14, 'Intel Core i3'),
(89, 18, 'Matný'),
(89, 22, 'NE'),
(89, 23, 'EN'),
(89, 26, '1900'),
(89, 43, 'Intel UHD Graphics'),
(90, 1, '16'),
(90, 3, 'Windows 10 Home'),
(90, 6, 'šedá'),
(90, 8, '1920x1080'),
(90, 9, 'Asus'),
(90, 10, '15.6'),
(90, 11, '512'),
(90, 12, '0'),
(90, 13, 'Dedikovaná'),
(90, 14, 'Intel Core i7'),
(90, 18, 'Lesklý'),
(90, 22, 'ANO'),
(90, 23, 'EN'),
(90, 26, '1900'),
(90, 43, 'NVIDIA GeForce GTX 1050'),
(91, 1, '4'),
(91, 3, 'Google Chrome OS'),
(91, 6, 'růžová'),
(91, 8, '1920x1080'),
(91, 9, 'Lenovo'),
(91, 10, '14'),
(91, 11, '64'),
(91, 12, '0'),
(91, 13, 'Integrovaná'),
(91, 14, 'Intel Celeron'),
(91, 18, 'Matný'),
(91, 22, 'NE'),
(91, 23, 'EN'),
(91, 26, '1400'),
(91, 43, 'Intel UHD Graphics 600'),
(92, 4, 'OLED'),
(92, 6, 'černá'),
(92, 8, '3840x2160'),
(92, 9, 'Dell Alienware'),
(92, 10, '54.6'),
(92, 15, '120'),
(92, 16, '0.5'),
(92, 17, '3x HDMI / 1x DisplayPort / 1x 3.5mm jack/ 1x USB'),
(92, 18, 'Matný'),
(92, 19, '100'),
(93, 4, 'IPS'),
(93, 6, 'černá'),
(93, 8, '1920x1080'),
(93, 9, 'Dell Alienware'),
(93, 10, '27'),
(93, 15, '240'),
(93, 16, '1'),
(93, 17, '1x DisplayPort / 2x HDMI / 1x USB / 3.5mm line out, 3.5mm sluchátka'),
(93, 18, 'Matný'),
(93, 19, '29'),
(94, 4, 'TN'),
(94, 6, 'černá'),
(94, 8, '2560x1440'),
(94, 9, 'HP'),
(94, 10, '27'),
(94, 15, '165'),
(94, 16, '1.8'),
(94, 17, '1x DisplayPort / 1x HDMI / USB'),
(94, 18, 'Matný'),
(94, 19, '65'),
(95, 4, 'IPS'),
(95, 6, 'černá'),
(95, 8, '3440x1440'),
(95, 9, 'Asus'),
(95, 10, '34'),
(95, 15, '100'),
(95, 16, '1'),
(95, 17, '1x DisplayPort / 2x HDMI / USB / 1x ThunderBolt'),
(95, 18, 'Matný'),
(95, 19, '57'),
(96, 4, 'IPS'),
(96, 6, 'černá'),
(96, 8, '3840x2160'),
(96, 9, 'Dell'),
(96, 10, '43'),
(96, 15, '60'),
(96, 16, '8'),
(96, 17, '1x mini DisplayPort / 1x DisplayPort / 2x HDMI / 1xVGA (D-Sub)'),
(96, 18, 'Matný'),
(96, 19, '70'),
(97, 4, 'VA'),
(97, 6, 'stříbrná'),
(97, 8, '1920x1080'),
(97, 9, 'Samsung'),
(97, 10, '27'),
(97, 15, '60'),
(97, 16, '4'),
(97, 17, '1x HDMI / 1x VGA'),
(97, 18, 'Matný'),
(97, 19, '35');

-- --------------------------------------------------------

--
-- Table structure for table `uzivatele`
--

CREATE TABLE `uzivatele` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(35) CHARACTER SET utf8 NOT NULL,
  `jmeno` varchar(45) CHARACTER SET utf8 NOT NULL,
  `prijmeni` varchar(45) CHARACTER SET utf8 NOT NULL,
  `email` varchar(45) CHARACTER SET utf8 NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 NOT NULL,
  `opravneni` int(10) NOT NULL DEFAULT '1',
  `ulice_cislo` varchar(45) CHARACTER SET utf8 NOT NULL,
  `obec` varchar(45) CHARACTER SET utf8 NOT NULL,
  `psc` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `uzivatele`
--

INSERT INTO `uzivatele` (`id`, `username`, `jmeno`, `prijmeni`, `email`, `password`, `opravneni`, `ulice_cislo`, `obec`, `psc`) VALUES
(1, 'admin', '.', '.', '.', '$2y$12$Zb3GT6IanHaCCI0HGW9MBORw4byl6WLK0txJblZfJrNQtEk6tbynq', 3, '.', '.', '.'),
(4, 'LadislavVasina1', 'Ladislav', 'Vašina', 'ladislavvasina@gmail.com', '$2y$12$GrlKFVljubrpCa7yzHOc7eavbRMULrzDb.nplsFP7jtsdfbqCzhrC', 1, 'Palackého 3211', 'Pardubice', '53002'),
(47, 'Polivec', 'Tomáš', 'Polívka', 'tomas.polivka123@seznam.cz', '$2y$12$ZNXa4qpIOaLzKKwJaCJoreonLJ7UJkLLCd4sBw3ptYZ1kDpuMIyVC', 1, 'Miřetice 175', 'Miřetice', '53955'),
(50, 'PanKotatko', 'Pan', 'Koťátko', 'bajer@spse.cz', '$2y$12$N6ZlwNzNgwfHIia/Vd8QQesQaF0GJXFM0rqCb9CcBoBcA51b2Ld92', 1, 'Karla IV. 13', 'Pardubice', '53002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atributy`
--
ALTER TABLE `atributy`
  ADD PRIMARY KEY (`idAtributu`);

--
-- Indexes for table `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`idKategorie`),
  ADD UNIQUE KEY `nazevKategorie_UNIQUE` (`nazevKategorie`),
  ADD KEY `fk_kategorie_kategorie_idx` (`nadrazenaKategorie`);

--
-- Indexes for table `kategorie_has_atributy`
--
ALTER TABLE `kategorie_has_atributy`
  ADD PRIMARY KEY (`kategorie_idKategorie`,`atributy_idAtributu`),
  ADD KEY `fk_kategorie_has_atributy_atributy1_idx` (`atributy_idAtributu`),
  ADD KEY `fk_kategorie_has_atributy_kategorie1_idx` (`kategorie_idKategorie`);

--
-- Indexes for table `kosik`
--
ALTER TABLE `kosik`
  ADD PRIMARY KEY (`idUzivatele`,`idProduktu`),
  ADD KEY `fk_idProduktu_idx` (`idProduktu`);

--
-- Indexes for table `objednavky`
--
ALTER TABLE `objednavky`
  ADD PRIMARY KEY (`idObjednavky`),
  ADD KEY `fk_objednavky_uzivatele1_idx` (`idUzivatele`);

--
-- Indexes for table `objednavky_has_produkty`
--
ALTER TABLE `objednavky_has_produkty`
  ADD PRIMARY KEY (`objednavky_idObjednavky`,`produkty_idProduktu`),
  ADD KEY `fk_objednavky_has_produkty_produkty1_idx` (`produkty_idProduktu`),
  ADD KEY `fk_objednavky_has_produkty_objednavky1_idx` (`objednavky_idObjednavky`);

--
-- Indexes for table `oblibene`
--
ALTER TABLE `oblibene`
  ADD PRIMARY KEY (`idUzivatele`,`idProduktu`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_uzivatele_has_produkty_produkty1_idx` (`idProduktu`),
  ADD KEY `fk_uzivatele_has_produkty_uzivatele1_idx` (`id`,`idUzivatele`);

--
-- Indexes for table `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`idProduktu`),
  ADD KEY `fk_produkty_kategorie1_idx` (`kategorieId`);

--
-- Indexes for table `produkty_has_atributy`
--
ALTER TABLE `produkty_has_atributy`
  ADD PRIMARY KEY (`produkty_idProduktu`,`atributy_idAtributu`),
  ADD KEY `fk_produkty_has_atributy_atributy1_idx` (`atributy_idAtributu`),
  ADD KEY `fk_produkty_has_atributy_produkty1_idx` (`produkty_idProduktu`);

--
-- Indexes for table `uzivatele`
--
ALTER TABLE `uzivatele`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName_UNIQUE` (`username`),
  ADD UNIQUE KEY `password_UNIQUE` (`password`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atributy`
--
ALTER TABLE `atributy`
  MODIFY `idAtributu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `idKategorie` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `objednavky`
--
ALTER TABLE `objednavky`
  MODIFY `idObjednavky` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `oblibene`
--
ALTER TABLE `oblibene`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `idProduktu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `uzivatele`
--
ALTER TABLE `uzivatele`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategorie`
--
ALTER TABLE `kategorie`
  ADD CONSTRAINT `fk_kategorie_kategorie` FOREIGN KEY (`nadrazenaKategorie`) REFERENCES `kategorie` (`idKategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kategorie_has_atributy`
--
ALTER TABLE `kategorie_has_atributy`
  ADD CONSTRAINT `fk_kategorie_has_atributy_atributy1` FOREIGN KEY (`atributy_idAtributu`) REFERENCES `atributy` (`idAtributu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kategorie_has_atributy_kategorie1` FOREIGN KEY (`kategorie_idKategorie`) REFERENCES `kategorie` (`idKategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `objednavky`
--
ALTER TABLE `objednavky`
  ADD CONSTRAINT `fk_objednavky_uzivatele1` FOREIGN KEY (`idUzivatele`) REFERENCES `uzivatele` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `objednavky_has_produkty`
--
ALTER TABLE `objednavky_has_produkty`
  ADD CONSTRAINT `fk_objednavky_has_produkty_objednavky1` FOREIGN KEY (`objednavky_idObjednavky`) REFERENCES `objednavky` (`idObjednavky`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_objednavky_has_produkty_produkty1` FOREIGN KEY (`produkty_idProduktu`) REFERENCES `produkty` (`idProduktu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produkty`
--
ALTER TABLE `produkty`
  ADD CONSTRAINT `fk_produkty_kategorie1` FOREIGN KEY (`kategorieId`) REFERENCES `kategorie` (`idKategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produkty_has_atributy`
--
ALTER TABLE `produkty_has_atributy`
  ADD CONSTRAINT `fk_produkty_has_atributy_atributy1` FOREIGN KEY (`atributy_idAtributu`) REFERENCES `atributy` (`idAtributu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produkty_has_atributy_produkty1` FOREIGN KEY (`produkty_idProduktu`) REFERENCES `produkty` (`idProduktu`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
