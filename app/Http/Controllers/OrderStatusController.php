<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderStatus;

class OrderStatusController extends Controller
{
    public function index()
    {
        $orderStatuses = OrderStatus::all();
        return view('order_statuses.index', compact('orderStatuses'));
    }

    public function create()
    {
        return view('order_statuses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:order_statuses,name',
        ]);

        OrderStatus::create($request->all());

        return redirect()->route('order_statuses.index')->with('success', 'Order status created successfully.');
    }

    public function show($id)
    {
        $orderStatus = OrderStatus::findOrFail($id);
        return view('order_statuses.show', compact('orderStatus'));
    }

    public function edit($id)
    {
        $orderStatus = OrderStatus::findOrFail($id);
        return view('order_statuses.edit', compact('orderStatus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:order_statuses,name,' . $id,
        ]);

        OrderStatus::findOrFail($id)->update($request->all());

        return redirect()->route('order_statuses.index')->with('success', 'Order status updated successfully.');
    }

    public function destroy($id)
    {
        OrderStatus::findOrFail($id)->delete();

        return redirect()->route('order_statuses.index')->with('success', 'Order status deleted successfully.');
    }
}
