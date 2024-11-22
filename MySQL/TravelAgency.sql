drop database if exists travel;
create database travel;
use travel;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` INT(11) NOT NULL,
  `username` VARCHAR(50) DEFAULT NULL,
  `password` VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `admin` VALUES (1,'hau','hau12345');

DROP TABLE IF EXISTS `tour`;

-- Tạo bảng Tour
DROP TABLE IF EXISTS `tour`;
CREATE TABLE Tour (
    tour_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    duration INT NOT NULL,
    type ENUM('mạo hiểm', 'nghỉ dưỡng', 'khám phá') NOT NULL
);

INSERT INTO `Tour` VALUES 
(1, 'Hơi Thở Tam Đảo', 'Khung cảnh núi rừng tuyệt đẹp tại Tam Đảo.', 100.00, '2023-05-01', '2023-05-05', 5, 'mạo hiểm'), 
(2, 'Hành Trình Tây Yên', 'Trải nghiệm văn hóa chùa Tây Yến Tử và thiên nhiên Bắc Giang.', 200.00, '2023-05-06', '2023-05-10', 7, 'Khám phá'), 
(3, 'Hương Đà Lạt', 'Khám phá những địa danh nổi tiếng tại thành phố Đà Lạt mộng mơ.', 150.00, '2023-05-11', '2023-05-15', 6, 'khám phá'), 
(4, 'Tình Ca Xuân Hương', 'Thành phố mộng mơ Đà Lạt với hồ Xuân Hương.', 300.00, '2023-05-16', '2023-05-20', 8, 'nghĩ dưỡng'), 
(5, 'Rồng Đỏ Đà Nẵng', 'Cầu Rồng rực rỡ tại Đà Nẵng.', 250.00, '2023-05-21', '2023-05-25', 4, 'khám phá'), 
(6, 'Vàng Giữa Trời', 'Cầu Vàng hùng vĩ tại Đà Nẵng.', 180.00, '2023-05-26', '2023-05-30', 6, 'khám phá'), 
(7, 'Phiêu Lưu Eo Gió', 'Hành trình mạo hiểm tại Eo Gió - Quy Nhơn, điểm đến hoang sơ.', 220.00, '2023-05-31', '2023-06-04', 7, 'mạo hiểm'), 
(8, 'Nóc Nhà Đông Dương', 'Đỉnh Fansipan – Nóc nhà Đông Dương.', 190.00, '2023-06-05', '2023-06-09', 5, 'mạo hiểm'), 
(9, 'Sắc Sống Hải Phòng', 'Hải Phòng – Thành phố cảng năng động.', 280.00, '2023-06-10', '2023-06-14', 8, 'khám phá'), 
(10, 'Kỳ Quan Hạ Long', 'Vịnh Hạ Long – Di sản thiên nhiên thế giới.', 160.00, '2023-06-15', '2023-06-19', 6, 'khám phá'), 
(11, 'Huyền Bí Long Động', 'Khám phá hang động kỳ thú tại Hạ Long.', 240.00, '2023-06-20', '2023-06-24', 7, 'mạo hiểm'), 
(12, 'Hồn Xưa Thăng Long', 'Hồ Gươm, là một trong những danh thắng nổi tiếng và biểu tượng của thủ đô Hà Nội, Việt Nam.', 190.00, '2023-06-25', '2023-06-29', 5, 'nghỉ dưỡng'), 
(13, 'Hồn Phố Cổ', 'Phố cổ Hà Nội – Nét đẹp văn hóa truyền thống.', 270.00, '2023-06-30', '2023-07-04', 8, 'nghỉ dưỡng'), 
(14, 'Lung Linh Hội An', 'Phố cổ Hội An lung linh đèn lồng.', 150.00, '2023-07-05', '2023-07-09', 6, 'nghỉ dưỡng'), 
(15, 'Văn Hóa Hội An', 'Khám phá nét đẹp cổ kính và văn hóa độc đáo của Hội An.', 220.00, '2023-07-10', '2023-07-14', 7, 'khám phá'), 
(16, 'Chùa Cầu Hội An', 'Tham quan chùa Cầu tại Hội An.', 180.00, '2023-07-15', '2023-07-19', 5, 'khám phá'), 
(17, 'Huế Trầm Mặc', 'Cố đô Huế với vẻ đẹp trầm mặc.', 260.00, '2023-07-20', '2023-07-24', 8, 'khám phá'), 
(18, 'Thiên Đường Lý Sơn', 'Đảo Lý Sơn – Thiên đường giữa biển khơi.', 140.00, '2023-07-25', '2023-07-29', 6, 'nghỉ dưỡng'), 
(19, 'Sôi Động Nha Trang', 'Nha Trang – Thành phố biển sôi động.', 210.00, '2023-07-30', '2023-08-03', 7, 'nghỉ dưỡng'), 
(20, 'Hoàng Hôn Nha Trang', 'Công viên Nha Trang với khung cảnh vui nhộn và hoang hôn, tuyệt đẹp.', 170.00, '2023-08-04', '2023-08-08', 5, 'khám phá'), 
(21, 'Biển Yên Bình', 'Vùng biển yên bình tuyệt đẹp tại Nha Trang.', 200.00, '2023-08-09', '2023-08-13', 5, 'nghỉ dưỡng'), 
(22, 'Quảng Bình Mộng Mơ', 'Quảng Bình – Vương quốc của những cây cầu và hồ tây thơ mộng.', 180.00, '2023-08-14', '2023-08-18', 5, 'khám phá'), 
(23, 'Độc Đáo Quảng Ngãi', 'Trải nghiệm đời sống văn hóa độc đáo tại Quảng Ngãi.', 160.00, '2023-08-19', '2023-08-23', 5, 'khám phá'), 
(24, 'Sài Gòn Sôi Động', 'Sài Gòn – Thành phố không ngủ.', 300.00, '2023-08-24', '2023-08-28', 5, 'nghỉ dưỡng'), 
(25, 'Mờ Sương Sa Pa', 'Sa Pa – Thị trấn mờ sương với ruộng bậc thang.', 320.00, '2023-08-29', '2023-09-02', 5, 'mạo hiểm'); 

-- Bảng Itinerary
DROP TABLE IF EXISTS `itinerary`;
CREATE TABLE Itinerary (
    itinerary_id INT AUTO_INCREMENT PRIMARY KEY,
    tour_id INT NOT NULL,
    day INT NOT NULL,
    description TEXT,
    FOREIGN KEY (tour_id) REFERENCES Tour(tour_id) ON DELETE CASCADE
);
-- Thêm dữ liệu vào bảng Itinerary
INSERT INTO itinerary (tour_id, day, description) VALUES
(1, 1, 'NGÀY 1: KHỞI HÀNH TỪ HÀ NỘI - THỊ TRẤN TAM ĐẢO (ĂN T, T).
		07h00: Xe và hướng dẫn viên Tour.Pro.Vn đón quý khách tại điểm hẹn, điểm danh quân số, khởi hành đi khu du lịch Tam Đảo - Vĩnh Phúc. Trên đường đi xe dừng nghỉ ngơi, quý khách tự do nghỉ ngơi, ăn sáng (chi phí tự túc).
		09h00: Đến thị trấn Tam Đảo, quý khách nghỉ ngơi, hướng dẫn viên đưa Quý khách tham quan, chụp ảnh tại Thác Bạc - Dòng thác gầm vang giữa núi rừng, được ôm trong một thung lũng cây xanh rậm rạp, tạo nên một vẻ đẹp huyền bí và quyến rũ.
		11h00: Quý khách dùng bữa trưa tại nhà hàng, sau đó làm thủ tục nhận phòng khách sạn, nghỉ ngơi.
		Chiều: Quý khách tự do tham quan, dạo chơi, check in, chụp hình các điểm như nhà thờ đá Tam Đảo, quan cafe...
		Tối: Quý khách dùng bữa tối tại nhà hàng, sau đó tự do dạo chơi, chụp ảnh, thưởng thức các món BBQ nướng, ngắm nhìn thị trấn Tam Đảo về đêm. Nghỉ đêm tại khách sạn.'),
(1, 2, 'NGÀY 2: THAM QUAN, DU LỊCH TAM ĐẢO - VỀ HÀ NỘI (ĂN S, T).
		08h00: Quý khách dùng bữa sáng tại nhà hàng, sau đó hướng dẫn viên đưa Quý khách chinh phục Tháp Truyền Hình trên Đỉnh Thiên Nhị. Đường đi lên tuy vất vả nhưng lãng mạn, nên thơ. Dọc đường lên là hoa phong lan, hoa cúc quỳ và các loài hoa dại không tên khác nở đầy lối đi, tỏa hương thơm lạ, mầu sắc rực rỡ...Lên tới đỉnh, phóng tầm mắt ra bốn phía là mênh mông trời, đất, gió, mây...
		12h00: Quý khách làm thủ tục trả phòng khách sạn, dùng bữa trưa tại nhà hàng. Thưởng thức các món ăn mang hương vị đặc sản Tam Đảo.
		Chiều: Xe và hướng dẫn viên đón quý khách tiếp tục di chuyển đến đền Bà Chúa Thượng Ngàn, với khung cảnh mộng mơ của thị trấn miền mây trắng vẫn còn nguyên vẹn. Quý khách được tự do tham quan và làm lễ dâng hương tại đền.
		15h30: Kết thúc chương trình tham quan, Quý khách lên xe trở về Hà Nội.
		18h30: Về đến Hà Nội, xe và hướng dẫn viên đưa quý khách trở về điểm đón ban đầu. Hướng dẫn viên cảm ơn, chia tay, hẹn gặp lại quý khách! Kết thúc chuyến hành trình du lịch Tam Đảo 2 ngày 1 đêm.'),

(2, 1, 'Ngày 1: HÀ NỘI - CHÙA CAO LINH - DU LỊCH BẠCH ĐẰNG GIANG.
		06h00: Xe và hướng dẫn viên của Tour Pro đón quý khách tại điểm hẹn trong TP Hà Nội, khởi hành đi Hải Phòng bắt đầu hành trình tham quan du xuân. Xe đưa quý khách di chuyển trên quốc lộ 5B. Đoàn dừng chân, tự do ăn sáng tại Hải Dương.
		08h00: Quý khách đến chùa Cao Linh, điểm đến đầu tiên trong hành trình tâm linh. Chùa Cao Linh là một trong những ngôi Chùa có cảnh quan cùng  những công trình kiến trúc đẹp và đồ sộ tại Hải Phòng. Quý khách tham quan và làm lễ, sau đó đoàn trở lại xe tiếp tục hành trình.
		10h00: Quý khách tham quan khu di tích Bạch Đằng Giang nằm ở Tràng Kênh, Thủy Nguyên, Hải Phòng. Quý khách tự do tham quan, làm lễ tại khu di tích.
		11h30: Quý khách lên xe khởi hành về nhà hàng gần Bạch Đằng Giang dùng cơm trưa.'),
(2, 2, 'Ngày 2: CHIÊM BÁI THAM QUAN ĐỀN BÀ ĐẾ - CHÙA HANG - HÀ NỘI.
		13h30: Xe và hướng dẫn viên đưa đoàn thăm quan và chiêm bái Đền Bà Đế, một ngôi đền rất linh thiêng tại Đồ Sơn - Bà là vợ chúa Trịnh Giang. Ðền bà được vua Tự Ðức về thăm và ban sắc phong “Ðông Nhạc Ðế Bà - Trịnh chúa phu nhân”.
		15h00: Đoàn tiếp tục di chuyển đến với Chùa Hang, Ngôi chùa nằm trong cốc, nổi tiếng bậc nhất tại Hải Phòng. Quý khách tự do lễ chùa, tham quan.
		16h30: Quý khách lên xe khởi hành về Hà Nội, về đến Hà Nội, xe đưa quý khách trở về điểm đón ban đầu. Hướng dẫn viên Tour Pro cảm ơn, chia tay và hẹn gặp lại quý khách, kết thúc hành trình du lịch Bạch Đằng Giang - Chùa Cao Linh - Đền Bà Đế - Chùa Hang.'),

(3, 1, 'NGÀY 1: HÀ NỘI - SÂN BAY CAM RANH - DU LỊCH NHA TRANG (ĂN T).
		10h30: Xe và hướng dẫn viên đón Quý khách tại điểm hẹn, điểm danh quân số, khởi hành đi sân bay Nội Bài. Quý khách đáp chuyến bay VietNam Airline lúc 12h25 - VN1557 đi Nha Trang.
		Chiều: Quý khách nhận phòng nghỉ ngơi, tự do dạo chơi TP Nha Trang và tắm biển. Quý khách tham quan Chùa Long Sơn Tự, khu du lịch Hòn Chồng, Tháp bà Ponagar. Sau đó vui chơi tắm khoáng tại khu du lịch I RESORT.
		Tối: Quý khách dùng cơm tối tại nhà hàng. Sau bữa tối Quý khách tự do dạo chơi phố biển về đêm, Nghỉ đêm tại Nha Trang.'),
(3, 2, 'NGÀY 2: NHA TRANG - THAM QUAN VỊNH NHA TRANG - VINPEARLAND (ĂN S, T).
		Sáng: Quý khách ăn sáng tại khách sạn, xe đưa đoàn xuống bến thuyền tham quan Vịnh Nha Trang, tham quan Hòn Một, Hòn Mun, …
		Trưa: Quý khách ăn trưa tại nhà hàng Con Sẻ Tre trên Vịnh Nha Trang. Sau bữa trưa tàu cập bến đưa đoàn về bờ, Quý khách về khách sạn nghỉ ngơi.
		15h30: Quý  khách tham quan, vui chơi tại khu du lịch Vinpearl Land, xe đưa Quý khách xuống bến Quý khách đi cáp treo khứ hồi. Tới Vinpearl Land, quý khách tham gia các trò chơi tại khu vui chơi như:
		+ Khu vui chơi ngoài trời cảm giác mạnh, đu Quay mặt trăng, tàu lượn siêu tốc….
		+ Khu vực vui chơi trong nhà như đua xe, xe ô tô đụng, khám phá Vũ Trụ...
		+ Thưởng thức các chương trình chiếu phim 4D, nhạc nước, Thủy Cung, CV nước... hiện đại.
		Tối: Quý khách tự do ăn tối, vui chơi tại Vinpearl land. 21h00 Quý khách lên Ga cáp treo trở về đất liền, Xe đón Quý khách về lại khách sạn.'),

(4, 1, 'NGÀY 1: HÀ NỘI - SÂN BAY CAM RANH - DU LỊCH NHA TRANG (ĂN T).
		10h30: Xe và hướng dẫn viên đón Quý khách tại điểm hẹn, điểm danh quân số, khởi hành đi sân bay Nội Bài. Quý khách đáp chuyến bay VietNam Airline lúc 12h25 - VN1557 đi Nha Trang.
		Chiều: Quý khách nhận phòng nghỉ ngơi, tự do dạo chơi TP Nha Trang và tắm biển. Quý khách tham quan Chùa Long Sơn Tự, khu du lịch Hòn Chồng, Tháp bà Ponagar. Sau đó vui chơi tắm khoáng tại khu du lịch I RESORT.
		Tối: Quý khách dùng cơm tối tại nhà hàng. Sau bữa tối Quý khách tự do dạo chơi phố biển về đêm, Nghỉ đêm tại Nha Trang.'),
(4, 2, 'NGÀY 2: NHA TRANG - THAM QUAN VỊNH NHA TRANG - VINPEARLAND (ĂN S, T).
		Sáng: Quý khách ăn sáng tại khách sạn, xe đưa đoàn xuống bến thuyền tham quan Vịnh Nha Trang, tham quan Hòn Một, Hòn Mun, …
		Trưa: Quý khách ăn trưa tại nhà hàng Con Sẻ Tre trên Vịnh Nha Trang. Sau bữa trưa tàu cập bến đưa đoàn về bờ, Quý khách về khách sạn nghỉ ngơi.
		15h30: Quý  khách tham quan, vui chơi tại khu du lịch Vinpearl Land, xe đưa Quý khách xuống bến Quý khách đi cáp treo khứ hồi. Tới Vinpearl Land, quý khách tham gia các trò chơi tại khu vui chơi như:
		+ Khu vui chơi ngoài trời cảm giác mạnh, đu Quay mặt trăng, tàu lượn siêu tốc….
		+ Khu vực vui chơi trong nhà như đua xe, xe ô tô đụng, khám phá Vũ Trụ...
		+ Thưởng thức các chương trình chiếu phim 4D, nhạc nước, Thủy Cung, CV nước... hiện đại.
		Tối: Quý khách tự do ăn tối, vui chơi tại Vinpearl land. 21h00 Quý khách lên Ga cáp treo trở về đất liền, Xe đón Quý khách về lại khách sạn.'),

(5, 1, 'NGÀY 1: TỪ HÀ NỘI - DU LỊCH ĐÀ NẴNG - BÁN ĐẢO SƠN TRÀ ( ĂN T, T).
		07h30: Xe đón quý khách điểm hẹn trong TP Hà Nội khởi hành đi sân bay Nội Bài. Quý khách đáp chuyến bay VJ517 lúc 10h25.
		11h30: Tới Đà Nẵng xe đón Quý khách đi ăn trưa tại nhà hàng. sau đó đoàn về khách sạn nhận phòng nghỉ ngơi. 
		Chiều: Quý khách tự do dạo chơi, tắm biển Mỹ Khê.
		17h00: Xe đưa đoàn tham quan Bán Đảo Sơn Trà, với những ngôi chùa tuyệt đẹp và uy nghiêm, thắp hương và lễ tại Chùa Linh ứng.
		19h00: Quý khách ăn tối tại nhà hàng, sau đó quý khách tự dạo chơi ngắm biển Mỹ Khê về đêm, nghỉ đêm tại khách sạn.'),
(5, 2, 'NGÀY 2: ĐÀ NẴNG - THAM QUAN TP CỔ HỘI AN - QUẢNG NAM (ĂN S, T, T).
		Sáng: Quý khách tự dạo chơi, tắm biển, ăn sáng tại khách sạn.
		08h00: Xe đón Quý khách khởi hành đi tham quan khu du lịch Non Nước - Ngũ Hành Sơn. Quý khách leo núi tham quan động Huyền Không, Chùa Tam Thai, Chùa Linh Ứng... tiếp tục tham quan Làng Đá Mỹ Nghệ Non Nước.
		Tiếp tục hành trình xe và hướng dẫn viên đưa Quý khách khởi hành đi tham quan Phố Cổ Hội An - Được UNESCO công nhận là Di sản Văn hoá Thế giới vào tháng 11/1999, tham quan Hội quán Phước Kiến (hoặc Hội quán Quảng Đông), Chùa Cầu Nhật Bản, nhà cổ Tấn Ký (hoặc Nhà cổ Phùng Hưng).
		Trưa: Xe đưa Quý khách đi ăn trưa tại nhà hàng. Thưởng thức các món ăn đặc sản địa phương. (Lựa chọn thêm: nếu quý khách lựa chọn tham quan Cù Lao Chàm, buổi chiều xe đưa đoàn về phía biển Của Đại, Quý khách lên tàu tham quan Cù Lao Chàm , tắm biển và ăn trưa tại Cù Lao Chàm sau đó xe đưa về bến và về TP Đà Nẵng (Quý khách Lựa chọn thêm: Cù Lao Chàm cộng thêm 580.000).
		Chiều: Quý khách tự do nghỉ ngơi tại khách sạn, dạo chơi TP Đà Nẵng, tắm biển Mỹ Khê.
		Tối: Xe đưa Quý khách đi ăn cơm tối tại nhà hàng. Nghỉ đêm tại Đà Nẵng (Khách sạn nằm trên bãi Biển Mỹ Khê).'),
(5, 3, 'NGÀY 3: ĐÀ NẴNG - KHU DU LỊCH BÀ NÀ HILLS - TẮM BIỂN MỸ KHÊ (ĂN S, T).
		Sáng: Quý khách tự do dậy sớm, ngắm cảnh bình minh trên biển, tắm biển. Sau đó ăn sáng tại khách sạn.
		07h30:Xe đưa Quý khách khởi hành đi tham quan khu du lịch Bà Nà Hills, Quý khách lên cáp treo dài nhất Việt Nam đi lên núi với độ cao 1487m so với mực nước biển.
		Khu du lịch Bà Nà, nơi Quý khách có thể  trải nghiệm những khoảnh khắc giao mùa Xuân - Hạ - Thu - Đông trong 1 ngày. Ngồi trên cabin cáp treo Quý khách vãng cảnh Đồi Vọng Nguyệt, chùa Linh Ứng, Thích Ca Phật Đài, khu chuồng ngựa cũ của Pháp, vườn tịnh tâm và đỉnh nhà rông....Vui chơi thoải mái tại Khu Fantasy Park với nhiều trò chơi hấp dẫn (Không bao gồm vé cáp treo Bà Nà hills).
		Trưa: Quý khách ăn trưa tự do (chi phí tự túc ăn trưa tại Bà Nà).
		15h30: Quý khách tạm biệt Bà Nà hills khởi hành về lại Đà Nẵng.
		Tối: Quý khách ăn tối tại nhà hàng, tự do dạo chơi, nghỉ tại Đà Nẵng (khách sạn nằm trên bãi Biển Mỹ Khê). '),

(6, 1, 'NGÀY 1: TỪ HÀ NỘI - DU LỊCH ĐÀ NẴNG - BÁN ĐẢO SƠN TRÀ ( ĂN T, T).
		07h30: Xe đón quý khách điểm hẹn trong TP Hà Nội khởi hành đi sân bay Nội Bài. Quý khách đáp chuyến bay VJ517 lúc 10h25.
		11h30: Tới Đà Nẵng xe đón Quý khách đi ăn trưa tại nhà hàng. sau đó đoàn về khách sạn nhận phòng nghỉ ngơi. 
		Chiều: Quý khách tự do dạo chơi, tắm biển Mỹ Khê.
		17h00: Xe đưa đoàn tham quan Bán Đảo Sơn Trà, với những ngôi chùa tuyệt đẹp và uy nghiêm, thắp hương và lễ tại Chùa Linh ứng.
		19h00: Quý khách ăn tối tại nhà hàng, sau đó quý khách tự dạo chơi ngắm biển Mỹ Khê về đêm, nghỉ đêm tại khách sạn.'),
(6, 2, 'NGÀY 2: ĐÀ NẴNG - THAM QUAN TP CỔ HỘI AN - QUẢNG NAM (ĂN S, T, T).
		Sáng: Quý khách tự dạo chơi, tắm biển, ăn sáng tại khách sạn.
		08h00: Xe đón Quý khách khởi hành đi tham quan khu du lịch Non Nước - Ngũ Hành Sơn. Quý khách leo núi tham quan động Huyền Không, Chùa Tam Thai, Chùa Linh Ứng... tiếp tục tham quan Làng Đá Mỹ Nghệ Non Nước.
		Tiếp tục hành trình xe và hướng dẫn viên đưa Quý khách khởi hành đi tham quan Phố Cổ Hội An - Được UNESCO công nhận là Di sản Văn hoá Thế giới vào tháng 11/1999, tham quan Hội quán Phước Kiến (hoặc Hội quán Quảng Đông), Chùa Cầu Nhật Bản, nhà cổ Tấn Ký (hoặc Nhà cổ Phùng Hưng).
		Trưa: Xe đưa Quý khách đi ăn trưa tại nhà hàng. Thưởng thức các món ăn đặc sản địa phương. (Lựa chọn thêm: nếu quý khách lựa chọn tham quan Cù Lao Chàm, buổi chiều xe đưa đoàn về phía biển Của Đại, Quý khách lên tàu tham quan Cù Lao Chàm , tắm biển và ăn trưa tại Cù Lao Chàm sau đó xe đưa về bến và về TP Đà Nẵng (Quý khách Lựa chọn thêm: Cù Lao Chàm cộng thêm 580.000).
		Chiều: Quý khách tự do nghỉ ngơi tại khách sạn, dạo chơi TP Đà Nẵng, tắm biển Mỹ Khê.
		Tối: Xe đưa Quý khách đi ăn cơm tối tại nhà hàng. Nghỉ đêm tại Đà Nẵng (Khách sạn nằm trên bãi Biển Mỹ Khê).'),
(6, 3, 'NGÀY 3: ĐÀ NẴNG - KHU DU LỊCH BÀ NÀ HILLS - TẮM BIỂN MỸ KHÊ (ĂN S, T).
		Sáng: Quý khách tự do dậy sớm, ngắm cảnh bình minh trên biển, tắm biển. Sau đó ăn sáng tại khách sạn.
		07h30:Xe đưa Quý khách khởi hành đi tham quan khu du lịch Bà Nà Hills, Quý khách lên cáp treo dài nhất Việt Nam đi lên núi với độ cao 1487m so với mực nước biển.
		Khu du lịch Bà Nà, nơi Quý khách có thể  trải nghiệm những khoảnh khắc giao mùa Xuân - Hạ - Thu - Đông trong 1 ngày. Ngồi trên cabin cáp treo Quý khách vãng cảnh Đồi Vọng Nguyệt, chùa Linh Ứng, Thích Ca Phật Đài, khu chuồng ngựa cũ của Pháp, vườn tịnh tâm và đỉnh nhà rông....Vui chơi thoải mái tại Khu Fantasy Park với nhiều trò chơi hấp dẫn (Không bao gồm vé cáp treo Bà Nà hills).
		Trưa: Quý khách ăn trưa tự do (chi phí tự túc ăn trưa tại Bà Nà).
		15h30: Quý khách tạm biệt Bà Nà hills khởi hành về lại Đà Nẵng.
		Tối: Quý khách ăn tối tại nhà hàng, tự do dạo chơi, nghỉ tại Đà Nẵng (khách sạn nằm trên bãi Biển Mỹ Khê). '),

(7, 1, 'NGÀY 1: TỪ HÀ NỘI - DU LỊCH QUY NHƠN - BÃI TẮM HOÀNG HẬU (ĂN T, T).
		04h40: Xe và hướng dẫn viên đón đoàn tại điểm hẹn khởi hành đi sân bay Nội Bài đáp chuyến bay VJ433 lúc 6h35 khởi hành đi Quy Nhơn .
		08h30: Quý khách đến sân bay Phù Cát, Quy Nhơn, Bình Định. Xe và hướng dẫn đưa Quý khách tham quan một số địa điểm nổi tiếng tại TP. Quy Nhơn. Như Ghềnh Ráng Tiên Sa, Đồi Thi Nhân, bãi tắm Hoàng Hậu, Khu tưởng niệm và mộ Hàn Mặc Tử.
		11h30: Kết thúc tham quan, đoàn trở lại nhà hàng dùng cơm trưa, thưởng thức hương vị ẩm thực Quy Nhơn. Sau bữa trưa hướng dẫn đưa Quý khách về khách sạn nhận phòng nghỉ ngơi.
		15h00: Quý khách tự do dạo chơi, tắm biển tại thành phố Quy Nhơn. Cuối buổi chiều, hướng dẫn đưa du khách tham quan di tích lịch sử Tháp Đôi - Một trong những ngôi tháp điển hình của kiến trúc dân tộc Chăm.
		18h30: Quý khách dùng bữa tối tại nhà hàng, sau bữa tối Quý khách tự do dạo chơi TP biển Quy Nhơn. Nghỉ đêm tại Quy Nhơn.'),
(7, 2, 'NGÀY 2: TỪ QUY NHƠN - “ VỀ THĂM MIỀN ĐẤT VÕ TÂY SƠN” (ĂN S, T, T).
		Sáng: Quý khách tự do dậy sớm, ngắm biển, đón bình minh, tắm biển. Sau đó dùng bữa sáng tại khách sạn.
		08h00: Xe và hướng dẫn viên đón Quý khách khởi hành đi Tây Sơn, Bình Định. Địa danh nổi tiếng gắn liền với lịch sử thời kỳ Tây Sơn.
		Du khách tham quan bảo tàng Quang Trung, Đền Thờ Tây Sơn Tam Kiệt, nghe thuyết minh, xem kỷ vật về thân thế sự nghiệp, cuộc đời ba anh em nhà Tây Sơn Nguyễn Nhạc, Nguyễn Huệ, Nguyễn Lữ. Thưởng thức nhạc võ và xem biểu diễn võ cổ truyền Bình Định, trống trận Tây Sơn, biểu diễn Cồng Chiêng.
		11h30: Quý khách dùng bữa trưa tại nhà hàng, sau bữa trưa xe đưa Quý khách về lại khách sạn tại TP. Quy Nhơn nghỉ ngơi.
		Chiều: Quý khách nghỉ ngơi tắm biển, tự do dạo chơi TP Quy Nhơn.
		Tối: Đoàn ăn tối tại nhà hàng, sau đó nghỉ đêm tại khách sạn - TP Quy Nhơn.'),
(7, 3, 'NGÀY 3: QUY NHƠN - GHỀNH ĐÁ ĐĨA (PHÚ YÊN) - QUY NHƠN (ĂN S, T, T).
		Sáng: Quý khách tự do dậy sớm, ngắm biển, đón bình minh, tắm biển. Sau đó dùng bữa sáng tại khách sạn.
		07h30: Xe và hướng dẫn viên đón Quý khách khởi hành đi Phú Yên. Du khách tham quan và chụp hình kỷ niệm tại khu du lịch Ghềnh Đá Đĩa, Phú Yên.
		Trưa: Quý khách ăn trưa tại Đầm Ô Loan - Phú Yên, Quý khách thưởng thức hương vị đặc sản Phú Yên.
		15h00: Xe đón Quý khách trở về Quy Nhơn, du khách tự do dạo chơi, tắm biển, nghỉ ngơi.
		Tối: Quý khách ăn tối tại nhà hàng, đoàn tự do dạo chơi thăm thành phố, ngắm biển Quy Nhơn về đêm.'),
        
(8, 1, 'NGÀY 1: HÀ NỘI -  SAPA - KHU DU LỊCH HÀM RỒNG (ĂN T, T)
		05h15: Xe và hướng dẫn viên Tour Pro đón quý khách tại điểm hẹn, điểm danh quân số, khởi hành đi Sapa theo hướng cao tốc Nội Bài - Lào Cai. Trên xe, hướng dẫn viên thuyết minh, tổ chức hoạt náo nhiệt tình, vui nhộn. Xe dừng chân nghỉ ngơi 15p, quý khách được tự do tham quan, ăn sáng (chi phí tự túc).
		10h15: Đến TT Sapa, xe và hdv đưa quý khách tham quan Núi Hàm Rồng - Địa danh du lịch không thể thiếu trong hành trình du lịch của du khách khi đến Sapa. Càng đi lên cao quý khách càng có cơ hội khám phá những khung cảnh tuyệt đẹp như: Vườn Lan, Cổng Trời, Sân Mây, Vườn Đào…. Đặc biệt đối với những du khách có sở thích ngắm cảnh và chụp ảnh thì có lẽ đây là điểm du lịch mà các bạn có thể lưu giữ cho mình rất nhiều bức hình để đời.
		11h40: Quý khách dùng bữa trưa tại nhà hàng, sau đó làm thủ tục nhận phòng, nghỉ ngơi tại khách sạn.
		14h00: Quý khách lên xe di chuyển đến ga cáp treo Fansipan để vắt đầu hành trình chinh phục đỉnh núi Fansipan cao 3143m, nơi được mệnh danh là nóc nhà Đông Dương. Nếu may mắn đi vào những ngày nắng, trời quang bạn sẽ được chiêm ngưỡng cảnh sắc tuyệt đẹp. Khung cảnh hùng vĩ của ruộng bậc thang, rừng cây, thung lũng, triền núi cheo leo...trở nên mờ ảo và đẹp một cách khó tả, lúc ẩn, lúc hiện trong từng lớp mây trắng, khiến bạn đi từ cảm xúc này đến cảm xúc khác.
		18h30: Quý khách trở về khách sạn nghỉ ngơi, dùng bữa tối tại nhà hàng.
		20h00: Quý khách được tự do vui chơi, khám phá thưởng thức cafe nơi thị trấn sương mù về đêm. Mua đồ về làm quà cho gia đình và bạn bè. Nghỉ đêm tại khách sạn.'),
(8, 2, 'NGÀY 2: SAPA - KHU DU LỊCH BẢN CÁT CÁT - HÀ NỘI (ĂN S, T)
		07h00: Quý khách dùng bữa sáng tại khách sạn. Sau bữa sáng úy khách tự do, dạo chơi.
		08h00: Xe và hướng dẫn viên đón quý khách lên xe di chuyển đến bản Cát Cát. Giữa khung cảnh thiên nhiên núi rừng hoang sơ hùng vĩ đó, có một bản làng mộc mạc nhỏ xinh khiến bất kỳ ai đến với Sapa cũng nhất định phải ghé đến. Nơi cuốn hút bởi những nếp nhà gỗ đơn sơ, những con suối nhỏ chảy róc rách, những tấm thổ cẩm rực rỡ sắc màu và những những người dân tộc nhỏ bé giản đơn.
		11h30: Quý khách làm thủ tục trả phòng khách sạn, dùng bữa trưa tại nhà hàng.
		13h00: Quý khách di chuyển lên xe trở về Hà Nội. Trên đường về xe dừng nghỉ du khách tự do nghỉ ngơi.
		18h00: Về đến Hà Nội, xe đưa quý khách trở về điểm đón ban đầu. Hdv Tour Pro cảm ơn, chia tay và hẹn gặp lại quý khách!'),

(9, 1, 'Ngày 1: SÁNG: HÀ NỘI - CHIÊM BÁI, THAM QUAN CHÙA CAO LINH - HẢI PHÒNG.
		07h00: Xe ô tô du lịch chất lượng và hướng dẫn viên chuyên nghiệp của Tour Pro đón quý khách tại điểm hẹn theo yêu cầu ở Hà Nội, khởi hành đi chùa Cao Linh - Hải Phòng.
		08h00: Xe di chuyển theo cao tốc Hà Nội - Hải Phòng (quốc lộ 5B). Trên đường đi xe dừng nghỉ, du khách tự do ăn sáng, nghỉ ngơi tại trạm nghỉ V52 Hải Dương.
		09h30: Du khách đến chùa Cao Linh, ngôi chùa có cảnh quan với những công trình kiến trúc nổi bật ở Hải Phòng. Điểm đến đầu tiên trong hành trình du lịch mùa xuân Quý khách tham quan, chiêm bái và làm lễ…
		11h00: Du khách lên xe di chuyển về nhà hàng gần di tích lịch sử Bạch Đằng Giang dùng cơm trưa. Thưởng thức nhiều món ăn đậm đà hương vị thành phố cảng.'),
(9, 2, 'Ngày 2: CHIỀU: THAM QUAN, DU LỊCH DU LỊCH BẠCH ĐẰNG GIANG - VỀ HÀ NỘI.
		13h30: Tiếp tục chuyến đi du xuân về Hải Phòng, du khách tham quan khu di tích lịch sử Bạch Đằng Giang nằm ở Tràng Kênh, huyện Thủy Nguyên, thành phố Hải Phòng.
		Chiều: Du khách tự do lễ chùa, tham quan khu di tích lịch sử Bạch Đằng Giang Hải Phòng.
		15h30: Du khách lên xe khởi hành về Hà Nội, trên đường về xe sẽ dừng nghỉ để du khách tự do nghỉ ngơi, mua sắm đặc sản địa phương Hải Phòng, Hải Dương về làm quà cho gia đình và người thân.
		17h30: Về đến điểm đón đã hẹn ở Hà Nội, hướng dẫn viên Tour Pro cảm ơn và chia tay, hẹn gặp lại quý khách ở nhiều hành trình tiếp theo! kết thúc tour du lịch mùa xuân {Chùa Cao Linh Bạch Đằng Giang} 1 ngày.'),

(10, 1, 'NGÀY 1: TỪ HÀ NỘI - DU LỊCH HẠ LONG - QUẢNG NINH (ĂN T, T).
		07h30: Xe và hướng dẫn viên Tour.Pro.Vn đón Quý khách tại điểm hẹn, điểm danh quân số, khởi hành đi TP Hạ Long theo quốc lộ 5B - Hà Nội - Hải Phòng - Quảng Ninh. Trên xe hướng dẫn viên tổ chức thuyết minh, hoạt náo nhiệt tình, vui nhộn.
		08h30: Xe dừng nghỉ tại trạm dịch vụ trên cao tốc, quý khách tự do ăn sáng, nghỉ ngơi. Sau đó du khách tiếp tục lên xe di chuyển đi Hạ Long - Quảng Ninh.
		11h00: Xe đưa Quý khách đến khu du lịch Bãi Cháy - Thành phố Hạ Long, Quý khách nghỉ ngơi, dùng bữa tại nhà hàng. Sau bữa trưa Quý khách làm thủ tục nhận phòng khách sạn.
		Chiều: Quý khách tự do đi chơi, tham quan, mua sắm, tắm biển tại TP Hạ Long. Hoặc tham gia chương trình tổ chức team building bãi biển vui nhộn. (Áp dụng cho đoàn có yêu cầu từ 60 khách).
		18h00: Quý khách dùng bữa tối tại nhà hàng sau đó tự do tham quan, cafe, ngắm nhìn TP Hạ Long về đêm hoặc xe đưa Quý khách đi khu du lịch Tuần Châu (chi phí vé tự túc).
		22h00: Quý khách trở về, nghỉ đêm tại khách sạn.'),
(10, 2, 'NGÀY 2: HẠ LONG - SUN WORLD - THAM QUAN VỊNH (ĂN S, T, T).
		Sáng: Quý khách tự do dậy sớm dạo bộ ngắm bình minh, tắm biển. Sau đó Quý khách dùng bữa sáng tại nhà hàng.
		08h00: Xe và hướng dẫn viên đón quý khách khởi hành đi tham quan Vịnh Hạ Long, "kỳ quan thiên nhiên của thế giới". Quý khách tham quan tuyến: Động Thiên Cung, Hòn Lư Hương, Hòn Chó Đá, Hòn Gà Chọi….
		11h30: Quý khách dùng bữa trưa tại nhà hàng, trở về khách sạn nghỉ ngơi.
		Chiều: Quý khách tự do vui chơi tại Tổ hợp SunWorld Hạ Long Park - Nằm trên diện tích 214ha, Sun World Hạ Long Park bao gồm 3 khu vực chính vui chơi, tham quan du lịch chính:
		Hoạt động vui chơi trên đỉnh Ba Đèo - Cáp treo nữ hoàng
		+ Cáp treo
		+ Khu vườn nhật
		+ Khu nhà sáp (100.000đ/khách).
		+ Khu kidoland
		+ Vòng quay mặt trời.
		Hoạt động vui chơi tại Dragon Park (Công viên Rồng)
		+ Phi Long Thần Tốc
		+ Chiếc Ô Kỳ Diệu
		+ Chiếc Cốc Thần
		+ Chuyến Xe Tuổi Thơ
		+ Theo Dấu Chân Rồng
		+ Đu Quay Kỳ Diệu
		+ Tê Giác Cuồng Nộ
		+ Tàu Hải Tặc...
		Công viên nước Typhoon Water Park
		+ Thử thách mãng xà
		+ Biển sóng Thần
		+ Đảo Quốc Kỳ Diệu
		+ Dòng Sông Lơ Đãng
		+ Cơn Bão Nhiệt Đới
		+ Tia Chớp Khổng Lồ.
		19h00: Quý khách dùng bữa tối tại nhà hàng, sau bữa tối du khách tự do tham quan, cafe, ngắm cảnh TP Hạ Long về đêm.
		22h00: Quý khách trở về nghỉ đêm tại khách sạn.'),

(11, 1, 'NGÀY 01: HÀ NỘI - CẢNG TUẦN CHÂU - VỊNH  HẠ LONG (ĂN T, T).
		Sáng: Khởi hành từ Hà Nội hoặc theo yêu cầu riêng, Tour Pro đưa du khách đi cảng Tuần Châu, Hạ Long. Trên đường đi sẽ dừng nghỉ tại trạm cao tốc V52 Hải Dương, Quý khách tự do ăn sáng, nghỉ ngơi.
		11h30: Xe đưa du khách đến cảng tàu Tuần Châu, Hướng dẫn viên đưa Quý khách lên du thuyền Hạ Long.
		11h45: Du khách có mặt trên tàu, tham gia không gian chào mừng, lắng nghe các thủ tục, quy định khi du thuyền đi trên vịnh. Sau đó Quý khách nhận phòng trên du thuyền tự do  nghỉ ngơi.
		Trưa: Quý khách ăn trưa tại khu vực nhà hàng trong du thuyền, ngắm cảnh vịnh Hạ Long thơ mộng với các địa danh nổi tiếng như hòn Gà Chọi, Chó Đá, Đỉnh Hương…
		Chiều: Du thuyền ghé khu vực hang Sửng Sốt, hướng dẫn viên đưa Quý khách tham quan hang Sửng Sốt, tuyến hang động đẹp bậc nhất tại Vịnh Hạ Long.
		16h00: Kết thúc tham quan Quý khách trở lại tàu nghỉ ngơi thư giãn, tắm biển hoặc tham gia hoạt động chèo kayak.
		Tối: Quý khách ăn tối tại nhà hàng, sau bữa tối Quý khách nghỉ ngơi hoặc tự do thưởng thức đồ uống tại quầy bar, hay câu mực giải trí.'),
(11, 2, 'NGÀY 02: VỊNH HẠ LONG - THAM QUAN ĐẢO TI TỐP - TRỞ VỀ HÀ NỘI (ĂN S, T).
		Sáng: Quý khách dậy sớm, ngắm bình minh trên biển sau đó dùng bữa sáng tại nhà hàng trong du thuyền và nghỉ ngơi.
		08h00: Quý khách đưa du khách đổ bộ tham quan, khám phá Đảo Ti Tốp. Quý khách có thể tắm biển, vui chơi, leo núi…
		11h00: Quý khách làm thủ tục trả phòng tại du thuyền, kiểm tra hành lý cá nhân. Du thuyền cập cảng, xe ô tô đón Quý khách về nhà hàng.
		Trưa: Quý khách dùng bữa trưa, nghỉ ngơi tại nhà hàng trong đất liền. Sau bữa trưa xe và hướng dẫn viên Tour Pro đưa Quý khách trở về điểm đón.
		16h30: Xe đưa Quý khách về đến điểm đón tại Hà Nội hoặc theo yêu cầu. Kết thúc hành trình tour du lịch 2 ngày 1 đêm du thuyền Hạ Long. Hướng dẫn viên chia tay du khách và hẹn gặp lại!'),

(12, 1, 'Ngày 1: 8h-8h30: Hướng dẫn và lái xe sẽ đón quý khách tại khách sạn trong khu vực phố cổ. Thời gian đón khách tùy thuộc vào vị trí khách sạn của quý khách.
		8h45: Đoàn thăm quan chùa Trấn Quốc – ngôi chùa cổ nhất ở Hà Nội được xây dựng vào thế kỷ thứ 6. Tại đây, quý khách sẽ có cơ hội ngắm nhìn một trong những cây Bồ Đề lớn nhất Việt Nam.
		9h30: Đoàn sẽ thăm quan quần thể Lăng chủ tịch Hồ Chí Minh, quý khách sẽ có cơ hội được ngắm thi hài của Bác Hồ kính yêu, được thăm quan khu di tích Phủ chủ tịch, thăm quan nơi ở và làm việc của Bác từ năm 1954 đến năm 1969.Tiếp đó, Đoàn sẽ thăm quan chùa Một Cột – ngôi chùa được xây dựng năm 1048 dưới thời vua Lý Thái Tông
		11h15 : Đoàn sẽ thăm quan một Bảo Tàng Dân Tộc học – nơi lưu giữ và trưng vật nhiều hiện vật, cổ vật liên quan tới trang phục, văn hóa, lịch sử cũng như phong tục của 54 dân tộc anh em. Đây là điểm thăm quan ý nghĩa về kiến thức dân tộc học.
		Lưu ý : Đoàn sẽ tham quan Bảo tàng phụ nữ Việt Nam  thay thế cho Bảo Tàng Dân Tộc học đóng cửa vào các ngày thứ 2 hàng tuần
		12h30: Đoàn thưởng thức bữa trưa tại nhà hàng trong khu vực phố cổ với thực đơn đặc biệt (có thực đơn kèm theo)
		13:45 : Đoàn tiếp tục thăm quan Văn Miếu Quốc Tử Giám nơi thờ Khổng Tử. Đây được coi là trường đại học đầu tiên của Việt Nam từ thế kỷ thứ 11 đến thế kỷ thứ 18
		15h30 : Đoàn thăm quan nhà tù Hỏa Lò – được xây dựng bởi người Pháp từ năm 1886, nhà tù nổi tiếng bởi từng là nơi giam giữ rất nhiều nhà cách mạng lớn của Việt Nam trong Chiến tranh Đông Dương và phi công Mỹ trong Chiến tranh Việt Nam
		16h00-16h30 : Kết thúc chương trình. Xe đưa quý khách về khách sạn.'),
(12, 2,'Ngày 2: Sáng: Quý khách dậy sớm, ngắm bình minh trên biển sau đó dùng bữa sáng tại nhà hàng trong du thuyền và nghỉ ngơi.
		08h00: Quý khách đưa du khách đổ bộ tham quan, khám phá Đảo Ti Tốp. Quý khách có thể tắm biển, vui chơi, leo núi…
		11h00: Quý khách làm thủ tục trả phòng tại du thuyền, kiểm tra hành lý cá nhân. Du thuyền cập cảng, xe ô tô đón Quý khách về nhà hàng.
		Trưa: Quý khách dùng bữa trưa, nghỉ ngơi tại nhà hàng trong đất liền. Sau bữa trưa xe và hướng dẫn viên Tour Pro đưa Quý khách trở về điểm đón.
		16h30: Xe đưa Quý khách về đến điểm đón tại Hà Nội hoặc theo yêu cầu. Kết thúc hành trình tour du lịch 2 ngày 1 đêm du thuyền Hạ Long. Hướng dẫn viên chia tay du khách và hẹn gặp lại!'),

(13, 1, 'Ngày 1: 8h-8h30: Hướng dẫn và lái xe sẽ đón quý khách tại khách sạn trong khu vực phố cổ. Thời gian đón khách tùy thuộc vào vị trí khách sạn của quý khách.
		8h45: Đoàn thăm quan chùa Trấn Quốc – ngôi chùa cổ nhất ở Hà Nội được xây dựng vào thế kỷ thứ 6. Tại đây, quý khách sẽ có cơ hội ngắm nhìn một trong những cây Bồ Đề lớn nhất Việt Nam.
		9h30: Đoàn sẽ thăm quan quần thể Lăng chủ tịch Hồ Chí Minh, quý khách sẽ có cơ hội được ngắm thi hài của Bác Hồ kính yêu, được thăm quan khu di tích Phủ chủ tịch, thăm quan nơi ở và làm việc của Bác từ năm 1954 đến năm 1969.Tiếp đó, Đoàn sẽ thăm quan chùa Một Cột – ngôi chùa được xây dựng năm 1048 dưới thời vua Lý Thái Tông
		11h15 : Đoàn sẽ thăm quan một Bảo Tàng Dân Tộc học – nơi lưu giữ và trưng vật nhiều hiện vật, cổ vật liên quan tới trang phục, văn hóa, lịch sử cũng như phong tục của 54 dân tộc anh em. Đây là điểm thăm quan ý nghĩa về kiến thức dân tộc học.
		Lưu ý : Đoàn sẽ tham quan Bảo tàng phụ nữ Việt Nam  thay thế cho Bảo Tàng Dân Tộc học đóng cửa vào các ngày thứ 2 hàng tuần
		12h30: Đoàn thưởng thức bữa trưa tại nhà hàng trong khu vực phố cổ với thực đơn đặc biệt (có thực đơn kèm theo)
		13:45 : Đoàn tiếp tục thăm quan Văn Miếu Quốc Tử Giám nơi thờ Khổng Tử. Đây được coi là trường đại học đầu tiên của Việt Nam từ thế kỷ thứ 11 đến thế kỷ thứ 18
		15h30 : Đoàn thăm quan nhà tù Hỏa Lò – được xây dựng bởi người Pháp từ năm 1886, nhà tù nổi tiếng bởi từng là nơi giam giữ rất nhiều nhà cách mạng lớn của Việt Nam trong Chiến tranh Đông Dương và phi công Mỹ trong Chiến tranh Việt Nam
		16h00-16h30 : Kết thúc chương trình. Xe đưa quý khách về khách sạn.'),
(13, 2,'Ngày 2: Sáng: Quý khách dậy sớm, ngắm bình minh trên biển sau đó dùng bữa sáng tại nhà hàng trong du thuyền và nghỉ ngơi.
		08h00: Quý khách đưa du khách đổ bộ tham quan, khám phá Đảo Ti Tốp. Quý khách có thể tắm biển, vui chơi, leo núi…
		11h00: Quý khách làm thủ tục trả phòng tại du thuyền, kiểm tra hành lý cá nhân. Du thuyền cập cảng, xe ô tô đón Quý khách về nhà hàng.
		Trưa: Quý khách dùng bữa trưa, nghỉ ngơi tại nhà hàng trong đất liền. Sau bữa trưa xe và hướng dẫn viên Tour Pro đưa Quý khách trở về điểm đón.
		16h30: Xe đưa Quý khách về đến điểm đón tại Hà Nội hoặc theo yêu cầu. Kết thúc hành trình tour du lịch 2 ngày 1 đêm du thuyền Hạ Long. Hướng dẫn viên chia tay du khách và hẹn gặp lại!'),

(14, 1, 'NGÀY 1: TỪ HÀ NỘI - DU LỊCH ĐÀ NẴNG - BÁN ĐẢO SƠN TRÀ ( ĂN T, T).
		07h30: Xe đón quý khách điểm hẹn trong TP Hà Nội khởi hành đi sân bay Nội Bài. Quý khách đáp chuyến bay VJ517 lúc 10h25.
		11h30: Tới Đà Nẵng xe đón Quý khách đi ăn trưa tại nhà hàng. sau đó đoàn về khách sạn nhận phòng nghỉ ngơi. 
		Chiều: Quý khách tự do dạo chơi, tắm biển Mỹ Khê.
		17h00: Xe đưa đoàn tham quan Bán Đảo Sơn Trà, với những ngôi chùa tuyệt đẹp và uy nghiêm, thắp hương và lễ tại Chùa Linh ứng.
		19h00: Quý khách ăn tối tại nhà hàng, sau đó quý khách tự dạo chơi ngắm biển Mỹ Khê về đêm, nghỉ đêm tại khách sạn.'),
(14, 2, 'NGÀY 2: ĐÀ NẴNG - THAM QUAN TP CỔ HỘI AN - QUẢNG NAM (ĂN S, T, T).
		Sáng: Quý khách tự dạo chơi, tắm biển, ăn sáng tại khách sạn.
		08h00: Xe đón Quý khách khởi hành đi tham quan khu du lịch Non Nước - Ngũ Hành Sơn. Quý khách leo núi tham quan động Huyền Không, Chùa Tam Thai, Chùa Linh Ứng... tiếp tục tham quan Làng Đá Mỹ Nghệ Non Nước.
		Tiếp tục hành trình xe và hướng dẫn viên đưa Quý khách khởi hành đi tham quan Phố Cổ Hội An - Được UNESCO công nhận là Di sản Văn hoá Thế giới vào tháng 11/1999, tham quan Hội quán Phước Kiến (hoặc Hội quán Quảng Đông), Chùa Cầu Nhật Bản, nhà cổ Tấn Ký (hoặc Nhà cổ Phùng Hưng).
		Trưa: Xe đưa Quý khách đi ăn trưa tại nhà hàng. Thưởng thức các món ăn đặc sản địa phương. (Lựa chọn thêm: nếu quý khách lựa chọn tham quan Cù Lao Chàm, buổi chiều xe đưa đoàn về phía biển Của Đại, Quý khách lên tàu tham quan Cù Lao Chàm , tắm biển và ăn trưa tại Cù Lao Chàm sau đó xe đưa về bến và về TP Đà Nẵng (Quý khách Lựa chọn thêm: Cù Lao Chàm cộng thêm 580.000).
		Chiều: Quý khách tự do nghỉ ngơi tại khách sạn, dạo chơi TP Đà Nẵng, tắm biển Mỹ Khê.
		Tối: Xe đưa Quý khách đi ăn cơm tối tại nhà hàng. Nghỉ đêm tại Đà Nẵng (Khách sạn nằm trên bãi Biển Mỹ Khê).'),
(14, 3, 'NGÀY 3: ĐÀ NẴNG - KHU DU LỊCH BÀ NÀ HILLS - TẮM BIỂN MỸ KHÊ (ĂN S, T).
		Sáng: Quý khách tự do dậy sớm, ngắm cảnh bình minh trên biển, tắm biển. Sau đó ăn sáng tại khách sạn.
		07h30:Xe đưa Quý khách khởi hành đi tham quan khu du lịch Bà Nà Hills, Quý khách lên cáp treo dài nhất Việt Nam đi lên núi với độ cao 1487m so với mực nước biển.
		Khu du lịch Bà Nà, nơi Quý khách có thể  trải nghiệm những khoảnh khắc giao mùa Xuân - Hạ - Thu - Đông trong 1 ngày. Ngồi trên cabin cáp treo Quý khách vãng cảnh Đồi Vọng Nguyệt, chùa Linh Ứng, Thích Ca Phật Đài, khu chuồng ngựa cũ của Pháp, vườn tịnh tâm và đỉnh nhà rông....Vui chơi thoải mái tại Khu Fantasy Park với nhiều trò chơi hấp dẫn (Không bao gồm vé cáp treo Bà Nà hills).
		Trưa: Quý khách ăn trưa tự do (chi phí tự túc ăn trưa tại Bà Nà).
		15h30: Quý khách tạm biệt Bà Nà hills khởi hành về lại Đà Nẵng.
		Tối: Quý khách ăn tối tại nhà hàng, tự do dạo chơi, nghỉ tại Đà Nẵng (khách sạn nằm trên bãi Biển Mỹ Khê). '),
(14, 4, 'NGÀY 4: ĐÀ NẴNG - VUI CHƠI, MUA SẮM - KHỞI HÀNH VỀ HÀ NỘI (ĂN S).
		Sáng: Quý khách ăn sáng tại khách sạn, đoàn tự do tắm biển. Dạo chơi mua sắm đặc sản địa phương về làm quà cho gia đình và người thân.
		10h00: Quý khách làm thủ tục trả phòng, xe đưa quý khách ra sân bay Đà Nẵng. Quý khách đáp chuyến bay lúc 13h05 - VJ516 khởi hành về sân bay Nội Bài .
		14h05: Xe đón đoàn trở tại sân bay quốc tế Nội Bài về Hà Nội, kết thúc chương trình. Hướng dẫn viên chia tay Quý khách, cảm ơn và hẹn gặp lại!'),

(15, 1, 'NGÀY 1: TỪ HÀ NỘI - DU LỊCH ĐÀ NẴNG - BÁN ĐẢO SƠN TRÀ ( ĂN T, T).
		07h30: Xe đón quý khách điểm hẹn trong TP Hà Nội khởi hành đi sân bay Nội Bài. Quý khách đáp chuyến bay VJ517 lúc 10h25.
		11h30: Tới Đà Nẵng xe đón Quý khách đi ăn trưa tại nhà hàng. sau đó đoàn về khách sạn nhận phòng nghỉ ngơi. 
		Chiều: Quý khách tự do dạo chơi, tắm biển Mỹ Khê.
		17h00: Xe đưa đoàn tham quan Bán Đảo Sơn Trà, với những ngôi chùa tuyệt đẹp và uy nghiêm, thắp hương và lễ tại Chùa Linh ứng.
		19h00: Quý khách ăn tối tại nhà hàng, sau đó quý khách tự dạo chơi ngắm biển Mỹ Khê về đêm, nghỉ đêm tại khách sạn.'),
(15, 2, 'NGÀY 2: ĐÀ NẴNG - THAM QUAN TP CỔ HỘI AN - QUẢNG NAM (ĂN S, T, T).
		Sáng: Quý khách tự dạo chơi, tắm biển, ăn sáng tại khách sạn.
		08h00: Xe đón Quý khách khởi hành đi tham quan khu du lịch Non Nước - Ngũ Hành Sơn. Quý khách leo núi tham quan động Huyền Không, Chùa Tam Thai, Chùa Linh Ứng... tiếp tục tham quan Làng Đá Mỹ Nghệ Non Nước.
		Tiếp tục hành trình xe và hướng dẫn viên đưa Quý khách khởi hành đi tham quan Phố Cổ Hội An - Được UNESCO công nhận là Di sản Văn hoá Thế giới vào tháng 11/1999, tham quan Hội quán Phước Kiến (hoặc Hội quán Quảng Đông), Chùa Cầu Nhật Bản, nhà cổ Tấn Ký (hoặc Nhà cổ Phùng Hưng).
		Trưa: Xe đưa Quý khách đi ăn trưa tại nhà hàng. Thưởng thức các món ăn đặc sản địa phương. (Lựa chọn thêm: nếu quý khách lựa chọn tham quan Cù Lao Chàm, buổi chiều xe đưa đoàn về phía biển Của Đại, Quý khách lên tàu tham quan Cù Lao Chàm , tắm biển và ăn trưa tại Cù Lao Chàm sau đó xe đưa về bến và về TP Đà Nẵng (Quý khách Lựa chọn thêm: Cù Lao Chàm cộng thêm 580.000).
		Chiều: Quý khách tự do nghỉ ngơi tại khách sạn, dạo chơi TP Đà Nẵng, tắm biển Mỹ Khê.
		Tối: Xe đưa Quý khách đi ăn cơm tối tại nhà hàng. Nghỉ đêm tại Đà Nẵng (Khách sạn nằm trên bãi Biển Mỹ Khê).'),
(15, 3, 'NGÀY 3: ĐÀ NẴNG - KHU DU LỊCH BÀ NÀ HILLS - TẮM BIỂN MỸ KHÊ (ĂN S, T).
		Sáng: Quý khách tự do dậy sớm, ngắm cảnh bình minh trên biển, tắm biển. Sau đó ăn sáng tại khách sạn.
		07h30:Xe đưa Quý khách khởi hành đi tham quan khu du lịch Bà Nà Hills, Quý khách lên cáp treo dài nhất Việt Nam đi lên núi với độ cao 1487m so với mực nước biển.
		Khu du lịch Bà Nà, nơi Quý khách có thể  trải nghiệm những khoảnh khắc giao mùa Xuân - Hạ - Thu - Đông trong 1 ngày. Ngồi trên cabin cáp treo Quý khách vãng cảnh Đồi Vọng Nguyệt, chùa Linh Ứng, Thích Ca Phật Đài, khu chuồng ngựa cũ của Pháp, vườn tịnh tâm và đỉnh nhà rông....Vui chơi thoải mái tại Khu Fantasy Park với nhiều trò chơi hấp dẫn (Không bao gồm vé cáp treo Bà Nà hills).
		Trưa: Quý khách ăn trưa tự do (chi phí tự túc ăn trưa tại Bà Nà).
		15h30: Quý khách tạm biệt Bà Nà hills khởi hành về lại Đà Nẵng.
		Tối: Quý khách ăn tối tại nhà hàng, tự do dạo chơi, nghỉ tại Đà Nẵng (khách sạn nằm trên bãi Biển Mỹ Khê). '),
(15, 4, 'NGÀY 4: ĐÀ NẴNG - VUI CHƠI, MUA SẮM - KHỞI HÀNH VỀ HÀ NỘI (ĂN S).
		Sáng: Quý khách ăn sáng tại khách sạn, đoàn tự do tắm biển. Dạo chơi mua sắm đặc sản địa phương về làm quà cho gia đình và người thân.
		10h00: Quý khách làm thủ tục trả phòng, xe đưa quý khách ra sân bay Đà Nẵng. Quý khách đáp chuyến bay lúc 13h05 - VJ516 khởi hành về sân bay Nội Bài .
		14h05: Xe đón đoàn trở tại sân bay quốc tế Nội Bài về Hà Nội, kết thúc chương trình. Hướng dẫn viên chia tay Quý khách, cảm ơn và hẹn gặp lại!'),

(16, 1, 'NGÀY 1: TỪ HÀ NỘI - DU LỊCH ĐÀ NẴNG - BÁN ĐẢO SƠN TRÀ ( ĂN T, T).
		07h30: Xe đón quý khách điểm hẹn trong TP Hà Nội khởi hành đi sân bay Nội Bài. Quý khách đáp chuyến bay VJ517 lúc 10h25.
		11h30: Tới Đà Nẵng xe đón Quý khách đi ăn trưa tại nhà hàng. sau đó đoàn về khách sạn nhận phòng nghỉ ngơi. 
		Chiều: Quý khách tự do dạo chơi, tắm biển Mỹ Khê.
		17h00: Xe đưa đoàn tham quan Bán Đảo Sơn Trà, với những ngôi chùa tuyệt đẹp và uy nghiêm, thắp hương và lễ tại Chùa Linh ứng.
		19h00: Quý khách ăn tối tại nhà hàng, sau đó quý khách tự dạo chơi ngắm biển Mỹ Khê về đêm, nghỉ đêm tại khách sạn.'),
(16, 2, 'NGÀY 2: ĐÀ NẴNG - THAM QUAN TP CỔ HỘI AN - QUẢNG NAM (ĂN S, T, T).
		Sáng: Quý khách tự dạo chơi, tắm biển, ăn sáng tại khách sạn.
		08h00: Xe đón Quý khách khởi hành đi tham quan khu du lịch Non Nước - Ngũ Hành Sơn. Quý khách leo núi tham quan động Huyền Không, Chùa Tam Thai, Chùa Linh Ứng... tiếp tục tham quan Làng Đá Mỹ Nghệ Non Nước.
		Tiếp tục hành trình xe và hướng dẫn viên đưa Quý khách khởi hành đi tham quan Phố Cổ Hội An - Được UNESCO công nhận là Di sản Văn hoá Thế giới vào tháng 11/1999, tham quan Hội quán Phước Kiến (hoặc Hội quán Quảng Đông), Chùa Cầu Nhật Bản, nhà cổ Tấn Ký (hoặc Nhà cổ Phùng Hưng).
		Trưa: Xe đưa Quý khách đi ăn trưa tại nhà hàng. Thưởng thức các món ăn đặc sản địa phương. (Lựa chọn thêm: nếu quý khách lựa chọn tham quan Cù Lao Chàm, buổi chiều xe đưa đoàn về phía biển Của Đại, Quý khách lên tàu tham quan Cù Lao Chàm , tắm biển và ăn trưa tại Cù Lao Chàm sau đó xe đưa về bến và về TP Đà Nẵng (Quý khách Lựa chọn thêm: Cù Lao Chàm cộng thêm 580.000).
		Chiều: Quý khách tự do nghỉ ngơi tại khách sạn, dạo chơi TP Đà Nẵng, tắm biển Mỹ Khê.
		Tối: Xe đưa Quý khách đi ăn cơm tối tại nhà hàng. Nghỉ đêm tại Đà Nẵng (Khách sạn nằm trên bãi Biển Mỹ Khê).'),
(16, 3, 'NGÀY 3: ĐÀ NẴNG - KHU DU LỊCH BÀ NÀ HILLS - TẮM BIỂN MỸ KHÊ (ĂN S, T).
		Sáng: Quý khách tự do dậy sớm, ngắm cảnh bình minh trên biển, tắm biển. Sau đó ăn sáng tại khách sạn.
		07h30:Xe đưa Quý khách khởi hành đi tham quan khu du lịch Bà Nà Hills, Quý khách lên cáp treo dài nhất Việt Nam đi lên núi với độ cao 1487m so với mực nước biển.
		Khu du lịch Bà Nà, nơi Quý khách có thể  trải nghiệm những khoảnh khắc giao mùa Xuân - Hạ - Thu - Đông trong 1 ngày. Ngồi trên cabin cáp treo Quý khách vãng cảnh Đồi Vọng Nguyệt, chùa Linh Ứng, Thích Ca Phật Đài, khu chuồng ngựa cũ của Pháp, vườn tịnh tâm và đỉnh nhà rông....Vui chơi thoải mái tại Khu Fantasy Park với nhiều trò chơi hấp dẫn (Không bao gồm vé cáp treo Bà Nà hills).
		Trưa: Quý khách ăn trưa tự do (chi phí tự túc ăn trưa tại Bà Nà).
		15h30: Quý khách tạm biệt Bà Nà hills khởi hành về lại Đà Nẵng.
		Tối: Quý khách ăn tối tại nhà hàng, tự do dạo chơi, nghỉ tại Đà Nẵng (khách sạn nằm trên bãi Biển Mỹ Khê). '),
(16, 4, 'NGÀY 4: ĐÀ NẴNG - VUI CHƠI, MUA SẮM - KHỞI HÀNH VỀ HÀ NỘI (ĂN S).
		Sáng: Quý khách ăn sáng tại khách sạn, đoàn tự do tắm biển. Dạo chơi mua sắm đặc sản địa phương về làm quà cho gia đình và người thân.
		10h00: Quý khách làm thủ tục trả phòng, xe đưa quý khách ra sân bay Đà Nẵng. Quý khách đáp chuyến bay lúc 13h05 - VJ516 khởi hành về sân bay Nội Bài .
		14h05: Xe đón đoàn trở tại sân bay quốc tế Nội Bài về Hà Nội, kết thúc chương trình. Hướng dẫn viên chia tay Quý khách, cảm ơn và hẹn gặp lại!'),

(17, 1, 'NGÀY 1: TỪ HÀ NỘI - DU LỊCH HUẾ - THỪA THIÊN HUẾ (ĂN T, T).
		Sáng: Khởi hành từ điểm hẹn, Tour Po đón du khách đi sân bay quốc tế Nội Bài. Quý khách đáp chuyến bay VN1543 - Lúc 07:45 đi cảng hàng không Phú Bài, Thừa Thiên Huế.
		09h00: Quý khách đến TP Huế, Hướng dẫn viên đưa du khách tiếp tục đưa Quý khách đi tham quan Đại Nội - Hoàng Thành Huế nơi gắn liền với lịch sử 13 vị vua triều Nguyễn, Triều đại phong kiến cuối cùng Việt Na. Du khách tham quan, nghe thuyết minh tại các khu vực tiêu biểu: Ngọ Môn, Điện Thái Hoà, Tử Cấm Thành, Thế Miếu, Hiển Lâm Các, Cửu Đỉnh…
		11h30: Du khách thưởng thức bữa trưa với nhiều món ăn đậm vị Huế. Sau đó Quý khách nhận phòng khách sạn nghỉ ngơi tại khách sạn TP. Huế
		Chiều: Quý khách nghỉ ngơi, đi chợ mua sắm đồ Huế, tự do tắm biển Thuận An - Huế.
		18h00: Du khách dùng cơm tối tại nhà hàng TP. Huế, Sau bữa tối hướng dẫn viên đưa Quý khách ra bến sông Hướng, Quý khách lên thuyền xuôi dòng hương Giang thưởng thức ca Huế.
		22h00: Quý khách nghỉ đêm tại khách sạn TP. Huế.'),
(17, 2, 'NGÀY 2: LĂNG KHẢI ĐỊNH - MINH MẠNG - BIỂN LĂNG CÔ  (ĂN S, T, T).
		Sáng: Du khách dùng điểm tâm sáng tại khách sạn, sau đó tiếp tục hành trình Tour Pro đưa du đi tham quan Lăng Vua Khải Định. Một công trình lăng tẩm nổi bật bậc nhất tại Huế, với lối kiến trúc Đông - Tây kết hợp, mang đến sự hài hòa, độc đáo và nổi bật trong số các lăng thờ các vị vua triều Nguyễn. Tiếp đến du khách tham quan Lăng Vua Minh Mạng, vị vua nổi tiếng với nhiều công lao bậc nhất triều Nguyễn, ông còn để lại nhiều di sản nổi tiếng khác trong đó có di tích lăng mộ với 20 công trình lớn nhỏ.
		Trưa: Quý khách dùng cơm trưa thưởng thức nhiều món ăn đặc sản Huế tại nhà hàng.
		Chiều: Xe và hướng dẫn viên đưa du khách đi khu du lịch biển Lăng Cô, được mệnh danh là một trong những bãi biển đẹp bậc nhất miền Trung, nơi đây mang vẻ thơ mộng với nước xanh, cát vàng, nắng vàng vô cùng hấp dẫn. Du khách tự do tắm biển, nghỉ ngơi tại Lăng Cô
		Tối: Du khách dùng bữa tối sớm tại nhà hàng, khu du lịch biển Lăng Cô. Sau bữa ăn tối xe đưa du khách về lại TP. Huế, Quý khách tự do đón xích lô,dạo chơi, nghỉ ngơi.'),
(17, 3, 'NGÀY 3: HUẾ - CHÙA THIÊN MỤ - PHÚ BÀI - KHỞI HÀNH VỀ HÀ NỘI (ĂN S, T).
		Sáng: Du khách dùng điểm tâm sáng tại nhà hàng khách sạn, hướng dẫn viên đưa du khách lễ và tham quan chùa Thiên Mụ, ngôi chùa cổ kính nằm bên dòng Hương Giang. Sau đó Quý khách tự do đi chợ mua sắm đặc sản Huế về làm quà cho gia đình và người thân.
		10h00: Du khách kiểm tra đồ đạc các nhân, trả phòng khách sạn, xe đưa Quý khách đi dùng cơm trưa tại nhà hàng.
		11h15: Xe đưa đoàn ra sân bay Phú Bài, Huế. Du khách làm thủ tục đáp chuyến bay lúc 12h50 - VJ569 về Hà Nội.
		15h00: Du khách nhận hành lý và di chuyển ra xe đón về điểm hẹn theo yêu cầu. Về đến điểm đón kết thúc hành trình tour du lịch Huế 3 ngày 2 đêm. Hướng dẫn viên Tour Pro chia tay du khách, cảm ơn Quý khách và hẹn gặp lại!'),

(18, 1, 'NGÀY 1: TỪ HÀ NỘI - KHU DU LỊCH FLC Lý SƠN - THANH HÓA (ĂN T, T).
		07h30: Xe và hướng dẫn viên Tour.Pro.Vn có mặt tại điểm hẹn đón Quý khách khởi hành đi khu du lịch FLC Sầm Sơn - Thanh Hóa.
		08h30: Xe dừng nghỉ tại Hà Nam Quý khách tự do nghỉ ngơi, ăn sáng chi phí tự túc. sau đó xe tiếp tục đưa Quý khách đi FLC Sầm Sơn.
		Trưa: Xe đưa Quý khách đến thành phố biển Sầm Sơn, Quý khách dùng bữa trưa tại nhà hàng thưởng thức các món ăn đặc sản biển địa phương. Sau bữa trưa Quý khách nhận phòng khách sạn nghỉ nghơi tại FLC Sầm Sơn.
		Chiều: Quý khách tự do dạo chơi, tắm biển. Quý khách tham gia chương trình Team Building - chủ đề "Nối vòng tay lớn" với nhiều trò chơi vui nhộn (Áp dụng cho đoàn 40 khách trở lên). Kết thúc chương trình Quý khách tự do tắm biển.
		18h30: Quý khách dùng bữa ăn tối tại nhà hàng, sau bữa tối Quý khách tự do dạo chơi tại thành phố biển Sầm Sơn. Quý khách nghỉ đêm tại FLC Sầm Sơn resort.'),
(18, 2, 'NGÀY 2: THAM QUAN, NGHỈ DƯỠNG FLC LÝ SƠN - VỀ HÀ NỘI (ĂN S, T).
		Sáng: Du khách dùng bữa sáng buffet tại resort, sau đó Quý khách tự do tắm biển, dạo chơi khu du lịch biển Sầm Sơn, mua sắm hải sản, đặc sản địa phương về làm quà cho gia đình và người thân.
		09h00: Xe và hương dẫn viên đưa Quý khách tham quan hòn Trống Mái, tham quan và lễ tại chùa Cô Tiên, đền Độc Cước những địa danh nổi tiểng của Sầm Sơn Thanh Hóa.
		11h30: Quý khách trả phòng khách sạn, sau đó xe đưa quý khách đi dùng cơm trưa tại nhà hàng.
		13h00: Xe đón Quý khách trở về Hà Nội. Trên đường về dừng chân tại Cầu Hàm Rồng và Thanh Liêm (Hà Nam ) để quý khách mua đặc sản quê hương: Dừa, Dứa, Nem chua... 
		17h30: Về tới điểm đón kết thúc hành trình {tour FLC Sầm Sơn 2 ngày 1 đêm}. Hướng dẫn viên Tour.Pro.Vn chia tay Quý khách, Cảm ơn và hẹn gặp lại trong những hành trình tiếp theo!'),

(19, 1, 'NGÀY 1: KHỞI HÀNH TỪ HÀ NỘI - DU LỊCH NHA TRANG - KHÁNH HÒA (ĂN T, T).
		05h00: Xe và hướng dẫn viên Tour Pro đón quý khách tại điểm hẹn khởi hành đi sân bay quốc tế Nội Bài. Quý khách làm thủ tục đáp chuyến  bay lúc 7h10  VJ471 đi sân bay quốc tế Cam Ranh - Khánh Hòa.
		09h10: Đến sân bay Cam Ranh, xe và hướng dẫn viên đưa Quý khách về TP Nha Trang. Quý khách tham quan tháp bà Ponagar, một công trình kiến trúc Chăm cổ, thưởng ngoạn các thắng cảnh nổi tiếng cầu Xóm Bóng, cầu Hà Ra, núi Cô Tiên. Tiếp tục hành trình Quý khách lễ và tham quan tại Chùa Long Sơn Tự.
		11h30: Quý khách dùng bữa trưa tại nhà hàng, sau bữa trưa Quý khách trở về khách sạn nhận phòng, nghỉ ngơi.
		Chiều: Quý khách tự do nghỉ ngơi, dạo chơi tắm biển tại TP Nha Trang.
		Tối: Quý khách dùng bữa tối tại nhà hàng thưởng thức các món ăn mang hương vị địa phương. sau bữa tối Quý khách tự do dạo chơi phố biển về đêm, qua chợ đêm Nha Trang, công viên Phù Đổng, Cà phê Bốn Mùa, khu hải sản Tháp Bà…
		22h00: Quý khách nghỉ đêm tại khách sạn thành phố biển Nha Trang.'),
(19, 2, 'NGÀY 2: TP NHA TRANG - ĐI DU LỊCH BIỂN ĐẢO NHA TRANG (ĂN S, T, T).
		Sáng: Quý khách tự do dậy sớm, ngắm bình minh, dạo chơi, tắm biển. Sau đó dùng điểm tâm sáng tại khách sạn.
		08h00: Xe và hướng dẫn viên đưa Quý khách ra bến tàu khởi hành đi tham quan vịnh Nha Trang, du khách sẽ có dịp ngắm cảnh, dạo quanh các đảo lớn nhỏ, đi bộ trên bãi biển và thưởng thức những món ăn đậm chất biển đảo.
		12h00: Quý khách dùng bữa trưa tại nhà hàng trên đảo, thưởng thức các món ăn dân dã ngoài đảo xa.
		Chiều: Kết thúc hành trình khám phá và trải nghiệm tuyến biển đảo. Xe đưa Quý khách về lại khách sạn nghỉ ngơi, dạo chơi TP Nha Trang.
		19h00: Quý khách dùng bữa tối tại nhà hàng. Sau bữa tối  đoàn tự do dạo chơi và mua sắm quà lưu niệm tại chợ đêm.'),
(19, 3, 'NGÀY 3: NHA TRANG - VUI CHƠI TRẢI NGHIỆM VINPEARL LAND (ĂN S, T ).
		Sáng: Quý khách dậy sớm ngắm bình minh và tự do tắm biển Nha Trang. Sau đó về khách sạn dùng bữa sáng.
		Trưa: Quý khách dùng bữa trưa tại nhà hàng. Sau bữa trưa xe đưa Quý khách đi khu du lịch Vinpearl land.
		Chiều: Quý khách tham quan, vui chơi tại khu du lịch Vinpearl land. Quý khách trải nghiệm tuyến cáp treo vượt biển dài 3km. Hành trình cáp treo vượt biển sẽ đưa quý khách vượt qua vịnh Nha Trang, một trong hai mươi chín vịnh biển đẹp nhất hành tinh. Các trò chơi cảm giác mạnh, xem nhạc nước (buổi tối 19h00), Thủy cung , Rạp chiếu phim 3D, Xiếc cá heo, khu vui chơi máng trượt, công viên nước...vv
		Tối: Quý khách tự do dùng bữa tối tại nhà hàng (Chi phí tự túc). Sau đó tiếp tục vui chơi tại Vinpearl Land Nha Trang.
		21h30: Quý khách lên cáp treo về lại Nha Trang. Xe và hướng dẫn viên đón Quý khách về lại khách sạn. Quý khách nghỉ đêm tại Nha Trang.'),

(20, 1, 'NGÀY 1: KHỞI HÀNH TỪ HÀ NỘI - DU LỊCH NHA TRANG - KHÁNH HÒA (ĂN T, T).
		05h00: Xe và hướng dẫn viên Tour Pro đón quý khách tại điểm hẹn khởi hành đi sân bay quốc tế Nội Bài. Quý khách làm thủ tục đáp chuyến  bay lúc 7h10  VJ471 đi sân bay quốc tế Cam Ranh - Khánh Hòa.
		09h10: Đến sân bay Cam Ranh, xe và hướng dẫn viên đưa Quý khách về TP Nha Trang. Quý khách tham quan tháp bà Ponagar, một công trình kiến trúc Chăm cổ, thưởng ngoạn các thắng cảnh nổi tiếng cầu Xóm Bóng, cầu Hà Ra, núi Cô Tiên. Tiếp tục hành trình Quý khách lễ và tham quan tại Chùa Long Sơn Tự.
		11h30: Quý khách dùng bữa trưa tại nhà hàng, sau bữa trưa Quý khách trở về khách sạn nhận phòng, nghỉ ngơi.
		Chiều: Quý khách tự do nghỉ ngơi, dạo chơi tắm biển tại TP Nha Trang.
		Tối: Quý khách dùng bữa tối tại nhà hàng thưởng thức các món ăn mang hương vị địa phương. sau bữa tối Quý khách tự do dạo chơi phố biển về đêm, qua chợ đêm Nha Trang, công viên Phù Đổng, Cà phê Bốn Mùa, khu hải sản Tháp Bà…
		22h00: Quý khách nghỉ đêm tại khách sạn thành phố biển Nha Trang.'),
(20, 2, 'NGÀY 2: TP NHA TRANG - ĐI DU LỊCH BIỂN ĐẢO NHA TRANG (ĂN S, T, T).
		Sáng: Quý khách tự do dậy sớm, ngắm bình minh, dạo chơi, tắm biển. Sau đó dùng điểm tâm sáng tại khách sạn.
		08h00: Xe và hướng dẫn viên đưa Quý khách ra bến tàu khởi hành đi tham quan vịnh Nha Trang, du khách sẽ có dịp ngắm cảnh, dạo quanh các đảo lớn nhỏ, đi bộ trên bãi biển và thưởng thức những món ăn đậm chất biển đảo.
		12h00: Quý khách dùng bữa trưa tại nhà hàng trên đảo, thưởng thức các món ăn dân dã ngoài đảo xa.
		Chiều: Kết thúc hành trình khám phá và trải nghiệm tuyến biển đảo. Xe đưa Quý khách về lại khách sạn nghỉ ngơi, dạo chơi TP Nha Trang.
		19h00: Quý khách dùng bữa tối tại nhà hàng. Sau bữa tối  đoàn tự do dạo chơi và mua sắm quà lưu niệm tại chợ đêm.'),
(20, 3, 'NGÀY 3: NHA TRANG - VUI CHƠI TRẢI NGHIỆM VINPEARL LAND (ĂN S, T ).
		Sáng: Quý khách dậy sớm ngắm bình minh và tự do tắm biển Nha Trang. Sau đó về khách sạn dùng bữa sáng.
		Trưa: Quý khách dùng bữa trưa tại nhà hàng. Sau bữa trưa xe đưa Quý khách đi khu du lịch Vinpearl land.
		Chiều: Quý khách tham quan, vui chơi tại khu du lịch Vinpearl land. Quý khách trải nghiệm tuyến cáp treo vượt biển dài 3km. Hành trình cáp treo vượt biển sẽ đưa quý khách vượt qua vịnh Nha Trang, một trong hai mươi chín vịnh biển đẹp nhất hành tinh. Các trò chơi cảm giác mạnh, xem nhạc nước (buổi tối 19h00), Thủy cung , Rạp chiếu phim 3D, Xiếc cá heo, khu vui chơi máng trượt, công viên nước...vv
		Tối: Quý khách tự do dùng bữa tối tại nhà hàng (Chi phí tự túc). Sau đó tiếp tục vui chơi tại Vinpearl Land Nha Trang.
		21h30: Quý khách lên cáp treo về lại Nha Trang. Xe và hướng dẫn viên đón Quý khách về lại khách sạn. Quý khách nghỉ đêm tại Nha Trang.'),

(21, 1, 'NGÀY 1: KHỞI HÀNH TỪ HÀ NỘI - DU LỊCH NHA TRANG - KHÁNH HÒA (ĂN T, T).
		05h00: Xe và hướng dẫn viên Tour Pro đón quý khách tại điểm hẹn khởi hành đi sân bay quốc tế Nội Bài. Quý khách làm thủ tục đáp chuyến  bay lúc 7h10  VJ471 đi sân bay quốc tế Cam Ranh - Khánh Hòa.
		09h10: Đến sân bay Cam Ranh, xe và hướng dẫn viên đưa Quý khách về TP Nha Trang. Quý khách tham quan tháp bà Ponagar, một công trình kiến trúc Chăm cổ, thưởng ngoạn các thắng cảnh nổi tiếng cầu Xóm Bóng, cầu Hà Ra, núi Cô Tiên. Tiếp tục hành trình Quý khách lễ và tham quan tại Chùa Long Sơn Tự.
		11h30: Quý khách dùng bữa trưa tại nhà hàng, sau bữa trưa Quý khách trở về khách sạn nhận phòng, nghỉ ngơi.
		Chiều: Quý khách tự do nghỉ ngơi, dạo chơi tắm biển tại TP Nha Trang.
		Tối: Quý khách dùng bữa tối tại nhà hàng thưởng thức các món ăn mang hương vị địa phương. sau bữa tối Quý khách tự do dạo chơi phố biển về đêm, qua chợ đêm Nha Trang, công viên Phù Đổng, Cà phê Bốn Mùa, khu hải sản Tháp Bà…
		22h00: Quý khách nghỉ đêm tại khách sạn thành phố biển Nha Trang.'),
(21, 2, 'NGÀY 2: TP NHA TRANG - ĐI DU LỊCH BIỂN ĐẢO NHA TRANG (ĂN S, T, T).
		Sáng: Quý khách tự do dậy sớm, ngắm bình minh, dạo chơi, tắm biển. Sau đó dùng điểm tâm sáng tại khách sạn.
		08h00: Xe và hướng dẫn viên đưa Quý khách ra bến tàu khởi hành đi tham quan vịnh Nha Trang, du khách sẽ có dịp ngắm cảnh, dạo quanh các đảo lớn nhỏ, đi bộ trên bãi biển và thưởng thức những món ăn đậm chất biển đảo.
		12h00: Quý khách dùng bữa trưa tại nhà hàng trên đảo, thưởng thức các món ăn dân dã ngoài đảo xa.
		Chiều: Kết thúc hành trình khám phá và trải nghiệm tuyến biển đảo. Xe đưa Quý khách về lại khách sạn nghỉ ngơi, dạo chơi TP Nha Trang.
		19h00: Quý khách dùng bữa tối tại nhà hàng. Sau bữa tối  đoàn tự do dạo chơi và mua sắm quà lưu niệm tại chợ đêm.'),
(21, 3, 'NGÀY 3: NHA TRANG - VUI CHƠI TRẢI NGHIỆM VINPEARL LAND (ĂN S, T ).
		Sáng: Quý khách dậy sớm ngắm bình minh và tự do tắm biển Nha Trang. Sau đó về khách sạn dùng bữa sáng.
		Trưa: Quý khách dùng bữa trưa tại nhà hàng. Sau bữa trưa xe đưa Quý khách đi khu du lịch Vinpearl land.
		Chiều: Quý khách tham quan, vui chơi tại khu du lịch Vinpearl land. Quý khách trải nghiệm tuyến cáp treo vượt biển dài 3km. Hành trình cáp treo vượt biển sẽ đưa quý khách vượt qua vịnh Nha Trang, một trong hai mươi chín vịnh biển đẹp nhất hành tinh. Các trò chơi cảm giác mạnh, xem nhạc nước (buổi tối 19h00), Thủy cung , Rạp chiếu phim 3D, Xiếc cá heo, khu vui chơi máng trượt, công viên nước...vv
		Tối: Quý khách tự do dùng bữa tối tại nhà hàng (Chi phí tự túc). Sau đó tiếp tục vui chơi tại Vinpearl Land Nha Trang.
		21h30: Quý khách lên cáp treo về lại Nha Trang. Xe và hướng dẫn viên đón Quý khách về lại khách sạn. Quý khách nghỉ đêm tại Nha Trang.'),


(22, 1, 'NGÀY 1: KHỞI HÀNH HÀ NỘI - DU LỊCH BÌNH LIÊU - ĐỒNG VĂN (ĂN T, T).
		07h00: Xe và hướng dẫn viên du lịch Tour Pro đón du khách có mặt tại điểm hẹn ở Hà Nội hoặc theo yêu cầu bắt đầu hành trình du lịch Bình Liêu, Quảng Ninh.
		08h00: Xe dừng nghỉ tại trạm nghỉ trên cao tốc ở Hải Dương, du khách tự do nghỉ ngơi và dùng bữa sáng tại nhà hàng với chi phí tự túc.
		11h00: Du khách dùng cơm trưa tại hàng thưởng thức các món ăn mang hương vị biển Hạ Long.
		13h30: Sau bữa ăn trưa xe tiếp tục đưa du khách đi Đồng Văn - Bình Liêu. Trên đường đi du khách ngắm cảnh những đồi chè xanh mướt mỡ màng, những con dốc cao kỳ vĩ bên đường.
		Chiều: Đến Bình Liêu, hướng dẫn viên đưa du khách chinh phục cột mốc 1327 - Núi Thanh Long, địa điểm ngắm cảnh đẹp bao trùm một không gian lớn ven vùng biên Việt - Trung. Tiếp tục hành trình du khách ra cửa khẩu Hoành Mô tham quan và chụp ảnh kỷ niệm.
		Tối: Xe và hướng dẫn viên đưa du khách về khách sạn nhận phòng nghỉ ngơi, ăn tối tại nhà hàng. Sau bữa ăn tối du khách tự do tham quan thị trấn Bình Liêu thanh bình về đêm.'),
(22, 2, 'NGÀY 2: BẢN NÀ NHÁI - CỘT MỐC 1300 “MATCHA HILL” - KHỞI HÀNH VỀ HÀ NỘI (ĂN: S; T).
		Sáng: Du khách tự do dậy sớm đi dạo, thức dậy ở một nơi xa đón bình minh Bình Liêu. Sau đó dùng điểm tâm sáng tại khách sạn.
		08h00: Xe và hướng dẫn viên đưa du khách đi tham quan bản Nà Nhái (Bản Cao Thắng), bản sinh sống của đồng bào Dao Thanh Y, du khách dạo chơi trải nghiệm, tìm hiểu nhiều nét văn hóa đặc sắc tại bản.
		Tiếp tục hành trình hướng dẫn viên du lịch đưa du khách lên đường chinh phục cột mốc số 1300, địa điểm là giao mốc của Bình Liêu - Lạng Sơn - Trung Quốc. Nơi được du khách biết đến với hình ảnh giống như “Matcha Hill” địa điểm ngắm cảnh vô cùng xinh đẹp.
		11h30: Du khách trả phòng khách sạn, sau đó dùng cơm trưa tại nhà hàng thưởng thức hương vị món ngon Bình Liêu.
		12h30: Du khách lên xe khởi hành về Hà Nội, trên đường về đoàn ghé chợ phiên Bình Liêu. Du khách tự do mua sắm đặc sản là các sản phẩm từ nông sản, dược liệu của đồng bào địa phương về làm quà cho gia đình và người thân.
		17h30: Du khách về đến điểm đón tại Hà Nội hoặc theo yêu cầu. Hướng dẫn viên du lịch Tour Pro chia tay Quý khách. Cảm ơn và hẹn gặp lại!'),

(23, 1, 'NGÀY 1: TỪ HÀ NỘI - DU LỊCH QUẢNG NGÃI- BÃI TẮM HOÀNG HẬU (ĂN T, T).
		04h40: Xe và hướng dẫn viên đón đoàn tại điểm hẹn khởi hành đi sân bay Nội Bài đáp chuyến bay VJ433 lúc 6h35 khởi hành đi Quy Nhơn .
		08h30: Quý khách đến sân bay Phù Cát, Quy Nhơn, Bình Định. Xe và hướng dẫn đưa Quý khách tham quan một số địa điểm nổi tiếng tại TP. Quy Nhơn. Như Ghềnh Ráng Tiên Sa, Đồi Thi Nhân, bãi tắm Hoàng Hậu, Khu tưởng niệm và mộ Hàn Mặc Tử.
		11h30: Kết thúc tham quan, đoàn trở lại nhà hàng dùng cơm trưa, thưởng thức hương vị ẩm thực Quy Nhơn. Sau bữa trưa hướng dẫn đưa Quý khách về khách sạn nhận phòng nghỉ ngơi.
		15h00: Quý khách tự do dạo chơi, tắm biển tại thành phố Quy Nhơn. Cuối buổi chiều, hướng dẫn đưa du khách tham quan di tích lịch sử Tháp Đôi - Một trong những ngôi tháp điển hình của kiến trúc dân tộc Chăm.
		18h30: Quý khách dùng bữa tối tại nhà hàng, sau bữa tối Quý khách tự do dạo chơi TP biển Quy Nhơn. Nghỉ đêm tại Quy Nhơn.'),
(23, 2, 'NGÀY 2: TỪ QUẢNG NGÃI - “ VỀ THĂM MIỀN ĐẤT VÕ TÂY SƠN” (ĂN S, T, T).
		Sáng: Quý khách tự do dậy sớm, ngắm biển, đón bình minh, tắm biển. Sau đó dùng bữa sáng tại khách sạn.
		08h00: Xe và hướng dẫn viên đón Quý khách khởi hành đi Tây Sơn, Bình Định. Địa danh nổi tiếng gắn liền với lịch sử thời kỳ Tây Sơn.
		Du khách tham quan bảo tàng Quang Trung, Đền Thờ Tây Sơn Tam Kiệt, nghe thuyết minh, xem kỷ vật về thân thế sự nghiệp, cuộc đời ba anh em nhà Tây Sơn Nguyễn Nhạc, Nguyễn Huệ, Nguyễn Lữ. Thưởng thức nhạc võ và xem biểu diễn võ cổ truyền Bình Định, trống trận Tây Sơn, biểu diễn Cồng Chiêng.
		11h30: Quý khách dùng bữa trưa tại nhà hàng, sau bữa trưa xe đưa Quý khách về lại khách sạn tại TP. Quy Nhơn nghỉ ngơi.
		Chiều: Quý khách nghỉ ngơi tắm biển, tự do dạo chơi TP Quy Nhơn.
		Tối: Đoàn ăn tối tại nhà hàng, sau đó nghỉ đêm tại khách sạn - TP Quảng Ngãi.'),

(24, 1, 'NGÀY 1: HÀ NỘI - SÀI GÒN - MỸ THO - TIỀN GIANG - BẾN TRE - DU LỊCH CẦN THƠ (ĂN: T, T):
		03h30: Xe và hướng dẫn viên Tour Pro đón Quý khách tại điểm hẹn khởi hành đi sân bay Nội Bài, đáp chuyến bay VJ 143 đi TP HCM lúc 06h00. 
		08h00: Đến sân bay Tân Sơn Nhất, xe và Hướng dẫn viên đón quý khách khởi hành đi Mỹ Tho - Tiền Giang. Xe đưa quý khách đến bến tàu 3/2, quý khách di chuyển lên thuyền, du thuyền trên sông Tiền ngắm cảnh bốn cù lao Long, Lân, Qui, Phụng. Tham quan cảng Cá Mỹ Tho và làng nuôi Cá Bè dọc theo sông Tiền, Cầu Rạch Miễu.
		Đến cù lao Thới Sơn, tản bộ trên đường làng, tham quan vườn cây ăn trái, thưởng thức các loại trái cây theo mùa và nghe đờn ca tài tử Nam Bộ. Tham quan trại nuôi ong mật, thưởng thức trà mật ong và rượu chuối hột.
		Dùng xuồng chèo len lỏi trong rạch nhỏ, thám hiểm hai hàng dừa nước thiên nhiên và tìm hiểu cuộc sống của người dân miền quê. Xuôi dòng sông Tiền đến rạch Tân Thạch (Bến Tre), tham quan lò kẹo dừa đặc sản và làng nghề thủ công mỹ nghệ làm từ gỗ dừa. Đoàn ăn trưa tại nhà hàng.
		Chiều: Quý khách về đất liền, xe đưa đoàn khởi hành về Cần Thơ. Tới TP Cần Thơ, Quý khách làm thủ tục nhận phòng, nghỉ ngơi tại khách sạn.
		Tối: Quý khách dùng bữa tối trên du thuyền, ngắm cảnh sông nước Nam Bộ sau đó tự do dạo bến Ninh Kiều, khám phá thành phố Cần Thơ về đêm. '),
(24, 2, 'NGÀY 2: DU LỊCH CẦN THƠ - BẾN NINH KIỀU - CHÂU ĐỐC - AN GIANG (ĂN: S, T, T):
		Sáng: Quý khách dùng bữa sáng tại khách sạn, sau đó xe đưa quý khách ra bến Ninh Kiều, lên thuyền đi tham quan chợ nổi Cái Răng - Là một trong ba chợ nổi lớn nhất Cần Thơ. Nét độc đáo và đặc điểm chính của khu chợ nổi tiếng này là chuyên buôn bán các loại trái cây, đặc sản của vùng đồng bằng sông Cửu Long.
		Về Cần Thơ đi chơi chợ nổi Cái Răng là một trải nghiệm cực chất và thú vị nhất quả đất. Xe tiếp tục đưa đoàn thăm quan nhà cổ Bình Thủy. Ngôi nhà cổ năm gian hai chái được gia đình họ Dương xây dựng năm 1870 theo lối kiến trúc Pháp vẫn còn lưu giữ nhiều cổ vật quý giá.
		Trưa: Quý khách về khách sạn làm thủ tục trả phòng, ăn trưa tại nhà hàng.
		13h00: Quý khách khởi hành đi Châu Đốc, đến Châu Đốc - An Giang, Quý khách tham quan: Miếu Bà Chúa Xứ, Chùa Phật Thầy Tây An (Tây An Cổ Tự), một trong những ngôi chùa nổi tiếng thu hút nhiều phật tử khắp nơi đến cúng bái, Lăng Thoại Ngọc Hầu, một công thần triều Nguyễn có công khai khẩn vùng đất An Giang với công trình thủy lợi nổi bật như Kênh Vĩnh Tế, Kênh Thoại Hà…
		Tham quan và mua sắm tại chợ Châu Đốc - "Vương quốc mắm" của miền Tây với nhiều loại mắm khác nhau như mắm thái, mắm cá trèn, mắm cá lóc. Ngoài ra, còn có đường Thốt Nốt….
		18h30: Ăn tối tại nhà hàng địa phương với các món ăn đậm chất Nam Bộ. Tự do khám phá TP Châu Đốc về đêm, Nghỉ đêm tại khách sạn.'),
(24, 3, 'NGÀY 3: RỪNG TRÀM TRÀ SƯ - KHỞI HÀNH VỀ TP HỒ CHÍ MINH (ĂN: S, T, T):
		Sáng: Quý khách dùng bữa sáng tại khách sạn, sau đó trả phòng lên xe khởi hành đi Rừng Tràm Trà Sư. Đến Trà Sư, Quý khách đi tắc ráng len lõi trong rừng tràm ngắm các loài chim tự nhiên. Sau đó ngồi xuồng ba lá tham quan nơi sinh sản của các loài chim, cò. Quý khách lên tháp quan sát ngắm toàn cảnh rừng tràm Trà Sư và vô số chim, cò khắp nơi bay về .
		11h30: Ăn trưa tại khu du lịch Rừng Tràm. Sau bữa trưa xe đưa Quý khách khởi hành về TP HCM.
		Chiều: Về đến TPHCM, Quý khách nhận phòng khách sạn, Quý khách tự do nghỉ ngơi,
		Tối: Quý khách ăn tối tại nhà hàng. Nghỉ đêm tại khách sạn.'),

(25, 1, 'NGÀY 1: TỪ HÀ NỘI - KHU DU LỊCH FLC Lý SƠN - THANH HÓA (ĂN T, T).
		07h30: Xe và hướng dẫn viên Tour.Pro.Vn có mặt tại điểm hẹn đón Quý khách khởi hành đi khu du lịch FLC Sầm Sơn - Thanh Hóa.
		08h30: Xe dừng nghỉ tại Hà Nam Quý khách tự do nghỉ ngơi, ăn sáng chi phí tự túc. sau đó xe tiếp tục đưa Quý khách đi FLC Sầm Sơn.
		Trưa: Xe đưa Quý khách đến thành phố biển Sầm Sơn, Quý khách dùng bữa trưa tại nhà hàng thưởng thức các món ăn đặc sản biển địa phương. Sau bữa trưa Quý khách nhận phòng khách sạn nghỉ nghơi tại FLC Sầm Sơn.
		Chiều: Quý khách tự do dạo chơi, tắm biển. Quý khách tham gia chương trình Team Building - chủ đề "Nối vòng tay lớn" với nhiều trò chơi vui nhộn (Áp dụng cho đoàn 40 khách trở lên). Kết thúc chương trình Quý khách tự do tắm biển.
		18h30: Quý khách dùng bữa ăn tối tại nhà hàng, sau bữa tối Quý khách tự do dạo chơi tại thành phố biển Sầm Sơn. Quý khách nghỉ đêm tại FLC Sầm Sơn resort.'),
(25, 2, 'NGÀY 2: THAM QUAN, NGHỈ DƯỠNG FLC LÝ SƠN - VỀ HÀ NỘI (ĂN S, T).
		Sáng: Du khách dùng bữa sáng buffet tại resort, sau đó Quý khách tự do tắm biển, dạo chơi khu du lịch biển Sầm Sơn, mua sắm hải sản, đặc sản địa phương về làm quà cho gia đình và người thân.
		09h00: Xe và hương dẫn viên đưa Quý khách tham quan hòn Trống Mái, tham quan và lễ tại chùa Cô Tiên, đền Độc Cước những địa danh nổi tiểng của Sầm Sơn Thanh Hóa.
		11h30: Quý khách trả phòng khách sạn, sau đó xe đưa quý khách đi dùng cơm trưa tại nhà hàng.
		13h00: Xe đón Quý khách trở về Hà Nội. Trên đường về dừng chân tại Cầu Hàm Rồng và Thanh Liêm (Hà Nam ) để quý khách mua đặc sản quê hương: Dừa, Dứa, Nem chua... 
		17h30: Về tới điểm đón kết thúc hành trình {tour FLC Sầm Sơn 2 ngày 1 đêm}. Hướng dẫn viên Tour.Pro.Vn chia tay Quý khách, Cảm ơn và hẹn gặp lại trong những hành trình tiếp theo!');

-- Bảng TourImage
DROP TABLE IF EXISTS `tourImage`;
CREATE TABLE TourImage (
    tourimage_id INT AUTO_INCREMENT PRIMARY KEY,
    tour_id INT NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    caption VARCHAR(255),
    FOREIGN KEY (tour_id) REFERENCES Tour(tour_id) ON DELETE CASCADE
);

INSERT INTO `TourImage` VALUES 
(1, 1, 'assets/images/TamDao.jpg', 'Khung cảnh núi rừng tuyệt đẹp tại Tam Đảo'),
(2, 2, 'assets/images/BacGiang.jpg', 'Trải nghiệm văn hóa chùa Tây Yến Tử và thiên nhiên Bắc Giang'),
(3, 3, 'assets/images/DaLat1.jpg', 'Vườn hoa thơ mộng và khung cảnh tuyệt đẹp tại Đà Lạt'),
(4, 4, 'assets/images/DaLat2.jpg', 'Thành phố mộng mơ Đà Lạt với hồ Xuân Hương'),
(5, 5, 'assets/images/ĐaNang.jpg', 'Cầu Rồng rực rỡ tại Đà Nẵng'),
(6, 6, 'assets/images/DaNang1.jpg', 'Cầu Vàng hùng vĩ tại Đà Nẵng'),
(2, 2, 'assets/images/BacGiang.jpg', 'Trải nghiệm văn hóa chùa Tây Yến Tử và thiên nhiên Bắc Giang'),
(3, 3, 'assets/images/DaLat1.jpg', 'Vườn hoa thơ mộng và khung cảnh tuyệt đẹp tại Đà Lạt'),
(4, 4, 'assets/images/DaLat2.jpg', 'Thành phố mộng mơ Đà Lạt với hồ Xuân Hương'),
(5, 5, 'assets/images/ĐaNang.jpg', 'Cầu Rồng rực rỡ tại Đà Nẵng'),
(6, 6, 'assets/images/DaNang1.jpg', 'Cầu Vàng hùng vĩ tại Đà Nẵng'),
(7, 7, 'assets/images/EoGio_QuyNhon.jpg', 'Khám phá Eo Gió – Quy Nhơn hoang sơ'),
(8, 8, 'assets/images/Fansipan1.jpg', 'Đỉnh Fansipan – Nóc nhà Đông Dương'),
(9, 9, 'assets/images/HaiPhong.jpg', 'Hải Phòng – Thành phố cảng năng động'),
(10, 10, 'assets/images/halong.jpg', 'Vịnh Hạ Long – Di sản thiên nhiên thế giới'),
(11, 11, 'assets/images/Halong.jpg', 'Khám phá hang động kỳ thú tại Hạ Long'),
(12, 12, 'assets/images/Hanoi.jpg', 'Hồ Gươm, là một trong những danh thắng nổi tiếng và biểu tượng của thủ đô Hà Nội, Việt Nam. '),
(12, 12, 'assets/images/Hanoi.jpg', 'Hồ Gươm, là một trong những danh thắng nổi tiếng và biểu tượng của thủ đô Hà Nội, Việt Nam. '),
(13, 13, 'assets/images/HaNoi2.jpg', 'Phố cổ Hà Nội – Nét đẹp văn hóa truyền thống'),
(14, 14, 'assets/images/HoiAn.jpg', 'Phố cổ Hội An lung linh đèn lồng'),
(15, 15, 'assets/images/HoiAn1.jpg', 'Khám phá nét đẹp cổ kính và văn hóa độc đáo của Hội An'),
(15, 15, 'assets/images/HoiAn1.jpg', 'Khám phá nét đẹp cổ kính và văn hóa độc đáo của Hội An'),
(16, 16, 'assets/images/HoiAn2.jpg', 'Tham quan chùa Cầu tại Hội An'),
(17, 17, 'assets/images/Hue.jpg', 'Cố đô Huế với vẻ đẹp trầm mặc'),
(18, 18, 'assets/images/LySon.jpg', 'Đảo Lý Sơn – Thiên đường giữa biển khơi'),
(19, 19, 'assets/images/nhatrang.jpg', 'Nha Trang – Thành phố biển sôi động'),
(20, 20, 'assets/images/NhaTrang.jpg', 'Công viên Nha Trang với khung cảnh vui nhộn và hoang hôn, tuyệt đẹp'),
(21, 21, 'assets/images/NhaTrang1.jpg', 'Vùng biển yên bình tuyệt đẹp tại Nha Trang'),
(22, 22, 'assets/images/QuangBinh.jpg', 'Quảng Bình – Vương quốc của những cây cầu và hồ tây thơ mộng'),
(23, 23, 'assets/images/QuangNgai.jpg', 'Trải nghiệm đời sống văn hóa độc đáo tại Quảng Ngãi'),
(20, 20, 'assets/images/NhaTrang.jpg', 'Công viên Nha Trang với khung cảnh vui nhộn và hoang hôn, tuyệt đẹp'),
(21, 21, 'assets/images/NhaTrang1.jpg', 'Vùng biển yên bình tuyệt đẹp tại Nha Trang'),
(22, 22, 'assets/images/QuangBinh.jpg', 'Quảng Bình – Vương quốc của những cây cầu và hồ tây thơ mộng'),
(23, 23, 'assets/images/QuangNgai.jpg', 'Trải nghiệm đời sống văn hóa độc đáo tại Quảng Ngãi'),
(24, 24, 'assets/images/SaiGon.jpg', 'Sài Gòn – Thành phố không ngủ'),
(25, 25, 'assets/images/SaPa.jpg', 'Sa Pa – Thị trấn mờ sương với ruộng bậc thang');

-- Bảng User
DROP TABLE IF EXISTS `user`;
CREATE TABLE User (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(15),
    address VARCHAR(255)
);

        -- Bảng review
DROP TABLE IF EXISTS `review`;
CREATE TABLE Review (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    tour_id INT NOT NULL,
    user_id INT NOT NULL,
    rating INT CHECK (rating BETWEEN 1 AND 5),
    comment TEXT,
    FOREIGN KEY (tour_id) REFERENCES Tour(tour_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE
);
-- Bảng Booking
DROP TABLE IF EXISTS `booking`;
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
);
-- Bảng Payment
DROP TABLE IF EXISTS `payment`;
CREATE TABLE Payment (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    payment_date DATE NOT NULL,
    payment_method ENUM('tiền mặt', 'chuyển khoản') NOT NULL,
    FOREIGN KEY (booking_id) REFERENCES Booking(booking_id) ON DELETE CASCADE
);

-- Bảng Blog
DROP TABLE IF EXISTS `blog`;
CREATE TABLE Blog (
    blog_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    author VARCHAR(255) NOT NULL,
    published_date DATE NOT NULL,
    category ENUM('mẹo du lịch', 'điểm đến') NOT NULL
);
