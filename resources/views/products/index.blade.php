@extends('layouts.layout_admin')

@section('title', 'Danh sách Sản phẩm')

@section('content')
<div class="flex justify-center">
    <div class="w-full">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="px-4 py-3 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Danh sách Sản phẩm</h2>
            </div>
            <div class="p-4">
                <div class="mb-4">
                    <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Tạo Mới</a>
                </div>
                <table class="w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">Tên</th>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">Mô tả</th>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">Danh mục sản phẩm</th>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">Đơn vị</th>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">Giá</th>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">Số lượng tồn kho</th>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td class="py-2 px-4 border border-gray-300">{{ $product->name }}</td>
                            <td class="py-2 px-4 border border-gray-300">{{ $product->description }}</td>
                            <td class="py-2 px-4 border border-gray-300">{{ $product->category->name }}</td>
                            <td class="py-2 px-4 border border-gray-300">{{ $product->unit }}</td>
                            <td class="py-2 px-4 border border-gray-300">{{ number_format($product->price, 2) }}</td>
                            <td class="py-2 px-4 border border-gray-300">{{ $product->stock_quantity }}</td>
                            <td class="py-2 px-4 border border-gray-300">
                                <a href="{{ route('products.show', $product->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-md">Xem</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-md">Chỉnh Sửa</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded-md" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
