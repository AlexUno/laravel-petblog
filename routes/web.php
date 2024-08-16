<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){
   Route::group(['namespace' => 'Dashboard'], function(){
      Route::get('/', 'IndexController')->name('admin.dashboard.index');
   });

   Route::group(['namespace' => 'User', 'prefix' => 'users'], function(){
       Route::get('/', 'IndexController')->name('admin.users.index');
       Route::get('/create', 'CreateController')->name('admin.users.create');
       Route::post('/', 'StoreController')->name('admin.users.store');
       Route::get('/{user}/edit', 'EditController')->name('admin.users.edit');
       Route::patch('/{user}', 'UpdateController')->name('admin.users.update');
       Route::delete('/{user}', 'DestroyController')->name('admin.users.destroy');
   });

   Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function(){
       Route::get('/', 'IndexController')->name('admin.categories.index');
       Route::get('/create', 'CreateController')->name('admin.categories.create');
       Route::post('/', 'StoreController')->name('admin.categories.store');
       Route::get('/{category}/edit', 'EditController')->name('admin.categories.edit');
       Route::patch('/{category}', 'UpdateController')->name('admin.categories.update');
       Route::delete('/{category}', 'DestroyController')->name('admin.categories.destroy');
   });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function(){
        Route::get('/', 'IndexController')->name('admin.tags.index');
        Route::get('/create', 'CreateController')->name('admin.tags.create');
        Route::post('/', 'StoreController')->name('admin.tags.store');
        Route::get('/{tag}/edit', 'EditController')->name('admin.tags.edit');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tags.update');
        Route::delete('/{tag}', 'DestroyController')->name('admin.tags.destroy');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function(){
        Route::get('/', 'IndexController')->name('admin.posts.index');
        Route::get('/create', 'CreateController')->name('admin.posts.create');
        Route::post('/', 'StoreController')->name('admin.posts.store');
        Route::get('/{post}', 'ShowController')->name('admin.posts.show');
        Route::get('/{post}/edit', 'EditController')->name('admin.posts.edit');
        Route::patch('/{post}', 'UpdateController')->name('admin.posts.update');
        Route::delete('/{post}', 'DestroyController')->name('admin.posts.destroy');
    });
});

Auth::routes();

Route::get('/', function(){
   return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
