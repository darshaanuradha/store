<?php
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'add_product') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Insert the new product into the database
    $stmt = $conn->prepare("INSERT INTO product (name, description, price) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $name, $description, $price);
    if ($stmt->execute()) {
        header("Location: ../index.php?page=product");
    } else {
        echo "<p class='text-red-600 font-bold'>Error adding product: " . $stmt->error . "</p>";
    }
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'edit_product') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Update the product in the database
    $stmt = $conn->prepare("UPDATE product SET name = ?, description = ?, price = ? WHERE id = ?");
    $stmt->bind_param("ssdi", $name, $description, $price, $product_id);
    if ($stmt->execute()) {
        header("Location: ../index.php?page=product");
    } else {
        echo "<p class='text-red-600 font-bold'>Error editing product: " . $stmt->error . "</p>";
    }
    $stmt->close();
}
if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['action'] === 'delete') {
    $product_id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM product WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    if ($stmt->execute()) {
        header("Location: ../index.php?page=product");
    } else {
        echo "<p class='text-red-600 font-bold'>Error deleting product: " . $stmt->error . "</p>";
    }
    $stmt->close();
}
