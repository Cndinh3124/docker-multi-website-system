#Multi Web PHP Deployment with Docker + Nginx + DNS**

#Giới thiệu**
Dự án này triển khai nhiều website PHP (web1, web2) trên môi trường Docker, sử dụng:
- 🐳 Docker & Docker Compose
- 🌐 Nginx (reverse proxy)
- 🗄️ MySQL
- 🌍 DNS nội bộ (dnsmasq)
Cho phép truy cập bằng domain nội bộ như:
- http://web1.ncdinh
- http://web2.ncdinh
---
**## Kiến trúc hệ thống**
Client (Browser)
↓
DNS (dnsmasq)
↓
192.168.0.101
↓
Nginx
↙ ↘
web1 web2
↓ ↓
MySQL Database
---

##**Cấu trúc project**

projects/
│
├── docker-compose.yml
├── dnsmasq.conf
│
├── nginx/
│ └── default.conf
│
├── db/
│ └── *.sql
│
├── web1/
│ └── src/
│
├── web2/
│ └── src/

---
## ⚙️ Yêu cầu hệ thống
- Ubuntu (VMware hoặc máy thật)
- Docker
- Docker Compose
---

##Cài đặt và chạy

## 1. Clone project
```bash
git clone git@github.com:Cndinh3124/Mystore.git
cd Mystore

##2. Fix DNS port (Ubuntu)
sudo systemctl stop systemd-resolved
sudo systemctl disable systemd-resolved
sudo rm /etc/resolv.conf
echo "nameserver 8.8.8.8" | sudo tee /etc/resolv.conf

##3. Chạy hệ thống
docker-compose up -d --build

##4. Kiểm tra DNS
nslookup web1.local 127.0.0.1

Cấu hình host (Ubuntu): nano /etc/hosts
Chỉnh file hosts:
127.0.0.1 web1.ncdinh
127.0.0.1 web2.ncdinh














