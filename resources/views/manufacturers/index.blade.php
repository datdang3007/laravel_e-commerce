@extends('layouts.layout_admin')

@section('title', 'Danh sách Nhà Sản Xuất')

@section('content')
    <div class="flex justify-center">
        <div class="w-full">
            <div class="bg-white rounded-lg shadow-lg">
                <div class="px-4 py-3 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800">Danh sách Nhà Sản Xuất</h2>
                </div>
                <div class="p-4">
                    <div class="mb-4">
                        <a href="{{ route('manufacturers.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Tạo mới</a>
                    </div>
                    <table class="w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 bg-gray-200 border border-gray-300">Tên</th>
                                <th class="py-2 px-4 bg-gray-200 border border-gray-300">Địa chỉ</th>
                                <th class="py-2 px-4 bg-gray-200 border border-gray-300">Website</th>
                                <th class="py-2 px-4 bg-gray-200 border border-gray-300">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($manufacturers as $manufacturer)
                                <tr>
                                    <td class="w-2/12 py-2 px-4 border border-gray-300">{{ $manufacturer->name }}</td>
                                    <td class="w-4/12 py-2 px-4 border border-gray-300">{{ $manufacturer->address }}</td>
                                    <td class="w-3/12 py-2 px-4 border border-gray-300"><a href="{{ $manufacturer->website }}" class="text-blue-500" target="_blank">{{ $manufacturer->website }}</a></td>
                                    <td class="w-2/12 py-2 px-4 border border-gray-300">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('manufacturers.show', $manufacturer->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-md">Chi tiết</a>
                                            <a href="{{ route('manufacturers.edit', $manufacturer->id) }}" class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-md">Sửa</a>
                                            <form action="{{ route('manufacturers.destroy', $manufacturer->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded-md" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button>
                                            </form>
                                        </div>
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