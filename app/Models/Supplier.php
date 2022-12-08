<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'address',
        'active'
    ];

    public function products() {
        return $this->belongsToMany(Product::class, 'supplier_products', 'supplier_id');
    }

    public function receipts() {
        return $this->hasMany(Receipt::class);
    }

    public function scopeSearch($query, $data)
    {
        if (isset($data['search'])) {
            $query->where('name', 'LIKE', '%' . $data['search'] . '%');
        }
    }
}
