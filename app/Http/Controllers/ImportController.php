<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Import;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\ImportStatus;
use Illuminate\Support\Facades\Auth;
use App\Models\ImportDetail;

class ImportController extends Controller
{
    public function index()
    {
        $imports = Import::all();
        return view('imports.index', compact('imports'));
    }

    public function create()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        $importStatuses = ImportStatus::all();
        return view('imports.create', compact('products', 'suppliers', 'importStatuses'));
    }

    public function store(Request $request)
{
    // Kiểm tra người dùng hiện tại có đăng nhập hay không
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'You must be logged in to perform this action.');
    }

    // Lấy id của người dùng hiện tại
    $userId = Auth::id();

    // Validate dữ liệu yêu cầu
    $request->validate([
        'supplier_id' => 'required|exists:suppliers,id',
        'import_status_id' => 'required|exists:import_statuses,id',
        'product_id.*' => 'required|exists:products,id',
        'quantity.*' => 'required|integer|min:1',
        'unit_price.*' => 'required|numeric|min:0',
    ]);

    // Xây dựng mảng details từ các mảng product_id, quantity và unit_price
    $details = [];
    $totalAmount = 0; // Khởi tạo total amount
    foreach ($request->product_id as $index => $productId) {
        if ($request->quantity[$index] !== null && $request->unit_price[$index] !== null) {
            $quantity = $request->quantity[$index];
            $unitPrice = $request->unit_price[$index];
            $details[] = [
                'product_id' => $productId,
                'quantity' => $quantity,
                'unit_price' => $unitPrice,
            ];
            $totalAmount += $quantity * $unitPrice; // Tính toán total amount
        }
    }

    // Tạo bản ghi import mới và lưu total amount
    $import = Import::create([
        'user_id' => $userId,
        'supplier_id' => $request->supplier_id,
        'import_status_id' => $request->import_status_id,
        'total_amount' => $totalAmount, // Lưu total amount vào cột total_amount
    ]);

    // Tạo các chi tiết của import
    foreach ($details as $detail) {
        ImportDetail::create([
            'import_id' => $import->id,
            'product_id' => $detail['product_id'],
            'quantity' => $detail['quantity'],
            'unit_price' => $detail['unit_price'],
        ]);
    }

    // Chuyển hướng với thông báo thành công
    return redirect()->route('imports.index')->with('success', 'Import created successfully.');
}


    public function show($id)
    {
        $import = Import::with('details.product')->findOrFail($id);
        return view('imports.show', compact('import'));
    }

    public function edit($id)
    {
        $import = Import::with('details.product')->findOrFail($id);
        $products = Product::all();
        $suppliers = Supplier::all();
        $importStatuses = ImportStatus::all();
        return view('imports.edit', compact('import', 'products', 'suppliers', 'importStatuses'));
    }

    public function update(Request $request, $id)
    {
        // Validate request data
        $request->validate([
            'status' => 'required|in:pending,processing,completed,canceled',
        ]);

        // Update import status
        $import = Import::findOrFail($id);
        $import->update(['status' => $request->status]);

        return redirect()->route('imports.index')->with('success', 'Import status updated successfully.');
    }


    public function destroy($id)
    {
        // Delete import
        Import::findOrFail($id)->delete();

        return redirect()->route('imports.index')->with('success', 'Import deleted successfully.');
    }
}
