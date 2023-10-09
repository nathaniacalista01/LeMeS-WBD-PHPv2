# LeMeS

> Disusun untuk memenuhi Tugas Milestone 1 - Monolithic PHP & Vanilla Web Application IF3110 Pengembangan Aplikasi Berbasis Web

## Daftar Isi

-   [Deskripsi Aplikasi Web](#deskripsi-aplikasi-web)
-   [Daftar Requirement](#daftar-requirement)
-   [Cara Instalasi](#cara-instalasi)
-   [Cara Menjalankan Server](#cara-menjalankan-server)
-   [Screenshot Tampilan Aplikasi](#screenshot-tampilan-aplikasi)
-   [Entity Relationship Diagram](#entity-relationship-diagram)
-   [Pembagian Tugas](#pembagian-tugas)

## Deskripsi Aplikasi Web

*LeMeS* merupakan sebuah aplikasi web pembelajaran yang mirip dengan Edunex.
Pengguna dapat mengakses berbagai modul dan materi pembelajaran yang terdapat dalam berbagai kursus yang ditawarkan. *LeMeS* menghadirkan fitur manajemen kursus bagi admin dan pengajar untuk menambah, mengubah, dan menghapus kursus. Admin dapat melihat daftar pengguna yang mengakses web ini dan pengajar dapat melihat daftar kursus yang ditawarkan.

## Daftar Requirement

1. Login
2. Register
3. Homepage
4. Daftar Course
5. Search, Sort, dan Filter
6. Edit Course
7. Detail Course
8. Tambah Course
9. Tambah Modul
10. Edit Modul
11. Delete Modul
12. Daftar User
13. Edit Profil
14. Tambah Materi
15. Hapus Materi
16. Edit User

## Cara Instalasi

1. Lakukan pengunduhan repository ini dengan menggunakan perintah `git clone https://gitlab.informatika.org/if3110-2023-01-26/tugas-besar-1.git` pada terminal komputer Anda.
2. Pastikan komputer Anda telah menginstalasi dan menjalankan aplikasi Docker.

## Cara Menjalankan Server

1. Anda dapat menjalankan program ini dengan menjalankan perintah `docker-compose up -d` pada terminal directory aplikasi web.
2. Aplikasi web dapat diakses dengan menggunakan browser pada URL `http://localhost/course/lists/page=1`atau dengan memasukkan `http://localhost/`.
3. Aplikasi web dapat dihentikan dengan menjalankan perintah perintah `docker-compose down` pada terminal directory aplikasi web.
4. Buat file .env di root folder
5. Copy .env.example ke dalam file .env dan pastikan isinya sama dengan app/core/Database.php

## Screenshot Tampilan Aplikasi

### Login

![Login Page](./screenshot/login.png)

### Register

![Register Page](./screenshot/register.png)

### Home

![Home Page](./screenshot/homepage.png)

### Daftar User

![Daftar User](./screenshot/user-list.png)

### Search, Sort, dan Filter

![Search, Sort, dan Filter Page](./screenshot/search.png)


## Pembagian Tugas
