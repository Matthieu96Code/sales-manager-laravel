<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'product_id',
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

    public function sale(){
        return $this->belongsTo(Sale::class);
    }

    public function supply(){
        return $this->belongsTo(Supply::class);
    }
}
