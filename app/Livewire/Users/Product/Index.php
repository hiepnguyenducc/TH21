<?php

namespace App\Livewire\Users\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $products = Product::paginate(12);
        return view('livewire.users.product.index',compact('products'))->extends('layouts.app')
            ->section('content');
    }
}
