<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use Illuminate\Http\Request;

class AdminAccessoryProductsController extends Controller
{
    // hàm show giao diện thêm loại phụ kiện
    public function showAccessoryProducts()
    {
        $accessory = Accessory::paginate(10);
        return view('admin.accessory.index',compact('accessory'));
    }

    //hàm show giao diện nhập phụ kiện sản phẩm

    public function showAddAccessoryProducts()
    {
        return view('admin.accessory.create');
    }


    //thực hiện thêm phụ kiện sản phẩm vào

    public function addAccessoryProducts(Request $request)
    {
       $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'description' => ['required','string', 'max:70000'],
       ],[
        'name.required' => 'Name không được bỏ trống',
        'name.max' => 'Name tối đa :max kí tự',
        'description.required' => 'Short description không được bỏ trống',
        'description.max' => 'Short description tối đa :max kí tự',
       ]);


       Accessory::create([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        
       ]);
       return redirect()->route('showaccessory')->with('status','Bạn đã thêm dữ liệu thành công');
    }


    //viết hàm xoá danh sách phụ kiện sản phẩm

    public function deleteAccessoryProduct($id)
    {
     $accessory = Accessory::find($id);

     if($accessory != null)
     {
        $accessory->delete();
        return redirect()->route('showaccessory')->with('status','Bạn đã xoá thành công');
     }
    }


    //viết hàm show giao diện sửa danh mục phụ kiện

    public function showEditAccessory($id)
    {
        $accessory = Accessory::find($id);
        return view('admin.accessory.update',compact('accessory'));
    }

    //thực thi cập nhật danh mục phụ kiện

    public function editAccessoryProducts(Request $request, $id)
    {
    //    $accessory = Accessory::find($id);
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'description' => ['required','string', 'max:70000'],
       ],[
        'name.required' => 'Name không được bỏ trống',
        'name.max' => 'Name tối đa :max kí tự',
        'description.required' => 'Short description không được bỏ trống',
        'description.max' => 'Short description tối đa :max kí tự',
       ]);

       Accessory::where('id',$id)->update([
        'name'=>$request->input('name'),
        'description'=>$request->input('description'),
       ]);
       return redirect()->route('showaccessory')->with('status','Bạn đã sửa thành công');
    }

    //viết hàm ẩn và hiện cho danh mục phụ kiện

    public function accessoryShowOrHide($id)
    {
        $accessory = Accessory::findOrFail($id);
        $accessory->checkaccessory = !$accessory->checkaccessory;
        $accessory->save();

        return redirect()->route('showaccessory')->with('status','Trạng thái của danh mục đã được cập nhật');

        // return redirect()->back()->with('status', 'Trạng thái của sản phẩm đã được cập nhật.');
    }
}
