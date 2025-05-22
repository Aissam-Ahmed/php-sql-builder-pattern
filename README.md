# PHP SQL Builder Pattern

This project demonstrates a clean and extensible implementation of the **Builder Design Pattern** in PHP. It allows generating SQL queries dynamically through a structured, reusable builder interface.

## 🛠 Features

- Uses the **Builder Pattern** to construct SQL queries.
- Pure PHP implementation.
- Works with **MySQL** using **PDO**.
- Environment configuration with `.env` via `vlucas/phpdotenv`.
- Organized with **PSR-4** and Composer autoloading.

## 🚀 Getting Started

### 1. Clone the repository

git clone https://github.com/Aissam-Ahmed/php-sql-builder-pattern.git  
cd php-sql-builder-pattern

### 2. Install dependencies

composer install

### 3. Create `.env` file in the root directory

DB_HOST=127.0.0.1  
DB_NAME=builder_app  
DB_USER=root  
DB_PASS=

### 4. Create the database and users table

CREATE DATABASE builder_app;

USE builder_app;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    age INT,
    status VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (name, email, age, status) VALUES
('Alice', 'alice@example.com', 30, 'active'),
('Bob', 'bob@example.com', 22, 'inactive'),
('Charlie', 'charlie@example.com', 35, 'active'),
('Diana', 'diana@example.com', 28, 'active'),
('Eve', 'eve@example.com', 40, 'inactive');

### 5. Run the app

php -S localhost:8000 -t public

Then open in browser:

http://localhost:8000