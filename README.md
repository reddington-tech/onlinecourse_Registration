# Online Course Registration System

This project is my college project, developed during my time in college as a PHP-based online course registration and management system.

It allows students to register, log in, view available courses, enroll in courses, and check their enrollment history, while admins can manage courses, departments, levels, semesters, and student records.

## Features

### Student Features
- Student registration and login
- Change password
- View and enroll in courses
- Check enrollment history
- View profile information

### Admin Features
- Admin login
- Manage students
- Manage courses, departments, levels, and semesters
- View enrollment records
- Print reports

## Technology Stack
- PHP
- MySQL / MariaDB
- HTML, CSS, Bootstrap
- JavaScript / jQuery

## Project Structure
- admin/ - Admin panel pages
- assets/ - CSS, JS, images, and Bootstrap assets
- includes/ - Shared config, header, footer, navigation, and helper files
- studentphoto/ - Stored student photos

## Requirements
Before running this project, make sure you have:
- XAMPP / WAMP / LAMP server
- PHP 7+
- MySQL database
- Apache server

## Installation
1. Place this project in your web server root folder, for example:
   - XAMPP: htdocs/onlinecourse
2. Start Apache and MySQL from XAMPP Control Panel.
3. Create a database named `onlinecourse` in phpMyAdmin.
4. Import your SQL file if available.
5. Update database credentials in:
   - includes/config.php
6. Open the project in your browser:
   - http://localhost/onlinecourse/

## Default Access
- Student login page: http://localhost/onlinecourse/
- Admin login page: http://localhost/onlinecourse/admin/

## Notes
- The application uses the default MySQL connection settings in `includes/config.php`.
- If your local setup uses different database credentials, update them before running the project.

## GitHub Upload
After this README is added, you can upload the project to GitHub using:

```bash
git init
git add .
git commit -m "Initial commit"
git branch -M main
git remote add origin YOUR_GITHUB_REPOSITORY_URL
git push -u origin main
```

## About This Project
This project was created by me during my college studies and is shared here for academic and portfolio purposes.

## License
This project is for educational and learning purposes.
