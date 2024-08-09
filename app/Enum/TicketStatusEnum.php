<?php

namespace App\Enum;


use Essa\APIToolKit\Enum\Enum;

class TicketStatusEnum extends Enum
{
    const ACTIVE = 'active';
    const VALIDATED = 'validated';
    const EXPIRED = 'expired';
    const CANCELLED = 'cancelled';
}