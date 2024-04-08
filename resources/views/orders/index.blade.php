@extends('layouts.layout_admin')

@section('title', 'Danh sách Đơn hàng')

@section('content')
<div class="flex justify-center">
    <div class="w-full">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="px-4 py-3 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Danh sách Đơn hàng</h2>
            </div>
            <div class="p-4">
                <table class="w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">ID</th>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">Người đặt hàng</th>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">Tổng số tiền</th>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">Số lượng sản phẩm</th>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">Trạng thái</th>
                            <th class="py-2 px-4 bg-gray-200 border border-gray-300">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td class="py-2 px-4 border border-gray-300">{{ $order->id }}</td>
                            <td class="py-2 px-4 border border-gray-300">{{ $order->user->name }}</td>
                            <td class="py-2 px-4 border border-gray-300">{{ $order->total_amount }}</td>
                            <td class="py-2 px-4 border border-gray-300">{{ $order->order_items_count }}</td>
                            <td class="py-2 px-4 border border-gray-300">{{ $order->status }}</td>
                            <td class="py-2 px-4 border border-gray-300">
                                <a href="{{ route('orders.show', $order->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-md">Xem chi tiết</a>
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
