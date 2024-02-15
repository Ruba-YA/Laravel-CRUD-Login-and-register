<?php
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
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
Route::get('/post/{ruba}' , [PostController::class,"show"]);
Route::get('/' , [PostController::class,"index"]);
Route::get('/' , [PostController::class,"search"]);
Route::get('/categories/{category:slug}',function(Category $category)
{
    return view ('posts' , ['posts' => $category->posts]);
});
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::post('/logout' , [AuthController::class , 'destroy'])->middleware('auth');
Route::get('/login', [AuthController::class, 'create'])->middleware('guest');
Route::post('/login', [AuthController::class, 'store'])->middleware('guest');

Route::get('/posts/index', [AdminController::class, 'index'])->middleware('auth');
Route::get('/posts/create', [AdminController::class, 'create'])->middleware('auth');
Route::post('/posts/create', [AdminController::class, 'store'])->middleware('auth');
Route::get('/posts/edit/{post}', [AdminController::class, 'edit'])->middleware('auth');
Route::post('/posts/edit/{post}', [AdminController::class, 'update'])->middleware('auth');
Route::get('/posts/delete/{post}', [AdminController::class, 'destroy'])->middleware('auth');


