#  Docker Multi-Website System (Nginx + MySQL + DNS)

##  Overview

This project demonstrates deploying multiple web applications on a single server using Docker and Docker Compose, with Nginx as a reverse proxy and DNS-based routing.

---

##  Architecture

Client → Nginx (Reverse Proxy) → Web1 / Web2 → MySQL

---

##  Key Features

* Multi-website deployment (web1, web2)
* Nginx reverse proxy for traffic routing
* Internal DNS resolution using dnsmasq
* Shared MySQL database across services
* Containerized system using Docker Compose

---

##  Project Structure

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
│   ├── SQL files
│── dnsmasq.conf
```

---

##  Requirements

* Ubuntu (VM or physical machine)
* Docker
* Docker Compose

---

##  Deployment

### 1. Clone project

```bash
git clone git@github.com:Cndinh3124/Mystore.git
cd Mystore
```

### 2. Configure DNS (Ubuntu)

```bash
sudo systemctl stop systemd-resolved
sudo systemctl disable systemd-resolved
sudo rm /etc/resolv.conf
echo "nameserver 8.8.8.8" | sudo tee /etc/resolv.conf
```

### 3. Run system

```bash
docker-compose up -d --build
```

### 4. Verify containers

```bash
docker ps
```

### 5. Test DNS

```bash
nslookup web1.ncdinh 127.0.0.1
```

---

##  Client Configuration

Edit `/etc/hosts`:

```
127.0.0.1 web1.ncdinh
127.0.0.1 web2.ncdinh
```

---

## 🔗 Access

* http://web1.ncdinh
* http://web2.ncdinh

---

##  System Flow

* Nginx acts as a reverse proxy
* Domain-based routing:

  * web1 → web1 container
  * web2 → web2 container
* Both applications connect to a shared MySQL database

---

##  Troubleshooting

###  Cannot connect to MySQL

* Check hostname:

```php
$host = "mysql";
```

###  Domain not accessible

* Check `/etc/hosts` configuration

###  CSS not loading

* Check volume mount and file paths

---

##  Tech Stack

* Docker
* Docker Compose
* Nginx (Reverse Proxy)
* MySQL
* dnsmasq

---

##  Key Learning

* Multi-container system design
* Reverse proxy architecture
* DNS-based service routing
* Container networking and orchestration

---

##  Author

Cong Dinh Nguyen

---
