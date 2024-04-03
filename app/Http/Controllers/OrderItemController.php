<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;

class OrderItemController extends Controller
{
    public function index()
    {
        $orderItems = OrderItem::all();
        return view('order_items.index', compact('orderItems'));
    }

    public function create()
    {
        // Trả về view để tạo order item mới
        return view('order_items.create');
    }

    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào từ form
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        // Lưu order item mới vào cơ sở dữ liệu
        OrderItem::create($request->all());

        // Chuyển hướng về trang danh sách order items sau khi tạo mới thành công
        return redirect()->route('order_items.index')->with('success', 'Order item đã được tạo mới thành công.');
    }

    public function show($id)
    {
        // Hiển thị thông tin chi tiết của order item
        $orderItem = OrderItem::findOrFail($id);
        return view('order_items.show', compact('orderItem'));
    }

    public function edit($id)
    {
        // Trả về view để chỉnh sửa order item
        $orderItem = OrderItem::findOrFail($id);
        return view('order_items.edit', compact('orderItem'));
    }

    public function update(Request $request, $id)
    {
        // Validate dữ liệu đầu vào từ form
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        // Cập nhật thông tin của order item trong cơ sở dữ liệu
        OrderItem::findOrFail($id)->update($request->all());

        // Chuyển hướng về trang chi tiết order item sau khi cập nhật thành công
        return redirect()->route('order_items.show', $id)->with('success', 'Thông tin order item đã được cập nhật thành công.');
    }
}
