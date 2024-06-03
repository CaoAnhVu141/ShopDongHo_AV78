<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    //
    //show màn hình thanh toán

    public function showIndexCheckOut()
    {
        return view('shopping.checkout');
    }
}
