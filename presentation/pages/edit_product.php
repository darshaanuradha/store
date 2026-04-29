<?php
$product_id = $_GET['id'];
$product = $conn->query("SELECT * FROM product WHERE id = $product_id")->fetch_assoc();


?>

<h1>Edit Product</h1>
<p>Use the form below to edit an existing product in the store.</p>
<form action="application/productController.php?id=<?php echo $product_id; ?>" method="POST" class="max-w-md mx-auto">
    <input type="text" name="formName" value="edit_product" hidden>
    <div class="mb-4">
        <label for="name" class="block text-gray-700">Product Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>" required class="w-full px-3 py-2 border rounded">
    </div>
    <div class="mb-4">
        <label for="description" class="block text-gray-700">Description:</label>
        <textarea id="description" name="description" required class="w-full px-3 py-2 border rounded"><?php echo $product['description']; ?></textarea>
    </div>
    <div class="mb-4">
        <label for="price" class="block text-gray-700">Price:</label>
        <input type="number" id="price" name="price" step="0.01" value="<?php echo $product['price']; ?>" required class="w-full px-3 py-2 border rounded">
    </div>
    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Edit Product</button>
</form>