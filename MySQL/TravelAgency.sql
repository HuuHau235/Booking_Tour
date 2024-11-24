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
    type ENUM('exploration', 'relaxation', 'adventure') NOT NULL
);

INSERT INTO `Tour` VALUES 
(1, 'The Breath of Tam Dao', 'Magnificent mountain scenery in Tam Dao.', 100.00, '2023-05-01', '2023-05-05', 5, 'adventure'), 
(2, 'Journey to Tay Yen', 'Experience the culture of Tay Yen Tu Pagoda and the nature of Bac Giang.', 200.00, '2023-05-06', '2023-05-10', 7, 'exploration'), 
(3, 'Da Lat Fragrance', 'Discover the famous landmarks of dreamy Da Lat city.', 150.00, '2023-05-11', '2023-05-15', 6, 'exploration'), 
(4, 'Xuan Huong Serenade', 'The dreamy city of Da Lat with Xuan Huong Lake.', 300.00, '2023-05-16', '2023-05-20', 8, 'relaxation'), 
(5, 'Red Dragon Da Nang', 'The brilliant Dragon Bridge in Da Nang.', 250.00, '2023-05-21', '2023-05-25', 4, 'exploration'), 
(6, 'Golden in the Sky', 'The majestic Golden Bridge in Da Nang.', 180.00, '2023-05-26', '2023-05-30', 6, 'exploration'), 
(7, 'Eo Gio Adventure', 'An adventurous journey to Eo Gio – a pristine destination in Quy Nhon.', 220.00, '2023-05-31', '2023-06-04', 7, 'adventure'), 
(8, 'The Roof of Indochina', 'Fansipan Summit – the Roof of Indochina.', 190.00, '2023-06-05', '2023-06-09', 5, 'adventure'), 
(9, 'Vibrant Hai Phong', 'Hai Phong – A dynamic port city.', 280.00, '2023-06-10', '2023-06-14', 8, 'exploration'), 
(10, 'Ha Long Wonder', 'Ha Long Bay – A world natural heritage site.', 160.00, '2023-06-15', '2023-06-19', 6, 'exploration'), 
(11, 'Mysterious Long Cave', 'Explore the magnificent caves in Ha Long.', 240.00, '2023-06-20', '2023-06-24', 7, 'adventure'), 
(12, 'Ancient Thang Long', 'Hoan Kiem Lake, one of the most famous landmarks and symbols of Hanoi, Vietnam.', 190.00, '2023-06-25', '2023-06-29', 5, 'relaxation'), 
(13, 'Old Quarter Spirit', 'Hanoi Old Quarter – A glimpse of traditional culture.', 270.00, '2023-06-30', '2023-07-04', 8, 'relaxation'), 
(14, 'Sparkling Hoi An', 'Hoi An Ancient Town illuminated by lanterns.', 150.00, '2023-07-05', '2023-07-09', 6, 'relaxation'), 
(15, 'Hoi An Culture', 'Explore the ancient beauty and unique culture of Hoi An.', 220.00, '2023-07-10', '2023-07-14', 7, 'exploration'), 
(16, 'Hoi An Bridge Pagoda', 'Visit the iconic Bridge Pagoda in Hoi An.', 180.00, '2023-07-15', '2023-07-19', 5, 'exploration'), 
(17, 'Tranquil Hue', 'The imperial city of Hue with its serene beauty.', 260.00, '2023-07-20', '2023-07-24', 8, 'exploration'), 
(18, 'Paradise Ly Son', 'Ly Son Island – A paradise in the ocean.', 140.00, '2023-07-25', '2023-07-29', 6, 'relaxation'), 
(19, 'Vibrant Nha Trang', 'Nha Trang – A lively coastal city.', 210.00, '2023-07-30', '2023-08-03', 7, 'relaxation'), 
(20, 'Nha Trang Sunset', 'Nha Trang Park with its vibrant atmosphere and beautiful sunsets.', 170.00, '2023-08-04', '2023-08-08', 5, 'exploration'), 
(21, 'Peaceful Beach', 'The serene and stunning beaches of Nha Trang.', 200.00, '2023-08-09', '2023-08-13', 5, 'relaxation'), 
(22, 'Dreamy Quang Binh', 'Quang Binh – The kingdom of bridges and poetic lakes.', 180.00, '2023-08-14', '2023-08-18', 5, 'exploration'), 
(23, 'Unique Quang Ngai', 'Experience the unique cultural lifestyle in Quang Ngai.', 160.00, '2023-08-19', '2023-08-23', 5, 'exploration'), 
(24, 'Dynamic Saigon', 'Saigon – The city that never sleeps.', 300.00, '2023-08-24', '2023-08-28', 5, 'relaxation'), 
(25, 'Misty Sa Pa', 'Sa Pa – The misty town with terraced fields.', 320.00, '2023-08-29', '2023-09-02', 5, 'adventure');
 

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


