<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Metadata\Uses;

class AdminUsersLoginController extends Controller
{
    //
     ///show view adminLogin
     public function showAdminLogin()
     {
         return view('admin.login.admin_login');
     }
 
     //show view admin register
 
     public function showAdminRegister()
     {
         return view('admin.login.admin_egister');
     }
 
     ///thực hiện đăng kí tài khoản
 
     public function adminRegister(Request $request)
     {
 
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone' => $request->input('phone'),
            'role' => $request->input('role'),
        ]);
         return redirect('admin-login');
     }
 
 
     //hàm xử lý đăng nhập
 
     public function adminLogin(Request $request)
     {
       $credentials = $request->only('email','password');
 
       if(Auth::attempt($credentials))
       {
         return redirect()->route('users');
       }
 
       return redirect()->route('admin-login');
     }
}
