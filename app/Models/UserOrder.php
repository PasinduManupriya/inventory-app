<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'product_id',
        'user_product_quantity',
        'order_process',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
