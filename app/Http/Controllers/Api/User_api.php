<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class User_api extends Controller
{
    public function userGetAll()
    {
         return response()->json([
                   'message'   => 'success',
                   'data'      => User::all()
                   ], 200);
    }
}