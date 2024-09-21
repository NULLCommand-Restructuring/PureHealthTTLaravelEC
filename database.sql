/*
 Navicat Premium Data Transfer

 Source Server         : Pure health tt shop
 Source Server Type    : MariaDB
 Source Server Version : 100428
 Source Host           : purehealth-tt.zoneitshop.com:3306
 Source Schema         : purehealthdb

 Target Server Type    : MariaDB
 Target Server Version : 100428
 File Encoding         : 65001

 Date: 19/11/2023 23:34:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usercode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `role` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_usercode_unique`(`usercode`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE,
  UNIQUE INDEX `users_password_unique`(`password`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'AD123456', 'admin', 'purehealthtt@gmail.com', '$2y$10$Koyi2rKu1iZr5YxhfCbtJO8QSFlKQJQC5nuwcHQNENgFGNpiHfrC6', '0866860918', '2002-07-12', 1, 1, '2023-09-29 19:57:03', '2023-10-17 16:55:36');
INSERT INTO `users` VALUES (2, 'CU963268', 'fxter', 'thefxter@gmail.com', '$2y$10$QXcmy/AtZTv9c.xh1CB/IuKneLP4t96K51OOy.0gwwFIkZ/avgExO', '0866860918', '2002-07-12', 2, 1, '2023-09-30 09:19:07', '2023-10-10 08:20:45');
INSERT INTO `users` VALUES (3, 'CU002923', 'quangthinh', 'nguyenhuutaistd1@gmail.com', '$2y$10$80IhBQDx28xcdjcKf7ipw.GVBQlOsILAX1ucZuqXZzN9xkA7MBVFO', '085734873', '2000-08-01', 2, 1, '2023-10-09 13:05:18', NULL);
INSERT INTO `users` VALUES (7, 'CU648342', 'HaQuangThinh', 'haquangthinh081102@gmail.com', '$2y$10$m5yS./keU2kBXqkEOozt2eW8Ddp5BqAfRtRyjbWxB/UvW3xh./VFW', '0327909328', '2002-08-11', 2, 1, '2023-10-11 18:31:04', '2023-10-12 13:00:04');
INSERT INTO `users` VALUES (8, 'CU024160', 'VoTienMinh', 'quangthinh580@gmail.com', '$2y$10$DTI3ehAkIYylryxydHhMLO5Bq7kRolL6ARr5T57ZLJbdHpX.G7Xnm', '0327909328', '2001-05-03', 2, 1, '2023-10-13 21:41:43', '2023-11-03 16:45:32');
INSERT INTO `users` VALUES (9, 'CU907306', 'daothiyenanh', 'maithilananh3001@gmail.com', '$2y$10$Hwc2KaIWHNtykT5QFO0kdeJ6PNEfxhlghfNMZq7j0n9I5.otmz6.u', '0327909328', '1998-03-06', 2, 1, '2023-10-29 14:10:06', '2023-11-05 10:50:53');
INSERT INTO `users` VALUES (10, 'CU273476', 'lymacsau', 'fxt.only.2002@gmail.com', '$2y$10$XxeRaTBY7V1go7oCAJu/Q.JpPSA8iwqHf9ZPU5ABlPPiVSN/32xG2', '0382928177', '2002-12-09', 2, 1, '2023-10-30 00:35:56', '2023-11-02 01:39:06');

-- ----------------------------
-- Table structure for units
-- ----------------------------
DROP TABLE IF EXISTS `units`;
CREATE TABLE `units`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `unitcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `units_unitcode_unique`(`unitcode`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of units
-- ----------------------------
INSERT INTO `units` VALUES (1, 'UN720987', 'Bó', 'Đơn vị dùng cho những sản phẩm rau có giá bán theo từng bó', '2023-10-02 01:21:27', '2023-10-02 01:21:27');
INSERT INTO `units` VALUES (2, 'UN809816', 'Kg', 'Đơn vị dùng cho những sản phẩm có giá bán theo cân nặng', '2023-10-02 01:31:11', '2023-10-02 01:31:11');
INSERT INTO `units` VALUES (5, 'UN214022', 'Quả', 'Đơn vị bán hàng dành cho những thực phẩm bán theo quả', '2023-11-01 19:18:39', '2023-11-01 19:18:39');

-- ----------------------------
-- Table structure for types
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `typecode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `typename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `types_typecode_unique`(`typecode`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES (1, 'TY654916', 'Rau ăn lá', 'Là loại rau có lá ăn được', 1, '2023-10-03 17:53:55', '2023-10-10 08:26:40');
INSERT INTO `types` VALUES (2, 'TY453090', 'Rau ăn củ', 'Là loại rau có củ ăn được', 1, '2023-10-03 17:54:01', '2023-10-05 05:28:15');
INSERT INTO `types` VALUES (3, 'TY265870', 'Rau ăn hoa', 'Là loại rau có hoa ăn được', 1, '2023-10-03 17:54:07', '2023-10-05 05:28:45');
INSERT INTO `types` VALUES (7, 'TY623304', 'Rau ăn thân', 'Là loại rau có thân ăn được', 1, '2023-10-03 17:54:15', '2023-10-05 05:29:38');
INSERT INTO `types` VALUES (9, 'TY866555', 'Rau gia vị', 'Là loại rau thơm làm gia vị', 1, '2023-10-03 17:54:21', '2023-10-05 05:30:25');
INSERT INTO `types` VALUES (11, 'TY790518', 'Nấm', 'Các loại nấm hữu cơ', 1, '2023-10-05 05:31:11', '2023-10-05 05:31:11');
INSERT INTO `types` VALUES (12, 'TY362579', 'Hoa quả', 'Hoa quả ăn trái', 1, '2023-10-05 05:31:37', '2023-10-05 05:31:37');
INSERT INTO `types` VALUES (13, 'TY874338', 'Rau ăn quả', 'Là loại rau có quả ăn được', 1, '2023-10-05 05:50:13', '2023-10-05 05:50:13');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `productcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `productname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortdescription` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8, 2) NOT NULL,
  `discount` double(8, 2) NOT NULL,
  `unitcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `picturelink` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `typecode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `products_productcode_unique`(`productcode`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 40 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (5, 'PR359944', 'Rau muống hữu cơ', 'Rau muống là loại rau giàu dinh dưỡng, có lợi cho sức khỏe tim mạch, xương khớp, mắt, da, và hệ miễn dịch.', 'Chứng nhận/ Canh tác: Chứng nhận hữu cơ USDA.\r\nCông dụng: Đến 99% người Việt Nam biết về rau muống là một loại rau ăn, quen thuộc và rất gần gũi, gần như tuần nào các gia đình cũng có nó trong bữa ăn. Tuy nhiên, ít ai biết rau muống có nhiều tác dụng tốt như giảm cholesterol, trị vàng da, chữa khó tiêu, táo bón, thiếu máu, phòng chống bệnh tiểu đường, bảo vệ tim mạch,…\r\nGợi ý sử dụng: Rau muống có thể nấu canh, xào, luộc cùng thịt, tôm...\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: 3 - 4 ngày tùy điều kiện bảo quản.', 37000.00, 10.00, 'UN720987', '/storage/uploads/2023/10/03/123123123dadwdw.jpg', 'TY654916', 1, '2023-10-03 02:49:22', '2023-10-05 05:35:02');
INSERT INTO `products` VALUES (6, 'PR937974', 'Cải bẹ xanh hữu cơ', 'Cải bẹ xanh là nguồn cung cấp vitamin K, vitamin C, và chất xơ dồi dào, giúp tăng cường hệ miễn dịch, bảo vệ sức khỏe tim mạch, và cải thiện tiêu hóa.', 'Chứng nhận/ Canh tác: Chứng nhận hữu cơ USDA.\r\nCông dụng: Cải bẹ xanh có lượng calorie thấp nhưng lại nhiều chất xơ cùng các vitamin và khoáng chất thiết yếu. Đặc biệt, chúng là nguồn cung cấp vitamin C và K dồi dào. Theo y học cổ truyền, cải bẹ xanh có vị cay, tính ôn với tác dụng thanh nhiệt, giải độc, giải cảm hàn, thông đàm, lợi khí và lợi tiểu.\r\nTrong cải bẹ xanh có các hợp chất có tác dụng kiềm chế cholesterol. Do vậy, nếu ăn rau cải thường xuyên sẽ gián tiếp hỗ trợ tim, tốt cho mạch máu của cơ thể. Đặc biệt, khi cải bẹ xanh được chế biến theo cách luộc, hấp thì hiệu quả trong việc giảm lượng cholesterol lớn hơn, so với ăn sống.\r\nGợi ý sử dụng: Có thể luộc, dùng làm rau sống ăn kèm, xào hay nấu canh cùng mọc heo, thịt xay, cá thác lác...\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: 2 - 3 ngày tùy điều kiện bảo quản.', 34000.00, 0.00, 'UN720987', '/storage/uploads/2023/10/03/23123.png', 'TY654916', 1, '2023-10-03 02:50:21', '2023-10-05 05:57:23');
INSERT INTO `products` VALUES (7, 'PR737451', 'Cải thìa hữu cơ', 'Cải thìa là thực phẩm giàu dinh dưỡng, có tác dụng phòng ngừa ung thư, tốt cho tim mạch, mắt, và hệ tiêu hóa.', 'Chứng nhận/ Canh tác: Chứng nhận hữu cơ USDA.\r\nCông dụng: Cải thìa là loại rau rất gần gũi với các món ăn của người Việt Nam và Trung Hoa. Rau giòn, vị ngon, ngọt. Cải thìa có chứa folate, kali và canxi giúp xương chắc khỏe. Các chất thuộc nhóm carotenoid trong cải thìa có tác dụng như chất làm chậm quá trình oxi hóa và giảm việc hình thành những nguồn gốc có hại trong cơ thể.\r\nGợi ý sử dụng: Cải thìa có thể luộc, xào hay nấu canh.\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: 3 - 6 ngày tùy điều kiện bảo quản.', 28000.00, 4.00, 'UN720987', '/storage/uploads/2023/10/03/wdwdwwvawdwdwdwdwdwwwwwdw.png', 'TY654916', 1, '2023-10-03 02:51:10', '2023-10-05 05:57:34');
INSERT INTO `products` VALUES (8, 'PR747044', 'Xà lách romaine', 'Xà lách romaine là nguồn cung cấp chất chống oxy hóa, vitamin và khoáng chất dồi dào, giúp tăng cường sức khỏe tim mạch, xương khớp, thị lực và làn da.', 'Chứng nhận/ Canh tác: Canh tác theo hướng hữu cơ.\r\nCông dụng: Xà lách Romaine giàu Vitamin A, Vitamin K, Vitamin C, Magiê, chất xơ và ít protein. Xà lách Romaine có tác dụng hỗ trợ tiêu hóa và tốt cho gan, giảm nguy cơ mắc bệnh tim mạch, các cơn nhồi máu cơ tim, ung thư, nứt cột sống, thiếu máu, chứng mất ngủ do căng thẳng. Ngoài ra Vitamin C và Beta – Carotene kết hợp với nhau để phòng chống sự oxy hóa.\r\nGợi ý sử dụng: Dùng chung với cà chua bi, củ cải đỏ, ớt chuông, dưa leo và dầu olive, bạn sẽ có ngay một đĩa salad hoàn hảo và đầy đủ chất xơ.\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: 3 - 4 ngày tùy điều kiện bảo quản.', 23000.00, 50.00, 'UN809816', '/storage/uploads/2023/10/03/wwwwwwdwdwdwoqokwokdw.png', 'TY654916', 1, '2023-10-03 03:14:05', '2023-10-05 05:57:44');
INSERT INTO `products` VALUES (9, 'PR831048', 'Cần tây siêu sạch', 'Rau xanh chứa chất chống oxy hóa, tốt cho tim mạch và tiêu hóa.', 'Công dụng: Không chỉ là loại rau dễ dàng kết hợp với nhiều món ăn, cần tây còn được ví như “cây thuốc quý” đa năng có thể phòng chống nhiều chứng bệnh nguy hiểm, kể cả ung thư. Trong cần tây có lượng canxi, sắt, phốt pho, protid nhiều gấp đôi so với các loại rau khác. Các axít amin tự do, tinh dầu, mannitol, inositol, các loại vitamin trong cần tây hỗ trợ tuần hoàn máu, tăng cường khả năng miễn dịch và bổ não. Những người mắc bệnh thiếu máu, bệnh Hodgkin (Bệnh Hodgkin là một loại ung thư hạch, bệnh ung thư máu bắt đầu trong hệ bạch huyết), các chứng xuất huyết uống nước ép cần tây sẽ rất hiệu quả trong điều trị bệnh, do cần tây chứa nhiều magnesium và sắt. Các chất xơ trong cần tây giúp loại bỏ cholesterol trong máu, cải thiện sức khỏe tim mạch.\r\nGợi ý sử dụng: Mỗi ngày uống một cốc nước ép cần tây sẽ giảm nguy cơ bệnh tật, thanh lọc cơ thể và giữ cân nặng trong tầm kiểm soát. Cần tây cũng thích hợp để xào cùng với mực, hành tây và cà rổt.\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: 3 - 6 ngày tùy điều kiện bảo quản.', 13000.00, 1.00, 'UN720987', '/storage/uploads/2023/10/03/1.png', 'TY654916', 1, '2023-10-03 03:16:08', '2023-10-05 05:44:47');
INSERT INTO `products` VALUES (10, 'PR211358', 'Bó xôi siêu sạch', 'Cải bó xôi là một siêu thực phẩm giàu dinh dưỡng, có nhiều lợi ích cho sức khỏe, bao gồm: Giảm nguy cơ ung thư, tăng cường sức khỏe tim mạch, tốt cho xương khớp, hỗ trợ thị lực, tăng cường hệ miễn dịch.', 'Chứng nhận/ Canh tác: Canh tác theo hướng hữu cơ.\r\nCông dụng: Bó xôi được ví là \"siêu thực phẩm\" với những công dụng tuyệt vời: giàu sắt, giàu beta-carotene giúp ngăn ngừa bệnh hen suyễn, ngăn ngừa ung thư, giàu vitamin K giúp cải thiện sự hấp thụ canxi và giảm bài tiết canxi qua nước tiểu, mang lại sức sống cho da và tóc nhờ chứa vitamin C và collagen.\r\nGợi ý sử dụng: Thật dễ dàng để bổ sung bó xôi vào chế độ ăn uống hàng ngày bằng cách nấu súp hoặc trộn salad, làm sinh tố hoặc ép nước...\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: 2 -3 ngày tùy điều kiện bảo quản.', 20000.00, 12.00, 'UN720987', '/storage/uploads/2023/10/03/2.jpg', 'TY654916', 1, '2023-10-03 03:18:33', '2023-10-05 05:58:01');
INSERT INTO `products` VALUES (11, 'PR133404', 'Củ nghệ siêu sạch', 'Nghệ là một loại gia vị có nhiều lợi ích sức khỏe, bao gồm chống viêm, giảm đau, cải thiện tiêu hóa và hỗ trợ hệ miễn dịch.', 'Chứng nhận/ Canh tác: Canh tác theo hướng hữu cơ.\r\nCông dụng: Nghệ là một trong những gia vị quen thuộc trong nấu ăn. Nghệ có chứa nhiều dưỡng chất, đặc biệt là curcumin – có khả năng kháng viêm, hỗ trợ người bị viêm loét dạ dày và hội chứng ruột kích thích. Chất curcumin có trong nghệ còn ngừa ung thư.\r\nGợi ý sử dụng: Nghệ không chỉ góp phần tạo màu sắc cho món ăn thêm hấp dẫn, mà còn giúp món ăn ngon hơn, đậm đà hơn, giúp khử mùi tanh của cá, lươn...\r\nHướng dẫn bảo quản: Nghệ hoàn toàn có thể bảo quản ở nhiệt độ bình thường, nhất là mùa đông, nghệ giữ tươi được khá lâu. Bạn cũng có thể dùng giấy bạc quấn chặt củ gừng và để ở nơi thoáng mát.\r\nHạn sử dụng: 3 - 6 ngày tùy điều kiện bảo quản.', 22000.00, 12.00, 'UN809816', '/storage/uploads/2023/10/03/3.png', 'TY453090', 1, '2023-10-03 03:20:57', '2023-10-05 05:45:57');
INSERT INTO `products` VALUES (12, 'PR990362', 'Khoai sọ siêu bột', 'Khoai sọ là nguồn cung cấp chất xơ, vitamin C và kali dồi dào, giúp giảm nguy cơ mắc bệnh tim, cải thiện tiêu hóa và tăng cường hệ miễn dịch.', 'Chứng nhận/ Canh tác: Canh tác theo hướng hữu cơ.\r\nCông dụng: Một trong những lợi ích to lớn nhất của khoai sọ là kích thích hoạt động tiêu hóa trong cơ thể. Ngăn ngừa các loại bệnh ung thư. Ngăn ngừa bệnh tiểu đường. Có lợi cho huyết áp và giúp tim khỏe mạnh.\r\nGợi ý sử dụng: Nấu các món chè, canh, làm trà sữa, chiên, cà ri.\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh hoặc nơi khô ráo, thoáng mát.\r\nHạn sử dụng: 7 - 10 ngày tùy điều kiện bảo quản.', 54000.00, 1.00, 'UN809816', '/storage/uploads/2023/10/03/4.jpg', 'TY453090', 1, '2023-10-03 03:21:32', '2023-10-05 06:18:34');
INSERT INTO `products` VALUES (13, 'PR150328', 'Củ cải đỏ hữu cơ', 'Củ cải đỏ chứa nhiều vitamin và khoáng chất tốt cho sức khỏe, bao gồm vitamin C, kali, folate và chất xơ. Củ cải đỏ còn có tác dụng chống oxy hóa, giúp bảo vệ cơ thể khỏi tác hại của các gốc tự do.', 'Chứng nhận/ Canh tác: Canh tác theo hướng hữu cơ.\r\nCông dụng: Trong củ cải đỏ chứa nhiều vitamin như vitamin A, B9, C (có nhiều nhất trong lá củ cải đỏ) và các khoáng chất cần thiết khác như: sắt, axit folic, kali, magie,... Màu củ cải đỏ là do chứa chất beta cyanin. Chất này có khả năng loại bỏ các độc tố có trong gan, giúp giải độc gan và ngăn chặn sự thành của các lớp mô mỡ trong cơ thể. Đồng thời, beta cyanin có trong củ cải đỏ còn rất tốt đối với bệnh tim mạch.\r\nGợi ý sử dụng: Củ cải đỏ thích hợp làm salad, món súp, hầm...\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ.\r\nHạn sử dụng: 3 - 5 ngày tùy điều kiện bảo quản.', 54000.00, 10.00, 'UN809816', '/storage/uploads/2023/10/03/5.png', 'TY453090', 1, '2023-10-03 03:23:34', '2023-10-05 06:18:44');
INSERT INTO `products` VALUES (14, 'PR722342', 'Hành tây siêu sạch', 'Hành tây là thực phẩm giàu chất chống oxy hóa, giúp giảm nguy cơ mắc bệnh tim, ung thư và cải thiện sức khỏe tim mạch.', 'Chứng nhận/ Canh tác: Canh tác theo hướng hữu cơ - Quá trình canh tác hoàn toàn không sử dụng phân bón hóa học, thuốc diệt cỏ, thuốc bảo vệ thực vật và chất kích thích tăng trưởng.\r\nCông dụng: Hành tây cung cấp một nguồn vitamin C, B6, sắt, kali và mangan để bảo vệ cơ thể khỏi cái lạnh và cảm cúm. Ngoài ra còn giàu Organosulfurs và các Flavonoid có thể giúp ngăn ngừa bệnh tim và tăng cường sức khỏe tim mạch. Nhờ chứa nhiều vitamin A, E và C mà hành tây có thể hỗ trợ tăng cường sức khỏe và bảo vệ da.\r\nGợi ý sử dụng: Dùng trong các món chiên, nướng, hấp, xào, kho, sốt. Cách chế biến hành tây thông dụng là trộn dầu giấm ăn sống, trộn chung trong đĩa salad, làm tăng hương vị cho các món gỏi (gỏi ngó sen, gỏi su hào, gỏi dưa leo, gỏi cóc…), hoặc chiên xào với các loại thịt, trứng, nấu súp, cà ri…\r\nHướng dẫn bảo quản: Phải đảm bảo độ thông hơi để giữ cho hành luôn được thông thoáng, khô ráo. Không dùng túi nhựa hoặc hộp kín để bảo quản hành vì chúng sẽ ngăn sự lưu thông không khí, khiến hành nhanh bị thối, mốc.\r\nHạn sử dụng: 3 - 5 tuần nếu bảo quản trong tủ lạnh.', 50000.00, 10.00, 'UN809816', '/storage/uploads/2023/10/03/6.png', 'TY453090', 1, '2023-10-03 03:24:21', '2023-10-05 08:06:24');
INSERT INTO `products` VALUES (15, 'PR683586', 'Cà chua beef siêu sạch', 'Dùng trực tiếp, làm nước ép, sinh tố hay chế biến món ăn như nấu canh, chiên, xào, làm sốt.', 'Mô tả ngắn: Cà chua beef giàu lycopene, chất chống oxy hóa giúp giảm nguy cơ ung thư, cải thiện thị lực và sức khỏe tim mạch.\r\nMô tả: \r\nChứng nhận/Canh tác: Canh tác theo hướng hữu cơ.\r\nCông dụng: Cà chua có kích thước và màu sắc hấp dẫn, hương vị ngon ngọt và hàm lượng dinh dưỡng phong phú. Cà chua mang một số lợi ích tuyệt vời đối với sức khỏe như: tăng cường sức khỏe tim mạch, ngăn ngừa ung thư, tốt cho chăm sóc tóc và da.\r\nGợi ý sử dụng: Dùng trực tiếp, làm nước ép, sinh tố hay chế biến món ăn như nấu canh, chiên, xào, làm sốt.\r\nHướng dẫn bảo quản: Bảo quản mát.\r\nHạn sử dụng: 3 - 5 ngày nếu bảo quản trong tủ lạnh', 120000.00, 30.00, 'UN809816', '/storage/uploads/2023/10/03/6.jpg', 'TY874338', 1, '2023-10-03 03:25:15', '2023-10-05 08:06:57');
INSERT INTO `products` VALUES (16, 'PR442854', 'Đậu cove siêu sạch', 'Đậu cove là nguồn cung cấp chất xơ, protein, vitamin và khoáng chất dồi dào, có lợi cho sức khỏe tim mạch, tiêu hóa, xương khớp và thị lực.', 'Chứng nhận/ Canh tác: Canh tác theo hướng hữu cơ.\r\nCông dụng: Một số lợi ích sức khỏe của đậu que: tăng cường sức khỏe tim mạch; ngăn ngừa ung thư ruột già và điều trị các vấn đề về dạ dày, ruột; cải thiện sức khỏe xương; tốt cho mắt. Vitamin B12, magie, chất xơ và folate trong đậu que giúp giảm cholesterol, ngừa bệnh cao huyết áp và thúc đẩy lưu thông tuần hoàn máu.\r\nGợi ý sử dụng: Đậu que có thể xào với thịt, luộc chấm kho quẹt.\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: 3 - 6 ngày tùy điều kiện bảo quản.', 14000.00, 1.00, 'UN809816', '/storage/uploads/2023/10/03/10.jpg', 'TY874338', 1, '2023-10-03 03:28:28', '2023-10-05 05:52:23');
INSERT INTO `products` VALUES (17, 'PR403225', 'Dưa leo hữu cơ', 'Dưa leo là loại quả chứa nhiều nước, chất xơ, vitamin C và các khoáng chất khác, giúp bổ sung nước, hỗ trợ tiêu hóa, đẹp da và giảm cân.', 'Chứng nhận/ Canh tác: Chứng nhận hữu cơ USDA & EU.\r\nCông dụng: Dưa leo chứa hàm lượng calo thấp nhưng lại rất giàu dưỡng chất quan trọng cho cơ thể. Ngoài hàm lượng nước cao thì dưa leo chứa rất nhiều vitamin, khoáng chất đa dạng như vitamin C, K, magie, kali, mangan… Do đó, bạn có thể cung cấp vitamin và khoáng chất hiệu quả bằng cách ăn dưa leo mỗi ngày.\r\nGợi ý sử dụng: Dưa leo được dùng trực tiếp, hay trong các món xào, gỏi, salad.. hoặc ép làm nước giải khát.\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: 3 - 6 ngày tùy điều kiện bảo quản.', 45000.00, 20.00, 'UN809816', '/storage/uploads/2023/10/03/11.jpg', 'TY874338', 1, '2023-10-03 03:29:10', '2023-10-05 05:53:40');
INSERT INTO `products` VALUES (18, 'PR868381', 'Măng tây siêu sạch', 'Măng tây là thực phẩm giàu chất dinh dưỡng, tốt cho sức khỏe tim mạch, tiêu hóa, miễn dịch,...', 'Chứng nhận/ Canh tác: Canh tác theo hướng hữu cơ.\r\nCông dụng: Măng tây xanh thường được sử dụng như một món ăn đơn thuần nhưng có hàm lưỡng dinh dưỡng cao và có nhiều dược tính. Một số lợi ích sức khỏe của măng tây xanh: tốt cho tim mạch và đường ruột; tăng cường hệ miễn dịch; ngăn ngừa lão hóa và loãng xương; ngăn ngừa ung thu; tốt cho phụ nữ mang thai.\r\nGợi ý sử dụng: Luộc, xào, ngâm đá ăn sống, chế biến với nguyên liệu khác... Riêng phần gốc bào bỏ vỏ trước khi chế biến.\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: Trong vòng 7 ngày kể từ ngày đóng gói.', 4000.00, 10.00, 'UN720987', '/storage/uploads/2023/10/03/12.jpg', 'TY623304', 1, '2023-10-03 03:29:46', '2023-10-05 05:54:48');
INSERT INTO `products` VALUES (19, 'PR231454', 'Giá đỗ hữu cơ', 'Giá đỗ là nguồn dinh dưỡng dồi dào, tốt cho tiêu hóa, tăng cường sức đề kháng. Tốt cho tiêu hóa, giúp ngăn ngừa táo bón, chứa nhiều chất dinh dưỡng, bao gồm protein, vitamin, và khoáng chất.', 'Chứng nhận: Nguyên liệu đậu xanh chứng nhận hữu cơ.\r\nThành phần: 100% Giá đậu xanh.\r\nGợi ý sử dụng: Có thể sử dụng đậu để nấu canh, nấu súp, xào, trộn salad,...\r\nHướng dẫn bảo quản: Bảo quản ngăn mát tủ lạnh.\r\nHạn sử dụng: Dùng trong 2-3 ngày.', 35000.00, 0.00, 'UN809816', '/storage/uploads/2023/10/03/13.jpg', 'TY623304', 1, '2023-10-03 03:30:24', '2023-10-05 05:55:34');
INSERT INTO `products` VALUES (20, 'PR763222', 'Hành baro siêu sạch', 'Dùng làm gia vị cho các món xào, kho, sốt.', 'Chứng nhận/ Canh tác: Canh tác theo hướng hữu cơ - Quá trình canh tác hoàn toàn không sử dụng phân bón hóa học, không thuốc diệt cỏ, không thuốc bảo vệ thực vật và không chất kích thích tăng trưởng.\r\nCông dụng: Không chỉ tạo nên hương vị đặc biệt cho các món ăn, hành baro cũng là nguồn giàu dưỡng chất, mang lại nhiều lợi ích cho sức khỏe. Một số lợi ích mà hành baro mang đến: hỗ trợ điều trị ung thư; bảo vệ tim mạch; giúp thai kì khỏe mạnh; giảm cholesterol xấu; giúp giảm cân an toàn; tăng cường tiêu hóa; chống viêm, kháng khuẩn; tốt cho não bộ, mắt và nhiều bộ phận khác.\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: 3 - 6 ngày tùy điều kiện bảo quản.', 46000.00, 10.00, 'UN809816', '/storage/uploads/2023/10/03/14.png', 'TY866555', 1, '2023-10-03 03:31:56', '2023-10-05 05:57:12');
INSERT INTO `products` VALUES (21, 'PR412375', 'Nấm đùi gà hữu cơ', 'Nấm đùi gà chứa nhiều chất dinh dưỡng, bao gồm protein, vitamin, và khoáng chất, tốt cho tiêu hóa, giúp ngăn ngừa táo bón, phòng ngừa một số bệnh tật, chẳng hạn như ung thư, tiểu đường, và loãng xương.', 'Chứng nhận/ Canh tác: Chứng nhận hữu cơ tiêu chuẩn USDA, EU.\r\nCông dụng: Nấm đùi gà tốt cho hệ tiêu hóa, phòng chống bệnh tiểu đường, giúp tăng cường miễn dịch.\r\nGợi ý sử dụng: Nấm đùi gà dùng để chế biến được nhiều món ăn: soup, cháo, nấu lẩu, xào, kho, chiên, rán.\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: Sử dụng trong vòng 7 ngày.', 150000.00, 0.00, 'UN809816', '/storage/uploads/2023/10/03/15.jpg', 'TY790518', 1, '2023-10-03 03:32:53', '2023-10-05 08:08:04');
INSERT INTO `products` VALUES (22, 'PR059424', 'Bông cải trắng', 'Bông cải trắng ngăn ngừa ung thư, tốt cho tiêu hóa, bổ sung dinh dưỡng.', 'Chứng nhận/ Canh tác: Canh tác theo hướng hữu cơ - Quá trình canh tác hoàn toàn không sử dụng phân bón hóa học, thuốc diệt cỏ, thuốc bảo vệ thực vật và chất kích thích tăng trưởng.\r\nCông dụng: Bông cải trắng giàu dưỡng chất thực vật, giàu chất chống viêm, chống ung thư, tốt cho bệnh tim mạch, ngăn ngừa bệnh ở não.\r\nHạn sử dụng: Gợi ý sử dụng: Hấp, xào tỏi, làm salad khoai hay đơn giản nấu canh xương.\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: 3 - 4 ngày tùy điều kiện bảo quản.', 130000.00, 30.00, 'UN809816', '/storage/uploads/2023/10/03/wwww123.jpg', 'TY265870', 1, '2023-10-03 04:08:05', '2023-10-05 05:59:44');
INSERT INTO `products` VALUES (23, 'PR904651', 'Bông cải xanh', 'Bông cải xanh giàu dinh dưỡng, ngừa ung thư, tốt cho xương.', 'Chứng nhận/ Canh tác: Canh tác theo hướng hữu cơ - Quá trình canh tác hoàn toàn không sử dụng phân bón hóa học, thuốc diệt cỏ, thuốc bảo vệ thực vật và chất kích thích tăng trưởng.\r\nCông dụng: Bông cải xanh là chứa nhiều vitamin và khoáng chất và đặc biệt giàu protein hơn phần lớn các loại rau củ khác. Bông cải xanh còn chứa nhiều hợp chất caroten, giúp cải thiện và ngăn ngừa các bệnh về mắt.\r\nGợi ý sử dụng: Bông cải xanh có thể chế biến theo nhiều cách, nhưng hấp là phương pháp chế biến giúp giữ lại nhiều dưỡng chất nhất.\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: 3 - 6 ngày tùy điều kiện bảo quản.', 34000.00, 12.00, 'UN809816', '/storage/uploads/2023/10/03/123123dwdww.jpg', 'TY265870', 1, '2023-10-06 04:08:47', '2023-10-05 08:08:24');
INSERT INTO `products` VALUES (24, 'PR023824', 'Nấm hương hữu cơ', 'Nấm hương tốt cho tim mạch, tăng cường miễn dịch, ngăn ngừa ung thư.', 'Chứng nhận/ Canh tác: Chứng nhận hữu cơ USDA, chứng nhận hữu cơ EU.\r\nCông dụng: Nấm hương hữu cơ chứa các vitamin B1, B2, B6, B12, Kali, Sắt, Protein, Beta glucose và axit nucleic, lượng calo thấp, giàu chất xơ và khoáng chất giúp ngăn ngừa các bệnh về tim mạch, hỗ trợ giảm cân, tốt cho làn da, tăng cường hệ miễn dịch.\r\nGợi ý sử dụng: Nấm hương dùng để chế biến được nhiều món ăn: soup, cháo, nấu lẩu, xào, kho.\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: Sử dụng trong vòng 7 ngày.', 38000.00, 3.00, 'UN809816', '/storage/uploads/2023/10/05/sdfdfggh15fg4h8fgh48fg.jpg', 'TY790518', 1, '2023-10-05 06:04:17', '2023-10-05 06:04:17');
INSERT INTO `products` VALUES (25, 'PR851281', 'Nấm mỡ trắng', 'Nấm mỡ trắng Chứa nhiều chất dinh dưỡng, bao gồm protein, vitamin, và khoáng chất, tốt cho tiêu hóa, giúp ngăn ngừa táo bón, có đặc tính chống ung thư.', 'Chứng nhận/ Canh tác: Canh tác theo hướng hữu cơ - Quy trình được trồng hoàn toàn không sử dụng phân bón hóa học, thuốc diệt cỏ, thuốc bảo vệ thực vật và chất kích thích tăng trưởng.\r\nCông dụng: Nấm mỡ có công dụng bổ tỳ, nhuận phế, hóa đàm, tiêu thực. Đây là thực phẩm thích hợp cho những người chán ăn, mệt mỏi do tỳ vị hư yếu, sản phụ thiếu sữa, người viêm phế quản mạn, viêm gan mạn và mắc hội chứng suy giảm bạch cầu.Nấm mỡ rất giàu đạm, nguyên tố vi lượng và nhiều loại axit amin quý. Nó có tác dụng ức chế tụ cầu vàng, trực khuẩn thương hàn và trực khuẩn e.coli.\r\nGợi ý sử dụng: Nấm mỡ là loại nấm ăn được trồng phổ biến nhất trên thế giới bởi chúng dễ trồng, có giá trị dinh dưỡng cao rất tốt cho cơ thể. Nấm chủ yếu được sử dụng trong chế biến các món ăn bằng cách chiên, xào, nấu, nướng… qua đó đem lại giá trị dinh dưỡng nhất định cho người sử dụng chúng.\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: 3 - 4 ngày tùy điều kiện bảo quản.', 35000.00, 2.00, 'UN720987', '/storage/uploads/2023/10/05/sdfsd5f4d68g4d684drg.jpg', 'TY654916', 1, '2023-10-05 06:06:27', '2023-10-05 06:06:27');
INSERT INTO `products` VALUES (26, 'PR586023', 'Sả thơm hữu cơ', 'Sả có thể giúp kích thích tiêu hóa, giảm đầy hơi, khó tiêu. Sả có thể giúp tăng cường trao đổi chất, đốt cháy calo, hỗ trợ giảm cân. Sả có thể giúp tăng cường trao đổi chất, đốt cháy calo, hỗ trợ giảm cân.', 'Chứng nhận/ Canh tác: Chứng nhận hữu cơ USDA.\r\nCông dụng: Sả là một loại gia vị tuyệt vời trong bữa ăn hàng ngày và là vị thuốc tốt cho sức khỏe có tác dụng ngăn ngừa ung thư, giải cảm, giải độc và giảm cân.\r\nGợi ý sử dụng: Để pha nước uống, cách đơn giản là dùng một bó sả giã nát nấu với nước lọc, sau đó gạn lấy một chén nước uống. Sả băm ra cũng có thể làm gia vị để chiên, xào, nấu,...\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: 3 - 6 ngày tùy điều kiện bảo quản.', 12000.00, 1.00, 'UN720987', '/storage/uploads/2023/10/05/sd8f4s68e4s68fse89f4sf98srg.jpg', 'TY866555', 1, '2023-10-05 06:08:54', '2023-10-05 06:08:54');
INSERT INTO `products` VALUES (27, 'PR283308', 'Đậu phộng tươi', 'Đậu phộng tươi giúp giảm cholesterol xấu, tăng cholesterol tốt, và giảm nguy cơ mắc bệnh tim mạch. Chứa các chất chống oxy hóa giúp ngăn ngừa ung thư. Đậu phộng tươi chứa nhiều protein, chất béo lành mạnh, chất xơ, vitamin, và khoáng chất.', 'Chứng nhận/ Canh tác: Canh tác theo hướng hữu cơ.\r\nCông dụng: Đậu phộng chứa vitamin E, protein, khoáng chất như mangan, hỗ trợ cơ thể hấp thu canxi và ổn định đường huyết. Các dưỡng chất trong đậu phộng còn có tác dụng hỗ trợ kiểm soát hàm lượng cholesterol có trong máu. Đậu phộng thích hợp dùng làm nguyên liệu chế biến nhiều món ngon.\r\nGợi ý sử dụng: Có thể dùng rau dưới dạng luộc,xào, nấu canh, nấu xôi, nấu chè, làm bánh.\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: 3 - 6 ngày tùy điều kiện bảo quản.', 25000.00, 3.00, 'UN809816', '/storage/uploads/2023/10/05/sd168g4d1r86g468df1d6r8g.jpg', 'TY453090', 1, '2023-10-04 06:09:56', '2023-10-05 06:09:56');
INSERT INTO `products` VALUES (28, 'PR018429', 'Gừng hữu cơ', 'Gừng có chứa các hợp chất chống viêm, giúp giảm đau và sưng tấy. Giúp giảm đau đầu, đau cơ, đau nhức khớp,... Gừng giúp kích thích tiêu hóa, giảm đầy hơi, khó tiêu,...', 'Chứng nhận/ Canh tác: Canh tác theo hướng hữu cơ.\r\nCông dụng: Củ gừng có vị cay và hương thơm đặc biệt, có thể dùng để điều vị thêm hương, là thứ gia vị vô cùng hấp dẫn và không thể thiếu trong cuộc sống.\r\nGừng sống ngọt, cay nhưng ấm, trong đông y có công dụng tán hàn ôn trung, phát hãn, làm ấm tỳ vị, chống nôn, sát khuẩn, giảm đau, chống viêm, còn có thể thư giãn mao mạch, tăng cường tuần hoàn máu, kích thích dạ dày hỗ trợ tiêu hóa.\r\nGợi ý sử dụng: Gừng có thể ăn tươi hoặc chế biến vào các món ăn, ngâm muối, ngâm chua, gia công thành nước gừng, bột gừng, rượu gừng, gừng khô, hay chiết xuất hương liệu...\r\nHướng dẫn bảo quản: Trước khi cho gừng tươi vào tủ lạnh bảo quản, bạn cần bọc củ gừng với một miếng giấy bạc/miếng bọc thực phẩm hoặc quấn khăn vải xung quanh gừng sau đó cho gừng vào túi nilon kín rồi mới đặt vào ngăn mát của tủ lạnh.\r\nHạn sử dụng: 5- 7 ngày tùy điều kiện bảo quản.', 15000.00, 40.00, 'UN809816', '/storage/uploads/2023/10/05/d6851d468g4df6g51df6g.jpg', 'TY866555', 1, '2023-10-05 06:12:02', '2023-10-06 21:18:36');
INSERT INTO `products` VALUES (29, 'PR735675', 'Tỏi hữu cơ', 'Tỏi tăng cường miễn dịch, phòng ngừa bệnh tim mạch, hỗ trợ tiêu hóa.', 'Chứng nhận/ Canh tác: Chứng nhận hữu cơ USDA.\r\nCông dụng: Tỏi có chứa protein, carbohydrates, calo và một số dưỡng chất quan trọng khác như vitamin B, sắt, magie, canxi, kali, mangan, photpho,... Ăn tỏi sống mỗi ngày không chỉ phòng ngừa nguy cơ bị cảm cúm mà còn có công dụng tốt trong việc ngăn ngừa hình thành các mô liên kết và chuyển hóa xương. Những người thường xuyên ăn tỏi sẽ có khả năng hấp thụ canxi tốt hơn và từ đó xương cũng chắc khỏe hơn. Ngoài ra, chất allicin trong tỏi có khả năng loại bỏ các chất độc hại ra khỏi cơ thể và bên cạnh đó tăng cường các tế bào bạch cầu khỏe mạnh.\r\nGợi ý sử dụng: Tỏi thường được dùng làm gia vị cho các món ăn trong nhiều gia đình Việt. Ngoài ra, tỏi còn có thể ngâm dấm hoặc chế biến thành các loại thuốc có ích cho sức khỏe.\r\nHướng dẫn bảo quản: Bảo quản nơi khô ráo, thoáng mát.\r\nHạn sử dụng: Trong 7 đến 10 ngày.', 18000.00, 2.00, 'UN809816', '/storage/uploads/2023/10/05/sdf51sd68f4fd68g.jpg', 'TY866555', 1, '2023-10-05 06:12:53', '2023-10-05 06:12:53');
INSERT INTO `products` VALUES (30, 'PR924479', 'Cải ngọt hữu cơ', 'Cải ngọt bổ sung chất xơ, vitamin, khoáng chất, tốt cho tiêu hóa và sức khỏe tim mạch.', 'Chứng nhận/ Canh tác: Chứng nhận hữu cơ USDA.\r\nCông dụng: Cải ngọt có hơn 10 loại vitamin cần thiết cho cơ thể, trong đó, hàm lượng canxi, vitamin A và vitamin K rất dồi dào, với một lượng đáng kể vitamin B9 và vitamin E. Chính vì thế, rau cải ngọt còn có tác dụng nâng cao sức đề kháng, bảo vệ cơ thể khỏi các tác nhân gây bệnh.\r\nRau cải ngọt tuy là một loại rau thông dụng nhưng rất bổ dưỡng. Thêm cải ngọt vào bữa ăn hàng ngày giúp ngăn ngừa mụn nhọt, cải thiện sức khỏe tim mạch, phòng chống ung thư, hỗ trợ điều trị bệnh gout, tăng sức đề kháng, giúp xương chắc khỏe và rất tốt cho hệ tiêu hóa.\r\nGợi ý sử dụng: Có thể dùng rau dưới dạng luộc, xào, nấu canh cùng các loại tôm, thịt.\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: 2 - 3 ngày tùy điều kiện bảo quản.', 19000.00, 1.00, 'UN720987', '/storage/uploads/2023/10/05/sdf816f84dg46d8h4fg68h4h.jpg', 'TY654916', 1, '2023-10-05 06:13:45', '2023-10-05 06:13:45');
INSERT INTO `products` VALUES (31, 'PR465386', 'Cải xoăn kale', 'Cải xoăn kale chứa nhiều chất dinh dưỡng, bao gồm vitamin, khoáng chất, và chất chống oxy hóa, tốt cho sức khỏe tim mạch, giúp giảm cholesterol và huyết áp, ngừa ung thư.', 'Chứng nhận/ Canh tác: Canh tác theo hướng hữu cơ - Quá trình canh tác hoàn toàn không sử dụng phân bón hóa học, thuốc diệt cỏ, thuốc bảo vệ thực vật và chất kích thích tăng trưởng.\r\nCông dụng: Kale được ví là siêu thực phẩm với những công dụng tuyệt vời của nó: ít calo - giúp kiểm soát cân nặng, có đặc tính thanh lọc, giàu vitamin A, K - giúp giảm xơ vữa động mạch, giàu folate - giúp phát triển não bộ, giàu chất xơ, giàu sắt nên có thể thay thế nguồn thịt bò.\r\nGợi ý sử dụng: Cải kale phù hợp với các món nước ép, sinh tố, salad, nếu canh tôm,...\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: 2-3 ngày tùy điều kiện bảo quản. Kale có thể bảo quản được lâu hơn khi cấp đông.', 25000.00, 3.00, 'UN720987', '/storage/uploads/2023/10/05/df5418d68g4dgf8fg86h4gfh.jpg', 'TY654916', 1, '2023-10-05 06:15:25', '2023-10-05 06:15:25');
INSERT INTO `products` VALUES (32, 'PR084508', 'Bơ sáp 034', 'Bơ chứa chất béo lành mạnh, tốt cho tim mạch, tiêu hóa, da.', 'Chứng nhận/ Canh tác: Canh tác theo hướng hữu cơ.\r\nCông dụng: Quả bơ có chứa nhiều loại khoáng chất như kali, sắt, canxi, kẽm mangan, magie, selen và đồng có đến 14 loại vitamin cần thiết thiết yếu với cơ thể như A, C, E, B2, B6, B5. Các loại vitamin và khoáng chất này có tác dụng cung cấp những chất chống oxy hóa, ngăn ngừa da lão hóa, giúp phòng ngừa các bệnh ung thư hay đục thủy tinh thể.\r\nGợi ý sử dụng: Ăn kèm với sữa đặc hoặc đường, làm sinh tố, mặt nạ,...\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: 3 - 6 ngày tùy điều kiện bảo quản.', 36000.00, 2.00, 'UN809816', '/storage/uploads/2023/10/05/dfg168d648g48h64jg8hj.jpg', 'TY362579', 1, '2023-10-04 06:01:28', '2023-10-06 22:12:25');
INSERT INTO `products` VALUES (33, 'PR376246', 'Dứa hoàng hậu', 'Dứa giúp chống viêm, tăng cường miễn dịch, tốt cho tiêu hóa.', 'Chứng nhận/ Canh tác: Đặc sản vùng miền.\r\nCông dụng: Dứa Hoàng Hậu hay còn gọi là Dứa Gai được trồng ở Nghệ An. Là loại dứa có thịt vàng, miếng dứa giòn và vị ngọt nhiều. Đây là một sản phẩm được Organica chọn lọc từ vùng đất có thời tiết khắc nghiệt ở Bắc Trung Bộ, mùa đông thì lạnh cóng và mùa hè thì bỏng rát với gió Lào. Mùa nào thức ấy, hi vọng đây sẽ là 1 sản phẩm theo mùa và được mọi người yêu thích để năm sau Organica mạnh dạn nhân trồng trong hệ thống vườn của mình.\r\nGợi ý sử dụng: Dứa hoàng hậu trái nhỏ, ép nước rất ngon hoặc bổ miếng dứa ra thơm nức, chấm với xíu muối ớt.\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: 3 - 6 ngày tùy điều kiện bảo quản.', 28000.00, 5.00, 'UN809816', '/storage/uploads/2023/10/05/d6f8d6f8g4fgh684r86dfh.jpg', 'TY362579', 1, '2023-10-05 06:17:13', '2023-10-05 06:17:13');
INSERT INTO `products` VALUES (34, 'PR793651', 'Mồng tơi hữu cơ', 'Rau mồng tơi là loại rau giàu vitamin, khoáng chất và chất xơ, có nhiều lợi ích cho sức khỏe như: thanh nhiệt, giải độc, tăng cường sinh lý, ngăn ngừa loãng xương, cải thiện làn da.', 'Chứng nhận/ Canh tác: Chứng nhận hữu cơ USDA.\r\nCông dụng: Mồng tơi không chỉ là món rau thông thường, trong dân gian rau mồng tơi còn các tác dụng chữa bệnh. Theo đông y, rau mồng tơi có tính hàn, vị chua, tán nhiệt, mất máu, lợi tiểu, giải độc, đẹp da, trị rôm sảy mụn nhọt hiệu quả… rất thích hợp trong mùa nóng. Theo các nghiên cứu cho thấy, trong mồng tơi chứa chất nhầy pectin rất quý để phòng chữa nhiều bệnh, làm cho rau mồng tơi có tác dụng nhuận tràng, thải chất béo chống béo phì, thích hợp cho người có mỡ và đường cao trong máu.\r\nGợi ý sử dụng: Mồng tơi có thể nấu canh với tôm hoặc thịt, cũng có thể nhúng lẫu.\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: 3 - 6 ngày tùy điều kiện bảo quản.', 12000.00, 0.00, 'UN720987', '/storage/uploads/2023/10/10/00s0s0d0w00dw0d00w0d0wdwd.jpg', 'TY654916', 1, '2023-10-10 15:30:54', '2023-10-10 08:30:54');
INSERT INTO `products` VALUES (35, 'PR771002', 'Bắp (ngô) Nữ Hoàng', 'Thực phẩm tốt cho sức khỏe, giúp cải thiện tim mạch, tiêu hóa, miễn dịch và chống oxy hóa.', 'Chứng nhận/ Canh tác: Canh tác theo hướng hữu cơ.\r\nCông dụng: Tốt cho người bị tiểu đường. Chất xơ trong ngô giúp làm chậm quá trình chuyển hóa thức ăn thành đường từ đó giúp hạ lượng đường trong máu. Tăng cường sức khỏe hệ tiêu hóa. Ngô rất giàu chất xơ không hòa tan - chất lợi tiểu.\r\nGợi ý sử dụng: Bắp ngọt và tươi nên thường được dùng ăn sống, trộn salad, ép nước. Dùng luộc, hấp làm sữa bắp. Đây là giống bắp ngọt đầu tiên tại Việt Nam có thể ăn sống mà không cần phải trải qua chế biến\r\nHướng dẫn bảo quản: 3-6 ngày tùy điều kiện bảo quản\r\nHạn sử dụng: 3 - 6 ngày tùy điều kiện bảo quản.', 25000.00, 10.00, 'UN809816', '/storage/uploads/2023/10/30/dffgfghxdffdbghgfhrthyhtyh.jpg', 'TY874338', 1, '2023-10-30 18:44:37', '2023-10-30 11:44:37');
INSERT INTO `products` VALUES (36, 'PR572068', 'Ớt chuông sạch', 'Thực phẩm tốt cho tim mạch, tiêu hóa, miễn dịch và chống oxy hóa.', 'Chứng nhận/ Canh tác: Canh tác theo hướng hữu cơ.\r\nCông dụng: Ớt chuông có hàm lượng vitamin C cao hơn cả cam, chanh, đu đủ, dứa/ thơm. Tại Organica, chúng tôi trồng được những trái ớt chuông hữu cơ có cùi giày, ăn giòn ngọt không khác gì trái cây.\r\nGợi ý sử dụng: Ăn trực tiếp, xào, ép nước, làm salad.\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: 3 - 6 ngày tùy điều kiện bảo quản.', 18000.00, 5.00, 'UN214022', '/storage/uploads/2023/10/30/dgfghfghgfjdfujyuiolfxgtgcgb.jpg', 'TY874338', 1, '2023-10-30 18:46:15', '2023-11-01 19:19:16');
INSERT INTO `products` VALUES (37, 'PR732612', 'DỌC MÙNG (BẠC HÀ) HỮU CƠ', 'Thực phẩm tốt cho sức khỏe, giúp cải thiện tim mạch, tiêu hóa, miễn dịch và chống oxy hóa.', 'Chứng nhận/ Canh tác: Chứng nhận hữu cơ USDA, chứng nhận hữu cơ EU.\r\nCông dụng: Dọc mùng (bạc hà) có vị ngọt, giòn và có thể kết hợp với nhiều loại nguyên liệu khác nhau để tạo ra những món ăn thơm ngon và hấp dẫn như nấu canh, lẩu,….\r\nGợi ý sử dụng: Dọc mùng có thể nấu canh với tôm hoặc thịt, canh chua, cũng có thể nhúng lẩu.\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: 3 - 6 ngày tùy điều kiện bảo quản.', 23000.00, 8.00, 'UN809816', '/storage/uploads/2023/10/30/sdfhbsdjhfbsdfbshdfbdfjghbdfkz4832539277025_0e355b35b679bfad12d51899c3529666.jpg', 'TY623304', 1, '2023-10-30 18:47:13', '2023-10-30 11:47:13');
INSERT INTO `products` VALUES (38, 'PR327756', 'Bí đao hữu cơ', 'Thực phẩm tốt cho sức khỏe, giúp giảm cân, đẹp da và tốt cho tiêu hóa.', 'Chứng nhận/ Canh tác: Chứng nhận hữu cơ USDA.\r\nCông dụng: Bí xanh là thực phẩm quen thuộc của người Việt. Theo y học cổ truyền, bí xanh vị ngọt nhạt, tính mát, có công dụng thanh nhiệt, giải nhiệt và làm tan đờm, làm mát ruột và hết khát, lợi tiểu, làm hết phù, giải độc và giảm béo. Không phải ngẫu nhiên mà ở một số địa phương, bí xanh được sử dụng để chế biến thành món trà thanh nhiệt, giải độc. Trà bí xanh không chỉ dễ uống mà còn giúp làm mát cơ thể cực tốt trong những ngày nắng nóng.\r\nGợi ý sử dụng: Bí xanh có thể nấu canh, làm nước ép, hoặc nấu nước với mía.\r\nHướng dẫn bảo quản: Bảo quản trong ngăn mát tủ lạnh.\r\nHạn sử dụng: 3 - 6 ngày tùy điều kiện bảo quản.', 15000.00, 3.00, 'UN809816', '/storage/uploads/2023/10/30/sedhsjdbsdjfb sdvcbkdxtfgjntiofybhjotghnlxb.jpg', 'TY874338', 1, '2023-10-30 18:48:15', '2023-10-30 11:48:15');
INSERT INTO `products` VALUES (39, 'PR259517', 'Khoai tây hữu cơ', 'Thực phẩm giàu dinh dưỡng, mang lại nhiều lợi ích cho sức khỏe, tốt cho tim mạch, tiêu hóa, tăng cường miễn dịch.', 'Chứng nhận/ Canh tác: Chứng nhận hữu cơ USDA.\r\nCông dụng: Ngoài hàm lượng nước cao, khoai tây còn rất giàu carbohydrate và hàm lượng cao protein cũng như chất xơ giúp tiêu hoá dễ. Các vitamin C, vitamin B6, kali, magie, kẽm và photpho có trong khoai tây tốt cho da cũng như cần thiết hằng ngày cho cơ thể, giúp phòng chống cảm lạnh...\r\nGợi ý sử dụng: Khoai tây có vỏ vàng, da mịn nhẵn, mắt củ nông dễ gọt vỏ hao ít. Ruột củ vàng sáng, bở, mềm ngọt, thơm và không bị khái. Rất thích hợp luộc, xào, nấu, chiên.\r\nHướng dẫn bảo quản: Bảo quản khoai tây lành mạnh ở nơi khô, tối như tầng hầm, gầm tủ bếp. Sau khi đã chọn lọc các củ khoai tây, đặt chúng ở một nơi không tiếp xúc với ánh sáng và độ ẩm, bởi những thứ này có thể khiến khoai tây mọc mầm hoặc thối rữa. Bạn cũng cần để khoai tây ở nơi thông thoáng.\r\nHạn sử dụng: 3 - 6 ngày tùy điều kiện bảo quản.', 28000.00, 6.00, 'UN809816', '/storage/uploads/2023/10/30/drfgtggfyhfgd.jpg', 'TY453090', 1, '2023-10-30 18:50:10', '2023-10-30 11:50:10');

-- ----------------------------
-- Table structure for pending_users
-- ----------------------------
DROP TABLE IF EXISTS `pending_users`;
CREATE TABLE `pending_users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usercode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `role` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `pending_users_usercode_unique`(`usercode`) USING BTREE,
  UNIQUE INDEX `pending_users_username_unique`(`username`) USING BTREE,
  UNIQUE INDEX `pending_users_email_unique`(`email`) USING BTREE,
  UNIQUE INDEX `pending_users_password_unique`(`password`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pending_users
-- ----------------------------
INSERT INTO `pending_users` VALUES (1, 'CU968377', 'dinhhan', 'bythefxter@gmail.com', '$2y$10$XGFs8vBcrstd9dZBJz5FP.jNcFlMyZ9egDYVDYvIEkcIVrP76VEoG', '0583738473', '1999-12-09', 2, 0, '2023-10-11 18:19:27', NULL);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ordercode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customercode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `receivername` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiverphone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipaddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(8, 2) NOT NULL,
  `statuscode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `orders_ordercode_unique`(`ordercode`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 59 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (8, 'OD283029', 'CU002923', 'Cao Văn Tuyền', '0393828232', 'Đường 23, Xã Hòa Phú, Huyện Củ Chi', 'Không', 221400.00, 'OS4', '2023-10-11 05:39:50', '2023-10-10 22:41:24');
INSERT INTO `orders` VALUES (9, 'OD122595', 'CU648342', 'Hà Quang Thinh', '0327909328', '44/3, Hiệp Bình, Phường Hiệp Bình Chánh, Thành phố Thủ Đức', 'Không', 33300.00, 'OS4', '2023-10-11 21:29:52', '2023-10-18 09:58:31');
INSERT INTO `orders` VALUES (10, 'OD979202', 'CU024160', 'Võ Tiến Minh', '0327909328', '45/6 Phan Văn Trị, Phường 01, Quận Gò Vấp', 'Không', 29920.00, 'OS4', '2023-10-13 21:43:05', '2023-10-19 10:55:26');
INSERT INTO `orders` VALUES (11, 'OD088052', 'CU024160', 'Võ Tiến Minh', '0327909328', '45/6 Phan Văn Trị, Phường Hiệp Thành, Quận 12', 'Không', 26600.00, 'OS3', '2023-10-23 18:28:52', '2023-10-23 11:39:58');
INSERT INTO `orders` VALUES (12, 'OD330627', 'CU024160', 'Võ Tiến Minh', '0327909328', '45/6 Phan Văn Trị, Phường Thới An, Quận 12', 'Không', 33300.00, 'OS4', '2023-10-23 19:18:32', '2023-10-30 05:35:21');
INSERT INTO `orders` VALUES (13, 'OD600461', 'CU024160', 'Võ Tiến Minh', '0327909328', '45/6 Phan Văn Trị, Phường Thới An, Quận 12', 'Không', 26600.00, 'OS3', '2023-10-23 19:37:29', '2023-11-01 14:48:17');
INSERT INTO `orders` VALUES (14, 'OD123310', 'CU648342', 'Lê Văn Nam', '0327909328', '45/6 Phan Văn Trị, Phường 27, Quận Bình Thạnh', 'Không', 91000.00, 'OS3', '2023-10-28 23:10:01', '2023-10-28 16:12:59');
INSERT INTO `orders` VALUES (15, 'OD764459', 'CU648342', 'Lê Văn Nam', '0327909328', '45/6 Phan Văn Trị, Phường 27, Quận Bình Thạnh', 'Không', 91000.00, 'OS1', '2023-10-28 23:10:03', '2023-10-28 16:10:03');
INSERT INTO `orders` VALUES (16, 'OD588088', 'CU024160', 'Nguyễn Khánh Uyên', '0327909358', '156 Trần Não, Phường 09, Quận 3', 'Không', 185280.00, 'OS4', '2023-10-28 23:19:08', '2023-11-01 18:00:44');
INSERT INTO `orders` VALUES (17, 'OD706348', 'CU907306', 'Đào Thị Yến Anh', '0327909328', '59 Cộng Hòa, Phường Bình Trị Đông, Quận Bình Tân', 'Không', 104310.00, 'OS4', '2023-10-29 14:37:25', '2023-11-05 05:32:22');
INSERT INTO `orders` VALUES (18, 'OD566036', 'CU273476', 'Lê Tuấn Khang', '0982718272', '123, đường Tân Chánh Hiệp, Phường 02, Quận Tân Bình', 'Không', 876000.00, 'OS4', '2023-10-30 00:54:48', '2023-10-29 17:59:56');
INSERT INTO `orders` VALUES (19, 'OD858039', 'CU024160', 'Võ Tiến Minh', '0327909328', '59 Cộng Hòa, Phường Tân Tạo A, Quận Bình Tân', 'Không', 40870.00, 'OS3', '2023-10-30 18:51:57', '2023-11-05 02:48:29');
INSERT INTO `orders` VALUES (20, 'OD110079', 'CU648342', 'Võ Tiến Minh', '0327909328', '36 Nam Kì Khởi Nghĩa, Phường 05, Quận Bình Thạnh', 'Không', 98550.00, 'OS3', '2023-11-01 21:10:33', '2023-11-01 14:39:24');
INSERT INTO `orders` VALUES (21, 'OD640514', 'CU648342', 'Võ Tiến Minh', '0327909328', '36 Nam Kì Khởi Nghĩa, Phường 05, Quận Bình Thạnh', 'Không', 98550.00, 'OS1', '2023-11-01 21:10:35', '2023-11-01 14:10:35');
INSERT INTO `orders` VALUES (22, 'OD706872', 'CU648342', 'Nguyễn Khánh Uyên', '0327909328', '36 Nam Kì Khởi Nghĩa, Phường Bến Thành, Quận 1', 'Không', 70560.00, 'OS3', '2023-11-01 21:12:18', '2023-11-01 14:37:23');
INSERT INTO `orders` VALUES (23, 'OD069395', 'CU648342', 'Đào Thị Yến Anh', '0327909358', '45/6 Phan Văn Trị, Phường 10, Quận Phú Nhuận', 'Không', 67500.00, 'OS5', '2023-11-01 21:29:55', '2023-11-05 03:00:29');
INSERT INTO `orders` VALUES (24, 'OD978677', 'CU024160', 'Hà Quang Thinh', '0327909328', '78 Phạm Văn Đồng, Phường Hiệp Bình Chánh, Thành phố Thủ Đức', 'Không', 78520.00, 'OS3', '2023-11-01 21:44:02', '2023-11-01 14:46:31');
INSERT INTO `orders` VALUES (25, 'OD814407', 'CU024160', 'Lê Văn Nam', '0327909328', '36 Nam Kì Khởi Nghĩa, Phường 12, Quận Bình Thạnh', 'Không', 99100.00, 'OS4', '2023-11-01 21:45:22', '2023-11-05 02:48:13');
INSERT INTO `orders` VALUES (26, 'OD019428', 'AD123456', 'Lê Tuấn Khang', '0982718272', '123, đường Tân Chánh Hiệp, Phường 15, Quận Gò Vấp', 'Không', 17100.00, 'OS4', '2023-11-02 02:20:16', '2023-11-01 19:20:53');
INSERT INTO `orders` VALUES (27, 'OD969653', 'AD123456', 'Lê Tuấn Khang', '0982718272', '123, đường Tân Chánh Hiệp, Phường 13, Quận Tân Bình', 'Không', 95250.00, 'OS4', '2023-11-02 02:22:08', '2023-11-01 19:22:29');
INSERT INTO `orders` VALUES (28, 'OD511304', 'AD123456', 'Hà Quang Thinh', '0327909328', 'Nhà mặt phố bố làm to, Phường 12, Quận Bình Thạnh', 'Không', 798000.00, 'OS4', '2023-11-02 08:22:32', '2023-11-02 01:23:13');
INSERT INTO `orders` VALUES (29, 'OD830908', 'CU024160', 'Hà Quang Thinh', '0327909328', '123 Phạm Văn Đồng, Phường Linh Trung, Thành phố Thủ Đức', 'Không', 39600.00, 'OS3', '2023-11-03 19:02:54', '2023-11-05 02:48:01');
INSERT INTO `orders` VALUES (30, 'OD434527', 'CU024160', 'Võ Tiến Minh', '0327909328', '03 Nam Kì Khởi Nghĩa, Phường Sơn Kỳ, Quận Tân Phú', 'Không', 70000.00, 'OS2', '2023-11-03 19:04:31', '2023-11-03 12:04:44');
INSERT INTO `orders` VALUES (31, 'OD948869', 'CU024160', 'Hà Quang Thinh', '0327909328', '06 Võ Oanh, Phường 27, Quận Bình Thạnh', 'Không', 119660.00, 'OS1', '2023-11-03 19:05:38', '2023-11-03 12:05:38');
INSERT INTO `orders` VALUES (32, 'OD062751', 'CU024160', 'Hà Quang Thinh', '0327909328', '06 Võ Oanh, Phường 15, Quận 11', 'Không', 103870.00, 'OS3', '2023-11-03 19:06:43', '2023-11-05 02:50:47');
INSERT INTO `orders` VALUES (33, 'OD183102', 'CU024160', 'Hà Quang Thinh', '0327909328', '06 Võ Oanh, Phường 15, Quận 11', 'Không', 103870.00, 'OS2', '2023-11-03 19:06:44', '2023-11-05 02:50:30');
INSERT INTO `orders` VALUES (34, 'OD231680', 'CU024160', 'Võ Tiến Minh', '0327909328', '06 Võ Oanh, Phường 12, Quận Bình Thạnh', 'Không', 44800.00, 'OS4', '2023-11-03 19:07:48', '2023-11-05 02:59:27');
INSERT INTO `orders` VALUES (35, 'OD809178', 'CU024160', 'Võ Tiến Minh', '0327909328', '06 Võ Oanh, Phường 12, Quận Bình Thạnh', 'Không', 44800.00, 'OS1', '2023-11-03 19:07:49', '2023-11-03 12:07:50');
INSERT INTO `orders` VALUES (36, 'OD646851', 'CU024160', 'Võ Tiến Minh', '0327909328', '06 Võ Oanh, Phường 06, Quận Bình Thạnh', 'Không', 30160.00, 'OS2', '2023-11-05 09:26:12', '2023-11-05 02:27:46');
INSERT INTO `orders` VALUES (37, 'OD132640', 'CU024160', 'Hà Quang Thinh', '0327909328', '123 Phạm Văn Đồng, Phường Hiệp Bình Phước, Thành phố Thủ Đức', 'Không', 67300.00, 'OS3', '2023-11-05 09:30:57', '2023-11-05 02:49:00');
INSERT INTO `orders` VALUES (38, 'OD221191', 'CU024160', 'Võ Tiến Minh', '0327909328', '03 Nam Kì Khởi Nghĩa, Phường Tân Sơn Nhì, Quận Tân Phú', 'Không', 132860.00, 'OS1', '2023-11-05 09:32:12', '2023-11-05 02:32:12');
INSERT INTO `orders` VALUES (39, 'OD696466', 'CU024160', 'Võ Tiến Minh', '0327909328', '03 Nam Kì Khởi Nghĩa, Phường Tân Sơn Nhì, Quận Tân Phú', 'Không', 132860.00, 'OS4', '2023-11-05 09:32:15', '2023-11-05 02:49:33');
INSERT INTO `orders` VALUES (40, 'OD853999', 'CU024160', 'Võ Tiến Minh', '0327909328', '03 Nam Kì Khởi Nghĩa, Phường 12, Quận Bình Thạnh', 'Không', 85690.00, 'OS4', '2023-11-05 09:35:00', '2023-11-05 02:51:33');
INSERT INTO `orders` VALUES (41, 'OD283500', 'CU024160', 'Võ Tiến Minh', '0327909328', '03 Nam Kì Khởi Nghĩa, Phường 12, Quận Bình Thạnh', 'Không', 85690.00, 'OS2', '2023-11-05 09:35:02', '2023-11-05 02:36:09');
INSERT INTO `orders` VALUES (42, 'OD706008', 'CU024160', 'Võ Tiến Minh', '0327909328', '06 Võ Oanh, Phường 13, Quận Bình Thạnh', 'Không', 282400.00, 'OS4', '2023-11-05 09:42:00', '2023-11-05 03:01:01');
INSERT INTO `orders` VALUES (43, 'OD717298', 'CU024160', 'Võ Tiến Minh', '0327909328', '06 Võ Oanh, Phường 10, Quận 11', 'Không', 81050.00, 'OS2', '2023-11-05 09:44:05', '2023-11-05 02:49:19');
INSERT INTO `orders` VALUES (44, 'OD687604', 'CU024160', 'Võ Tiến Minh', '0327909328', '06 Võ Oanh, Phường 01, Quận Bình Thạnh', 'Không', 43060.00, 'OS5', '2023-11-05 09:46:25', '2023-11-05 02:50:17');
INSERT INTO `orders` VALUES (45, 'OD593172', 'CU648342', 'Hà Quang Thinh', '0327909328', '123 Phạm Văn Đồng, Phường Hiệp Bình Phước, Thành phố Thủ Đức', 'Không', 110600.00, 'OS3', '2023-11-05 09:54:15', '2023-11-05 03:00:15');
INSERT INTO `orders` VALUES (46, 'OD283010', 'CU648342', 'Võ Tiến Minh', '0327909328', '03 Nam Kì Khởi Nghĩa, Phường Phạm Ngũ Lão, Quận 1', 'Không', 66600.00, 'OS2', '2023-11-05 09:55:45', '2023-11-05 02:56:02');
INSERT INTO `orders` VALUES (47, 'OD688705', 'CU648342', 'Võ Tiến Minh', '0327909328', '03 Nam Kì Khởi Nghĩa, Phường Phạm Ngũ Lão, Quận 1', 'Không', 66600.00, 'OS1', '2023-11-05 09:55:45', '2023-11-05 02:55:45');
INSERT INTO `orders` VALUES (48, 'OD680390', 'CU648342', 'Hà Quang Thinh', '0327909328', '123 Phạm Văn Đồng, Phường 09, Quận Phú Nhuận', 'Không', 51400.00, 'OS3', '2023-11-05 09:57:14', '2023-11-05 02:59:53');
INSERT INTO `orders` VALUES (49, 'OD883326', 'AD123456', 'Lê Tuấn Khang', '0982718272', '123, đường Tân Chánh Hiệp, Phường Tân Chánh Hiệp, Quận 12', 'Không', 35000.00, 'OS3', '2023-11-05 17:53:17', '2023-11-08 10:42:06');
INSERT INTO `orders` VALUES (50, 'OD472484', 'CU907306', 'Hà Quang Thinh', '0327909328', '123 Phạm Văn Đồng, Phường 13, Quận Bình Thạnh', 'Không', 98550.00, 'OS4', '2023-11-08 17:28:15', '2023-11-08 10:42:28');
INSERT INTO `orders` VALUES (51, 'OD305682', 'CU907306', 'Đào Thị Yến Anh', '0327909328', '03 Nam Kì Khởi Nghĩa, Phường 15, Quận Gò Vấp', 'Không', 68580.00, 'OS4', '2023-11-08 17:30:30', '2023-11-08 10:42:41');
INSERT INTO `orders` VALUES (52, 'OD739570', 'CU907306', 'Nguyễn Thị Thu Hà', '0327909328', '06 Võ Oanh, Phường 04, Quận Phú Nhuận', 'Không', 61880.00, 'OS5', '2023-11-08 17:31:32', '2023-11-08 10:42:56');
INSERT INTO `orders` VALUES (53, 'OD289684', 'CU907306', 'Nguyễn Thị Thu Hà', '0327909328', '06 Võ Oanh, Phường 02, Quận Tân Bình', 'Không', 45500.00, 'OS2', '2023-11-08 17:32:14', '2023-11-08 10:43:09');
INSERT INTO `orders` VALUES (54, 'OD946080', 'CU907306', 'Nguyễn Thị Thu Hà', '0327909328', '06 Võ Oanh, Phường Linh Xuân, Thành phố Thủ Đức', 'Không', 71060.00, 'OS2', '2023-11-08 17:33:01', '2023-11-08 10:43:22');
INSERT INTO `orders` VALUES (55, 'OD131090', 'CU907306', 'Nguyễn Thị Thu Hà', '0327909328', '06 Võ Oanh, Phường 15, Quận Gò Vấp', 'Không', 70300.00, 'OS4', '2023-11-08 17:33:45', '2023-11-08 10:43:40');
INSERT INTO `orders` VALUES (56, 'OD954673', 'CU907306', 'Nguyễn Thị Thu Hà', '0327909328', '06 Võ Oanh, Phường 02, Quận Bình Thạnh', 'Không', 46870.00, 'OS5', '2023-11-08 17:37:11', '2023-11-08 10:44:05');
INSERT INTO `orders` VALUES (57, 'OD231085', 'CU907306', 'Đào Thị Yến Anh', '0327909328', '03 Nam Kì Khởi Nghĩa, Phường 21, Quận Bình Thạnh', 'Không', 87600.00, 'OS1', '2023-11-08 17:38:05', '2023-11-08 10:38:05');
INSERT INTO `orders` VALUES (58, 'OD933731', 'CU907306', 'Đào Thị Yến Anh', '0327909328', '123 Phạm Văn Đồng, Phường 04, Quận Phú Nhuận', 'Không', 179920.00, 'OS4', '2023-11-08 17:39:30', '2023-11-08 10:44:18');

-- ----------------------------
-- Table structure for order_status
-- ----------------------------
DROP TABLE IF EXISTS `order_status`;
CREATE TABLE `order_status`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `statuscode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `order_status_statuscode_unique`(`statuscode`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_status
-- ----------------------------
INSERT INTO `order_status` VALUES (1, 'OS1', 'Chờ xác nhận', NULL, NULL);
INSERT INTO `order_status` VALUES (2, 'OS2', 'Đang giao, chưa thanh toán', NULL, NULL);
INSERT INTO `order_status` VALUES (3, 'OS3', 'Đang giao, đã thanh toán', NULL, NULL);
INSERT INTO `order_status` VALUES (4, 'OS4', 'Đã giao thành công', NULL, NULL);
INSERT INTO `order_status` VALUES (5, 'OS5', 'Bị hủy', NULL, NULL);

-- ----------------------------
-- Table structure for order_details
-- ----------------------------
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ordercode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `productcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `realprice` double(8, 2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 113 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_details
-- ----------------------------
INSERT INTO `order_details` VALUES (13, 'OD283029', 'PR018429', 1, 15000.00, '2023-10-11 05:39:50', '2023-10-10 22:39:50');
INSERT INTO `order_details` VALUES (14, 'OD283029', 'PR403225', 1, 45000.00, '2023-10-11 05:39:50', '2023-10-10 22:39:50');
INSERT INTO `order_details` VALUES (15, 'OD283029', 'PR084508', 5, 36000.00, '2023-10-11 05:39:50', '2023-10-10 22:39:50');
INSERT INTO `order_details` VALUES (16, 'OD122595', 'PR359944', 1, 37000.00, '2023-10-11 21:29:52', '2023-10-11 14:29:52');
INSERT INTO `order_details` VALUES (17, 'OD979202', 'PR904651', 1, 34000.00, '2023-10-13 21:43:05', '2023-10-13 14:43:05');
INSERT INTO `order_details` VALUES (18, 'OD088052', 'PR376246', 1, 28000.00, '2023-10-23 18:28:52', '2023-10-23 11:28:52');
INSERT INTO `order_details` VALUES (19, 'OD330627', 'PR359944', 1, 37000.00, '2023-10-23 19:18:32', '2023-10-23 12:18:32');
INSERT INTO `order_details` VALUES (20, 'OD600461', 'PR376246', 1, 28000.00, '2023-10-23 19:37:29', '2023-10-23 12:37:29');
INSERT INTO `order_details` VALUES (21, 'OD123310', 'PR059424', 1, 130000.00, '2023-10-28 23:10:01', '2023-10-28 16:10:01');
INSERT INTO `order_details` VALUES (22, 'OD764459', 'PR059424', 1, 130000.00, '2023-10-28 23:10:03', '2023-10-28 16:10:03');
INSERT INTO `order_details` VALUES (23, 'OD588088', 'PR412375', 1, 150000.00, '2023-10-28 23:19:08', '2023-10-28 16:19:08');
INSERT INTO `order_details` VALUES (24, 'OD588088', 'PR084508', 1, 36000.00, '2023-10-28 23:19:08', '2023-10-28 16:19:08');
INSERT INTO `order_details` VALUES (25, 'OD706348', 'PR990362', 1, 54000.00, '2023-10-29 14:37:25', '2023-10-29 07:37:25');
INSERT INTO `order_details` VALUES (26, 'OD706348', 'PR283308', 1, 25000.00, '2023-10-29 14:37:25', '2023-10-29 07:37:25');
INSERT INTO `order_details` VALUES (27, 'OD706348', 'PR376246', 1, 28000.00, '2023-10-29 14:37:25', '2023-10-29 07:37:25');
INSERT INTO `order_details` VALUES (28, 'OD566036', 'PR683586', 10, 120000.00, '2023-10-30 00:54:48', '2023-10-29 17:54:48');
INSERT INTO `order_details` VALUES (29, 'OD566036', 'PR403225', 1, 45000.00, '2023-10-30 00:54:48', '2023-10-29 17:54:48');
INSERT INTO `order_details` VALUES (30, 'OD858039', 'PR327756', 1, 15000.00, '2023-10-30 18:51:57', '2023-10-30 11:51:57');
INSERT INTO `order_details` VALUES (31, 'OD858039', 'PR259517', 1, 28000.00, '2023-10-30 18:51:57', '2023-10-30 11:51:57');
INSERT INTO `order_details` VALUES (32, 'OD110079', 'PR683586', 1, 120000.00, '2023-11-01 21:10:33', '2023-11-01 14:10:33');
INSERT INTO `order_details` VALUES (33, 'OD110079', 'PR327756', 1, 15000.00, '2023-11-01 21:10:33', '2023-11-01 14:10:33');
INSERT INTO `order_details` VALUES (34, 'OD640514', 'PR683586', 1, 120000.00, '2023-11-01 21:10:35', '2023-11-01 14:10:35');
INSERT INTO `order_details` VALUES (35, 'OD640514', 'PR327756', 1, 15000.00, '2023-11-01 21:10:35', '2023-11-01 14:10:35');
INSERT INTO `order_details` VALUES (36, 'OD706872', 'PR084508', 2, 36000.00, '2023-11-01 21:12:18', '2023-11-01 14:12:18');
INSERT INTO `order_details` VALUES (37, 'OD069395', 'PR018429', 1, 15000.00, '2023-11-01 21:29:55', '2023-11-01 14:29:55');
INSERT INTO `order_details` VALUES (38, 'OD069395', 'PR403225', 1, 45000.00, '2023-11-01 21:29:55', '2023-11-01 14:29:55');
INSERT INTO `order_details` VALUES (39, 'OD069395', 'PR771002', 1, 25000.00, '2023-11-01 21:29:55', '2023-11-01 14:29:55');
INSERT INTO `order_details` VALUES (40, 'OD978677', 'PR904651', 1, 34000.00, '2023-11-01 21:44:02', '2023-11-01 14:44:02');
INSERT INTO `order_details` VALUES (41, 'OD978677', 'PR150328', 1, 54000.00, '2023-11-01 21:44:02', '2023-11-01 14:44:02');
INSERT INTO `order_details` VALUES (42, 'OD814407', 'PR747044', 1, 23000.00, '2023-11-01 21:45:22', '2023-11-01 14:45:22');
INSERT INTO `order_details` VALUES (43, 'OD814407', 'PR868381', 1, 4000.00, '2023-11-01 21:45:22', '2023-11-01 14:45:22');
INSERT INTO `order_details` VALUES (44, 'OD814407', 'PR683586', 1, 120000.00, '2023-11-01 21:45:22', '2023-11-01 14:45:22');
INSERT INTO `order_details` VALUES (45, 'OD019428', 'PR572068', 1, 18000.00, '2023-11-02 02:20:16', '2023-11-01 19:20:16');
INSERT INTO `order_details` VALUES (46, 'OD969653', 'PR327756', 5, 15000.00, '2023-11-02 02:22:08', '2023-11-01 19:22:08');
INSERT INTO `order_details` VALUES (47, 'OD969653', 'PR771002', 1, 25000.00, '2023-11-02 02:22:08', '2023-11-01 19:22:08');
INSERT INTO `order_details` VALUES (48, 'OD511304', 'PR376246', 30, 28000.00, '2023-11-02 08:22:32', '2023-11-02 01:22:32');
INSERT INTO `order_details` VALUES (49, 'OD830908', 'PR572068', 1, 18000.00, '2023-11-03 19:02:54', '2023-11-03 12:02:54');
INSERT INTO `order_details` VALUES (50, 'OD830908', 'PR771002', 1, 25000.00, '2023-11-03 19:02:54', '2023-11-03 12:02:54');
INSERT INTO `order_details` VALUES (51, 'OD434527', 'PR937974', 1, 34000.00, '2023-11-03 19:04:31', '2023-11-03 12:04:31');
INSERT INTO `order_details` VALUES (52, 'OD434527', 'PR403225', 1, 45000.00, '2023-11-03 19:04:31', '2023-11-03 12:04:31');
INSERT INTO `order_details` VALUES (53, 'OD948869', 'PR211358', 1, 20000.00, '2023-11-03 19:05:38', '2023-11-03 12:05:38');
INSERT INTO `order_details` VALUES (54, 'OD948869', 'PR990362', 1, 54000.00, '2023-11-03 19:05:38', '2023-11-03 12:05:38');
INSERT INTO `order_details` VALUES (55, 'OD948869', 'PR150328', 1, 54000.00, '2023-11-03 19:05:38', '2023-11-03 12:05:38');
INSERT INTO `order_details` VALUES (56, 'OD062751', 'PR831048', 1, 13000.00, '2023-11-03 19:06:43', '2023-11-03 12:06:43');
INSERT INTO `order_details` VALUES (57, 'OD062751', 'PR059424', 1, 130000.00, '2023-11-03 19:06:43', '2023-11-03 12:06:43');
INSERT INTO `order_details` VALUES (58, 'OD183102', 'PR831048', 1, 13000.00, '2023-11-03 19:06:44', '2023-11-03 12:06:44');
INSERT INTO `order_details` VALUES (59, 'OD183102', 'PR059424', 1, 130000.00, '2023-11-03 19:06:44', '2023-11-03 12:06:44');
INSERT INTO `order_details` VALUES (60, 'OD231680', 'PR747044', 1, 23000.00, '2023-11-03 19:07:48', '2023-11-03 12:07:48');
INSERT INTO `order_details` VALUES (61, 'OD231680', 'PR359944', 1, 37000.00, '2023-11-03 19:07:48', '2023-11-03 12:07:48');
INSERT INTO `order_details` VALUES (62, 'OD809178', 'PR747044', 1, 23000.00, '2023-11-03 19:07:50', '2023-11-03 12:07:50');
INSERT INTO `order_details` VALUES (63, 'OD809178', 'PR359944', 1, 37000.00, '2023-11-03 19:07:50', '2023-11-03 12:07:50');
INSERT INTO `order_details` VALUES (64, 'OD646851', 'PR732612', 1, 23000.00, '2023-11-05 09:26:12', '2023-11-05 02:26:12');
INSERT INTO `order_details` VALUES (65, 'OD646851', 'PR018429', 1, 15000.00, '2023-11-05 09:26:12', '2023-11-05 02:26:12');
INSERT INTO `order_details` VALUES (66, 'OD132640', 'PR359944', 1, 37000.00, '2023-11-05 09:30:57', '2023-11-05 02:30:57');
INSERT INTO `order_details` VALUES (67, 'OD132640', 'PR937974', 1, 34000.00, '2023-11-05 09:30:57', '2023-11-05 02:30:57');
INSERT INTO `order_details` VALUES (68, 'OD221191', 'PR683586', 1, 120000.00, '2023-11-05 09:32:12', '2023-11-05 02:32:12');
INSERT INTO `order_details` VALUES (69, 'OD221191', 'PR442854', 1, 14000.00, '2023-11-05 09:32:12', '2023-11-05 02:32:12');
INSERT INTO `order_details` VALUES (70, 'OD221191', 'PR231454', 1, 35000.00, '2023-11-05 09:32:12', '2023-11-05 02:32:12');
INSERT INTO `order_details` VALUES (71, 'OD696466', 'PR683586', 1, 120000.00, '2023-11-05 09:32:15', '2023-11-05 02:32:15');
INSERT INTO `order_details` VALUES (72, 'OD696466', 'PR442854', 1, 14000.00, '2023-11-05 09:32:15', '2023-11-05 02:32:15');
INSERT INTO `order_details` VALUES (73, 'OD696466', 'PR231454', 1, 35000.00, '2023-11-05 09:32:15', '2023-11-05 02:32:15');
INSERT INTO `order_details` VALUES (74, 'OD853999', 'PR831048', 1, 13000.00, '2023-11-05 09:35:00', '2023-11-05 02:35:00');
INSERT INTO `order_details` VALUES (75, 'OD853999', 'PR133404', 1, 22000.00, '2023-11-05 09:35:00', '2023-11-05 02:35:00');
INSERT INTO `order_details` VALUES (76, 'OD853999', 'PR990362', 1, 54000.00, '2023-11-05 09:35:00', '2023-11-05 02:35:00');
INSERT INTO `order_details` VALUES (77, 'OD283500', 'PR831048', 1, 13000.00, '2023-11-05 09:35:02', '2023-11-05 02:35:02');
INSERT INTO `order_details` VALUES (78, 'OD283500', 'PR133404', 1, 22000.00, '2023-11-05 09:35:02', '2023-11-05 02:35:02');
INSERT INTO `order_details` VALUES (79, 'OD283500', 'PR990362', 1, 54000.00, '2023-11-05 09:35:02', '2023-11-05 02:35:02');
INSERT INTO `order_details` VALUES (80, 'OD706008', 'PR763222', 1, 46000.00, '2023-11-05 09:42:00', '2023-11-05 02:42:00');
INSERT INTO `order_details` VALUES (81, 'OD706008', 'PR412375', 1, 150000.00, '2023-11-05 09:42:00', '2023-11-05 02:42:00');
INSERT INTO `order_details` VALUES (82, 'OD706008', 'PR059424', 1, 130000.00, '2023-11-05 09:42:00', '2023-11-05 02:42:00');
INSERT INTO `order_details` VALUES (83, 'OD717298', 'PR851281', 1, 35000.00, '2023-11-05 09:44:05', '2023-11-05 02:44:05');
INSERT INTO `order_details` VALUES (84, 'OD717298', 'PR283308', 1, 25000.00, '2023-11-05 09:44:05', '2023-11-05 02:44:05');
INSERT INTO `order_details` VALUES (85, 'OD717298', 'PR771002', 1, 25000.00, '2023-11-05 09:44:05', '2023-11-05 02:44:05');
INSERT INTO `order_details` VALUES (86, 'OD687604', 'PR924479', 1, 19000.00, '2023-11-05 09:46:25', '2023-11-05 02:46:25');
INSERT INTO `order_details` VALUES (87, 'OD687604', 'PR465386', 1, 25000.00, '2023-11-05 09:46:25', '2023-11-05 02:46:25');
INSERT INTO `order_details` VALUES (88, 'OD593172', 'PR376246', 1, 28000.00, '2023-11-05 09:54:15', '2023-11-05 02:54:15');
INSERT INTO `order_details` VALUES (89, 'OD593172', 'PR683586', 1, 120000.00, '2023-11-05 09:54:15', '2023-11-05 02:54:15');
INSERT INTO `order_details` VALUES (90, 'OD283010', 'PR359944', 2, 37000.00, '2023-11-05 09:55:45', '2023-11-05 02:55:45');
INSERT INTO `order_details` VALUES (91, 'OD688705', 'PR359944', 2, 37000.00, '2023-11-05 09:55:45', '2023-11-05 02:55:45');
INSERT INTO `order_details` VALUES (92, 'OD680390', 'PR851281', 1, 35000.00, '2023-11-05 09:57:14', '2023-11-05 02:57:14');
INSERT INTO `order_details` VALUES (93, 'OD680390', 'PR572068', 1, 18000.00, '2023-11-05 09:57:14', '2023-11-05 02:57:14');
INSERT INTO `order_details` VALUES (94, 'OD883326', 'PR231454', 1, 35000.00, '2023-11-05 17:53:17', '2023-11-05 10:53:17');
INSERT INTO `order_details` VALUES (95, 'OD472484', 'PR327756', 1, 15000.00, '2023-11-08 17:28:15', '2023-11-08 10:28:15');
INSERT INTO `order_details` VALUES (96, 'OD472484', 'PR683586', 1, 120000.00, '2023-11-08 17:28:15', '2023-11-08 10:28:15');
INSERT INTO `order_details` VALUES (97, 'OD305682', 'PR359944', 1, 37000.00, '2023-11-08 17:30:30', '2023-11-08 10:30:30');
INSERT INTO `order_details` VALUES (98, 'OD305682', 'PR084508', 1, 36000.00, '2023-11-08 17:30:30', '2023-11-08 10:30:30');
INSERT INTO `order_details` VALUES (99, 'OD739570', 'PR737451', 1, 28000.00, '2023-11-08 17:31:32', '2023-11-08 10:31:32');
INSERT INTO `order_details` VALUES (100, 'OD739570', 'PR231454', 1, 35000.00, '2023-11-08 17:31:32', '2023-11-08 10:31:32');
INSERT INTO `order_details` VALUES (101, 'OD289684', 'PR937974', 1, 34000.00, '2023-11-08 17:32:14', '2023-11-08 10:32:14');
INSERT INTO `order_details` VALUES (102, 'OD289684', 'PR747044', 1, 23000.00, '2023-11-08 17:32:14', '2023-11-08 10:32:14');
INSERT INTO `order_details` VALUES (103, 'OD946080', 'PR211358', 1, 20000.00, '2023-11-08 17:33:01', '2023-11-08 10:33:01');
INSERT INTO `order_details` VALUES (104, 'OD946080', 'PR990362', 1, 54000.00, '2023-11-08 17:33:01', '2023-11-08 10:33:01');
INSERT INTO `order_details` VALUES (105, 'OD131090', 'PR403225', 1, 45000.00, '2023-11-08 17:33:45', '2023-11-08 10:33:45');
INSERT INTO `order_details` VALUES (106, 'OD131090', 'PR851281', 1, 35000.00, '2023-11-08 17:33:45', '2023-11-08 10:33:45');
INSERT INTO `order_details` VALUES (107, 'OD954673', 'PR937974', 1, 34000.00, '2023-11-08 17:37:11', '2023-11-08 10:37:11');
INSERT INTO `order_details` VALUES (108, 'OD954673', 'PR831048', 1, 13000.00, '2023-11-08 17:37:11', '2023-11-08 10:37:11');
INSERT INTO `order_details` VALUES (109, 'OD231085', 'PR868381', 1, 4000.00, '2023-11-08 17:38:05', '2023-11-08 10:38:05');
INSERT INTO `order_details` VALUES (110, 'OD231085', 'PR683586', 1, 120000.00, '2023-11-08 17:38:05', '2023-11-08 10:38:05');
INSERT INTO `order_details` VALUES (111, 'OD933731', 'PR412375', 1, 150000.00, '2023-11-08 17:39:30', '2023-11-08 10:39:30');
INSERT INTO `order_details` VALUES (112, 'OD933731', 'PR904651', 1, 34000.00, '2023-11-08 17:39:30', '2023-11-08 10:39:30');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (2, 'create_forgot_pass_requests_table', 1);
INSERT INTO `migrations` VALUES (3, 'create_pending_users_table', 1);
INSERT INTO `migrations` VALUES (4, 'create_products_table', 1);
INSERT INTO `migrations` VALUES (5, 'create_types_table', 1);
INSERT INTO `migrations` VALUES (6, 'create_units_table', 1);
INSERT INTO `migrations` VALUES (7, 'create_users_table', 1);
INSERT INTO `migrations` VALUES (13, 'create_assessments_table', 2);
INSERT INTO `migrations` VALUES (14, 'create_order_details_table', 2);
INSERT INTO `migrations` VALUES (15, 'create_order_status_table', 3);
INSERT INTO `migrations` VALUES (16, 'create_orders_table', 3);
INSERT INTO `migrations` VALUES (18, 'create_feedback_table', 4);

-- ----------------------------
-- Table structure for forgot_pass_requests
-- ----------------------------
DROP TABLE IF EXISTS `forgot_pass_requests`;
CREATE TABLE `forgot_pass_requests`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `requestcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usercode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `forgot_pass_requests_requestcode_unique`(`requestcode`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of forgot_pass_requests
-- ----------------------------

-- ----------------------------
-- Table structure for feedbacks
-- ----------------------------
DROP TABLE IF EXISTS `feedbacks`;
CREATE TABLE `feedbacks`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `feedbackcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customercode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordercode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of feedbacks
-- ----------------------------
INSERT INTO `feedbacks` VALUES (4, 'FB705422', 'AD123456', 'OD019428', 0, 'Hàng không đầy đủ khối lượng', '0982718272', '2023-11-02 02:23:55', '2023-11-01 19:23:55');
INSERT INTO `feedbacks` VALUES (5, 'FB685578', 'AD123456', 'OD969653', 0, 'Hàng ok nhưng giao hơi lâu, nên một số hàng bị hư hỏng, có đền bù gì không?', '0382928177', '2023-11-02 02:25:56', '2023-11-01 19:25:56');

-- ----------------------------
-- Table structure for chatscript
-- ----------------------------
DROP TABLE IF EXISTS `chatscript`;
CREATE TABLE `chatscript`  (
  `poelink` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `chatboxlink` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `minilink` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adminminilink` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of chatscript
-- ----------------------------
INSERT INTO `chatscript` VALUES ('https://poe.com/s/eA7J736IPqEQcSVllQEA', '<iframe src=\"https://chatfast.io/chat/7e1c0611-2293-48d3-964e-2558b2da0c00\" style=\"width: 90vw; height: 90vh; margin: 10px;\"></iframe>', '<script src=\"https://tudongchat.com/js/chatbox.js\"></script>\r\n<script>\r\n  const tudong_chatbox = new TuDongChat(\'RLHeRIhRrvw1hQSaxEH5a\')\r\n  tudong_chatbox.initial()\r\n</script>', '<script src=\"https://chatfast.io/chat.script.js\" data-chat-service=\"ChatFast\" data-bot-id=\"90da9995-fc16-47e9-b3e1-bded0ef6ec6c\" data-chat-width=\"450px\" data-chat-height=\"600px\"></script>', 0);

-- ----------------------------
-- Table structure for assessments
-- ----------------------------
DROP TABLE IF EXISTS `assessments`;
CREATE TABLE `assessments`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `productcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customercode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of assessments
-- ----------------------------
INSERT INTO `assessments` VALUES (1, 'PR359944', 'CU648342', 'Rau ngon đầy đủ chất dinh dưỡng, bé rất thích.', 5, '2023-10-11 21:45:39', '2023-10-11 14:45:39');
INSERT INTO `assessments` VALUES (2, 'PR359944', 'CU648342', 'Rau hơi sâu', 1, '2023-10-11 21:46:15', '2023-10-11 14:46:15');
INSERT INTO `assessments` VALUES (3, 'PR403225', 'CU273476', 'Chất', 5, '2023-10-30 01:01:54', '2023-10-29 18:01:54');
INSERT INTO `assessments` VALUES (4, 'PR572068', 'AD123456', 'Ớt quá cay', 2, '2023-11-02 02:24:54', '2023-11-01 19:24:54');
INSERT INTO `assessments` VALUES (5, 'PR376246', 'AD123456', 'Dứa chua vãi', 2, '2023-11-02 08:24:14', '2023-11-02 01:24:14');
INSERT INTO `assessments` VALUES (6, 'PR771002', 'AD123456', 'Bắp bị sâu ăn', 1, '2023-11-03 23:43:34', '2023-11-03 16:43:34');
INSERT INTO `assessments` VALUES (7, 'PR904651', 'CU024160', 'Ngon, giá cả tốt', 5, '2023-11-05 12:02:54', '2023-11-05 05:02:54');
INSERT INTO `assessments` VALUES (8, 'PR359944', 'CU024160', 'Rau muống tươi ngon', 5, '2023-11-05 12:03:48', '2023-11-05 05:03:48');
INSERT INTO `assessments` VALUES (9, 'PR084508', 'CU024160', 'Làm sinh tố rất đã', 1, '2023-11-05 12:05:42', '2023-11-05 05:05:42');
INSERT INTO `assessments` VALUES (10, 'PR412375', 'CU024160', 'Nấm nấu lẩu hết sẩy', 3, '2023-11-05 12:06:16', '2023-11-05 05:06:16');
INSERT INTO `assessments` VALUES (11, 'PR683586', 'CU024160', 'giá tốt hợp lí', 4, '2023-11-05 12:07:42', '2023-11-05 05:07:42');
INSERT INTO `assessments` VALUES (12, 'PR868381', 'CU024160', 'Làm nộm ngon nhei mấy', 5, '2023-11-05 12:08:18', '2023-11-05 05:08:18');
INSERT INTO `assessments` VALUES (13, 'PR747044', 'CU024160', 'Làm salad ăn ngon ghê', 5, '2023-11-05 12:09:34', '2023-11-05 05:09:34');
INSERT INTO `assessments` VALUES (14, 'PR747044', 'CU024160', 'rau tươi nha mấy', 5, '2023-11-05 12:10:32', '2023-11-05 05:10:32');
INSERT INTO `assessments` VALUES (15, 'PR359944', 'CU024160', 'Giá cả hợp lí, rau cũng tươi ngon quá', 5, '2023-11-05 12:11:26', '2023-11-05 05:11:26');
INSERT INTO `assessments` VALUES (16, 'PR683586', 'CU024160', 'ngon bổ rẻ', 4, '2023-11-05 12:12:12', '2023-11-05 05:12:12');
INSERT INTO `assessments` VALUES (17, 'PR442854', 'CU024160', 'Vào trong bếp ê ê ê Xào ăn ngon', 4, '2023-11-05 12:14:54', '2023-11-05 05:14:54');
INSERT INTO `assessments` VALUES (18, 'PR231454', 'CU024160', 'Wow Ăn giá đỗ ngon như ăn cỗ', 4, '2023-11-05 12:16:58', '2023-11-05 05:16:58');
INSERT INTO `assessments` VALUES (19, 'PR831048', 'CU024160', 'Ăn rau cần rần rần sức', 4, '2023-11-05 12:18:13', '2023-11-05 05:18:13');
INSERT INTO `assessments` VALUES (20, 'PR133404', 'CU024160', 'Nấu khủ mùi thơm ngon', 4, '2023-11-05 12:18:47', '2023-11-05 05:18:47');
INSERT INTO `assessments` VALUES (21, 'PR990362', 'CU024160', 'Nấu canh hoặc cari ngon', 1, '2023-11-05 12:19:29', '2023-11-05 05:19:29');
INSERT INTO `assessments` VALUES (22, 'PR763222', 'CU024160', 'giá cả hợp lí', 4, '2023-11-05 12:20:49', '2023-11-05 05:20:49');
INSERT INTO `assessments` VALUES (23, 'PR412375', 'CU024160', 'nấm tươi ngon', 5, '2023-11-05 12:21:38', '2023-11-05 05:21:38');
INSERT INTO `assessments` VALUES (24, 'PR059424', 'CU024160', 'Nhân viên nhiệt tình, rau tươi', 4, '2023-11-05 12:24:14', '2023-11-05 05:24:14');
INSERT INTO `assessments` VALUES (25, 'PR359944', 'CU648342', 'tươi ngon', 4, '2023-11-05 12:25:33', '2023-11-05 05:25:33');
INSERT INTO `assessments` VALUES (26, 'PR990362', 'CU907306', 'bé ở nhà rất', 5, '2023-11-05 12:33:42', '2023-11-05 05:33:42');
INSERT INTO `assessments` VALUES (27, 'PR283308', 'CU907306', 'món này lai rai hợp', 5, '2023-11-05 12:35:16', '2023-11-05 05:35:16');
INSERT INTO `assessments` VALUES (28, 'PR376246', 'CU907306', 'ngọt ngon', 5, '2023-11-05 12:36:03', '2023-11-05 05:36:03');

SET FOREIGN_KEY_CHECKS = 1;
