<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUsersController extends Controller
{
    //
    ///viết hàm show toàn bộ dữ liệu dữ liệu users

    public function showAllDataUsers()
    {
        $users = User::paginate(10);
        return view('admin.user.index', compact('users'));
    }

    ///viết hàm xoá tài khoản

    public function deteDataUsers($id)
    {
        if (Auth::id() != $id) {
            $users = User::find($id);
            $users->delete();
            return redirect()->route('users');
        } else {
            return redirect('https://www.youtube.com/watch?v=48hyCgXCE3M');
        }
    }

    //viết hàm sửa tài khoản
    public function showDisplayUsers()
    {
        // $users = User::find($id);
        return view('admin.admin-users.editusers');
    }

    // public function updateUsers() {
        
    // }
}
