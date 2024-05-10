<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit',
        'quantity',
        'price',
        'detail',
    ];

    public function scopeSearch($query, $value){
        $query->where('name', 'like', "%{$value}%")
        ->orwhere('unit', 'like', "%{$value}%")
        ->orwhere('quantity', 'like', "%{$value}%")
        ->orwhere('price', 'like', "%{$value}%")
        ->orwhere('detail', 'like', "%{$value}%");
    }
}
