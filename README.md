**Login Page**
![image](https://github.com/user-attachments/assets/ac4cc34f-5c41-401a-8741-44163cd6d6a4)

**Employee Management Page**
![image](https://github.com/user-attachments/assets/79bca247-7ca2-4168-b8c9-cfb2130a9480)

**Add Employee Page**
![image](https://github.com/user-attachments/assets/2d8dccb2-fe07-418b-b941-895896741c3a)

**View Employee Page**
![image](https://github.com/user-attachments/assets/84efa143-8fd0-4fae-873f-cb0ad16f9c92)


**Employee Management System**

This project is a simple web application for managing employees, built using PHP and MySQL.

**Prerequisites**
Please ensure you have the following installed:

XAMPP (includes Apache, MySQL and PHP)
Git

**Follow these steps to set up and run the project on your local machine**

Step 1: Clone the Repository
First, clone the repository to your local machine using Git:

```
git clone https://github.com/upasanaRaghav/EmployeeManagement.git
```

Step 2: Install XAMPP

Download and install XAMPP from the official website. Follow the instructions provided on the website for your operating system.

Step 3: Set Up the Database

Open XAMPP and start the Apache and MySQL modules.
Open your web browser and navigate to http://localhost/phpmyadmin.
Create a new database named employee_db.
Import the provided SQL file to set up the database schema and initial data:
Select the employee_db database.
Go to the Import tab.
Choose the employee_db.sql file located in the cloned repository.
Click on Go to import the database schema and data.

Step 4: Set Up the Project Files

Copy the cloned repository folder into the htdocs directory of your XAMPP installation. The path usually looks like this:

```
C:\xampp\htdocs\
```

Step 5: Configure the Database Connection

Open the includes/db.php file in your project directory.

Ensure the database connection details are correct:

```
<?php
$servername = "localhost";
$username = "root"; 
$password = "";  
$dbname = "employee_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```

Step 6: Running the Project

Open your web browser.
Navigate to http://localhost/login.php
You should now see the Employee Management System login page. login with the default credential present in the login.php file line numer 11. After login You can add, view, update, and delete employee records through the web interface.

**Project Files**

add_employee.php: Form for adding a new employee.
delete_employee.php: Script for deleting an employee.
employee_db.sql: SQL file for creating the database and table.
update_employee.php: Form and script for updating an employee's details.
upload.php: Script for handling file uploads.
view_employee.php: Page for viewing an employee's details.

**Additional Notes**
Ensure that the uploads directory (for storing profile pictures) has the correct permissions to allow file uploads.

