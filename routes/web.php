<?php

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

// Route::get('/', function () {
//     return view('layouts.frontend-layout');
// });

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

// Backend Routes

Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::group(['prefix'=>'admin', 'namespace'=>'Auth'],function()
{
        Route::get('/login', 'AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'AdminLoginController@login')->name('admin.login.submit');
        Route::get('/logout', 'AdminLoginController@logout')->name('admin.logout');
});

Route::group(['namespace'=>'Admin', 'prefix'=>'admin', 'middleware'=>'auth:admin'],function()
{
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::resource('/product', 'ProductController');
    Route::resource('/user', 'UserController');
    Route::get('/product/{product}/image/delete', 'ProductController@deleteProductImage')->name('image.delete');
    Route::resource('/category', 'CategoryController');
    Route::post('/category/{category}/feature', 'CategoryController@featureCategory')->name('category.feature');
    Route::resource('/page', 'PageController');
    Route::resource('/slider', 'SliderController');
    Route::get('/setting', 'SettingController@index')->name('setting.get');
    Route::post('/setting', 'SettingController@store')->name('setting.store');

    Route::get('/change-password', 'PasswordController@getPasswordForm')->name('password.get');
    Route::post('/change-password', 'PasswordController@postPasswordForm')->name('password.post');

});

// Frontend and Backend
Route::resource('order', 'OrderController');
Route::post('order/{order}', 'OrderController@orderPaid')->name('order.paid');
Route::get('order/status/{order}', 'OrderController@orderStatus')->name('order.status');
Route::resource('admin/contact', 'Admin\ContactController');

// Frontend Routes
Route::get('/', 'IndexController@index')->name('index');
Route::get('/contact', 'IndexController@getContact')->name('contact.page');
// Route::post('/contact', 'IndexController@storeContactMsg')->name('contact.store');
Route::get('product/{productSlug}', 'IndexController@singleProduct')->name('product.single');
Route::get('category/{catSlug}', 'IndexController@category')->name('category');
Route::get('page/{pageSlug}', 'IndexController@singlePage')->name('page.single');
Route::get('search/', 'IndexController@search')->name('product.search');

Route::get('cart', 'CartController@cart')->name('cart.index');
Route::post('cart/add-to-cart/{product}', 'CartController@addToCart')->name('cart.add');
Route::get('cart/rapid-add/{product}', 'CartController@rapidAdd')->name('rapid.add');
Route::get('cart/delete/{id}', 'CartController@deleteCart')->name('cart.delete');
Route::get('cart/decr/{id}/{qty}', 'CartController@decreaseCart')->name('cart.increase');
Route::get('cart/incr/{id}/{qty}', 'CartController@increaseCart')->name('cart.decrease');


Route::group(['middleware'=>'auth'], function()
{
    // Route::resource('wishlist', 'WishlistController');
    Route::get('wishlist', 'WishlistController@index')->name('wishlist.index');
    Route::post('wishlist/{product}', 'WishlistController@addToWishlist')->name('addToWishlist');
    Route::get('wishlist/{wishlist}', 'WishlistController@removeProduct')->name('wishlist.remove');
    Route::get('cart/checkout', 'CartController@checkout')->name('checkout');
});


Route::get('/profile', 'HomeController@index')->name('home');
Route::post('/profile/changepassword', 'HomeController@changeUserPassword')->name('user.password.change');
Route::post('/profile/order/{order}', 'HomeController@orderCancle')->name('order.cancle');

Route::get('/test', function () {
    return view('frontend.test');
});
