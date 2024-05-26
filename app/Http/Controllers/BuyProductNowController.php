<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuyProductNowController extends Controller
{
    //
    public function showIndexByProductNow()
    {
        return view('shopping.buynow');
    }
}
