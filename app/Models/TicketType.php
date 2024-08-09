<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketType extends Model
{
    use HasFactory;
    protected $primaryKey = 'ticket_type_id';
    protected $fillable = ['ticket_type_event_id', 'ticket_type_name', 'ticket_type_price', 'ticket_type_quantity', 'ticket_type_real_quantity', 'ticket_type_total_quantity', 'ticket_type_description'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'ticket_type_event_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'ticket_ticket_type_id');
    }
}
