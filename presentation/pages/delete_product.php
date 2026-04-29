<?php
$product_id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM product WHERE id = ?");
$stmt->bind_param("i", $product_id);
if ($stmt->execute()) {
    header("Location: index.php?page=product");
} else {
    echo "<p class='text-red-600 font-bold'>Error deleting product: " . $stmt->error . "</p>";
}
$stmt->close();
