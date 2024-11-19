<?php
// Kết nối đến MySQL
$servername = "localhost"; // Đổi thành server của bạn nếu khác
$username = "root"; // Username MySQL
$password = ""; // Password MySQL

// Tạo kết nối
$conn = new mysqli($servername, $username, $password);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Tạo database nếu chưa tồn tại
$sql = "DROP DATABASE IF EXISTS TravelAgency;
        CREATE DATABASE TravelAgency;
        USE TravelAgency;

        -- Bảng Tour
        CREATE TABLE Tour (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            description TEXT,
            price DECIMAL(10, 2) NOT NULL,
            start_date DATE NOT NULL,
            end_date DATE NOT NULL,
            duration INT NOT NULL,
            type ENUM('mạo hiểm', 'nghỉ dưỡng', 'khám phá') NOT NULL
        );

        -- Bảng Itinerary
        CREATE TABLE Itinerary (
            id INT AUTO_INCREMENT PRIMARY KEY,
            tour_id INT NOT NULL,
            day INT NOT NULL,
            description TEXT,
            FOREIGN KEY (tour_id) REFERENCES Tour(id) ON DELETE CASCADE
        );

        -- Bảng TourImage
        CREATE TABLE TourImage (
            id INT AUTO_INCREMENT PRIMARY KEY,
            tour_id INT NOT NULL,
            image_url VARCHAR(255) NOT NULL,
            caption VARCHAR(255),
            FOREIGN KEY (tour_id) REFERENCES Tour(id) ON DELETE CASCADE
        );

        -- Bảng User
        CREATE TABLE User (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL,
            phone VARCHAR(15),
            address VARCHAR(255)
        );

        -- Bảng Review
        CREATE TABLE Review (
            id INT AUTO_INCREMENT PRIMARY KEY,
            tour_id INT NOT NULL,
            user_id INT NOT NULL,
            rating INT CHECK (rating BETWEEN 1 AND 5),
            comment TEXT,
            FOREIGN KEY (tour_id) REFERENCES Tour(id) ON DELETE CASCADE,
            FOREIGN KEY (user_id) REFERENCES User(id) ON DELETE CASCADE
        );

        -- Bảng Booking
        CREATE TABLE Booking (
            id INT AUTO_INCREMENT PRIMARY KEY,
            tour_id INT NOT NULL,
            user_id INT NOT NULL,
            booking_date DATE NOT NULL,
            travel_date DATE NOT NULL,
            num_people INT NOT NULL,
            status ENUM('pending', 'confirmed', 'canceled') NOT NULL,
            FOREIGN KEY (tour_id) REFERENCES Tour(id) ON DELETE CASCADE,
            FOREIGN KEY (user_id) REFERENCES User(id) ON DELETE CASCADE
        );

        -- Bảng Payment
        CREATE TABLE Payment (
            id INT AUTO_INCREMENT PRIMARY KEY,
            booking_id INT NOT NULL,
            amount DECIMAL(10, 2) NOT NULL,
            payment_date DATE NOT NULL,
            payment_method ENUM('thẻ tín dụng', 'chuyển khoản') NOT NULL,
            status ENUM('success', 'failed', 'pending') NOT NULL,
            FOREIGN KEY (booking_id) REFERENCES Booking(id) ON DELETE CASCADE
        );

        -- Bảng Wishlist
        CREATE TABLE Wishlist (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            tour_id INT NOT NULL,
            added_date DATE NOT NULL,
            FOREIGN KEY (user_id) REFERENCES User(id) ON DELETE CASCADE,
            FOREIGN KEY (tour_id) REFERENCES Tour(id) ON DELETE CASCADE
        );

        -- Bảng Blog
        CREATE TABLE Blog (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            content TEXT NOT NULL,
            author VARCHAR(255) NOT NULL,
            published_date DATE NOT NULL,
            category ENUM('mẹo du lịch', 'điểm đến') NOT NULL
        );";

// Thực thi câu lệnh SQL
if ($conn->multi_query($sql) === TRUE) {
    echo "Database và các bảng đã được tạo thành công!";
} else {
    echo "Lỗi khi tạo database hoặc bảng: " . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
    