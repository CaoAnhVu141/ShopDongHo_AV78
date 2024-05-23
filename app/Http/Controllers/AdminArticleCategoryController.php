<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminArticleCategoryController extends Controller
{
    //
    //hàm show bài viết

    public function showAirticleCategory()
    {
       return view('admin.articlecategory.showarticlecategory');
    }
}
