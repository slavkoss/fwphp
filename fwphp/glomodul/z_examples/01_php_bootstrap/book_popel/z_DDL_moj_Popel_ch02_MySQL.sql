/*
-- J:\awww\www\zbig\04knjige\02popel\ch7books_in_out\_DDL_Popel_ch02_MySQL.sql

-- 1. z:
-- 2. cd .sys\mysql
        -- 5.6.10 MySQL Community Server (GPL) Oracle 2013
        -- 1a. copy J:\awww\apl\dev1\zdoc\04knjige\00PHP_book\ch27_auth\0_DDL_bookmarks.sql .
--mysql -u root -p < 0_DDL_bookmarks.sql
        --    Enter password: ENTER key
        --    ERROR at line 2: Unknown command '\a'
-- 3. lsweb -> login.php -> register :
--    slavkoss22@gmail.com  ss/slavko
--          e r r s :
-- 1. extension=php_mysqli.dll (Class 'mysqli' not found)
--    $mysqli = new MySQLi($db_server, $db_user, $db_pass, $db_name) or die(mysqli_error());
-- 2. see commented grant below (Access denied for user  'bm_user'@'localhost')
-- 3. if not logged in : Undefined index: username in J:\awww\apl\dev1\zdoc\04knjige\00PHP_book\ch27_auth\member.php on line 8


----    DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
---- Popel PDO
*/
create database IF NOT EXISTS books;
use books; 

create table books(
  id int primary key not null auto_increment,
  author int not null,
  title varchar(70) not null,
  isbn varchar(20),
  publisher varchar(30) not null,
  year int(4) not null,
  summary text(2048));
  
alter table books add column coverMime varchar(20);
alter table books add column coverImage blob(24000);
alter table books add column copies tinyint not null default 1;
ALTER TABLE `books` ADD `coverimgname` VARCHAR(50) NULL AFTER `copies`;

create table authors(
 id int primary key not null auto_increment,
 firstName varchar(30) not null,
 lastName varchar(40) not null,
 bio text(2048));

 
 create table borrowers(
 id int primary key not null auto_increment,
 book int not null,
 name varchar(40),
 dt int);



insert into authors(firstName, lastName, bio) values(
 'Marc', 'Delisle', 'Marc Delisle is a member of the MySQL Developers Guide');
insert into authors(firstName, lastName, bio) values(
'Sohail', 'Salehi', 'Contributed to over 20 books, mainly in programming and computer graphics');
insert into authors(firstName, lastName, bio) values(
'Cameron', 'Cooper', 'J. Cameron Cooper has been playing
around on the web since there was not much of a web with which to
play around');


insert into books(author, title, isbn, publisher, year,
summary) values(
 1, 'Creating your MySQL Database: Practical Design Tips and
Techniques', '1904811302', 'Packt Publishing Ltd', '2006',
 'A short guide for everyone on how to structure your data and
set-up your MySQL database tables efficiently and easily.');
insert into books(author, title, isbn, publisher, year,
summary) values(
 2, 'ImageMagick Tricks', '1904811868', 'Packt Publishing
Ltd', '2006',
 'Unleash the power of ImageMagick with this fast, friendly
tutorial, and tips guide');
insert into books(author, title, isbn, publisher, year,
summary) values(
 3, 'Building Websites with Plone', '1904811027', 'Packt
Publishing Ltd', '2004',
 'An in-depth and comprehensive guide to the Plone content
management system');
/*
--root/enterkey or grant all on books.* to books@localhost identified by 'books';
*/
