<?php

namespace App\Livewire\Users\Product;

use App\Models\Product;
use Livewire\Component;
use App\Models\CategoryProduct;

class Index extends Component
{
    public function render()
    {
        $products = Product::paginate(12);
        $categories = CategoryProduct::all();

        return view('livewire.users.product.index',compact('products', 'categories'));
    }
}
