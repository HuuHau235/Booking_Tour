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
INSERT INTO `Tour` VALUES (1,'Tour 1','Description 1',100.00,'2023-05-01','2023-05-05',5,'mạo hiểm'), 
(2,'Tour 2','Description 2',200.00,'2023-05-06','2023-05-10',7,'nghỉ dưỡng'), 
(3,'Tour 3','Description 3',150.00,'2023-05-11','2023-05-15',6,'khám phá'), 
(4,'Tour 4','Description 4',300.00,'2023-05-16','2023-05-20',8,'mạo hiểm'), 
(5,'Tour 5','Description 5',250.00,'2023-05-21','2023-05-25',4,'nghỉ dưỡng'),
(6,'Tour 6','Description 6',180.00,'2023-05-26','2023-05-30',6,'khám phá'), 
(7,'Tour 7','Description 7',220.00,'2023-05-31','2023-06-04',7,'mạo hiểm'), 
(8,'Tour 8','Description 8',190.00,'2023-06-05','2023-06-09',5,'nghỉ dưỡng'), 
(9,'Tour 9','Description 9',280.00,'2023-06-10','2023-06-14',8,'khám phá'), 
(10,'Tour 10','Description 10',160.00,'2023-06-15','2023-06-19',6,'mạo hiểm'),
(11,'Tour 11','Description 11',240.00,'2023-06-20','2023-06-24',7,'nghỉ dưỡng'), 
(12,'Tour 12','Description 12',190.00,'2023-06-25','2023-06-29',5,'khám phá'), 
(13,'Tour 13','Description 13',270.00,'2023-06-30','2023-07-04',8,'mạo hiểm'), 
(14,'Tour 14','Description 14',150.00,'2023-07-05','2023-07-09',6,'nghị dụng'), 
(15,'Tour 15','Description 15',220.00,'2023-07-10','2023-07-14',7,'khám phá'), 
(16,'Tour 16','Description 16',180.00,'2023-07-15','2023-07-19',5,'mạo hiểm'), 
(17,'Tour 17','Description 17',260.00,'2023-07-20','2023-07-24',8,'nghị dụng'), 
(18,'Tour 18','Description 18',140.00,'2023-07-25','2023-07-29',6,'khám phá'), 
(19,'Tour 19','Description 19',210.00,'2023-07-30','2023-08-03',7,'mạo hiểm'), 
(20,'Tour 20','Description 20',170.00,'2023-08-04','2023-08-08',5,'nghị dụng');
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
INSERT INTO `TourImage` VALUES (1,'Tour 1','https://example.com/image1.jpg','Description 1'),
(2,'Tour 2','https://example.com/image2.jpg','Description 2'),
(3,'Tour 3','https://example.com/image3.jpg','Description 3'),
(4,'Tour 4','https://example.com/image4.jpg','Description 4'),
(5,'Tour 5','https://example.com/image5.jpg','Description 5'),
(6,'Tour 6','https://example.com/image6.jpg','Description 6'),
(7,'Tour 7','https://example.com/image7.jpg','Description 7'),
(8,'Tour 8','https://example.com/image8.jpg','Description 8'),
(9,'Tour 9','https://example.com/image9.jpg','Description 9'),
(10,'Tour 10','https://example.com/image10.jpg','Description 10'),
(11,'Tour 11','https://example.com/image11.jpg','Description 11'),
(12,'Tour 12','https://example.com/image12.jpg','Description 12'),
(13,'Tour 13','https://example.com/image13.jpg','Description 13'),
(14,'Tour 14','https://example.com/image14.jpg','Description 14'),
(15,'Tour 15','https://example.com/image15.jpg','Description 15'),
(16,'Tour 16','https://example.com/image16.jpg','Description 16'),
(17,'Tour 17','https://example.com/image17.jpg','Description 17'),
(18,'Tour 18','https://example.com/image18.jpg','Description 18'),
(19,'Tour 19','https://example.com/image19.jpg','Description 19'),
(20,'Tour 20','https://example.com/image20.jpg','Description 20');
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
    