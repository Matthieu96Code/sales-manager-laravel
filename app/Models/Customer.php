<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'location',
    ];

    public function scopeSearch($query, $value){
        $query->where('name', 'like', "%{$value}%")
        ->orwhere('email', 'like', "%{$value}%")
        ->orwhere('phone_number', 'like', "%{$value}%")
        ->orwhere('location', 'like', "%{$value}%");
    }
}
