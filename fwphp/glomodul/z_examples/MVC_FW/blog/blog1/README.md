# Simple PHP MVC Blog System 
Tech info :
- you need PHP 5.5 or higher to execute the script
- create DB name/user and exucute "db.sql" first
- To change the MySQL connection information, edit /Engine/Config.php
- Admin login (email/password) is: test@test.com / pwd123
- Navigation Tip. On the website, there is no logo or "Homepage" link. To come back to the homepage, please click on the "Simple Blog" link located in the bottom page

## Description

This *PHP Blog System* 
1. has an MVC pattern,     
2. uses Traits (PHP 5.4),    
3. Namespace (PHP 5.3),       
4. Singleton pattern,    
5. PDO (PHP 5.1)      
6. and the new PHP Password Hashing feature (PHP 5.5).

The project was a *PHP Challenge Project* I have done.


## Why this MVC Blog System can be very Useful for You?

If you need to code a SIMPLE WEBSITE under a PROFESSIONAL AND VERY NICE/CLEAN CODE (as I really enjoy doing), this script will be very useful in order to *start on good basis* and *save time and money*.

However, if you need to BUILD A BLOG SYSTEM, again this project can be used as a *FRAMEWORK* TO START your project easily under a *GOOD DEVELOPMENT PATTERN* and *GOOD DEVELOPMENT PRACTICE* AND ORGANIZATION.


## Requirements that were Requested for the Project

### Requirements

* The project should be written in object-oriented PHP targeting version 5.5 or higher
* It should be all self-written, no existing frameworks or libraries
* It should have good security (e.g., hashed passwords, protect against SQL injection, shouldn't have any error when we try to change URL query strings or to hack it, etc)
* Should use a MySQL database to store admin account and article data

### Specification

*Build a simple blog with the following functionalities*

#### The Frontend

* List of blog articles showing the **title**, **body** truncated to 100 characters, and **date**. It should show only the latest 5 articles
* Single blog article showing the **title**, **full body**, and the **date**

#### The Backend

* C Possibility to add a new blog article with a title and body. The title should allow a maximum of 50 characters
* R List of all the blog articles
* U Possibility to edit an existing blog article
* D Possibility to delete an article
* Logout feature for the admin user

HTML and CSS code should be kept to the minimum needed to make the website functional – This project is purely to assess how you approach the problem and not how good it looks.


## Server Requirements of the Web App

* **Application Server** PHP 5.5.0 or higher.

* **PHP Extension** mbstring

* **Database MySQL/MariaDB 5** or higher.


## The Author

[Pierre-Henry Soria](http://ph7.me)


## Contact the Author

By email at: *phy [AT] hizup [D0T] uk*


## License

This blog system (PHP script) is under [Lesser General Public License](http://www.gnu.org/copyleft/lesser.html) (LGPL); See the LICENSE.txt file for more information.
