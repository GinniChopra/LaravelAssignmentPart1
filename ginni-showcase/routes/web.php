<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterUserController;

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
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [ProjectController::class, 'home']);


Route::get('/about', function () {
    return view('about');
});


Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/projects', [AdminController::class, 'index']);

    /**     PROJECT ADMIN SIDE- CREATE EDIT DELETE    */
    Route::get('/admin/projects/create', [ProjectController::class, 'create']);
    Route::post('/admin/projects/create', [ProjectController::class, 'store']);

    Route::get('/admin/projects/{project}/edit', [ProjectController::class, 'edit']);
    Route::patch('/admin/projects/{project}/edit', [ProjectController::class, 'update']);

    Route::delete('/admin/projects/{project}/delete', [ProjectController::class, 'destroy']);

    /**     CATEGORY ADMIN SIDE- CREATE EDIT DELETE    */

    Route::get('/admin/categories/create', [CategoryController::class, 'create']);
    Route::post('/admin/categories/create', [CategoryController::class, 'store']);

    Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit']);
    Route::patch('/admin/categories/{category}/edit', [CategoryController::class, 'update']);

    Route::delete('/admin/categories/{category}/delete', [CategoryController::class, 'destroy']);

    /**   USER ADMIN SIDE- CREATE EDIT DELETE */

    Route::get('/admin/users/create', [RegisterUserController::class, 'create']);
    Route::post('/admin/users/create', [RegisterUserController::class, 'store']);

    Route::get('/admin/users/{user}/edit', [RegisterUserController::class, 'edit']);
    Route::patch('/admin/users/{user}/edit', [RegisterUserController::class, 'update']);

    Route::delete('/admin/users/{user}/delete', [RegisterUserController::class, 'destroy']);

    /**   TAGS ADMIN SIDE- CREATE EDIT DELETE */

    Route::get('/admin/tags/create', [TagController::class, 'create']);
    Route::post('/admin/tags/create', [TagController::class, 'store']);

    Route::get('/admin/tags/{tag}/edit', [TagController::class, 'edit']);
    Route::patch('/admin/tags/{tag}/edit', [TagController::class, 'update']);

    Route::delete('/admin/tags/{tag}/delete', [TagController::class, 'destroy']);


    Route::get('/admin/projects/{project}', [AdminController::class, 'show']);
});



Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('projects/categories/{category:slug}', [ProjectController::class, 'listByCategory']);

Route::get('projects/tags/{tag:slug}', [ProjectController::class, 'listByTag']);



Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{project}', [ProjectController::class, 'show']);


/***********************JSON API******************* */

Route::get('/api/projects', [ProjectController::class, 'getProjectsJSON']);
Route::get('/api/categories', [CategoryController::class, 'getCategoriesJSON']);
Route::get('/api/tags', [TagController::class, 'getTagsJSON']);


Route::fallback(function() {

    // Set a flash message
    session()->flash('error','Requested page not found.  Home you go.');

    // Redirect to /
    return redirect('/');
});