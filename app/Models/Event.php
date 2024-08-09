<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
use HasFactory;

protected $guarded = [];

/**
* Get the ticket types for the event.
* @return HasMany
*/
public function ticketTypes() : HasMany
{
return $this->hasMany(TicketType::class, 'ticket_type_event_id');
}
}