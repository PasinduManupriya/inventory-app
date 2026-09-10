<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory;
    protected $table = 'user_orders';
    protected $fillable = [
        'user_id',
        'product_id',
        'user_product_quantity',
        'order_process',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
