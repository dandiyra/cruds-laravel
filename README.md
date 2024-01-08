# CRUDS Barang
 
# 1. Setup
Repositori ini dibangun dengan Laravel versi 8 ke atas. Setelah melakukan fork dan clone dari repositori ini, lakukanlah langkah-langkah di bawah ini untuk menjalankan project. 

* masuk ke direktori laravel-api
```bash
$ cd laravel-api
```
* jalankan perintah composer install untuk mendownload direktori vendor
```bash
$ composer install
```
* buat file .env lalu isi file tersebut dengan seluruh isi dari file .env.example

* jalankan perintah php artisan key generate
```bash
$ php artisan key:generate
```

* Tambahan: Untuk pengerjaan di laptop/PC masing-masing, sesuaikan nama database, username dan password nya di file .env dengan database kalian. 

Setelah itu lakukan migrate ke database
```bash
$ php artisan migrate
```
Jalankan Seeder
```bash
$ php artisan db:seed
```
Install Passport Client Token
```bash
$ php artisan passport:install
```

jangan lupa untuk menjalankan server laravel untuk memulai.
```bash
$ php artisan serve
```

# 2. Testing API menggunakan Postman

## List Of Barang
Buka tab request baru, lalu masukkan url http://127.0.01:8000/api/barang, lalu ubahlah methodnya menjadi *GET*. Kemudian klik tab Headers Lalu tambahkan *key: Accept* dengan *value: application/json*. Kemudian klik tab Body lalu pilih *raw* dengan format *JSON*, Run.

Jika Berhasil
```bash
$ [
     {
        "id_barang": 1,
        "nama_barang": "Laptop",
        "harga_barang": "1.000.000",
        "created_at": null,
        "updated_at": null
    },
    {
        "id_barang": 2,
        "nama_barang": "PC",
        "harga_barang": "2.000.000",
        "created_at": null,
        "updated_at": null
    }
]
```

## Details of Barang
Buka tab request baru, lalu masukkan url http://127.0.0.1:8000/api/barang/:id, lalu ubahlah methodnya menjadi *GET*. Kemudian klik tab Headers Lalu tambahkan *key: Accept* dengan *value: application/json*. Kemudian klik tab Body lalu pilih *raw* dengan format *JSON*, Run.

Tuliskan: 
```bash
$ {
    "id_barang" : "1" //Id dari barang yang ingin di GET
  }
```

## Add new barang
Buka tab request baru, lalu masukkan url http://127.0.0.1:8000/api/barang, lalu ubahlah methodnya menjadi *POST*. Kemudian klik tab Headers Lalu tambahkan *key: Accept* dengan *value: application/json*. Kemudian klik tab Body lalu pilih *raw* dengan format *JSON*, 

Tuliskan:
```bash
$ {
    "nama_barang" : "Mouse",
    "harga_barang" : "10000"
}
```
Jika Berhasil : 
```bash
$ {
   "status": "success",
    "message": {
        "nama_barang": "Mouse",
        "harga_barang": "10000",
        "updated_at": "2024-01-08T04:44:57.000000Z",
        "created_at": "2024-01-08T04:44:57.000000Z",
        "id": 3
    }
}
```
## Update barang
Buka tab request baru, lalu masukkan url http://127.0.0.1:8000/api/barang/:id, lalu ubahlah methodnya menjadi *PUT*. Kemudian klik tab Headers Lalu tambahkan *key: Accept* dengan *value: application/json*. Kemudian klik tab Body lalu pilih *raw* dengan format *JSON*,

Tuliskan: 
```bash
$ {
    "id_barang" :"3", // id dari barang yang ingin di update
    "nama_barang" : "Mouse Logitech",
    "harga_barang" : "1.000.000"
}
```
Jika Berhasil : 
```bash
$ {
    "status": "success",
    "message": {
        "id_barang": 3,
        "nama_barang": "Mouse Logitech",
        "harga_barang": "1.000.000",
        "created_at": "2024-01-08T04:44:57.000000Z",
        "updated_at": "2024-01-08T04:48:13.000000Z"
    }
}
```
## Delete barang
Buka tab request baru, lalu masukkan url http://127.0.0.1:8000/api/barang/:id, lalu ubahlah methodnya menjadi *DELETE*. Kemudian klik tab Headers Lalu tambahkan *key: Accept* dengan *value: application/json*. Kemudian klik tab Body lalu pilih *raw* dengan format *JSON*,

Tuliskan: 
```bash
$ {
    "id" : "3" //id barang yg ingin di hapus
}
```

Jika Berhasil : 
```bash
$ {
    "status": "success"
}
```
