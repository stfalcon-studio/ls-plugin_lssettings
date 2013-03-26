CREATE TABLE IF NOT EXISTS `prefix_configset` (
  `configset_key` varchar(250) NOT NULL,
  `configset_val` text NOT NULL,
  `configset_keytype` varchar(20) NOT NULL,
  PRIMARY KEY (`configset_key`(60))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;