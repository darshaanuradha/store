-- Create database
CREATE DATABASE store_db;

-- Use it
USE store_db;

-- Create product table
CREATE TABLE product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data
INSERT INTO product (name, description, price, stock) VALUES
('Laptop', 'High performance laptop', 250000.00, 10),
('Smartphone', 'Latest Android phone', 120000.00, 25),
('Headphones', 'Noise cancelling headphones', 15000.00, 50),
('Keyboard', 'Mechanical keyboard', 8000.00, 30),
('Mouse', 'Wireless mouse', 3500.00, 40);

