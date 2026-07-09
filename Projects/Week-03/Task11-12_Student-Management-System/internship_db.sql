# MySQL-Front 5.0  (Build 1.212)

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;


# Host: 127.0.0.1    Database: internship_db
# ------------------------------------------------------
# Server version 5.1.31-community

#
# Table Objects for table departments
#

DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Dumping data for table departments
#
LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;

INSERT INTO `departments` VALUES (1,'IT');
INSERT INTO `departments` VALUES (2,'HR');
INSERT INTO `departments` VALUES (3,'Finance');
INSERT INTO `departments` VALUES (4,'Sales');
INSERT INTO `departments` VALUES (5,'Marketing');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table Objects for table employees
#

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Dumping data for table employees
#
LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;

INSERT INTO `employees` VALUES (1,'jeeson',25,'jeeson@gmail.com','IT',20000);
INSERT INTO `employees` VALUES (2,'jack',23,'jack@gmail.com','Sales',20000);
INSERT INTO `employees` VALUES (3,'james',22,'jamess@gmail.com','Marketing',30000);
INSERT INTO `employees` VALUES (4,'Ben',25,'ben@gmail.com','IT',25000);
INSERT INTO `employees` VALUES (5,'jency',26,'jency@gmail.com','HR',40000);
INSERT INTO `employees` VALUES (6,'Sneha',25,'sneha@gmail.com','IT',20000);
INSERT INTO `employees` VALUES (7,'jenson',25,'jenson@gmail.com','Marketing',22000);
INSERT INTO `employees` VALUES (8,'Akhil',30,'akhil@gmail.com','Finance',45000);
INSERT INTO `employees` VALUES (10,'Rahul',32,'rahul@gmail.com','Sales',50000);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table Objects for table employees2
#

DROP TABLE IF EXISTS `employees2`;
CREATE TABLE `employees2` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Dumping data for table employees2
#
LOCK TABLES `employees2` WRITE;
/*!40000 ALTER TABLE `employees2` DISABLE KEYS */;

INSERT INTO `employees2` VALUES (1,'John',25,'john@gmail.com',55000,1);
INSERT INTO `employees2` VALUES (2,'Alex',28,'alex@gmail.com',62000,1);
INSERT INTO `employees2` VALUES (3,'Maria',26,'maria@gmail.com',45000,2);
INSERT INTO `employees2` VALUES (4,'David',32,'david@gmail.com',70000,3);
INSERT INTO `employees2` VALUES (5,'Sophia',27,'sophia@gmail.com',52000,1);
INSERT INTO `employees2` VALUES (6,'Kevin',29,'kevin@gmail.com',48000,5);
INSERT INTO `employees2` VALUES (7,'Emma',30,'emma@gmail.com',85000,3);
INSERT INTO `employees2` VALUES (8,'Daniel',24,'daniel@gmail.com',39000,2);
INSERT INTO `employees2` VALUES (9,'Olivia',31,'olivia@gmail.com',61000,1);
/*!40000 ALTER TABLE `employees2` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table Objects for table students
#

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

#
# Dumping data for table students
#
LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;

INSERT INTO `students` VALUES (3,'Jeeson',24,'jeeson@gmail.com','MCA');
INSERT INTO `students` VALUES (5,'Anu',19,'anu@gmail.com','mca');
INSERT INTO `students` VALUES (7,'Kevin',22,'kevin@gmail.com','MCA');
INSERT INTO `students` VALUES (11,'joel',25,'joel@gmail.com','mtech');
INSERT INTO `students` VALUES (12,'jerry',23,'jerry@gmail.com','B-Farm');
INSERT INTO `students` VALUES (13,'juwel',22,'juwel@gmail.com','Mech');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

#
#  Foreign keys for table employees2
#

ALTER TABLE `employees2`
ADD CONSTRAINT `employees2_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`);


/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
