<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Manufacturer;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        return view('products.create', compact('categories', 'manufacturers'));
    }

    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào từ form
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'unit' => 'required',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'manufacturer_id' => 'required|exists:manufacturers,id',
        ]);

        // Tạo sản phẩm mới trong cơ sở dữ liệu
        Product::create($request->all());

        // Chuyển hướng về trang danh sách sản phẩm sau khi tạo mới thành công
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được tạo mới thành công.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        return view('products.edit', compact('product', 'categories', 'manufacturers'));
    }

    public function update(Request $request, $id)
    {
        // Validate dữ liệu đầu vào từ form
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'unit' => 'required',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'manufacturer_id' => 'required|exists:manufacturers,id',
        ]);

        // Cập nhật thông tin sản phẩm trong cơ sở dữ liệu
        Product::findOrFail($id)->update($request->all());

        // Chuyển hướng về trang chi tiết sản phẩm sau khi cập nhật thành công
        return redirect()->route('products.show', $id)->with('success', 'Thông tin sản phẩm đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        // Xóa sản phẩm khỏi cơ sở dữ liệu
        Product::findOrFail($id)->delete();

        // Chuyển hướng về trang danh sách sản phẩm sau khi xóa thành công
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được xóa thành công.');
    }
}
