<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class SearchProductController extends Controller
{
    public function index(Request $request)
{
    $query = Product::query();

    // Lọc theo từ khóa tìm kiếm
    $searchTerm = $request->input('search');
    if ($searchTerm) {
        $query->where('name', 'LIKE', '%' . $searchTerm . '%');
    }

    // Lọc theo khoảng giá
    $priceRange = $request->input('regular_price');
    if ($priceRange) {
        [$minPrice, $maxPrice] = explode('-', $priceRange);
        $query->whereBetween('regular_price', [$minPrice, $maxPrice]);
    }

    $products = $query->paginate(10);

    return view('users.product', compact('products'));
}
}
