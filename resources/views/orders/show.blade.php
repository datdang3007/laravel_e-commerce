@extends('layouts.layout_admin')

@section('title', 'Chi tiết Đơn hàng')

@section('content')
<div class="flex justify-center">
    <div class="w-full">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="flex items-center gap-x-4 px-4 py-3 border-b border-gray-200">
                <a href="{{ route('orders.index') }}" class="text-blue-500">
                    <button class="w-6 h-6 flex items-center justify-center bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-full">
                        <i class="fa-solid fa-arrow-left text-xs"></i>
                    </button>
                </a>
                <h2 class="text-lg font-semibold text-gray-800">Chi tiết Đơn hàng #{{ $order->id }}</h2>
            </div>
            <div class="p-4">
                <div class="mb-4">
                    <p><span class="font-semibold">Người đặt hàng:</span> {{ $order->user->name }}</p>
                    <p><span class="font-semibold">Tổng số tiền:</span> {{ $order->total_amount }}</p>
                    <p><span class="font-semibold">Trạng thái:</span>
                        <form action="{{ route('orders.update', $order->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <select name="status" id="status" class="border rounded-md px-3 py-1">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                                <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Đã xác nhận</option>
                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Đã giao hàng</option>
                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Đã nhận hàng</option>
                            </select>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-md">Lưu</button>
                        </form>
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-2">Danh sách sản phẩm</h3>
                    <table class="w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 bg-gray-200 border border-gray-300">Tên sản phẩm</th>
                                <th class="py-2 px-4 bg-gray-200 border border-gray-300">Số lượng</th>
                                <th class="py-2 px-4 bg-gray-200 border border-gray-300">Đơn giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $item)
                            <tr>
                                <td class="py-2 px-4 border border-gray-300">{{ $item->product->name }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $item->quantity }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $item->price }}</td>
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
