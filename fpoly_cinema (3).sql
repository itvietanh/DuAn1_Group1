-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 04:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fpoly_cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `name`, `email`, `phone`, `role`) VALUES
(1, 'vietanh0204', '12345', 'Vũ Việt Anh', 'vuvietanh02042004@gmail.com', '000000000', 0),
(3, 'dangphong', '12345', 'phong', 'phong@gmail.com', '6574839201', 0),
(11, 'admin', '12345', 'admin', 'admin@gmail.com', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`id`, `name`) VALUES
(1, 'FPOLY Cinema');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date_comment` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `id_account`, `id_film`, `content`, `date_comment`) VALUES
(1, 1, 1, 'Phim hay lắm mọi người ạ hahahahahhahaha', '2023-11-10'),
(21, 1, 1, 'hahah', '2023-11-28'),
(22, 1, 2, 'phong ơi là phong ơi', '2023-11-28'),
(23, 1, 2, 'hoàng ơi là hoàng', '2023-11-28'),
(24, 3, 1, 'yêu việt anh lắm', '2023-11-28'),
(25, 3, 2, 'Thầy ơi, em yêu bạn bàn duối ạ :( thầy ghép đôi cho em với bạn làm quen ạ', '2023-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL COMMENT 'mã phim',
  `name` varchar(255) NOT NULL COMMENT 'tên phim',
  `rel_date` date NOT NULL COMMENT 'ngày khởi chiếu',
  `id_genre` int(11) NOT NULL COMMENT 'thể loại phim',
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `name`, `rel_date`, `id_genre`, `image`) VALUES
(1, 'Doreamon: Vùng Đất Lý Tưởng Trên Bầu Trời', '2023-11-09', 1, '../uploads/doreamon.jpg'),
(2, 'Yêu Lại Vợ Ngầu', '2023-11-09', 2, '../uploads/yeulaivongau.jpg'),
(3, 'Transformers: Quái thú trỗi dậy', '2023-11-09', 5, '../uploads/transfomer.jpg'),
(4, 'The Conjuring', '2023-11-09', 3, '../uploads/conjuring.jpg'),
(15, 'Bỗng Dưng Trúng Số', '2023-09-23', 4, '../uploads/bongdungtrungso.jpg'),
(16, 'WOLFOO VÀ HÒN ĐẢO KỲ BÍ', '2023-10-13', 1, '../uploads/wolfoo.jpg'),
(17, 'NHÂN DUYÊN TIỀN ĐÌNH', '2023-11-14', 4, '../uploads/nhanduyentiendinh.jpg'),
(18, 'KỴ SĨ BÓNG ĐÊM TRỖI DẬY', '2023-11-15', 5, '../uploads/kysibongdemtroiday.jpg'),
(19, 'PAW PATROL: PHIM SIÊU ĐẲNG', '2023-11-17', 1, '../uploads/paw.jpg'),
(20, 'KẺ KIẾN TẠO', '2023-11-19', 4, '../uploads/kekientao.jpg'),
(21, 'THE MARVELS: BIỆT ĐỘI MARVEL', '2023-11-16', 5, '../uploads/themarvel.jpg'),
(22, 'QUỶ MÔN QUAN GỌI HỒN', '2023-11-09', 3, '../uploads/quymonquangoihon.jpg'),
(23, 'ÂM HỒN ĐÔ THỊ', '2023-11-23', 3, '../uploads/amhondothi.jpg'),
(24, 'ĐẤT RỪNG PHƯƠNG NAM', '2023-12-01', 2, '../uploads/datrungphuongnam.jpg'),
(25, 'MUÔN KIẾP NHÂN DUYÊN', '2023-12-02', 2, '../uploads/muonkiepnhanduyen.jpg'),
(26, 'Conan: Tàu Ngầm Sắt Màu Đen', '2023-11-09', 1, '../uploads/conan_taungausatmauden.jpg'),
(27, 'Thám Tử Pikachu', '2023-11-17', 1, '../uploads/thamtupikachu.jpg'),
(28, 'Tom&Jerry Quậy Tung New York', '2023-11-30', 1, '../uploads/tomandjerry.jpg'),
(29, 'Bố Già', '2023-11-24', 4, '../uploads/bogia.jpg'),
(30, 'Cô Giáo Em Là Số 1', '2023-11-24', 4, '../uploads/cogiaoemlaso1.jpg'),
(32, 'SIÊU LỪA GẶP SIÊU LẦY', '2023-11-17', 4, '../uploads/sieuluagapsieulay.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Phim hoạt hình'),
(2, 'Lãng Mạn'),
(3, 'Kinh dị'),
(4, 'Hài'),
(5, 'Bom tấn');

-- --------------------------------------------------------

--
-- Table structure for table `order_ticket`
--

CREATE TABLE `order_ticket` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `id_showTimeFrame` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `id_cinema` int(11) NOT NULL,
  `show_date` date NOT NULL,
  `seat_order` text NOT NULL,
  `price` float NOT NULL,
  `order_date` datetime NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_ticket`
--

INSERT INTO `order_ticket` (`id`, `id_account`, `id_showTimeFrame`, `id_film`, `id_room`, `id_cinema`, `show_date`, `seat_order`, `price`, `order_date`, `quantity`, `status`) VALUES
(106, 1, 2, 2, 0, 0, '2023-11-09', 'A1', 40000, '2023-11-25 11:15:16', 1, 'Chờ thanh toán'),
(107, 1, 1, 1, 0, 0, '2023-11-09', 'C5, C6', 160000, '2023-11-25 11:16:13', 2, 'Đã thanh toán'),
(108, 1, 2, 1, 0, 0, '2023-11-09', 'D5, D6', 160000, '2023-11-25 11:36:45', 4, 'Chờ thanh toán'),
(109, 1, 1, 1, 0, 0, '2023-11-09', 'A6, A7', 160000, '2023-11-25 11:37:13', 2, 'Chờ thanh toán'),
(110, 11, 1, 1, 0, 0, '2023-11-09', 'A3, A2', 160000, '2023-11-25 04:22:21', 2, 'Chờ thanh toán'),
(111, 1, 2, 1, 0, 0, '2023-11-09', 'C3, C4', 160000, '2023-11-25 07:27:10', 2, 'Chờ thanh toán'),
(112, 1, 2, 1, 0, 0, '2023-11-09', 'C3, C4', 160000, '2023-11-25 07:32:31', 2, 'Chờ thanh toán'),
(113, 1, 2, 1, 0, 0, '2023-11-09', 'C3, C4', 160000, '2023-11-25 07:35:42', 2, 'Chờ thanh toán'),
(114, 1, 2, 1, 0, 0, '2023-11-09', 'C3, C4', 160000, '2023-11-25 07:40:26', 2, 'Chờ thanh toán'),
(115, 1, 2, 1, 0, 0, '2023-11-09', 'C3, C4', 160000, '2023-11-25 07:40:32', 2, 'Chờ thanh toán'),
(116, 1, 2, 1, 0, 0, '2023-11-09', 'C3, C4', 160000, '2023-11-25 07:44:13', 2, 'Chờ thanh toán'),
(117, 1, 2, 1, 0, 0, '2023-11-09', 'C3, C4', 160000, '2023-11-25 07:45:55', 2, 'Chờ thanh toán'),
(118, 1, 2, 1, 0, 0, '2023-11-09', 'C3, C4', 160000, '2023-11-25 07:46:13', 2, 'Chờ thanh toán'),
(119, 1, 2, 1, 0, 0, '2023-11-09', 'C3, C4', 160000, '2023-11-25 07:47:05', 2, 'Chờ thanh toán'),
(120, 1, 2, 2, 0, 0, '2023-11-09', 'C4, C5', 80000, '2023-11-25 07:48:56', 2, 'Chờ thanh toán'),
(121, 1, 2, 2, 0, 0, '2023-11-09', 'C4, C5', 80000, '2023-11-25 07:50:56', 2, 'Chờ thanh toán'),
(122, 1, 2, 2, 0, 0, '2023-11-09', 'C4, C5', 80000, '2023-11-25 07:52:33', 2, 'Chờ thanh toán'),
(123, 1, 2, 2, 0, 0, '2023-11-09', 'C4, C5', 80000, '2023-11-25 07:55:27', 2, 'Chờ thanh toán'),
(124, 1, 2, 2, 0, 0, '2023-11-09', 'C4, C5', 80000, '2023-11-25 07:59:59', 2, 'Chờ thanh toán'),
(125, 1, 4, 1, 0, 0, '2023-11-09', 'B4, B5', 160000, '2023-11-25 08:03:03', 2, 'Chờ thanh toán');

-- --------------------------------------------------------

--
-- Table structure for table `payment_momo`
--

CREATE TABLE `payment_momo` (
  `id_momo` int(11) NOT NULL,
  `partner_code` varchar(50) NOT NULL,
  `order_id` int(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `order_info` varchar(100) NOT NULL,
  `order_type` varchar(50) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `pay_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_momo`
--

INSERT INTO `payment_momo` (`id_momo`, `partner_code`, `order_id`, `amount`, `order_info`, `order_type`, `trans_id`, `pay_type`) VALUES
(5, 'MOMOBKUN20180529', 1700907339, '10000', 'Thanh toán qua MoMo', 'momo_wallet', 2147483647, 'napas');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_seat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `id_seat`) VALUES
(1, 'Phòng Chiếu 1', 1),
(2, 'Phòng Chiếu 2', 2),
(3, 'Phòng Chiếu 3\r\n', 3),
(4, 'Phòng Chiếu 4\r\n', 4),
(5, 'Phòng Chiếu 5\r\n', 5);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `show_film`
--

CREATE TABLE `show_film` (
  `id` int(11) NOT NULL,
  `show_date` date DEFAULT NULL,
  `id_film` int(11) NOT NULL,
  `id_showTimeFrame` int(11) NOT NULL,
  `id_cinema` int(11) NOT NULL,
  `id_room` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `show_film`
--

INSERT INTO `show_film` (`id`, `show_date`, `id_film`, `id_showTimeFrame`, `id_cinema`, `id_room`) VALUES
(28, '2023-11-09', 1, 1, 1, 1),
(29, '2023-11-09', 1, 2, 1, 1),
(30, '2023-11-09', 1, 3, 1, 1),
(32, '2023-11-09', 1, 4, 1, 1),
(33, '2023-11-09', 1, 5, 1, 1),
(34, '2023-11-09', 1, 1, 1, 2),
(36, '2023-11-09', 1, 2, 1, 2),
(37, '2023-11-09', 1, 3, 1, 2),
(38, '2023-11-09', 1, 1, 0, 4),
(39, '2023-11-08', 1, 2, 1, 4),
(40, '2023-11-09', 1, 3, 1, 5),
(41, '2023-11-09', 2, 1, 1, 1),
(42, '2023-11-09', 2, 2, 1, 1),
(43, '2023-11-09', 2, 3, 1, 2),
(44, '2023-11-09', 2, 4, 1, 2),
(45, '2023-11-09', 2, 5, 1, 2),
(46, '2023-11-09', 2, 2, 1, 3),
(47, '2023-11-09', 2, 3, 1, 3),
(48, '2023-11-09', 2, 1, 1, 3),
(49, '2023-11-09', 2, 2, 1, 4),
(50, '2023-11-09', 2, 3, 1, 5),
(51, '2023-11-09', 3, 1, 1, 1),
(52, '2023-11-09', 3, 2, 1, 1),
(53, '2023-11-09', 3, 3, 1, 1),
(55, '2023-11-09', 3, 4, 1, 2),
(56, '2023-11-09', 3, 4, 1, 3),
(57, '2023-11-09', 3, 4, 1, 2),
(58, '2023-11-08', 3, 1, 1, 3),
(59, '2023-11-09', 3, 2, 1, 3),
(60, '2023-11-09', 3, 4, 1, 5),
(61, '2023-11-09', 3, 5, 1, 5),
(62, '2023-11-09', 3, 2, 1, 2),
(63, '2023-11-09', 3, 2, 1, 3),
(64, '2023-11-09', 3, 4, 1, 3),
(65, '2023-11-09', 3, 1, 1, 4),
(66, '2023-11-09', 3, 2, 1, 5),
(67, '2023-11-09', 4, 1, 1, 1),
(68, '2023-11-09', 4, 2, 1, 1),
(69, '2023-11-09', 4, 3, 1, 2),
(70, '2023-11-09', 4, 5, 1, 2),
(71, '2023-11-10', 26, 1, 1, 1),
(72, '2023-11-10', 26, 2, 0, 1),
(73, '2023-11-10', 26, 3, 1, 3),
(74, '2023-11-10', 26, 1, 1, 2),
(75, '2023-11-10', 26, 3, 1, 4),
(76, '2023-11-10', 19, 1, 1, 1),
(77, '2023-11-10', 19, 2, 0, 1),
(78, '2023-11-10', 19, 3, 1, 1),
(79, '2023-11-10', 19, 1, 1, 2),
(80, '2023-11-10', 19, 2, 1, 2),
(81, '2023-11-10', 19, 5, 1, 2),
(82, '2023-11-10', 19, 1, 1, 4),
(83, '2023-11-10', 1, 2, 1, 4),
(84, '2023-11-10', 19, 5, 1, 4),
(85, '2023-11-10', 19, 2, 1, 5),
(86, '2023-11-10', 19, 3, 1, 5),
(87, '2023-11-11', 18, 1, 1, 1),
(88, '2023-11-11', 18, 2, 1, 1),
(89, '2023-11-11', 18, 1, 1, 2),
(90, '2023-11-11', 18, 5, 1, 2),
(91, '2023-11-11', 18, 5, 1, 1),
(92, '2023-11-11', 18, 2, 1, 4),
(93, '2023-11-10', 26, 3, 1, 4),
(94, '2023-11-11', 18, 3, 1, 3),
(95, '2023-11-11', 18, 4, 1, 3),
(96, '2023-11-11', 18, 5, 1, 4),
(97, '2023-11-11', 18, 1, 0, 5),
(98, '2023-11-11', 18, 5, 1, 5),
(99, '2023-11-12', 21, 1, 1, 1),
(100, '2023-11-12', 21, 2, 1, 1),
(101, '2023-11-12', 21, 4, 1, 1),
(102, '2023-11-12', 21, 1, 1, 2),
(103, '2023-11-12', 21, 3, 1, 2),
(104, '2023-11-12', 21, 4, 1, 2),
(105, '2023-11-12', 21, 1, 1, 3),
(106, '2023-11-12', 21, 2, 1, 3),
(107, '2023-11-12', 21, 2, 1, 4),
(108, '2023-11-12', 21, 3, 1, 4),
(109, '2023-11-12', 21, 4, 1, 4),
(110, '2023-11-12', 21, 2, 1, 5),
(111, '2023-11-12', 21, 3, 1, 5),
(112, '2023-11-12', 21, 4, 1, 5),
(113, '2023-11-12', 21, 5, 1, 5),
(114, '2023-11-09', 3, 5, 1, 4),
(115, '2023-11-09', 24, 2, 1, 4),
(116, '2023-11-09', 2, 1, 1, 1),
(117, '2023-11-09', 2, 2, 1, 1),
(118, '2023-11-09', 2, 4, 1, 2),
(119, '2023-11-09', 2, 3, 1, 2),
(120, '2023-11-09', 2, 5, 1, 3),
(121, '2023-11-09', 2, 2, 1, 3),
(122, '2023-11-09', 2, 3, 1, 4),
(123, '2023-11-09', 2, 2, 1, 4),
(124, '2023-11-09', 2, 3, 1, 4),
(125, '2023-11-09', 2, 2, 1, 5),
(126, '2023-11-09', 2, 4, 1, 5),
(127, '2023-11-09', 2, 3, 1, 5),
(128, '2023-11-09', 2, 3, 1, 5),
(129, '2023-11-09', 3, 1, 1, 1),
(130, '2023-11-09', 3, 2, 1, 1),
(131, '2023-11-09', 3, 2, 1, 1),
(132, '2023-11-09', 3, 2, 1, 2),
(133, '2023-11-09', 3, 3, 1, 2),
(134, '2023-11-09', 3, 3, 1, 3),
(135, '2023-11-09', 3, 5, 1, 3),
(136, '2023-11-09', 3, 2, 1, 4),
(137, '2023-11-09', 3, 1, 1, 2),
(138, '2023-11-09', 3, 3, 1, 4),
(139, '2023-11-09', 3, 5, 1, 5),
(140, '2023-11-09', 3, 1, 1, 5),
(141, '2023-11-09', 4, 1, 1, 1),
(142, '2023-11-09', 4, 2, 1, 1),
(143, '2023-11-09', 4, 3, 1, 1),
(144, '2023-11-09', 3, 5, 1, 1),
(145, '2023-11-09', 3, 1, 1, 2),
(146, '2023-11-09', 4, 3, 1, 2),
(147, '2023-11-09', 4, 5, 1, 2),
(148, '2023-11-09', 4, 3, 1, 3),
(149, '2023-11-09', 4, 1, 1, 3),
(150, '2023-11-09', 4, 2, 1, 3),
(151, '2023-11-09', 4, 5, 1, 3),
(152, '2023-11-09', 4, 3, 1, 4),
(153, '2023-11-09', 4, 1, 1, 4),
(154, '2023-11-09', 4, 5, 1, 4),
(155, '2023-11-09', 4, 5, 1, 5),
(156, '2023-11-09', 4, 3, 1, 5),
(157, '2023-11-09', 4, 2, 1, 5),
(158, '2023-11-09', 15, 1, 1, 1),
(159, '2023-11-09', 15, 2, 1, 1),
(160, '2023-11-09', 15, 3, 1, 1),
(161, '2023-11-09', 15, 1, 1, 2),
(162, '2023-11-09', 15, 3, 1, 2),
(163, '2023-11-09', 15, 1, 1, 3),
(164, '2023-11-09', 15, 5, 1, 3),
(165, '2023-11-09', 15, 4, 1, 3),
(166, '2023-11-09', 15, 1, 1, 4),
(167, '2023-11-09', 15, 2, 1, 4),
(168, '2023-11-09', 15, 3, 1, 4),
(169, '2023-11-09', 15, 1, 1, 5),
(170, '2023-11-09', 15, 2, 1, 4),
(171, '2023-11-09', 15, 3, 1, 5),
(172, '2023-11-09', 15, 4, 1, 5),
(173, '2023-11-09', 17, 1, 1, 1),
(174, '2023-11-09', 17, 2, 1, 1),
(175, '2023-11-09', 17, 3, 1, 1),
(176, '2023-11-09', 17, 2, 1, 2),
(177, '2023-11-09', 17, 1, 1, 2),
(178, '2023-11-09', 17, 1, 1, 3),
(179, '2023-11-09', 17, 2, 1, 3),
(180, '2023-11-09', 17, 2, 1, 3),
(181, '2023-11-09', 17, 1, 1, 4),
(182, '2023-11-09', 17, 5, 1, 4),
(183, '2023-11-09', 17, 5, 1, 4),
(184, '2023-11-09', 17, 1, 1, 5),
(185, '2023-11-09', 17, 2, 1, 5),
(186, '2023-11-09', 17, 3, 1, 5),
(187, '2023-11-09', 17, 3, 1, 5),
(188, '2023-11-09', 17, 5, 1, 5),
(189, '2023-11-09', 20, 5, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `show_time_frame`
--

CREATE TABLE `show_time_frame` (
  `id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `show_time_frame`
--

INSERT INTO `show_time_frame` (`id`, `start_time`, `end_time`) VALUES
(1, '14:00:00', '16:00:00'),
(2, '16:00:00', '18:00:00'),
(3, '18:00:00', '20:00:00'),
(4, '20:00:00', '22:00:00'),
(5, '22:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `price` float NOT NULL,
  `id_film` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `price`, `id_film`) VALUES
(1, 80000, 1),
(2, 40000, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_ticket`
--
ALTER TABLE `order_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_momo`
--
ALTER TABLE `payment_momo`
  ADD PRIMARY KEY (`id_momo`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `show_film`
--
ALTER TABLE `show_film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `show_time_frame`
--
ALTER TABLE `show_time_frame`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã phim', AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_ticket`
--
ALTER TABLE `order_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `payment_momo`
--
ALTER TABLE `payment_momo`
  MODIFY `id_momo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `show_film`
--
ALTER TABLE `show_film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `show_time_frame`
--
ALTER TABLE `show_time_frame`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
