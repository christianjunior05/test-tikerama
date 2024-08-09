<?php

namespace App\Http\Controllers\Api;

use App\Models\TicketType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\TicketController;


class TicketController extends Controller
{
    public function index($eventId)
    {
        $ticketType = TicketType::where('ticket_type_event_id', $eventId)->get();
        return response()->json($ticketType);
    }
}
