<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        $account = Auth::user();
        return view('home.index', compact('categories', 'products', 'account'));
    }
}
