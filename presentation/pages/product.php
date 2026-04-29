<?php
$product = $conn->query("SELECT * FROM product");
?>

<h1 class="text-3xl font-bold p-4">Product Details</h1>
<p class="p-4">Here are the details of the product you selected.</p>
<a href="index.php?page=add_product" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Add Product</a>

<ul class="p-4">
    <?php while ($row = $product->fetch_assoc()) { ?>
        <li class="mb-2">
            <h2 class="text-xl font-semibold"><?php echo $row['name']; ?></h2>
            <p><?php echo $row['description']; ?></p>
            <p class="text-green-600 font-bold">$<?php echo $row['price']; ?></p>
            <a href="index.php?page=edit_product&id=<?php echo $row['id']; ?>" class="text-blue-500 hover:underline">Edit</a>
            <a href="index.php?action=delete&page=delete_product&id=<?php echo $row['id']; ?>" class="text-red-500 hover:underline ml-2">Delete</a>
        </li>
    <?php } ?>
</ul>