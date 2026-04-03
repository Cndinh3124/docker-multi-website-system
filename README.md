# 🐳 Docker Multi-Website Deployment (Nginx + MySQL)
Triển khai hệ thống gồm **2 website riêng biệt (web1, web2)** sử dụng:
* Docker & Docker Compose
* Nginx Reverse Proxy
* MySQL Database
---
## 📂 Cấu trúc project
```
Mystore/
│── docker-compose.yml
│── nginx/
│   └── default.conf
│── web1/
│   ├── Dockerfile
│   └── source code
│── web2/
│   ├── Dockerfile
│   └── source code
│── db/
│   ├── 01-computer_store.sql
│   ├── 02-hkt-schema.sql
│   └── 03-hkt-data.sql
|── dnsmqsq.conf
---
## ⚙️ Yêu cầu hệ thống
* Ubuntu (VMware hoặc máy thật)
* Docker
* Docker Compose
---
## 🚀 Cài đặt và chạy
### 1. Clone project
```bash
git clone git@github.com:Cndinh3124/Mystore.git
cd Mystore
```
---
### 2. Fix DNS (Ubuntu)
```bash
sudo systemctl stop systemd-resolved
sudo systemctl disable systemd-resolved
sudo rm /etc/resolv.conf
echo "nameserver 8.8.8.8" | sudo tee /etc/resolv.conf
```
---
### 3. Chạy hệ thống
```bash
docker-compose up -d --build
```
---
### 4. Kiểm tra container

```bash
docker ps
```
---
### 5. Kiểm tra DNS
```bash
nslookup web1.ncdinh 127.0.0.1
```
---
## 🌐 Cấu hình máy client
### Trên Ubuntu
Mở file:
```bash
sudo nano /etc/hosts
```
Thêm:
```
127.0.0.1 web1.ncdinh
127.0.0.1 web2.ncdinh
```
---
## 🔗 Truy cập website
* http://web1.ncdinh
* http://web2.ncdinh
---
## 🧠 Nguyên lý hoạt động
```
Client → Nginx → Web1 / Web2 → MySQL
```
* Nginx đóng vai trò reverse proxy
* Domain sẽ được phân luồng:
  * web1.local → web1 container
  * web2.local → web2 container
* Cả 2 web dùng chung MySQL
---
## 🐛 Lỗi thường gặp
### ❌ Không kết nối được MySQL
**Nguyên nhân:**
* Sai hostname
**Fix:**
```php
$host = "mysql";
```
---
### ❌ Lỗi domain không truy cập được
**Nguyên nhân:**
* Chưa cấu hình file hosts
---
### ❌ CSS lỗi
**Nguyên nhân:**
* Sai đường dẫn hoặc volume mount lỗi
---
## 📌 Ghi chú
* Tên service Docker = hostname kết nối DB
* Luôn chạy lại khi thay đổi:
```bash
docker-compose down --remove-orphans
docker-compose up -d --build
```
---
## 👨‍💻 Tác giả
* Name: Cong Dinh Nguyen
* Project: Docker Multi Web Deployment
---
## Kết luận
Dự án giúp:
* Hiểu cách deploy nhiều website trên Docker
* Làm việc với Nginx reverse proxy
* Quản lý container và network
---
