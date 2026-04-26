create database IF NOT EXISTS store_db;
use store_db;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    quantity INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO products (name, description, price, quantity) VALUES
('Laptop', 'A high-performance laptop suitable for gaming and work.', 999.99, 10),
('Smartphone', 'A latest model smartphone with advanced features.', 699.99, 20),
('Headphones', 'Noise-cancelling over-ear headphones.', 199.99, 15),
('Smartwatch', 'A smartwatch with fitness tracking and notifications.', 299.99, 25),
('Tablet', 'A lightweight tablet perfect for browsing and media consumption.', 399.99, 12);