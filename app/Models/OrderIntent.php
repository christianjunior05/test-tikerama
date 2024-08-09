<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderIntent extends Model
{
    protected $fillable = ['order_intent_price', 'order_intent_type', 'user_email', 'user_phone', 'expiration_date'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}