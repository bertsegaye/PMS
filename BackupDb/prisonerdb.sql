DROP TABLE IF EXISTS address;

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `region` varchar(20) NOT NULL,
  `zone` varchar(20) NOT NULL,
  `woreda` varchar(20) NOT NULL,
  `kebele` varchar(20) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `phone` varchar(13) NOT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO address VALUES("1","oromia","illubabur","wellega","kirmu","Ethiopian","+251980765634");


DROP TABLE IF EXISTS announcement;

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `Title` varchar(50) NOT NULL,
  `post` varchar(100) NOT NULL,
  `file` text NOT NULL,
  `ro_status` int(11) NOT NULL,
  `ido_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

INSERT INTO announcement VALUES("1","2023-05-17 12:59:58","rgRDFCGBV","AGfdcgqvfdc dfsgbvfcgvds","","0","0");


DROP TABLE IF EXISTS crime_record;

CREATE TABLE `crime_record` (
  `crime_id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `crime_type` varchar(20) NOT NULL,
  PRIMARY KEY (`crime_id`),
  KEY `pid` (`pid`),
  CONSTRAINT `crime_record_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `prisoner` (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb4;

INSERT INTO crime_record VALUES("126","1","Drugs");


DROP TABLE IF EXISTS prisoner;

CREATE TABLE `prisoner` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `address_id` int(11) NOT NULL,
  `room_name` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `age` date NOT NULL,
  `crime_type` varchar(25) NOT NULL,
  `prisoner_type` varchar(25) NOT NULL,
  `photo` text NOT NULL,
  `entry_date` date NOT NULL,
  `release_date` date NOT NULL,
  `crime_status` varchar(10) NOT NULL,
  `amekiro_gain` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  `prop_status` varchar(20) NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `prisoner_ibfk_1` (`address_id`),
  CONSTRAINT `prisoner_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO prisoner VALUES("1","1","room_1","Ayele","Walle","male","2005-05-03","Drugs","permanent","7.jpg","2023-05-14","2026-05-14","","","checkin","");


DROP TABLE IF EXISTS room;

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

INSERT INTO room VALUES("18","room_1","male");
INSERT INTO room VALUES("19","room_2","female");


DROP TABLE IF EXISTS transfered_prisoner;

CREATE TABLE `transfered_prisoner` (
  `tpid` int(11) NOT NULL AUTO_INCREMENT,
  `address_id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `age` date NOT NULL,
  `crime_type` varchar(20) NOT NULL,
  `photo` text NOT NULL,
  `entry_date` date NOT NULL,
  `release_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `transfered_to` varchar(15) NOT NULL,
  PRIMARY KEY (`tpid`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(80) NOT NULL,
  `account_type` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `serial_no` (`serial_no`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`serial_no`) REFERENCES `users_info` (`serial_no`)
) ENGINE=InnoDB AUTO_INCREMENT=445 DEFAULT CHARSET=utf8mb4;

INSERT INTO users VALUES("1","333","admin","325a2cc052914ceeb8c19016c091d2ac","admin","1");
INSERT INTO users VALUES("111","111","Abebe","81dc9bdb52d04dc20036dbd8313ed055","Reg_Officer","1");
INSERT INTO users VALUES("222","222","gemechu","81dc9bdb52d04dc20036dbd8313ed055","prison_Admin","1");
INSERT INTO users VALUES("444","444","Abdella","cecbbb7605f1070003fceee5bb52f78a","Inf_Desk_Officer","1");


DROP TABLE IF EXISTS users_info;

CREATE TABLE `users_info` (
  `serial_no` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `age` date NOT NULL,
  `photo` text NOT NULL,
  `tele_no` varchar(15) NOT NULL,
  `email` varchar(35) NOT NULL,
  `reset_link_token` varchar(100) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  PRIMARY KEY (`serial_no`)
) ENGINE=InnoDB AUTO_INCREMENT=346566 DEFAULT CHARSET=utf8mb4;

INSERT INTO users_info VALUES("111","Abebe","Yalew","male","2005-05-04","150 150.jpg","+251978654534","abebe@gmail.com","","0000-00-00");
INSERT INTO users_info VALUES("222","Gemechu","Lemma","male","2005-05-03","author-image-4-646x680.jpg","+251912323456","geme@gmail.com","","0000-00-00");
INSERT INTO users_info VALUES("333","Alemu","cs","Male","0000-00-00","sonu.jpg","+251985873454","berihuntsegaye6@gmail.com","","0000-00-00");
INSERT INTO users_info VALUES("444","Abdella","Ibrahim","male","2004-02-14","man-with-laptop-light.png","+251980765621","abdella@gmail.com","","0000-00-00");


DROP TABLE IF EXISTS visitor;

CREATE TABLE `visitor` (
  `vid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `tele` varchar(15) NOT NULL,
  `photo` text NOT NULL,
  `visitee` varchar(30) NOT NULL,
  `visit_time` datetime NOT NULL,
  `release_time` datetime NOT NULL,
  PRIMARY KEY (`vid`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4;



