CREATE TABLE `antrian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_antrian` int(11) NOT NULL,
  `loket` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
