
CREATE DATABASE IF NOT EXISTS auto_garage;
USE auto_garage;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE customers (
customer_id INT AUTO_INCREMENT PRIMARY KEY,
full_name VARCHAR(100),
phone VARCHAR(20),
email VARCHAR(100)
);

CREATE TABLE vehicles (
vehicle_id INT AUTO_INCREMENT PRIMARY KEY,
customer_id INT,
vehicle_type ENUM('Car','Motorcycle'),
brand VARCHAR(50),
model VARCHAR(50),
plate_number VARCHAR(20),
FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
);

CREATE TABLE services (
service_id INT AUTO_INCREMENT PRIMARY KEY,
service_name VARCHAR(100),
price DECIMAL(10,2)
);

CREATE TABLE bookings (
booking_id INT AUTO_INCREMENT PRIMARY KEY,
customer_id INT,
vehicle_id INT,
service_id INT,
booking_date DATE,
status VARCHAR(30) DEFAULT 'Pending',
FOREIGN KEY (customer_id) REFERENCES customers(customer_id),
FOREIGN KEY (vehicle_id) REFERENCES vehicles(vehicle_id),
FOREIGN KEY (service_id) REFERENCES services(service_id)
);

CREATE TABLE spare_parts (
part_id INT AUTO_INCREMENT PRIMARY KEY,
part_name VARCHAR(100),
category VARCHAR(50),
vehicle_type ENUM('Car','Motorcycle','Both'),
price DECIMAL(10,2),
quantity INT DEFAULT 0
);

CREATE TABLE sales (
sale_id INT AUTO_INCREMENT PRIMARY KEY,
customer_id INT,
sale_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
);

CREATE TABLE sale_items (
sale_item_id INT AUTO_INCREMENT PRIMARY KEY,
sale_id INT,
part_id INT,
quantity INT,
price DECIMAL(10,2),
FOREIGN KEY (sale_id) REFERENCES sales(sale_id),
FOREIGN KEY (part_id) REFERENCES spare_parts(part_id)
);
