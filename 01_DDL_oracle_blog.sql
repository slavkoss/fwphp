-- Host: 127.0.0.1
-- Generation Time: Nov 19 and 16, 2019 at 04:40 PM
--
-- Database: hr (cmsakram)
--
-- --------------------------------------------------------

--
prompt 1. Table structure for table `ADMINS`
--

CREATE TABLE ADMINS (
  ID NUMBER(10) NOT NULL,
  DATETIME VARCHAR2(64) ,
  USERNAME VARCHAR2(255) ,
  PASSWORD VARCHAR2(255) ,
  aname VARCHAR2(255) ,
  AHEADLINE VARCHAR2(255) ,
  ABIO VARCHAR2(4000) ,
  AIMAGE VARCHAR2(255) ,
  ADDEDBY VARCHAR2(255) 
) ;

--
prompt 1. Dumping data for table ADMINS
--

INSERT INTO ADMINS (id, datetime, username, password, aname, aheadline, abio, aimage, addedby) VALUES
(1, '2019-01-18 13:01:33', 'jazeb', '1234', 'Jazeb Akram', 'Freelancer', 'Jazeb Akram is a developer and web designer with the great passion for building beautiful new Desktop/Web Applications from scratch. He has been working as aÂ Freelancer since 2011.He designed various Applications for many web design companies as an Out Sourcer. Jazeb Also have a university degree in computer science along with many research activitiesYou can read his full portfolio on his website jazebakram.com/portfolio', 'meatmirror.jpg', 'Zoe333');

INSERT INTO ADMINS (id, datetime, username, password, aname, aheadline, abio, aimage, addedby) VALUES
(17, '2019-10-18 13:01:33', 'w', 'wwww', 'qqqqqqqq n wwwwwwwwww', 'heeeeeeaaaaaaaaaa wwwwwwwwwww', 'Biography  biooooooooo of wwwwwwww        \r\nbbbbbbbbb iiiiiiii                                                                   ', 'twitter.jpg', 'ss');

INSERT INTO ADMINS (id, datetime, username, password, aname, aheadline, abio, aimage, addedby) VALUES
(18, '2019-10-18 13:01:33', 'ss', 'ssss', 'ss', 'IT galiot', 'bbbbb\r\n<br />bbb iiiiiii oo\r\n<br />o oooooooo\r\n<br />xxx xxxxxxx vvvvvvvvvv ', 'meatmirror.jpg', 'w');

INSERT INTO ADMINS (id, datetime, username, password, aname, aheadline, abio, aimage, addedby) VALUES
(29, '2019-10-18 13:01:33', '1111111111', '1111', '111111111111111111', '', '', 'avatar.png', 'w');

-- --------------------------------------------------------

--
prompt 2. Table structure for table category
--

CREATE TABLE CATEGORY (
  ID NUMBER(10) NOT NULL,
  TITLE VARCHAR2(255) ,
  AUTHOR VARCHAR2(255) ,
  DATETIME VARCHAR2(50) 
) ;

--
prompt 2. Dumping data for table CATEGORY
--

INSERT INTO CATEGORY (id, title, author, datetime) VALUES
(1, 'Technology', 'Jazeb', '2019-10-18 13:01:33');
INSERT INTO CATEGORY (id, title, author, datetime) VALUES
(3, 'Fitness', 'Jazeb', '2019-10-18 13:01:33');
INSERT INTO CATEGORY (id, title, author, datetime) VALUES
(5, 'Science', 'Tom', '2019-10-18 13:01:33');
INSERT INTO CATEGORY (id, title, author, datetime) VALUES
(6, 'Politics', 'jazeb', '2019-10-18 13:01:33');
INSERT INTO CATEGORY (id, title, author, datetime) VALUES
(7, 'Sports', 'Xerox121', '2019-10-18 13:01:33');
INSERT INTO CATEGORY (id, title, author, datetime) VALUES
(8, 'World', 'Xerox121', '2019-10-18 13:01:33');
INSERT INTO CATEGORY (id, title, author, datetime) VALUES
(9, 'News', 'Xerox121', '2019-10-18 13:01:33');
INSERT INTO CATEGORY (id, title, author, datetime) VALUES
(10, 'Movies', 'Xerox121', '2019-10-02 12:25:56');
INSERT INTO CATEGORY (id, title, author, datetime) VALUES
(21, '1111111', 'w', '2019-10-18 13:01:33');
INSERT INTO CATEGORY (id, title, author, datetime) VALUES
(22, '2222222', 'w', '2019-10-18 13:01:44');
INSERT INTO CATEGORY (id, title, author, datetime) VALUES
(30, 'B12phpfw', 'w', '2019-11-09 14:11:38');

-- --------------------------------------------------------

--
prompt 3. Table structure for table COMMENTS
--

CREATE TABLE COMMENTS (
  ID NUMBER(10) NOT NULL,
  DATETIME VARCHAR2(50) ,
  NAME VARCHAR2(255) ,
  EMAIL VARCHAR2(128) ,
  COMMENTTXT VARCHAR2(4000) ,
  APPROVEDBY VARCHAR2(255) ,
  STATUS VARCHAR2(3),
  POST_ID NUMBER(10)
) ;

--
prompt 3. Dumping data for table COMMENTS
--

INSERT INTO COMMENTS (id, datetime, name, email, commenttxt, approvedby, status, post_id) VALUES
(2, '2019-01-08', 'John', 'Thaa@gm.com', 'This movie was fabulous ', 'Zee Lu', 'ON', 53);
INSERT INTO COMMENTS (id, datetime, name, email, commenttxt, approvedby, status, post_id) VALUES
(3, '2019-01-09 12:25:04', 'Elizabeth ', 'Elizabeth@nc.vom', 'yes yes yes.', 'Zee Lu', 'ON', 53);
INSERT INTO COMMENTS (id, datetime, name, email, commenttxt, approvedby, status, post_id) VALUES
(7, '2019-01-12 10:19:59', 'Malik G', 'add@gg.com', ' Ø¬Ø§ Ø³Ùˆ Centaurus   Ø±Ø§Ø¬Û Ø¬ÛŒ ', 'Zee Lu', 'ON', 54);
INSERT INTO COMMENTS (id, datetime, name, email, commenttxt, approvedby, status, post_id) VALUES
(18, '2019-01-07 12:25:04', 'Macdawer ', 'ad', 'Future sounds great', 'David Miller', 'OFF', 50);
INSERT INTO COMMENTS (id, datetime, name, email, commenttxt, approvedby, status, post_id) VALUES
(23, '2019-01-12 19:45:19', 'Nick Walter', 'example@example.com', 'great post', 'Jazeb Akram', 'ON', 54);
INSERT INTO COMMENTS (id, datetime, name, email, commenttxt, approvedby, status, post_id) VALUES
(24, '2019-01-14 20:00:24', 'Tome Hanks', 'tom@example.com', 'great to see this post.', 'wwwww nnnnnn', 'ON', 48);
INSERT INTO COMMENTS (id, datetime, name, email, commenttxt, approvedby, status, post_id) VALUES
(30, '2019-10-20 21:06:44', 'ss', 'slavkoss22@gmail.com', 'ssssssssssssssssssssssssssss ssssssssssssssss ssssssssssss', 'qqqqqqqq n wwwwwwwwww', 'ON', 54);
INSERT INTO COMMENTS (id, datetime, name, email, commenttxt, approvedby, status, post_id) VALUES
(31, '2019-11-03 14:54:36', 'ss', 'slavkoss22@gmail.com', '##### eeeeee wwwwwwww 3      33333333333333 33333333 333########', 'qqqqqqqq n wwwwwwwwww', 'ON', 54);

-- --------------------------------------------------------

--
prompt 4. Table structure for table POSTS
--

CREATE TABLE POSTS (
  ID NUMBER(10) NOT NULL,
  DATETIME VARCHAR2(50) ,
  TITLE VARCHAR2(255) ,
  CATEGORY VARCHAR2(255) ,
  AUTHOR VARCHAR2(255) ,
  IMAGE VARCHAR2(128) ,
  POST VARCHAR2(4000) ,
  SUMMARY VARCHAR2(4000)  DEFAULT NULL,
  IMG_DESC VARCHAR2(4000)  DEFAULT NULL,
  DATETIME2 VARCHAR2(64)  DEFAULT NULL,
  AUTHOR_ID NUMBER(10) DEFAULT NULL,
  USER_ID NUMBER(10) DEFAULT NULL
) ;

--
prompt 4. Dumping data for table POSTS
--

INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(16, '2015-06-10 12:20:29', 'altervista007.txt ', 'B12phpfw', 'Tom', '3.jpg', '', '7. ORACLE 11g XE PERSISTENT DB CONNECTION POOLED (ESTABLISHED WITH PHP PDO OR E.Rangel€™s PDOOCI)', '                                ', NULL, NULL, NULL);
INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(18, '2015-08-16 12:20:29', 'altervista009.txt ', 'B12phpfw', 'Tom', '_102968357_diverse_politics.jpg', '', '9. Main development, test and production menu (and 3 sites) - PHP 7 RC5, Oracle 11g on Windows 10 all 64 bit', '', NULL, NULL, NULL);
INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(19, '2015-04-13 12:20:29', 'altervista004.txt ', 'B12phpfw', 'Zoe333', 'safe_image.jpg', '', '4. Multiple files upload OOP, namespaces and How to recognize mobile device - OOP, SPA, MVC domain style, PHP outside web doc root ', '', NULL, NULL, NULL);

INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(20, '2019-10-03 12:20:29', 'Losing_weight.txt', 'Fitness', 'Zoe333', 'fit.jpg', '', 'Losing weight is a thing of Past', '                ', NULL, NULL, NULL);
INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(21, '2015-04-14 11:20:29', 'altervista005.txt ', 'B12phpfw', 'Zoe333', 'safe_image.jpg', '', '5. CRUD simple table (ID, some data columns) PDO SQLite', '', NULL, NULL, NULL);
INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(22, '2015-04-14 12:20:29', 'altervista006.txt ', 'B12phpfw', 'Zoe333', 'HTML5 CSS3.jpg', '', '6. CRUD selfjoin table forum and message board PDO SQLite', '', NULL, NULL, NULL);

INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(23, '2019-10-04 12:20:29', 'Kids_play.txt', 'Fitness', 'Xerox121', 'children-running-t.jpg', '', 'Sarah Palen a famous physician says letting kids play the way they want make them happy, active and healthy. Parent advice on thing which they can do or dont leave a bad effect on children, she maintained. ', 'Fun Exercises for Kids : Sarah Palen...', NULL, NULL, NULL);
INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(25, '2015-07-15 12:20:29', 'altervista008.txt ', 'B12phpfw', 'Xerox121', 'gas.jpg', '', '8. Understand AngularJS (ng) ver. 1.4.3 and PHP server script Get Emp from Oracle DB 11g', '', NULL, NULL, NULL);
INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(26, '2019-10-05 12:20:29', 'Streetcar Desire 1951 ', 'Movies', 'Xerox121', 'tt.jpg', '', 'rrrrrrrrrrrr nnnnnnnnnnnn', NULL, NULL, NULL, NULL);



INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(27, '2019-10-05 12:20:29', 'Mosque.txt', 'World', 'Xerox121', 'wazir_khan_mosque.jpg', '', ' The Beautiful Wazir Khan Mosque', 'https://en.wikipedia.org/wiki/Wazir_Khan_Mosque\r\n\r\n17th century mosque located in the city of Lahore, capital of the Pakistani province of Punjab. The mosque was commissioned during the reign of the Mughal Emperor https://en.wikipedia.org/wiki/Shah_Jahan. Shah_Jahan name is Shahab-ud-din Muhammad Khurram - height of the Mughal architecture, most notably the {{b}}Taj Mahal{{/b}} https://hr.wikipedia.org/wiki/Taj_Mahal. His relationship with his wife Mumtaz Mahal has been heavily adapted into Indian art, literature, and cinema.\r\n\r\nMosque is part of an ensemble of buildings that also included the nearby Shahi Hammam baths. ', NULL, NULL, NULL);
INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(28, '2019-10-12 12:20:29', 'HTML5_CSS3.txt', 'Technology', 'Xerox121', 'htmlcourse.jpg', '', 'Learn HTML5 and CSS3.', 'banner img aaa', NULL, NULL, NULL);
INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(34, '2015-01-04 12:20:29', 'altervista003.txt', 'B12phpfw', 'Xerox121', 'safe_image.jpg', '', '3. Zwamp server development ibrowser menu', '', NULL, NULL, NULL);

INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(35, '2019-10-12 12:20:29', 'Work_out.txt', 'Fitness', 'jazeb', 'asasas.jpg', '', 'Is intensive work-out bad for health?', '', NULL, NULL, NULL);
INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(36, '2016-10-26 12:20:29', 'altervista001a.txt', 'B12phpfw', 'jazeb', 'unnamed.jpg', '', '1a. Install ZWAMP, Apache, PHP, MySQL, WordPress on Win 10 all 64bit, all portable (extract, setup files)      ', '', NULL, NULL, NULL);
INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(37, '2017-09-13 12:20:29', 'altervista001b.txt', 'B12phpfw', 'jazeb', 'ty.jpg', '', '1b. Install Apache, PHP, localhost SSL (https) On Windows 10, all newest 64 bit', '', NULL, NULL, NULL);



INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(40, '2018-05-29 08:20:29', 'altervista011.txt ', 'B12phpfw', 'Zoe333', 'sc.jpg', '', 'This is version 4 and 5 of B12phpfw. It seemed ok but I found many simplifications, improvements.','', NULL, NULL, NULL);
INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(42, '2019-02-24 12:20:29', 'altervista012.txt ', 'B12phpfw', 'jazeb', 'dd.jpg', '', '12. PHP menu and CRUD code skeleton', '', NULL, NULL, NULL);
INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(43, '2019-03-16 12:20:29', 'altervista013.txt ', 'B12phpfw', 'zoe333', 'jj.jpg', '', '13. jQuery, PHP, Bootstrap : AJAX DB table rows CRUD', '', NULL, NULL, NULL);



INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(44, '2017-09-27 12:20:29', 'altervista001c.txt', 'B12phpfw', 'DavidM', 'ss.jpg', '', '1c. Web server at home, DDNS (dynamic DNS), access my dyndns from local network, PHP, CURL, OpenSSL', '', NULL, NULL, NULL);
INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(45, '2016-07-13 12:20:29', 'altervista010.txt ', 'B12phpfw', 'jazeb', 'temaorapdo_ver_1_1-450x330.jpg', '', '\r\n10. Real life application Messages - PHP PDO, AJAX+jQuery CRUD and filter (thema, blog, forum, CMS, builetinboard, Skype replacement)', 'This old version 3. is more complicated but if you like it could be simplified. I think version 6 is best, simplest. ', NULL, NULL, NULL);
INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(46, '2019-10-12 12:20:29', 'Tesla_III.txt', 'News', 'jazeb', 'Tesla-Model-X-Silver.jpg', '', 'Tesla III is ready to launch.', '', NULL, NULL, NULL);


INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(47, '2017-05-27 12:20:29', 'altervista002a.txt', 'B12phpfw', 'Xerox121', 'iphone.jpg', '', '2a. Oracle 11g PL/SQL Tutorial', '', NULL, NULL, NULL);
INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(48, '2019-10-12 12:20:29', 'Travel_2050.txt', 'World', 'jazeb', 'travelBlogger.jpg', '', 'The Travel diary 2050.', '', NULL, NULL, NULL);
INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(50, '2019-10-12 12:20:29', 'Online_Edu.txt', 'News', 'jazeb', 'dd.jpg', '', 'The future of Online Education.', '', NULL, NULL, NULL);


INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(51, '2019-10-12 12:20:29', 'Edu_Syria.txt', 'News', 'Zoe333', 'education.jpg', '', 'Education for Syrian Refugee Children : Symbolic Syrian Woman Alkuman-Made is asking for Free Education to all under-privileges . This will definitely a milestone in the middle eastern region.', '', NULL, NULL, NULL);
INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES
(53, '2019-10-06 12:20:29', 'Jupiter_2015.txt', 'Movies', 'Zoe333', 'maxresdefault.jpg', '', 'Jupiter ascending 2015 | Movie Review', '', NULL, NULL, NULL);


INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES 
(54, '2019-10-18 15:10:29', '001. Menu_CRUD.txt', 'B12phpfw', 'ss', 'mvc_M_V_data_flow.jpg', '', 'Summary: WHY Nobody made good (not to simple) tutorial about PHP menu and CRUD code skeleton ? Especially for {{b}}each module in own folder like Oracle forms .fmb-s{{/b}} there is (almost) nothing to find in learning sources.\r\n'
, 'Picture M-V data flow. Model code is most complicated. C and V code can be standardized, M only partially : cc, rr, uu, dd methods for all tables but bussines logic in M code can not be standardized.
Users events are handled in Controller class.
- C assigns users orders in URL to variables telling V what user wants and includes V (not showed in picture).
- V pulls data from M according C variables (users orders in URL ).
- V also may call C method for some state changes ordered by user in URL, eg table row updates like approve user comment.
- V script may contain class but I do not see need for view classes because view script is included in Home_ctr class and can use $this to access methods and attributes in whole class hierarchy : Home_ctr, Config_allsites, Db_allsites. If we do not need CRUD than we do not need class hierarchy : Home_ctr, Config_allsites, Db_allsites meaning that simple coding like in mnu and mkd modules suffices..
M-C-V data flow - controller instantiates M and pushes M data to V.
I do not see advantages compared to M-V data flow. Disadvantage are : for pagination M-V data flow is only possible solution, M-C-V data flow makes C fat in large modules (lot of code). C in my msg (blog) module has lot of code, but code is very simple.
So view instantiates model and pulls data from M or C instantiates model and pulls data from M. Difference is important only for us - for clearer code, both styles work ok.
If we have users interactions (events) eg filter displayed rows (pagination is also filtering), than M-V data flow is only possible solution.', NULL, NULL, NULL);


INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES 
(67, '2014-05-25 17:01:59', 'altervista002.txt', 'B12phpfw', 'w', '', '', '2. Install all 64bit: Oracle DB 11g XE on Windows 10 + Forms 12c + APEX 5.0.3', 'post_aboutwhatever.txt post_aboutwhatever.txt post_aboutwhatever.txt', NULL, NULL, NULL);
INSERT INTO POSTS (id, datetime, title, CATEGORY, author, image, post, summary, img_desc, datetime2, author_id, user_id) VALUES 
(69, '2014-05-25 16:07:40', 'altervista001.txt', 'B12phpfw', 'w', 'twitter.jpg', '', 'SUMMARY (4000 characters)   1. Install Apache, PHP, Oracle DB 11g XE and 11g, Oracle Forms 6i and 12c and Reports on Win 10 (all 64bit)', 'IMAGE (BANNER) DESCRIPTION (4000 characters) :  aaaaaaa     yyyyyy             yyyyyyyyyyyy ', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
prompt 5. Indexes for table ADMINS
--
ALTER TABLE ADMINS ADD PRIMARY KEY (id);

--
prompt 5. Indexes for table CATEGORY
--
ALTER TABLE CATEGORY ADD PRIMARY KEY (id);

--
prompt 5. Indexes for table COMMENTS
--
ALTER TABLE COMMENTS ADD PRIMARY KEY (id);
--todoss ALTER TABLE COMMENTS ADD KEY post_id (post_id);

--
-- Indexes for table POSTS
--
--todoss ALTER TABLE POSTS ADD PRIMARY KEY (id);


--todoss :
--
prompt 1. AUTO_INCREMENT for table ADMINS
--
--ALTER TABLE ADMINS MODIFY id int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
CREATE SEQUENCE "ADMINS_ID_SEQ" MINVALUE 1 MAXVALUE 999999999999999999999999999 INCREMENT BY 1
START WITH 30 CACHE 20 NOORDER NOCYCLE 
/
CREATE OR REPLACE TRIGGER "ADMINS_INSERT" BEFORE insert on "ADMINS" for each row
begin select ADMINS_ID_SEQ.NEXTVAL into :NEW.ID from dual; end; 
/

--
prompt 2. AUTO_INCREMENT for table CATEGORY
--
--ALTER TABLE CATEGORY MODIFY id int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
CREATE SEQUENCE "CATEGORY_ID_SEQ" MINVALUE 1 MAXVALUE 999999999999999999999999999 INCREMENT BY 1
START WITH 30 CACHE 20 NOORDER NOCYCLE 
/
CREATE OR REPLACE TRIGGER "CATEGORY_INSERT" BEFORE insert on "CATEGORY" for each row
begin select ADMINS_ID_SEQ.NEXTVAL into :NEW.ID from dual; end; 
/

--
prompt 3. AUTO_INCREMENT for table COMMENTS
--
--ALTER TABLE COMMENTS MODIFY id int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
CREATE SEQUENCE "COMMENTS_ID_SEQ" MINVALUE 1 MAXVALUE 999999999999999999999999999 INCREMENT BY 1
START WITH 30 CACHE 20 NOORDER NOCYCLE 
/
CREATE OR REPLACE TRIGGER "COMMENTS_INSERT" BEFORE insert on "COMMENTS" for each row
begin select ADMINS_ID_SEQ.NEXTVAL into :NEW.ID from dual; end; 
/

--
prompt 4. AUTO_INCREMENT for table POSTS
--
--ALTER TABLE POSTS MODIFY id int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
CREATE SEQUENCE "POSTS_ID_SEQ" MINVALUE 1 MAXVALUE 999999999999999999999999999 INCREMENT BY 1
START WITH 30 CACHE 20 NOORDER NOCYCLE 
/
CREATE OR REPLACE TRIGGER "POSTS_INSERT" BEFORE insert on "POSTS" for each row
begin select ADMINS_ID_SEQ.NEXTVAL into :NEW.ID from dual; end; 
/

--
prompt 1. Constraints for table COMMENTS
--
--ALTER TABLE COMMENTS
--  ADD CONSTRAINT Foreign_Relation FOREIGN KEY (post_id) REFERENCES POSTS (id) ON DELETE CASCADE ON UPDATE CASCADE;
--COMMIT;
