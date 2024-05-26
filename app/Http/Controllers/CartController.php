<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class CartController extends Controller
{
    //

    public function showIndexCart()
    {
        $category = Category::all();
        return view('shopping.cart',compact('category'));
    }

    ///thêm vào giỏ hàng

    public function addToCart(Request $request,$id){

        $products = Product::find($id);


    }

}
