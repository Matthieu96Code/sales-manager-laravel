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
        'user_id',
    ];

    public function scopeSearch($query, $value){
        $query->where('name', 'like', "%{$value}%")
        ->orwhere('unit', 'like', "%{$value}%")
        ->orwhere('quantity', 'like', "%{$value}%")
        ->orwhere('price', 'like', "%{$value}%")
        ->orwhere('detail', 'like', "%{$value}%");
    }
    
    public function sales(){
        return $this->hasMany(sale::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function supplies(){
        return $this->hasMany(Supply::class);
    }

    public function histories(){
        return $this->hasMany(History::class);
    }
}
