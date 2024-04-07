@extends('layouts.layout')

@section('title', 'Chi Tiết Nhập hàng')

@section('content')
<div class="flex justify-center">
    <div class="w-full">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="px-4 py-3 border-b border-gray-200">
                <div class="flex items-center gap-x-4">
                    <a href="{{ route('imports.index') }}" class="text-blue-500">
                        <button class="w-6 h-6 flex items-center justify-center bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-full">
                            <i class="fa-solid fa-arrow-left text-xs"></i>
                        </button>
                    </a>
                    <h2 class="text-lg font-semibold text-gray-800">Chi Tiết Nhập hàng #{{ $import->id }}</h2>
                </div>
            </div>
            <div class="p-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nhà cung cấp:</label>
                    <p class="text-gray-800">{{ $import->supplier->name }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Trạng thái:</label>
                    <form action="{{ route('imports.update', $import->id) }}" method="POST" class="inline">
                        @csrf
                        @method('PUT')
                        <select name="status" id="status" class="border rounded-md px-3 py-1">
                            <option value="pending" {{ $import->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                            <option value="processing" {{ $import->status == 'processing' ? 'selected' : '' }}>Đang xử lý</option>
                            <option value="completed" {{ $import->status == 'completed' ? 'selected' : '' }}>Đã hoàn thành</option>
                            <option value="canceled" {{ $import->status == 'canceled' ? 'selected' : '' }}>Đã hủy</option>
                        </select>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-md">Lưu</button>
                    </form>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Chi tiết nhập hàng:</label>
                    <table class="w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 bg-gray-200 border border-gray-300">Sản phẩm</th>
                                <th class="py-2 px-4 bg-gray-200 border border-gray-300">Số lượng</th>
                                <th class="py-2 px-4 bg-gray-200 border border-gray-300">Đơn giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($import->details as $detail)
                            <tr>
                                <td class="py-2 px-4 border border-gray-300">{{ $detail->product->name }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $detail->quantity }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $detail->unit_price }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
