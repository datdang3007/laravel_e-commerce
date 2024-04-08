@extends('layouts.layout_admin')

@section('title', 'Danh sách Nhập hàng')

@section('content')
<div class="flex justify-center">
    <div class="w-full">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="px-4 py-3 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Danh sách Nhập hàng</h2>
            </div>
            <div class="p-4">
                <div class="mb-4">
                    <a href="{{ route('imports.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Tạo Mới</a>
                </div>
                <table class="w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">Mã Nhập hàng</th>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">Nhà cung cấp</th>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">Ngày Nhập hàng</th>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">Trạng thái</th>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($imports as $import)
                        <tr>
                            <td class="py-2 px-4 border border-gray-300">{{ $import->id }}</td>
                            <td class="py-2 px-4 border border-gray-300">{{ $import->supplier->name }}</td>
                            <td class="py-2 px-4 border border-gray-300">{{ $import->created_at->format('d/m/Y') }}</td>
                            <td class="py-2 px-4 border border-gray-300">{{ $import->status }}</td>
                            <td class="py-2 px-4 border border-gray-300">
                                <a href="{{ route('imports.show', $import->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-md">Xem chi tiết</a>
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
