📌 Features
📝 Users can create, update, and delete blogs.
🔍 Search blogs by category.
💬 Users can comment on blogs.
🔐 Admin panel for managing blogs and comments.
🛠️ Technologies Used
Frontend: HTML, CSS, JavaScript, Bootstrap
Backend: PHP, MySQL
🚀 Installation Guide
1️⃣ Clone the Repository
bash
Copy
Edit
git clone https://github.com/yourusername/blog-project.git
Replace yourusername with your actual GitHub username.

2️⃣ Create a Database
Open phpMyAdmin.
Create a database named blog_db.
Import the blog_db.sql file from the project folder.
3️⃣ Configure Database Connection
Open config.php in the project folder.
Update the database credentials:
php
Copy
Edit
<?php
$host = "localhost";
$user = "root"; // Change if you have a different username
$password = ""; // Add password if applicable
$database = "blog_db";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
4️⃣ Run the Project
Place the project folder inside htdocs (if using XAMPP).
Start Apache and MySQL in XAMPP.
Open the browser and go to:
arduino
Copy
Edit
http://localhost/blog-project/
🔑 Admin Login Credentials
Email: admin@gmail.com
Password: admin@123
🏗️ Folder Structure
bash
Copy
Edit
blog-project/
│── admin/             # Admin panel files
│── assets/            # CSS, JS, images
│── database/          # SQL file
│── includes/          # Common PHP files
│── index.php          # Homepage
│── config.php         # Database configuration
│── README.md          # Documentation
📝 License
This project is open-source and free to use.
