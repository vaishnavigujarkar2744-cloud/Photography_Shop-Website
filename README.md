# 📸 Photography Shop Website

## 📌 Project Description

**Photography Shop Website** is a dynamic web-based platform developed for a photography business to showcase photography services and sell photography-related products online.

The website provides an attractive and user-friendly interface where customers can explore photography services, browse products such as **photo frames, albums, gifts, and canvas prints**, add products to their cart, and place orders.

It also includes an **admin panel** that allows the shop owner to manage products, services, orders, and customer information.

## 🎯 Objectives

- Create an online presence for a photography shop.
- Display photography services and products.
- Allow customers to register and log in.
- Provide product browsing and shopping cart functionality.
- Allow customers to place and manage orders.
- Provide an admin panel for managing the website.
- Store customer, product, and order information securely in a database.

## ✨ Features

### 👤 Customer Features
- User Registration and Login
- User Dashboard
- Browse Photography Products
- View Product Details
- Add Products to Cart
- Update or Remove Cart Items
- Place Orders
- View Order Information
- Explore Photography Services
- Contact the Shop Owner

### 🛠️ Admin Features
- Admin Login
- Admin Dashboard
- Add Products
- Edit Products
- Delete Products
- Manage Orders
- Manage Customer Information
- Manage Photography Services

### 🛍️ Product Categories
- 📷 Photo Frames
- 📖 Photo Albums
- 🎁 Gifts
- 🖼️ Canvas Prints

### 📸 Photography Services
- Wedding Photography
- Birthday Events
- Baby Shower
- Puja Functions
- Other Events

## 💻 Technologies Used

- **Frontend:** HTML5, CSS3, Bootstrap 5, JavaScript
- **Backend:** Core PHP
- **Database:** MySQL
- **Server:** XAMPP / Apache
- **Icons:** Bootstrap Icons

## 🗂️ Project Structure

```text
Photography-Shop/
│
├── admin/
│   ├── admin_login.php
│   ├── dashboard.php
│   ├── add_product.php
│   ├── edit_product.php
│   └── delete_product.php
│
├── assets/
│   ├── css/
│   │   └── style.css
│   └── images/
│       └── gallery/
│
├── includes/
│   ├── db.php
│   ├── functions.php
│   └── header.php
│
├── index.php
├── login.php
├── register.php
├── products.php
├── product_details.php
├── cart.php
├── checkout.php
├── orders.php
├── services.php
├── about.php
├── contact.php
└── logout.php
```

## 🗄️ Database

The project uses **MySQL** to store:

- User information
- Admin information
- Product details
- Product categories
- Cart information
- Orders
- Customer information
- Shop/service information

## ⚙️ How to Run the Project

### 1. Install XAMPP

Download and install **XAMPP** on your computer.

### 2. Start Server

Open XAMPP Control Panel and start:

```text
Apache
MySQL
```

### 3. Copy Project

Copy the project folder into:

```text
C:\xampp\htdocs\
```

### 4. Create Database

Open:

```text
http://localhost/phpmyadmin
```

Create a database, for example:

```text
photography_shop
```

Import the provided SQL file into the database.

### 5. Configure Database

Update the database connection details in:

```text
includes/db.php
```

Example:

```php
$host = "localhost";
$user = "root";
$password = "";
$database = "photography_shop";
```

### 6. Run Website

Open your browser and visit:

```text
http://localhost/Photography-Shop/
```

## 🎨 Website Pages

| Page | Description |
|---|---|
| Home | Introduction to the photography shop |
| About | Information about the photographer/shop |
| Services | Available photography services |
| Products | Photography products |
| Cart | Selected products |
| Checkout | Place an order |
| Login | Customer login |
| Register | New customer registration |
| Orders | Customer order information |
| Contact | Contact information |
| Admin | Website and product management |

## 🔮 Future Enhancements

- Online payment integration
- Email/SMS order notifications
- Product reviews and ratings
- Wishlist functionality
- Online photography appointment booking
- Customer feedback system
- Advanced admin analytics
- Image gallery and portfolio management

## 👩‍💻 Project Purpose

This project was developed as a **web development project** to demonstrate the implementation of an e-commerce-based photography shop using **PHP and MySQL**.

## 📜 License

This project is created for **educational and project purposes**.
