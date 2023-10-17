<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'genero',
        'direccion',
        'telefono',
        'user_id'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function cantOrders()
    {
        return optional($this->orders())->count() ?? 0;
    }

    public function cart()
    {
        return $this->orders()->where('status_id', 1)->first();
    }
}
