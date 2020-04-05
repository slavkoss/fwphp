<?php
// J:\awww\apl\dev1\04knjige\03steinmetz\index.php
// source code http://www.tinker.tv/download/wcphp_files.zip
// Wicked Cool PHP book home page https://www.nostarch.com/wcphp.htm#updates
// Real-World Scripts That Solve Difficult Problems
// by William Steinmetz with Brian Ward February 2008, 216 pp.
// ISBN: 978-1-59327-173-2?>
<pre>
 1: First scripts.......................................................1
     #1: Including File
     #2: Filter rows, debugPDO, every other listed row <a href="ch01_INC_prev_next_links_ARR_rowcolor/row_filter_color_obj.php">different color</a>
     #3: Paginator: creating <a href="ch01_INC_prev_next_links_ARR_rowcolor/paginator_navbar_no_rows.php">Previous/Next rows block</a> links
     #4: Printing array contents
     #5: Array into Nonarray Variable That Can Be Restored Later
     #6: Sorting Multidimensional Arrays - sort big array
     #7: Templating with Smarty-same HTML encloses other data on every page
   
11: Using cURL to Interact with Web Services  ........................141
    #68: Connecting to Other Websites 
    #69: Using Cookies 
    #70: Transforming XML into a Usable Form
    #71: Using Mapping Web Services
    #72: Using PHP and SOAP to Request Data from Amazon.com
    #73: Building a Web Service

12: Intermediate Projects ............................................155
    #74: A User Poll 
    Creating a Ballot Form 
    Processing the Ballot 
    Getting Poll Results 
 
    #75: Electronic Greeting Cards 
    Choosing a Card 
    Sending the Card  
    Viewing the Card 
 
    #76: A Blogging System 
    Creating Blog Entries 
    Displaying an Entry 
    Adding Comments 
    Creating a Blog Index  
=================================   
   
 2: Configuring PHP....................................................19
    Configuration Settings php.ini File
    Locating php.ini File
     #8: Revealing All of PHP's Settings
     #9: Reading an Individual Setting
    #10: Error Reporting
    #11: Suppressing All Error Messages
    #12: Extending the Run Time of a Script
    #13: Preventing Users from Uploading Large Files
    #14: Turning Off Registered Global Variables
    #15: Enabling Magic Quotes
    #16: Restricting the Files that PHP Can Access
    #17: Shutting Down Specific Functions
    #18: Adding Extensions to PHP
  
 3: PHP Security.......................................................33
    Recommended Security Configuration Options
    #19: SQL Injection Attacks  
    #20: Preventing Basic XSS Attacks  
    #21: Using SafeHTML 
    #22: Protecting Data with a One-Way Hash 
    #23: Encrypting Data with Mcrypt 
    #24: Generating Random Passwords 

 4: Forms..............................................................45
    Security Measures: Forms Are Not Trustworthy
    Verification Strategies
    Using $_POST, $_GET, $_REQUEST, and $_FILES to Access Form Data
    #25: Fetching Form Variables Consistently and Safely
    #26: Trimming Excess Whitespace
    #27: Importing Form Variables into an Array
    #28: Making Sure a Response Is One of a Set of Given Values
    #29: Using Multiple Submit Buttons
    #30: Validating a Credit Card
    #31: Double-Checking a Credit Card's Expiration Date
    #32: Checking Valid Email Addresses
    #33: Checking American Phone Numbers

 5: Text and HTML .....................................................59
    #34: Extracting Part of a String 
    #35: Making a String Uppercase, Lowercase, or Capitalized
    #36: Finding Substrings 
    #37: Replacing Substrings 
    #38: Finding and Fixing Misspelled Words with pspell 
         Working with the Default Dictionary 
         Adding a Custom Dictionary to pspell 
    #39: Regular Expressions 
         Regular Expression Basics 
         Special Character Sequences 
         Pattern Repeaters 
         Grouping 
         Character Classes 
         Putting It All Together 
         Matching and Extracting with Regular Expressions
         Replacing Substrings with Regular Expressions
    #40: Rearranging a Table 
    #41: Creating a Screen Scraper 
    #42: Converting Plaintext into HTML-Ready Markup 
    #43: Automatically Hyperlinking URLs 
    #44: Stripping HTML Tags from Strings 

 6: Dates ...........................................................81
    How Unix Time Works 
    #45: Getting the Current Timestamp 
    #46: Getting the Timestamp of a Date in the Past or Future 
         Creating Timestamps from a String 
         Creating Timestamps from Date Values 
    #47: Formatting Dates and Times 
    #48: Calculating the Day of the Week from a Given Date 
    #49: Finding the Difference Between Two Dates 
    MySQL Date Formats 

 7: Files .............................................................91
    File Permissions 
    Permissions with an FTP Program 
    The Command Line 
    #50: Placing a File's Contents into a Variable 
    #51: Creating and Writing to a File 
    #52: Checking to See If a File Exists 
    #53: Deleting Files 
    #54: Uploading Images to a Directory 
    #55: Reading a Comma-Separated File 

 8: User and Session Tracking ........................................103
    Using Cookies and Sessions to Track User Data 
    Cookies  
    Sessions 
    #56: Creating a "Welcome Back, Username!" Message with Cookies
    #57: Using Sessions to Temporarily Store Data 
    #58: Checking to See If a User's Browser Accepts Cookies 
    #59: Redirecting Users to Different Pages 
    #60: Forcing a User to Use SSL-Encrypted Pages 
    #61: Extracting Client Information 
    #62: Session Timeouts 
    #63: A Simple Login System 

 9: Email ............................................................119
    #64: Using PHPMailer to Send Mail 
    Installing PHPMailer 
    Using the Script 
    Adding Attachments 
    #65: Using Email to Verify User Accounts
 
10: Working with Images ..............................................129
    #66: Creating a CAPTCHA (Security) Image
    #67: Creating Thumbnail Images 

DDL...................................................................183
// sqlite :  PRIMARY KEY AUTOINCREMENT
CREATE TABLE PRODUCT_INFO (
  PRODUCT_NAME VARCHAR (50) default NULL,
  PRODUCT_ID   INT (10) default NULL,
  CATEGORY VARCHAR (20) default NULL,
  PRICE double default NULL,
  PRIMARY KEY  (PRODUCT_ID)
);

// mysql :  PRIMARY KEY AUTOINCREMENT
CREATE TABLE `PRODUCT_INFO` (
  `PRODUCT_NAME` varchar(50) default NULL,
  `PRODUCT_ID` int(10) default NULL,
  `CATEGORY` enum('shoes','gloves','hats') default NULL,
  `PRICE` double default NULL,
  PRIMARY KEY  (`PRODUCT_ID`)
);
// sqlite & mysql
INSERT INTO `PRODUCT_INFO` VALUES ('Cowboy Boots',12,'shoes',19.99);
INSERT INTO `PRODUCT_INFO` VALUES ('Slippers',17,'shoes',9.99);
INSERT INTO `product_info` VALUES ('Snowboarding Boots',15,'shoes',89.99);
INSERT INTO `product_info` VALUES ('Flip-Flops',19,'shoes',2.99);
INSERT INTO `product_info` VALUES ('Baseball',20,'hats',12.79);

The fonts used in Wicked Cool PHP are New Baskerville, Futura, and Dogma.
</pre><?php
?>