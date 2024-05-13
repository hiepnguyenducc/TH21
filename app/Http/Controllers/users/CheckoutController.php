<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class CheckoutController extends Controller
{
    public function index()
    {
        $products = Product::paginate(12);
        
        return view("users.checkout", compact('products'));
    }
}
