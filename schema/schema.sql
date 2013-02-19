
# Dumping structure for table tbl_constant
DROP TABLE IF EXISTS `tbl_constant`;
CREATE TABLE IF NOT EXISTS `tbl_constant` (
  `ConstantName` varchar(255) NOT NULL DEFAULT '',
  `ConstantValue` text,
  `ConstantDesc` text,
  `ConstantGroup` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`ConstantName`),
  UNIQUE KEY `ConstantName` (`ConstantName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table tbl_constant: 1 rows
DELETE FROM `tbl_constant`;
/*!40000 ALTER TABLE `tbl_constant` DISABLE KEYS */;
INSERT INTO `tbl_constant` (`ConstantName`, `ConstantValue`, `ConstantDesc`, `ConstantGroup`)
VALUES ('URCHINCODE', '0', 'Google Analytics Code. 0 - no code', 'misc');
/*!40000 ALTER TABLE `tbl_constant` ENABLE KEYS */;
