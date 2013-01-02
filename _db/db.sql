CREATE TABLE `bliss_options` (
`option_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
`option_name` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`option_value` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`autoload` TINYINT( 1 ) UNSIGNED NOT NULL ,
PRIMARY KEY (  `option_id` )
) ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;



