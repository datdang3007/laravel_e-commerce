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
                    <button class="mt-2 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Thêm vào giỏ</button>
                </div>
                @endforeach
            </div>
        </div>
        <!-- End Product List -->
    </div>
</div>
@endsection