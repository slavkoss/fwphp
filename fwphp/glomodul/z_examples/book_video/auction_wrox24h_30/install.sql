DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `first_name` VARCHAR(50) NOT NULL,
  `last_name` VARCHAR(50) NOT NULL,
  `position` VARCHAR(50) DEFAULT NULL,
  `email` VARCHAR(255) DEFAULT NULL,
  `phone` VARCHAR(20) DEFAULT NULL
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `cat_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `cat_name` VARCHAR(50) NOT NULL,
  `cat_description` TEXT NULL,
  `cat_image` VARCHAR(255) NULL
) ENGINE = MYISAM;

DROP TABLE IF EXISTS `lots`;
CREATE TABLE `lots` (
  `lot_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `lot_name` varchar(50) NOT NULL,
  `lot_description` TEXT NULL,
  `lot_image` VARCHAR(255) NULL,
  `lot_number` INT(11) UNSIGNED NULL,
  `lot_price` DECIMAL(10,2) DEFAULT '0' NULL,
  `cat_id` INT(11) UNSIGNED NULL
) ENGINE=MyISAM;

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `position`, `email`, `phone`) VALUES
(1, 'Martha', 'Smith', 'none', 'martha@example.com', NULL),
(2, 'George', 'Smith', 'none', 'george@example.com', '515-555-1236'),
(3, 'Jeff', 'Meyers', 'hip hop expert for shure', 'jeff@example.com', NULL),
(4, 'Peter', 'Meyers', 'none', 'peter@example.com', '515-555-1237'),
(5, 'Sally', 'Smith', 'none', 'sally@example.com', '515-555-1235'),
(6, 'Sarah', 'Finder', 'Lost Soul', 'finder@a.com', '555-123-5555');

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`, `cat_image`) VALUES
(1, 'Women', 'Women''s Clothing from the 18th century to modern times', 'gernreich-10-26.jpg'),
(2, 'Gents', 'Gents'' clothing from the 18th century to modern times', 'tophat-8-63.jpg'),
(3, 'Sporting', 'Sporting clothing and gear', 'wool-6-171.jpg');

INSERT INTO `lots` (`lot_id`, `lot_number`, `lot_name`, `lot_description`, `lot_image`, `lot_price`, `cat_id`) VALUES
(1, '26', 'Striped Cotton Tailcoat, America, 1835-1845', 'Orange and white pin-striped twill cotton, double breasted, turn down collar, waist seam, self-fabric buttons, inside single button pockets in each tail, (soiled, faded, cuff edges frayed) good. ', 'gents-striped-8-26.jpg', '20700.00', 2),
(2, '173', 'Printed & Voided Velvet Evening Gown, 1850s', 'Chocolate brown silk faille with border design of brown and cream roses, uncut and voided velvet printed in shades of brown and cream, full skirt in two tiers, back brass hook & eye closure, glazed linen bodice lining, (seams at waistline weak, minor stains) excellent. ', 'gown-victorian-8-173.jpg', '13800.00', 1),
(3, '2', 'Dior Couture Wool Cocktail Dress, 1948', 'Unlabeled black melton wool 3 piece ensemble, c/o tulip shape skirt w/ projecting side panel, strapless bodice w/ built-in corset, & face-framing off-the-shoulder shrug, B 36", W 27", H 42", center front bodice L 9.75", skirt L 31", excellent. ', 'dior-10-2.jpg', '40250.00', 1),
(4, '740', 'Pierre Cardin for Mia Farrow Dress, 1967', 'Made exclusively for Mia Farrow in her first starring film role, 1968&#39;s &#34;A Dandy In Aspic&#34;, white wool woven in tiny honey-comb pattern, graduated accordian pleats from collar to hem, circular padded roll collar w/ CF snap, white China silk lining. excellent. ', 'cardin-5-740.jpg', '19550.00', 1),
(5, '27', 'Black Broadcloth Tailcoat, 1830-1845', 'Fine thin wool broadcloth, double breasted, notched collar, horizontal front and side waist seam, slim long sleeves with notched cuffs, curved tails, black silk satin lining quilted in diamond pattern, padded and quilted chest, black silk covered buttons, (buttons worn) excellent. ', 'gents-black-8-27.jpg', '3450.00', 2),
(6, '173', 'Naval Officer''s Formal Tailcoat, 1840s', 'Black wool broadcloth, double breast front, missing 3 of 18 raised round gold buttons w/ crossed cannon barrels & "Ordnance Corps" text, silver sequin & tinsel embroidered emblem on each square cut tail, quilted black silk lining, very good; ', 'naval-19-173.jpg', '5700.00', 2),
(7, '265', 'Colorful Striped Wool Bathing Suit, c. 1910', 'Gent''s 1-piece machine knit suit in red, green, black & cream, 3 buttons each shoulder, DLM, Ch 35", W 32.5", L 43", (minor mends, 1 dime size hole in back) good. ', 'swimsuit-striped-9-265.jpg', '1380.00', 3),
(8, '254', 'Ladies Bathing Costume, Shoes & Floats, c. 1900', 'Marine blue lightweight wool, white sailor collar & trim, button-on skirt, labeled "Arnold Constable & Co. New York", B 34", W 25", L 40"; 1 pair black cotton knit thigh-high canvas sole bathing shoes & set of "Aybad''s Water Wings Patented May 7, 1901", excellent. ', 'skirted-bathing-1-254.jpg', '510.00', 3),
(9, '549', 'Frontier Beaded Jacket & Chaps, c. 1920', 'Caramel deerskin leather w/ large glass beads in green & white, Jacket: Chest 42", W 39", L 34", Chap''s inseam 29", prob. made by Mohawks for Wild West shows or as fraternal costume for Improved Order of Red Men, (leather dry, bead loss) good. ', 'frontier-10-549.jpg', '258.75', 3);

ALTER TABLE `contacts` 
  ADD `user_name` varchar(15) NOT NULL,
  ADD `password` varchar(128) NOT NULL,
  ADD `access` varchar(10) NOT NULL;  

# Note: All passwords are 12345678
UPDATE `contacts` SET `user_name` = 'msmith',`password` = '045a112e49afc2c36351932516a90d6e0e6a12959c3afb2e42e31753b9c1f491ac791b0e93f2b821337abb801b1ea88c968913ad6cec39ac7f8b1e827d5780cc',`access` = 'Admin' WHERE `contacts`.`id` = 1;
UPDATE `contacts` SET `user_name` = 'gsmith',`password` = '6aa996dca7617bde65803decd333394e0cf88302f33cf7bfefbb273b98cca254fbc83f72a6d554213164313d59e1cdf158fb66a56a0c89ee2543543cbb84746d',`access` = 'Admin' WHERE `contacts`.`id` = 2;
UPDATE `contacts` SET `user_name` = 'jmeyers',`password` = '6788c4f3f22d015672a8bc56cc839e07c0e11aa1309cacf55311ddcbb8a6ba296d62d7316071a667846d6c5ada71bd13f9a412604a30bdac3586c7d19fb5a16c',`access` = 'Admin' WHERE `contacts`.`id` = 3;
UPDATE `contacts` SET `user_name` = 'pmeyers',`password` = '7ab6a8bb89c07d1b7bbfec1f75ae97d6e7301886c15aef0e82b329344440832cb430cd720d7707793a354611ac476125236be40b298dab927991c945ede1cee4',`access` = 'Admin' WHERE `contacts`.`id` = 4;
UPDATE `contacts` SET `user_name` = 'ssmith',`password` = 'c4708130118ec1d574717b5224fec01716e231491b1e592563e17f11ae91e8925afd96f8114e65769b80a03fab8266bb45dfe418c435443e73a61cdf0d3ed1a8',`access` = 'Admin' WHERE `contacts`.`id` = 5;
UPDATE `contacts` SET `user_name` = 'sfinder',`password` = 'ff2305ded6a6a3d20bf960c8862bf7835bc0396d880fbd326aa31d5f566602f099452c5a99c62e8cd5183205b0585798781eff6c3f2dac1a98ca9f6397865d64',`access` = 'Admin' WHERE `contacts`.`id` = 6;
UPDATE `contacts` SET `user_name` = 'moreilly',`password` = '9a961b3cf1a716c5221091f67c4774cc74dcdb655045f5cde91227ab1b8998518ddc1dcf093da9b245e6b847094f23e507a372ad26e263bb8695c6a5d6c4b809',`access` = 'Admin' WHERE `contacts`.`id` = 10;

ALTER TABLE `contacts` ADD UNIQUE (
`user_name`
);

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

INSERT INTO `articles` (`id`, `title`, `text`, `created_by`, `date_created`, `modified_by`, `date_modified`) VALUES
(1, 'Terms of Use', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed tortor ac ante consequat porta et et tortor. Suspendisse suscipit sodales luctus. Sed interdum, urna a dapibus lacinia, odio velit accumsan augue, quis auctor tortor dolor vitae massa. Etiam fermentum cursus tempor. Morbi malesuada suscipit eros ac hendrerit. Etiam aliquam justo a dui laoreet eu congue nulla bibendum. \r\n\r\nNunc eget lectus odio. Etiam sodales vehicula ornare. Suspendisse quis porttitor justo. Donec eget auctor felis. Sed ultricies fringilla elit quis tincidunt. Mauris sed condimentum tellus. Phasellus sollicitudin pulvinar interdum. Integer faucibus egestas rhoncus. In et turpis sed dolor rutrum eleifend. \r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis ac lectus eu ipsum rutrum pharetra. Nam feugiat sagittis urna, at porttitor dolor scelerisque nec. In lacinia, dui et tempus luctus, erat massa placerat orci, at porta velit risus in diam.                     ', 2, '2011-06-08 14:09:00', 2, '2011-06-13 15:41:16'),
(2, 'Privacy Policy', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed tortor ac ante consequat porta et et tortor. Suspendisse suscipit sodales luctus. Sed interdum, urna a dapibus lacinia, odio velit accumsan augue, quis auctor tortor dolor vitae massa. Etiam fermentum cursus tempor. <p>\r\n<h2>Velit Risus in Diam</h2>\r\n<ol>\r\n<li>In lacinia, dui et tempus luctus, erat massa placerat orci</li>\r\n<li>Nulla varius posuere elit, at cursus libero facilisis imperdiet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</li>\r\n<li>Vestibulum placerat, lorem et consectetur congue</li>\r\n</ol>\r\n          ', 2, '2011-06-08 20:36:31', 2, '2011-06-13 13:46:32');

DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL DEFAULT 'Public',
  `orderby` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

INSERT INTO `menus` (`id`, `title`, `link`, `level`, `orderby`) VALUES
(1, 'Lot Categories', 'content=categories', 'Public', 1),
(2, 'About Us', 'content=about', 'Public', 2),
(3, 'Home', 'content=home', 'Public', 3),
(4, 'Logout', 'content=logout', 'LoggedIn', 4),
(5, 'Articles', 'content=articles', 'Admin', 5),
(6, 'Menu Items', 'content=menus', 'Admin', 6),
(7, 'Login', 'content=login', 'LoggedOut', 7),
(8, 'Terms of Use', 'content=articledisplay&id=1', 'Public', 8),
(9, 'Privacy Policy', 'content=articledisplay&id=2', 'Public', 9);