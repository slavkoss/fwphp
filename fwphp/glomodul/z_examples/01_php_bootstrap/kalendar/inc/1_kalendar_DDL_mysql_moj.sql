--            kalendar  php-jquery_example
-- Programming PHP, Third Edition by Kevin Tatroe, Peter MacIntyre, and Rasmus Lerdorf,  2013  O’Reilly Media, Inc
--CREATE DATABASE IF NOT EXISTS `tema`
--DEFAULT CHARACTER SET utf8
--COLLATE utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `tema`.`users` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(80) DEFAULT NULL,
  `user_pass` VARCHAR(47) DEFAULT NULL,
  `user_email` VARCHAR(80) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE (`user_name`)
) ENGINE=MyISAM CHARACTER SET utf8 COLLATE utf8_unicode_ci;

-- usr/psw = ss/admin
-- Hash of "ss"is a1645e41f29c45c46539192fe29627751e1838f7311eeb4
-- see J:\awww\www\fwphp\glomodul\z_examples\encrypt_decrypt_password_hash.php
INSERT INTO `tema`.`users` (`user_name`, `user_pass`, `user_email`)
VALUES ('a', 'a', 'slavkoss22@gmail.com' );



CREATE TABLE IF NOT EXISTS `tema`.`events` (
  `event_id` INT(11) NOT NULL AUTO_INCREMENT,
  `event_title` VARCHAR(80) DEFAULT NULL,
  `event_desc` TEXT,
  `event_start` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `event_end` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
 
  PRIMARY KEY (`event_id`),
  INDEX (`event_start`)
) ENGINE=MyISAM CHARACTER SET utf8 COLLATE utf8_unicode_ci;
 
INSERT INTO `tema`.`events`
  (`event_title`, `event_desc`, `event_start`, `event_end`) VALUES
  ('New Year&#039;s Day', 'Happy New Year!',
    '2016-01-01 00:00:00', '2016-01-01 23:59:59'),
  ('Last Day of January', 'Last day of the month! Yay!',
    '2016-01-31 00:00:00', '2016-01-31 23:59:59');
    
