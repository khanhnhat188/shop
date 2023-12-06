-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th5 09, 2022 lúc 08:39 AM
-- Phiên bản máy phục vụ: 5.7.36
-- Phiên bản PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'demo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE IF NOT EXISTS `danhmuc` (
  `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT,
  `tendanhmuc` varchar(100) NOT NULL,
  PRIMARY KEY (`id_danhmuc`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `tendanhmuc`) VALUES
(1, 'Laptop'),
(3, 'Điện Thoại'),
(2, 'Smartwatch'),
(12, ' Tablet');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `id_sanpham` int(11) NOT NULL AUTO_INCREMENT,
  `tensanpham` varchar(250) NOT NULL,
  `giasp` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `noidung` text NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `noibat` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  PRIMARY KEY (`id_sanpham`),
  KEY `fk_danhmuc` (`id_danhmuc`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `tensanpham`, `giasp`, `soluong`, `hinhanh`, `noidung`, `tinhtrang`, `noibat`, `id_danhmuc`) VALUES
(19, 'Xiaomi Redmi 9A', '2490000', 10, '1651543611_redmi9a.jpg', '   Xiaomi Redmi 9A là chiếc smartphone đến từ Xiaomi hướng tới nhóm khách hàng đang tìm kiếm cho mình một sản phẩm với cấu hình tốt giá thành phải chăng, cũng như được trang bị đầy đủ các tính năng ấn tượng.    ', 1, 2, 3),
(20, 'Xiaomi Redmi 9C', '2990000', 2, '1651543651_9c.jpg', 'Xiaomi Redmi 9C (3GB/64GB), smartphone nổi bật trong phân khúc điện thoại giá rẻ với thiết kế tinh tế sang trọng, hiệu năng mạnh mẽ Helio G35 mới, viên pin dung lượng khủng, cùng bộ 3 AI camera bắt trọn mọi khoảnh khắc.  ', 1, 0, 3),
(21, 'Xiaomi Redmi 10C 64GB', '3490000', 19, '1651543721_xiaomi-redmi-10c.jpg', 'Xiaomi Redmi 10C ra mắt với một cấu hình mạnh mẽ nhờ trang bị con chip 6 nm đến từ Qualcomm, màn hình hiển thị đẹp mắt, pin đáp ứng nhu cầu sử dụng cả ngày, hứa hẹn mang đến trải nghiệm tuyệt vời so với mức giá mà nó trang bị.', 1, 0, 3),
(22, 'Xiaomi Redmi Note 11', '4690000', 1, '1651543806_note11.jpg', 'Điện thoại Redmi được mệnh danh là dòng sản phẩm quốc dân ngon - bổ  - rẻ của Xiaomi và Redmi Note 11 (4GB/64GB) cũng không phải ngoại lệ, máy sở hữu một hiệu năng ổn định, màn hình 90 Hz mượt mà, cụm camera AI đến 50 MP cùng một mức giá vô cùng tốt.', 1, 0, 3),
(23, 'Xiaomi 11T 5G', '10990000', 1, '1651544265_xiaomi-11t-(6).jpg', 'Xiaomi 11T đầy nổi bật với thiết kế vô cùng trẻ trung, màn hình AMOLED, bộ 3 camera sắc nét và viên pin lớn đây sẽ là mẫu smartphone của Xiaomi thỏa mãn mọi nhu cầu giải trí, làm việc và là niềm đam mê sáng tạo của bạn. ', 1, 0, 3),
(24, 'Xiaomi 12', '19990000', 3, '1651544347_xiaomi-mi-12.jpg', 'Xiaomi đang dần khẳng định chỗ đứng của mình trong phân khúc điện thoại flagship bằng việc ra mắt Xiaomi 12 với bộ thông số ấn tượng, máy có một thiết kế gọn gàng, hiệu năng mạnh mẽ, màn hình hiển thị chi tiết cùng khả năng chụp ảnh sắc nét nhờ trang bị ống kính đến từ Sony.', 1, 0, 3),
(25, 'Xiaomi Mi 11 Lite', '7990000', 1, '1651544457_xiaomi-mi-11-lite-4g-blue-600x600.jpg', 'Xiaomi Mi 11 Lite là phiên bản thu gọn của Xiaomi Mi 11 5G được ra mắt trước đó. Thừa hưởng nhiều ưu điểm của đàn anh, Mi 11 Lite hoàn toàn có thể đáp ứng tốt các tác vụ thông thường một cách dễ dàng và đặc biệt hơn máy có thiết kế vô cùng mỏng nhẹ và thời trang.', 1, 0, 3),
(26, 'Xiaomi Redmi Note 10S', '5990000', 2, '1651544506_xiaomi-redmi-note-10s-6gb-(4).jpg', 'Redmi Note 10S 6GB đến từ nhà Xiaomi thuộc phân khúc smartphone giá tầm trung nhưng chinh phục người tiêu dùng với thiết kế sang đẹp, cấu hình ấn tượng và cụm camera cực chất, sẽ là thiết bị liên lạc, chiến game giải trí và làm việc ổn định,… cho các nhu cầu sử dụng của bạn.', 1, 0, 3),
(27, 'Xiaomi Redmi Note 11 Pro', '7490000', 6, '1651544574_xiaomi-redmi-note-11-pro-4g-(2).jpg', 'Xiaomi Redmi Note 11 Pro 4G mang trong mình khá nhiều những nâng cấp cực kì sáng giá. Là chiếc điện thoại có màn hình lớn, tần số quét 120 Hz, hiệu năng ổn định cùng một viên pin siêu trâu.', 1, 0, 3),
(28, 'Xiaomi Redmi Note 11S 5G', '6490000', 7, '1651544616_xiaomi-redmi-note-11s-5g.jpg', 'Tại sự kiện ra mắt sản phẩm mới diễn ra hôm 29/3, Xiaomi đã ra mắt Xiaomi Redmi Note 11S 5G toàn cầu. Thiết bị là một bản nâng cấp đáng giá so với Redmi Note 11S 4G, cùng xem máy có gì đặc biệt thôi nào.', 1, 0, 3),
(29, 'iPhone 11', '14990000', 1, '1651544757_iphone-11-(46).jpg', 'Apple đã chính thức trình làng bộ 3 siêu phẩm iPhone 11, trong đó phiên bản iPhone 11 64GB có mức giá rẻ nhất nhưng vẫn được nâng cấp mạnh mẽ như iPhone Xr ra mắt trước đó.', 1, 0, 3),
(30, 'iPhone 13 Pro Max', '33990000', 10, '1651544793_iphone-13-pro-max-(6).jpg', '  iPhone 13 Pro Max 128 GB - siêu phẩm được mong chờ nhất ở nửa cuối năm 2021 đến từ Apple. Máy có thiết kế không mấy đột phá khi so với người tiền nhiệm, bên trong đây vẫn là một sản phẩm có màn hình siêu đẹp, tần số quét được nâng cấp lên 120 Hz mượt mà, cảm biến camera có kích thước lớn hơn, cùng hiệu năng mạnh mẽ với sức mạnh đến từ Apple A15 Bionic, sẵn sàng cùng bạn chinh phục mọi thử thách.  ', 1, 3, 3),
(31, 'iPhone 13 Pro', '30990000', 15, '1651544831_iphone-13-pro-thumb-600x600.jpg', 'Mỗi lần ra mắt phiên bản mới là mỗi lần iPhone chiếm sóng trên khắp các mặt trận và lần này cái tên khiến vô số người \"sục sôi\" là iPhone 13 Pro, chiếc điện thoại thông minh vẫn giữ nguyên thiết kế cao cấp, cụm 3 camera được nâng cấp, cấu hình mạnh mẽ cùng thời lượng pin lớn ấn tượng.', 1, 0, 3),
(32, 'Samsung Galaxy S22 Ultra 5G', '30990000', 1, '1651544957_Galaxy-S22-Ultra-Burgundy-600x600.jpg', 'Galaxy S22 Ultra 5G chiếc smartphone cao cấp nhất trong bộ 3 Galaxy S22 series mà Samsung đã cho ra mắt. Tích hợp bút S Pen hoàn hảo trong thân máy, trang bị vi xử lý mạnh mẽ cho các tác vụ sử dụng vô cùng mượt mà và nổi bật hơn với cụm camera không viền độc đáo mang đậm dấu ấn riêng.\r\n', 1, 0, 3),
(33, 'Apple MacBook Air M1 2020 ', '28890000', 10, '1651545086_263915.jpg', 'Laptop Apple MacBook Air M1 2020 có thiết kế đẹp, sang trọng với CPU M1 độc quyền từ Apple cho hiệu năng đồ họa cao, màn hình Retina hiển thị siêu nét cùng với hệ thống bảo mật tối ưu.\r\n', 1, 0, 1),
(34, 'Dell XPS 13 9310 i5', '41490000', 10, '1651545311_dell.jpg', 'Thiết kế hiện đại với màu bạc thời thượng cùng hiệu năng mạnh mẽ, xứng danh bạn đồng hành đắc lực trên mọi mặt trận.', 1, 0, 1),
(35, 'Apple Watch S6 44mm', '9490000', 10, '1651545461_s6-44mm-vien-nhom-day-cao-su-do-thumb-600x600.jpg', 'Apple Watch Series 6 44 mm viền nhôm dây cao su là một siêu phẩm đến từ nhà Táo, nhờ có thiết kế tinh xảo, độ hoàn thiện cao, màu đen sang trọng phù hợp với mọi lứa tuổi và giới tính, chiếc đồng hồ luôn thu hút rất nhiều người khi xuất hiện.\r\n\r\n', 1, 0, 2),
(36, 'Galaxy Watch Active 2 44mm', '9990000', 12, '1651670770_samsung-galaxy-watch-active-2-44-mm-day-da-thumb-1-1-600x600.jpg', 'Đồng hồ thông minh Samsung Galaxy Watch Active 2 44mm là phiên bản có sự cải tiến về công nghệ để mang đến những trải nghiệm tốt nhất cho người dùng với nhiều tính năng chăm sóc sức khỏe, nhận cuộc gọi trực tiếp cũng như nhiều tính năng tiện ích khác.', 1, 0, 2),
(39, 'Samsung Galaxy A23', '5790000', 2, '1651928693_samsung-galaxy-a13-xanh-thumb-1-600x600.jpg', 'Được Samsung cho ra mắt vào 03/2022 - Samsung Galaxy A23 6GB có một thiết kế trẻ trung cùng bộ thông số kỹ thuật khá ấn tượng trong tầm giá, đáp ứng nhu cầu sử dụng cả ngày một cách ổn định nhờ trang bị chipset đến từ nhà Qualcomm và một viên pin dung lượng khủng.', 1, 3, 3),
(40, 'Samsung Galaxy M53', '7690000', 1, '1651928869_Samsung-galaxy-m53-nâu-600x600.jpg', 'Chụp ảnh nhiều chất lượng hình ảnh', 1, 2, 3),
(41, 'Redmi Watch 2 Lite', '1190000', 3, '1652064442_redmi-watch-2-lite-600x600.jpg', 'Màn hình tràn viền, hiển thị đa sắc màu, tùy biến hơn 100 giao diện màn hình\r\nRedmi Watch 2 Lite sở hữu thiết kế màn hình lớn với kích thước 1.55 inch, tăng 10% diện tích so với bản tiền nhiệm Mi Watch Lite là 1.4 inch, được trang bị công nghệ màn hình TFT cùng độ phân giải 320 x 360 pixels hiển thị đa dạng màu sắc, hình ảnh rõ ràng, thoả mãn thị giác của bạn. Đồng thời, bạn có thể thay đổi giữa hơn 100 giao diện được thiết kế trong mặt đồng hồ tạo nên sự linh hoạt và đa dạng để phù hợp với trang phục hoặc tâm trạng mỗi ngày của bạn.', 1, 3, 2),
(42, 'Apple Watch S6 LTE 40mm', '15990000', 1, '1652064530_apple-watch-s6-lte-40mm-vien-thep-day-thep-den-thumb-1-600x600.jpg', 'Thông tin sản phẩm\r\nMang nét hiện đại cùng thiết kế sang trọng, trẻ trung\r\nApple Watch S6 LTE 40mm viền thép dây thép sở hữu các chi tiết được thiết kế tinh xảo, dây đeo thép bền bỉ dưới hình dáng lưới đan mỏng. Màn hình 1.57 inch hiển thị hình ảnh sắc nét, mặt kính Sapphire giúp bảo vệ chiếc đồng hồ của bạn an toàn trước những va đập không mong muốn.', 1, 3, 2),
(43, 'iPad Pro M1 11 inch WiFi', '46990000', 4, '1652064658_pad-pro-m1-11-inch-wifi-cellular-1tb-2021-bac-thumb-600x600.jpeg', 'Trải nghiệm khung hình sống động cùng cảm giác chạm vuốt cực mượt\r\nMáy tính bảng iPad Pro M1 11 inch WiFi Cellular 1TB (2021) thiết kế hình hộp vát cạnh vuông vức, hiện đại với thân máy bằng kim loại chắc chắn, hoàn thiện tỉ mỉ và sang trọng, trọng lượng nhẹ, kích cỡ hợp lý thuận tiện sử dụng và mang theo.\r\n\r\nMàn hình 11 inch sử dụng tấm nền Liquid Retina cho khung hình iPad hiển thị rực rỡ, sống động, chân thực, độ tương phản hình ảnh đạt 1668 x 2388 Pixels hiển thị chi tiết sắc nét, kết hợp cạnh viền mỏng cho không gian trải nghiệm màn hình thật đã mắt.', 1, 3, 12),
(44, 'Samsung Galaxy Tab S8+', '25990000', 1, '1652065292_Tab-S8+-Black-1-600x600.jpeg', 'Trong sự kiện Galaxy Unpacked 2022 Samsung đã chính thức cho ra mắt Samsung Galaxy Tab S8+ mẫu máy tính bảng được giới công nghệ chú ý đến với những nâng cấp sáng giá với thế hệ tiền nhiệm. Vậy chiếc máy này có gì đặc biệt, cùng mình vào bài đánh giá chi tiết sau nhé!', 1, 3, 12),
(45, 'Galaxy Watch 4 Classic', '7490000', 1, '1652069367_samsung-galaxy-watch-4-classic-42mm-trang-thumb-1-2-3-600x600.jpg', 'Thiết kế cổ điển, sang trọng\r\nĐồng hồ Samsung Galaxy Watch 4 Classic 42mm sở hữu khung viền làm từ thép không gỉ bền chắc và được chứng nhận độ bền MIL-STD-810G, cho khả năng chống ăn mòn tốt hơn trong những điều kiện thời tiết khác nhau. Chiếc đồng hồ điều hướng linh hoạt với vòng xoay bezel độc đáo tạo nên vẻ đẹp sang trọng vượt thời gian. Samsung đã sử dụng phần dây đeo silicone mang lại cho bạn cảm giác êm ái, thỏa sức tham gia các hoạt động thể thao như chạy bộ, đạp xe,...', 1, 3, 2),
(46, 'Lenovo Yoga 9 14ITL5 ', '49090000', 2, '1652069670_lenovo-yoga-9-14itl5-i7-82bg006evn-21-600x600.jpg', 'Thông tin sản phẩm\r\nSang trọng, đẳng cấp, mạnh mẽ là những mỹ từ tóm gọn giá trị mà laptop Lenovo Yoga 9 14ITL5 (82BG006EVN) mang lại cho bạn. Nếu đang tìm 1 chiếc laptop mỏng nhẹ, linh hoạt, cấu hình ấn tượng hỗ trợ các tác vụ nặng, trải nghiệm ngay phiên bản cao cấp này từ Lenovo.', 1, 3, 1),
(47, 'OPPO Find X5 Pro 5G ', '32990000', 1, '1652069792_oppo-find-x5-pro-den-thumb-600x600', '    Dòng Find X đến từ OPPO luôn mang trên mình những công nghệ hàng đầu trong ngành công nghiệp điện thoại. OPPO Find X5 Pro cũng sở hữu những thông số kỹ thuật chuẩn flagship năm 2022, có thể kể đến như vi xử lý Snapdragon 8 Gen 1, màn hình 2K+ sắc nét, camera Sony và sạc nhanh 80 W.    ', 1, 3, 3),
(48, 'Realme 9 Pro 5G', '7990000', 5, '1652085318_realme-9-pro-thumb-600x600.jpg', 'Realme 9 Pro - chiếc điện thoại tầm trung được Realme giới thiệu với thiết kế phản quang hoàn toàn mới, máy có một vẻ ngoài năng động, hiệu năng mạnh mẽ, cụm camera AI 64 MP và một tốc độ sạc ổn định.', 1, 3, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
