<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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
Route::get('/', function () {
    return view('pages.home');
})->name('home');
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
Route::get('cart', function(){
    return view('pages.cart');
})->name('cart');
Route::get('detail', function(){
    return view('pages.detail');
})->name('detail');

// Route::post('users', function(){
//     dd($_REQUEST);
// });

// Route::view('welcome', 'welcome');

// match:: mapping url vowis callback tuowng uwngs theo phương thức khai baos  
// any:: mapping vs callback tương uwngs  
// =====================================================ADMIN==============================================
Route::get('admin/users', function(){
    $list = DB::table('users')->get();
    dd($list);
    return view('adminapp.users.index');
});
Route::get('admin/', function(){
    return view('adminlayout');
});

