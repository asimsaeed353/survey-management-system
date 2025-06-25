<p align="center"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></p>

# Survey Management System

A web-based Survey Management System built with Laravel 12 and MongoDB, allowing users to create and manage surveys, add questions dynamically, and collect responses efficiently.

## 🚀 Features

- User registration and authentication
- Create, manage, and delete surveys easily
- Add multiple questions and options dynamically
- Display responses in interactive graphs and charts
- Responsive frontend (Tailwind CSS)
- Input validation with user feedback

## 🛠️ Tech Stack

- **Backend:** Laravel
- **Database:** MongoDB
- **Frontend:** Blade Templates, Tailwind CSS

## Pre-requisites
These tools must be installed in your system.
- **PHP**
- **Composer**
- **Laravel**
- **MongoDB**

## Installation

### Clone the repo

```git
git clone https://gitlab.com/wajishah786/survey-management.git
cd survey-management
```

### 📦 MongoDB Setup

This project uses **MongoDB** as its primary database. Follow the steps below to install MongoDB and its PHP extension.

#### 🖥️ Windows Setup

<!-- ##### ✅ Install MongoDB Server

1. Download the installer from: https://www.mongodb.com/try/download/community  
2. Run the installer with default (Complete) settings.  
3. Make sure to **install as a service**.
4. Setup a  new database connection:
   - Database URI: mongodb://localhost:27017
   - Name: mongodb
   - Save and Connect -->

##### ✅ Install MongoDB PHP Extension

1. Check your PHP version:
   ```bash
   php -v
   ```
2. Download the correct `.dll` from: https://pecl.php.net/package/mongodb
3. Place the `.dll` in your PHP `ext` directory (e.g., `C:\xampp\php\ext`).
4. Edit your `php.ini` and add:
   ```ini
   extension=mongodb
   ```
5. Restart Apache or PHP server.
6. Verify the extension:
   ```bash
   php -m | findstr mongodb
   ```

---

#### 🐧 Linux (Ubuntu/Debian) Setup

<!-- ##### ✅ Install MongoDB Server

```bash
curl -fsSL https://pgp.mongodb.com/server-7.0.asc | sudo gpg -o /usr/share/keyrings/mongodb-server-7.0.gpg --dearmor

echo "deb [ signed-by=/usr/share/keyrings/mongodb-server-7.0.gpg ] https://repo.mongodb.org/apt/ubuntu focal/mongodb-org/7.0 multiverse" | sudo tee /etc/apt/sources.list.d/mongodb-org-7.0.list

sudo apt update
sudo apt install -y mongodb-org
``` -->

1.  Install the PHP extension for MongoDB.

      ```bash
      sudo apt update
      sudo apt install -y build-essential php-dev php-pear
      sudo pecl install mongodb
      ```

2.  Add the following line to your php.ini file:
      ```bash
      extension="mongodb.so"
      ```
    save and exit the file.

    - To verify, run the following command:
      ```bash
      php -i
      ```

    Scroll up, you should find something like this:
      ```
      mongodb

      MongoDB support => enabled
      MongoDB extension version => 2.0.0
      MongoDB extension stability => stable
      libbson bundled version => 1.30.3
      libmongoc bundled version => 1.30.3
      libmongoc SSL => enabled
      libmongoc SSL library => OpenSSL
      libmongoc crypto => enabled
      libmongoc crypto library => libcrypto
      libmongoc crypto system profile => disabled
      libmongoc SASL => disabled
      libmongoc SRV => enabled
      libmongoc compression => disabled
      libmongocrypt bundled version => 1.12.0
      libmongocrypt crypto => enabled
      libmongocrypt crypto library => libcrypto
      crypt_shared library version => unknown

      Directive => Local Value => Master Value
      mongodb.debug => no value => no value
      ```

<!-- 3. To install php curl extension, run -

   ```bash
   apt-get install php-curl
   ``` -->

3.  Run the following command from your Laravel project directory in order to add the MongoDB package for Laravel:
      ```bash
      composer require mongodb/laravel-mongodb
      ```

Start the MongoDB service:

```bash
sudo systemctl start mongod
sudo systemctl enable mongod
```

### Install dependencies

```bash
composer install
npm install && npm run dev
```

### Set up environment

```bash
cp .env.example .env
php artisan key:generate
```

### 🔗 Laravel MongoDB Integration

<!-- 1. Install the MongoDB Laravel package:
   ```bash
   composer require jenssegers/mongodb
   ``` -->

2. Update project's `.env`:

   ```env
   DB_CONNECTION=mongodb
   
   MONGODB_URI="mongodb://127.0.0.1:27017"
   MONGODB_DATABASE="survey-management-system"
   ```

3. Set APP_ENV mode to production, development or testing.
   ```env
   APP_ENV=development
   ```

3. Update `config/database.php`:

   ```php

   'default' => env('DB_CONNECTION', 'mongodb'),

   'connections' => [ 
      'mongodb' => [
         'driver' => 'mongodb',
         'dsn' => env('MONGODB_URI', 'mongodb://127.0.0.1:27017'),
         'database' => env('MONGODB_DATABASE', 'survey-management-system'),
      ],
   ],
   ```

4. **Seed the database**
   ```bash
   php artisan db:seed
   ```

5. **Run the server**
   ```bash
   php artisan serve
   ```
   Now visit `http://127.0.0.1:8000` in your browser.

### Login Information
- email: **john.doe@example.com**
- password: *asdfgh123*

<!-- ## 📁 Folder Structure Overview

- `app/Models` – Eloquent models (e.g., `Survey`, `Question`, `Option`)
- `app/Http/Controllers` – Application logic and route handling
- `resources/views` – Blade templates for frontend
- `routes/web.php` – Web routes
- `config/database.php` – Database config with MongoDB support

---


### 🧪 Testing Connection

Add this route in your `web.php` to test:

```php
Route::get('/test-mongo', function () {
    DB::connection('mongodb')->collection('test')->insert(['check' => 'MongoDB connected']);
    return 'MongoDB connection successful!';
});
``` -->

---

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).
