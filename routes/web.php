<?php

use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostsController as AdminPostsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

Route::domain('{account}.e-soft.uz')->group(function($account){
    return $account;
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/category/{uri}', [CategoriesController::class, 'show']);
Route::get('/page/{page_number}', [HomeController::class, 'index']);
Route::get('/category/{uri}/page/{page_number}', [CategoriesController::class, 'show']);
Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', AdminHomeController::class);
    Route::resource('posts', AdminPostsController::class);
    Route::resource('categories', AdminCategoriesController::class);
});
Route::post('/upload', [AdminPostsController::class, 'upload']);
Route::get('/search', [HomeController::class, 'search']);
Route::get('/post/{uri}', function($uri){
    return redirect('/'.$uri);
});

Route::get('/{uri}', [PostsController::class, 'show']);
