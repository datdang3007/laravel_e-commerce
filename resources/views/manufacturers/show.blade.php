@extends('layouts.layout_admin')

@section('title', 'Danh sách Nhà Sản Xuất')

@section('content')
<div class="flex justify-center">
    <div class="w-full">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="px-4 py-3 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Thông tin Nhà Sản Xuất</h2>
            </div>
            <div class="p-4">
                <div class="mb-4">
                    <p class="text-gray-700 text-sm font-bold mb-2">Tên:</p>
                    <p class="text-gray-900">{{ $manufacturer->name }}</p>
                </div>
                <div class="mb-4">
                    <p class="text-gray-700 text-sm font-bold mb-2">Địa chỉ:</p>
                    <p class="text-gray-900">{{ $manufacturer->address }}</p>
                </div>
                <div class="mb-4">
                    <p class="text-gray-700 text-sm font-bold mb-2">Website:</p>
                    <p class="text-blue-500"><a href="{{ $manufacturer->website }}" target="_blank">{{ $manufacturer->website }}</a></p>
                </div>
                <div class="mb-4">
                    <a href="{{ route('manufacturers.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">Đóng</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection