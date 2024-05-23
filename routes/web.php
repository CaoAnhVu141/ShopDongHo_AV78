<?php

use App\Http\Controllers\AdminArticleCategoryController;
use App\Http\Controllers\AdminCategoryProductsController;
use App\Http\Controllers\AdminProductsTypeController;
use App\Http\Controllers\AdminAccessoryProductsController;
use App\Http\Controllers\AdminAttributeController;
use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\AdminTypeProductsController;
use App\Http\Controllers\AdminUsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUsersLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


///viết route định nghĩa cho show admin login và regiter

Route::get('admin-login',[AdminUsersLoginController::class,'showAdminLogin'])->name('admin-login');
Route::post('admin-login',[AdminUsersLoginController::class,'adminLogin'])->name('adminLogin');

Route::get('admin-register',[AdminUsersLoginController::class,'showAdminRegister'])->name('admin-register');
Route::post('admin-register',[AdminUsersLoginController::class,'adminRegister'])->name('adminRegister');



///hiện thị bài viết danh mục

Route::get('status',[AdminArticleCategoryController::class,'showAirticleCategory'])->name('status');


// Hiển thị toàn bộ users
Route::get('users', [AdminUsersController::class, 'showAllDataUsers'])->name('users');

// Xoá user
Route::get('delete/{id}', [AdminUsersController::class, 'deteDataUsers'])->name('deleteUsers');

// Chỉnh sửa thông tin user
Route::get('edit/{id}', [AdminUsersController::class, 'showDisplayUsers'])->name('editUsers');



///toàn bộ route cho danh mục sản phẩm

//hiện thi danh mục sản phẩm
Route::get('category',[AdminCategoryProductsController::class,'showCategoryProducts'])->name('showcategory');

///thêm danh mục sản phẩm

Route::get('add-category',[AdminCategoryProductsController::class,'addCategoryProducts'])->name('addcategory');
Route::post('add-category',[AdminCategoryProductsController::class,'addDataCategoryProducts'])->name('addcategoryproducts');

//xoá danh mục sản phẩm
Route::get('delete-category/{id}',[AdminCategoryProductsController::class,'deleteCategoryProducts'])->name('deletecategory');
//sửa danh mục sản phẩm
Route::get('edit-category/{id}',[AdminCategoryProductsController::class,'showEditCategoryProducts'])->name('editcategory');
Route::post('edit-category/{id}',[AdminCategoryProductsController::class,'editCategoryProducts'])->name('updatecategory');
//!!Ẩn và hiện danh mục sản phẩm
Route::get('toggle-category/{id}',[AdminCategoryProductsController::class,'toggleVisibility'])->name('toggleproduct');


///DANH MỤC PHỤ KIÊN SẢN PHẨM

//show giao diện loại phụ kiện sản phẩm
Route::get('showaccessory',[AdminAccessoryProductsController::class,'showAccessoryProducts'])->name('showaccessory');

///show giao diện thêm phụ kiện sản phẩm

Route::get('add-accessory',[AdminAccessoryProductsController::class,'showAddAccessoryProducts'])->name('addaccessory');
Route::post('add-accessory',[AdminAccessoryProductsController::class,'addAccessoryProducts'])->name('addaccessoryproducts');

///Xoá danh mục linh kiện sản phẩm

Route::get('delete-accessory/{id}',[AdminAccessoryProductsController::class,'deleteAccessoryProduct'])->name('deleteaccessory');

// sửa danh mục sản phẩm
Route::get('edit-accessory/{id}',[AdminAccessoryProductsController::class,'showEditAccessory'])->name('editaccessory');
Route::post('edit-accessory/{id}',[AdminAccessoryProductsController::class,'editAccessoryProducts'])->name('updateaccessory');

//ẩn hoặc hiện danh mục phụ kiện
Route::get('showorhideaccessory/{id}',[AdminAccessoryProductsController::class,'accessoryShowOrHide'])->name('showhideaccessory');


///Sản phẩm

// show giao diện sản phẩm
Route::get('show-products',[AdminProductsController::class,'showProducts'])->name('showproducts');
//show giao diện thêm sản phẩm
Route::get('add-product',[AdminProductsController::class,'showAddProducts'])->name('showaddproduct');
Route::post('add-product',[AdminProductsController::class,'addDataProducts'])->name('addproduct');
//xoá sản phẩm
Route::get('delete-product/{id}',[AdminProductsController::class,'deleteProducts'])->name('deleteproduct');
//sửa sản phẩm
Route::get('update-product/{id}',[AdminProductsController::class, 'showIndexUpdateProduct'])->name('editproduct');
///@@LOẠI SẢN PHẨM

Route::get('show-typeproducts',[AdminTypeProductsController::class,'showTypeProducts'])->name('showtypeproducts');
//show giao diện thêm loại sản phẩm
Route::get('addtypeproducts',[AdminTypeProductsController::class,'showAddtypeProducts'])->name('showaddtypeproducts');
Route::post('addtypeproducts',[AdminTypeProductsController::class,'addProductsType'])->name('addtypeproducts');

///xoá dữ liệu loại sả phẩm

Route::get('delete-producttype/{id}',[AdminTypeProductsController::class,'deleteProductsType'])->name('deletetypeproducts');

//sửa dữ liệu loại sản phẩm

Route::get('edit-productstype/{id}',[AdminTypeProductsController::class,'showEditProductsType'])->name('editproducttype');

//ẩn và hiện check status
Route::get('checkstatus/{id}',[AdminTypeProductsController::class,'showOrHideCheck'])->name('checkstatus');



// @THUỘC TÍNH SẢN PHẨM

Route::get('show-attribute',[AdminAttributeController::class,'showAttributeIndex'])->name('showattribute');

//show giao diện add thuộc tính sản phẩm

Route::get('show-addattribute',[AdminAttributeController::class,'showAddAttribute'])->name('showaddattribute');
Route::post('show-addattribute',[AdminAttributeController::class,'addDataAttribute'])->name('addDataAttribute');

//xoá thuộc tính sản phẩm

// Route::get('delete-attribute/{id}',[AdminAttributeController::class,'deleteAttribute'])->name('deleteattribute');
Route::get('delete-attribute/{id}',[AdminAttributeController::class, 'deleteAttribute'])->name('deleteattribute');

//sửa thuộc tính sản phẩm

Route::get('update-attribute/{id}',[AdminAttributeController::class,'showEditAttribute'])->name('showupdateattribute');
Route::post('update-attribute/{id}',[AdminAttributeController::class,'editAttribute'])->name('updateattribute');