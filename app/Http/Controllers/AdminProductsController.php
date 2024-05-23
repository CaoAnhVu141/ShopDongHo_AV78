<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\TradeMark;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminProductsController extends Controller
{
    //
    //show giao diện sản phẩm

    public function showProducts()
    {
        $product = Product::paginate(10);
        return view('admin.product.index', compact('product'));
    }
    // public function showProducts()
    // {
    //     // Sử dụng with để nạp trước quan hệ 'category'
    //     $product = Product::with('category')->paginate(10);
    //     return view('admin.product.index', compact('product'));
    // }


    //show giao diện thêm sản phẩm

    public function showAddProducts()
    {
        // $attributes = Attribute::all()->groupBy('attribute_id');
        $attributes = Attribute::all();
        $category = Category::all();
        $producttype = ProductType::all();
        $trademark = TradeMark::all();
        return view('admin.product.create', compact('attributes', 'category', 'producttype', 'trademark'));
    }


    /// thực thi add sản phẩm 

    // public function addDataProducts(Request $request)
    // {
    //     if(Auth::check())
    //     {
    //         $userId = Auth::user()->id;
    //         $product = new Product();
    //         $product->name = $request->input('name');
    //         $product->price = $request->input('price');
    //         $product->discount = $request->input('discount');
    //         $product->id_categories = $request->input('id_category');
    //         $product->id_typeproduct = $request->input('id_typeproduct');
    //         $product->id_trademark = $request->input('id_trademark');
    //         $product->id_attribute = $request->input('id_attribute');
    //         $product->quantity = $request->input('quantity');
    //         $product->energy = $request->input('energy');
    //         $product->waterresistance = $request->input('waterproof');
    //         $product->description = $request->input('description');
    //         $product->origin = $request->input('origin');
    //         $product->content = $request->input('content');
    //         $product->id = $userId; // Might not be necessary depending on your database schema

    //         dd($product->id_trademark = $request->input('id_trandemark'));
    //         // Save product image (if uploaded)
    //         if ($request->hasFile('image')) {
    //             $image = $request->file('image');
    //             $imageName = time() . '.' . $image->getClientOriginalExtension();
    //             $image->move(public_path('images'), $imageName);
    //             $product->image = 'images/' . $imageName;
    //         }

    //         // Save product list_images (multiple images)
    //         $listImages = [];
    //         if ($request->hasFile('file')) {
    //             $images = $request->file('file');
    //             foreach ($images as $image) {
    //                 $imageName = time() . '_' . $image->getClientOriginalName();
    //                 $image->move(public_path('images'), $imageName);
    //                 $listImages[] = 'images/' . $imageName;
    //             }
    //         }
    //         $product->list_images = json_encode($listImages); // Convert array to JSON string

    //         $product->save();
    //     }

    //   return redirect()->route('showproducts')->with('status',"Thành công rồi nè");
    // }
    public function addDataProducts(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;

            // Validate request data
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
                'discount' => 'nullable|numeric',
                'id_category' => 'required|integer',
                'id_typeproduct' => 'required|integer',
                'id_trademark' => 'required|integer', // Sửa lại tên trường cho đúng
                'id_attribute' => 'nullable|integer',
                'quantity' => 'required|integer',
                'energy' => 'nullable|string|max:255',
                'waterproof' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'origin' => 'nullable|string|max:255',
                'content' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'file.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $product = new Product();
            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->discount = $request->input('discount');
            $product->id_categories = $request->input('id_category');
            $product->id_typeproduct = $request->input('id_typeproduct');
            $product->id_trademark = $request->input('id_trademark'); // 
            $product->id_attribute = $request->input('id_attribute');
            $product->quantity = $request->input('quantity');
            $product->energy = $request->input('energy');
            $product->waterresistance = $request->input('waterproof');
            $product->description = $request->input('description');
            $product->origin = $request->input('origin');
            $product->content = $request->input('content');
            $product->id = $userId; // Assuming the user_id field exists in the products table
            // dd($product->id_categories = $request->input('id_category'));
            // Save product image (if uploaded)
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $product->image = 'images/' . $imageName;
            }

            // Save product list_images (multiple images)
            $listImages = [];
            if ($request->hasFile('file')) {
                $images = $request->file('file');
                foreach ($images as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('images'), $imageName);
                    $listImages[] = 'images/' . $imageName;
                }
            }
            $product->list_images = json_encode($listImages); // Convert array to JSON string

            $product->save();

            return redirect()->route('showproducts')->with('status', "Thành công rồi nè");
        }

        return redirect()->route('showproducts')->with('status', "Lỗi rồi nè");
    }
    public function deleteProducts($id)
    {
        $products = Product::find($id);
        if(!empty($products))
        {
            $products->delete();
            return redirect()->route('showproducts')->with('status',"Bạn xoá thành công");
        }

        return redirect()->route('showproducts')->with('status',"Bạn xoá chưa thành công"); 
    }

    ///hàm check status products

    public function checkStatusProduct($id)
    {
        $products = Product::findOrFail($id);
        $products->checkstatus = !$products->checkstatus;
        $products->save();

        return redirect()->back()->with('status', 'Trạng thái của sản phẩm đã được cập nhật.');
    }

    //show giao diện sửa 
    public function showIndexUpdateProduct($id)
    {
        $products = Product::find($id);
        return view('admin.product.update',compact('products'));
    }
}
