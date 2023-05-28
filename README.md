

# Tugas Besar EAI

Tugas ini dibuat untuk memenuhi Tugas Akhir  Semester (UAS) dari mata kuliah [Integrasi Aplikasi Enterprise (EAI)](https://lms.telkomuniversity.ac.id/course/view.php?id=32905)


## About Us

## About the Project
FurniPlus merupakan sebuah Project E-Commerce yangg dibangun menggunakan framework [Laravel](https://laravel.com/) dengan Arsitektur Microservices yang didalamnya memiliki 3 Service yang saling terhubung melalui API.  Kami selaku `Tim 1` Bertugas untuk mengerjakan ***Inventory*** dan project ini dikerjakan bersama dengan `Tim 5` dan `Tim 7`. Berikut merupakan detail Pembagian Pengerjaan Microservices
*FurniPlus Microservice*
| No  |      Microservice           |    Tim    | Deskripsi                                         |
| --- | --------------------------- | --------- | ------------------------------------------------- |
| 1   | ***Inventory*** `Repo ini`  |  `Tim 1`  | Service yang bertugas untuk mengelola bagian Gudang seperti stok barang, dan melakukan pengemasan barang terhadap permintaan dari `E-Commerce`           |
| 2   | ***E-Commerce***            |  `Tim 5`  | Service yang bertugas untuk mengelola interaksi dengan pengguna pada Aplikasi FurniPlus, dan mengirimkan permintaan pengemasan barang kepada `Inventory` |
| 3   | ***Shipping***              |  `Tim 7`  | Service yang bertugas untuk mengelola pengiriman barang seperti mengurus paket dari `Inventory` untuk  dikirimkan kepada pengguna                        |


[Laravel](https://laravel.com)

## Endpoint List

*Endpoint Tiket*

| No  | Ticket Endpoint            | Method | Deskripsi                                         |
| --- | -------------------------- | ------ | ------------------------------------------------- |
| 1   | `tiketing/`                | `GET`  | Menampilkan Seluruh Data API                      |
| 2   | `tiketing/{id}`            | `GET`  | Menampilkan Data Tiket berdasarkan id tertentu    |
| 3   | `tiketing/add`             | `POST` | Menambahkan data Tiket                            |
| 4   | `tiketing/update/{id}`     | `PUT`  | Mengubah data Tiket                               |
| 5   | `events/`                  | `GET`  | Menampilkan Seluruh Data API                      |
| 6   | `event/show/{id}`          | `GET`  | Menampilkan Data Event berdasarkan id tertentu    |
| 7   | `event/add/`               | `POST` | Menambahkan data Event                            |



# Installation
## Prerequisite
*(Using MacOS? You can install it using [Homebrew](https://brew.sh/) )*
- PHP >= 8
- [Composer](https://getcomposer.org/) 
- [XAMPP](https://www.apachefriends.org/download.html) or [Sequel Pro](http://sequelpro.com/)


## Serve the Application
*Run the following commands on your terminal, git bash, or PowerShell*

- Clone this Project
```bash
git clone https://github.com/ariokusuma/tugas-api-eai.git
```

- Modify the .env file <br>
*Configure the .env file according to Your local Database System*
```bash
DB_PORT= <your_mysql_port>
DB_DATABASE= <your_database_name>
```

- Install Composer
```bash
composer install
```

- Generate Key
```bash
php artisan key:generate
```

- Migrate Database
```bash
php artisan migrate
```

- Run the laravel server
```bash
php artisan serve
```


Thank You

