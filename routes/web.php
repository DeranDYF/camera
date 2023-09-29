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
Route::get('/category', [App\Http\Controllers\CategoriesController::class, 'index'])->name('category');
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/role', [App\Http\Controllers\RoleController::class, 'index'])->name('role');
Route::get('/equipment', [App\Http\Controllers\EquipmentController::class, 'index'])->name('equipment');

Route::get('/user-setting/{id}', [App\Http\Controllers\UserController::class, 'user_detail'])->name('user-setting');


//ADD , EDIT, DELETE CAROUSEL
Route::post('/addcarousel', [App\Http\Controllers\HomeController::class, 'create'])->name('addcarousel');
Route::any('/deletecarousel/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('deletecarousel');
Route::any('/editcarousel/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('editcarousel');
Route::get('/get_all', [App\Http\Controllers\HomeController::class, 'get_all'])->name('get_all');

//ADD , EDIT, DELETE CATEGORY
Route::post('/addcategory', [App\Http\Controllers\CategoriesController::class, 'create'])->name('addcategory');
Route::any('/deletecategory/{id}', [App\Http\Controllers\CategoriesController::class, 'delete'])->name('deletecategory');
Route::any('/editcategory/{id}', [App\Http\Controllers\CategoriesController::class, 'edit'])->name('editcategory');

//ADD , EDIT, DELETE USER
Route::post('/adduser', [App\Http\Controllers\UserController::class, 'create'])->name('adduser');
Route::any('/deleteuser/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('deleteuser');
Route::any('/edituser/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edituser');

//ADD , EDIT, DELETE ROLE
Route::post('/addrole', [App\Http\Controllers\RoleController::class, 'create'])->name('addrole');
Route::any('/deleterole/{id}', [App\Http\Controllers\RoleController::class, 'delete'])->name('deleterole');
Route::any('/editrole/{id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('editrole');



//ADD , EDIT, DELETE UQUIPMENT
Route::post('/addequipment', [App\Http\Controllers\EquipmentController::class, 'create'])->name('addequipment');
Route::any('/deleteequipment/{id}', [App\Http\Controllers\EquipmentController::class, 'delete'])->name('deleteequipment');
Route::any('/editequipment/{id}', [App\Http\Controllers\EquipmentController::class, 'edit'])->name('editequipment');