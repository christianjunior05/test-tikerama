<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model{


    use HasFactory;
    protected $fillable = ['order_number', 'order_event_id', 'order_price', 'order_type', 'order_payment', 'order_info'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'order_event_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'ticket_order_id');
    }
    public function orderIntent()
    {
        return $this->belongsTo(OrderIntent::class);
    }
}
