<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['cliente_id', 'status_id', 'fecha', 'payment_method_id', 'total'];
    use HasFactory;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function payment_method()
    {
        return $this->belongsTo(Payment_Method::class);
    }

}
