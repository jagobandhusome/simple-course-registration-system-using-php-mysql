Simple Course Registration System (PHP OOP)
A clean, object-oriented PHP course registration system developed in 2016. This project is designed as an educational blueprint for newcomers to learn Object-Oriented Programming (OOP) in PHP and understand how to structure a web application without a full-fledged modern framework.

Built during a time of transition in PHP, it embodies core OOP principles in a way that's easy to grasp, laying the foundation for understanding more complex patterns like MVC later on.

Heads up for Developers: This project is built for an earlier version of PHP (5.x) and uses practices common at the time. It's a perfect time capsule for learning OOP evolution!

🚀 Project Idea & Philosophy
The primary goal of this project is to demonstrate a simple, custom framework pattern for building web applications using OOP best practices. Instead of just being a monolithic script, it's structured in a way that separates concerns, promotes reusability, and makes the codebase easy to understand and extend.

It's not a strict MVC, but a pragmatic and simple framework-like structure that serves as a fantastic stepping stone.

✨ Features
Object-Oriented Architecture: Entirely built using PHP classes and objects.

Role-Based Access: Separate dashboards for Students and Administrators.

Course Management: Admins can add, view, and manage courses.

Student Registration: Students can browse available courses and register.

Simple Framework Pattern: Provides a clear structure (routing, classes, templates) that can be adapted for any simple application.

Session Management: Secure user login and state management.

🛠️ Technology Stack
Backend: PHP (Compatible with 5.x and earlier versions)

Database: MySQL

Architecture: Object-Oriented Programming (OOP)

Pattern: Custom Simple Framework Pattern

📁 Project Structure
The code is organized to emulate a simple framework, making it easy to navigate and extend.

text
simple-course-registration-system/
│
├── includes/
│   ├── config.php          # Database configuration and core settings
│   ├── Database.php        # Database connection class (using MySQLi)
│   ├── User.php            # Base User class
│   ├── Student.php         # Student class, extends User
│   ├── Admin.php           # Admin class, extends User
│   ├── Course.php          # Course class for handling course data
│   └── Auth.php            # Authentication handling class
│
├── templates/               # (Or `views/`)
│   ├── header.php
│   ├── footer.php
│   ├── student/
│   └── admin/
│
├── pages/                   # Main pages that use the classes
│   ├── login.php
│   ├── dashboard.php
│   ├── register_course.php
│   └── ...
│
├── assets/
│   ├── css/
│   └── js/
│
└── index.php               # Entry point
🚦 Getting Started
Prerequisites
A local server stack like XAMPP or WAMP.

PHP 5.x (It was developed and tested on this version).

MySQL database.

Installation
Clone or Download this repository into your web server's root directory (e.g., htdocs for XAMPP).

bash
git clone https://github.com/your-username/simple-course-registration-system-php-oop.git
Create a MySQL Database named course_registration (or any name you prefer).

Import the SQL File located in the database/ folder (if provided) to create the necessary tables. If not, you can create them from the classes.

Configure Database Connection: Edit the includes/config.php file with your database credentials (hostname, username, password, database name).

Run the Application: Open your browser and navigate to http://localhost/simple-course-registration-system-php-oop.

💡 How to Use & Extend
This project is free for all. No license, no credit needed.

For Learning: Use it as a reference to understand how classes interact, how to handle inheritance (Student and Admin extending User), and how to build a simple application flow.

For a Project: Feel free to use this as a starting point for a simple registration system. The structure is already there!

To Extend:

Add a new Teacher role by creating a Teacher.php class that extends User.

Add email functionality.

Implement a simple routing engine to make URLs cleaner.

The simple framework pattern means adding a new feature like "Events" would just require creating an Event.php class and corresponding pages.

⚠️ Important Note for Modern Developers
This code is a snapshot of PHP development from 2016. While it follows OOP best practices for its time, please be aware:

It does not use Composer or modern autoloading (PSR-4).

It does not use modern PHP security features like prepared statements (if it uses the old mysql_ extension instead of MySQLi OO, it's highly recommended to update it).

It is not built for PHP 7+ or 8+ though it might run with minor adjustments.

This is its greatest strength for learning: it shows the "why" behind modern practices by letting you see a clean, pre-framework approach.

🤝 Contributing
Since this is primarily an educational archive, major feature contributions are not expected. However, if you have ideas for making the educational comments clearer or fixing a critical bug for it to run on old setups, feel free to fork and submit a pull request.

📜 License
This project has no official license. You are free to use, copy, modify, and distribute it for any purpose, personal or commercial. No attribution is required. Enjoy!
