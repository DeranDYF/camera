<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\Categories;
use App\Models\ImgEquipment;

class Equipment_api extends Controller
{
    public function equipmentGetAll()
    {
        $equipment = Equipment::all(); 
        return response()->json($equipment);
    }
}