CREATE TABLE wishes(
          id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          wisher_id INT NOT NULL,
          description CHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
          due_date DATE,
          FOREIGN KEY (wisher_id) REFERENCES wishers(id)
)