

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `field`(
`field_id`  INT(10) NOT NULL PRIMARY KEY,
`field_size` INT(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `field_worker`(
`worker_id` INT(10)NOT NULL PRIMARY KEY,
`name` VARCHAR(30) NOT NULL,
`salary` VARCHAR(10) NOT NULL,
`phno` VARCHAR(20) NOT NULL,
`field_id` int(10)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `warehouse`(
`warehouse_id` INT(10) NOT NULL PRIMARY KEY,
`location` VARCHAR(200) NOT NULL,
`name` VARCHAR(30)NOT NULL,
`Aavailabilty` BIT NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `pesticide`(
`pesticide_name` VARCHAR(50) NOT NULL PRIMARY KEY,
`description` TEXT,
`cost` INT(10)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `crop`(
`crop_id` INT(10) PRIMARY KEY,
`crop_name` VARCHAR(50),
`month` text,
`quantity` INT(10),
`pesticide_name` VARCHAR(50),
`field_id` INT(10),
`warehouse_id` INT(10)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `field_worker`
ADD FOREIGN KEY (`field_id`) REFERENCES `field`(`field_id`);

ALTER TABLE `crop`
ADD FOREIGN KEY (`pesticide_name`) REFERENCES `pesticide`(`pesticide_name`), ADD FOREIGN KEY(`field_id`) REFERENCES `field`(`field_id`), 
ADD FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse`(`warehouse_id`);

ALTER TABLE `field`
MODIFY `field_id` INT(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `field_worker`
MODIFY `worker_id` INT(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `warehouse`
MODIFY `warehouse_id` INT(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `crop`
MODIFY `crop_id` INT(10) NOT NULL AUTO_INCREMENT;