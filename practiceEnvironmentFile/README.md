# PHP Project with Environment Configuration

## 📌 Overview

This project is a PHP-based system that uses Composer and environment variables for secure configuration management.

Sensitive information such as database credentials and API keys are stored inside a `.env` file instead of hardcoding them into PHP files.

The project uses:

* PHP 8.2+
* XAMPP
* Composer
* vlucas/phpdotenv

---

## 🚀 Requirements

* PHP 8.2 or higher
* XAMPP (Apache + MySQL)
* Composer installed

Composer Official Website:
https://getcomposer.org

---

## 📦 Installation Guide

### 1️⃣ Clone or Download the Project

Place the project folder inside:

```
C:\xampp\htdocs\
```

---

### 2️⃣ Install Dependencies

Open CMD inside the project folder and run:

```
composer install
```

If installing dotenv for the first time:

```
composer require vlucas/phpdotenv
```

---

### 3️⃣ Create .env File

Create a file named:

```
.env
```

Inside the project root.

Example:

```
DB_HOST=localhost
DB_NAME=your_database
DB_USER=root
DB_PASS=
API_KEY=your_api_key_here
```

⚠ Important: Add `.env` to your `.gitignore` file to protect sensitive data.

---

## ⚙ Configuration File (config.php)

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
```

---

## 🗄 Example Database Connection

```php
<?php
require 'config.php';

try {
    $conn = new PDO(
        "mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'],
        $_ENV['DB_USER'],
        $_ENV['DB_PASS']
    );
    
    echo "Connected successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
```

---

## 📁 Recommended Folder Structure

```
project-name/
│
├── .env
├── .gitignore
├── composer.json
├── composer.lock
├── config.php
├── index.php
└── vendor/
```

---

## 🔐 Security Notes

* Never upload `.env` to GitHub.
* Always use environment variables for:

  * Database credentials
  * API keys
  * Secret tokens
* Keep Composer dependencies updated.

---

## 👨‍💻 Author

Luigi Barte
BSIT Student
Universidad de Dagupan

---

## 📄 License

This project is for educational purposes.

```
```
