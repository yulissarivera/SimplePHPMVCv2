CREATE TABLE `categorias` (
  `catecode` bigint NOT NULL AUTO_INCREMENT,
  `catename` varchar(128) DEFAULT NULL,
  `catestatus` char(3) DEFAULT NULL,
  PRIMARY KEY (`catecode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
