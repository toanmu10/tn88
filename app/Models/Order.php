<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'phone_number',
        'address',
        'message',
        'status',
    ];

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class, 'order_details', 'order_id');
    }
}
