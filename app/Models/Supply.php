<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'quantity',
    ];

    public function scopeSearch($query, $value){
        $query->where('product_id', 'like', "%{$value}%")
        ->orwhere('user_id', 'like', "%{$value}%")
        ->orwhere('quantity', 'like', "%{$value}%");
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function history(){
        return $this->hasOne(History::class);
    }
}
