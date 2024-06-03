<?php

use App\Http\Controllers\AdminArticleCategoryController;
use App\Http\Controllers\AdminCategoryProductsController;
use App\Http\Controllers\AdminProductsTypeController;
use App\Http\Controllers\AdminAccessoryProductsController;
use App\Http\Controllers\AdminAttributeController;
use App\Http\Controllers\AdminCategoryPost;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\AdminTypeProductsController;
use App\Http\Controllers\AdminUsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUsersLoginController;
use App\Http\Controllers\BuyProductNowController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\IndexShoppingController;
use App\Http\Controllers\ListNewController;
use App\Http\Controllers\ShowDataAllProduct;

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

// Route::get('/', function () {
//     return view('welcome');
// });


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

//check trạng thái sản phẩm

Route::get('checkproduct/{id}',[AdminProductsController::class, 'checkStatusProduct'])->name('checkproduct');
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

// @@ Danh mục bài viết

Route::get('categorypost',[AdminCategoryPost::class,'showIndexCategoryPost'])->name('showindexcategorypost');

///add
Route::get('add-categorypost',[AdminCategoryPost::class, 'showIndexAddCategoryPost'])->name('showaddcategorypost');
Route::post('add-categorypost',[AdminCategoryPost::class, 'addCategoryPost'])->name('addcategorypost');


/// @@ bài viết

Route::get('posts',[AdminPostController::class, 'showIndexPost'])->name('showindexpost');

//thêm bài viết

Route::get('add-post',[AdminPostController::class, 'showAddPost'])->name('showaddpost');
Route::post('add-post',[AdminPostController::class, 'addPost'])->name('adddatapost');


//xoá bài viết 
Route::get('delete-post/{id}',[AdminPostController::class, 'deletePost'])->name('deletepost');

//sửa bài viết

Route::get('update-post/{id}',[AdminPostController::class, 'showUpdatePost'])->name('showindexupdatepost');
Route::post('update-post/{id}',[AdminPostController::class, 'updateIndexDataPost'])->name('updatepost');


// @@@ thực thi với trang dashboard

Route::get('dashboard',[AdminDashboardController::class,'showIndexDashBoard'])->name('indexdashboard');

//danh sách đơn hàng

Route::get('oder-list',[AdminDashboardController::class, 'showIndexOderList'])->name('oderlist');


///////////////////////////////////////
//xử lý bên trang index
// Route::get('/',[IndexShoppingController::class, 'showIndexShopping'])->name('indexshopping');

Route::get('/',[IndexShoppingController::class, 'showIndexDataProduct'])->name('showindexdataproduct');

///hiển thị chi tiết sản phẩm

Route::get('detail/{id}',[IndexShoppingController::class,'showDetailProducts'])->name('detailproduct');

//show toàn bộ sản phẩm
// Route::get('all-product',ShowIndexAllProduct::class,'showDataAllProduct')->name('showallproduct');
Route::get('show-all', [ShowDataAllProduct::class, 'showDataAllProduct'])->name('showallproduct');


///show màn hình giỏ hàng
Route::get('cart',[CartController::class, 'showIndexCart'])->name('showindexcart');
//thêm vào gỏi hàng
Route::post('cart/add/{id}', [CartController::class, 'addToCart'])->name('addtocart');
//xoá toàn bộ giỏ hàng
Route::get('delete-allcart',[CartController::class, 'deleteAllDataCart'])->name('deleteallcart');
//xoá từng sản phẩm trong giỏ hàng
Route::get('delete-cart/{rowId}',[CartController::class, 'deteleDataCart'])->name('deletecart');

// mua hàng ngay

Route::get('buynow',[BuyProductNowController::class, 'showIndexByProductNow'])->name('buyproductnow');


// @tin tức

//show danh sách tin tức

Route::get('news',[ListNewController::class,'showIndexListNews'])->name('newlist');


// @@Loadmore
// Route::get('load-more',[IndexShoppingController::class, 'loadMoreDataProduct'])->name('loadmoreproduct');

/// @@ check out
//Show check out
Route::get('checkout',[CheckOutController::class, 'showIndexCheckOut'])->name('indexcheckout');