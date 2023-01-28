--CREATE DATABASE IF NOT EXISTS `z_adrs`;

--use z_adrs ;

CREATE TABLE `song` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` text COLLATE utf8_unicode_ci NOT NULL,
  `track` text COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `song` (`id`, `artist`, `track`, `link`) VALUES
(1, 'Rin', 'Ljubav/Beichtstuhl', 'https://www.youtube.com/watch?v=MDHJMirQ5PI'),
(2, 'Jeremih feat. Natasha Mosley', 'F*** U All The Time', 'https://www.youtube.com/watch?v=6-Bq7PCKCJ4'),
(3, 'Nao', 'In the Morning', 'https://www.youtube.com/watch?v=uuocmqLRgOM'),
(4, 'Sofi / Tukker', 'Matadora', 'https://www.youtube.com/watch?v=d6GJeap4Oqo'),
(5, 'Yung Hurn', 'Nein', 'https://www.youtube.com/watch?v=22m5eU6uxeQ'),
(6, 'Rin', 'Error', 'https://www.youtube.com/watch?v=VzajBMa-2P8'),
(7, 'Detachments', 'Circles (Martyn Remix)', 'http://www.youtube.com/watch?v=UzS7Gvn7jJ0'),
(8, 'Survive', 'Hourglass', 'https://www.youtube.com/watch?v=JVOe2oGoHLk'),
(9, 'Big Narstie', 'Hello Hi', 'https://www.youtube.com/watch?v=q10WwZJmPew'),
(10, 'Sleaford Mods', 'Tarantula Deadly Cargo', 'https://www.youtube.com/watch?v=E-gvxxhcS8s'),
(11, 'Mykki Blanco and Woodkid', 'Highschool never ends', 'https://www.youtube.com/watch?v=cNGR4ciDmTA'),
(12, 'Secondcity and Tyler Rowe', 'I Enter', 'https://www.youtube.com/watch?v=vAmDJAxNMi0'),
(13, 'Maxxi Soundsystem', 'Regrets we have no use for (Radio1 Rip)', 'https://soundcloud.com/maxxisoundsystem/maxxi-soundsystem-ft-name-one'),
(14, 'Jamie T', 'Don''t you find', 'https://www.youtube.com/watch?v=-tmoaFAT108'),
(15, 'Sierra Kid', 'Ein Fan von Dir', 'https://www.youtube.com/watch?v=dfabdmbpQeQ'),
(16, 'SSIO', 'Nullkommaneun', 'https://www.youtube.com/watch?v=Slei8n08Cqk'),
(17, 'Pupkulies & Rebecca', 'ICI', 'https://www.youtube.com/watch?v=60tebPRj_D0'),
(18, 'Color War', 'Shapeshifting', 'https://vimeo.com/111250184'),
(19, 'R�F�S', 'Innerbloom', 'https://www.youtube.com/watch?v=IA1liCmUsAM'),
(20, 'R�F�S', 'Tonight', 'https://www.youtube.com/watch?v=GCa_TKn9ghI');
