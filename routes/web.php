<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\TaxController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Front\FrontController;
use Illuminate\Support\Facades\Route;

// The  Front page route Start*****************/

Route::group(['middleware'=>'user_auth'],function(){
    Route::get('order',[FrontController::class,'order']);
    Route::get('orders_details/{id}',[FrontController::class,'orders_details']);
});

Route::get('/',[FrontController::class,'index']);
Route::get('product/{id}',[FrontController::class,'product']);
// Route::get('updatepass',[AdminController::class,'update']);
Route::post('add_to_cart',[FrontController::class,'add_to_cart']);
Route::get('cart',[FrontController::class,'cart']);
Route::get('category/{slug}',[FrontController::class,'category']);
Route::get('search/{str}',[FrontController::class,'search']);
Route::get('registation',[FrontController::class,'registation']);
Route::post('registration_process',[FrontController::class,'registration_process']);
Route::post('login_from_process',[FrontController::class,'login_from_process']);
Route::get('logout', function () {
    session()->forget('FRONT_USER_LOGIN');
    session()->forget('FRONT_USER_ID');
    session()->forget('FRONT_USER_NAME');
    session()->forget('USER_TEMP_ID');
    return redirect('/');
});
Route::get('verification/{id}',[FrontController::class,'verification']);
Route::post('forget_from_process',[FrontController::class,'forget_from_process']);
Route::get('chengh_password/{id}',[FrontController::class,'chengh_password']);
Route::post('password_chengh_process',[FrontController::class,'password_chengh_process']);
Route::get('checkout',[FrontController::class,'checkout']);
Route::post('apply_coupon_code',[FrontController::class,'apply_coupon_code']);
Route::post('remove_coupon_code',[FrontController::class,'remove_coupon_code']);
Route::post('/placeOrder',[FrontController::class,'placeOrder']);
Route::get('/order_placed',[FrontController::class,'place_order']);
Route::get('/instamojo_payment_redirect',[FrontController::class,'instamojo_payment_redirect']);

Route::get('simran',[FrontController::class,'simran']);
// The  Front page route End *****************/
// The  Admin page route Start*****************/

// The  Admin Login   *****************/
Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');

Route::group(['middleware'=>'admin_auth'],function()
{

            
            Route::get('admin/dashboard',[AdminController::class,'dashboard']);
        // The  Category *****************/
            Route::get('admin/category',[CategoryController::class,'index']);
            Route::get('admin/category/manage_category',[CategoryController::class,'manage_category']);
            Route::get('admin/category/manage_category/{id}',[CategoryController::class,'manage_category']);
            Route::post('admin/category/manage_category_process',[CategoryController::class,'manage_category_process'])->name('category.manage_category_process');
            Route::get('admin/category/delete/{id}',[CategoryController::class,'delete']);
            Route::get('admin/category/status/{status}/{id}',[CategoryController::class,'status']);
        // The  Category  End*****************/
        // The  Coupon *****************/
            Route::get('admin/coupon',[CouponController::class,'index']);
            Route::get('admin/coupon/manage_coupon',[CouponController::class,'manage_coupon']);
            Route::get('admin/coupon/manage_coupon/{id}',[CouponController::class,'manage_coupon']);
            Route::post('admin/coupon/manage_coupon_process',[CouponController::class,'manage_coupon_process'])->name('coupon.manage_coupon_process');
            Route::get('admin/coupon/delete/{id}',[CouponController::class,'delete']);
            Route::get('admin/coupon/status/{status}/{id}',[CouponController::class,'status']);
        // The  Size *****************/  
            Route::get('admin/size',[SizeController::class,'index']);
            Route::get('admin/size/manage_size',[SizeController::class,'manage_size']);
            Route::get('admin/size/manage_size/{id}',[SizeController::class,'manage_size']);
            Route::post('admin/size/manage_size_process',[SizeController::class,'manage_size_process'])->name('size.manage_size_process');
            Route::get('admin/cousizepon/delete/{id}',[SizeController::class,'delete']);
            Route::get('admin/size/status/{status}/{id}',[SizeController::class,'status']);
        // The  Color*****************/  
            Route::get('admin/color',[ColorController::class,'index']);
            Route::get('admin/color/manage_color',[ColorController::class,'manage_color']);
            Route::get('admin/color/manage_color/{id}',[ColorController::class,'manage_color']);
            Route::post('admin/color/manage_color_process',[ColorController::class,'manage_color_process'])->name('color.manage_color_process');
            Route::get('admin/color/delete/{id}',[ColorController::class,'delete']);
            Route::get('admin/color/status/{status}/{id}',[ColorController::class,'status']);

        // The  Product *****************/ 
            Route::get('admin/product',[ProductController::class,'index']);
            Route::get('admin/product/manage_product',[ProductController::class,'manage_product']);
            Route::get('admin/product/manage_product/{id}',[ProductController::class,'manage_product']);
            Route::post('admin/product/manage_producty_process',[ProductController::class,'manage_product_process'])->name('product.manage_product_process');
            Route::get('admin/product/delete/{id}',[ProductController::class,'delete']);
            Route::get('admin/product/status/{status}/{id}',[ProductController::class,'status']);
            Route::get('admin/product/product_attr_delete/{paid}/{pid}',[ProductController::class,'product_attr_delete']);
            Route::get('admin/product/product_images_delete/{paid}/{pid}',[ProductController::class,'product_images_delete']);
        // The  Brand *****************/ 
            Route::get('admin/brand',[BrandController::class,'index']);
            Route::get('admin/brand/manage_brand',[BrandController::class,'manage_brand']);
            Route::get('admin/brand/manage_brand/{id}',[BrandController::class,'manage_brand']);
            Route::post('admin/brand/manage_brand_process',[BrandController::class,'manage_brand_process'])->name('brand.manage_brand_process');
            Route::get('admin/brand/delete/{id}',[BrandController::class,'delete']);
            Route::get('admin/brand/status/{status}/{id}',[BrandController::class,'status']);
        // The  Tax *****************/ 
            Route::get('admin/tax',[TaxController::class,'index']);
            Route::get('admin/tax/manage_tax',[TaxController::class,'manage_tax']);
            Route::get('admin/tax/manage_tax/{id}',[TaxController::class,'manage_tax']);
            Route::post('admin/tax/manage_tax_process',[TaxController::class,'manage_tax_process'])->name('tax.manage_tax_process');
            Route::get('admin/tax/delete/{id}',[TaxController::class,'delete']);
            Route::get('admin/tax/status/{status}/{id}',[TaxController::class,'status']);
        
        // The Customer *****************/ 
            Route::get('admin/customer',[CustomerController::class,'index']);
            Route::get('admin/customer/show/{id}',[CustomerController::class,'show']);
            Route::get('admin/customer/status/{status}/{id}',[CustomerController::class,'status']);

        // The HomeBanner *****************/ 
            Route::get('admin/home_banner',[HomeBannerController::class,'index']);
            Route::get('admin/home_banner/manage_home_banner',[HomeBannerController::class,'manage_home_banner']);
            Route::get('admin/home_banner/manage_home_banner/{id}',[HomeBannerController::class,'manage_home_banner']);
            Route::post('admin/home_banner/manage_home_banner_process',[HomeBannerController::class,'manage_home_banner_process'])->name('home_banner.manage_home_banner_process');
            Route::get('admin/home_banner/delete/{id}',[HomeBannerController::class,'delete']);
            Route::get('admin/home_banner/status/{status}/{id}',[HomeBannerController::class,'status']);
        // Order Detail**********************/
        Route::get('admin/order_detail',[OrderController::class,'index']);
        Route::get('admin/orderTotal_detail/{id}',[OrderController::class,'orderTotal_detail']);
        Route::get('admin/payment_status_change/{payment_status}/{id}',[OrderController::class,'payment_status_change']);
        Route::get('admin/order_status_change/{order_status}/{id}',[OrderController::class,'order_status_change']);
           
        // The admin/logou *****************/
            Route::get('admin/logout', function () {
                session()->forget('ADMIN_LOGIN');
                session()->forget('ADMIN_ID');
                session()->flash('error','Logout sucessfully');
                return redirect('admin');
            });
});
// The  Admin Login page  End  *****************/
// The  Admin page route End *****************/
