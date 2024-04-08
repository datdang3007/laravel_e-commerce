<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Thêm CDN Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Thêm CDN Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <title>@yield('title')</title>
</head>
<body class="bg-gray-100">
    @include('partials.home_header')

    <!-- Banner -->
    <div class='flex justify-center py-5'>
        <div class="container max-w-screen-lg">
            <img src="{{ asset('images/banner.jpg') }}" alt="Banner" class="w-full">
        </div>
    </div>

    <!-- Section -->
    <div class="container mx-auto mt-8">
        <div class="flex gap-x-4">
            <!-- Filter -->
            <div class="w-1/6">
                <div class="bg-white rounded-lg shadow-md p-4 mb-4">
                    <h2 class="text-lg font-bold mb-2">Filter</h2>
                    <!-- Price Filter -->
                    <div class="mb-4">
                        <h3 class="text-gray-800 font-bold mb-2">Price</h3>
                        <input type="range" min="0" max="100" value="50" class="slider" id="priceRange">
                        <span class="text-gray-600" id="priceValue">$50</span>
                    </div>
                    <!-- End Price Filter -->

                    <!-- Category Filter -->
                    <div class="mb-4">
                        <h3 class="text-gray-800 font-bold mb-2">Categories</h3>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" checked>
                                <span class="ml-2">Sữa</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox">
                                <span class="ml-2">Mỳ</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox">
                                <span class="ml-2">Quần áo</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox">
                                <span class="ml-2">Sale</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox">
                                <span class="ml-2">Hãng</span>
                            </label>
                        </div>
                        <!-- Add more categories here -->
                    </div>
                    <!-- End Category Filter -->
                </div>
            </div>
            <!-- End Filter -->

            <!-- Product List -->
            <div class="w-5/6">
                <!-- Product Card -->
                <div class="grid grid-cols-4 gap-4">
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <img src="{{ asset('images/product01.png') }}" alt="Product 1" class="w-full h-48 object-cover mb-2">
                        <h3 class="text-gray-800 font-bold">Product 1</h3>
                        <p class="text-gray-600">150.000 VNĐ</p>
                        <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="mt-2 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Thêm vào giỏ</button>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <img src="{{ asset('images/product01.png') }}" alt="Product 1" class="w-full h-48 object-cover mb-2">
                        <h3 class="text-gray-800 font-bold">Product 1</h3>
                        <p class="text-gray-600">150.000 VNĐ</p>
                        <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="mt-2 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Thêm vào giỏ</button>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-4">
                        <img src="{{ asset('images/product01.png') }}" alt="Product 1" class="w-full h-48 object-cover mb-2">
                        <h3 class="text-gray-800 font-bold">Product 1</h3>
                        <p class="text-gray-600">150.000 VNĐ</p>
                        <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="mt-2 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Thêm vào giỏ</button>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-4">
                        <img src="{{ asset('images/product01.png') }}" alt="Product 1" class="w-full h-48 object-cover mb-2">
                        <h3 class="text-gray-800 font-bold">Product 1</h3>
                        <p class="text-gray-600">150.000 VNĐ</p>
                        <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="mt-2 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Thêm vào giỏ</button>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-4">
                        <img src="{{ asset('images/product01.png') }}" alt="Product 1" class="w-full h-48 object-cover mb-2">
                        <h3 class="text-gray-800 font-bold">Product 1</h3>
                        <p class="text-gray-600">150.000 VNĐ</p>
                        <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="mt-2 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Thêm vào giỏ</button>
                    </div>
                </div>

            </div>
            <!-- End Product List -->
        </div>
    </div>
    <!-- End Section -->
    
    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4 mt-10">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo or Brand Name -->
            <h2 class="text-lg font-bold">E-Commerce</h2>
            
            <!-- Navigation Links -->
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="#" class="hover:text-gray-400">Home</a></li>
                    <li><a href="#" class="hover:text-gray-400">About</a></li>
                    <li><a href="#" class="hover:text-gray-400">Products</a></li>
                    <li><a href="#" class="hover:text-gray-400">Contact</a></li>
                </ul>
            </nav>
        </div>
    </footer>
    <!-- End Footer -->
</body>
    <!-- Thêm CDN Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        // JavaScript to update price value
        var slider = document.getElementById("priceRange");
        var output = document.getElementById("priceValue");
        output.innerHTML = "$" + slider.value;

        slider.oninput = function() {
            output.innerHTML = "$" + this.value;
        }
    </script>
    @yield('scripts')
</html>
