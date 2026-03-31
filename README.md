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
<img width="1276" height="711" alt="image" src="https://github.com/user-attachments/assets/5f75d247-9ecf-4cb6-a127-3f4de28bbb28" />

+ Sau khi scan xong, tại phần `Site` chọn vào URI có phương thức `POST`
<img width="665" height="417" alt="image" src="https://github.com/user-attachments/assets/80b38d43-0c27-4dd0-acd9-96c8b7ae48d5" /> 

+ Chọn chuột phải, chọn `Attack/Fuzz`
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/5b8063cd-b0d0-4833-b344-f49a723e817c" />

+ Tại trang Fuzzer, bôi đen từ `ZAP` tại username và password để tạo payload -> Sau đó chọn Add để thêm Payload
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/12e4267d-a594-44e0-8fc9-6113872af5a8" />

+ Sau đó chon `Add` để thêm nội dung payload
<img width="854" height="716" alt="image" src="https://github.com/user-attachments/assets/1b944a27-43b1-4afb-82ba-657ab7294f3c" />

+ Thêm nội dung payload dạng chuỗi hoặc 1 file tại `Type`
<img width="735" height="910" alt="image" src="https://github.com/user-attachments/assets/7065ff6e-654d-459f-a6f5-68c004f5fb9d" /><br>
Nội dung file mẫu:
*username.txt*
````
phatcraft
admin
ad123
````
*password.txt*
````
abcd
12345
123456
````

+ Sau khi thêm, nhấn `Start Fuzzer` để thực hiện BruteForce. Kết quả sẽ hiển thị ở phần `Response`
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/ca86fe3a-2d33-4010-a5f6-9d086f017b92" />





