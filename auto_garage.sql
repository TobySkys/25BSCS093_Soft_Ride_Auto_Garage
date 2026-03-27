
CREATE DATABASE IF NOT EXISTS auto_garage CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE auto_garage;

-- ── Users ───
CREATE TABLE IF NOT EXISTS users (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    username   VARCHAR(50)  NOT NULL,
    email      VARCHAR(100) NOT NULL UNIQUE,
    password   VARCHAR(255) NOT NULL,
    is_admin   TINYINT(1)   NOT NULL DEFAULT 0,
    created_at TIMESTAMP    DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE  IF NOT EXISTS admins(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
);
-- ── Customers ──────
CREATE TABLE IF NOT EXISTS customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name   VARCHAR(100),
    phone       VARCHAR(20),
    email       VARCHAR(100)
);

-- ── Vehicles ──────
CREATE TABLE IF NOT EXISTS vehicles (
    vehicle_id   INT AUTO_INCREMENT PRIMARY KEY,
    customer_id  INT,
    vehicle_type ENUM('Car','Motorcycle') NOT NULL DEFAULT 'Car',
    brand        VARCHAR(50),
    model        VARCHAR(50),
    year         YEAR,
    plate_number VARCHAR(20),
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id) ON DELETE SET NULL
);

-- ── Services ──────
CREATE TABLE IF NOT EXISTS services (
    service_id   INT AUTO_INCREMENT PRIMARY KEY,
    service_name VARCHAR(100),
    price        DECIMAL(12,2),
    service_description TEXT
);

-- ── Bookings ─────
CREATE TABLE IF NOT EXISTS bookings (
    booking_id   INT AUTO_INCREMENT PRIMARY KEY,
    customer_id  INT,
    vehicle_id   INT,
    service_id   INT,
    first_name   VARCHAR(60),
    last_name    VARCHAR(60),
    phone        VARCHAR(25),
    email        VARCHAR(100),
    vehicle_year VARCHAR(10),
    make_model   VARCHAR(80),
    service_name VARCHAR(100),
    booking_date DATE,
    notes        TEXT,
    status       VARCHAR(30) DEFAULT 'Pending',
    created_at   TIMESTAMP   DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id) ON DELETE SET NULL,
    FOREIGN KEY (vehicle_id)  REFERENCES vehicles(vehicle_id)   ON DELETE SET NULL,
    FOREIGN KEY (service_id)  REFERENCES services(service_id)   ON DELETE SET NULL
);

-- ── Spare Parts ──────
CREATE TABLE IF NOT EXISTS spare_parts (
    part_id      INT AUTO_INCREMENT PRIMARY KEY,
    part_name    VARCHAR(100) NOT NULL,
    category     VARCHAR(50),
    vehicle_type ENUM('Car','Motorcycle','Both') DEFAULT 'Both',
    price        DECIMAL(12,2) NOT NULL,
    quantity     INT           NOT NULL DEFAULT 0,
    description  TEXT,
    created_at   TIMESTAMP     DEFAULT CURRENT_TIMESTAMP
);

-- ── Sales ────────
CREATE TABLE IF NOT EXISTS sales (
    sale_id     INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    sale_date   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id) ON DELETE SET NULL
);

-- ── Sale Items ─────────
CREATE TABLE IF NOT EXISTS sale_items (
    sale_item_id INT AUTO_INCREMENT PRIMARY KEY,
    sale_id      INT,
    part_id      INT,
    quantity     INT,
    price        DECIMAL(12,2),
    FOREIGN KEY (sale_id) REFERENCES sales(sale_id)       ON DELETE CASCADE,
    FOREIGN KEY (part_id) REFERENCES spare_parts(part_id) ON DELETE SET NULL
);

-- ── Seed: service list ──────
INSERT IGNORE INTO services (service_name, price) VALUES
    ('Oil Change',         55000),
    ('Brake Repair',      150000),
    ('Engine Repair',     400000),
    ('Transmission Repair',350000),
    ('Auto A/C Repair',   120000),
    ('Hybrid Repair',     250000),
    ('Wheel Alignment',    80000),
    ('Tire Services',      60000),
    ('Check Engine Light',  45000),
    ('Suspension Repair',  200000),
    ('Exhaust Repair',     110000),
    ('Electrical Repair',  130000),
    ('Clutch Repair',      180000),
    ('General Maintenance', 70000);

-- ── Seed: sample spare parts ────────
INSERT IGNORE INTO spare_parts (part_name, category, vehicle_type, price, quantity, description) VALUES
    ('Front Brake Pads',   'Brakes',     'Car',        85000, 12, 'High-performance ceramic brake pads for cars and SUVs.'),
    ('Engine Oil Filter',  'Engine',     'Both',       15000, 30, 'OEM-quality oil filter compatible with Toyota, Honda, and Nissan.'),
    ('Timing Belt Kit',    'Engine',     'Car',       125000,  5, 'Complete timing belt kit including tensioner and water pump.'),
    ('Air Filter (Panel)', 'Engine',     'Car',        22000, 18, 'High-flow panel air filter for improved engine performance.'),
    ('Shock Absorber Rear','Suspension', 'Car',       180000,  8, 'Heavy-duty rear shock absorber for saloons and SUVs.'),
    ('Radiator Coolant 1L','Cooling',    'Both',       18000, 25, 'Pre-mixed OAT coolant — safe for all modern aluminium engines.'),
    ('Battery 12V 60Ah',   'Electrical', 'Car',       220000,  3, 'Maintenance-free lead-acid battery, 12 months warranty.'),
    ('Spark Plug Set x4',  'Engine',     'Car',        48000, 20, 'Iridium tipped plugs for smooth idle and better fuel economy.');
