<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductImage;

class User_Product_detail extends Controller
{
    public function index(int $product_id)
    {
        
        $product = Product::find($product_id);
        
        return view('users.product_detail', compact('product'));    
    }
}
