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
        return view('shopping.pages.home.index', compact('category'));
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
        return view('shopping.index', compact('products', 'category'));
    }

    // load more

    public function loadMoreDataProduct(Request $request)
    {
        $page = $request->get('page', 2); // Mặc định trang tiếp theo là trang 2 nếu không có giá trị được truyền vào
        $products = Product::paginate(10, ['*'], 'page', $page); // Lấy thêm 10 sản phẩm cho trang tiếp theo
        $category = Category::all();
        return view('shopping.loadmore', compact('products','category'));
    // return response()->json(['html' => $view]);
    // return "Ok1";
    }
    // public function loadMoreDataProduct(Request $request)
    // {
    //     $page = $request->get('page', 2);
    //     $products = Product::paginate(2, ['*'], 'page', $page);

    //     if ($products->isEmpty()) {
    //         return response()->json(['html' => '']);
    //     }

    //     $view = view('shopping.loadmore', compact('products'))->render();
    //     return response()->json(['html' => $view]);
    // }


    //show sản phẩm chi tiết

    public function showDetailProducts($id)
    {
        $productdetail = Product::find($id);
        //tạo mảng lưu dưới dạng chuỗi
        $listImages = json_decode($productdetail->list_images, true);
        $category = Category::all();
        return view('shopping.detailproduct', compact('productdetail', 'listImages', 'category'));
    }
}
