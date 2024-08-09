<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Ticket extends Model
{
   
    protected $fillable = ['ticket_event_id', 'ticket_email', 'ticket_phone', 'ticket_price', 'ticket_order_id', 'ticket_key', 'ticket_ticket_type_id', 'ticket_status'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'ticket_event_id');
    }

    public function ticketType()
    {
        return $this->belongsTo(TicketType::class, 'ticket_ticket_type_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'ticket_order_id');
    }
}