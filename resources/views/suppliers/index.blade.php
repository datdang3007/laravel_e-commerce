@extends('layouts.layout_admin')

@section('title', 'Danh sách Nhà cung cấp')

@section('content')
<div class="flex justify-center">
    <div class="w-full">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="px-4 py-3 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Danh sách Nhà cung cấp</h2>
            </div>
            <div class="p-4">
                <div class="mb-4">
                    <a href="{{ route('suppliers.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Tạo mới</a>
                </div>
                <table class="w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">ID</th>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">Tên</th>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">Email</th>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">Địa chỉ</th>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">Số điện thoại</th>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $supplier)
                        <tr>
                            <td class="py-2 px-4 border border-gray-300">{{ $supplier->id }}</td>
                            <td class="py-2 px-4 border border-gray-300">{{ $supplier->name }}</td>
                            <td class="py-2 px-4 border border-gray-300">{{ $supplier->email }}</td>
                            <td class="py-2 px-4 border border-gray-300">{{ $supplier->address }}</td>
                            <td class="py-2 px-4 border border-gray-300">{{ $supplier->phone }}</td>
                            <td class="py-2 px-4 border border-gray-300">
                                <a href="{{ route('suppliers.show', $supplier->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-md">Xem</a>
                                <a href="{{ route('suppliers.edit', $supplier->id) }}" class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-md">Chỉnh sửa</a>
                                <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded-md" onclick="return confirm('Bạn có chắc chắn muốn xóa nhà cung cấp này?')">Xóa</button>
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
