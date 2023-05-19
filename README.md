APLIKASI PEMESANAN KENDARAAN

1. Daftar username & password
    (ADMIN ROLE)
        'email' => 'admin@admin.admin',
        'password' => 123456
    
    (USER ROLE)
        'email' => 'jono@jono.jono',
        'password' => 123456

        'email' => 'goku@goku.goku',
        'password' => 123456

        'email' => 'gohan@gohan.gohan',
        'password' => 123456

        'email' => 'budi@budi.budi',
        'password' => 123456

2. Database version : 8.1.12
3. PHP Version : 8.1.12
4. Framework yg digunakan : Laravel 9

Cara menggunakan aplikasi :
1. Buka terminal arahkan ke direktori root
2. Clone aplikasi via https atau SSH
3. masuk ke folder project
4. jalankan composer instal
5. Duplikat file .env.example dengan nama .env
6. Buka file .env dan ubah konfigurasi database seperti berikut lalu save
   - DB_DATABASE=db_kendaraan
   - DB_USERNAME=root
   - DB_PASSWORD=
7. jalankan perintah php artisan key:generate
8. Jalankan perintah php artisan migrate
9. Jalankan perintah php artisan db:seed
10. Jalankan perintah npm install
11. Jalankan perintah npm run dev bersamaan dengan perintah php artisan serve di terminal berbeda

NOTE : FITUR EXPORT REPORT EXCEL BERADA PADA BAGIAN LIST DATA ORDER
