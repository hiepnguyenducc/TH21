<?php

namespace App\Livewire\Users\Product;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\CategoryProduct;

class Index extends Component
{
    public function addToWishList($productId)
    {
       if (Auth::check()) {
           if (Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists()){
               session()->flash('message', 'Already added to wishlist');
               return false;
           }else{
              Wishlist::create([
                   'user_id'=>auth()->user()->id,
                   'product_id'=>$productId,
               ]);
               session()->flash('message', 'Wishlist added successfully');
           }

       }else{
           session()->flash('message', 'You are not logged in');
           return false;
       }

    }
    public function render()
    {
        $products = Product::paginate(12);
        $categories = CategoryProduct::all();

        return view('livewire.users.product.index',compact('products', 'categories'));
    }
}
