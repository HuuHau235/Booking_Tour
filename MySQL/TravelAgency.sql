DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'hau','hau12345');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

DROP TABLE IF EXISTS `Tour`;

UNLOCK TABLES;
CREATE TABLE Tour (
    tour_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    duration INT NOT NULL,
    type ENUM('mạo hiểm', 'nghỉ dưỡng', 'khám phá') NOT NULL
);ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `Tour` WRITE;
INSERT INTO `Tour` VALUES 
(1, 'Tour 1', 'Hành trình mạo hiểm khám phá thiên nhiên hoang sơ tại Tam Đảo.', 100.00, '2023-05-01', '2023-05-05', 5, 'mạo hiểm'), 
(2, 'Tour 2', 'Tour nghỉ dưỡng tại resort 5 sao bên bờ biển Bắc Giang.', 200.00, '2023-05-06', '2023-05-10', 7, 'nghỉ dưỡng'), 
(3, 'Tour 3', 'Khám phá những địa danh nổi tiếng tại thành phố Đà Lạt mộng mơ.', 150.00, '2023-05-11', '2023-05-15', 6, 'khám phá'), 
(4, 'Tour 4', 'Thử thách bản thân với hành trình mạo hiểm tại Quy Nhơn.', 300.00, '2023-05-16', '2023-05-20', 8, 'mạo hiểm'), 
(5, 'Tour 5', 'Trải nghiệm kỳ nghỉ sang trọng tại Đà Nẵng với dịch vụ đẳng cấp.', 250.00, '2023-05-21', '2023-05-25', 4, 'nghỉ dưỡng'),
(6, 'Tour 6', 'Khám phá các di sản văn hóa và thiên nhiên tại Đà Lạt.', 180.00, '2023-05-26', '2023-05-30', 6, 'khám phá'), 
(7, 'Tour 7', 'Hành trình mạo hiểm tại Eo Gió - Quy Nhơn, điểm đến hoang sơ.', 220.00, '2023-05-31', '2023-06-04', 7, 'mạo hiểm'), 
(8, 'Tour 8', 'Thư giãn tại các khu nghỉ dưỡng hàng đầu ở Đà Nẵng.', 190.00, '2023-06-05', '2023-06-09', 5, 'nghỉ dưỡng'), 
(9, 'Tour 9', 'Khám phá vẻ đẹp kỳ vĩ của Vịnh Hạ Long với các hang động nổi tiếng.', 280.00, '2023-06-10', '2023-06-14', 8, 'khám phá'), 
(10, 'Tour 10', 'Tham gia tour mạo hiểm leo núi và cắm trại tại Sa Pa.', 160.00, '2023-06-15', '2023-06-19', 6, 'mạo hiểm'),
(11, 'Tour 11', 'Nghỉ dưỡng tại vịnh Hạ Long với du thuyền sang trọng.', 240.00, '2023-06-20', '2023-06-24', 7, 'nghỉ dưỡng'), 
(12, 'Tour 12', 'Trải nghiệm văn hóa và ẩm thực đặc sắc tại Hà Nội.', 190.00, '2023-06-25', '2023-06-29', 5, 'khám phá'), 
(13, 'Tour 13', 'Hành trình mạo hiểm tại đỉnh Fansipan với cảnh sắc hùng vĩ.', 270.00, '2023-06-30', '2023-07-04', 8, 'mạo hiểm'), 
(14, 'Tour 14', 'Nghỉ dưỡng giữa thiên nhiên yên bình tại Hội An.', 150.00, '2023-07-05', '2023-07-09', 6, 'nghỉ dưỡng'), 
(15, 'Tour 15', 'Khám phá nét đẹp cổ kính và văn hóa độc đáo của Hội An.', 220.00, '2023-07-10', '2023-07-14', 7, 'khám phá'), 
(16, 'Tour 16', 'Tour mạo hiểm đến các điểm đến kỳ thú tại Quảng Bình.', 180.00, '2023-07-15', '2023-07-19', 5, 'mạo hiểm'), 
(17, 'Tour 17', 'Nghỉ dưỡng và thư giãn tại bãi biển Nha Trang tuyệt đẹp.', 260.00, '2023-07-20', '2023-07-24', 8, 'nghỉ dưỡng'), 
(18, 'Tour 18', 'Khám phá các làng chài và đảo hoang sơ tại Lý Sơn.', 140.00, '2023-07-25', '2023-07-29', 6, 'khám phá'), 
(19, 'Tour 19', 'Thử thách bản thân với hành trình trekking tại Huế.', 210.00, '2023-07-30', '2023-08-03', 7, 'mạo hiểm'), 
(20, 'Tour 20', 'Kỳ nghỉ dưỡng lý tưởng với dịch vụ cao cấp tại Đà Nẵng.', 170.00, '2023-08-04', '2023-08-08', 5, 'nghỉ dưỡng'),
(21, 'Tour 21', 'Khám phá vẻ đẹp thơ mộng của vùng cao Sa Pa.', 200.00, '2023-08-09', '2023-08-13', 5, 'khám phá'), 
(22, 'Tour 22', 'Nghỉ dưỡng và tham quan hang động nổi tiếng ở Quảng Bình.', 180.00, '2023-08-14', '2023-08-18', 5, 'nghỉ dưỡng'), 
(23, 'Tour 23', 'Trải nghiệm đời sống văn hóa độc đáo tại Quảng Ngãi.', 160.00, '2023-08-19', '2023-08-23', 5, 'khám phá'), 
(24, 'Tour 24', 'Hành trình khám phá thành phố hiện đại Sài Gòn.', 300.00, '2023-08-24', '2023-08-28', 5, 'khám phá'), 
(25, 'Tour 25', 'Tour nghỉ dưỡng tại bãi biển xanh mát của Phú Quốc.', 320.00, '2023-08-29', '2023-09-02', 5, 'nghỉ dưỡng');

UNLOCK TABLES;

        -- Bảng Itinerary
DROP TABLE IF EXISTS `Itinerary`;
CREATE TABLE Itinerary (
    itinerary_id INT AUTO_INCREMENT PRIMARY KEY,
    tour_id INT NOT NULL,
    day INT NOT NULL,
    description TEXT,
    FOREIGN KEY (tour_id) REFERENCES Tour(tour_id) ON DELETE CASCADE
);ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `admin` WRITE;
UNLOCK TABLES;

        -- Bảng TourImage
DROP TABLE IF EXISTS `TourImage`;
CREATE TABLE TourImage (
    tourimage_id INT AUTO_INCREMENT PRIMARY KEY,
    tour_id INT NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    caption VARCHAR(255),
    FOREIGN KEY (tour_id) REFERENCES Tour(tour_id) ON DELETE CASCADE
);ENGINE=MyISAM DEFAULT CHARSET=latin1;
LOCK TABLES `admin` WRITE;
INSERT INTO `TourImage` VALUES
(1, 1, 'assets/images/TamDao.jpg', 'Khung cảnh núi rừng tuyệt đẹp tại Tam Đảo'),
(2, 2, 'assets/images/BacGiang.jpg', 'Trải nghiệm văn hóa và thiên nhiên Bắc Giang'),
(3, 3, 'assets/images/DaLat1.jpg', 'Thành phố mộng mơ Đà Lạt với hồ Xuân Hương'),
(4, 4, 'assets/images/DaLat2.jpg', 'Vườn hoa Đà Lạt đầy màu sắc'),
(5, 5, 'assets/images/ĐaNang.jpg', 'Biển Mỹ Khê – Đà Nẵng tuyệt đẹp'),
(6, 6, 'assets/images/DaNang1.jpg', 'Cầu Rồng rực rỡ tại Đà Nẵng'),
(7, 7, 'assets/images/EoGio_QuyNhon.jpg', 'Khám phá Eo Gió – Quy Nhơn hoang sơ'),
(8, 8, 'assets/images/Fansipan.jpg', 'Đỉnh Fansipan – Nóc nhà Đông Dương'),
(9, 9, 'assets/images/HaiPhong.jpg', 'Hải Phòng – Thành phố cảng năng động'),
(10, 10, 'assets/images/halong.jpg', 'Vịnh Hạ Long – Di sản thiên nhiên thế giới'),
(11, 11, 'assets/images/Halong.jpg', 'Khám phá hang động kỳ thú tại Hạ Long'),
(12, 12, 'assets/images/Hanoi.jpg', 'Hà Nội cổ kính và hiện đại'),
(13, 13, 'assets/images/HaNoi2.jpg', 'Phố cổ Hà Nội – Nét đẹp văn hóa truyền thống'),
(14, 14, 'assets/images/HoiAn.jpg', 'Phố cổ Hội An lung linh đèn lồng'),
(15, 15, 'assets/images/HoiAn1.jpg', 'Hội An – Di sản văn hóa thế giới'),
(16, 16, 'assets/images/HoiAn2.jpg', 'Tham quan chùa Cầu tại Hội An'),
(17, 17, 'assets/images/Hue.jpg', 'Cố đô Huế với vẻ đẹp trầm mặc'),
(18, 18, 'assets/images/LySon.jpg', 'Đảo Lý Sơn – Thiên đường giữa biển khơi'),
(19, 19, 'assets/images/nhatrang.jpg', 'Nha Trang – Thành phố biển sôi động'),
(20, 20, 'assets/images/NhaTrang.jpg', 'Biển Nha Trang trong xanh, tuyệt đẹp'),
(21, 21, 'assets/images/NhaTrang1.jpg', 'Tháp Bà Ponagar – Nét văn hóa Chăm tại Nha Trang'),
(22, 22, 'assets/images/QuangBinh.jpg', 'Quảng Bình – Vương quốc của hang động'),
(23, 23, 'assets/images/QuangNgai.jpg', 'Quảng Ngãi – Vẻ đẹp miền Trung mộc mạc'),
(24, 24, 'assets/images/SaiGon.jpg', 'Sài Gòn – Thành phố không ngủ'),
(25, 25, 'assets/images/SaPa.jpg', 'Sa Pa – Thị trấn mờ sương với ruộng bậc thang');

UNLOCK TABLES;


-- Bảng User
DROP TABLE IF EXISTS `User`;
CREATE TABLE User (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(15),
    address VARCHAR(255)
);ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `admin` WRITE;
UNLOCK TABLES;


        -- Bảng Review
DROP TABLE IF EXISTS `Review`;
CREATE TABLE Review (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    tour_id INT NOT NULL,
    user_id INT NOT NULL,
    rating INT CHECK (rating BETWEEN 1 AND 5),
    comment TEXT,
    FOREIGN KEY (tour_id) REFERENCES Tour(tour_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE
);ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `admin` WRITE;
UNLOCK TABLES;


        -- Bảng Booking
DROP TABLE IF EXISTS `Booking`;
CREATE TABLE Booking (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    tour_id INT NOT NULL, 
    user_id INT NOT NULL,
    booking_date DATE NOT NULL,
    travel_date DATE NOT NULL,
    num_people INT NOT NULL,
    status ENUM('pending', 'confirmed', 'canceled') NOT NULL,
    FOREIGN KEY (tour_id) REFERENCES Tour(tour_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE 
);ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `admin` WRITE;
UNLOCK TABLES;


        -- Bảng Payment
DROP TABLE IF EXISTS `Payment`;
CREATE TABLE Payment (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    payment_date DATE NOT NULL,
    payment_method ENUM('thẻ tín dụng', 'chuyển khoản') NOT NULL,
    status ENUM('success', 'failed', 'pending') NOT NULL,
    FOREIGN KEY (booking_id) REFERENCES Booking(booking_id) ON DELETE CASCADE
);ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `admin` WRITE;
UNLOCK TABLES;


        -- Bảng Wishlist
DROP TABLE IF EXISTS `Wishlist`;
CREATE TABLE Wishlist (
    wishlist_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    tour_id INT NOT NULL,
    added_date DATE NOT NULL,
    FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE,
    FOREIGN KEY (tour_id) REFERENCES Tour(tour_id) ON DELETE CASCADE
);ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `admin` WRITE;
UNLOCK TABLES;


        -- Bảng Blog
DROP TABLE IF EXISTS `Blog`;
CREATE TABLE Blog (
    blog_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    author VARCHAR(255) NOT NULL,
    published_date DATE NOT NULL,
    category ENUM('mẹo du lịch', 'điểm đến') NOT NULL
);ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `admin` WRITE;
UNLOCK TABLES;
    