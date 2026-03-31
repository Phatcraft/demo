# Hướng dẫn setup demo trên Ubuntu Desktop

## 1. Cài đặt Ubuntu Desktop tại [đây](https://ubuntu.com/download/desktop) và setup LAMP

## 2. Cài đặt git và clone repository vào folder `/var/www/html`
````
sudo apt install git
sudo apt clone https://github.com/Phatcraft/demo.git
````

## 3. Setup MySQL
````
sudo mysql -u root -p
````
Trong MySQL: 
````
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'NewPassword';

CREATE DATABASE web_lab;

USE web_lab;

CREATE TABLE users(
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50),
password VARCHAR(50)
);

INSERT INTO users VALUES(1,'admin','123456');

CREATE TABLE comments(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50),
comment TEXT
);
````
Sau khi setup xong, mở trang web tại http://localhost/demo/login.php
## 3. Cài ZAP Linux Installer tại [đây](https://www.zaproxy.org/download/)

## 4. Setup thực hiện Brute Force tại ZAP
+ Tại `Quick Start`, chọn `Automatic Scan` với địa chỉ http://localhost/demo/login.php
+ Sau khi scan xong, tại phần `Site` chọn vào 
