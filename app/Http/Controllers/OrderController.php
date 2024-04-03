<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::withCount('orderItems')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_amount' => 'required|numeric',
            'status' => 'required|in:pending,confirmed,shipped,delivered'
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Đơn hàng được tạo thành công.');
    }

    public function show($id)
    {
        $order = Order::with('orderItems')->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,shipped,delivered'
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Trạng thái đơn hàng được cập nhật thành công.');
    }
}
