<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
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
// ======================================================APP================================================
Route::get('/', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact');

Route::get('detail/{id}', 'HomeController@detail')->name('detail');
Route::get('danh-muc-san-pham/{id}', 'HomeController@product_category')->name('get_pro_cate');
// Route::post('users', function(){
//     dd($_REQUEST);
// });

// Route::view('welcome', 'welcome');

// match:: mapping url vowis callback tuowng uwngs theo phương thức khai baos  
// any:: mapping vs callback tương uwngs  
// =====================================================ADMIN==============================================

// https://laravel.com/docs/8.x/routing#route-model-binding

Route::group([
    'middleware' => 'check_login'
], function(){
    Route::group(
        [
            'prefix' => 'admin',
            'as' => 'admin.',
            'namespace' => 'Admin',
            'middleware' => ['check_admin'],
        ], function (){
            Route::get('dashboard', 'AdminController@index')->name('dashboard');
            Route::group(
                [
                    'prefix' => 'users',
                    'as' => 'users.',
                    
                ], function (){
                    Route::get('/', 'UserController@index')->name('index');
                    
                    //add user
                    Route::get('add', 'UserController@create')->name('add');
                    
                    Route::post('store', 'UserController@store')->name('store');
                    // show
                    Route::get('/{id}', 'UserController@show')->name('show');
                    // show user cart detail
                    Route::get('show-cart-detail/{id}', 'UserController@showdetail')->name('showdetail');
                    // thay đổi tình trạng đơn hàng
                    Route::post('update-invoice-status','UserController@update_invoice_status')->name('updateInvoiceStatus');
                    // edit user
                    Route::get('edit/{id}', 'UserController@edit')->name('edit');
                    Route::post('edit/{id}', 'UserController@update')->name('update');
                    //delete user
                    Route::post('delete/{id}', 'UserController@delete')->name('delete');
                }
            );
            Route::group(
                [
                    'prefix' => 'category',
                    'as' => 'category.',
                    
                ], function (){
                    Route::get('/', 'CategoryController@index')->name('index');
                    // Route::get('/{id}', '@show')->name('show');
                    // //add user
                    Route::get('add', 'CategoryController@create')->name('add');
                    Route::post('store', 'CategoryController@store')->name('store');
                    // // edit user
                    Route::get('edit/{id}', 'CategoryController@edit')->name('edit');
                    Route::post('edit/{id}', 'CategoryController@update')->name('update');
                    // //delete user
                    Route::post('delete/{id}', 'CategoryController@delete')->name('delete');
                }
            );
            Route::group(
                [
                    'prefix' => 'product',
                    'as' => 'product.',
                    
                ], function (){
                    Route::get('/', 'ProductController@index')->name('index');
                    
                    // //add user
                    Route::get('add', 'ProductController@create')->name('add');
                    Route::post('store', 'ProductController@store')->name('store');
                    // // edit user
                    Route::get('search', 'ProductController@search')->name('search');
                    Route::get('edit/{id}', 'ProductController@edit')->name('edit');
                    Route::post('edit/{id}', 'ProductController@update')->name('update');
                    // //delete user
                    Route::post('delete/{id}', 'ProductController@delete')->name('delete');
                }
            );  
            Route::group(
                [
                    'prefix' => 'contact',
                    'as' => 'contact.',
                    
                ], function (){
                    Route::get('/', 'AdminContactController@index')->name('index');
                    Route::post('delete','AdminContactController@deletecontact')->name('delete');
                }
            ); 
        }
    );
});
// login
Route::get('/login', 'Auth\LoginController@loginForm')->name('auth.loginForm');
Route::post('/login', 'Auth\LoginController@login')->name('auth.login');
Route::post('/logout', 'Auth\LoginController@logout')->name('auth.logout');
// Route::view('/hello','layout');
Route::get('/profile', 'Auth\UpdateUserController@index')->name('auth.profile');
// register
Route::get('/register', 'Auth\RegisterController@register')->name('auth.register');
Route::post('/register', 'Auth\RegisterController@add_user')->name('auth.adduser');
// cart
Route::get('/cart', 'CartController@getCart')->name('cart');
//add to cart
Route::post('/add-to-cart', 'CartController@addtocart')->name('addcart');
// delete cartitem
Route::get('delete-cart-item/{id}', 'CartController@deleteCartItem')->name('deleteItem');
// delete cart
Route::get('delete-all-item', 'CartController@deleteAllCartItem')->name('deleteAllItem');
// update cartitem
Route::post('/update-cart-item', 'CartController@update_Cart_Item')->name('updateCartItem');
// checkout
Route::post('/check-out', 'CheckOutController@checkout')->name('checkout');
// gửi mail sau khi đã checkout
Route::get('/send-mail', 'CheckOutController@sendMail')->name('sendMail');
// oder status
Route::get('/oder-status', 'CheckOutController@oderstatus')->name('oderstatus');
// ----------------------------------------------contact--------------------------------------//
Route::get('/contact', 'ContactController@contact')->name('contact');
Route::post('/contact', 'ContactController@putContact')->name('putcontact');



