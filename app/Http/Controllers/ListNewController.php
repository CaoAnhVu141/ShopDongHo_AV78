<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ListNewController extends Controller
{
    //

    public function showIndexListNews()
    {
        $category = Category::all();
        return view('shopping.listnew',compact('category'));
    }
}
