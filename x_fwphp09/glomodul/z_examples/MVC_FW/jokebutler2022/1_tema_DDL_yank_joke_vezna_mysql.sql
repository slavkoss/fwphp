-- 'root' username and root password ('mypassword')
-- tema = DB name ('ijdb') : -- z_yoke
-- $pdo = new PDO('mysql:host=localhost;dbname=ijdb', 'ijdbuser', 'mypassword');
--  $pdo = new PDO('mysql:host=localhost;dbname=tema', 'root', 'root');
-- see J:\awww\apl\dev1\04knjige\yank_vezna\chapter12\includes\db.inc.php

--CREATE USER 'ijdbuser'@'%' IDENTIFIED BY 'mypassword';
--GRANT ALL PRIVILEGES ON `ijdb`.* TO 'ijdbuser'@'%';

--new PDO('mysql:host=hostname;dbname=database', 'username','password')
--try {
--  $pdo = new PDO('mysql:host=mysql;dbname=ijdb', 'ijdbuser', 'mypassword');
--  $output = 'Database connection established.';
--}
--catch (PDOException $e) {
--  $output = 'Unable to connect to the database server: ' . $e->getMessage();
--}
--include  __DIR__ . '/../templates/output.html.php';
--<!doctype html>
--<html>
--<head>
--  <meta charset="utf-8">
--  <title>Script Output</title>
--</head>
--<body>
--  <?php echo $output; ?>
--</body>
--</html>


CREATE TABLE author (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255),
	email VARCHAR(255),
	password CHAR(32),
	UNIQUE (email)
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

-- SELECT COUNT(`id`) FROM `joke`
CREATE TABLE joke (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	joketext TEXT NULL,
	jokedate DATE NULL,
	authorid INT,
	FOREIGN KEY (authorid) REFERENCES author (id)
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;
--INSERT INTO `joke`
--(`joketext`, `date`) VALUES (
--'A programmer was found dead in the shower. The instructions read: lather, rinse,
--?repeat.',
--"2021-10-29");
--INSERT INTO `joke`
--(`joketext`, `date`) VALUES (
--'!false - it\'s funny because it\'s true',
--"2021-04-01")

CREATE TABLE category (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255)
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

CREATE TABLE jokecategory (
	jokeid INT NOT NULL,
	categoryid INT NOT NULL,
	PRIMARY KEY (jokeid, categoryid),
	FOREIGN KEY (jokeid) REFERENCES joke (id),
	FOREIGN KEY (categoryid) REFERENCES category (id)
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

CREATE TABLE role (
	id VARCHAR(255) NOT NULL PRIMARY KEY,
	description VARCHAR(255)
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

CREATE TABLE authorrole (
	authorid INT NOT NULL,
	roleid VARCHAR(255) NOT NULL,
	PRIMARY KEY (authorid, roleid),
	FOREIGN KEY (authorid) REFERENCES author (id),
	FOREIGN KEY (roleid) REFERENCES role (id)
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

# Sample data
# We specify the IDs so they are known when we add related entries

-- password is password, not passwordijdb !!
INSERT INTO author (id, name, email, password) VALUES
(1, 'Kevin Yank', 'thatguy@kevinyank.com', MD5('passwordijdb')),
(2, 'Tom Butler', 'tom@example.com', NULL);

INSERT INTO joke (id, joketext, jokedate, authorid) VALUES
(1, 'Why did the chicken cross the road? To get to the other side!', '2012-04-01', 1),
(2, 'Knock-knock! Who\'s there? Boo! "Boo" who? Don\'t cry; it\'s only a joke!', '2012-04-01', 1),
(3, 'A man walks into a bar. "Ouch."', '2012-04-01', 2),
(4, 'How many lawyers does it take to screw in a lightbulb? I can\'t say: I might be sued!', '2012-04-01', 2);

INSERT INTO category (id, name) VALUES
(1, 'Knock-knock'),
(2, 'Cross the road'),
(3, 'Lawyers'),
(4, 'Walk the bar');

INSERT INTO jokecategory (jokeid, categoryid) VALUES
(1, 2),
(2, 1),
(3, 4),
(4, 3);

INSERT INTO role (id, description) VALUES
('Content Editor', 'Add, remove, and edit jokes'),
('Account Administrator', 'Add, remove, and edit authors'),
('Site Administrator', 'Add, remove, and edit categories');

INSERT INTO authorrole (authorid, roleid) VALUES
(1, 'Account Administrator');
