<?php

namespace App\Enum;

use Essa\APIToolKit\Enum\Enum;

class EventCategoryEnum extends Enum
{
    const OTHER = 'Autres';
    const CONCERT='Concert-Spectacle';
    const LUNCH='Diner Gala';
    const CONFERENCE='Conférence';
    const WORKSHOP='Atelier';
    const FESTIVAL='Festival';
    const FORMATION='Formation';
}