V.1 Final Project - Laravel 10 CRUD System

Project Overview
This project is a web application built using Laravel 10.  
It demonstrates CRUD (Create, Read, Update, Delete) functionality using MVC architecture.

---

Features

Create
- Add new records using a form
- Data is stored in MySQL database

Read
- Display all records in a table/dashboard

Update
- Edit existing records
  
Delete
- Remove records securely from database

Recover 
- Deleted records are not permanently removed immediately.  
- Users can view deleted items in a trash bin and restore them if deleted accidentally.

  

---

Technologies Used
- Laravel 10
- PHP
- MySQL (XAMPP)
- Visual Studio Code
- Composer

---

 How to Run the Project

1. Clone Repository
git clone https://github.com/allencalumba0312-droid/V.1_Final_Project_laravel_v10.git

2. Go to Project Folder
cd V.1_Final_Project_laravel_v10

3. Install Dependencies
composer install

4. Create Environment File
copy .env.example .env

5. Generate Application Key
php artisan key:generate

6. Setup Database
- Open XAMPP
- Create database: `finalv10` (or your DB name)
- Update `.env` file:
DB_DATABASE=finalv10
DB_USERNAME=root
DB_PASSWORD=

7. Run Migrations
php artisan migrate

8. Start Server
php artisan serve
