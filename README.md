# Scentify — E-Commerce Website Project
Final Project - Web Programming CSCV 337
 
**Scentify** is a simple e-commerce web application that sells various perfume products. The website is built using **Laravel 11** for the backend and **Flowbite** for the front-end styling.

## About Flowbite

[Flowbite](https://flowbite.com/) is an open-source component library based on Tailwind CSS. It provides free UI code components that helps make it easier to design the interfaces for this project without writing too much custom CSS.

---

## How to Run This Project

To run this Laravel project, there are several steps you need to follow:

### 1. Move the Project Folder
Make sure to place the project folder inside the local server directory:
- For **Laragon**, put it inside the `www/` folder.
- For **XAMPP**, put it inside `htdocs/`. *(This project requires Node.js, so Laragon is recommended.)*

### 2. Start the Local Server
Start the Laragon

Open **two terminals** (use Ctrl + ` in VS Code to open a terminal):

- In the first terminal, run: 
```
npm run dev
```

- In the second terminal, run:
```
php artisan serve
``` 

The website will now be accessible at [http://127.0.0.1:8000](http://127.0.0.1:8000) 

---

### 3. Set Up the Database
Before accessing the website, you need to set up the database:

- Open **phpMyAdmin**
- Create a new database named: `db_commerce`

Then go back to your terminal and run the following commands:

- Run migration to create the database tables (migration files can be found in the `database/migrations` folder):
```
php artisan migrate
```

- Seed the database with the data (seeder files can be found in the `database/seeders` folder, but this is optional as you can register your account, though you will need to modify user role (to Admin) for the first user from phpMyAdmin):
```
php artisan db:seed
```
Or, if you want to run each seeder manually:
```
php artisan db:seed --class=DatabaseSeeder
php artisan db:seed --class=ProductSeeder
php artisan db:seed --class=VisSeeder
```

---

## Notes

### Jetmail API Setup

Modify the env file, modify the MAIL_USERNAME with your API key and MAIL_PASSWORD with your API secret key

### Authentication
This project uses Laravel breeze for authentication

### Role Middleware
Role-based access is handled using a custom RoleMiddleware, which is registered in bootstrap/app.php.

### Global Variable for Authenticated User Data
The logged-in user’s data is shared across views using AppServiceProvider

### Image Storage
To make product and profile images accessible via URL (e.g. asset('public'. ...)), run:  
```
php artisan storage:link
```

### User Profile
The video does not demonstrate about user profile, but you can update your profile through clicking the profile picture button in the navbar and choose user profile
