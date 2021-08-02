<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/excel', [PostController::class, "excel"]);
//way3
Route::middleware(['auth' , 'isAdmin'])->group(function () {
    Route::prefix('admin')->group(function () {
        // way2
        // Route::resource('/posts', PostController::class)->middleware("auth");
        Route::resource('/tags', TagController::class );
        Route::resource('/categories', CategoryController::class);
        Route::resource('/comments', CommentController::class);
        Route::resource('/users', UserController::class);
        Route::get('/users/delete/{user}', [UserController::class, "destroy"]);
        Route::get('/dashboard', [DashboardController::class, "index"]);
    });
});

Route::middleware(['auth'])->group(function () {
    Route::resource('/posts', PostController::class);
    Route::get('/posts/delete/{post}', [PostController::class, "destroy"]);
    Route::get('/posts/publish/{post}', [PostController::class, "publish"]);

});

Route::get('/{post}', [HomeController::class, "show"]);
Route::post('/saveComment/{post}', [HomeController::class, "saveComment"]);
Route::get('/', [HomeController::class, "index"]);
Route::get('/search/{text}', [HomeController::class, "search"]);



