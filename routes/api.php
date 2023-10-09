<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\Category_api;
use App\Http\Controllers\Api\Equipment_api;
use App\Http\Controllers\Api\User_api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('equipment', 'Equipment_api');
Route::get('/category_all', [Category_api::class, 'categoryGetAll']);
Route::get('/equipment_all', [Equipment_api::class, 'equipmentGetAll']);
Route::get('/user_all', [User_api::class, 'userGetAll']);