<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class IndexShoppingController extends Controller
{
    // show giao diện trang chủ 

    public function showIndexShopping()
    {
        $category = Category::all();
        return view('shopping.pages.home.index',compact('category'));
    }
    // public function showIndexShopping()
    // {
    //     $category = Category::all();
    //     return view('shopping.pages.home.index', compact('category'));
    // }

    ///show sản phẩm

    public function showIndexDataProduct()
    {
       $products = Product::paginate(10);
       $category = Category::all();
        return view('shopping.index',compact('products','category'));
    }


    //show sản phẩm chi tiết

    public function showDetailProducts($id)
    {
        $productdetail = Product::find($id);
         //tạo mảng lưu dưới dạng chuỗi
         $listImages = json_decode($productdetail->list_images, true);
         $category = Category::all();
         return view('shopping.detailproduct',compact('productdetail','listImages','category'));
    }
}
