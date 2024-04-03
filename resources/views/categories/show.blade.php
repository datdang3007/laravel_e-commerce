@extends('layouts.layout')

@section('title', 'Thông tin Danh mục')

@section('content')
<div class="flex justify-center">
    <div class="w-full">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="px-4 py-3 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Thông tin Danh mục</h2>
            </div>
            <div class="p-4">
                <div class="mb-4">
                    <p class="text-gray-700 text-sm font-bold mb-2">Tên:</p>
                    <p class="text-gray-900">{{ $category->name }}</p>
                </div>
                <div class="mb-4">
                    <p class="text-gray-700 text-sm font-bold mb-2">Mô tả:</p>
                    <p class="text-gray-900">{{ $category->description }}</p>
                </div>
                <div class="mb-4">
                    <a href="{{ route('categories.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">Đóng</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
