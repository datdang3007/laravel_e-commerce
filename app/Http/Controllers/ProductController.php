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
            'unit' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'manufacturer_id' => 'required|exists:manufacturers,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Chỉ cho phép các định dạng hình ảnh và dung lượng tối đa là 2MB
        ]);

        // Kiểm tra xem người dùng đã tải lên hình ảnh hay không
        if ($request->hasFile('image')) {
            // Lưu trữ hình ảnh mới vào thư mục lưu trữ
            $imagePath = $request->file('image')->store('public/images');

            // Lấy tên tệp hình ảnh
            $imageName = basename($imagePath);

            // Tạo sản phẩm mới trong cơ sở dữ liệu với thông tin từ dữ liệu form và tên hình ảnh
            Product::create(array_merge($request->except('image'), ['image' => $imageName]));
        } else {
            // Trường hợp người dùng không tải lên hình ảnh, tạo sản phẩm mới chỉ với thông tin từ dữ liệu form
            Product::create($request->all());
        }

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
            'unit' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'manufacturer_id' => 'required|exists:manufacturers,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Chỉ cho phép các định dạng hình ảnh và dung lượng tối đa là 2MB
        ]);

        // Lấy thông tin sản phẩm cần cập nhật từ cơ sở dữ liệu
        $product = Product::findOrFail($id);

        // Cập nhật thông tin sản phẩm từ dữ liệu form
        $product->update($request->except('image')); // Loại bỏ trường image khỏi dữ liệu cập nhật


        // Kiểm tra xem người dùng đã tải lên hình ảnh mới hay không
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                // Lưu trữ hình ảnh mới vào thư mục lưu trữ
                $imagePath = $file->store('public/images');
        
                // Lấy tên tệp hình ảnh
                $imageName = basename($imagePath);
        
                // Cập nhật tên hình ảnh vào cơ sở dữ liệu
                $product->update(['image' => $imageName]);
            } else {
                // Xử lý trường hợp file không hợp lệ
                return redirect()->back()->with('error', 'Hình ảnh không hợp lệ.');
            }
        }

        // Chuyển hướng về trang chi tiết sản phẩm sau khi cập nhật thành công
        return redirect()->route('products.index')->with('success', 'Thông tin sản phẩm đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        // Xóa sản phẩm khỏi cơ sở dữ liệu
        Product::findOrFail($id)->delete();

        // Chuyển hướng về trang danh sách sản phẩm sau khi xóa thành công
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được xóa thành công.');
    }
}
