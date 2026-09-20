CREATE DATABASE IF NOT EXISTS photography_shop CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE photography_shop;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20),
    password VARCHAR(255) NOT NULL,
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL DEFAULT 0,
    image VARCHAR(255) DEFAULT '',
    category VARCHAR(100) DEFAULT 'Photo Frames',
    stock INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    description TEXT,
    price VARCHAR(100),
    image VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS gallery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150),
    image VARCHAR(255),
    category VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    customer_name VARCHAR(100),
    phone VARCHAR(20),
    address TEXT,
    total_amount DECIMAL(10,2) DEFAULT 0,
    status VARCHAR(50) DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL
);

CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NULL,
    customer_name VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    event_type VARCHAR(100) NOT NULL,
    event_date DATE NOT NULL,
    event_time TIME NOT NULL,
    location VARCHAR(255) NOT NULL,
    message TEXT,
    status VARCHAR(50) DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS shop_settings (
    id INT PRIMARY KEY,
    shop_name VARCHAR(150),
    photographer_name VARCHAR(150),
    description TEXT,
    phone VARCHAR(20),
    whatsapp VARCHAR(20),
    email VARCHAR(100),
    address TEXT,
    location VARCHAR(255),
    map_url VARCHAR(500),
    about_image VARCHAR(255),
    hero_image VARCHAR(255)
);

INSERT INTO shop_settings
(id,shop_name,photographer_name,description,phone,whatsapp,email,address,location,map_url,about_image,hero_image)
VALUES
(1,'SnapFrame Photography','Your Photographer','Professional photography for weddings, birthdays, baby showers, puja and other memorable events.','9999999999','9999999999','hello@snapframe.com','Your studio address','Your city','https://maps.google.com/','','')
ON DUPLICATE KEY UPDATE id=id;

INSERT INTO products(name,description,price,image,category,stock) VALUES
('Classic Photo Frame','Elegant frame for your favorite memory.',799,'frame.svg','Photo Frames',20),
('Premium Wedding Album','Custom premium album for wedding memories.',4999,'album.svg','Photo Albums',10),
('Canvas Memory Print','High-quality canvas print for your wall.',1499,'canvas.svg','Canvas Prints',15),
('Custom Photo Gift','Personalized gift made from your photograph.',999,'gift.svg','Photo Gifts',20);


INSERT INTO services(name,description,price,image) VALUES
('Wedding Photography','Complete wedding day photography with candid and traditional coverage.','Starting from ₹15,000',''),
('Pre-Wedding Photography','Creative pre-wedding portraits at locations you love.','Starting from ₹8,000',''),
('Birthday Photography','Fun and natural photography for birthday celebrations.','Starting from ₹5,000',''),
('Baby Shower Photography','Beautiful memories from your baby shower celebration.','Starting from ₹5,000',''),
('Puja Photography','Professional coverage of puja and family ceremonies.','Starting from ₹4,000',''),
('Other Events','Photography for anniversaries, parties, corporate and family events.','Contact for price','');
