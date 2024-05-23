<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCategoryProductsController extends Controller
{
    //viết hàm show giao diện danh mục sản phẩm

    public function showCategoryProducts(Request $request)
    {
        $key = "";
        if($request->input('key'))
        {
            $key = $request->input('key');
        }
        $categoryProducts = Category::where('name', 'LIKE', "%{$key}%")->paginate(10);
        return view('admin.category.index',compact('categoryProducts'));
    }

    //show giao diện thêm danh mục sản phẩm

    public function addCategoryProducts()
    {
        return view('admin.category.create');
    }

    ///hàm xử lý thêm danh mục sản phẩm

    public function addDataCategoryProducts(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục',
            'name.max' => 'Chỉ nhập tối đa 255 kí tự',
            'description.required' => 'Vui lòng nhập mô tả chi tiết', 
        ]);
        Category::create([
            $id_User = Auth::user()->id,
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'id' => $id_User,
        ]);
        return redirect()->route('showcategory')->with('status','Bạn đã nhập thành công');
    }


    //hàm xoá danh mục sản phẩm
    public function deleteCategoryProducts($id)
    {
        $attribute = Category::find($id);
        if(!empty($attribute))
        {
            $attribute->delete();
            return redirect()->route('showcategory')->with('status',"Bạn xoá thành công");
        }

        return redirect()->route('showcategory')->with('status',"Bạn xoá chưa thành công"); 
    }


    ///hàm in giao diện cho sửa danh mục sản phẩm
    public function showEditCategoryProducts($id)
    {
        $categoryProducts = Category::find($id);
        return view('admin.category.update',compact('categoryProducts'));
    }
    ///thực thi update dữ liệu cho danh mục sản phẩm
    public function editCategoryProducts(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục',
            'name.max' => 'Chỉ nhập tối đa 255 kí tự',
            'description.required' => 'Vui lòng nhập mô tả chi tiết', 
        ]);

       Category::where('id_categories',$id)->update([
           'name'=>$request->input('name'),
           'description'=>$request->input('description'),
       ]);
       return redirect()->route('showcategory')->with('status','Bạn đã sửa thành công');
    }


    //viết hàm ẩn và hiện danh mục sản phẩm

    public function toggleVisibility($id)
    {
        $categoryProducts = Category::findOrFail($id);
        $categoryProducts->checkstatus = !$categoryProducts->checkstatus;
        $categoryProducts->save();

        return redirect()->back()->with('status', 'Trạng thái của sản phẩm đã được cập nhật.');
    }

}
