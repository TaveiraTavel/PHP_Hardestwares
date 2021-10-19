CREATE USER 'hardestwares'@'localhost' IDENTIFIED WITH mysql_native_password BY '123456';
GRANT ALL PRIVILEGES ON dbHardestwares.* TO 'hardestwares'@'localhost' WITH GRANT OPTION;
