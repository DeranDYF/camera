<?php

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

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/user', function () {
//     return view('user');
// });
Auth::routes();

//MAIN MENU
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/role', [App\Http\Controllers\RoleController::class, 'index'])->name('role');


//ADD , EDIT, DELETE CAROUSEL
Route::any('/addcarousel', [App\Http\Controllers\HomeController::class, 'create'])->name('addcarousel');
Route::any('/deletecarousel/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('deletecarousel');
Route::any('/editcarousel/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('editcarousel');

//ADD , EDIT, DELETE CATEGORY
Route::post('/addcategory', [App\Http\Controllers\CategoryController::class, 'create'])->name('addcategory');
Route::any('/deletecategory/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('deletecategory');
Route::any('/editcategory/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('editcategory');

//ADD , EDIT, DELETE USER
Route::post('/adduser', [App\Http\Controllers\UserController::class, 'create'])->name('adduser');
Route::any('/deleteuser/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('deleteuser');
Route::any('/edituser/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edituser');

//ADD , EDIT, DELETE ROLE
Route::post('/addrole', [App\Http\Controllers\RoleController::class, 'create'])->name('addrole');
Route::any('/deleterole/{id}', [App\Http\Controllers\RoleController::class, 'delete'])->name('deleterole');
Route::any('/editrole/{id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('editrole');



//ADD , EDIT, DELETE USER