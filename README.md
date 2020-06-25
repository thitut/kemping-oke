## About Laravel Blog

Cara menggunakan
- Download repository dan ekstrak atau clone repository

- Masuk ke direktori aplikasi dan jalankan composer
	```sh
	$ cd dir
	$ composer install
	```
- Setting .env dan key application
	```sh
	$ mv .env.example .env
	$ php artisan key:generate
	```
- Edit database name, database username dan database password

	> DB_DATABASE=your_db.

 	> DB_USERNAME=your_mysql_username.
 	
	> DB_PASSWORD=your_mysql_password.

- Migrate table
	```sh
	$ php artisan migrate
	```

- Buka browser
- Register new account
- Login
