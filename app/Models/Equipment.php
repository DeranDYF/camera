<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    public function role()
    {
        return $this->belongsTo(Categories::class, 'id_category');
        return $this->belongsTo(ImgEquipment::class, 'id');
    }
    protected $fillable = [
        'id',
        'id_category',
        'name',
        'stock',
        'cost',
        'descriptions',
    ];
}