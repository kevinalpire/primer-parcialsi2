<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    public $table = 'products_orders';
    protected $fillable = ['product_id', 'order_id', 'cantidad', 'subtotal'];
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
