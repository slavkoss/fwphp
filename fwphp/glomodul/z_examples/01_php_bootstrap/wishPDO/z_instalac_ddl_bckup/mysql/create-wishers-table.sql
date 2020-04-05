CREATE TABLE wishers(
          id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
          name CHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL UNIQUE,
          password CHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
)