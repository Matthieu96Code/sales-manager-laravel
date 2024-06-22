<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'customer_id',
        'user_id',
        'quantity',
        'taxes',
    ];

    public function scopeSearch($query, $value){
        $query->where('product_id', 'like', "%{$value}%")
        ->orwhere('customer_id', 'like', "%{$value}%")
        ->orwhere('user_id', 'like', "%{$value}%")
        ->orwhere('quantity', 'like', "%{$value}%")
        ->orwhere('taxes', 'like', "%{$value}%");
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function history(){
        return $this->hasOne(History::class);
    }
}
