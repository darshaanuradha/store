<?php
require_once '../application/db.php';

//fetch data from database
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store - Shop Premium Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation Header -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <i class="fas fa-store text-3xl text-blue-600 mr-3"></i>
                    <h1 class="text-2xl font-bold text-gray-900">Store</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="text-gray-600 hover:text-gray-900 transition">
                        <i class="fas fa-search text-xl"></i>
                    </button>
                    <button class="relative text-gray-600 hover:text-gray-900 transition">
                        <i class="fas fa-shopping-cart text-xl"></i>
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">0</span>
                    </button>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition">Sign In</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12 px-4">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">Premium Products</h2>
            <p class="text-lg text-blue-100 mb-6">Discover our handpicked collection of quality items</p>
        </div>
    </div>

    <!-- Products Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <!-- Filters and Sort -->
        <div class="mb-8 flex justify-between items-center">
            <h3 class="text-2xl font-bold text-gray-900">All Products</h3>
            <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option>Sort By: Latest</option>
                <option>Price: Low to High</option>
                <option>Price: High to Low</option>
                <option>Most Popular</option>
            </select>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php while($row = mysqli_fetch_assoc($result)) { 
                $inStock = $row['quantity'] > 0;
                $stockClass = $inStock ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800';
                $buttonClass = $inStock ? 'bg-blue-600 hover:bg-blue-700' : 'bg-gray-400 cursor-not-allowed';
            ?>
            <!-- Product Card -->
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden group">
                <!-- Image Placeholder -->
                <div class="w-full h-48 bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center overflow-hidden">
                    <i class="fas fa-image text-5xl text-gray-500 opacity-50"></i>
                </div>

                <!-- Card Content -->
                <div class="p-5">
                    <!-- Stock Badge -->
                    <div class="mb-3 flex justify-between items-start">
                        <span class="text-sm font-semibold text-gray-500">#<?php echo $row['id']; ?></span>
                        <span class="px-2 py-1 rounded-full text-xs font-semibold <?php echo $stockClass; ?>">
                            <?php echo $inStock ? 'In Stock' : 'Out of Stock'; ?>
                        </span>
                    </div>

                    <!-- Product Name -->
                    <h4 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2"><?php echo $row['name']; ?></h4>

                    <!-- Product Description -->
                    <p class="text-sm text-gray-600 mb-4 line-clamp-2"><?php echo $row['description']; ?></p>

                    <!-- Price and Quantity Row -->
                    <div class="mb-4 pb-4 border-b border-gray-200">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-2xl font-bold text-blue-600">${<?php echo number_format($row['price'], 2); ?></span>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-gray-500">Available</p>
                                <p class="text-lg font-semibold text-gray-900"><?php echo $row['quantity']; ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Add to Cart Button -->
                    <button class="w-full <?php echo $buttonClass; ?> text-white font-semibold py-2 rounded-lg transition duration-200 flex items-center justify-center space-x-2 <?php echo !$inStock ? 'opacity-50' : ''; ?>"
                            <?php echo !$inStock ? 'disabled' : ''; ?>>
                        <i class="fas fa-shopping-cart"></i>
                        <span><?php echo $inStock ? 'Add to Cart' : 'Out of Stock'; ?></span>
                    </button>
                </div>
            </div>
            <?php } ?>
        </div>

        <!-- Empty State (if no products) -->
        <?php if(mysqli_num_rows($result) === 0) { ?>
        <div class="text-center py-12">
            <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-2xl font-bold text-gray-900 mb-2">No Products Available</h3>
            <p class="text-gray-600">Check back soon for amazing items!</p>
        </div>
        <?php } ?>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-12 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h5 class="text-white font-bold mb-4 flex items-center">
                        <i class="fas fa-store mr-2"></i>Store
                    </h5>
                    <p class="text-sm">Your trusted platform for premium products.</p>
                </div>
                <div>
                    <h5 class="text-white font-bold mb-4">Quick Links</h5>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition">Contact</a></li>
                        <li><a href="#" class="hover:text-white transition">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="text-white font-bold mb-4">Support</h5>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">Help Center</a></li>
                        <li><a href="#" class="hover:text-white transition">Shipping Info</a></li>
                        <li><a href="#" class="hover:text-white transition">Returns</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="text-white font-bold mb-4">Follow Us</h5>
                    <div class="flex space-x-4">
                        <a href="#" class="hover:text-white transition"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="hover:text-white transition"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="hover:text-white transition"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8">
                <p class="text-center text-sm">&copy; 2026 Store. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
