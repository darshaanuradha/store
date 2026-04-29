<h1>Add Product</h1>
<p>Use the form below to add a new product to the store.</p>
<form action="application/productController.php" method="POST" class="max-w-md mx-auto">
    <input type="text" name="formName" value="add_product" hidden>

    <div class="mb-4">
        <label for="name" class="block text-gray-700">Product Name:</label>
        <input type="text" id="name" name="name" required class="w-full px-3 py-2 border rounded">
    </div>
    <div class="mb-4">
        <label for="description" class="block text-gray-700">Description:</label>
        <textarea id="description" name="description" required class="w-full px-3 py-2 border rounded"></textarea>
    </div>
    <div class="mb-4">
        <label for="price" class="block text-gray-700">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required class="w-full px-3 py-2 border rounded">
    </div>
    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Add Product</button>
</form>