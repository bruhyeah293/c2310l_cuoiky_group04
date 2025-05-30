SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `parent`, `created_at`, `updated_at`) VALUES
(1, 'Men', 0, '2022-07-29 11:36:18', NULL),
(2, 'Women', 0, '2022-07-29 11:36:31', NULL),
(3, 'Men\'s Vintage Watch', 1, '2022-07-29 13:15:58', NULL),
(4, 'Men\'s Smart Watch', 1, '2022-07-29 13:17:07', NULL),
(5, 'Women\'s Vintage Watch', 0, '2022-07-29 13:17:52', NULL),
(6, 'Women\'s Smart Watch', 2, '2022-07-29 13:18:34', NULL),
(7, 'Women\'s Luxury Watch', 2, '2022-07-29 14:17:47', NULL),
(8, 'Men\'s Luxury Watch', 1, '2022-07-29 14:18:22', NULL),
(9, 'Apple Watch', 0, '2022-07-29 14:36:11', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `members`
--

INSERT INTO `members` (`id`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'lenhath6@gmail.com', '$2y$10$5WilfQgyg0HC7X2TUxGivu7/MGHyld2Y3zApkX.DiGaeQTyUd295q', 1, NULL, '2022-07-21 06:07:50', '2022-07-29 15:32:11'),
(2, 'nguyendinhtoan200000@gmail.com', '$2y$10$3GQzeRl6zhHE4ppgj/NqJewsFzqQcvkn6f3wgFN/ImvKb0tGAEsby', 1, NULL, '2022-07-29 15:32:49', NULL),
(3, 'hieud0366381741@gmail.com', '$2y$10$/hhx.ltfdQ6fm33K2hoM2uwBFj7XyWdv3TCU.joe9EwkJRJdskgxO', 2, NULL, '2022-07-29 15:33:15', NULL),
(4, '123@gmail.com', '$2y$10$Paad6Z8nhWsRLxowZL8ESuBLJNqO2cmdYl8GhYx80DzjE9.PVBe4u', 2, NULL, '2022-07-29 15:33:39', NULL),
(5, 'abc@gmai.com', '$2y$10$ANGhZ.07s/NOqOSwv1.kG.lWg5cii1.VEPxmqBeRFm0cIaudLI1ny', 2, NULL, '2022-07-29 15:34:05', NULL),
(6, 'xyz@gmail.com', '$2y$10$14mnuXJrOcBaBG.pgN44UOllGeawZ3QT6vLrTEMw6yEPnX0Ktcd4O', 2, NULL, '2022-07-29 15:34:31', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_30_205353_create_members_table', 1),
(6, '2022_07_01_192112_create_products_table', 1),
(7, '2022_07_01_192234_create_category_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `intro`, `content`, `image`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(3, '3', 'CASIO MTP-1381D-1AVDF', 99, 'CASIO MTP-1381D-1AVDF – MEN – QUARTZ (PIN) – METAL WIRE', 'The Casio MTP-1381D-1AVDF has a shiny silver-coated metal case and band, a strong black dial with prominent reflective coated hands and markers, a 12 o\'clock date, and a 6 o\'clock date. .', '1659075708.webp', 1, 1, '2022-07-29 13:21:48', NULL),
(4, '3', 'CASIO EFR-S567D-1AVUDF', 129, 'CASIO EFR-S567D-1AVUDF – MEN – SAPPHIRE GLASS – QUARTZ (PIN) – METAL WIRE', 'The Casio EFR-S567D-1AVUDF model has a masculine design with 3 chronograph function knobs, a highlight with the Sapphire glass version for the Edifice segment.', '1659075813.webp', 1, 1, '2022-07-29 13:23:33', NULL),
(5, '3', 'CASIO MTP-1384D-1AVDF', 139, 'CASIO MTP-1384D-1AVDF – MEN – QUARTZ (PIN) – METAL WIRE', 'With a powerful black Casio MTP-1384D-1AVDF dial, delicately thinned Roman numeral hour markers and hands that stand out against the digital background, an elegant metal strap, the watch withstands depth. 10ATM is suitable for water activities except diving.', '1659075898.webp', 1, 0, '2022-07-29 13:24:58', NULL),
(6, '4', 'CASIO A158WA-1DF', 89, 'CASIO A158WA-1DF – MEN – QUARTZ (PIN) – METAL WIRE', 'Casio A158WA-1DF men\'s watch model with legendary square design, electronic dial displaying many useful functions for users, silver metal case and strap create strong certainty.', '1659075982.webp', 1, 1, '2022-07-29 13:26:22', NULL),
(7, '3', 'CASIO MTP-V006GL-7BUDF', 149, 'CASIO MTP-V006GL-7BUDF – MEN – QUARTZ (PIN) – LEATHER STRAP', 'Casio MTP-V006GL-7BUDF watch with a traditional round dial, yellow color of the bezel surrounding the white of the numeral base, the center of the dial has 3 yellow hands and the Roman numeral markers are covered in prominent black.', '1659076069.webp', 1, 1, '2022-07-29 13:27:49', NULL),
(8, '4', 'CASIO W-216H-3BVDF', 99, 'CASIO W-216H-3BVDF – NAM – KÍNH NHỰA – QUARTZ (PIN) – DÂY CAO SU', 'The Casio W-216H-3BVDF model has a case and strap designed with impact-resistant rubber material, an electronic dial background with many useful functions, creating a youthful and dynamic look for individual men.', '1659076147.webp', 1, 1, '2022-07-29 13:29:07', NULL),
(9, '4', 'CASIO SGW-400H-1B2VDR', 99, 'CASIO SGW-400H-1B2VDR – MEN – PLASTIC GLASS – QUARTZ (PIN) – RUBBER STRAP', 'The Casio SGW-400H-1B2VDR watch has a delicate aluminum metal bezel, a stylish black rubber strap, and a modern dial with a combination of hands and digital numbers to create a sporty personality.', '1659076219.webp', 1, 0, '2022-07-29 13:30:19', NULL),
(10, '6', 'CASIO A168WG-9WD', 89, 'CASIO A168WG-9WDF – Women – PLASTIC GLASS – QUARTZ (PIN) – METAL WIRE', 'Casio watch A168WG-9WDF with the traditional shape of the company\'s gold tone dominates every detail of the case, dial and strap to create a luxurious, noble and elegant fashion.', '1659076372.webp', 1, 1, '2022-07-29 13:32:52', NULL),
(11, '5', 'CASIO WOMEN', 119, 'CASIO WOMEN – QUARTZ (PIN) – METAL WIRE (LTP-1183A-7ADF)', 'Casio LTP-1183A-7ADF women\'s watch is elegant and sophisticated, with a white background and large numerals, a simple 3-hand design and a date calendar.', '1659076454.webp', 1, 1, '2022-07-29 13:34:14', NULL),
(12, '6', 'CASIO B640WCG-5DF', 69, 'CASIO B640WCG-5DF – NỮ – QUARTZ (PIN) – DÂY KIM LOẠI – MẶT SỐ 35MM', 'Mẫu Casio B640WCG-5DF phiên bản dây đeo cùng vỏ máy được phối cùng tone màu vàng hồng thời trang, kết hợp cùng nền mặt số điện tử hiện thị đa chức năng.', '1659076558.webp', 1, 0, '2022-07-29 13:35:58', NULL),
(13, '5', 'CASIO LTP-1274G-7ADF', 219, 'CASIO LTP-1274G-7ADF – WOMEN – QUARTZ (PIN) – METAL WIRE', 'The Casio LTP-1274G-7ADF women\'s watch has a luxurious gold-plated stainless steel metal case, and gently slender hands and indexes.', '1659076637.webp', 1, 0, '2022-07-29 13:37:17', NULL),
(14, '5', 'CASIO LRW-200H-1EVDF', 236, 'CASIO LRW-200H-1EVDF – WOMEN – PLASTIC GLASS – QUARTZ (PIN) – RUBBER STRAP', 'The Casio LRW-200H-1EVDF watch has a dynamic sporty design, a simple yet sophisticated traditional round dial with meticulously designed details. Large strap with folding lines is the highlight.', '1659076704.webp', 1, 1, '2022-07-29 13:38:24', NULL),
(15, '5', 'CASIO LTP-1335D-7AVDF', 311, 'CASIO LTP-1335D-7AVDF – WOMEN – QUARTZ (PIN) – METAL WIRE', 'Casio fashion watch LTP-1335D-7AVDF with classic round dial, luxury silver-plated stainless steel case and metal band, white dial.', '1659076822.webp', 1, 1, '2022-07-29 13:40:22', NULL),
(16, '5', 'CASIO WOMENN', 206, 'CASIO WOMEN – QUARTZ (PIN) – METAL WIRE (LTP-V005G-9AUDF)', 'Casio LTP-V005G-9AUDF luxury watch gold plated, with a pretty feminine elegant design, gold background combined with black brick numerals.', '1659077003.webp', 1, 0, '2022-07-29 13:43:23', '2022-07-29 13:43:41'),
(17, '3', 'CITIZEN BI5072-01A', 245, 'CITIZEN BI5072-01A – MEN – QUARTZ (PIN) – LEATHER STRAP', 'Underneath the simple appearance of the Citizen BI5072-01A model with an elegant brown leather strap, the thin-shaped numbered details contain luxurious sophistication when covered in striking gold tones.', '1659077123.webp', 1, 1, '2022-07-29 13:45:23', NULL),
(18, '3', 'CITIZEN MEN', 317, 'CITIZEN MEN – QUARTZ (PIN) – METAL WIRE (BI1050-56L)', 'The Citizen BI1050-56L watch model is delicately designed with stainless steel material, the dial has a 2-tier blue background, has large numerals, and also has a date calendar.', '1659077272.webp', 1, 0, '2022-07-29 13:47:52', NULL),
(19, '3', 'CITIZEN Enamel', 366, 'CITIZEN Enamel - QUARTZ (PIN) - METAL WIRE (BI1050-56L)', 'The Citizen BI1050-56L watch model is delicately designed with stainless steel material, the dial has a 2-tier blue background, has large numerals, and also has a date calendar.', '1659077401.webp', 1, 0, '2022-07-29 13:50:01', NULL),
(20, '3', 'CITIZEN AK5000-54A', 409, 'CITIZEN AK5000-54A – MEN – QUARTZ (PIN) – METAL WIRE', 'The Citizen AK5000-54A model features a moon and stars calendar feature prominently on the 42mm dial background with a youthful style beam pattern.', '1659077476.webp', 1, 0, '2022-07-29 13:51:16', NULL),
(21, '3', 'CITIZEN C7 NH8396-82E', 500, 'CITIZEN C7 NH8396-82E – NAM – AUTOMATIC – MÁY NHẬT, DẠ QUANG, MẶT SỐ 40MM', 'Citizen C7 model NH8396-82E black tone mesh strap version is youthful but not luxurious with details of numbered markers and rose gold-plated needles.', '1659077557.webp', 1, 0, '2022-07-29 13:52:37', NULL),
(22, '3', 'CITIZEN AU1080-38E', 359, 'CITIZEN AU1080-38E – MEN – SAPPHIRE GLASSES – ECO-DRIVE (LIGHT ENERGY) – FABRIC STRAP', 'Citizen AU1080-38E men\'s watch is impressive with a stylish design with a strap using youthful blue tone fabric, with outstanding batteries using modern Eco-Drive technology (Light Energy).', '1659077649.webp', 1, 0, '2022-07-29 13:54:09', NULL),
(23, '3', 'CITIZEN AN3604-58A', 699, 'CITIZEN AN3604-58A – MEN – QUARTZ (PIN) – METAL WIRE', 'The Citizen AN3604-58A model has a masculine yet luxurious look with 3-button gold-plated details, along with a thick round dial background with a sporty Chronograph feature.', '1659077732.webp', 1, 0, '2022-07-29 13:55:32', NULL),
(24, '3', 'CITIZEN AP1050-56A', 907, 'CITIZEN AP1050-56A – MEN – SAPPHIRE GLASS – ECO-DRIVE – METAL WIRE', 'Đồng hồ nam Citizen AP1050-56A với thiết kế pin sử dụng công nghệ hiện đại Eco-Drive (Năng Lượng Ánh Sáng), vỏ máy bằng thép không gỉ tạo vẻ chắc chắn nam tính kết hợp với dây đeo với chất liệu kim loại tạo nên phong cách mạnh mẻ.', '1659077793.webp', 1, 0, '2022-07-29 13:56:33', NULL),
(25, '5', 'CITIZEN EW2230-56E', 599, 'CITIZEN EW2230-56E – NỮ – KÍNH SAPPHIRE – ECO-DRIVE (NĂNG LƯỢNG ÁNH SÁNG) – DÂY KIM LOẠI', 'Citizen EW2230-56E Women\'s Watch has a compact and feminine design, a shiny stainless steel case, a classic round dial combined with a silver-plated metal strap to create a fashion accessory for women. .', '1659077874.webp', 1, 0, '2022-07-29 13:57:54', NULL),
(26, '5', 'CITIZEN FE7078-93A', 277, 'CITIZEN FE7078-93A – WOMEN – ECO-DRIVE (LIGHT ENERGY) – METAL STRAP – 36.8MM DIAL', 'Citizen model FE7078-93A battery version is equipped with Eco-Drive technology (Light Energy), 37mm white dial with stylish design.', '1659077973.webp', 1, 0, '2022-07-29 13:59:33', NULL),
(27, '5', 'CITIZEN FE1220-89A', 459, 'CITIZEN FE1220-89A – WOMEN – ECO-DRIVE (LIGHT ENERGY) – METAL STRAP – 30MM DIAL', 'Citizen model FE1220-89A battery version is equipped with Eco-Drive (Light Energy) technology, the needle details are created with youthful thin lines on the background of the 30mm size dial.', '1659078049.webp', 1, 1, '2022-07-29 14:00:49', NULL),
(28, '5', 'CITIZEN EX1538-50E', 653, 'CITIZEN EX1538-50E – NỮ – ECO-DRIVE (NĂNG LƯỢNG ÁNH SÁNG) – DÂY KIM LOẠI – MẶT SỐ 28MM', 'The Citizen EX1538-50E battery version is equipped with Eco-Drive (Light Energy) technology, the case is stylishly designed with a thickness of only 6mm.', '1659078137.webp', 1, 1, '2022-07-29 14:02:17', NULL),
(29, '5', 'CITIZEN ED8180-52X', 265, 'CITIZEN ED8180-52X – WOMEN – QUARTZ (PIN) – METAL STRAP – 33MM DIAL', 'Citizen model ED8180-52X luxury version 11 crystals are attached corresponding to the time zones displayed on the background of the dial size is not too large 33mm.', '1659078211.webp', 1, 0, '2022-07-29 14:03:31', NULL),
(30, '5', 'CITIZEN EM0853-81Y', 436, 'CITIZEN EM0853-81Y – WOMEN – SAPPHIRE GLASS – ECO-DRIVE (LIGHT ENERGY) – METAL STRAP – 31MM DIAL', 'Citizen model EM0853-81Y gold-plated metal case with a luxurious fashion light yellow tone version, featuring a battery-powered design equipped with Eco-Drive (Light Energy) technology.', '1659078281.webp', 1, 0, '2022-07-29 14:04:41', NULL),
(31, '5', 'CITIZEN EM0810-84N', 364, 'CITIZEN EM0810-84N – WOMEN – ECO-DRIVE (LIGHT ENERGY) – METAL STRAP – DIAL 32.5MM', 'Citizen model EM0810-84N silver-plated metal strap version of fashion mesh for women, needle details and numbered markers create a slim, feminine look on the background of a mother-of-pearl tone dial.', '1659078353.webp', 1, 0, '2022-07-29 14:05:53', NULL),
(32, '3', 'DOXA GRANDEMETRE D154TWH', 655, 'DOXA GRANDEMETRE D154TWH – MEN – SAPPHIRE GLASSES – HANDWINDING (HAND WINDING) – 18K GOLD, ALLIOR LEATHER, LIMITED EDITION', 'Doxa D154TWH limited edition model of 1000 pieces worldwide, a stylized combination of luxury gold-plated numerals and roman numerals, accented with an exposed Skeleton dial background', '1659078462.webp', 1, 0, '2022-07-29 14:07:42', NULL),
(33, '3', 'DOXA D124TSVW', 722, 'DOXA D124TSVW – MEN – SAPPHIRE GLASS – AUTOMATIC (AUTO) – METAL STRAP', 'The D124TSVW model brings a masculine experience from the thick mechanical movement, hidden under the Sapphire glass with the Roman numeral base, bringing a fashionable color with a youthful innovation from the Doxa brand. .', '1659078640.webp', 1, 0, '2022-07-29 14:10:40', NULL),
(34, '5', 'DOXA D204SPL', 532, 'DOXA D204SPL – WOMEN – SAPPHIRE GLASSES – QUARTZ (PIN) – LEATHER STRAP', 'The slim silhouette that exudes femininity comes from the outstanding Doxa D204SPL model with a diamond-encrusted 12 o\'clock position for a chic fashion look.', '1659078749.webp', 1, 1, '2022-07-29 14:12:29', NULL),
(35, '5', 'DOXA D106SMW', 6099, 'DOXA D106SMW – WOMEN – SAPPHIRE GLASS – AUTOMATIC (AUTO) – METAL STRAP – DIAL 27MM', 'Model Doxa D106SMW diamond version on case and dial details, 27mm size dial with simple design with 3 hands.', '1659078844.webp', 1, 0, '2022-07-29 14:14:04', NULL),
(36, '7', 'CALVIN KLEIN K8Y236L6', 1088, 'CALVIN KLEIN K8Y236L6 – WOMEN – QUARTZ (PIN) – LEATHER STRAP', 'Calvin Klein model K8Y236L6 large dial version 42mm with a fashion white tone small plain leather strap', '1659079217.webp', 1, 1, '2022-07-29 14:20:17', NULL),
(37, '7', 'CALVIN KLEIN K8NZ3VVN', 1277, 'CALVIN KLEIN K8NZ3VVN – WOMEN – QUARTZ (PIN) – METAL WIRE', 'The Calvin Klein K8NZ3VVN model has a silver-plated metal strap with blue crystal, creating a splendid fashion beauty for women with a battery case designed to be only 8mm thin.', '1659079641.webp', 1, 0, '2022-07-29 14:27:21', NULL),
(38, '8', 'CALVIN KLEIN K0K28120', 2039, 'CALVIN KLEIN K0K28120 – MEN – QUARTZ (PIN) – METAL WIRE', 'Calvin Klein model K0K28120 design 3 knobs to adjust the chronograph functions displayed on the 39mm size dial with a masculine 6-hand watch appearance.', '1659079710.webp', 1, 1, '2022-07-29 14:28:30', NULL),
(39, '7', 'CALVIN KLEIN K2G23144', 3660, 'CALVIN KLEIN K2G23144 – WOMEN – QUARTZ (PIN) – METAL WIRE', 'Calvin Klein model K2G23144 simple 2-needle version on a black face of size 31mm comes with a slim design with fashion index needle details for women.', '1659079777.webp', 1, 0, '2022-07-29 14:29:37', NULL),
(40, '8', 'CALVIN KLEIN K7621107', 4240, 'CALVIN KLEIN K7621107 – MEN – QUARTZ (PIN) – LEATHER STRAP', 'Calvin Klein K7621107 elegant fashion model with black smooth leather strap combined with a simple 43mm dial background with 3-hand design.', '1659079858.webp', 1, 0, '2022-07-29 14:30:58', NULL),
(41, '8', 'DOXA D198STE', 7760, 'DOXA D198STE – MEN – SAPPHIRE GLASSES – AUTOMATIC (AUTOMATIC) – LEATHER STRAP – LIMITED EDITION', 'Limited edition watch Doxa D198STE with a limited number of 800 pieces in the world, Roman numeral background alternating with luxury fashion rose gold numerals outstanding on tiger\'s eye stone, 42mm Sapphire glass combined with the set. elegant brown crocodile leather strap', '1659079975.webp', 1, 1, '2022-07-29 14:32:55', NULL),
(42, '9', 'Apple Watch SE', 580, 'Apple Watch SE GPS 40mm aluminum rim rubber band', 'Resolution 394 x 324 Pixels\r\n32 GB internal memory\r\nCharging port Magnetic charging\r\n2 hours full charge time\r\nConnectivity Wi-Fi, Bluetooth\r\nBattery life\r\n18 hours', '1659080245.webp', 0, 0, '2022-07-29 14:37:25', NULL),
(43, '9', 'Apple Watch Series 3', 399, 'Apple Watch Series 3 GPS 38mm aluminum rubber band', 'Resolution 340 x 272 Pixels\r\n8 GB internal memory\r\nCharging port Magnetic charging\r\n2 hours full charge time\r\nWifi, Bluetooth connection\r\nBattery life\r\n18 hours', '1659080462.webp', 0, 0, '2022-07-29 14:41:02', NULL),
(44, '9', 'Apple Watch Series 7', 619, 'Apple Watch Series 7 GPS 41mm aluminum rubber band', 'Screen size 1.61 inches\r\nLTPO OLED display technology\r\nResolution 430 x 352 Pixels\r\nApple S7 CPU\r\n32 GB internal memory\r\nCharging port Magnetic charging\r\nGPS connection\r\nBattery life\r\n18 hours', '1659080564.webp', 0, 0, '2022-07-29 14:42:44', NULL);
--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

