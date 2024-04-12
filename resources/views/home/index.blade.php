@extends('layouts.layout_home')

@section('title', 'Trang chủ')

@section('content')
<!-- Banner -->
<div class='flex justify-center py-5'>
    <div class="container max-w-screen-lg">
        <img src="{{ asset('images/banner.jpg') }}" alt="Banner" class="w-full">
    </div>
</div>

<!-- Products & Filter -->
<div class="container mx-auto mt-8">
    <div class="flex gap-x-4">
        <!-- Filter -->
        <div class="w-1/6">
            <div class="bg-white rounded-lg shadow-md p-4 mb-4">
                <!-- Price Filter -->
                <div>
                    <h3 class="text-gray-800 font-bold mb-2">Mức giá</h3>
                    <div class="mt-2 flex justify-end">
                        <span class="text-gray-600" id="priceValue">0 VNĐ</span>
                    </div>
                    <input type="range" min="0" max="5000000" value="0" class="w-full slider" id="priceRange">
                </div>

                <!-- Price Buttons -->
                <div class="mt-2 grid grid-cols-2 gap-2">
                    <button class="price-btn text-xs bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-1 px-4 rounded" data-price="50000">50.000</button>
                    <button class="price-btn text-xs bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-1 px-4 rounded" data-price="100000">100.000</button>
                    <button class="price-btn text-xs bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-1 px-4 rounded" data-price="500000">500.000</button>
                    <button class="price-btn text-xs bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-1 px-4 rounded" data-price="1000000">1.000.000</button>
                    <button class="price-btn text-xs bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-1 px-4 rounded" data-price="2500000">2.500.000</button>
                    <button class="price-btn text-xs bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-1 px-4 rounded" data-price="5000000">5.000.000</button>
                </div>
                <!-- End Price Filter -->

                <!-- Category Filter -->
                <div class="mt-8">
                    <h3 class="text-gray-800 font-bold mb-2">Danh mục</h3>
                    @foreach ($categories as $category)
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox">
                            <span class="ml-2">{{ $category->name }}</span>
                        </label>
                    </div>
                    @endforeach
                </div>
                <!-- End Category Filter -->
            </div>
        </div>
        <!-- End Filter -->

        <!-- Product List -->
        <div class="w-5/6">
            <!-- Product Card -->
            <div class="grid grid-cols-4 gap-4">
                @foreach ($products as $product)
                <div class="bg-white rounded-lg shadow-md p-4">
                    @if ($product->image)
                        <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-contain mb-2">
                    @else
                        <img src="https://cdn.discordapp.com/attachments/1227414042679840849/1227414069586169896/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.png?ex=6628516e&is=6615dc6e&hm=2e35379412d2b76d11e6574800925c40acb9ec8e5c2ca1f15ec3d8bbe1c40c8b&" alt="No Image" class="w-full h-48 object-cover mb-2">
                    @endif
                    <h3 class="text-gray-800 font-bold">{{ $product->name }}</h3>
                    <div class='flex gap-1'>
                        <p class="font-bold" style="color: rgb(20 184 166);">{{ number_format($product->price, 0, ',', '.') }} </p>
                        <p>VNĐ</p>
                    </div>
                    <p class="text-sm text-gray-600">{{ $product->description }}</p>
                    <button class="mt-2 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded add-to-cart" data-product-id="{{ $product->id }}">Thêm vào giỏ</button>
                </div>
                @endforeach
            </div>
        </div>
        <!-- End Product List -->
    </div>
</div>
@endsection

@section('scripts')
@parent
<script>
    var slider = document.getElementById("priceRange");
    var output = document.getElementById("priceValue");
    var priceButtons = document.querySelectorAll('.price-btn');

    function formatCurrency(value) {
        return new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }).format(value).replace('₫', 'VNĐ');
    }

    output.innerHTML = formatCurrency(slider.value);

    slider.oninput = function() {
        output.innerHTML = formatCurrency(this.value);
    }

    priceButtons.forEach(button => {
        button.addEventListener('click', function() {
            var price = this.getAttribute('data-price');
            slider.value = price;
            output.innerHTML = formatCurrency(price);
        });
    });

    function updateCartStorage(productId, name, price) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let found = cart.find(p => p.id === productId);
        if (found) {
            found.quantity += 1; // Increase quantity if product exists
        } else {
            cart.push({id: productId, name: name, price: price, quantity: 1});
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        renderCartItems(); // Render cart items whenever updated
    }

    function renderCartItems() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const cartList = $('.dropdown-cart ul');
        cartList.empty(); // Clear current list
        cart.forEach(item => {
            const cartItem = `<li class="flex justify-between items-center p-2 hover:bg-gray-100">
                <div>${item.name}</div>
                <div class="flex items-center gap-2">
                    <input type="number" class="quantity-input-cart w-12 text-center border-gray-300 rounded-md" data-product-id="${item.id}" value="${item.quantity}">
                    <span>${formatCurrency(item.price * item.quantity)}</span>
                    <button class="remove-from-cart px-3 py-1 text-red-500 border border-red-500 hover:bg-red-500 hover:text-white rounded" data-product-id="${item.id}">Xóa</button>
                </div>
            </li>`;
            cartList.append(cartItem);
        });
    }

    // Update the quantity in the cart storage
    function updateQuantityInCart(productId, newQuantity) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let found = cart.find(item => item.id == productId);
        if (found) {
            found.quantity = newQuantity; // Update the quantity
        } else {
            // Optionally handle the case where the product does not exist in the cart
            console.error('Product not found in cart:', productId);
        }
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    function removeFromCart(productId) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart = cart.filter(item => item.id != productId);
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    $(document).ready(function(){
        $('.add-to-cart').click(function(){
            const productId = $(this).data('product-id');
            const productName = $(this).closest('.bg-white').find('h3').text();
            const productPrice = parseInt($(this).closest('.bg-white').find('.price-display').attr('data-base-price'));
            const quantity = parseInt($(this).siblings('.quantity-input').val());
            updateCartStorage(productId, productName, productPrice, quantity);
        });

        $(document).on('blur', '.quantity-input-cart', function() {
            const productId = $(this).data('product-id');
            let newQuantity = parseInt($(this).val()) || 1; // Sử dụng giá trị mặc định là 1 nếu không nhập hoặc nhập sai
            if (newQuantity <= 0) {
                newQuantity = 1; // Nếu giá trị nhập vào nhỏ hơn hoặc bằng 0, đặt lại là 1
                $(this).val(newQuantity); // Cập nhật lại giá trị trong input field
            }
            updateQuantityInCart(productId, newQuantity);
            renderCartItems();
        });

        $(document).on('click', '.remove-from-cart', function() {
            const productId = $(this).data('product-id');
            removeFromCart(productId);
            renderCartItems();
        });

        renderCartItems();
    });
</script>
@endsection
