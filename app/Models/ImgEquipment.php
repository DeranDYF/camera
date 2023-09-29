<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImgEquipment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_equipment',
        'img',
    ];
}