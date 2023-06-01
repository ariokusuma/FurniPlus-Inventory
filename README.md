

# Tugas Besar EAI

Tugas ini dibuat untuk memenuhi Tugas Akhir  Semester (UAS) dari mata kuliah [Integrasi Aplikasi Enterprise (EAI)](https://lms.telkomuniversity.ac.id/course/view.php?id=32905)


## About Us

## About the Project
FurniPlus merupakan sebuah Project E-Commerce yangg dibangun menggunakan framework [Laravel](https://laravel.com/) dengan Arsitektur Microservices yang didalamnya memiliki 3 Service yang saling terhubung melalui API.  Kami selaku `Tim 1` Bertugas untuk mengerjakan ***Inventory*** dan project ini dikerjakan bersama dengan `Tim 5` dan `Tim 7`. Berikut merupakan detail Pembagian Pengerjaan Microservices
*FurniPlus Microservice*
| No  |      Microservice                           |    Tim                 | Deskripsi                                                                                                                                                                             |
| --- | ---------------------------                 | :---------:            | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| 1   | ***Inventory*** `Repo ini` <img width=120/> |`Tim 1`  <img width=50/>| Service yang bertugas untuk mengelola bagian Gudang seperti stok barang, dan melakukan pengemasan barang terhadap permintaan dari `E-Commerce`           |
| 2   | ***E-Commerce***                            |  `Tim 5`      | Service yang bertugas untuk mengelola interaksi dengan pengguna pada Aplikasi FurniPlus, dan mengirimkan permintaan pengemasan barang kepada `Inventory`                              |
| 3   | ***Shipping***                              |  `Tim 7`      | Service yang bertugas untuk mengelola pengiriman barang seperti mengurus paket dari `Inventory` untuk  dikirimkan kepada pengguna                                                     |


## Endpoint List

*Endpoint Tiket*

| No  | Ticket Endpoint             | Method | Deskripsi                                                      |   
| --- | --------------------------- | :------: | -----------------------------------------------------------  | :------: |
|**-**|**------- E-Commerce -------**|**------**| **---------------------- E-Commerce ----------------------**|**------**|   
| 1   | `data-barang/`               |  `GET`   | Menampilkan Seluruh Data Barang dari `Inventory`            |  &check; |  <!-- buat E-Commerce(data barang) -->
| 2   | `data-barang/{id}`           |  `GET`   | Menampilkan Data Barang berdasarkan id tertentu             |  &check; |     <!-- buat E-Commerce (data barang)-->
|**-**|**------- Inventory -------** |**------**| **---------------------- Inventory ----------------------** |  &check; |     
| 3   | `data-barang/add`            |  `POST`  | Menambahkan data barang                                     |  &check; |     <!-- buat Inventory -->
| 4   | `data-barang/update/{id}`    |  `PUT`   | Mengubah data Barang                                        |  &check; |     <!-- buat Inventory -->
| 5   | `pesanan/`                   |  `GET`   | Menampilkan Seluruh data pesanan dari `E-Commerce`          |          |     <!-- buat Inventory -->
| 6   | `pesanan/{id}`               |  `GET`   | Menampilkan data pesanan dari `E-Commerce` berdasarkan id   |          |     <!-- buat Inventory -->
| 7   | `pesanan/update/{id}`        |  `PUT`   | Mengubah data pada kolom status                             |          |     <!-- buat Inventory -->
|**-**|**------- Shipping -------**  |**------**| **----------------------- Shipping -----------------------**|          |     
| 8   | `pengiriman/kirim/`          |  `GET`   | Menampilkan Seluruh data paket yang siap dikirim            |          |     <!-- buat Shipping (data_pengiriman) -->
| 9   | `pengiriman/kirim/{id}`      |  `GET`   | Menampilkan data paket yang siap dikirim berdasarkan id     |          |     <!-- buat Shipping (data_pengiriman) -->
|**-**|**------- Komplain -------**  |**------**| **----------------------- Komplain -----------------------**|          |     
| 10  | `komplain/{id}`              |  `GET`   | Menampilkan data komplain pelanggan                         |          |     <!-- buat Komplain (data_komplain) -->






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
git clone https://github.com/ariokusuma/FurniPlus-Inventory.git
```

- Modify the .env file <br>
*Configure the `.env` file according to Your local Database System*
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

- Run Laravel Seeder
```bash
php artisan db:seed --class=DatabaseBarang
```

- Run the laravel server
```bash
php artisan serve
```


Thank You

