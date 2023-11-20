<?php

namespace App\Enums;

enum TableStatus: string
{
    case Available = 'available'; 
    case Unavailable = 'unavailable'; 
    case Pending = 'pending'; 
}