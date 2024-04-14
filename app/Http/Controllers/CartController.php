<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    // Hiển thị giỏ hàng
    public function index()
    {
        // Lấy thông tin giỏ hàng từ database hoặc session (tùy thuộc vào cách bạn lưu trữ giỏ hàng)
        $cartItems = Cart::all(); // Đây là một ví dụ, bạn có thể điều chỉnh để lấy thông tin giỏ hàng của người dùng hiện tại

        // Trả về view hiển thị giỏ hàng với các sản phẩm
        return view('cart.index', compact('cartItems'));
    }

    // Thêm sản phẩm vào giỏ hàng
    public function add(Request $request)
{
    // Lấy thông tin sản phẩm và số lượng từ request
    $productId = $request->input('product_id');
    $quantity = $request->input('quantity');

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
    $existingCartItem = Cart::where('product_id', $productId)->first();

    if ($existingCartItem) {
        // Nếu sản phẩm đã tồn tại, tăng số lượng
        $existingCartItem->quantity += $quantity;
        $existingCartItem->save();
    } else {
        // Nếu sản phẩm chưa tồn tại, tạo mới
        Cart::create([
            'product_id' => $productId,
            'quantity' => $quantity
            // Các trường khác nếu cần thiết
        ]);
    }

    // Chuyển hướng hoặc trả về JSON response tùy thuộc vào yêu cầu
}

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function update(Request $request)
{
    // Lấy thông tin sản phẩm và số lượng từ request
    $productId = $request->input('product_id');
    $quantity = $request->input('quantity');

    // Tìm thông tin sản phẩm trong giỏ hàng
    $cartItem = Cart::where('product_id', $productId)->first();

    if ($cartItem) {
        // Cập nhật số lượng sản phẩm
        $cartItem->quantity = $quantity;
        $cartItem->save();
    }

    // Chuyển hướng hoặc trả về JSON response tùy thuộc vào yêu cầu
}


    // Xóa sản phẩm khỏi giỏ hàng
    public function remove(Request $request)
    {
        // Xử lý xóa sản phẩm khỏi giỏ hàng ở đây
    }
}
