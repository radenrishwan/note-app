# Note APP
Aplikasi note menggunakan php native

## Requirements
- PHP 8.1
- Composer

## Install
- Download project menggunakan github atau download langsung
- Install composer
- Install PHP 8.1


## Usage
- silahkan buat database baru dengan nama `uas`
- selanjutnya, silahkan jalankan file semua file .sql yang ada pada folder `app/Database/migrate`
- jalankan command dibawah ini
    ```bash
    $ composer install
    ```
- Setelah selesai silahkan jalankan command dibawah ini
    ```bash
    $ cd public/ && php -S localhost:8080
    ```
- silahkan akses `http://localhost:8080/` browser atau test menggunakan curl
    ```
    $ curl http://localhost:8080/
    ```