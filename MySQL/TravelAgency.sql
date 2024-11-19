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
INSERT INTO `admin` VALUES (1,'mylishop','8A86E1AAF7327885729E5B450841FEF6');
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

LOCK TABLES `admin` WRITE;

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
    