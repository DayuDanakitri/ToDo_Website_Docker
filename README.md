# 🐳 Dockerized To-Do Web Application

Aplikasi ini merupakan proyek web sederhana berbasis **To-Do List** yang dijalankan menggunakan **Docker Compose**. Proyek ini dirancang untuk memperlihatkan alur kerja containerized application mulai dari proses build image, pembuatan container, hingga menjalankan layanan web secara terisolasi dalam environment Docker.

Aplikasi ini dikembangkan sebagai bagian dari eksplorasi Docker dan penerapan konsep **development environment** menggunakan Docker Compose.

---

## 🧱 Arsitektur Sistem

Aplikasi dijalankan menggunakan pendekatan **container-based architecture** dengan komponen utama sebagai berikut:

* **Dockerfile** digunakan untuk membangun image aplikasi web.
* **Docker Compose** digunakan untuk mengorkestrasi service aplikasi.
* **Web Service (PHP + Apache)** menyediakan layanan web yang dapat diakses melalui browser.
* **Database Service (MySQL)** sebagai tempat penyimpanan data.

Setiap service berjalan di dalam container terpisah namun saling terhubung melalui Docker network yang dibuat secara otomatis oleh Docker Compose.

---

## 🔄 Alur Kerja Aplikasi

1. Pengguna menjalankan perintah Docker Compose.
2. Docker membaca file konfigurasi `docker-compose.yml`.
3. Image aplikasi dibangun berdasarkan `Dockerfile`.
4. Container dibuat dan dijalankan sesuai konfigurasi.
5. Aplikasi web dapat diakses melalui browser menggunakan port yang telah ditentukan.

Seluruh proses ini dilakukan secara otomatis oleh Docker Compose tanpa perlu konfigurasi manual pada sistem operasi host.

---

## 📁 Struktur Proyek

```
.
├── db
│ └── init.sql
├── web
│ ├── index.php
│ ├── add.php
│ ├── update.php
│ ├── delete.php
│ ├── health.php
│ ├── style.css
│ └── Dockerfile
├── docker-compose.yml
├── docker-compose.override.yml
├── .env
```

## Kesimpulan

Melalui proyek ini, konsep dasar Docker dan Docker Compose dapat dipahami secara praktis, khususnya dalam penerapan containerized application untuk pengembangan web. Aplikasi ini diharapkan dapat menjadi dasar pemahaman dalam pengelolaan container, orkestrasi service, serta penerapan workflow pengembangan modern.
