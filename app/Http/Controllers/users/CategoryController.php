<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;

class CategoryController extends Controller
{
    public function index()
    {
      $categories  = CategoryProduct::where('status','0')->get();

        return view("users.product", compact('categories'));
     
    }
}
