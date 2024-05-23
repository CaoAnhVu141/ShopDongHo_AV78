<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Attribute;
use App\Models\AttributeGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\TabCompletion\Matcher\FunctionDefaultParametersMatcher;

class AdminAttributeController extends Controller
{
    //

    //show giao diện thuộc tính
    public function showAttributeIndex()
    {
        $attributeProduct = Attribute::paginate(10);
        return view('admin.attribute.index',compact('attributeProduct'));
    }

    ///show giao diện thêm thuộc tính

    public function showAddAttribute()
    {
        $categoryProduct = Category::paginate(10);
        return view ('admin.attribute.create',compact('categoryProduct'));
    }

    // viết hàm thêm dữ liệu vào thuộc tính 

    public function addDataAttribute(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'id_category' => ['required', 'exists:categories,id'], // Kiểm tra id_category có tồn tại trong bảng categories không
        //     'attributegroup' => ['required', 'string'],
        // ], [
        //     'name.required' => 'Vui lòng nhập tên danh mục',
        //     'name.max' => 'Chỉ nhập tối đa 255 kí tự',
        //     'attributegroup.required' => 'Vui lòng chọn mô tả chi tiết',
        //     'category_id.required' => 'Vui lòng chọn danh mục',
        //     'category_id.exists' => 'Danh mục đã chọn không hợp lệ',
        // ]);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục',
            'name.max' => 'Chỉ nhập tối đa 255 kí tự',
            'description.required' => 'Vui lòng nhập mô tả chi tiết', 
        ]);
        
        Attribute::create([
            $id_User = Auth::user()->id,
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'id' => $id_User,
        ]);            
        return redirect()->route('showattribute')->with('status','Bạn đã thêm dữ liệu thành công');
    }


    //viết hàm xoá thuộc tính sản phẩm

    // public function deleteAttribute($id_attribute)
    // {
    //     $attributeProduct = Attribute::find($id_attribute);
    //     dd($attributeProduct);

    //     if($attributeProduct)
    //     {
    //         $attributeProduct->delete();
    //         return redirect()->route('showattribute')->with('status','Bạn đã xoá thành công rồi nha');
    //     }
    //     else{
    //         return redirect()->route('showattribute')->with('status','Bạn xoá không thành công nha');
            
    //     }
    // }
    public function deleteAttribute($id)
    {
        $attribute = Attribute::find($id);
        if(!empty($attribute))
        {
            $attribute->delete();
            return redirect()->route('showattribute')->with('status',"Bạn xoá thành công");
        }

        return redirect()->route('showattribute')->with('status',"Bạn xoá chưa thành công"); 
    }


    ///viết hàm show giao diện sửa thuộc tính

    public function showEditAttribute($id)
    {
        $attribute = Attribute::find($id);
        return view('admin.attribute.update',compact('attribute'));
    }

    //viết hàm thực thi sửa thuộc tính 

    public function editAttribute(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục',
            'name.max' => 'Chỉ nhập tối đa 255 kí tự',
            'description.required' => 'Vui lòng nhập mô tả chi tiết', 
        ]);

        Attribute::where('id_categories',$id)->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
        ]);
        return redirect()->route('showattribute')->with('status','Bạn đã sửa dữ liệu thành công');
    }
}
