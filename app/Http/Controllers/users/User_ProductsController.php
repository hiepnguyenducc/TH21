<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class User_ProductsController extends Controller
{
    public function index()
    {
        return view('users.product');
    }
}
