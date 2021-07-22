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


Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin',
    ], function (){
        Route::group(
            [
                'prefix' => 'users',
                'as' => 'users.'
            ], function (){
                Route::get('/', 'UserController@index')->name('index');
            //add user
                Route::get('add', 'UserController@create')->name('add');
                Route::post('store', 'UserController@store')->name('store');
                // edit user
                Route::get('edit/{id}', 'UserController@edit')->name('edit');
                Route::post('edit/{id}', 'UserController@update')->name('update');
            }
        );
            
            
           
    }
);


// Route::view('/hello','layout');

