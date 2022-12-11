<?php

use App\Http\Controllers\AboutPostController;
use App\Http\Controllers\ContactPostController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['namespace'=>'App\Http\Controllers\Post'], function(){
    Route::get('/posts', 'IndexController' )->name('post.index');
    Route::get('/posts/create', 'CreateController')->name('post.create');
    Route::post('/posts', 'StoreController')->name('post.store');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('post.delete');
});
Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->middleware('admin')->group(function (){
    Route::namespace('Post')->group( function (){
        Route::get('/posts', 'IndexController')->name('admin.post.index');
        Route::get('/posts/create', 'CreateController')->name('admin.post.create');
        Route::post('/posts', 'StoreController')->name('admin.post.store');

        Route::get('/posts/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/posts/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::patch('/posts/{post}', 'UpdateController')->name('admin.post.update');
        Route::delete('/posts/{post}', 'DestroyController')->name('admin.post.delete');
    });
});
//Route::get('/posts/update', [PostController::class, 'update']);
//Route::get('/posts/delete', [PostController::class, 'delete']);
//Route::get('/posts/restore', [PostController::class, 'restore']);
//Route::get('/posts/first_or_create', [PostController::class, 'firstOrCreate']);
//Route::get('/posts/update_or_create', [PostController::class, 'updateOrCreate']);



Route::get('/contacts', [ContactPostController::class, 'index'])->name('contact.index');
Route::get('/about', [AboutPostController::class, 'index'])->name('about.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
