[main]
thisfile = J:\dev_web\conf\zwamp_conf.php -above main doc root
language = english
status = "online"
wampserverVersion = 2.2.1
wampserverLastKnown = 2.2.1
installDir = "j:/zwamp"
navigator = "C:\Program Files (x86)\Google\Chrome\Application\chrome.exe"
editor = "notepad.exe"
defaultLanguage = english


[php]
phpVersion = "5.5.17 64 bit built: May 28 2014"
phpLastKnown = 5.4.12
phpIniDir = .
phpConfFile = php.ini
phpExeDir = .


[phpCli]
phpCliVersion = 5.5.17
phpExeFile = php.exe
phpCliFile = php-win.exe


[apache]
apacheVersion = "2.4.9"
apacheLastKnown = 2.4.3
apacheExeDir = bin
apacheConfDir = conf
apacheExeFile = httpd.exe
apacheConfFile = httpd.conf
apacheServiceInstallParams = -n wampapache64 -k install
apacheServiceRemoveParams = -n wampapache64 -k uninstall

[oraclexe]
oraclexeVersion = "11.2.0.2.0 64 bit Production"
oraclexeAPEXVersion = "4.2.5.00.08"
oraclexeDir = "win+x cd C:\oraclexe\app\oracle\product\11.2.0\server\bin sqlplus / as sysdba <br />&nbsp;&nbsp;&nbsp;ili sqlplus /nolog conn SYS/ss141@XE as SYSDBA"

[mysql]
mysqlVersion = "5.0.10"
mysqlLastKnown = 5.0.10
mysqlConfDir = .
mysqlConfFile = my.ini
mysqlExeDir = bin
mysqlExeFile = mysqld.exe
mysqlServiceInstallParams = --install-manual wampmysqld64
mysqlServiceRemoveParams = --remove wampmysqld64

[apps]
phpmyadminVersion = 4.1.14
sqlbuddyVersion = 1.3.3
webgrindVersion = 1.0


[service]
ServiceApache = "wampapache64"
ServiceMysql = "wampmysqld64"

