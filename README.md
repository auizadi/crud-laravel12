# CRUD Laravel
### Deskripsi proyek
- Tugas CRUD sederhana yang dibangun dengan framework PHP Laravel 12
<br>

### Cara menjalankannya
#### 1. Clone atau download source code
'''sh
git clone https://github.com/auizadi/crud-laravel12.git
'''
#### 2. Masuk ke direktori proyek
`cd crud-laravel12`
#### 3. Copy .env
`cp .env.example .env`
#### 4. Setup database
#### 5. Generate key
`php artisan key:generate`
#### 6. Migrasi database
`php artisan migrate`
#### 7. Jalankan website
`php artisan serve` 
<br>
<br>


### 1. Tampilan Depan
![tampilan depan](/assets/lar1.png "tampilan depan")
Pada tampilan depan ini ditampilkan barang-barang yang ditambahkan oleh user dengan menekan tombol "Tambah Produk", selain itu pada halaman ini terdapat tombol Show, Edit, dan Hapus.
<br>

### 2. Tampilan Tambah Produk
![tampilan tambah produk](/assets/lar2.png "tampilan tambah produk")
Tampilan ini berisi form dengan beberapa label yang digunakan untuk menginputkan informasi seputar barang. 
<br>

### 3. Tampilan Show 
![tampilan show produk](/assets/lar3.png "tampilan show produk")
Tampilan ini berisi informasi barang yang ditampilkan sesuai barang yang dilihat.
<br>

### 4. Tampilan Edit Produk
![tampilan edit](/assets/lar4.png "tampilan edit")
![notifikasi berhasil edit](/assets/lar5.png "notifikasi berhasil edit")
Halaman ini berguna untuk mengedit atau mengganti informasi barang setelah data diperbaharui maka akan tampil notifikasi.
<br>

### 5. Tampilan Delete Produk
![tampilan delete](/assets/lar6.png "tampilan delete")
![notifikasi tampilan delete](/assets/lar7.png "notifikasi tampilan delete")
Ketika user menekan tombol Hapus, maka akan ada konfirmasi setelah user menekan OK akan ada notifikasi data berhasil dihapus.
<br>

