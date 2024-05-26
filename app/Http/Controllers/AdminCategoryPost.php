<?php

namespace App\Http\Controllers;

use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCategoryPost extends Controller
{
    //
    ///
    public function showIndexCategoryPost()
    {
        $categorypost = CategoryPost::paginate(10);
        return view('admin.categorypost.index',compact('categorypost'));
    }

    //show index add

    public function showIndexAddCategoryPost()
    {
        return view('admin.categorypost.add');
    }

    //thực thi thêm 

    public function addCategoryPost(Request $request)
    {
        $request->validate([
            'namecategory' => 'required|string',
            'descriptioncategory' => 'required|string',
        ]);
            // Thêm thuộc tính vào bảng attributes và lưu trữ ID của người dùng
            CategoryPost::create([
                $id_User = Auth::user()->id,
                'name' => $request->input('namecategory'),
                'description' => $request->input('descriptioncategory'),
                'id' => $id_User,
                // Thêm các trường thông tin khác của thuộc tính nếu cần
            ]);

            return redirect()->route('showindexcategorypost')->with('status','Thêm thành công rồi nè');
        }
    }
