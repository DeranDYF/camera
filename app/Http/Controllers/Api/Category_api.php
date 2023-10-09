<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Categories;


class Category_api extends Controller
{
    public function categoryGetAll()
    {
        $category = Categories::all(); 
        return response()->json($category);
    }
}