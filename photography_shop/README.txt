SNAPFRAME PHOTOGRAPHY SHOP - CORE PHP + MYSQL + XAMPP

QUICK START
1. Extract this folder to C:\xampp\htdocs\
2. Start Apache and MySQL in XAMPP.
3. Open http://localhost/phpmyadmin
4. Import database.sql OR open database.sql in phpMyAdmin -> SQL and click Go.
5. Open http://localhost/photography_shop/admin/setup_admin.php once.
6. Admin login: http://localhost/photography_shop/admin/login.php
   Email: admin@gmail.com
   Password: admin123
7. Delete admin/setup_admin.php after the first admin is created.
8. Website: http://localhost/photography_shop/

IMPORTANT PORT
This project is configured for MySQL on port 3307 because the supplied XAMPP screenshot showed localhost:3307.
If your MySQL port is 3306, edit config/db.php and change 3307 to 3306.

IMAGES
Replace the SVG placeholders in assets/images/ with your own photos if desired.
Product images can be uploaded from Admin -> Products.
Gallery images can be uploaded from Admin -> Gallery.

FEATURES
- User registration/login
- User profile
- Products and categories
- Cart
- Checkout/order creation
- Stock reduction
- My orders
- Photographer booking
- Gallery with categories
- Services
- Call/WhatsApp contact
- Admin dashboard
- Admin product and gallery upload
- Admin order/booking status management
- Shop settings

FOLDER
photography_shop/
  config/
  includes/
  assets/
  admin/
  database.sql
