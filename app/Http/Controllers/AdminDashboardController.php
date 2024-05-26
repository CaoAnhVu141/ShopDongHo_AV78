<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    ///show giao diện trang dashboard

    public function showIndexDashBoard()
    {
        return view('admin.transaction.dashboard');
    }

    /// show giao diện danh sách đơn hàng

    public function showIndexOderList()
    {
        return view('admin.transaction.oderlist');
    }


   

}
