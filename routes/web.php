<?php

use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\PosterController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShipperController;
use App\Http\Controllers\Admin\ShopController as AdminShopController;
use App\Http\Controllers\Buyer\BuyerBlogController;
use App\Http\Controllers\Buyer\BuyerCategoryController;
use App\Http\Controllers\Buyer\BuyerController;
use App\Http\Controllers\Buyer\BuyerCouponController;
use App\Http\Controllers\Buyer\BuyerCustomerController;
use App\Http\Controllers\Buyer\BuyerDashboardController;
use App\Http\Controllers\Buyer\BuyerLoginController;
use App\Http\Controllers\Buyer\BuyerOrderController;
use App\Http\Controllers\Buyer\BuyerProductController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckOutController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\ShippingController;
use App\Http\Controllers\Front\ShopController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Front\ViewShopController;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/export', [ExportController::class, 'export']);

//Ajax
Route::prefix('ajax')->group(function(){
    Route::get('shop/load-comment/{productId}',[ShopController::class,'loadComment']);
    Route::post('shop/post-comment',[ShopController::class,'postComment']);
    Route::get('load-cart-total',[CartController::class,'loadCartTotal']);
    Route::get('coupon',[CartController::class,'checkCoupon']);
    Route::get('load-coupon-used',[CartController::class,'loadCoupon']);
    Route::get('remove-coupon',[CartController::class,'removeCoupon']);
    Route::get('load-district',[CheckOutController::class,'loadDistrict']);
    Route::get('load-ward',[CheckOutController::class,'loadWard']);
});
//Front
Route::get('map', [ShippingController::class, 'calculateShippingCost']);
Route::get('/',[HomeController::class,'index']);
Route::get('gioi-thieu',[HomeController::class,'about']);

Route::get('lien-he',[HomeController::class,'contact']);
Route::post('lien-he',[HomeController::class,'sendContact']);

Route::get('dang-nhap',[HomeController::class,'viewLogin'])->name('login');
Route::post('dang-nhap',[UserController::class,'login']);
Route::get('dang-ky',[HomeController::class,'viewSignup']);
Route::post('dang-ky',[UserController::class,'signup']);
Route::post('log-out',[UserController::class,'logout']);

Route::prefix('thong-tin-ca-nhan')->middleware('CheckMemberLogin')->group(function(){
    Route::get('',[UserController::class,'personalInfo']);
    Route::post('',[UserController::class,'updateInfo']);
    Route::get('don-hang',[OrderController::class,'index']);
    Route::get('doi-mat-khau',[UserController::class,'viewChangePassword']);
    Route::post('doi-mat-khau',[UserController::class,'changePassword']);
    Route::get('feedback', [OrderController::class, 'feedback'])->name('order');
    Route::get('don-hang/{id}',[OrderController::class,'show']);
});

Route::prefix('gio-hang')->group(function(){
    Route::get('',[CartController::class,'viewCart']);
    Route::get('add',[CartController::class,'add']);
    Route::get('update',[CartController::class,'update']);
    Route::get('remove',[CartController::class,'remove']);
    Route::get('destroy',[CartController::class,'destroyCart']);
});

Route::prefix('shop')->group(function(){
    Route::get('san-pham/{alias}',[ShopController::class,'show']);
    Route::get('',[ShopController::class,'index']);
    Route::get('danh-muc/{alias}',[ShopController::class,'category']);
});

Route::prefix('check-out')->middleware('CheckMemberLogin')->group(function(){
    Route::get('',[CheckOutController::class,'index']);
    Route::get('vnPayCheck',[CheckOutController::class,'vnPayCheck']);
    Route::post('add-order',[CheckOutController::class,'addOrder']);
    Route::get('result',[CheckOutController::class,'result']);
});

Route::prefix('view-shop')->group(function(){
    Route::get('{shop_id}',[ViewShopController::class,'index'] ) ;
    Route::get('danh-muc/{shop_id}/{alias}', [ViewShopController::class, 'category']);
});

Route::prefix('blog')->group(function(){
    Route::get('',[BlogController::class,'index']);
    Route::get('{alias}',[BlogController::class,'show']);
});

Route::post('/reviews/{productId}/{orderId}', [OrderController::class, 'store'])->name('reviews.store');

Route::get('/reviews/show/{productId}/{orderId}', [OrderController::class, 'review'])->name('reviews.show');


//Admin
Route::prefix('admin')->group(function(){
    Route::get('login',[LoginController::class,'index']);
    Route::get('logout',[LoginController::class,'logout']);
    Route::post('login',[LoginController::class,'checkLogin']);
    Route::get('dashboard',[DashboardController::class,'index']);
    Route::get('danh-sach-san-pham',[ProductController::class,'index']);

    Route::get('shop', [AdminShopController::class, 'index']);
    Route::get('edit-shop/{id}', [AdminShopController::class, 'edit']);
    Route::post('edit-shop/{id}', [AdminShopController::class, 'update']);
    Route::get('remove-shop/{id}', [AdminShopController::class, 'remove']);
    Route::get('show-shop/{id}', [AdminShopController::class, 'show']);
    
    Route::get('danh-sach-danh-muc',[CategoryController::class,'index']);
    Route::get('danh-sach-don-hang',[AdminOrderController::class,'index']);
    Route::get('danh-sach-tin-tuc',[AdminBlogController::class,'index']);
    Route::get('danh-sach-shipper',[ShipperController::class,'index']);
    Route::get('danh-sach-coupon',[CouponController::class,'index']);
    
    Route::get('danh-sach-khach-hang',[CustomerController::class,'index']);
    Route::post('edit-user/{id}', [CustomerController::class, 'update']);
    Route::get('edit-user/{id}', [CustomerController::class, 'edit']);

    Route::get('add-shipper',[ShipperController::class,'add']);
    Route::post('add-shipper',[ShipperController::class,'post']);
    Route::get('edit-shipper/{id}',[ShipperController::class,'edit']);
    Route::post('edit-shipper/{id}',[ShipperController::class,'update']);
    Route::get('remove-shipper/{id}',[ShipperController::class,'remove']);

    Route::get('add-category',[CategoryController::class,'add']);
    Route::post('add-category',[CategoryController::class,'post']);
    Route::get('edit-category/{id}',[CategoryController::class,'edit']);
    Route::post('edit-category/{id}',[CategoryController::class,'update']);
    Route::get('remove-category/{id}',[CategoryController::class,'remove']);
    Route::get('update-published-category/{id}',[CategoryController::class,'updatePublished']);

    Route::get('add-coupon',[CouponController::class,'add']);
    Route::post('add-coupon',[CouponController::class,'post']);
    Route::get('edit-coupon/{id}',[CouponController::class,'edit']);
    Route::post('edit-coupon/{id}',[CouponController::class,'update']);
    Route::get('remove-coupon/{id}',[CouponController::class,'remove']);

    Route::get('edit-order/{id}',[AdminOrderController::class,'edit']);
    Route::post('edit-order/{id}',[AdminOrderController::class,'update']);
    Route::get('remove-order/{id}',[AdminOrderController::class,'remove']);
    Route::get('show-order/{id}',[AdminOrderController::class,'show']);

    Route::get('remove-product/{id}',[ProductController::class,'remove']);
    Route::get('add-product',[ProductController::class,'add']);
    Route::post('add-product',[ProductController::class,'post']);
    Route::get('edit-product/{id}',[ProductController::class,'edit']);
    Route::post('edit-product/{id}',[ProductController::class,'update']);
    Route::get('update-published-product/{id}',[ProductController::class,'updatePublished']);
    Route::get('update-featured-product/{id}',[ProductController::class,'updateFeatured']);

    Route::get('remove-blog/{id}',[AdminBlogController::class,'remove']);
    Route::get('update-published-blog/{id}',[AdminBlogController::class,'updatePublished']);
    Route::get('add-blog',[AdminBlogController::class,'add']);
    Route::post('add-blog',[AdminBlogController::class,'post']);
    Route::get('edit-blog/{id}',[AdminBlogController::class,'edit']);
    Route::post('edit-blog/{id}',[AdminBlogController::class,'update']);

    Route::get('posters', [PosterController::class, 'index']);
    Route::get('add-poster', [PosterController::class, 'add']);
    Route::post('add-poster', [PosterController::class, 'post']);
    Route::get('edit-poster/{id}', [PosterController::class, 'edit']);
    Route::post('edit-poster/{id}', [PosterController::class, 'update']);
    Route::get('remove-poster/{id}', [PosterController::class, 'remove']);


});

Route::prefix('buyer')->group(function(){
    Route::get('register-shop', [BuyerController::class, 'index']);
    Route::post('register', [BuyerController::class, 'create'])->name('register');
    Route::get('login-shop', [BuyerLoginController::class, 'index']);
    Route::post('login-shop', [BuyerLoginController::class, 'checkLogin'])->name('login');
    Route::get('logout', [BuyerLoginController::class, 'logout']);
    
    Route::get('dashboard', [BuyerDashboardController::class, 'index']);
    Route::get('dashboard-data', [BuyerDashboardController::class, 'getSalesData']);
    Route::get('account', [BuyerLoginController::class, 'index']);
    Route::post('updateProfile', [BuyerLoginController::class, 'updateProfile'])->name('updateProfile');

    Route::get('store-information', [BuyerLoginController::class, 'showInformation'])->name('storeInformation');
    
    Route::get('customer', [BuyerCustomerController::class, 'index']);

    Route::get('order', [BuyerOrderController::class, 'index']);
    Route::get('order-success', [BuyerOrderController::class, 'success']);
    Route::get('edit-order/{id}', [BuyerOrderController::class, 'edit']);
    Route::post('edit-order/{id}', [BuyerOrderController::class, 'update']);
    Route::get('remove-order/{id}', [BuyerOrderController::class, 'remove']);
    Route::get('show-order/{id}', [BuyerOrderController::class, 'show']);

    Route::get('product', [BuyerProductController::class, 'index']);
    Route::get('remove-product/{id}', [BuyerProductController::class, 'remove']);
    Route::get('add-product', [BuyerProductController::class, 'add']);
    Route::post('add-product', [BuyerProductController::class, 'post']);
    Route::get('edit-product/{id}', [BuyerProductController::class, 'edit']);
    Route::post('edit-product/{id}', [BuyerProductController::class, 'update']);
    Route::get('update-published-product/{id}', [BuyerProductController::class, 'updatePublished']);
    Route::get('update-featured-product/{id}', [BuyerProductController::class, 'updateFeatured']);


    Route::get('coupon', [BuyerCouponController::class, 'index']);
    Route::get('add-coupon', [BuyerCouponController::class, 'add']);
    Route::post('add-coupon', [BuyerCouponController::class, 'post']);
    Route::get('edit-coupon/{id}', [BuyerCouponController::class, 'edit']);
    Route::post('edit-coupon/{id}', [BuyerCouponController::class, 'update']);
    Route::get('remove-coupon/{id}', [BuyerCouponController::class, 'remove']);

    Route::get('category', [BuyerCategoryController::class, 'index']);
    Route::get('add-category', [BuyerCategoryController::class, 'add']);
    Route::post('add-category', [BuyerCategoryController::class, 'post']);
    Route::get('edit-category/{id}', [BuyerCategoryController::class, 'edit']);
    Route::post('edit-category/{id}', [BuyerCategoryController::class, 'update']);
    Route::get('remove-category/{id}', [BuyerCategoryController::class, 'remove']);
    Route::get('update-published-category/{id}', [BuyerCategoryController::class, 'updatePublished']);

    Route::get('blog', [BuyerBlogController::class, 'index']);
    Route::get('remove-blog/{id}', [BuyerBlogController::class, 'remove']);
    Route::get('update-published-blog/{id}', [BuyerBlogController::class, 'updatePublished']);
    Route::get('add-blog', [BuyerBlogController::class, 'add']);
    Route::post('add-blog', [BuyerBlogController::class, 'post']);
    Route::get('edit-blog/{id}', [BuyerBlogController::class, 'edit']);
    Route::post('edit-blog/{id}', [BuyerBlogController::class, 'update']);

});