CREATE TABLE `nw202003`.`clients` (
  `clientid` BIGINT(15) NOT NULL AUTO_INCREMENT,
  `clientname` VARCHAR(128) NULL,
  `clientgender` CHAR(3) NULL,
  `clientphone1` VARCHAR(255) NULL,
  `clientphone2` VARCHAR(255) NULL,
  `clientmail` VARCHAR(255) NULL,
  `clientnumber` VARCHAR(45) NULL,
  `clientbio` VARCHAR(5000) NULL,
  `clientstatus` CHAR(3) NULL,
  `clientdatecrt` DATETIME NULL,
  `clientusercreate` BIGINT(10) NULL,
  PRIMARY KEY (`clientid`));