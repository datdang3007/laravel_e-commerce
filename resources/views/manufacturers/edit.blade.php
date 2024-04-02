@extends('layouts.layout')

@section('title', 'Danh sách Nhà Sản Xuất')

@section('content')
<div class="flex justify-center">
    <div class="w-full">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="px-4 py-3 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Chỉnh Sửa Nhà Sản Xuất</h2>
            </div>
            <div class="p-4">
                <form action="{{ route('manufacturers.update', $manufacturer->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Tên</label>
                        <input type="text" name="name" id="name" value="{{ $manufacturer->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Địa chỉ</label>
                        <input type="text" name="address" id="address" value="{{ $manufacturer->address }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="website" class="block text-gray-700 text-sm font-bold mb-2">Website</label>
                        <input type="text" name="website" id="website" value="{{ $manufacturer->website }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Lưu</button>
                        <a href="{{ route('manufacturers.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection