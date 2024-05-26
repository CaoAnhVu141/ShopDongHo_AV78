<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShowDataAllProduct extends Controller
{
    //
    public function showDataAllProduct() // Thay đổi tên hành động thành showDataAllProduct
    {
        $category = Category::all();
        $product = Product::paginate(10);
        return view('shopping.showallproduct',compact('category','product'));
    }
}
