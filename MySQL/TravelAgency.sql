drop database if exists HappyTrips;
create database HappyTrips;
use HappyTrips;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` INT(11) NOT NULL,
  `username` VARCHAR(50) DEFAULT NULL,
  `password` VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `admin` (username, password) VALUES ('kinle2005@gmail.com', MD5('king12345'));

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
    type ENUM('exploration', 'relaxation', 'adventure') NOT NULL
);

INSERT INTO `Tour` VALUES 
(1, 'The Breath of Tam Dao', 'Magnificent mountain scenery in Tam Dao.', 1000000.00, '2023-05-01', '2023-05-05', 5, 'adventure'), 
(2, 'Journey to Tay Yen', 'Experience the culture of Tay Yen Tu Pagoda and the nature of Bac Giang.', 2000000.00, '2023-05-06', '2023-05-10', 7, 'exploration'), 
(3, 'Da Lat Fragrance', 'Discover the famous landmarks of dreamy Da Lat city.', 1500000.00, '2023-05-11', '2023-05-15', 6, 'exploration'), 
(4, 'Xuan Huong Serenade', 'The dreamy city of Da Lat with Xuan Huong Lake.', 3000000.00, '2023-05-16', '2023-05-20', 8, 'relaxation'), 
(5, 'Red Dragon Da Nang', 'The brilliant Dragon Bridge in Da Nang.', 2500000.00, '2023-05-21', '2023-05-25', 4, 'exploration'), 
(6, 'Golden in the Sky', 'The majestic Golden Bridge in Da Nang.', 1800000.00, '2023-05-26', '2023-05-30', 6, 'exploration'), 
(7, 'Eo Gio Adventure', 'An adventurous journey to Eo Gio – a pristine destination in Quy Nhon.', 2200000.00, '2023-05-31', '2023-06-04', 7, 'adventure'), 
(8, 'The Roof of Indochina', 'Fansipan Summit – the Roof of Indochina.', 1900000.00, '2023-06-05', '2023-06-09', 5, 'adventure'), 
(9, 'Vibrant Hai Phong', 'Hai Phong – A dynamic port city.', 2800000.00, '2023-06-10', '2023-06-14', 8, 'exploration'), 
(10, 'Ha Long Wonder', 'Ha Long Bay – A world natural heritage site.', 1600000.00, '2023-06-15', '2023-06-19', 6, 'exploration'), 
(11, 'Mysterious Long Cave', 'Explore the magnificent caves in Ha Long.', 2400000.00, '2023-06-20', '2023-06-24', 7, 'adventure'), 
(12, 'Ancient Thang Long', 'Hoan Kiem Lake, one of the most famous landmarks and symbols of Hanoi, Vietnam.', 1900000.00, '2023-06-25', '2023-06-29', 5, 'relaxation'), 
(13, 'Old Quarter Spirit', 'Hanoi Old Quarter – A glimpse of traditional culture.', 2700000.00, '2023-06-30', '2023-07-04', 8, 'relaxation'), 
(14, 'Sparkling Hoi An', 'Hoi An Ancient Town illuminated by lanterns.', 1500000.00, '2023-07-05', '2023-07-09', 6, 'relaxation'), 
(15, 'Hoi An Culture', 'Explore the ancient beauty and unique culture of Hoi An.', 2200000.00, '2023-07-10', '2023-07-14', 7, 'exploration'), 
(16, 'Hoi An Bridge Pagoda', 'Visit the iconic Bridge Pagoda in Hoi An.', 1800000.00, '2023-07-15', '2023-07-19', 5, 'exploration'), 
(17, 'Tranquil Hue', 'The imperial city of Hue with its serene beauty.', 2600000.00, '2023-07-20', '2023-07-24', 8, 'exploration'), 
(18, 'Paradise Ly Son', 'Ly Son Island – A paradise in the ocean.', 1400000.00, '2023-07-25', '2023-07-29', 6, 'relaxation'), 
(19, 'Vibrant Nha Trang', 'Nha Trang – A lively coastal city.', 2100000.00, '2023-07-30', '2023-08-03', 7, 'relaxation'), 
(20, 'Nha Trang Sunset', 'Nha Trang Park with its vibrant atmosphere and beautiful sunsets.', 1700000.00, '2023-08-04', '2023-08-08', 5, 'exploration'), 
(21, 'Peaceful Beach', 'The serene and stunning beaches of Nha Trang.', 2000000.00, '2023-08-09', '2023-08-13', 5, 'relaxation'), 
(22, 'Dreamy Quang Binh', 'Quang Binh – The kingdom of bridges and poetic lakes.', 1800000.00, '2023-08-14', '2023-08-18', 5, 'exploration'), 
(23, 'Unique Quang Ngai', 'Experience the unique cultural lifestyle in Quang Ngai.', 1600000.00, '2023-08-19', '2023-08-23', 5, 'exploration'), 
(24, 'Dynamic Saigon', 'Saigon – The city that never sleeps.', 3000000.00, '2023-08-24', '2023-08-28', 5, 'relaxation'), 
(25, 'Misty Sa Pa', 'Sa Pa – The misty town with terraced fields.', 3200000.00, '2023-08-29', '2023-09-02', 5, 'adventure');


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
INSERT INTO `itinerary` (tour_id, day, description) VALUES
(1, 1, 'DAY 1: DEPARTURE FROM HANOI - TAM DAO TOWN (L, D).
        07:00: The Tour.Pro.Vn guide and driver pick up guests at the meeting point. After a headcount, depart for Tam Dao - Vinh Phuc. En route, the bus will stop for a break, allowing guests to rest and have breakfast (self-funded).
        09:00: Arrive at Tam Dao town. Guests can rest and join the guide to visit and take pictures at Silver Waterfall – a roaring cascade surrounded by dense green valleys, creating a mysterious and captivating beauty.
        11:00: Lunch at a local restaurant. Afterward, check in at the hotel and rest.
        Afternoon: Guests are free to explore and enjoy sights such as Tam Dao Stone Church, or relax at local cafes.
        Evening: Dinner at the restaurant. Afterward, guests can freely roam the town, take photos, enjoy BBQ dishes, and admire the night view of Tam Dao. Overnight at the hotel.'),
(1, 2, 'DAY 2: TOURING TAM DAO - RETURN TO HANOI (B, L).
        08:00: Breakfast at the restaurant. Then, the guide takes guests to conquer the TV Tower at the top of Thien Nhi Mountain. Though challenging, the path is romantic and scenic, adorned with wildflowers such as orchids and Mexican sunflowers.
        12:00: Check out from the hotel and enjoy lunch with Tam Dao specialty dishes.
Afternoon: Visit the Lady Chua Thuong Ngan Temple amidst the dreamy Tam Dao landscape. Guests can freely explore and participate in a ceremonial offering.
        15:30: End the tour and depart for Hanoi.
        18:30: Arrive in Hanoi. The guide and driver return guests to the initial meeting point, express gratitude, and bid farewell. The 2-day 1-night Tam Dao tour concludes.'),

(2, 1, 'DAY 1: HANOI - CAO LINH PAGODA - BACH DANG GIANG TOUR.
        06:00: The Tour Pro guide and driver pick up guests at the meeting point in Hanoi, departing for Hai Phong to start the spring tour. Travel via Highway 5B. Guests can stop in Hai Duong to rest and have breakfast.
        08:00: Arrive at Cao Linh Pagoda, the first stop of this spiritual journey. Cao Linh Pagoda boasts stunning landscapes and grand architectural works. Guests can explore, offer prayers, and then continue the trip.
        10:00: Visit the Bach Dang Giang Historical Site in Trang Kenh, Thuy Nguyen, Hai Phong. Guests can freely tour and participate in ceremonies at the site.
        11:30: Lunch at a restaurant near Bach Dang Giang.'),
(2, 2, 'DAY 2: VISITING BA DE TEMPLE - HANG PAGODA - RETURN TO HANOI.
        13:30: Visit Ba De Temple, a sacred temple in Do Son. Known as the wife of Lord Trinh Giang, Ba De Temple received a royal decree from Emperor Tu Duc. The temple is an iconic spiritual site.
        15:00: Continue to Hang Pagoda, a renowned pagoda located in a cave, famous for its serene and unique beauty in Hai Phong. Guests can freely explore and offer prayers.
        16:30: Depart for Hanoi. Upon arrival, the guide and driver return guests to the initial meeting point, express gratitude, and bid farewell. The journey to Bach Dang Giang, Cao Linh Pagoda, Ba De Temple, and Hang Pagoda concludes.'),

(3, 1, 'DAY 1: HANOI - CAM RANH AIRPORT - NHA TRANG TOUR (L).
        10:30: The guide and bus pick up guests at the meeting point, conduct a headcount, and depart for Noi Bai Airport. Guests board the Vietnam Airlines flight VN1557 at 12:25 to Nha Trang.
        Afternoon: Upon arrival, check in and rest. Guests can freely explore Nha Trang city and enjoy the beach. Visit Long Son Pagoda, Hon Chong tourist area, and Ponagar Tower. Relax with a mud bath at I RESORT.
        Evening: Dinner at a local restaurant. Afterward, guests are free to explore the city and enjoy the nightlife. Overnight in Nha Trang.'),
(3, 2, 'DAY 2: NHA TRANG - BAY TOUR - VINPEARL LAND (B, L).
        Morning: Breakfast at the hotel. The bus takes guests to the pier for a tour of Nha Trang Bay, including visits to Hon Mot and Hon Mun islands.
        Noon: Lunch at Con Se Tre restaurant in Nha Trang Bay. After lunch, the boat returns guests to the mainland, and they return to the hotel to rest.
        15:30: Guests visit Vinpearl Land, taking a round-trip cable car ride. Enjoy various activities:
        + Outdoor thrilling rides like the Moon Swing and Roller Coaster.
+ Indoor games such as racing games and bumper cars.
        + 4D movies, water music performances, the Aquarium, and the Water Park.
        Evening: Guests are free to dine and explore Vinpearl Land. At 21:00, take the cable car back to the mainland. The bus takes guests back to the hotel.'),

(4, 1, 'DAY 1: HANOI - CAM RANH AIRPORT - NHA TRANG TOUR (L).
        10:30: The guide and bus pick up guests at the meeting point, conduct a headcount, and depart for Noi Bai Airport. Guests board the Vietnam Airlines flight VN1557 at 12:25 to Nha Trang.
        Afternoon: Upon arrival, check in and rest. Guests can freely explore Nha Trang city and enjoy the beach. Visit Long Son Pagoda, Hon Chong tourist area, and Ponagar Tower. Relax with a mud bath at I RESORT.
        Evening: Dinner at a local restaurant. Afterward, guests are free to explore the city and enjoy the nightlife. Overnight in Nha Trang.'),
(4, 2, 'DAY 2: NHA TRANG - BAY TOUR - VINPEARL LAND (B, L).
        Morning: Breakfast at the hotel. The bus takes guests to the pier for a tour of Nha Trang Bay, including visits to Hon Mot and Hon Mun islands.
        Noon: Lunch at Con Se Tre restaurant in Nha Trang Bay. After lunch, the boat returns guests to the mainland, and they return to the hotel to rest.
        15:30: Guests visit Vinpearl Land, taking a round-trip cable car ride. Enjoy various activities:
        + Outdoor thrilling rides like the Moon Swing and Roller Coaster.
        + Indoor games such as racing games and bumper cars.
        + 4D movies, water music performances, the Aquarium, and the Water Park.
        Evening: Guests are free to dine and explore Vinpearl Land. At 21:00, take the cable car back to the mainland. The bus takes guests back to the hotel.'),
        
(5, 1, 'DAY 1: FROM HANOI - TRAVEL TO DA NANG - SON TRA PENINSULA (LUNCH, DINNER)
		07:30 AM: The bus picks up guests at the designated location in Hanoi City and heads to Noi Bai Airport. Guests board flight VJ517 at 10:25 AM.
		11:30 AM: Arrive in Da Nang, where a bus takes guests to a restaurant for lunch. Then, the group checks into the hotel for rest.
		Afternoon: Guests are free to explore and swim at My Khe Beach.
		05:00 PM: The bus takes the group to visit Son Tra Peninsula, featuring stunning and majestic temples. Guests can burn incense and pray at Linh Ung Pagoda.
		07:00 PM: Dinner at a local restaurant. After dinner, guests are free to stroll and enjoy the night scenery at My Khe Beach. Overnight at the hotel.'),
(5, 2, 'DAY 2: DA NANG - VISIT ANCIENT TOWN HOI AN - QUANG NAM (BREAKFAST, LUNCH, DINNER)
		Morning: Guests are free to explore, swim, and have breakfast at the hotel.
		08:00 AM: The bus picks up guests to visit Non Nuoc Tourist Area - Marble Mountains. Guests can climb to explore Huyen Khong Cave, Tam Thai Pagoda, and Linh Ung Pagoda, and visit the Non Nuoc Stone Carving Village.
Continue the journey to Hoi An Ancient Town, recognized as a UNESCO World Heritage Site in November 1999. Guests visit Phuc Kien Assembly Hall (or Guangdong Assembly Hall), the Japanese Covered Bridge, Tan Ky Ancient House (or Phung Hung Ancient House).
		Lunch: The bus takes guests to a restaurant to enjoy local specialties.
		(Optional: If guests choose to visit Cu Lao Cham Island, the bus will take the group to Cua Dai Beach. Guests will board a boat to Cu Lao Cham, swim, and have lunch on the island. Afterward, return to Da Nang. (Additional charge: 580,000 VND per person for Cu Lao Cham).)
		Afternoon: Guests are free to rest at the hotel, stroll around Da Nang City, and swim at My Khe Beach.
		Evening: The bus takes guests to have dinner at a restaurant. Overnight at Da Nang (hotel located on My Khe Beach).'),
(5, 3, 'DAY 3: DA NANG - BA NA HILLS TOURIST AREA - SWIM AT MY KHE BEACH (BREAKFAST, LUNCH)
		Morning: Guests are free to wake up early to watch the sunrise on the beach and swim. After that, have breakfast at the hotel.
		07:30 AM: The bus takes guests to visit Ba Na Hills Tourist Area. Guests take the longest cable car in Vietnam to the mountain at an altitude of 1,487 meters above sea level.
		At Ba Na Hills, guests can experience the unique climate with four seasons (Spring, Summer, Autumn, and Winter) in one day. From the cable car cabin, guests can admire scenic spots like Vong Nguyet Hill, Linh Ung Pagoda, Thich Ca Buddha Statue, the old French stables, Meditation Garden, and Rong House Summit. Enjoy unlimited fun at Fantasy Park with many exciting games. (Cable car tickets not included.)
		Lunch: Guests enjoy a self-service lunch at Ba Na Hills (at their own expense).
		03:30 PM: Guests bid farewell to Ba Na Hills and return to Da Nang.
		Evening: Dinner at a local restaurant. Guests are free to explore and stay overnight in Da Nang (hotel located on My Khe Beach). '),

(6, 1, 'DAY 1: FROM HANOI - TRAVEL TO DA NANG - SON TRA PENINSULA (LUNCH, DINNER)
		07:30 AM: The bus picks up guests at the designated location in Hanoi City and heads to Noi Bai Airport. Guests board flight VJ517 at 10:25 AM.
		11:30 AM: Arrive in Da Nang, where a bus takes guests to a restaurant for lunch. Then, the group checks into the hotel for rest.
		Afternoon: Guests are free to explore and swim at My Khe Beach.
		05:00 PM: The bus takes the group to visit Son Tra Peninsula, featuring stunning and majestic temples. Guests can burn incense and pray at Linh Ung Pagoda.
		07:00 PM: Dinner at a local restaurant. After dinner, guests are free to stroll and enjoy the night scenery at My Khe Beach. Overnight at the hotel.'),
        
(6, 2, 'DAY 2: DA NANG - VISIT ANCIENT TOWN HOI AN - QUANG NAM (BREAKFAST, LUNCH, DINNER)
		Morning: Guests are free to explore, swim, and have breakfast at the hotel.
08:00 AM: The bus picks up guests to visit Non Nuoc Tourist Area - Marble Mountains. Guests can climb to explore Huyen Khong Cave, Tam Thai Pagoda, and Linh Ung Pagoda, and visit the Non Nuoc Stone Carving Village.
		Continue the journey to Hoi An Ancient Town, recognized as a UNESCO World Heritage Site in November 1999. Guests visit Phuc Kien Assembly Hall (or Guangdong Assembly Hall), the Japanese Covered Bridge, Tan Ky Ancient House (or Phung Hung Ancient House).
		Lunch: The bus takes guests to a restaurant to enjoy local specialties.
		(Optional: If guests choose to visit Cu Lao Cham Island, the bus will take the group to Cua Dai Beach. Guests will board a boat to Cu Lao Cham, swim, and have lunch on the island. Afterward, return to Da Nang. (Additional charge: 580,000 VND per person for Cu Lao Cham).)
		Afternoon: Guests are free to rest at the hotel, stroll around Da Nang City, and swim at My Khe Beach.
		Evening: The bus takes guests to have dinner at a restaurant. Overnight at Da Nang (hotel located on My Khe Beach).'),

(6, 3, 'DAY 3: DA NANG - BA NA HILLS TOURIST AREA - MY KHE BEACH SWIMMING (B, L).
		Morning: Guests are free to wake up early, enjoy the sunrise on the beach, and swim. Then, have breakfast at the hotel.
		07:30: A vehicle will take guests to Ba Na Hills Tourist Area. Guests will board Vietnams longest cable car to ascend to the mountain, at an altitude of 1,487 meters above sea level. '),

(7, 1, 'DAY 1: FROM HANOI - QUY NHON TRIP - HOANG HAU BEACH (L, D).
		04:40: The vehicle and guide pick up the group at the meeting point and head to Noi Bai Airport for the VJ433 flight at 6:35 AM to Quy Nhon.
		08:30: Guests arrive at Phu Cat Airport in Quy Nhon, Binh Dinh. The vehicle and guide take guests to visit popular attractions in Quy Nhon, such as Ghenh Rang Tien Sa, Thi Nhan Hill, Hoang Hau Beach, and the memorial and tomb of Han Mac Tu.
		11:30: After the tour, the group returns to the restaurant for lunch, enjoying the flavors of Quy Nhons cuisine. Post-lunch, the guide takes guests to the hotel to check in and rest.
		15:00: Free time for a stroll or a swim in Quy Nhon city. In the late afternoon, the guide takes visitors to explore the historic Twin Towers, a prime example of Cham ethnic architecture.
		18:30: Dinner at a restaurant. Afterward, free time to explore the coastal city of Quy Nhon. Overnight stay in Quy Nhon.'),

(7, 2, 'DAY 2: FROM QUY NHON - "VISITING THE LAND OF MARTIAL ARTS TAY SON" (B, L, D).
		Morning: Guests are free to wake up early, enjoy the sunrise, and swim. Breakfast is served at the hotel.
		08:00: The vehicle and guide pick up guests to visit Tay Son, Binh Dinh, a famous place tied to the historical Tay Son period.
		Visitors will explore the Quang Trung Museum and the Temple of Tay Son Tam Kiet, learning about the life and legacy of the three Tay Son brothers (Nguyen Nhac, Nguyen Hue, Nguyen Lu). Enjoy performances of martial arts, Tay Son war drums, and Gong performances.
11:30: Lunch at a restaurant, followed by a return to the hotel in Quy Nhon to rest.
		Afternoon: Relax at the beach or stroll around Quy Nhon.
		Evening: Dinner at a restaurant, then overnight at the hotel in Quy Nhon.'),
        
(7, 3, 'DAY 3: QUY NHON - GHENH DA DIA (PHU YEN) - QUY NHON (B, L, D).
		Morning: Guests are free to wake up early, enjoy the sunrise, and swim. Breakfast is served at the hotel.
		07:30: The vehicle and guide take guests to Phu Yen to visit and take memorable photos at Ghenh Da Dia, a famous tourist site in Phu Yen.
		Afternoon: Lunch at Dam O Loan in Phu Yen, where guests can savor Phu Yens local specialties.
		15:00: The vehicle takes guests back to Quy Nhon for free time, relaxation, or swimming.
		Evening: Dinner at a restaurant, followed by free time to explore the city and enjoy Quy Nhons night beach.'),
        
(8, 1, 'DAY 1: HANOI - SAPA - HAM RONG TOURIST AREA (L, D).
		05:15: The Tour Pro guide and vehicle pick up guests at the designated point to start the journey to Sapa via Noi Bai - Lao Cai Expressway. Along the way, the guide provides information and engages guests with fun activities. The vehicle stops for a 15-minute break where guests can explore and have breakfast (self-paid).
		10:15: Arrival in Sapa town. The guide and vehicle take guests to visit Ham Rong Mountain, a must-visit tourist destination in Sapa. As guests ascend, they encounter beautiful landscapes such as the Orchid Garden, Heaven’s Gate, Cloud Yard, and Peach Garden. This is an ideal place for photography enthusiasts.
		11:40: Lunch at a restaurant, followed by check-in and rest at the hotel.
		14:00: Guests are taken to the Fansipan cable car station for a journey to conquer the 3,143m Fansipan summit, also known as the "Roof of Indochina." On clear days, the view is spectacular, with terraced fields, forests, valleys, and rugged mountain slopes appearing like a dreamscape in the mist.
		18:30: Return to the hotel for rest and dinner at a restaurant.
		20:00: Free time to explore the misty town at night, enjoy local coffee, or shop for souvenirs. Overnight in Sapa.'),

(8, 2, 'DAY 2: SAPA - CAT CAT VILLAGE - HANOI (B, L).
		07:00: Breakfast at the hotel. After breakfast, guests have free time to explore.
		08:00: The guide takes guests to Cat Cat Village. Nestled in the wilderness of the mountains, this charming village is a must-visit for anyone coming to Sapa. It features wooden houses, small streams, vibrant brocade fabrics, and friendly locals from ethnic minorities.
		11:30: Check-out of the hotel and lunch at a restaurant.
		13:00: Return to Hanoi by vehicle. The journey includes a rest stop for relaxation.
		18:00: Arrival in Hanoi. The guide and vehicle drop guests at the original pick-up point. Tour Pro expresses gratitude, says goodbye, and looks forward to welcoming guests again.'),

(9, 1, 'Day 1: MORNING: HANOI - CHIEM BAI, VISIT CAO LINH PAGODA - HAI PHONG.
07:00: The high-quality tourist car and professional tour guide from Tour Pro pick up guests at the requested meeting point in Hanoi, then depart for Cao Linh Pagoda in Hai Phong.
		08:00: The car moves along the Hanoi - Hai Phong expressway (National Road 5B). On the way, the car stops for a break, and guests can have breakfast or rest at the V52 Hai Duong rest stop.
		09:30: Guests arrive at Cao Linh Pagoda, a pagoda with scenic views and distinctive architecture in Hai Phong. The first destination in the spring tour, where guests will visit, worship, and perform ceremonies...
		11:00: Guests board the car to a nearby restaurant close to the historical site of Bach Dang River for lunch, enjoying many dishes with the rich flavors of the port city.'),
(9, 2, 'Day 2: AFTERNOON: VISIT AND TOUR BACH DANG RIVER - RETURN TO HANOI.
		13:30: Continuing the spring trip to Hai Phong, guests visit the Bach Dang River historical site located in Trang Kenh, Thuy Nguyen District, Hai Phong City.
		Afternoon: Guests have free time for temple worship and visit the Bach Dang River historical site in Hai Phong.
		15:30: Guests board the car to return to Hanoi, and on the way, the car stops for a break for guests to rest and purchase local specialties from Hai Phong and Hai Duong to bring back as gifts for family and friends.
		17:30: Arrive at the pre-arranged pick-up point in Hanoi. The tour guide from Tour Pro thanks and bids farewell to guests, looking forward to seeing them on many future journeys! End of the spring tour {Cao Linh Pagoda and Bach Dang River} one day.'),

(10, 1, 'DAY 1: FROM HANOI - HALONG TOUR - QUANG NINH (LUNCH, DINNER).
		07:30: The Tour Pro driver and guide pick up guests at the meeting point, check in, and depart for Ha Long City via National Road 5B - Hanoi - Hai Phong - Quang Ninh. On the bus, the guide provides enthusiastic commentary and fun activities.
		08:30: The bus stops at a service station on the expressway for a break where guests can have breakfast and rest. After that, guests continue to Ha Long - Quang Ninh.
		11:00: The bus arrives at Bai Chay Tourist Area in Ha Long City. Guests relax and have lunch at a restaurant. After lunch, guests check in at the hotel.
		Afternoon: Guests have free time to explore, shop, and enjoy the beach in Ha Long City. Or join a fun team-building activity on the beach (applies to groups of 60 or more).
		18:00: Guests have dinner at a restaurant and then have free time to visit, enjoy coffee, and view Ha Long City at night, or the bus will take them to the Tuan Chau Tourist Area (ticket fees are not included).
		22:00: Guests return to the hotel for the night.'),
(10, 2, 'DAY 2: HALONG - SUN WORLD - VISIT THE BAY (BREAKFAST, LUNCH, DINNER).
		Morning: Guests can wake up early to take a stroll and watch the sunrise or swim. Afterward, guests will have breakfast at the restaurant.
08:00: The bus and guide pick up guests to start the tour of Ha Long Bay, "one of the natural wonders of the world". Guests will visit the following sites: Thien Cung Cave, Lu Huong Island, Dog Stone Island, and Fighting Rooster Island...
		11:30: Guests will have lunch at a restaurant, then return to the hotel to rest.
		Afternoon: Guests have free time to enjoy activities at the SunWorld Ha Long Park complex - covering 214 hectares, SunWorld Ha Long Park includes three main areas for entertainment and sightseeing:
		- Activities at Ba Deo Peak - Queen Cable Car
			+ Cable Car
			+ Japanese Garden
			+ Wax Museum (100,000 VND per person)
			+ Kidoland
			+ Sun Wheel
		- Activities at Dragon Park (Dragon Amusement Park)
			+ Phi Long Thần Tốc
			+ Magic Umbrella
			+ Magic Cup
			+ Childhood Ride
			+ Dragons Footprint
			+ Magic Swing
			+ Furious Rhino
			+ Pirate Ship...
		- Typhoon Water Park
			+ Serpent Challenge
			+ Giant Wave Beach
			+ Magic Island
			+ Lazy River
			+ Tropical Storm
			+ Giant Thunderbolt.
		19:00: Guests have dinner at a restaurant, then have free time to visit, enjoy coffee, and view Ha Long City at night.
		22:00: Guests return to the hotel for the night.'),
    
(11, 1, 'DAY 01: HANOI - TUAN CHAU PORT - HA LONG BAY (LUNCH, DINNER).
		Morning: Depart from Hanoi or as per your specific request, Tour Pro will take guests to Tuan Chau Port, Ha Long. On the way, the bus will stop at the V52 Hai Duong expressway rest stop, where guests can enjoy breakfast and relax.
		11:30: The bus arrives at Tuan Chau Port, and the guide will lead guests onto the Ha Long cruise.
		11:45: Guests are aboard the cruise, participate in a welcome session, and listen to safety instructions. Then, guests will check into their cabins and relax.
		Afternoon: Guests will have lunch at the restaurant on the cruise, enjoying the picturesque scenery of Ha Long Bay and famous landmarks such as the Fighting Rooster, Dog Stone, and Hon Gai...
		16:00: After the tour, guests return to the cruise for relaxation, take a swim, or join a kayaking activity.
		Evening: Guests will have dinner at the restaurant. After dinner, they can relax, enjoy drinks at the bar, or try squid fishing as entertainment.'),
(11, 2, 'DAY 02: HA LONG BAY - VISIT TITOP ISLAND - RETURN TO HANOI (BREAKFAST, LUNCH).
		Morning: Guests wake up early, enjoy the sunrise over the sea, have breakfast at the restaurant on the cruise, and relax.
		08:00: The guide leads guests on an excursion to visit and explore Titop Island, where guests can swim, enjoy the beach, or climb the mountain.
		11:00: Guests check out of their cabins and prepare their personal belongings. The cruise docks, and a bus will take guests back to a restaurant.
		Afternoon: Guests will have lunch and relax at a restaurant on the mainland. After lunch, the bus and guide from Tour Pro will take guests back to the departure point.
16:30: The bus will take guests back to Hanoi or their desired location. End of the 2-day 1-night Ha Long Bay cruise tour. The guide bids farewell and hopes to meet again!'),

(12, 1, 'Day 1: 8:00-8:30: The guide and driver will pick up guests at their hotel in the Old Quarter. The pickup time depends on the location of the hotel.
		8:45: The group visits Tran Quoc Pagoda, the oldest pagoda in Hanoi, built in the 6th century. Here, guests can see one of the largest Bodhi trees in Vietnam.
		9:30: The group will visit the Ho Chi Minh Mausoleum complex. Guests will have the chance to view the embalmed body of President Ho Chi Minh, visit the Presidential Palace, and see where he lived and worked from 1954 to 1969. Then, the group will visit One Pillar Pagoda, built in 1048 under King Ly Thai Tong.
		11:15: The group will visit the Vietnam Museum of Ethnology, which houses many artifacts related to clothing, culture, history, and customs of the 54 ethnic groups in Vietnam. This is an important cultural and ethnological point of interest.
		Note: The group will visit the Vietnam Womens Museum instead of the Ethnology Museum if it is closed on Mondays.
		12:30: The group will have lunch at a restaurant in the Old Quarter with a special menu (menu included).
		13:45: The group continues to visit the Temple of Literature, dedicated to Confucius. This is considered the first university of Vietnam from the 11th to the 18th centuries.
		15:30: The group will visit Hoa Lo Prison, built by the French in 1886, famous for housing many of Vietnams revolutionaries during the Indochina War and American pilots during the Vietnam War.
		16:00-16:30: End of the program. The bus will take guests back to their hotels.'),

(12, 2, 'Day 2: Morning: Guests wake up early, enjoy the sunrise over the sea, have breakfast at the restaurant on the cruise, and relax.
		08:00: The guide leads guests on an excursion to visit and explore Titop Island. Guests can swim, enjoy the beach, or climb the mountain.
		11:00: Guests check out of their cabins and prepare their personal belongings. The cruise docks, and a bus will take guests back to a restaurant.
		Afternoon: Guests will have lunch and relax at a restaurant on the mainland. After lunch, the bus and guide from Tour Pro will take guests back to the departure point.
		16:30: The bus will take guests back to Hanoi or their desired location. End of the 2-day 1-night Ha Long Bay cruise tour. The guide bids farewell and hopes to meet again!'),

(13, 1, 'Day 1: 8:00-8:30: The guide and driver will pick up guests at their hotel in the Old Quarter. The pickup time depends on the location of the hotel.
		8:45: The group visits Tran Quoc Pagoda, the oldest pagoda in Hanoi, built in the 6th century. Here, guests can see one of the largest Bodhi trees in Vietnam.
9:30: The group will visit the Ho Chi Minh Mausoleum complex. Guests will have the chance to view the embalmed body of President Ho Chi Minh, visit the Presidential Palace, and see where he lived and worked from 1954 to 1969. Then, the group will visit One Pillar Pagoda, built in 1048 under King Ly Thai Tong.
		11:15: The group will visit the Vietnam Museum of Ethnology, which houses many artifacts related to clothing, culture, history, and customs of the 54 ethnic groups in Vietnam. This is an important cultural and ethnological point of interest.
		Note: The group will visit the Vietnam Womens Museum instead of the Ethnology Museum if it is closed on Mondays.
		12:30: The group will have lunch at a restaurant in the Old Quarter with a special menu (menu included).
		13:45: The group continues to visit the Temple of Literature, dedicated to Confucius. This is considered the first university of Vietnam from the 11th to the 18th centuries.
		15:30: The group will visit Hoa Lo Prison, built by the French in 1886, famous for housing many of Vietnams revolutionaries during the Indochina War and American pilots during the Vietnam War.
		16:00-16:30: End of the program. The bus will take guests back to their hotels.'),

(13, 2, 'Day 2: Morning: Guests wake up early, enjoy the sunrise over the sea, have breakfast at the restaurant on the cruise, and relax.
		08:00: The guide leads guests on an excursion to visit and explore Titop Island. Guests can swim, enjoy the beach, or climb the mountain.
		11:00: Guests check out of their cabins and prepare their personal belongings. The cruise docks, and a bus will take guests back to a restaurant.
		Afternoon: Guests will have lunch and relax at a restaurant on the mainland. After lunch, the bus and guide from Tour Pro will take guests back to the departure point.
		16:30: The bus will take guests back to Hanoi or their desired location. End of the 2-day 1-night Ha Long Bay cruise tour. The guide bids farewell and hopes to meet again!'),


(14, 1, 'DAY 1: FROM HANOI - DANANG TOUR - SON TRA PENINSULA (LUNCH, DINNER).
		07:30: The car will pick you up at the meeting point in Hanoi to head to Noi Bai airport. You will take flight VJ517 at 10:25.
		11:30: Upon arrival in Danang, the car will pick you up and take you to lunch at a restaurant. Afterward, the group will head to the hotel to check in and rest. 
		Afternoon: Free time to walk around and swim at My Khe beach.
		17:00: The car will take you on a tour of Son Tra Peninsula, with beautiful and majestic temples, where you will offer incense and pray at Linh Ung Pagoda.
		19:00: Dinner at the restaurant, then you are free to stroll and admire My Khe beach at night, staying overnight at the hotel.'),

(14, 2, 'DAY 2: DANANG - HOI AN ANCIENT TOWN - QUANG NAM (BREAKFAST, LUNCH, DINNER).
		Morning: Free time for a walk, swim, and breakfast at the hotel.
08:00: The car will pick you up and take you to Hoi An Ancient Town. You will visit the beautiful town with its peaceful streets, walk along the old streets with ancient architecture, and visit historical sites such as Japanese Bridge, Tan Ky Old House, and Hoi An Museum.
		12:30: Lunch at a restaurant in Hoi An. 
		Afternoon: The group will head to Quang Nam to visit the traditional handicraft villages such as Thanh Ha Pottery Village and Tra Que Vegetable Village. 
		16:30: Return to Danang.
		19:00: Dinner at the restaurant, followed by a free evening to relax and stroll along the beach, staying overnight at the hotel.'),

(14, 3, 'DAY 3: DANANG - BA NA HILLS (BREAKFAST, LUNCH, DINNER).
		07:30: Breakfast at the hotel.
		08:30: The car will pick you up and take you to Ba Na Hills, located in Da Nang city, famous for its cool climate and beautiful natural landscapes. The highlight of the trip is the Golden Bridge, a famous bridge held up by giant hands, offering breathtaking views of the mountains and clouds. 
		12:00: Lunch at a restaurant in Ba Na Hills. Afterward, visit the Linh Ung Pagoda and take part in the cable car ride, enjoying the stunning views.
		16:00: Return to the hotel for relaxation.
		19:00: Dinner at the restaurant, free time to walk around or enjoy the night at the beach. Overnight at the hotel.'),

(14, 4, 'DAY 4: DANANG - HANOI (BREAKFAST, LUNCH).
		Morning: Breakfast at the hotel and check-out.
		08:00: The car will pick you up and take you to visit Marble Mountains, a group of five marble and limestone hills with caves and pagodas.
		12:00: Lunch at the restaurant.
		14:00: Afterward, you will be taken to Da Nang International Airport for your flight back to Hanoi (flight VJ518).'),

(15, 1, 'DAY 1: FROM HANOI - DANANG TOUR - SON TRA PENINSULA (LUNCH, DINNER).
		07:30: The car will pick you up at the meeting point in Hanoi and depart for Noi Bai airport. You will take flight VJ517 at 10:25.
		11:30: Upon arrival in Danang, the car will take you to lunch at a restaurant. Afterward, the group will check in at the hotel and rest.
		Afternoon: Free time for sightseeing and swimming at My Khe beach.
		17:00: The car will take the group to visit Son Tra Peninsula, with beautiful and majestic temples, offering incense and praying at Linh Ung Pagoda.
		19:00: Dinner at the restaurant, then free time to stroll and admire My Khe beach at night, overnight at the hotel.'),

(15, 2, 'DAY 2: DANANG - HOI AN ANCIENT TOWN - QUANG NAM (BREAKFAST, LUNCH, DINNER).
		Morning: Free time for sightseeing, swimming, and breakfast at the hotel.
		08:00: The car will pick you up and head to visit the Non Nuoc - Marble Mountains. You will climb the mountain to visit Huyen Khong Cave, Tam Thai Pagoda, Linh Ung Pagoda, and continue to visit the Non Nuoc Stone Carving Village.
The journey continues as the car and guide take you to visit Hoi An Ancient Town - recognized by UNESCO as a World Cultural Heritage site in November 1999, visiting Phuoc Kien Assembly Hall (or Quang Dong Assembly Hall), Japanese Bridge, Tan Ky Old House (or Phung Hung Old House).
		12:00: Lunch at a restaurant, enjoy local specialties. (Optional: If you choose to visit Cu Lao Cham, the afternoon will include a boat ride to Cu Lao Cham island, where you can swim and have lunch. The boat will return to the mainland, and you will return to Danang (Cu Lao Cham option adds 580,000 VND).
		Afternoon: Free time to relax at the hotel, stroll around Danang, swim at My Khe beach.
		Evening: The car will take you to dinner at the restaurant. Overnight in Danang (hotel located on My Khe Beach).'),

(15, 3, 'DAY 3: DANANG - BA NA HILLS TOUR - SWIM AT MY KHE BEACH (BREAKFAST, LUNCH).
		Morning: Free time to wake up early, watch the sunrise on the beach, and swim. Then have breakfast at the hotel.
		07:30: The car will take you to visit Ba Na Hills, where you will ride the longest cable car in Vietnam to the top at 1487m above sea level.
		At Ba Na Hills, you can experience all four seasons (Spring, Summer, Autumn, Winter) in one day. On the cable car, you can enjoy views of Vong Nguyet Hill, Linh Ung Pagoda, Thich Ca Buddha Statue, French horse stalls, the meditation garden, and the Rong House peak. Enjoy the Fantasy Park with many exciting games (Cable car ticket to Ba Na Hills not included).
		12:00: Free time for lunch (at your own expense at Ba Na).
		15:30: Depart from Ba Na Hills and return to Danang.
		Evening: Dinner at the restaurant, free time to walk around, overnight in Danang (hotel located on My Khe Beach).'),

(15, 4, 'DAY 4: DANANG - SHOPPING, RELAXING - DEPART FOR HANOI (BREAKFAST).
		Morning: Breakfast at the hotel, free time for swimming and shopping for local souvenirs to bring back to family and friends.
		10:00: Check-out and the car will take you to Da Nang airport. You will take flight VJ516 at 13:05 back to Noi Bai Airport.
		14:05: The car will pick you up at Noi Bai International Airport and return to Hanoi, ending the tour. The guide will say goodbye and thank you for joining the trip!'),

(16, 1, 'DAY 1: FROM HANOI - DANANG TOUR - SON TRA PENINSULA (LUNCH, DINNER).
		07:30: The car will pick you up at the meeting point in Hanoi and depart for Noi Bai airport. You will take flight VJ517 at 10:25.
		11:30: Upon arrival in Danang, the car will take you to lunch at a restaurant. Afterward, the group will check in at the hotel and rest.
		Afternoon: Free time for sightseeing and swimming at My Khe beach.
		17:00: The car will take the group to visit Son Tra Peninsula, with beautiful and majestic temples, offering incense and praying at Linh Ung Pagoda.
		19:00: Dinner at the restaurant, then free time to stroll and admire My Khe beach at night, overnight at the hotel.'),
(16, 2, 'DAY 2: DANANG - HOI AN ANCIENT TOWN - QUANG NAM (BREAKFAST, LUNCH, DINNER).
		Morning: Free time for sightseeing, swimming, and breakfast at the hotel.
		08:00: The car will pick you up and head to visit the Non Nuoc - Marble Mountains. You will climb the mountain to visit Huyen Khong Cave, Tam Thai Pagoda, Linh Ung Pagoda, and continue to visit the Non Nuoc Stone Carving Village.
		The journey continues as the car and guide take you to visit Hoi An Ancient Town - recognized by UNESCO as a World Cultural Heritage site in November 1999, visiting Phuoc Kien Assembly Hall (or Quang Dong Assembly Hall), Japanese Bridge, Tan Ky Old House (or Phung Hung Old House).
		12:00: Lunch at a restaurant, enjoy local specialties. (Optional: If you choose to visit Cu Lao Cham, the afternoon will include a boat ride to Cu Lao Cham island, where you can swim and have lunch. The boat will return to the mainland, and you will return to Danang (Cu Lao Cham option adds 580,000 VND).
		Afternoon: Free time to relax at the hotel, stroll around Danang, swim at My Khe beach.
		Evening: The car will take you to dinner at the restaurant. Overnight in Danang (hotel located on My Khe Beach).'),

(16, 3, 'DAY 3: DANANG - BA NA HILLS TOUR - SWIM AT MY KHE BEACH (BREAKFAST, LUNCH).
		Morning: Free time to wake up early, watch the sunrise on the beach, and swim. Then have breakfast at the hotel.
		07:30: The car will take you to visit Ba Na Hills, where you will ride the longest cable car in Vietnam to the top at 1487m above sea level.
		At Ba Na Hills, you can experience all four seasons (Spring, Summer, Autumn, Winter) in one day. On the cable car, you can enjoy views of Vong Nguyet Hill, Linh Ung Pagoda, Thich Ca Buddha Statue, French horse stalls, the meditation garden, and the Rong House peak. Enjoy the Fantasy Park with many exciting games (Cable car ticket to Ba Na Hills not included).
		12:00: Free time for lunch (at your own expense at Ba Na).
		15:30: Depart from Ba Na Hills and return to Danang.
		Evening: Dinner at the restaurant, free time to walk around, overnight in Danang (hotel located on My Khe Beach).'),

(16, 4, 'DAY 4: DANANG - SHOPPING, RELAXING - DEPART FOR HANOI (BREAKFAST).
		Morning: Breakfast at the hotel, free time for swimming and shopping for local souvenirs to bring back to family and friends.
		10:00: Check-out and the car will take you to Da Nang airport. You will take flight VJ516 at 13:05 back to Noi Bai Airport.
		14:05: The car will pick you up at Noi Bai International Airport and return to Hanoi, ending the tour. The guide will say goodbye and thank you for joining the trip!'),
        
(17, 1, 'Day 1: From Hanoi - Hue Tourism - Thua Thien Hue (Meals: B, L, D). 
		Morning: Depart from the meeting point, Tour Po picks up guests for the flight to Phu Bai Airport, Thua Thien Hue. 
		Flight VN1543 departs at 07:45 from Noi Bai International Airport.
09:00: Arrival in Hue City. The guide will take guests to visit the Imperial City of Hue, which is associated with the history of 13 emperors of the Nguyen Dynasty, the last feudal dynasty of Vietnam. Visit significant areas: Ngo Mon Gate, Thai Hoa Palace, Forbidden Purple City, The Mieu, Hien Lam Cac, Nine Dynastic Urns...
		11:30: Guests enjoy a lunch with many Hue specialties. Afterward, check in at the hotel and rest in Hue City.
		Afternoon: Rest and relax, visit the local market, or enjoy swimming at Thuan An Beach in Hue.
		18:00: Dinner at a local restaurant. After dinner, the guide will take guests to the Huong River pier for a boat ride and enjoy traditional Hue singing.
		22:00: Rest at the hotel in Hue City.'),

(17, 2, 'Day 2: Khai Dinh Tomb - Minh Mang Tomb - Lang Co Beach (Meals: B, L, D).
		Morning: Guests enjoy breakfast at the hotel, then visit Khai Dinh Tomb, a famous architectural site that combines Eastern and Western styles. Continue to visit Minh Mang Tomb, the resting place of Emperor Minh Mang, known for his contributions to the Nguyen Dynasty.
		Lunch: Enjoy Hue specialties at a local restaurant.
		Afternoon: Tour to Lang Co Beach, known for its scenic beauty and crystal-clear waters. Guests can relax and swim at the beach.
		Evening: Dinner at the restaurant in Lang Co. After dinner, return to Hue City and enjoy free time to explore the local area on a cyclo or relax.'),

(17, 3, 'Day 3: Hue - Thien Mu Pagoda - Phu Bai - Departure to Hanoi (Meals: B, L).
		Morning: Breakfast at the hotel, followed by a visit to the Thien Mu Pagoda, one of the oldest pagodas located by the Huong River. Guests have free time for shopping and buying Hue specialties.
		10:00: Check-out from the hotel and head to a local restaurant for lunch.
		11:15: Transfer to Phu Bai Airport for the flight VJ569 back to Hanoi, departing at 12:50.
		15:00: Arrive in Hanoi, transfer to the designated location, and end the Hue tour.'),

(18, 1, 'Day 1: From Hanoi - FLC Resort Ly Son - Thanh Hoa (Meals: B, L, D).
		07:30: Pickup from the meeting point, Tour Pro takes guests to FLC Sam Son Resort in Thanh Hoa.
		08:30: Rest stop in Ha Nam for a break and breakfast (self-paid), then continue to FLC Sam Son.
		Lunch: Arrive at Sam Son Beach, enjoy lunch with local seafood specialties, and check-in at the hotel.
		Afternoon: Free time for relaxation, swimming, or team-building activities for groups of 40 people or more. Afterward, enjoy more free time to swim.
		18:30: Dinner at a local restaurant, and then enjoy an evening at Sam Son Beach Resort.'),

(18, 2, 'Day 2: Explore and Relax at FLC Resort Ly Son - Return to Hanoi (Meals: B, L).
		Morning: Buffet breakfast at the resort, followed by free time to relax, swim, or explore Sam Son Beach. Guests can buy local seafood and souvenirs.
		09:00: Visit Trống Mái Island, Cô Tiên Pagoda, and Độc Cước Temple in Sam Son.
		11:30: Check-out from the hotel, followed by lunch at a local restaurant.
13:00: Return to Hanoi with a stop at Ham Rong Bridge and Thanh Liêm (Ha Nam) to buy local specialties like coconut, pineapple, and nem chua.
		17:30: Arrive in Hanoi, and the tour concludes with the guide saying goodbye.'),

(19, 1, 'Day 1: Departure from Hanoi - Nha Trang - Khanh Hoa (Meals: B, L, D).
		05:00: Pickup from the meeting point, and tour guide takes guests to Noi Bai International Airport for flight VJ471 to Cam Ranh, Khanh Hoa.
		09:10: Arrival at Cam Ranh Airport, transfer to Nha Trang City. Visit Ponagar Cham Towers, Long Son Pagoda, and enjoy the famous sights of Nha Trang, including Xom Bong Bridge, Ha Ra Bridge, and Co Tien Mountain.
		11:30: Enjoy lunch at a local restaurant, then check-in at the hotel for rest.
		Afternoon: Free time for relaxation, exploring, or swimming at Nha Trang Beach.
		Evening: Dinner at a local restaurant, followed by an evening walk along Nha Trangs streets, visiting the night market, Phu Dong Park, and seafood areas.
		22:00: Rest at the hotel in Nha Trang.'),

(19, 2, 'Day 2: Nha Trang - Beach and Island Tourism (Meals: B, L, D).
		Morning: Free time for early risers to enjoy the sunrise and swim at the beach. Afterward, enjoy breakfast at the hotel.
		08:00: Transfer to the pier for a boat trip around Nha Trang Bay, where guests can visit small islands, walk on the beach, and enjoy local seafood.
		12:00: Lunch at a restaurant on the island, offering delicious seafood dishes.
		Afternoon: Return to the hotel to rest, explore the city, or enjoy Nha Trang Beach.
		19:00: Dinner at a local restaurant. Afterward, enjoy free time for shopping or visiting the night market.'),

(19, 3, 'Day 3: Nha Trang - Fun at Vinpearl Land (Meals: B, L).
		Morning: Early morning for sunrise and beach activities. Afterward, enjoy breakfast at the hotel.
		Lunch: Enjoy lunch at a local restaurant.
		Afternoon: Visit Vinpearl Land, where guests can experience a cable car ride across Nha Trang Bay, try thrilling games, watch a water music show, visit the aquarium, and enjoy various water park activities.
		Evening: Enjoy dinner at a restaurant (self-paid), and continue to enjoy Vinpearl Land.
		21:30: Return by cable car to Nha Trang. Transfer back to the hotel for overnight rest.'),
        
(20, 1, 'Day 1: Departure from Hanoi - Nha Trang - Khanh Hoa (Meals: B, L, D).
		05:00: Tour Pro staff and guide pick up guests at the meeting point and depart for Noi Bai International Airport. Check-in for flight VJ471 to Cam Ranh International Airport, Khanh Hoa, at 07:10.
		09:10: Arrival at Cam Ranh Airport. Transfer to Nha Trang City. Visit Ponagar Cham Towers, an ancient Cham architecture, and enjoy famous sights like Xom Bong Bridge, Ha Ra Bridge, and Co Tien Mountain. Continue with a visit to Long Son Pagoda.
		11:30: Lunch at a local restaurant, followed by hotel check-in and rest.
		Afternoon: Free time for rest, strolling, or swimming at Nha Trang Beach.
Evening: Dinner at a local restaurant, enjoying the local specialties. After dinner, free time to explore Nha Trang at night, visit the night market, Phu Dong Park, Four Seasons Coffee, or Thap Ba seafood area.
		22:00: Overnight at a hotel in Nha Trang.'),

(20, 2, 'Day 2: Nha Trang City - Nha Trang Island Beach Tour (Meals: B, L, D).
		Morning: Free time to enjoy the sunrise, stroll, or swim at the beach, followed by breakfast at the hotel.
		08:00: Transfer to the port for a boat trip around Nha Trang Bay. Guests can enjoy the scenery, visit small islands, walk on the beach, and taste local island dishes.
		12:00: Lunch at a restaurant on the island, serving local dishes.
		Afternoon: End of the island exploration tour. Return to the hotel for rest or stroll around Nha Trang City.
		19:00: Dinner at a local restaurant, followed by free time for shopping at the night market.'),

(20, 3, 'Day 3: Nha Trang - Fun at Vinpearl Land (Meals: B, L).
		Morning: Enjoy the sunrise and swim at Nha Trang Beach. Afterward, breakfast at the hotel.
		Lunch: Lunch at a local restaurant. Afterward, transfer to Vinpearl Land.
		Afternoon: Explore Vinpearl Land. Experience the 3km sea cable car, which takes guests across Nha Trang Bay, one of the 29 most beautiful bays in the world. Enjoy thrilling rides, water music shows (19:00), the aquarium, 3D cinema, dolphin show, water slides, and more.
		Evening: Dinner at a restaurant (self-paid). Continue enjoying Vinpearl Land.
		21:30: Take the cable car back to Nha Trang. Transfer back to the hotel for an overnight stay in Nha Trang.'),

(21, 1, 'Day 1: Departure from Hanoi - Nha Trang - Khanh Hoa (Meals: B, L, D).
		05:00: Tour Pro staff and guide pick up guests at the meeting point and depart for Noi Bai International Airport. Check-in for flight VJ471 to Cam Ranh International Airport, Khanh Hoa, at 07:10.
		09:10: Arrival at Cam Ranh Airport. Transfer to Nha Trang City. Visit Ponagar Cham Towers, an ancient Cham architecture, and enjoy famous sights like Xom Bong Bridge, Ha Ra Bridge, and Co Tien Mountain. Continue with a visit to Long Son Pagoda.
		11:30: Lunch at a local restaurant, followed by hotel check-in and rest.
		Afternoon: Free time for rest, strolling, or swimming at Nha Trang Beach.
		Evening: Dinner at a local restaurant, enjoying the local specialties. After dinner, free time to explore Nha Trang at night, visit the night market, Phu Dong Park, Four Seasons Coffee, or Thap Ba seafood area.
		22:00: Overnight at a hotel in Nha Trang.'),

(21, 2, 'Day 2: Nha Trang City - Nha Trang Island Beach Tour (Meals: B, L, D).
		Morning: Free time to enjoy the sunrise, stroll, or swim at the beach, followed by breakfast at the hotel.
		08:00: Transfer to the port for a boat trip around Nha Trang Bay. Guests can enjoy the scenery, visit small islands, walk on the beach, and taste local island dishes.
		12:00: Lunch at a restaurant on the island, serving local dishes.
Afternoon: End of the island exploration tour. Return to the hotel for rest or stroll around Nha Trang City.
		19:00: Dinner at a local restaurant, followed by free time for shopping at the night market.'),

(21, 3, 'Day 3: Nha Trang - Fun at Vinpearl Land (Meals: B, L).
		Morning: Enjoy the sunrise and swim at Nha Trang Beach. Afterward, breakfast at the hotel.
		Lunch: Lunch at a local restaurant. Afterward, transfer to Vinpearl Land.
		Afternoon: Explore Vinpearl Land. Experience the 3km sea cable car, which takes guests across Nha Trang Bay, one of the 29 most beautiful bays in the world. Enjoy thrilling rides, water music shows (19:00), the aquarium, 3D cinema, dolphin show, water slides, and more.
		Evening: Dinner at a restaurant (self-paid). Continue enjoying Vinpearl Land.
		21:30: Take the cable car back to Nha Trang. Transfer back to the hotel for an overnight stay in Nha Trang.'),


(22, 1, 'DAY 1: DEPARTURE FROM HANOI - TOUR TO BINH LIEU - DONG VAN (MEALS: LUNCH, DINNER).
		07:00: The bus and Tour Pro tour guide pick up guests at the designated meeting point in Hanoi or as requested, and begin the journey to Binh Lieu, Quang Ninh.
		08:00: The bus stops at a rest stop on the highway in Hai Duong; guests can rest and have breakfast at the restaurant (self-pay).
		11:00: Guests have lunch at a restaurant and enjoy seafood dishes with the flavor of Ha Long Bay.
		13:30: After lunch, the bus continues the journey to Dong Van - Binh Lieu. Along the way, guests will admire the green tea hills, the towering mountain roads.
		Afternoon: Upon arrival in Binh Lieu, the guide will take guests to conquer milestone 1327 - Thanh Long Mountain, an excellent viewpoint that overlooks a large area near the Vietnam-China border. The journey continues to the Hoanh Mo border gate for sightseeing and photo opportunities.
		Evening: The bus and guide take guests to the hotel for check-in, rest, and dinner at the restaurant. After dinner, guests can freely explore the peaceful town of Binh Lieu at night.'),

(22, 2, 'DAY 2: NA NHAI VILLAGE - MILESTONE 1300 "MATCHA HILL" - RETURN TO HANOI (MEALS: BREAKFAST, LUNCH, DINNER).
		Morning: Guests are free to wake up early, take a walk, and enjoy the sunrise in Binh Lieu. Then have breakfast at the hotel.
		08:00: The bus and guide will take guests to visit Na Nhai Village (Cao Thang Village), home to the Dao Thanh Y ethnic group, where guests can explore and learn about the unique cultural traits of the area.
		The journey continues as the guide takes guests to conquer milestone 1300, which marks the border between Binh Lieu, Lang Son, and China. This location is known for its breathtaking views, similar to “Matcha Hill.”
		11:30: Guests check out from the hotel and have lunch at a restaurant to enjoy the flavors of Binh Lieu.
12:30: After lunch, guests board the bus to return to Hanoi. On the way back, the group stops at the Binh Lieu market, where guests can buy local agricultural products and medicinal herbs as souvenirs for family and friends.
		17:30: The group arrives at the pick-up point in Hanoi, or as requested. The Tour Pro guide bids farewell and thanks the guests for their participation.'),

(23, 1, 'DAY 1: DEPARTURE FROM HANOI - TOUR TO QUANG NGAI - HOANG HAU BEACH (MEALS: LUNCH, DINNER).
		04:40: The bus and guide pick up the group at the meeting point to head to Noi Bai airport for the VJ433 flight at 06:35, departing for Quy Nhon.
		08:30: The group arrives at Phu Cat airport in Quy Nhon, Binh Dinh. The bus and guide will take the group to visit famous landmarks in Quy Nhon, such as Ghien Rang Tien Sa, Thi Nhan Hill, Hoang Hau Beach, and the memorial to the poet Han Mac Tu.
		11:30: After sightseeing, the group returns to the restaurant for lunch and to taste the delicious Quy Nhon cuisine. After lunch, the guide will take the group to the hotel for check-in and rest.
		15:00: Guests are free to walk around, swim at the beach, or explore Quy Nhon. In the late afternoon, the guide will take guests to visit the historical site of the Twin Towers (Thap Doi), a typical Cham architecture.
		18:30: Dinner at a restaurant, after which guests can freely explore the coastal city of Quy Nhon. Overnight at the hotel in Quy Nhon.'),

(23, 2, 'DAY 2: FROM QUANG NGAI - "VISIT THE LAND OF THE TAY SON HEROES" (MEALS: BREAKFAST, LUNCH, DINNER).
		Morning: Guests are free to wake up early, enjoy the beach, and take a morning swim. Afterward, they have breakfast at the hotel.
		08:00: The bus and guide will take guests to visit Tay Son, Binh Dinh, a famous landmark associated with the history of the Tay Son Dynasty.
		Guests will visit the Quang Trung Museum, Tay Son Tam Kiet Temple, and learn about the life and career of the Tay Son brothers – Nguyen Nhac, Nguyen Hue, and Nguyen Lu. Guests will also enjoy traditional martial arts performances and drum battles.
		11:30: Lunch at a local restaurant, and after lunch, the bus takes guests back to the hotel in Quy Nhon for rest.
		Afternoon: Free time to swim at the beach, relax, or explore Quy Nhon.
		Evening: Dinner at the restaurant, followed by a relaxing night at the hotel in Quy Nhon.'),

(24, 1, 'DAY 1: HANOI - SAIGON - MY THO - TIEN GIANG - BEN TRE - TOUR TO CAN THO (MEALS: BREAKFAST, LUNCH, DINNER).
		03:30: The bus and guide pick up the group at the meeting point to head to Noi Bai airport for the VJ143 flight to Ho Chi Minh City at 06:00.
		08:00: Upon arrival at Tan Son Nhat airport, the bus and guide will take the group to My Tho - Tien Giang. The bus will take the group to the 3/2 pier, where guests board the boat to enjoy a scenic tour of the four islands: Long, Lan, Qui, Phung, and visit the fish port and fishing village along the river.
Upon arrival at Thoi Son Island, guests can stroll through the village, visit fruit orchards, enjoy seasonal fruits, and listen to southern traditional music. The group will also visit the beekeeping farm, enjoy honey tea, and taste banana wine.
		Guests will take small boats to explore the coconut groves along the river, experiencing the local life. Continuing down the Tien River, guests will visit Tan Thach (Ben Tre), where they can explore a coconut candy workshop and local handicraft villages. Lunch is served at a restaurant.
		Afternoon: After lunch, the group returns to the mainland and heads to Can Tho. Upon arrival in Can Tho, guests check in at the hotel and relax.
		Evening: Dinner on a boat, enjoying the view of the Mekong River, followed by free time to explore Ninh Kieu Pier and the city of Can Tho at night.'),

(24, 2, 'DAY 2: TOUR TO CAN THO - NINH KIEU PIERC - CHAU DOC - AN GIANG (MEALS: BREAKFAST, LUNCH, DINNER).
		Morning: Guests have breakfast at the hotel and then board the boat to visit the Cai Rang Floating Market – one of the three largest floating markets in the Mekong Delta. This market is known for selling tropical fruits and regional specialties.
		After visiting the market, the bus will take the group to visit Binh Thuy Ancient House, a French architectural style house built in 1870, featuring antiques.
		11:30: Lunch at a restaurant, and after lunch, the bus will take the group to Chau Doc, An Giang.
		Afternoon: Upon arrival, guests will visit: Ba Chua Xu Temple, Phat Thay Tay An Pagoda (Tay An Ancient Temple), and the Thoai Ngoc Hau Tomb – a historical figure from the Nguyen Dynasty. The group will also visit the Châu Đốc Market, known for its various types of fermented fish (such as mắm thái, mắm cá trèn).
		18:30: Dinner at a local restaurant with traditional Southern dishes, followed by free time to explore Chau Doc city at night. Overnight at the hotel in Chau Doc.'),

(24, 3, 'DAY 3: TRA SU TRAUM FOREST - RETURN TO HO CHI MINH CITY (MEALS: BREAKFAST, LUNCH, DINNER).
		Morning: Guests have breakfast at the hotel, check out, and head to Tra Su Trau Forest. Upon arrival, guests take small boats to explore the forest and observe the natural birdlife.
		Afterward, guests board a boat to explore the bird sanctuary and climb to the observation tower to enjoy the panoramic view of the forest and watch the numerous birds.
		11:30: Lunch at the eco-tourism site in Tra Su. After lunch, the bus takes the group back to Ho Chi Minh City.
		Afternoon: Upon arrival in Ho Chi Minh City, guests check into the hotel and relax.
		Evening: Dinner at a local restaurant. Overnight at the hotel in Ho Chi Minh City.'),

(25, 1, 'DAY 1: DEPARTURE FROM HANOI - FLC LY SON RESORT - THANH HOA (MEALS: BREAKFAST, LUNCH, DINNER).
		07:30: The bus and guide from Tour.Pro.Vn pick up the group from the designated meeting point and head to FLC Sam Son Resort, Thanh Hoa.
08:30: The bus stops at Ha Nam, where guests have free time to rest and have breakfast (self-pay).
		12:30: Guests arrive at FLC Sam Son Resort, check in, and have lunch at the resort restaurant. Afterward, guests have free time to relax or explore the resort, swim, or enjoy the beach.
		Evening: Dinner at the resort restaurant, and guests have free time to explore Sam Son.'),

(25, 2, 'DAY 2: SAM SON BEACH - PHO CUA O - FLC LY SON RESORT (MEALS: BREAKFAST, LUNCH, DINNER).
		Morning: Guests enjoy breakfast at the hotel before heading to Sam Son Beach to swim or relax on the beach.
		10:30: The group heads to Pho Cua O, where they explore the famous seafood market and enjoy the best of local specialties, such as crab, squid, and shrimp.
		Afternoon: After lunch, the group returns to the FLC Ly Son Resort for rest, leisure, or swimming. In the evening, guests enjoy a traditional seafood dinner and relaxation.
		Evening: Overnight stay at FLC Ly Son Resort.');
        
        
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
(1, 1, 'assets/images/TamDao.jpg', 'The stunning mountain scenery in Tam Dao'),
(2, 2, 'assets/images/BacGiang.jpg', 'Experience the culture of Tay Yen Tu Pagoda and Bac Giang’s nature'),
(3, 3, 'assets/images/DaLat1.jpg', 'The poetic flower garden and stunning scenery in Da Lat'),
(4, 4, 'assets/images/DaLat2.jpg', 'The dreamy city of Da Lat with Xuan Huong Lake'),
(5, 5, 'assets/images/ĐaNang.jpg', 'The dazzling Dragon Bridge in Da Nang'),
(6, 6, 'assets/images/DaNang1.jpg', 'The majestic Golden Bridge in Da Nang'),
(7, 7, 'assets/images/EoGio_QuyNhon.jpg', 'Explore the pristine Eo Gio – Quy Nhon'),
(8, 8, 'assets/images/Fansipan1.jpg', 'Fansipan Peak – The Roof of Indochina'),
(9, 9, 'assets/images/HaiPhong.jpg', 'Hai Phong – The vibrant port city'),
(10, 10, 'assets/images/halong.jpg', 'Ha Long Bay – A UNESCO World Natural Heritage'),
(11, 11, 'assets/images/halong1.jpg', 'Discover the fascinating caves in Ha Long'),
(12, 12, 'assets/images/Hanoi.jpg', 'Hoan Kiem Lake, one of the most famous landmarks and symbols of Hanoi, Vietnam'),
(13, 13, 'assets/images/HaNoi2.jpg', 'The Old Quarter of Hanoi – A beauty of traditional culture'),
(14, 14, 'assets/images/HoiAn.jpg', 'Hoi An Ancient Town illuminated with lanterns'),
(15, 15, 'assets/images/HoiAn1.jpg', 'Explore the ancient beauty and unique culture of Hoi An'),
(16, 16, 'assets/images/HoiAn2.jpg', 'Visit the Japanese Bridge in Hoi An'),
(17, 17, 'assets/images/Hue.jpg', 'The ancient capital Hue with its serene beauty'),
(18, 18, 'assets/images/LySon.jpg', 'Ly Son Island – A paradise in the sea'),
(19, 19, 'assets/images/nhatrang.jpg', 'Nha Trang – The vibrant coastal city'),
(20, 20, 'assets/images/NhaTrang2.jpg', 'Nha Trang Park with a lively and stunning sunset view'),
(21, 21, 'assets/images/NhaTrang1.jpg', 'The peaceful and beautiful seaside in Nha Trang'),
(22, 22, 'assets/images/QuangBinh.jpg', 'Quang Binh – The kingdom of bridges and poetic lakes'),
(23, 23, 'assets/images/QuangNgai.jpg', 'Experience the unique cultural lifestyle in Quang Ngai'),
(24, 24, 'assets/images/SaiGon.jpg', 'Saigon – The city that never sleeps'),
(25, 25, 'assets/images/SaPa.jpg', 'Sa Pa – The misty town with terraced fields');

-- Bảng User
DROP TABLE IF EXISTS `User`;

CREATE TABLE User (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(15),
    address VARCHAR(255),
    role INT(11) DEFAULT 1, 
    forgot_token VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO `User` (`name`, `email`, `password`, `phone`, `address`, `role`, `created_at`)
VALUES ('Admin', 'admin@example.com', MD5('adminpassword'), '0123456789', '123 Admin Street', 2, NOW());

        -- Bảng review
DROP TABLE IF EXISTS `review`;
CREATE TABLE Review (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    tour_id INT,
    rating INT,       -- Đánh giá sao (1-5)
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES User(user_id),
    FOREIGN KEY (tour_id) REFERENCES Tour(tour_id)
);

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE Invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(255) NOT NULL,
    tour_name VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    payment_date DATE NOT NULL
);

-- Bảng Booking
DROP TABLE IF EXISTS `booking`;
CREATE TABLE Booking (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    tour_id INT NOT NULL, 
    user_id INT NOT NULL,
    num_people INT NOT NULL,	
	Special requirements varchar(100),
    FOREIGN KEY (tour_id) REFERENCES Tour(tour_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE 
);
-- Bảng Payment
DROP TABLE IF EXISTS `payment`;
CREATE TABLE Payment (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
	user_id INT NOT NULL,
    booking_id INT NOT NULL,
    payment_method varchar(50) NULL,
    FOREIGN KEY (booking_id) REFERENCES Booking(booking_id) ON DELETE CASCADE,
	FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE
);

-- 1. Tạo bảng blogs

CREATE TABLE Blogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    excerpt TEXT NOT NULL,
    content TEXT NOT NULL,
    author VARCHAR(100) NOT NULL,
    category VARCHAR(100) NOT NULL,
    post_date DATE
);

CREATE TABLE Blog_image (
    id INT AUTO_INCREMENT PRIMARY KEY,
    blog_id INT NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    FOREIGN KEY (blog_id) REFERENCES Blogs(id) ON DELETE CASCADE
);


--  Thêm dữ liệu vào bảng 'blog' 
INSERT INTO Blogs (id,title,excerpt, content, author, category, post_date)
VALUES
     (1,'14 tips for traveling on a budget', 'Ever wondered how to travel for cheap? If so, here is good news: There are lots of ways to economize while still checking destinations off your travel bucket list.Whether you’re thinking about ...', '1. Plan early to optimize your travel budget
It can be a good idea to start planning your travel at least 10 months in advance—that includes starting to track the price of flights. There are a number of websites, like Capital One Travel, that allow travelers to set fare alerts and watch for the best time to buy plane tickets. 

        Another important planning step is to assemble any documentation you will need. You may want to get a passport well in advance, if you dont already have one—or renew yours if it is close to expiring. If you have to rush the process, the fees can rack up quickly. And if you need travel visas, you’ll probably want to make sure those are in order, too.

        If you think you will need travel insurance, it can help to set that up in advance, too. You could also keep an eye on travel advisories from the U.S. Department of State.

        2. Travel when others are not 
        This can apply to both seasons and days of the week. Once you know where you want to go, you can figure out when your destination is shoulder season is—that is the period when there may be fewer visitors. During that time, you may be able to take advantage of cheap travel deals, save money on flights and hotels, and have a less-crowded experience. For example, if you want to go to Greece, try traveling in May or October instead of the peak summer months.

        Also, check out your options around your desired travel dates. If you are planning spring break and all of the Saturday-to-Saturday flights are expensive, maybe look at Friday-to-Friday flights instead. Flying on major holidays instead of the day before can work well, too.

        A photo of a person in Rome, saving money by traveling off-season during a cold-weather month.
        3. Consider an extra stop to reduce flight costs
        When you are researching flight options, keep in mind that there may be low-cost carriers that you are not seeing in your search results, simply because they don not fly your entire route. If you are finding that a ticket from Point A to Point B is too expensive, you could grab a map and look for a Point C—possibly a cheaper destination to fly to—and then arrange alternate transportation to your desired destination.

        For example, say you want to fly from California to Venice but the price is high. Instead, you could fly to Budapest and spend two days there, then fly with a low-cost airline from Budapest to Venice. That option could cost less than a ticket directly to Venice. This strategy can also be a way to add another destination to your vacation—and one that you may not have thought about before.

        4. Combine destinations 
Are there several places on your travel wish list? If your vacation time is flexible, you could combine numerous destinations into one trip. That may save overall flight time and money compared to visiting one destination. If you have a destination that you know is not budget-friendly, consider combining the trip with another cheaper destination to visit. This could allow you to check items off your bucket list without breaking the bank. 

        Heading to the Caribbean? Think about visiting several islands. Have you wanted to see London, Stockholm and Rome? Consider seeing all of them on the same trip. Check out low-cost airlines around the world that might be fairly economical for short one-way trips. Or go even farther. You might want to come up with an itinerary that touches 6 or 7 countries on 4 continents in just a few weeks.

        5. Contact hotels directly
        If there is a hotel you want to stay at but its rates are high in your online search, think about calling the hotel directly. Ask what its value dates are or whether there is a time frame when a stay could work with your budget. Hotels can be more flexible with their rates than you might realize, especially during periods of low expected occupancy. 

        A photo of a person checking into a hotel, talking with an agent at the reservation desk.
        6. Stay consistent
        If you generally fly more than a couple of times a year, directing your miles to one airline or travel rewards credit card could pay off nicely. Advantages could include extra rewards, better ticket prices, better flying experiences, shorter lines, preferred boarding and upgrades.

        Staying loyal to one airline could come with other advantages. For example, fees to check your bags could be waived—the same might apply when you check bags that are slightly over the airline is weight limit. It could also mean perks like exclusive access to airport lounges.

        7. Collect and use frequent flier miles
        You may be able to increase the amount of travel you can afford by using frequent flier miles whenever you can. You can sometimes earn frequent flier miles through traveling, like when you buy an airline ticket. You could also earn them by using a travel rewards credit card for your everyday purchases.

        With Capital One travel rewards cards, you can earn unlimited miles on every purchase you make. Some cards, like VentureOne, might even offer bonus miles to new cardholders. You could also earn extra rewards on trips booked through Capital One Travel using eligible cards.

        8. Pay in local currency to avoid fees
        Some credit card companies charge foreign transaction fees when you make a purchase in a foreign currency using their card. Typically, the fee is about 3% of the purchase.
Whether you are charged a foreign transaction fee can depend on your credit card. Some card issuers do not charge those fees—that includes Capital One is U.S.-issued credit cards.

        In addition to bringing a credit card on your trip, you may want to carry both cash and a bank debit card for getting cash at ATMs.

        9. Pack smart and stay organized
        Planning ahead can be an important part of budget travel, like when you are packing. For example, it can prevent you from buying unnecessary items for your trip. It might also help you avoid paying to check a bag on your flight—that’s if you pack economically enough to carry your bag with you onto the plane. 

        As a rule of thumb, bring only what you need. And double check that you have not forgotten any critical items before leaving home.

        10. Use public transportation
        Using public transportation instead of renting a car or paying for taxis can be a great way to save money while traveling. The good news is that cities around the world have transportation networks that make it relatively easy to get around without a car. You may find that studying the train, bus and subway routes for your intended destination before you arrive can be time well spent. 

        A photo of a person relaxing, reading and eating a meal while traveling by train.
        11. Find free attractions along the way
        It is a given that many activities will cost money when you are traveling, especially if you ảre headed to a popular destination. But it is possible to find free or low-cost attractions to work into your budget travel. For example, museums and parks are often free to the public and can reduce overall travel costs. 

        12. Take advantage of special discounts
        If you are a senior or a student, using discounts can make it easier to travel on a budget. For example, these savings may be offered at restaurants, retail stores, grocery stores, movie theaters, museums and other attractions at your destination.

        13. Travel to small towns
        Adventures are not necessarily restricted to big cities. Try traveling to small towns where you may be able to vacation more economically. Small towns can offer cost-effective accommodations, authentic local food, and free or low-cost activities, like parks and historical sites. 

        An added benefit is that smaller, less crowded destinations can mean a more relaxing getaway.

        A photo of a small-town street lined with storefronts under a blue sky.
        14. Try traveling locally
        If you need to travel on a budget, consider seeing local sights rather than planning a trip far from home. Taking day trips in your area can be a rewarding experience that is affordable, too. 

        Or you could take a weeklong staycation with all kinds of options for enjoying your free time—everything from camping in the backyard with the kids to starting to learn a new language. ',
             'Happy_Trips',
             'Reisetipps',
             '2024-11-01'),
(2,'10 of the best places to visit in Vietnam', 'Enjoy Hanoi and Halong Bay — then step beyond the tourist trail to find more magic in the highlands, islands, history and culture of this captivating nation....', ' With 99 million souls and a coastline that wrinkles 2,000 miles along the country from north to south, there are plenty of people to meet and a lot to see, do and eat in Vietnam. I first visited in 2004 and have returned many times since. It is easy to follow the tourist trail of historic Hanoi, ethereal Halong Bay, shopping emporium Hoi An and buzzy Ho Chi Minh City, but push a little further and you will be rewarded with some dazzling and memorable experiences.

        Mine have been when I have gone the extra mile, quite literally: a magical three-day cruise to the outer battlements of Halong Bay; a thrilling motorbike trip through the sugarloaf peaks and beyond in remote mountainous Ha Giang; meeting the last wild elephant catcher in Yok Don National Park. Taking in the elaborate mausoleums and sites of Vietnam is last imperial dynasty deepened my understanding; sighting the endemic, critically endangered Cat Ba langur on Cat Ba island was exciting; and I loved exploring the history, food and pristine beaches of Con Dao island. And of course the irresistible, fragrant food, delicious coffee, craft cocktails and beer will lead you everywhere. These are the best places to visit in Vietnam.
        If you only have . . .
        One week Hanoi, a boat trip to Halong Bay and the rice fields of the Mai Chau Valley
        Two weeks After Hanoi, Halong Bay and Mai Chau, hop on trains and domestic flights to visit imperial Hue, the DMZ, the ruins of My Son, gorgeous Hoi An and energetic Ho Chi Minh City
        Three weeks Take in Ha Giang in the far north, Dalat in the Central Highlands or the caves of Phong Nha-Ke Bang National Park, a beach break, and a boat trip along the Mekong Delta or a couple of days on remote Con Dao island
        A tight budget Balance domestic flights with long-distance train journeys and Vietnams excellent network of hop-on hop-off “open tickets” on air-conditioned minibuses

        1. Hanoi
        Street food vendors in the night markets of Hanoi is Old Quarter
        Hanoi is noisy, traffic-choked and beautiful all at once. The thousand-year-old city of lakes, founded on a bend of the Red River, is full of history, charm, museums, shops, markets and wonderful street food. Don’t miss the Old Quarter, the heart of the city, where you’ll find lots of food, hotels and temples cheek-by-jowl with shops. Learn how to dodge the motorbikes while on a street-food tour or exploring the ochre-hued French colonial villas, Ho Chi Minh is Mausoleum, the Temple of Literature, the “Hanoi Hilton” prison museum of Hoa Lo and the Vietnam Museum of Ethnology.
        Make it happen
The Sofitel Legend Metropole is where Graham Greene stayed in 1951 while working for Paris Match. Its the citys top address and is elegant throughout

        2. Ha Giang
        Ha Giang is Vietnam is northernmost region, pushing up against the border with China. Its an otherworldly landscape of sugarloaf peaks, mountain passes and rice paddies carved into impossibly steep mountains. Find villages of Red Dzao, Flower Hmong and other local minorities, markets, eco-stays and a window into a rural world of timeless traditions such as weaving. Don’t miss the palace of the Hmong king who raked in revenue from opium farming. En route, stop at the dazzling rice paddy region of Mu Cang Chai.

        Inside Asia is 11-day Vietnam is Northern Soul is an in-depth exploration of the region taking in trekking, rice paddies, tea terraces, markets and visits to remote villages

        3. Pu Luong and Mai Chau
        Not too far from Hanoi are these idyllic retreats found amid neon-green rice paddies. At Pu Luong nature reserve, with its homestays and eco-retreats, trek past the paddies and orchards of the Muong people and cruise down a river on a traditional bamboo raft in a landscape woven with traditional water wheels. This area is home to rare Asian black bear, Owston’s palm civet and endangered Delacour’s langur. North is the exceptionally beautiful Mai Chau Valley, a serene landscape of rice paddies. Stay at the lovely Avana Retreat, built by local Hmong, White Thai and Black Thai people.
        Adventures" 11-day Vietnam: Hanoi, Halong Bay and trekking Pu Luong tour is one of few that takes in trekking in Pu Luong, an overnight stay, and a barbecue lunch made by local chefs

        4. Bai Tu Long Bay, Halong Bay
        Boats — from junks to elegant luxury vessels — cruise through the waters of Unesco-protected Halong Bay, which is studded with thousands of craggy limestone outcrops. It is an ethereal landscape and with each turn of weather can bring dense fog or crisp blue skies. It wont matter — its all enchanting. To make the most of it, head out on a boat for at least two nights to cruise to the outer “fortress” of towers — Bai Tu Long Bay. It’s more magical and it escapes the crowds of one-day and one-night boats.

        5. Hue and the DMZ
Hue was the cultural and political power base of the Nguyen emperors, Vietnam is last imperial dynasty. They built a citadel, gilded in bronze, enamel and lacquer, with gates for themselves, elephants and their minions, based on the Forbidden City of Beijing. They lived in extravagant regal splendour surrounded by concubines and eunuchs. And they fashioned their last resting places, all gothic-meets-Confucius and geomantic in design, landscaped with streams, statues and elaborate graves that trace the serpentine route of Hue’s Perfume River. This city is often overlooked in favour of Hoi An as a central Vietnam stop, but don’t miss it. The thousand-plus dishes of the imperial household are still eaten, too. From here, explore the Demilitarized Zone marking the border established in 1954 between the communist north and the US-backed south.

        Original Travel is 12-day An intro to Vietnam, North to South includes an in-depth tour of Hue is imperial past as well as other significant buildings
        originaltravel.co.uk

        6. Danang and China beach
        The fire-breathing Dragon Bridge in Danang
        China beach, an 18-mile curve of golden sand along the sea, was made famous by thousands of American GIs who would sunbathe here for R&R during the Vietnam War. Today, it’s more fabulous, with some top hotel retreats, such as the Four Seasons and, hidden amid the forest of monkeys on a small peninsula, the outstanding InterContinental Danang Sun Peninsula designed by Asia-based architect Bill Bensley. But there is more — the incomparable Museum of Cham Sculpture with its beautiful carved sandstone works, the nearby Unesco-protected ruins of My Son, the spiritual capital of the Cham, an Indianised culture, and Danang’s fire-breathing Dragon Bridge.

        Explore is 14-day Inside Vietnam is one of few tours taking in the Cham museum, the My Son ruins and an optional visit to My Lai, site of a wartime massacre

        7. Hoi An
        The old town of Hoi An
        Yes, it is touristy, but that is because it is gorgeous. The ancient port of Hoi An is filled with Chinese temples, large merchant houses, and hundreds of tailors and craft shops. One-storey ochre-coloured homes line the small lantern-lit streets along the Unesco-protected town is Thu Bon river. Come for the atmosphere, tailor-made clothes, and the delicious street food including some tantalising local dishes. Nearby An Bang beach provides downtime, too.

        Make it happen
        The Four Seasons Nam Hai is a sublime beachfront property. Large, gorgeous villas dot the peaceful gardens, where pools and coconut palms facing the sea

        Wendy Wus 12-day Vietnam at a Glance ensures time spent immersed in Hoi An, meeting artisans and visiting a farming village — plus plenty left for tailoring

        8. Ninh Van Bay
        The beach at Ninh Van Bay
Ninh Van Bay is a divine little hideaway close to the major seaside resort of Nha Trang. Escape from the city to this peninsula, just north, for some serious beach time. An Lam Retreats Ninh Van Bay is dreamy with a boho vibe, while Six Senses Ninh Van Bay is on a sublime stretch of sand with villas tucked away between and behind huge boulders. It’s just you, the beach, the restaurant and your butler at Six Senses Ninh Van Bay. The waterfalls and forests of the peninsula can be explored too.

        Make it happen
        Six Senses Ninh Van Bay is a barefoot getaway with villas and their private pools perched on huge biscuit-coloured boulders facing the sea. It’s boho, supremely beautiful and comes with butler service

        Scott Dunn is 11-night luxury Limitless Vietnam indulges with four nights at Ninh Van Bay and organised activities
        scottdunn.com

        9. Dalat
        A 1930s railway station in Dalat
        Dalat is a quirky place. A former French hill station up in the pine-scented highlands with a central lake, it is ringed by attractive early 20th-century homes and villas (some hotels, some museums), markets, flower gardens and waterfalls. There’s even a golf course. Today, the city is filled with bars and cute cafés and is a great base from which to explore a load of kooky spots including the Crazy House homestay, cactus and coffee playground Kombi Land and a dragon statue made from thousands of glass bottles. Don’t miss checking out the French-built railway station, a Wes Anderson shoo-in.

        Intrepid Travel is 15-day Premium Vietnam in Depth offers plenty of time to explore Dalat, its quirky sites and coffee culture

        10. Ho Chi Minh City
        Cao Dai cathedral at Tay Ninh
        Ho Chi Minh is a heady city of nine million people and eight million motorbikes. It has brilliant street food, is draped in a fantastic array of fairy lights and is fuelled by a growing craft beer, spirit and cocktail scene and a thrilling, infectious energy. What two decades ago was a fairly low-rise city has now been dwarfed by an army of high rises. Don’t miss exploring the city on the back of a motorbike, visiting the top sites, and taking a trip out to the Viet Cong tunnels at Cu Chi and the fantastically decorated Cao Dai cathedral at Tay Ninh. Sampling the food and coffee goes without saying.

        The Park Hyatt Saigon is not the best-looking from the outside. Step inside, though, and it is a dazzler. Its restaurants and bars are top city addresses and the lovely pool is a boon on humid days. It’s right in the heart of the city, too, just behind the opera house.
        Riviera Travel is 16-day Vietnam and Cambodia tour three night-stay in Ho Chi Minh City ensures plenty of time to take in the sites and the food and explore the tunnels at Cu Chi',
         'Happy_Trips', 
         'Destination', 
         '2023-11-19'),
         
(3,'5 Travel-ready packing tips for travelling on short notice', 'Are you ready to grab an attractive travel deal at a moment is notice? Are you occasionally asked to pack your bags for an unexpected trip..', '5 Travel-ready packing tips
        You may be a consummate planner who starts packing several weeks before a trip. In that case, the following tips will undoubtedly enhance your approaches to planning and preparation. If you’re a last-minute packer, integrating some of these strategies will allow you to pack faster and smarter. If you agree, please let me know in the comments.

        1. Identify a consistent place to stow travel gear
        When packing for previous trips, have you wasted time searching for items destined for your travel bag? If so, it might help to have designated places to store luggage, stash packing aids, hang travel clothing, store shoes set aside for travel, file a passport and related documentation, maintain a selection of travel-sized containers, and stow items packed for most trips.

        For dedicated travel stuff, travel drawers or shelves work for many people. Or use a tote box or two, each one with a lid. Being ready to travel on short notice means not wondering where something is or having to search for it. In this regard, I’m impressed by Mat Tee’s use of shelves stacked with labelled containers and other travel aids. 

        organized-travel-geat-storagePhoto credit: Mat Tee, used with permission

        Also, make being travel-ready part of your everyday activities. Be on the lookout for solid alternatives to liquid toiletries and suggestions on travel clothing. Collect travel-sized containers to add to your collection. Do the same with pouches, zip-top bags, or other packing organizers. Having a selection means finding the right one for decanting purposes or storing related or miscellaneous items in a purse or bag.

        Launder travel underwear from the last trip, pack it in its designated packing organizer, and add it to your travel drawer or partially packed travel bag.

        Reach for your travel umbrella or packable, lightweight rain jacket if rain is in the forecast. Put your hands on a hands-free travel organizer containing your passport, trusted traveller card, emergency contact card, and laminated emergency medical insurance policy card.

        2. Be vigilant about the critical items
        An expired or damaged passport is a liability. Or one that is not valid for at least six months beyond an intended stay or has enough empty pages to be stamped. So is a soon-to-be expired prescription for medication that’s vital to your well-being. These are scenarios that may be difficult to overcome without adequate notice.

        3. Work with a packing list
I find a master packing list works best, unlike separate lists by season, destination, or type of trip. As much as 80 per cent of what you’ll pack applies to all trips, so create an electronic version. My obsessively comprehensive list has every possibility for past and future trips, including brand names, sizes, and weight in some cases. It’s amended regularly to eliminate discards and add new products.

        Print a copy and check off items as they are packed. Working with a hard copy offers more opportunities to quickly add handwritten notes or flag items to be packed within the last few hours of departure. Having a checklist for reference makes last-minute packing more efficient and less stressful.

        4. Know your limits
        If you’re a member of an airline is frequent flyer loyalty program, you will likely travel on that airline or one of its partners. Remain up to date on baggage allowance policies regarding dimensions and weight. If it’s helpful, keep a record in a Notes app on your phone, along with the exact dimensions of your luggage. Purchase a portable luggage scale. Ensure your luggage strictly adheres to baggage allowances and pack accordingly. It’s too late when you reach the gate and encounter a hefty fee for checking a bag because your bag was too large for the luggage sizer.

        portable-luggage-scale

        5. Be prepared with emergency medical insurance
        Travelling without emergency medical insurance coverage is never a risk worth taking. Does your existing policy make you travel-ready? Is it valid for the length of your trip and covers pre-existing conditions related to recent health issues?

        If your policy has lapsed, how quickly will you be able to obtain coverage online or over the phone? Do you travel enough to make an annual multi-trip plan a worthwhile investment? You may be surprised to discover that an annual plan may be slightly more expensive than a single-trip one.
        ', 'Happy_Trips', 'Reisetipps', '2023-09-25'),

        (4,'Top 10 Most Beautiful and Famous Tourist Destinations in Hà Giang', 'A busy life sometimes makes you forget about relaxation. Travel to find balance and joy again. This article will help you choose a suitable trip,
        For those...','The Most Famous Tourist Destinations in Hà Giang
        1. Hoàng Su Phì
        Hoàng Su Phì is a renowned tourist destination in Hà Giang known for its stunning terraced rice fields that turn golden every harvest season. Here, you not only get to admire the landscapes but also have the opportunity to learn about the local people is livelihoods, customs, and culture. The terraced fields here are often likened to shining golden staircases leading to heaven.
Immerse yourself in the breathtaking scenery at dawn and dusk, where you can feel the tranquility and peace in your soul. In this vast area of forests and mountains, expansive terraced fields, and glimpses of stilt houses in the hazy smoke, visitors are captivated. When traveling to Hoàng Su Phì, Hà Giang, tourists often visit villages like Luốc, Nậm Ty, Sán Sả Hồ, Phùng, Hồ Thầu, and Thông Nguyên.

        Among them, Bản Luốc and Bản Phùng are two prominent terraced field viewing spots in Hoàng Su Phì, resembling stacked layers of white silver when viewed from below. The Hoàng Su Phì terraced fields have been recognized as a national monument since 2012. According to travel tips for Hoàng Su Phì, you should visit during the harvest season (September - October) to witness the magnificent scenery like a golden carpet of newly harvested rice.

        2. Mã Pí Lèng Pass
        Who doesn not love adventure without knowing about the breathtaking Mã Pí Lèng Pass - the most beautiful road on the rocky plateau? If you are wondering what makes Hà Giang so attractive, then you absolutely mustn not miss the experience of driving on this winding pass with one side overlooking deep abysses and the other side towering mountains. You will be mesmerized by the stunning scenery of Hà Giang amidst the drifting clouds, enchanted by the meandering Nho Quế River below, resembling a silk ribbon. For adventure enthusiasts, Mã Pí Lèng Pass is undoubtedly one of the most enticing tourist destinations in Hà Giang.


        In the face of such magnificent and majestic natural beauty, you will feel incredibly small. After experiencing the thrilling journey over the pass, you can explore Mèo Vạc tourism in Hà Giang and then continue your journey back to Yên Minh or Bắc Mê to visit more beautiful landscapes.

        3. Đồng Văn Karst Plateau
        Among the domestic tourist destinations, the Dong Van Karst Plateau has long been a renowned geological park both domestically and internationally. Here, you will not only find breathtaking natural scenery but also immerse yourself in the rich culture of various ethnic groups such as the H"Mong, Dao, Pu Péo, and Lô Lô. There are numerous scenic spots to explore in Dong Van including the Lũng Cú Flagpole, Dong Van Ancient Town, and the Twin Mountains of Quan Bạ.


        However, if you are simply exploring Dong Van, venturing into the impressive karst plateaus here is already a fantastic idea. So, you don not need to fuss over finding check-in spots in Ha Giang at Dong Van, just pack your backpack and go.

        4. Tham Ma Slope
        For novice drivers, tackling the Tham Ma Slope to reach the Dong Van Karst Plateau might seem daunting. In the past, this slope was used to test the skill of horses carrying goods and food. Nowadays, itis particularly attractive to adventurous souls and travelers from far and wide.

During the journey to conquer this slope, you will experience a fresh and pristine environment while admiring the majestic natural scenery and the winding, beautiful road. Is not that why many people want to stay in Ha Giang longer?

        5. Pho Bang
        Somewhere in the remote area of Ha Giang lies a town that has been asleep for hundreds of years called Pho Bang. This beautiful tourist destination in Ha Giang is located in the Yen Minh area, where you can admire unique, ancient architectural beauty and history.

        During the buckwheat flower season, the experience of Ha Giang in Pho Bang leaves a lasting impression on visitors with its pure buckwheat flowers. When you come across a valley of roses, you will be completely captivated by that romantic beauty amidst the land and sky.


        To reach this place, you need to pass through Tham Ma Pass to Pho Cao and then turn left. After about 8km, you will encounter a wonderful Pho Bang amidst the mountains and plateaus, full of allure.

        6. Sung La Valley
        On a beautiful day, when you step into Sung La Valley, you will understand what timeless beauty truly means. Amidst the rocky plateau, you will find a bit of tranquility, simplicity, and romance of colorful flower gardens and humble houses. Each season, when the corn returns with lush green fields and the characteristic buckwheat flowers bloom, you will easily lose yourself and forget the way back.


        In Sung La, you can find Lung Cam Village, where H mong and Lolo people reside. The rustic and simple beauty of this place became famous when it served as the backdrop for the famous film Story of Pao with its nearly century-old house. During January and February, this area is filled with cherry blossoms, apricot blossoms, plum blossoms, and beautiful rose valleys amidst the vast mountains.

        Book now anoi to Ha Giang 3 days 2 nights Tour

        7. Vuong Family Mansion
        Owning unique architectural features, the Vuong Family Mansion has long been an attractive tourist destination in Ha Giang for many travelers. The special point is that this mansion, belonging to the Hmong ethnic group, bears influences from French architecture and Chinese culture.


        Perched atop a small hill and recognized as a national heritage site since 1993, the mansion offers panoramic views of the stunning valley from above. Visiting the mansion, you have the opportunity to admire the beauty of Ha Giang from a different perspective.

        8. Lung Cu Flagpole
When it comes to the must-visit spots in Ha Giang, Lung Cu Flagpole surely cannot be missed. With an altitude of over 2000 meters above sea level, you can witness the beautiful national flag amidst the mountains and forests, capturing memorable photos filled with radiant smiles and amazing experiences. The Lolo people inhabit Lung Cu, known for their friendliness and hospitality, so you need not worry if you plan to embark on an adventure to this place.


        9. Yen Minh Pine Forest
        If you have fallen in love with the Yen Minh Pine Forest, located just about 40 kilometers from the twin mountains of Quan Ba, upon arriving at this tourist destination in Ha Giang, the cool air and the towering green pine trees on the hillsides will amaze you. Of course, during this journey, you will not hesitate to explore this wonderful pine forest with friendly guides or team up with fellow travelers for some forest adventures and photo ops, won not you?

        10. Quan Ba Twin Mountains
        For a long time, the name Quan Ba Twin Mountains has been frequently mentioned by tourists on budget tours to Ha Giang. Regardless of the season, the landscape of Quan Ba Twin Mountains never fails to mesmerize visitors. Especially during the rice harvest season, Quan Ba Twin Mountains appear like a fairy donning a new gown. Standing atop the mountain and gazing downwards, you wll witness a shimmering golden hue enveloping the land and sky. So, if you ever visit Ha Giang, don not forget to explore this beautiful mountain range resembling the ample bosom of a maiden!

        ','Happy_Trips','Destination', '2022-11-30'),
       
       
       (5,'Top 6 tourist destinations in Da Nang','Welcome to Da Nang, Vietnam, where modern architecture meets natural beauty. Bridge is a unique testament to modern engineering. The record belonged to a bridge that is now surpassed by this modern …', 'My Khe Beach – The 1st place to visit in Da Nang
        Side-by-side images of a city beach with high-rise buildings on the left and a crowded beach with mountains in the background on the right, promoting House Rental Danang—the ideal choice for experiencing the best places to visit in Da Nang.

        My Khe Beach – The 1st place to visit in Da Nang

        Da Nang is a coastal city located in the middle of Vietnam, and one of its most famous attractions is My Khe Beach. This pristine stretch of sand has been recognized by Forbes Magazine as one of the most beautiful beaches in the world, and it’s easy to see why. My Khe Beach has a long history dating back to the Vietnam War when American soldiers would come here for rest and relaxation. Today, it’s a popular destination for both locals and tourists who come to enjoy its crystal-clear waters, soft white sand, and breathtaking views.
Located just six kilometers from Da Nang’s city center, My Khe Beach is easily accessible by taxi or motorbike. The best time to visit is from May to August when the weather is warm and sunny with calm waters perfect for swimming or water sports like jet skiing or parasailing.

        For those who prefer a more relaxed experience with attractions in Da Nang, there are also plenty of sun loungers available for rent where you can soak up some rays while enjoying refreshing drinks from nearby beach bars. You can also take leisurely strolls along the beach while admiring picturesque views of Son Tra Peninsula’s lush greenery in the distance.

        One unique feature that sets My Khe Beach in Da Nang that is different from other beaches in Vietnam is its cleanliness. The local government invests heavily in keeping this treasure spot free from pollution, so visitors can enjoy pristine waters without worrying about litter or debris ruining their fun. If you’re interested in history, you can visit nearby sites like the Marble Mountains or Linh Ung Pagoda located on Son Tra Peninsula, a favorite destination in Da Nang. These attractions offer incredible views of Da Nang Bay while also providing insight into Vietnamese culture and spirituality.


        Marble Mountains

        The Marble Mountains, also known as Ngu Hanh Son, are a cluster of five limestone and marble hills situated in the south of Da Nang. These mountains are not only a popular tourist attraction but also have significant spiritual and cultural value.

        The name “Marble Mountains” of the city comes from the fact that the mountains were once seabeds that rose above sea level due to geological activity. The composition of these mountains is mainly limestone and marble with different shades when visiting Da Nang such as white, gray, pink, and green. For centuries these mountains have been a source for fine arts carving.

        Each mountain has its unique features and attractions:

        Thuy Son (Water Mountain) is the largest mountain among all five by the sea. It has several caves like Huyen Khong Cave which is famous for an ancient Buddhist temple with natural light from a hole in the ceiling where visitors can witness Buddhist ceremonies.
        Kim Son (Metal Mountain) is said to be one of the places that represent metal or iron in Da Nang for  its steep cliffs made for adventurous tourists to climb up to enjoy stunning views of Da Nang city or Non Nuoc Beach.
        Moc Son (Wood Mountain) has various beautiful pagodas built since the 17th century such as Am Phu Pagoda in Vietnam that means “Hell” or “Underworld” Pagoda decorated with sculptures depicting scenes from hell according to Buddhism beliefs.
Thuy Long Son (Dragon Mountain) offers one of the best panoramic views around Da Nang city as it stands at an altitude of about 600 meters above sea level. This mountain also includes several pagodas like Tam Thai Pagoda where visitors can enjoy incense burning ceremonies or learn about ancient Vietnamese architecture.
        Hoa Son (Fire Mountain) has unique tunnels that were used by Viet Cong soldiers during the Vietnam War era making it an interesting historical site to visit Da Nang for those interested in learning more about Vietnam’s past.
        Visitors can explore these mountains by themselves or join a guided tour to learn more about the history and culture of each mountain. Tickets are available at the entrance gate with different prices depending on the type of tour and activities.


        Ba Na Hills

        Ba Na Hills is a mountain resort located 1,487 meters above sea level in the Truong Son Mountains. It was originally built by French colonists as a hill station in the early 1900s, but it has since been transformed into a popular tourist destination with many attractions to see and activities to do.

        One of the main attractions at Ba Na Hills is the cable car ride. The cable car system holds several Guinness World Records, including the longest single cable car system and the highest difference between departure and arrival stations. During the ride, you’ll be able to see stunning views of Da Nang city and its surrounding areas.

        Once you arrive at Ba Na Hills, there are many things to explore. One of them is Debay Wine Cellar which was built during French colonial times but has now been renovated for visitors to learn about wine-making techniques while enjoying some tastings. Another must-see attraction is Golden Bridge which is held up by two giant hands that emerge from the ground. It offers breathtaking views of the surrounding area from an unforgettable perspective.

        If you have kids or just enjoy amusement parks, Fantasy Park is another attraction worth visiting at Ba Na Hills. It’s home to several rides like roller coasters and giant swings as well as carnival games such as basketball hoops or ring tosses. Most tourists will spend at least half a day here so it’s important to know how much time you’ll need for each activity before starting your journey up there because ticket prices are quite expensive if you’re not careful with your planning.

        During peak season (from May-August), it can get crowded so it is best to arrive early in order to avoid long lines or waiting times for attractions. You may also want to consider visiting during off-season months when crowds are smaller and ticket prices are lower.

        Read more: When is the Best Time to Visit Danang? An overview of monthly weather in Danang

       
        Dragon Bridge
As one of the most iconic landmarks in Da Nang, Vietnam, the Dragon Bridge is a must-see attraction for any traveler visiting the city. This impressive bridge not only serves as a functional transportation route but also stands out as a symbol of Vietnamese culture and architecture.

        The Dragon Bridge stretches across the Han River, connecting Da Nang is main city center to its eastern districts. The bridge’s unique design features two dragon heads at each end that can breathe fire or water during special events at night. This feature alone is enough to captivate visitors and make them feel like they are witnessing something truly magical.

        Aside from its striking appearance, the Dragon Bridge also serves an important function as it allows ships to pass underneath it. The bridge has a span of 666 meters and is illuminated with colorful LED lights that change color throughout the night. One of the best times to visit Dragon Bridge is during major events such as fireworks festivals when crowds gather to watch spectacular displays light up the sky. These events make for an unforgettable experience that shouldn’t be missed if you’re in town.

        In addition to admiring its exterior beauty, there are plenty of things to do around Dragon Bridge such as exploring nearby restaurants or cafes for some local Vietnamese cuisine. Don’t forget to try some Banh Xeo, a savory pancake filled with shrimp and bean sprouts that’s popular in Da Nang. If you’re interested in learning more about Vietnamese history and culture, take a stroll down Tran Hung Dao Street towards the Museum of Cham Sculpture which showcases ancient artifacts from Cham civilization that once lived here before being conquered by Vietnam in 1471 AD.

       
        Son Tra Peninsula

        The Son Tra Peninsula, also known as Monkey Mountain, is a hidden gem that should not be missed when visiting Da Nang. With its pristine beaches, dense forests, and unique wildlife, it offers visitors an unforgettable experience.

        The peninsula is located just a few kilometers northeast of Da Nang city center and covers an area of over 4,400 hectares. It was designated a nature reserve in 1977 to protect its diverse flora and fauna. The peninsula’s highest peak stands at 693 meters above sea level to walk, offering breathtaking views of the surrounding landscape. One of the most notable features of Son Tra Peninsula is the red-shanked douc langur monkey. This rare primate species can only be found in Vietnam and Laos and is considered endangered due to habitat loss and hunting. The peninsula’s forested areas provide a safe haven for these amazing creatures.
Visitors can explore the peninsula by following one of the many hiking trails that lead through the forested hillsides. Along the way, hikers will have opportunities to spot monkeys swinging from tree to tree or take in sweeping views of pristine beaches below. One popular destination on Son Tra Peninsula is also an amazing spot in this city, which is Linh Ung Pagoda, which features a towering statue of Lady Buddha that stands over 70 meters tall. Visitors can climb up inside her body for panoramic views over My Khe Beach and Da Nang Bay.

        Another must-visit location on Son Tra Peninsula is Tien Sa Beach with its crystal-clear waters perfect for swimming or snorkeling. The beach also boasts some excellent seafood restaurants where visitors can enjoy fresh catches from local fishermen while taking in stunning ocean views. It’s important to note that since much of Son Tra Peninsula falls within protected areas or military zones access may be limited depending on regulations at any given time so it’s best to check before planning your trip.

        
        Han Market

        As you explore the bustling city of Da Nang, you will inevitably come across Han Market in the morning. This vibrant market is a one-stop shop for all your souvenir and street food needs for tourists to enjoy. The place is where tourists flock, but it’s also where locals go to buy fresh produce and other necessities. The market has been around since the French colonial period and has undergone several renovations over the years. It’s located in the heart of Da Nang, making it easily accessible to visitors staying in nearby hotels or apartments.

        As soon as you step inside Han Market, your senses are immediately overwhelmed with an array of sights, sounds, and smells. The market is divided into different sections, with each offering unique products such as clothing, jewelry, handicrafts, shoes, and textiles. You’ll find vendors selling everything from traditional Vietnamese clothing like ao dai to modern fashion pieces. One of the best things about Han Market is very crowded with street food. Here you can indulge in some delicious local cuisine at affordable prices – perfect for budget travelers! You’ll find vendors selling popular dishes like banh mi sandwiches or bun cha ca noodles soup served at nearby street vendors.

        If you’re planning on shopping at Han Market, be prepared to haggle! Bargaining is a normal part of Vietnamese culture and expected at markets like this one. However, make sure to do so respectfully without insulting or offending the sellers. While wandering through Han Market’s maze-like corridors filled with stalls and shops can be overwhelming at times – there are a few tips that can help make your experience more enjoyable:

        Firstly: Visit early in the day when crowds are thinner if possible since it gets busy later on.
Secondly: Try not to carry too much cash with you since pickpocketing may occur.
        Thirdly: Take note of where you entered since navigating through this maze-like market may throw off your sense of direction.
        Lastly: Do not be afraid to ask the vendors questions about their products or for recommendations on what to buy.
        Han Market is a must-visit destination for anyone exploring Da Nang. It is a vibrant and colorful place that offers a unique shopping experience and delicious local cuisine. Whether you’re looking for souvenirs, fresh produce or simply want to immerse yourself in the local culture, Han Market has got you covered!',
        ' Happy_Trips',
        'Destination ',
        '2023-12-03'),
        
(6,'10 Travel Skin Care Tips','If you are forever dipped in wanderlust, you need to know some travel skin care tips!Traveling is stressful, even when you are flying to some exotic location. All of the stress associated with travel can ...','10 Essential Skin Care Tips To Follow While Traveling
        Skin care tips to follow while traveling
        1. Carry Facial Wipes Or Towelettes
        If you do not want to carry a facial cleanser or use the cleanser provided by the hotel, pre-moistened facial wipes or makeup removing towelettes are your best option.

        Carry them in a ziplock bag. You can use them anywhere – in the airplane, while traveling in a bus or car, while sitting at the beach, or in your hotel room. When going on vacation, make sure to carry good-quality facial wipes that match your skin type and issues.

        Make sure to carry good-quality facial wipes.

        2. Carry A Facial Mist Spray
        Woman applying facial mist
        This is a must-have for everyone! Whether you are on a weekend trip or a long vacay, never forget to carry a facial mist. It is hydrating and will keep your skin refreshed throughout your trip. When you spritz it on your face, you add moisture to your skin. This is especially helpful if you have dry and combination skin or if you are traveling to a colder climate.

        3. Carry Your Favorite Facial Cleanser
        A facial cleanser is more important than your serums and under eye creams. A daily cleanser makes sure that at the end of the day, your skin is devoid of dirt, pollution, and impurities. Unclean skin is a strict no-no wherever you are!

        4. Do not Forget Moisturizer
        A good face moisturizer helps maintain your skin is health. It keeps your skin hydrated, which prevents breakouts and skin issues caused by excessive dryness. Remember to moisturize your skin before you board your flight. The air inside planes is drying and can damage your skin.

        5. Do not Ditch SPF
Ask anyone which product they can not do without, and they will tell you the secret – a good sunscreen. Sunscreen goes a long way in taking care of your skin and the way it looks. It is especially an important part of morning skin care routines. However, when traveling, remember to reapply your SPF every two hours or every time you need to wipe your face clean.

        6. Pack Some Sheet Masks
        Sheet masks do not take up any extra space in your luggage and are great for your skin. These treatment-soaked paper-thin sheets are a great alternative for the serums and special creams that you will miss while traveling and are great for skin hydration.

        7. Avoid Touching Your Face Often
        Keeping your hands off your face helps minimize breakouts. Strictly abide by this rule when traveling. This is because you might pick up unknown bacteria that can cause multiple skin issues. Wash your hands with an antibacterial hand wash or sanitizer as much as possible.

        8. Skip Makeup
        Whether you are about to board your flight or check out some tourist spots, makeup is a strict no-no. Many prefer using a tinted moisturizer while traveling, but it is better to stick to your daily day cream and SPF to let your skin breathe. This is because the changing weather conditions and atmosphere may cause your skin to break out.

        9. Carry A Good Eye Cream
        Woman applying eye cream
        If you are constantly battling eye puffiness, carry a good under-eye cream with you. As an alternative, you may also wrap crushed ice in a washcloth (if you don’t have an ice pack) and apply it on your eyes. This will rejuvenate your eyes immediately.

        10. Do not Compromise On Your Beauty Sleep
        Not getting enough sleep while traveling can make your skin more prone to issues. So, try to get a good night’s sleep even when you are traveling.

        Now that we have covered all the skin care tips you should keep in mind while traveling, let is check out some post-travel tips as well to ensure your skin stays healthy and glowing.', ' Happy_Trips', ' Reisetipps', '2024-11-21'),
         (7,'Plan Your First Trip to Vietnam','Visiting Vietnam offers an unparalleled experience, combining stunning landscapes, rich cultural heritage, and exquisite cuisine. Travel Off Path, a world-leading indie travel news source has named Vietnam the safest country to visit in Asia for 2024....', 'Visiting Vietnam offers an unparalleled experience, combining stunning landscapes, rich cultural heritage, and exquisite cuisine. Travel Off Path, a world-leading indie travel news source has named Vietnam the safest country to visit in Asia for 2024.

        This recognition is based on the latest Global Law and Order Index, which ranked Vietnam as the most peaceful state in Asia and seventh worldwide, due to its low crime rates and impressive political stability.
From the breathtaking mountains of Sapa to the vibrant streets of Hanoi, Vietnam is diverse attractions captivate every traveler. As you plan your first trip to Vietnam, consider travel tips for Vietnam, visa requirements, and the best time to visit Vietnam to avoid unexpected surprises and enhance your adventure. This guide will provide valuable tips and insights for planning a memorable journey to Vietnam.

        Visa Requirements for Your First Trip to Vietnam: A Comprehensive Guide
        As you embark on your journey to visiting Vietnam, understanding the visa requirements is crucial for a smooth entry into the country. Vietnam offers various visa options depending on your nationality and the length of your stay. For more information about overview of visas and transportation for those planning to visit Vietnam, you can check at: Travel to Vietnam • Oxalis Adventure.

        Vietnam has a diverse visa policy, catering to different travelers:

        Visa Exemptions: Citizens of certain countries are exempt from needing a visa for short stays. Check if your country is on the exemption list.
        Visa on Arrival (VOA): This option is available for specific nationalities and requires a pre-approval letter.
        E-visas (Electronic Visas): This convenient option allows you to apply for a visa online and receive it electronically. It is available for citizens of many countries.
        Embassy Consulate Visas: If you don not qualify for other options, you can apply for a visa at the Vietnamese embassy or consulate in your home country.
        For detailed information on visa requirements in Vietnam, including a list of exempt countries and the application process for different visa types, please refer to the official website of the Vietnam Immigration Department.

        Upon arrival in Vietnam, you will need to present the following documents:

        Valid Passport: Ensure your passport is valid for at least six months beyond your intended stay.
        Visa (if required): Have your visa ready, whether itis a printed e-visa, a VOA approval letter, or a visa stamped in your passport.
        Return Flight Ticket: You might be asked to show proof of onward travel.
        Pro Tip for Planning a Trip to Vietnam:

        Keep a copy of your passport and visa information, as well as the contact details of your embassy or consulate in Vietnam, in case of emergencies.

        When entering Vietnam, you will need to fill out a customs declaration form. Declare any goods that exceed the duty-free allowance or are prohibited.

        Choosing the Best Time for the First Trip to Vietnam
        Vietnam is diverse climate and distinct regional seasons offer a unique experience year-round, but understanding the weather patterns is key to planning your perfect trip to Vietnam.
Northern Vietnam: Summers are hot and humid, while winters are cool and dry. Spring (March-April) and autumn (September-November) boast pleasant weather, ideal for visiting Vietnam is iconic sites like Ha Long Bay.
        Central Vietnam: This region experiences a harsher climate with intense heat and occasional typhoons. The dry season from February to August is perfect for beach vacations in destinations like Da Nang and Hoi An.
        Southern Vietnam: With two distinct seasons, the dry season (December-April) is ideal for exploring the Mekong Delta and Ho Chi Minh City. The wet season (May-November) brings heavy rainfall, but it is also when the countryside is lush and green.
        For specific information for climate and best places to visit in Vietnam in each season, check out at: Best Time to Visit Vietnam: Weather and Climate Guide for Travelers.

        Note:

        Avoiding Peak Season: If you are looking for budget-friendly options and fewer crowds, consider traveling to Vietnam outside the peak season (July-August).
        Festival Season: Experience the vibrant Vietnamese culture during festive periods like Tet Nguyen Dan (Lunar New Year) in January or February, or other regional festivals throughout the year.
        By considering these Vietnam travel tips, you can tailor your travel to Vietnam to your preferences and ensure an unforgettable experience. Remember to check the specific weather conditions for your chosen destinations and plan your itinerary accordingly.

        Top 10+ Best Places to Visit in Vietnam for first timer
        Vietnam, a land of captivating beauty and rich cultural heritage, boasts a diverse landscape stretching along the Indochinese Peninsula is eastern coast. With its extensive coastline bordering the East Sea, Vietnam offers many stunning beaches and coastal attractions. The country is topography is equally diverse, ranging from majestic mountains in the north to fertile deltas in the south, providing visitors with many popular destinations in Vietnam to explore.

        Having weathered centuries of historical events, Vietnam is cultural tapestry is woven with unique traditions, customs, and architectural marvels. From ancient temples and bustling cities to serene countryside and vibrant floating markets, traveling to Vietnam is an enriching experience that caters to all interests.

        Best Places in Northern Vietnam to Visit:
        Hanoi: The capital city entices visitors with its charming Old Quarter, historical landmarks like the Temple of Literature and Ho Chi Minh Mausoleum, and delectable street food.
        Ha Long Bay: This UNESCO World Heritage site is a breathtaking natural wonder, offering cruises, cave exploration, kayaking, and swimming opportunities.
Sapa: Nestled in the Hoang Lien Son mountain range, Sapa is renowned for its terraced rice fields, ethnic minority villages, and challenging trekking routes to the peak of Fansipan, Indochina is highest mountain.
        Ninh Binh: This region is home to the stunning Trang An Landscape Complex, the picturesque Tam Coc-Bich Dong caves, and the majestic Bai Dinh Pagoda.
        Northern Vietnam is known for its stunning landscapes and rich cultural heritage. Source: Internet
        Northern Vietnam is known for its stunning landscapes and rich cultural heritage. Source: Internet

        Best Places in Central Vietnam to Visit:
        Hue: The former imperial capital boasts the magnificent Imperial Citadel, royal tombs, the iconic Thien Mu Pagoda, and the scenic Perfume River.
        Hoi An: This enchanting ancient town is a UNESCO World Heritage site, featuring well-preserved architecture, the Japanese Covered Bridge, traditional craft villages, and the beautiful An Bang Beach.
        Da Nang: A vibrant coastal city known for the Ba Na Hills resort, the Marble Mountains, the Dragon Bridge, and the pristine My Khe Beach.
        Phong Nha-Ke Bang National Park: This UNESCO-listed park is home to the world is largest cave, Son Doong, along with other spectacular caves like Tu Lan, En Cave, Phong Nha Cave, Paradise Cave, and the Chay River-Dark Cave system.
        Hang En Cave in Phong Nha-Ke Bang National Park
        Hang En Cave in Phong Nha-Ke Bang National Park

        Best Places in Southern Vietnam to Visit:
        Ho Chi Minh City: The bustling metropolis offers historical sites like the Reunification Palace and Notre Dame Cathedral, vibrant markets like Ben Thanh, and the poignant Cu Chi Tunnels.
        Mekong Delta: This vast river network is known for its floating markets, lush orchards, traditional villages, and unique cultural experiences.
        Phu Quoc: Vietnam is largest island is a tropical paradise with stunning beaches, Phu Quoc National Park, the Hon Thom cable car, and the charming Ham Ninh fishing village.
        By planning your itinerary carefully and considering the Vietnam travel tips outlined in this guide, you can make the most of your trip to Vietnam and create lasting memories.


         ','Happy_Trips', 'Reisetipps', '2021-09-21'),
       
		(8,'The Beginner is Guide to Exploring Vietnam','Now here is a country that breaks the mold of your typical Asian destination. Vietnam is not just famous for its stunning landscape and unique culture. It gets way quirkier than that—we were talking egg coffee ...', '
		Settling into Your Hotel in Vietnam

		Step 1: Check-In
		As you step into the hotel, take a deep breath and soak in the atmosphere—you’re officially in Vietnam. Head to the front desk with your booking confirmation and passport in hand.
The staff will likely ask for your passport for verification, but don’t hesitate to remind them to return it once the check-in process is complete. Some hotels might also ask for your visa.

		Pro Tip:If you’ve arrived early and your room isn’t ready, many hotels in Vietnam offer early check-in or will store your luggage until check-in time. This way, you can start exploring the city without dragging your suitcase along.

		Step 2: Get Comfortable
		Before you rush out to grab some phở, take a moment to unwind. Check out the amenities available to you, whether it’s a mini-fridge stocked with local snacks or a beautiful view of Hoan Kiem Lake.

		Familiarize yourself with the room’s features, such as air conditioning (essential due to Vietnam’s humidity!), television, and Wi-Fi access. If you can’t find the Wi-Fi password in your room, call the front desk and ask for it.

		Pro Tip: Many hotels in Vietnam offer free welcome drinks, so check if yours does. It’s a lovely way to start your stay and experience local hospitality.

		Step 3: Familiarize Yourself with Your Surroundings
		Once you’ve settled in (and perhaps had a shower or a nap), it’s time to step out and explore your new neighborhood. Take note of the hotel’s location and nearby attractions. Vietnam is filled with charming streets, bustling markets, and tempting street food stalls. A short walk around the block will help you get your bearings and might even lead you to hidden gems.

		Before heading out, grab your hotel’s business card from the front desk just in case you lose your way and need help getting back. The card contains the hotel’s address and contact details. You can show it to a local for directions or hand it to a taxi driver if your hotel is not within walking distance.

		Nearby Spots to Remember:
		- Restaurants, Markets, and Street Food Stalls: Seek out local eateries to indulge in authentic Vietnamese cuisine. Ask the staff for recommendations as they often know the best local spots.
		- Cafés: Hanoi is famous for its coffee culture. Find a nearby café to sip on traditional Vietnamese coffee or a refreshing iced coffee with condensed milk.
		- Transportation: Familiarize yourself with nearby bus stops and download ride-hailing apps—most importantly, Grab—to avoid overpriced taxis. We’ll be covering transportation apps in more detail later in this blog.
		- ATMs/Pharmacies/Grocery Stores: Keep note of these amenities so you can stop by when needed. Popular ATMs include Vietcombank, Techcombank, and BIDV. Popular grocery chains include VinMart, Co.opmart, Big C, and Lotte Mart. Pharmacity is the largest pharmacy chain in Vietnam, with over 1,000 stores nationwide.

		Pro Tip: Chat with the hotel staff about their favorite local attractions. They often have insider tips and may share secret spots not mentioned in guidebooks.

		Step 4: Set Up Your Base Camp
Make sure you have essential items ready for your adventures—comfortable shoes for walking, a power bank for your devices, sunscreen, a hat, mosquito repellent, and a reusable water bottle to stay hydrated while you explore Vietnam’s lively streets.

		2: What to Know Before You Step Outside in Vietnam

		I. Get Your Local SIM / eSIM 
		You’ll need a mobile data connection to map out your next phở stop or translate menu items (e.g., “bánh mì” and “bánh bao” can sound similar when you’re hangry). If you didn’t grab an eSIM or SIM card at the airport, you can still get one outside.

		It’s recommended to stick with the major telecom providers in Vietnam for the best coverage and easy assistance if you encounter any issues:
		- Viettel: The largest provider, known for extensive coverage and reliable service, especially in remote areas.
		- Mobifone: Offers good speed and coverage, particularly in urban areas.
		- Vinaphone: Known for competitive pricing and good customer service.

		Where to Get a Local SIM in Vietnam  
		Look for official brand kiosks or stores to avoid issues with activation or service. You’ll find these kiosks in shopping malls, busy markets, and popular tourist spots. If you’re unsure, just ask your hotel staff—they’ll likely know where to find the nearest kiosks.

		Documents You’ll Need  
		To buy a SIM card in Vietnam, keep your passport handy. Vietnamese law requires all SIM cards to be registered to a passport for security reasons. You’ll also need to fill out a simple registration form, which typically asks for:
		- Your full name
		- Passport number
		- Nationality
		- Address in Vietnam (if applicable)
		- Contact number (if you have one)

		The process usually takes just a few minutes. The staff will guide you, and you’ll walk away with a working SIM card in no time.

		Data Plans and Pricing 
		- Validity: Plans generally range from 7 days to 30 days, with some providers offering longer options.
		- Data Packages: Prices typically start at around 100,000 VND (~$4) for basic packages, offering 3-5 GB of data.
		-Voice Calls: Basic packages often don’t include voice call minutes, but you can usually add domestic calling packages. International calls may require additional credit.

		Speed and Performance 
		- Network Speed: You can expect decent 4G LTE speeds in urban areas, averaging around 10-30 Mbps, which is sufficient for browsing, social media, and streaming. Rural areas may experience slower speeds.
		- Coverage: All providers offer widespread coverage, but you might encounter network drops in remote areas or mountainous regions.

		Alternative: eSIM 
		If your device supports eSIM technology, you can opt for a digital SIM (eSIM) from the same providers. This eliminates the need for a physical card and allows you to activate the eSIM online before your trip. With an eSIM, you can enjoy seamless connectivity as soon as you arrive, provided it’s compatible with your pho
','Happy_Trips', 'Reisetipps','2022-11-01'),

		(9,'7 places in Vietnam for families', 'Picking the right destination for a family holiday can be tricky, but the pay-off is well worth it. Sharing a gorgeous view with those closest to you, or watching the kids be amazed by new experiences is simply wonderful...', 'Want to make those memories in Vietnam? These seven accessible spots guarantee an unforgettable vacation, one you will reminisce about for years to come. Check them out below. 
		Mai Châu vietnam for families

		Only two hours from Hanoi, Mai Châu is easy to reach yet full of rewards. Spend a few nights in a traditional stilt house homestay to make the most of this charming valley. Check your stress at the door -- these spectacular rice paddies will help even the busiest parents find some peace of mind. Take the family hiking in Pù Luông Nature Reserve, or cycle along the trails that cut through waving rice fields. A White Thai textile workshop is a great opportunity to broaden children is perspectives and learn more about ethnic cultures in Northern Vietnam. 

		Sapa vietnam travel for families
		By now you have probably heard of the incredible landscapes in Sapa. If the mountains surrounding this town seem intimidating for a family trip, dont not be deterred. There are countless ways for families to explore Sapa in comfort. Admire the rice terraces from the comfort of a mountain lodge, take an easy walk for a picnic by a waterfall, or ride the 15-minute cable car to the top of Mt. Fansipan, for glorious views of clouds and scenery below. Sapa boasts a number of sustainable tours and workshops with ethnic minorities, which offer plenty of teachable moments for future responsible travellers. 

		Hội An family holiday vietnam
		Hội An is a lot more than the UNESCO-listed Ancient Town. Those who venture to its outskirts will find a peaceful way of life in the Vietnamese countryside, that you can not help but fall in love with. Your family can choose to spend a few days on An Bàng Beach or in the rice paddies in Cam Thanh, and experience Hội An in very different ways. A beach day means jumping the waves and dining on fresh seafood with your toes in the sand. The countryside brings adventures through rice fields and vegetable villages, which you can visit on foot or by bicycle. Hoi An is also a great place to introduce your loved ones to Vietnamese cuisine, with many easy and engaging classes for cooks of all ages and skill levels. 

		Nha Trang places for families vietnam
Sunny Nha Trang is a fool-proof choice for family beach holidays. The Cam Ranh International Airport makes getting here amazingly simple, and from there it is a short ride to this sunny coastal city. Book a snorkeling tour and visit Hòn Mun Island to see colourful marine life, and learn more about Nha Trang’s fishing roots at the excellent Oceanographic Museum. Parents looking to unwind should give Nha Trang’s warm mud bath and hot spring resorts a try. Afterward you can jump in one of the swimming pools, or book a private room for a full day of relaxation. Hòn Bà Nature Reserve, about two hours from Nha Trang City, is where you can lay out a picnic blanket right next to a foaming waterfall.

		Mũi Né family holiday vietnam
		Learning to kitesurf in a day? Surely even the most uninterested teenagers will want to give this addictive sport a try. The coastal town of Mũi Né is a quick train ride or four-hour drive from Ho Chi Minh City, and is the home of kitesurfing in Vietnam. In fact, any type of watersport can be found in Mũi Né. The red and white sand dunes just out of town are a massive sand surfing playground. Children can exhaust their energy reserves by riding makeshift sand surfboards to the bottom of the dunes again and again. Or drift over these awe-inspiring dunes on an ATV. For extra convenience, stay close to the waters at one of Mũi Néis many resorts along the shoreline.

		Phú Quốc Vietnam with family
		Airports across Asia have direct flights to Phú Quốc, which makes a stay on this idyllic island equal parts tempting and accessible. Phú Quốc is especially suitable for families, with a wide variety of places to stay, from five-star resorts with private pool villas to eco-friendly guest houses on the sand. Visit fishing villages and bee farms to immerse in local culture, take the kids on the world is longest oversea cable car ride, and spend days surrounded by sandy beaches and turquoise waters. Family-friendly resorts on Long Beach and Ông Lang Beach are more relaxed than those around Dương Đông Town. Late in the year, keep an eye out for the island is famous purple sunsets. ', 'Happy_Trips', ' Destination' , '2024-04-12'); 


INSERT INTO Blog_image (blog_id, image_url) 
VALUES 
    (1, 'images/Tietkiem.jpg'),
    (2, 'images/Best_destination.jpg'),
    (3, 'images/prepa.jpeg'),
    (4, 'images/hà_giang.jpg'),
	(5, 'images/Đà_nẵng.jpg'),
    (6, 'images/skin.jpg'),
    (7, 'images/plan_firs.jpeg'),
    (8, 'images/Beginer.jpeg'),
    (9, 'images/vietnam travel for families.jpg
');

DROP TABLE IF EXISTS GuideImage;

CREATE TABLE Guide (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Unique ID for the guide
    name VARCHAR(100) NOT NULL,        -- Name of the guide
    role VARCHAR(50) NOT NULL          -- Role (e.g., "Tourist Guide", "Local Expert", ...)
);

-- 1. Drop the Image table if it exists
DROP TABLE IF EXISTS Image;

-- 2. Create the Image table to store guide images
CREATE TABLE Image (
id INT AUTO_INCREMENT PRIMARY KEY,  -- Unique ID for each image
    guide_id INT NOT NULL,               -- Guide ID related to the image
    file_path VARCHAR(255) NOT NULL,     -- File path or URL of the image
    CONSTRAINT fk_guide_id FOREIGN KEY (guide_id) REFERENCES Guide(id) ON DELETE CASCADE
    -- Foreign key constraint ensures the image is only linked to valid guides
);

-- Insert data into the Guide table
INSERT INTO Guide (name, role)
VALUES 
    ('Trần Hữu Nam', 'Manager'), 
    ('Nguyễn Thúc Thuỷ Tiên', 'Tourist Guide'), 
    ('Nguyễn Thị Kim Châu', 'Tourist Guide'),
    ('Hoàng Long', 'Tourist Guide');

-- Insert images into the Image table for the guides
INSERT INTO Image (guide_id, file_path)
VALUES 
    (1, './images/Guide1.1.jpg'),
    (2, './images/Guide3.jpg'),
    (3, './images/Guide4.jpg'),
    (4, './images/Guide5.jpg');


ALTER TABLE `Tour` ADD `city` VARCHAR(255);

UPDATE `Tour` SET `city` = 'Tam Dao' WHERE `tour_id` = 1;
UPDATE `Tour` SET `city` = 'Bac Giang' WHERE `tour_id` = 2;
UPDATE `Tour` SET `city` = 'Da Lat' WHERE `tour_id` = 3;
UPDATE `Tour` SET `city` = 'Da Lat' WHERE `tour_id` = 4;
UPDATE `Tour` SET `city` = 'Da Nang' WHERE `tour_id` = 5;
UPDATE `Tour` SET `city` = 'Da Nang' WHERE `tour_id` = 6;
UPDATE `Tour` SET `city` = 'Quy Nhon' WHERE `tour_id` = 7;
UPDATE `Tour` SET `city` = 'Sapa' WHERE `tour_id` = 8;
UPDATE `Tour` SET `city` = 'Hai Phong' WHERE `tour_id` = 9;
UPDATE `Tour` SET `city` = 'Quang Ninh' WHERE `tour_id` = 10;
UPDATE `Tour` SET `city` = 'Quang Ninh' WHERE `tour_id` = 11;
UPDATE `Tour` SET `city` = 'Hanoi' WHERE `tour_id` = 12;
UPDATE `Tour` SET `city` = 'Hanoi' WHERE `tour_id` = 13;
UPDATE `Tour` SET `city` = 'Hoi An' WHERE `tour_id` = 14;
UPDATE `Tour` SET `city` = 'Hoi An' WHERE `tour_id` = 15;
UPDATE `Tour` SET `city` = 'Hoi An' WHERE `tour_id` = 16;
UPDATE `Tour` SET `city` = 'Hue' WHERE `tour_id` = 17;
UPDATE `Tour` SET `city` = 'Quang Ngai' WHERE `tour_id` = 18;
UPDATE `Tour` SET `city` = 'Nha Trang' WHERE `tour_id` = 19;
UPDATE `Tour` SET `city` = 'Nha Trang' WHERE `tour_id` = 20;
UPDATE `Tour` SET `city` = 'Nha Trang' WHERE `tour_id` = 21;
UPDATE `Tour` SET `city` = 'Quang Binh' WHERE `tour_id` = 22;
UPDATE `Tour` SET `city` = 'Quang Ngai' WHERE `tour_id` = 23;
UPDATE `Tour` SET `city` = 'Ho Chi Minh City' WHERE `tour_id` = 24;
UPDATE `Tour` SET `city` = 'Sa Pa' WHERE `tour_id` = 25;