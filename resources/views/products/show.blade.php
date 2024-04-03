@extends('layouts.layout')

@section('title', 'Thông Tin Sản Phẩm')

@section('content')
<div class="flex justify-center">
    <div class="w-full">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="px-4 py-3 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Thông Tin Sản Phẩm</h2>
            </div>
            <div class="p-4">
                <div class="mb-4">
                    <p><span class="font-bold">Tên:</span> {{ $product->name }}</p>
                </div>
                <div class="mb-4">
                    <p><span class="font-bold">Mô tả:</span> {{ $product->description }}</p>
                </div>
                <div class="mb-4">
                    <p><span class="font-bold">Đơn vị:</span> {{ $product->unit }}</p>
                </div>
                <div class="mb-4">
                    <p><span class="font-bold">Giá:</span> {{ $product->price }}</p>
                </div>
                <div class="mb-4">
                    <p><span class="font-bold">Số lượng tồn kho:</span> {{ $product->stock_quantity }}</p>
                </div>
                <div class="mb-4">
                    <p><span class="font-bold">Danh mục:</span> {{ $product->category->name }}</p>
                </div>
                <div class="mb-4">
                    <p><span class="font-bold">Nhà sản xuất:</span> {{ $product->manufacturer->name }}</p>
                </div>
                <div class="mb-4">
                    <p><span class="font-bold">Ngày sản xuất:</span> {{ $product->production_date }}</p>
                </div>
                <div class="mb-4">
                    <p><span class="font-bold">Nơi sản xuất:</span> {{ $product->production_location }}</p>
                </div>
                <div class="mb-4">
                    <a href="{{ route('products.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
