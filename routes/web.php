<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostTagController;
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

Route::get('/', 'HomeController@home')->name('home');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/secret', [HomeController::class, 'secret'])->name('secret')->middleware('can:home.secret');
// Route::resource('posts', 'PostController')->middleware('auth');
Route::resource('posts', 'PostController');
Auth::routes();

Route::get('posts/tag/{tag}', [PostTagController::class, 'index'])->name('posts.tags.index');
Route::resource('posts.comments', 'CommentsController')->only(['store']);