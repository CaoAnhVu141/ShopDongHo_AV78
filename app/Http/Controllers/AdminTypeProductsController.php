<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminTypeProductsController extends Controller
{
    //

    ///show giao diện loại sản phẩm
    public function showTypeProducts()
    {
        $productstype = ProductType::paginate(10);
        return view('admin.typeproduct.index', compact('productstype'));
    }

    //show giao diện thêm loại sản phẩm

    public function showAddtypeProducts()
    {
        $categorypro = Category::where('checkstatus', true)->get();
        return view('admin.typeproduct.create', compact('categorypro'));
    }

    //viết hàm thêm dữ liệu vào database cho loại sản phẩm

    public function addProductsType(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục',
            'name.max' => 'Chỉ nhập tối đa 255 kí tự',
            'description.required' => 'Vui lòng nhập mô tả chi tiết',
        ]);
        ProductType::create([
            $id_User = Auth::user()->id,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'id' => $id_User,
        ]);

        return redirect()->route('showtypeproducts')->with('status', 'Bạn đã thêm dữ liệu thành công');
    }
    //     public function addProductsType(Request $request)
    // {
    //     // Validate the request inputs
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'category_id' => ['required', 'exists:categories,id'], // Validate category_id exists in categories table
    //         'description' => ['required', 'string'],
    //     ], [
    //         'name.required' => 'Vui lòng nhập tên danh mục',
    //         'name.max' => 'Chỉ nhập tối đa 255 kí tự',
    //         'description.required' => 'Vui lòng nhập mô tả chi tiết',
    //         'category_id.required' => 'Vui lòng chọn danh mục',
    //         'category_id.exists' => 'Danh mục đã chọn không hợp lệ',
    //     ]);

    //     // Get the authenticated user's id
    //     $id_User = Auth::user()->id;
    //     // Create a new product type
    //     ProductType::create([
    //         'name' => $request->input('name'),
    //         'description' => $request->input('description'),
    //         'category_id' => $request->input('category_id'), // Ensure you include category_id
    //         'user_id' => $id_User, // Assuming you have a user_id field in ProductType
    //     ]);

    //     // Redirect to the showtypeproducts route with a success message
    //     return redirect()->route('showtypeproducts')->with('status', 'Bạn đã thêm dữ liệu thành công');
    // }



    ///viết hàm xoá dữ liệu loại sản phẩm

    public function  deleteProductsType($id)
    {
        $productstype = ProductType::find($id);

        if ($productstype != null) {
            $productstype->delete();
            return redirect()->route('showtypeproducts')->with('status', 'Bạn đã xoá dữ liệu thành công');
        }
    }

    //viết hàm show giao diện sửa dữ liệu

    public function showEditProductsType($id)
    {
        $productstype = ProductType::find($id);

        return view('admin.typeproduct.update', compact('productstype'));
    }

    ///viết hàm ẩn và hiện cái check

    public function showOrHideCheck($id)
    {
        $productstype = ProductType::findOrFail($id);
        $productstype->checktype = !$productstype->checktype;
        $productstype->save();

        return redirect()->route('showtypeproducts')->with('status', 'Trạng thái của sản phẩm đã được cập nhật.');
    }
}
