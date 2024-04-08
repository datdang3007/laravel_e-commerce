@extends('layouts.layout_admin')

@section('title', 'Thông tin Nhà Cung Cấp')

@section('content')
<div class="flex justify-center">
    <div class="w-full">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="px-4 py-3 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Thông tin Nhà Cung Cấp</h2>
            </div>
            <div class="p-4">
                <div class="mb-4">
                    <p class="block text-gray-700 text-sm font-bold mb-2">Tên:</p>
                    <p>{{ $supplier->name }}</p>
                </div>
                <div class="mb-4">
                    <p class="block text-gray-700 text-sm font-bold mb-2">Email:</p>
                    <p>{{ $supplier->email }}</p>
                </div>
                <div class="mb-4">
                    <p class="block text-gray-700 text-sm font-bold mb-2">Địa chỉ:</p>
                    <p>{{ $supplier->address }}</p>
                </div>
                <div class="mb-4">
                    <p class="block text-gray-700 text-sm font-bold mb-2">Số điện thoại:</p>
                    <p>{{ $supplier->phone }}</p>
                </div>
                <div class="mb-4">
                    <a href="{{ route('suppliers.edit', $supplier->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Chỉnh sửa</a>
                    <a href="{{ route('suppliers.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
