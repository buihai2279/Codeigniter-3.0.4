-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2016 at 07:39 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `parrent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `title`, `description`, `parrent_id`) VALUES
(20, 'fsf', 'sdfsd', 'Description', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `date_created` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `info` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `mail`, `name`, `content`, `date_created`, `status`, `info`, `user_id`) VALUES
(1, 'buihai2603@gmail.com', 'Name', 'sdcfghjkl', '2016-03-10 23:17:33', 0, 'buihai', 0),
(2, 'FDGH', 'DFGH', 'SDF', '0000-00-00 00:00:00', 0, 'DFS', 0),
(3, 'FDGH', 'DFGH', 'SDF', '0000-00-00 00:00:00', 0, 'DFS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `list_mail`
--

CREATE TABLE `list_mail` (
  `id` int(11) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `code` varchar(20) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `list_mail`
--

INSERT INTO `list_mail` (`id`, `mail`, `code`, `date_created`) VALUES
(6, 'buihai2603@gmail.com', 'GytOJgZduCHSLlMVvEin', '2016-03-12 23:31:05'),
(7, 'buiha@gmail.com', 'hEDeFpOStlqLkXUMKAjd', '2016-03-12 23:34:54'),
(8, 'qwergt@gmail.com', 'CrbLevdXYWnxmFBjlqQO', '2016-03-12 23:35:21'),
(9, 'adsfg@gmail.com', 'dZNLIPGjxQgtzpTvqurK', '2016-03-12 23:36:04'),
(10, 'dfdsfsdsfghjklkjhgfds', 'rxfjRODNWdbovVkquyHe', '2016-03-12 23:40:01'),
(11, 'fsdfssdfghjjhgfdsa', 'MDyfqaAFYOgkvoBLHPQK', '2016-03-12 23:41:05'),
(12, 'sádfadsfghjkl', 'VkHqMTUcaEnJervdFjfC', '2016-03-12 23:41:32'),
(13, 'asdfghjkl;'';lkjhgfd', 'vfqhgkuEJcXxVYGbyjRC', '2016-03-12 23:42:57'),
(14, 'adefgdthjklsdfgh', 'jNPySTxHlpgiOXFcdBJR', '2016-03-12 23:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(300) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `user` varchar(25) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `date_order` datetime NOT NULL,
  `total` int(11) NOT NULL,
  `date_ship` datetime NOT NULL,
  `address_ship` varchar(255) NOT NULL,
  `receiver_name` varchar(25) NOT NULL,
  `contact` varchar(225) NOT NULL,
  `note` varchar(2000) NOT NULL,
  `transaction_id` int(10) NOT NULL,
  `fee_shipping` int(11) NOT NULL,
  `bank_code` varchar(20) NOT NULL,
  `discount_amount` int(11) NOT NULL,
  `tax_amount` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `order_code`, `user`, `mail`, `date_order`, `total`, `date_ship`, `address_ship`, `receiver_name`, `contact`, `note`, `transaction_id`, `fee_shipping`, `bank_code`, `discount_amount`, `tax_amount`, `status`) VALUES
(51, 'UFLGAHXG_1457976612', 'buihai2603@gmail.com', 'sd', '2016-03-15 00:30:12', 0, '0000-00-00 00:00:00', '', 'sd', 'sd', 'ds', 0, 0, '', 0, 0, 0),
(52, 'MBHPCCZD_1457976652', 'buihai2603@gmail.com', 'buihai2603@gmail.com', '2016-03-15 00:30:52', 0, '0000-00-00 00:00:00', '', 'Bui Van Hai', '+841664872279', 'ưedrfghj', 0, 0, '', 0, 0, 0),
(53, 'CUIZPFGW_1457976819', 'buihai2603@gmail.com', 'buihai2603@gmail.com', '2016-03-15 00:33:39', 0, '0000-00-00 00:00:00', '', 'Bui Van Hai', '+841664872279', 'ưedrfghj', 0, 0, '', 0, 0, 2),
(54, 'ADCEOBIC_1457976843', 'buihai2603@gmail.com', 'buihai2603@gmail.com', '2016-03-15 00:34:03', 0, '0000-00-00 00:00:00', '', 'Bui Van Hai', '+841664872279', 'ưedrfghj', 0, 0, '', 0, 0, 0),
(55, 'BHCWUECG_1457976903', 'buihai2603@gmail.com', 'buihai2603@gmail.com', '2016-03-15 00:35:03', 0, '0000-00-00 00:00:00', '', 'Bui Van Hai', '+841664872279', 'ưedrfghj', 0, 0, '', 0, 0, 2),
(56, 'BVUGGAFA_1457977613', 'buihai2603@gmail.com', 'haibuiplus@gmail.com', '2016-03-15 00:46:53', 0, '0000-00-00 00:00:00', '', 'Bui Van Hai', '+841664872279', 'Ngày mai nhận hàng', 0, 0, '', 0, 0, 2),
(57, 'DTYPUNAI_1457977832', 'buihai2603@gmail.com', 'buihai2603@gmail.com', '2016-03-15 00:50:32', 0, '0000-00-00 00:00:00', '', 'Bui Van Hai', '+841664872279', 'hanh toán trực tuyến AN TOÀN và ĐƯỢC BẢO VỆ, sử dụng thẻ ngân hàng trong và ngoài nước hoặc nhiều hình', 0, 0, '', 0, 0, 0),
(58, 'EBMGGQAS_1457977989', 'buihai2603@gmail.com', 'buihai2603@gmail.com', '2016-03-15 00:53:09', 0, '0000-00-00 00:00:00', '', 'Bui Van Hai', '+841664872279', 'ưedrfghj', 20853155, 0, 'VTB', 0, 0, 0),
(59, 'BWRHVFGZ_1457978261', 'buihai2603@gmail.com', '', '2016-03-15 00:57:41', 0, '0000-00-00 00:00:00', '', '', '', '', 0, 0, '', 0, 0, 0),
(60, 'LORHFBNC_1457978288', 'buihai2603@gmail.com', 'buihai2603@gmail.com', '2016-03-15 00:58:08', 0, '0000-00-00 00:00:00', '', 'Bui Van Hai', '+841664872279', 'ưedrfghj', 0, 0, '', 0, 0, 0),
(61, 'FECDHQKG_1457978884', 'buihai2603@gmail.com', 'buihai2603@gmail.com', '2016-03-15 01:08:04', 0, '0000-00-00 00:00:00', 'Phu Dien', 'Bui Van Hai', '+841664872279', 'ưedrfghj', 0, 0, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `id_product`, `qty`, `price`) VALUES
(1, 19, 30, 2, 19990000),
(2, 1, 29, 1, 21590000),
(3, 2, 27, 1, 21790000),
(4, 20, 30, 2, 19990000),
(5, 4, 29, 1, 21590000),
(6, 5, 27, 1, 21790000),
(7, 21, 30, 2, 19990000),
(8, 21, 29, 1, 21590000),
(9, 21, 27, 1, 21790000),
(10, 22, 30, 2, 19990000),
(11, 22, 29, 1, 21590000),
(12, 22, 27, 1, 21790000),
(13, 23, 25, 1, 24790000),
(14, 23, 27, 3, 21790000),
(15, 23, 29, 3, 21590000),
(16, 24, 25, 1, 24790000),
(17, 24, 30, 2, 19990000),
(18, 25, 25, 1, 24790000),
(19, 26, 25, 2, 24790000),
(20, 28, 25, 1, 24790000),
(21, 39, 28, 1, 21790000);

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE `pay` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` int(20) NOT NULL,
  `sold` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `category_id` int(11) NOT NULL,
  `top` int(11) NOT NULL DEFAULT '0',
  `img` varchar(300) NOT NULL,
  `video` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `link` varchar(2000) NOT NULL,
  `detail` varchar(1000) NOT NULL,
  `caption` varchar(2000) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `sold`, `total`, `status`, `category_id`, `top`, `img`, `video`, `description`, `link`, `detail`, `caption`, `date_created`, `last_updated`) VALUES
(24, 'iPhone 6s Plus 128GB', 'iphone-6s-plus-128gb', 27490000, 0, 0, 1, 1, 0, 'https://cdn.tgdd.vn/Products/Images/42/73705/iphone-6s-plus-128gb-1-200x200.jpg', '', 'Màn hình: Retina HD, 5.5 inches|HĐH: iOS 9|CPU: A9 64 bit, RAM 2GB|Camera: 12.0MP, 1 SIM|Dung lượng pin: 2750 mAh', 'https://www.thegioididong.com/images/42/73705/Slider/iphone-6s-slider-02.jpg|https://www.thegioididong.com/images/42/73705/Slider/iphone-6s-slider-01.jpg|https://www.thegioididong.com/images/42/73705/Slider/iphone-6s-slider-03.jpg|https://www.thegioididong.com/images/42/73705/Slider/iphone-6s-slider-04.jpg|https://www.thegioididong.com/images/42/73705/Slider/iphone-6s-slider-05.jpg|https://www.thegioididong.com/images/42/73705/Kit/iphone-6s-plus-128gb-bobanhangchuan-org.jpg', 'Màn hình:  LED-backlit IPS LCD, 5.5", Retina HD|Hệ điều hành:  iOS 9|Camera sau:  12 MP|Camera trước:  5 MP|CPU:  Apple A9 2 nhân 64-bit, 1.8 GHz|RAM:  2 GB|Bộ nhớ trong:  128 GB|Hỗ trợ thẻ nhớ:  Không, Không|Thẻ SIM:  1 Sim, Nano SIM|Kết nối:  4G LTE Cat 6|Dung lượng pin:  2750 mAh|Thiết kế:  Nguyên khối|Chức năng đặc biệt:  Mở khóa bằng vân tay', 'iPhone 6S d&ugrave;ng nh&ocirc;m 7000 mới c&ugrave;ng thiết kế nguy&ecirc;n khối gi&uacute;p tăng cường độ cứng|iPhone 6s Plus được trang bị màn hình cảm ứng lực 3D Touch tiện lợi và thú vị.|Trang bị vi xử lý A9 mang lại hiệu suất vượt trội rất nhiều so với thế hệ trước.|Camera iSight được n&acirc;ng cấp l&ecirc;n độ ph&acirc;n giải 12 MP cho khả năng chụp ảnh vượt trội|Cảm biến v&acirc;n tay Touch ID thế hệ 2 cho khả năng nhận diện v&agrave; mở kh&oacute;a bảo mật nhanh hơn.|Bộ sản phẩm chuẩn:  Hộp, Sạc, Tai nghe, S&#225;ch hướng dẫn, C&#225;p, C&#226;y lấy sim', '2016-03-12 15:47:35', '0000-00-00 00:00:00'),
(25, 'iPhone 6 Plus 128GB', 'iphone-6-plus-128gb', 24790000, 0, 0, 1, 1, 0, 'https://cdn.tgdd.vn/Products/Images/42/70260/iphone-6-plus-128gb-nowatermark-190x190.jpg', '', 'Màn hình: Retina HD, 5.5 inches|HĐH: iOS 9|CPU: A8 64 bit, RAM 1GB|Camera: 8.0MP, 1 SIM|Dung lượng pin: 2915 mAh', 'https://www.thegioididong.com/images/42/70260/Slider/iphone-6-plus-(1).jpg|https://www.thegioididong.com/images/42/70260/Slider/iphone-6-plus-2.jpg|https://www.thegioididong.com/images/42/70260/Slider/iphone-6-plus-3.jpg|https://www.thegioididong.com/images/42/70260/Slider/iphone-6-plus-4.jpg|https://www.thegioididong.com/images/42/70260/Slider/iphone-6-plus-5.jpg|https://www.thegioididong.com/images/42/70260/Kit/iphone-6-plus-128gb-bo-ban-hang-800x496-chuan1.jpg', 'Màn hình:  LED-backlit IPS LCD, 5.5", Retina HD|Hệ điều hành:  iOS 9|Camera sau:  8 MP|Camera trước:  1.2 MP|CPU:  Apple A8 2 nhân 64-bit, 1.4 GHz|RAM:  1 GB|Bộ nhớ trong:  128 GB|Hỗ trợ thẻ nhớ:  Không, Không|Thẻ SIM:  1 Sim, Nano SIM|Kết nối:  4G LTE Cat 4|Dung lượng pin:  2915 mAh|Thiết kế:  Nguyên khối|Chức năng đặc biệt:  Mở khóa bằng vân tay', 'iPhone 6 Plus 128 GB với m&agrave;n h&igrave;nh 5.5 inch, g&oacute;c bo tr&ograve;n v&agrave; mặt k&iacute;nh 2.5D gi&uacute;p dễ d&agrave;ng cầm nắm v&agrave; thao t&aacute;c|M&agrave;n h&igrave;nh Retina HD c&ugrave;ng vi xử l&yacute; A8 cho trải nghiệm h&igrave;nh ảnh, hiệu năng vượt trội|Giao diện đặc trưng của Apple giúp bạn dễ dàng thao tác trên máy.|Camera 8 MP c&ugrave;ng t&iacute;nh năng chống rung quang học gi&uacute;p ảnh sắc n&eacute;t, chi tiết|Touch ID gi&uacute;p n&acirc;ng cao t&iacute;nh bảo mật v&agrave; tiện lợi|Bộ sản phẩm chuẩn:  Hộp, Sạc, Tai nghe, S&#225;ch hướng dẫn, C&#226;y lấy sim', '2016-03-12 15:47:35', '0000-00-00 00:00:00'),
(26, 'iPhone 6s 128GB', 'iphone-6s-128gb', 24690000, 0, 0, 1, 1, 0, 'https://cdn3.tgdd.vn/Products/Images/42/73703/iphone-6s-128gb-hong-300-200x200.jpg', '', 'Màn hình: Retina HD, 4.7 inches|HĐH: iOS 9|CPU: Apple A9, RAM 2GB|Camera: 12.0MP|Pin: 1715mAh', 'https://www.thegioididong.com/images/42/73703/Slider/iphone-6s-128gb-1-(1).jpg|https://www.thegioididong.com/images/42/73703/Slider/iphone-6s-128gb-1-(2).jpg|https://www.thegioididong.com/images/42/73703/Slider/iphone-6s-128gb-4-(2).jpg|https://www.thegioididong.com/images/42/73703/Slider/iphone-6s-128gb-4-(1).jpg|https://www.thegioididong.com/images/42/73703/Slider/iphone-6s-128gb-5.jpg|https://www.thegioididong.com/images/42/73703/Kit/iphone-6s-128gb-bobanhangchuan-org.jpg', 'Màn hình:  LED-backlit IPS LCD, 4.7", Retina HD|Hệ điều hành:  iOS 9|Camera sau:  12 MP|Camera trước:  5 MP|CPU:  Apple A9 2 nhân 64-bit, 1.8 GHz|RAM:  2 GB|Bộ nhớ trong:  128 GB|Hỗ trợ thẻ nhớ:  Không, Không|Thẻ SIM:  1 Sim, Nano SIM|Kết nối:  4G LTE Cat 6|Dung lượng pin:  1715 mAh|Thiết kế:  Nguyên khối|Chức năng đặc biệt:  Mở khóa bằng vân tay', 'iPhone 6s được trang bị màn hình cảm ứng lực 3D Touch tiện lợi và thú vị.|iPhone 6s d&ugrave;ng nh&ocirc;m 7000 mới c&ugrave;ng thiết kế nguy&ecirc;n khối gi&uacute;p tăng cường độ cứng&nbsp;|Trang bị vi xử lý A9 mang lại hiệu suất vượt trội rất nhiều so với thế hệ trước.|Camera iSight được nâng cấp lên độ phân giải 12 MP cho khả năng chụp ảnh tuyệt vời hơn.|Một n&acirc;ng cấp đ&aacute;ng gi&aacute; kh&aacute;c ch&iacute;nh l&agrave; camera iSign đ&atilde; được thay cảm biến 12.0MP cho khả năng chụp ảnh c&agrave;ng tuyệt vời hơn|Bộ sản phẩm chuẩn:  Hộp, Sạc, Tai nghe, S&#225;ch hướng dẫn, C&#225;p, C&#226;y lấy sim', '2016-03-12 15:47:35', '0000-00-00 00:00:00'),
(27, 'iPhone 6s Plus 16GB', 'iphone-6s-plus', 21790000, 0, 0, 1, 1, 0, 'https://cdn.tgdd.vn/Products/Images/42/71770/iphone-6s-plus-16gb-200x200.jpg', '', 'Màn hình: Retina HD, 5.5 inches|HĐH: iOS 9|CPU: A9 64 bit, RAM 2GB|Camera: 12.0MP, 1 SIM|Dung lượng pin: 2750 mAh', 'https://www.thegioididong.com/images/42/71770/Slider/iphone-6s-slider-02.jpg|https://www.thegioididong.com/images/42/71770/Slider/iphone-6s-plus-screen.jpg|https://www.thegioididong.com/images/42/71770/Slider/iphone-6s-slider-03.jpg|https://www.thegioididong.com/images/42/71770/Slider/iphone6s-color.jpg|https://www.thegioididong.com/images/42/71770/Slider/iphone-6s-slider-01.jpg|https://www.thegioididong.com/images/42/71770/Slider/iphone-6s-slider-04.jpg|https://www.thegioididong.com/images/42/71770/Slider/iphone-6s-slider-05.jpg|https://www.thegioididong.com/images/42/71770/Kit/iphone-6s-plus-64gb-bobanhangchuan-org.jpg', 'Màn hình:  LED-backlit IPS LCD, 5.5", Retina HD|Hệ điều hành:  iOS 9|Camera sau:  12 MP|Camera trước:  5 MP|CPU:  Apple A9 2 nhân 64-bit, 1.8 GHz|RAM:  2 GB|Bộ nhớ trong:  16 GB|Hỗ trợ thẻ nhớ:  Không, Không|Thẻ SIM:  1 Sim, Nano SIM|Kết nối:  WiFi, 3G, 4G LTE Cat 6|Dung lượng pin:  2750 mAh|Thiết kế:  Nguyên khối|Chức năng đặc biệt:  Mở khóa bằng vân tay', 'iPhone 6s d&ugrave;ng nh&ocirc;m 7000 mới c&ugrave;ng thiết kế nguy&ecirc;n khối gi&uacute;p tăng cường độ cứng&nbsp;|iPhone 6S Plus có màn hình kích thước 5.5 inch độ phân giải Full HD cho trải nghiệm chơi game, xem phim thú vị hơn.|Trang bị vi xử lý A9 mang lại hiệu suất vượt trội rất nhiều so với thế hệ trước.|Cũng như iPhone 6S, iPhone 6S Plus cũng được trang bị màu mới: ROSE GOLD.|iPhone 6s Plus được trang bị màn hình cảm ứng lực 3D Touch tiện lợi và thú vị.|Camera iSight được nâng cấp lên độ phân giải 12 MP cho khả năng chụp ảnh tuyệt vời hơn.|Cảm biến vân tay Touch ID thế hệ 2 cho khả năng nhận diện và mở khóa bảo mật nhanh hơn nhiều lần.|Bộ sản phẩm chuẩn:  Hộp, Sạc, Tai nghe, S&#225;ch hướng dẫn, C&#225;p, C&#226;y lấy sim', '2016-03-12 15:47:35', '0000-00-00 00:00:00'),
(28, 'iPhone 6s 64GB', 'iphone-6s-64gb', 21790000, 0, 0, 1, 1, 0, 'https://cdn.tgdd.vn/Products/Images/42/73090/iphone-6s-64gb-icon-200x200.jpg', '', 'Màn hình: Retina HD, 4.7 inches|HĐH: iOS 9|CPU: Apple A9, RAM 2GB|Camera: 12MP, 1 SIM|Pin: 1715mAh', 'https://www.thegioididong.com/images/42/73090/Slider/iphone-6s-64gb-1.jpg|https://www.thegioididong.com/images/42/73090/Slider/iphone-6s-64gb-2.jpg|https://www.thegioididong.com/images/42/73090/Slider/iphone-6s-64gb-3.jpg|https://www.thegioididong.com/images/42/73090/Slider/iphone-6s-64gb-4.jpg|https://www.thegioididong.com/images/42/73090/Slider/iphone-6s-64gb-5.jpg|https://www.thegioididong.com/images/42/73090/Kit/iphone-6s-64gb-bobanhangchuan-org.jpg', 'Màn hình:  LED-backlit IPS LCD, 4.7", Retina HD|Hệ điều hành:  iOS 9|Camera sau:  12 MP|Camera trước:  5 MP|CPU:  Apple A9 2 nhân 64-bit, 1.8 GHz|RAM:  2 GB|Bộ nhớ trong:  64 GB|Hỗ trợ thẻ nhớ:  Không, Không|Thẻ SIM:  1 Sim, Nano SIM|Kết nối:  WiFi, 3G, 4G LTE Cat 6|Dung lượng pin:  1715 mAh|Thiết kế:  Nguyên khối|Chức năng đặc biệt:  Mở khóa bằng vân tay', 'iPhone 6s được trang bị màn hình cảm ứng lực 3D Touch tiện lợi và thú vị.|iPhone 6s d&ugrave;ng nh&ocirc;m 7000 mới c&ugrave;ng thiết kế nguy&ecirc;n khối gi&uacute;p tăng cường độ cứng&nbsp;|Trang bị vi xử lý A9 mang lại hiệu suất vượt trội rất nhiều so với thế hệ trước.|Camera iSight được nâng cấp lên độ phân giải 12 MP cho khả năng chụp ảnh tuyệt vời hơn.|Cảm biến vân tay Touch ID thế hệ 2 cho khả năng nhận diện và mở khóa bảo mật nhanh hơn nhiều lần.|Bộ sản phẩm chuẩn:  Hộp, Sạc, Tai nghe, S&#225;ch hướng dẫn, C&#225;p, C&#226;y lấy sim', '2016-03-12 15:47:35', '0000-00-00 00:00:00'),
(29, 'iPhone 6 Plus 64GB', 'iphone-6-plus-64gb', 21590000, 0, 0, 1, 1, 0, 'https://cdn4.tgdd.vn/Products/Images/42/70259/iphone-6-plus-64gb128gb-nowatermark-190x190.jpg', '', 'Màn hình: Retina HD, 5.5 inches|HĐH: iOS 9|CPU: A8 64 bit,|Camera: 8.0MP, 1 SIM|Pin: 2915mAh', 'https://www.thegioididong.com/images/42/70259/Slider/iphone-6-plus-64gb--(1).jpg|https://www.thegioididong.com/images/42/70259/Slider/iphone-6-plus-2.jpg|https://www.thegioididong.com/images/42/70259/Slider/iphone-6-plus-3.jpg|https://www.thegioididong.com/images/42/70259/Slider/iphone-6-plus-4.jpg|https://www.thegioididong.com/images/42/70259/Slider/iphone-6-plus-5.jpg|https://www.thegioididong.com/images/42/70259/Kit/iphone-6-plus-64gb-bobanhangchuan2-org.jpg', 'Màn hình:  LED-backlit IPS LCD, 5.5", Retina HD|Hệ điều hành:  iOS 8.0|Camera sau:  8 MP|Camera trước:  1.2 MP|CPU:  Apple A8 2 nhân 64-bit, 1.4 GHz|RAM:  1 GB|Bộ nhớ trong:  64 GB|Hỗ trợ thẻ nhớ:  Không, Không|Thẻ SIM:  1 Sim, Nano SIM|Kết nối:  4G LTE Cat 4|Dung lượng pin:  2915 mAh|Thiết kế:  Nguyên khối|Chức năng đặc biệt:  Mở khóa bằng vân tay', 'iPhone 6 Plus 64 GB với màn hình 5.5 inch, các góc bo tròn và mặt kính mài tinh xảo giúp dễ dàng cầm nắm và thao tác hơn.|Màn hình Retina độ phân giải Full HD cùng vi xử lý A8 cho trải nghiệm xem phim, duyệt web, chơi game hấp dẫn hơn.|Giao diện đặc trưng của Apple giúp bạn dễ dàng thao tác trên máy.|Camera 8 MP cùng tính năng chống rung quang học giúp ảnh sắc nét căng, màu sắc trung thực giàu chi tiết.|Touch ID giúp an toàn hơn trong bảo mật thông tin. Khả năng nhận diện dấu vân tay nhanh hơn giúp người dùng mở máy tức thì, chính xác.|Bộ sản phẩm chuẩn:  Hộp, Sạc, Tai nghe, S&#225;ch hướng dẫn, C&#226;y lấy sim', '2016-03-12 15:47:35', '0000-00-00 00:00:00'),
(30, 'Samsung Galaxy S6 Edge Plus', 'samsung-galaxy-s6-edge-plus', 19990000, 0, 0, 1, 1, 0, 'https://cdn.tgdd.vn/Products/Images/42/72530/samsung-galaxy-s6-edge-plus-9-200x200.jpg', '', 'Màn hình: QuadHD, 5.7 inches|HĐH: Android 5.1|CPU: 8 nhân, RAM 4GB|Camera: 16.0MP, 1 SIM|Dung lượng pin: 3000 mAh', 'https://www.thegioididong.com/images/42/72530/Slider/samsung-galaxy-s6-edge-plus-1.jpg|https://www.thegioididong.com/images/42/72530/Slider/samsung-galaxy-s6-edge-plus-2.jpg|https://www.thegioididong.com/images/42/72530/Slider/samsung-galaxy-s6-edge-plus-3.jpg|https://www.thegioididong.com/images/42/72530/Kit/samsung-galaxy-s6-edge-plus-bo-ban-hang-chuan1-org.jpg', 'Màn hình:  Super AMOLED, 5.7", Quad HD|Hệ điều hành:  Android 5.1 (Lollipop)|Camera sau:  16 MP|Camera trước:  5 MP|CPU:  Exynos 7420 8 nhân 64-bit, 4 nhân 1.5 GHz Cortex-A53 & 4 nhân 2.1 GHz Cortex-A57|RAM:  4 GB|Bộ nhớ trong:  32 GB|Hỗ trợ thẻ nhớ:  Không, Không|Thẻ SIM:  1 Sim, Nano SIM|Kết nối:  WiFi, 3G, 4G LTE Cat 6|Dung lượng pin:  3000 mAh|Thiết kế:  Pin liền|Chức năng đặc biệt:  Mở khóa bằng vân tay, Sạc pin không dây, Sạc pin nhanh', 'Là phiên bản nâng cấp từ S6 Edge với màn hình 5.7 inch, vi xử lý Exynos 7420 RAM 4G cho tốc độ đáng kinh ngạc.|S6 Edge Plus có màn hình cong vô cùng độc đáo và tiện ích với nhiều ứng dụng có thể sử dụng trên phần cong ngày hơn.|Sạc không dây hỗ trợ sạc nhanh với chỉ 120 phút cho 100% pin.|Bộ sản phẩm chuẩn:  Hộp, Sạc, Tai nghe, S&#225;ch hướng dẫn, C&#225;p, C&#226;y lấy sim', '2016-03-12 15:47:36', '0000-00-00 00:00:00'),
(31, 'Sony Xperia Z5 Premium Dual', 'sony-xperia-z5-premium', 19990000, 0, 0, 1, 1, 0, 'https://cdn3.tgdd.vn/Products/Images/42/73023/sony-xperia-z5-premium-200x200.jpg', '', 'Màn hình: 4K, 5.5 inches|HĐH: Android 5.1 (Lollipop)|CPU: 8 nhân, RAM 3GB|Camera: 23.0MP, 2 SIM|Pin: 3430mAh', 'https://www.thegioididong.com/images/42/73023/Slider/sony-xperia-z5-premium.jpg|https://www.thegioididong.com/images/42/73023/Slider/sony-xperia-z5-premium-1.jpg|https://www.thegioididong.com/images/42/73023/Slider/sony-xperia-z5-premium-2.jpg|https://www.thegioididong.com/images/42/73023/Slider/sony-xperia-z5-premium-3.jpg|https://www.thegioididong.com/images/42/73023/Kit/sony-xperia-z5-premium-bobanhangchuan-org.jpg', 'Màn hình:  IPS LCD, 5.5", IPS-LCD|Hệ điều hành:  Android 5.1 (Lollipop)|Camera sau:  23 MP|Camera trước:  5 MP|CPU:  Snapdragon 810 8 nhân 64-bit, 4 nhân 1.5 GHz Cortex-A53 & 4 nhân 2 GHz Cortex-A57|RAM:  3 GB|Bộ nhớ trong:  32 GB|Hỗ trợ thẻ nhớ:  MicroSD (T-Flash), 200 GB|Thẻ SIM:  2 SIM 2 sóng, Nano SIM|Kết nối:  WiFi, 3G, 4G LTE Cat 6|Dung lượng pin:  3430 mAh|Thiết kế:  Nguyên khối|Chức năng đặc biệt:  Mở khóa bằng vân tay, Chống nước, chống bụi, Sạc pin nhanh', 'Z5 Premium với thiết kế Monolithics đặc trưng, màn hình 5.5" độ phân giải 4k, mặt lưng được ốp kính sáng bóng.|Z5 Premium là smartphone đầu tiên sử dụng màn hình độ phân giải 4K cùng công nghệ điều chỉnh chỉnh độ phân giải theo nhu cầu sử dụng tiện lợi.|Camera đầy danh tiếng của Z5 được đưa vào Z5 Premium để tăng cường trải nghiệm chụp ảnh cho người dùng.|Cảm biến vân tay 1 chạm tiện lợi và bảo mật hơn.|Bộ sản phẩm chuẩn:  Hộp, Sạc, Tai nghe, S&#225;ch hướng dẫn, C&#225;p', '2016-03-12 15:47:36', '0000-00-00 00:00:00'),
(32, 'iPhone 6 Plus 16GB', 'iphone-6-plus-16gb', 18490000, 0, 0, 1, 1, 0, 'https://cdn3.tgdd.vn/Products/Images/42/69783/iphone-6-plus-16gb-64gb128gb-nowatermark-190x190.jpg', '', 'Màn hình: Retina HD, 5.5 inches|HĐH: iOS 9|CPU: A8 64 bit,|Camera: 8.0MP, 1 SIM|Pin: 2915mAh', 'https://www.thegioididong.com/images/42/69783/Slider/iphone-6-plus-16gb-trang-1.jpg|https://www.thegioididong.com/images/42/69783/Slider/iphone-6-plus-16gb-trang-10.jpg|https://www.thegioididong.com/images/42/69783/Slider/iphone-6-plus-16gb-trang-14.jpg|https://www.thegioididong.com/images/42/69783/Slider/iphone-6-plus-16gb-trang-13.jpg|https://www.thegioididong.com/images/42/69783/Slider/iphone-6-plus-16gb-trang-8.jpg|https://www.thegioididong.com/images/42/69783/Kit/iphone-6-plus-16gb-bobanhangchuan3-org.jpg', 'Màn hình:  LED-backlit IPS LCD, 5.5", Retina HD|Hệ điều hành:  iOS 9|Camera sau:  8 MP|Camera trước:  1.2 MP|CPU:  Apple A8 2 nhân 64-bit, 1.4 GHz|RAM:  1 GB|Bộ nhớ trong:  16 GB|Hỗ trợ thẻ nhớ:  Không, Không|Thẻ SIM:  1 Sim, Nano SIM|Kết nối:  4G LTE Cat 4|Dung lượng pin:  2915 mAh|Thiết kế:  Nguyên khối|Chức năng đặc biệt:  Mở khóa bằng vân tay', 'iPhone 6 Plus 16 GB với màn hình 5.5 inch, các góc bo tròn và mặt kính mài tinh xảo giúp dễ dàng cầm nắm và thao tác hơn.|Màn hình Retina độ phân giải Full HD cùng vi xử lý A8 cho trải nghiệm xem phim, duyệt web, chơi game hấp dẫn hơn.|Giao diện đặc trưng của Apple giúp bạn dễ dàng thao tác trên máy.|Camera 8 MP cùng tính năng chống rung quang học giúp ảnh sắc nét căng, màu sắc trung thực giàu chi tiết.|Touch ID giúp an toàn hơn trong bảo mật thông tin. Khả năng nhận diện dấu vân tay nhanh hơn giúp người dùng mở máy tức thì, chính xác.|Bộ sản phẩm chuẩn:  Hộp, Sạc, Tai nghe, S&#225;ch hướng dẫn, C&#226;y lấy sim', '2016-03-12 15:47:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `caption` int(150) NOT NULL,
  `img` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `link` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `mail` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` int(1) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `mail`, `password`, `level`, `status`, `date_created`, `code`) VALUES
(16, 'buihai2603@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, '2016-02-21 14:46:17', ''),
(19, 'demo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, '2016-01-08 00:00:00', ''),
(20, 'demo1@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 0, 1, '2016-01-08 00:00:00', ''),
(21, 'demo2@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 0, 1, '2016-01-08 00:00:00', ''),
(22, 'demo3@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 0, 1, '2016-01-08 00:00:00', ''),
(25, 'demo4@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 1, 1, '2016-02-12 00:00:00', ''),
(28, 'demo7@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 1, 1, '2016-02-12 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_mail`
--
ALTER TABLE `list_mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `list_mail`
--
ALTER TABLE `list_mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
