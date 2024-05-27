<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
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

    // public function addToCart(Request $request,$id){

    //     $products = Product::find($id);

    //     $amount = $request->input('amount');
    //     dd($amount);

    //     $dataProduct = Cart::search(function ($cartItem, $rowId) use ($id) {
    //         return $cartItem->id_product == $id;
    //     });

    //     if($dataProduct->isNotEmpty())
    //     {
    //          // Lấy rowId của sản phẩm
    //          $rowId = $dataProduct->first()->rowId;
    //           // Lấy số lượng hiện tại của sản phẩm trong giỏ hàng
    //         $currentQty = Cart::get($rowId)->qty;

    //          // Cập nhật số lượng của sản phẩm bằng tổng của số lượng hiện tại và số lượng mới
    //          Cart::update($rowId, $currentQty + $amount);
    //     }
    //     else{
    //         $options = [
    //             'image' => $products->image
    //         ];
    //         ///
    //         Cart::add([
    //             'id' =>$products->id_product,
    //             'name' => $products->name,
    //             'qty' => $amount,
    //             'price' => $products->price,
    //             'options' => $options,
    //         ]);

    //         // return redirect()->route('detailproduct')->with('status',"Bạn đã thêm thành công");
    //         return redirect('https://www.youtube.com/watch?v=zEWSSod0zTY&list=RDzEWSSod0zTY&start_radio=1')->with('status',"Bạn đã thêm thành công");

    //     }

    // }
    public function addToCart(Request $request, $id) {
        $products = Product::find($id);

        $amount = $request->input('amount');
        // dd($amount);  // Kiểm tra giá trị số lượng nhận được từ form

        $dataProduct = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id_product == $id;
        });

        if ($dataProduct->isNotEmpty()) {
            // Lấy rowId của sản phẩm
            $rowId = $dataProduct->first()->rowId;
            // Lấy số lượng hiện tại của sản phẩm trong giỏ hàng
            $currentQty = Cart::get($rowId)->qty;
            // Cập nhật số lượng của sản phẩm bằng tổng của số lượng hiện tại và số lượng mới
            Cart::update($rowId, $currentQty + $amount);
        } else {
            $options = [
                'image' => $products->image
            ];
            Cart::add([
                'id' => $products->id_product,
                'name' => $products->name,
                'qty' => $amount,
                'price' => $products->price,
                'options' => $options,
            ]);
            return redirect()->route('showindexcart')->with('status', "Bạn đã thêm thành công");
        }

        return redirect()->back()->with('status', "Bạn chưa thêm thành công");

    }

    // public function addToCart($id)
    // {
    //     Cart::add(
    //         $id, "Product", 12,2000
    //     );
    //     return Cart::content();
    // }


}
