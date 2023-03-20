## 🖼Image Uploader

#### This is a simple web application written in PHP for uploading images and displaying them on a homepage. The application uses the PDO extension to connect to a MySQL database and handle database queries.

## Technologies

**Project is created with**

- Bootstrap: v5.3.0
- PHP/8.1.10

## Getting Started

**Prerequisites**
Before running this project, you will need the following software installed on your local machine:

- PHP 7.0 or later
- Web server (such as Apache or Nginx)
- MySQL 5.7 or later

**Installation**

- Clone the repository

```bash
git clone https://github.com/petermuladi/image-uploader.git
```

- Create a new database in MySQL and import the **schema.sql** file to create the necessary table. You can use a tool like **phpMyAdmin** to create the database and import the schema.

- Copy the **.env.example** file to **.htaccess** and update the database connection settings with your own database credentials. You can use a text editor like Sublime Text or Notepad to edit the .env file.

```bash
DB_HOST=localhost
DB_NAME=mydatabase
DB_USER=myusername
DB_PASSWORD=mypassword
```
## Running
To run the application, start your web server and navigate to the root directory of the project in your web browser.

## Usage

**Uploading Images**
Only JPG, PNG, and GIF images are allowed.

## Setting up Apache in XAMPP for Php router

### Apache httpd.config (My settings)

- Listen 1010
- <VirtualHost \*:1010>
  DocumentRoot "C:\XAMPP\htdocs\image-uploader"
  ServerName localhost:1010 </VirtualHost>

## Development Environment

-	XAMPP web server package  3.3.0
-	Visual Studio Code 1.75
-	PHP 8.1
-	Apache/2.4.54 
-	MySQL 15.1
-	phpMyAdmin 5.2.0
-	MariaDB 10.4.25

## Additional Notes
**The application was created by Muladi Péter.**