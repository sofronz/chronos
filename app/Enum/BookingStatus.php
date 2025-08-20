<?php
namespace App\Enum;

enum BookingStatus: string
{
    case Submit = 'SUBMIT';

    case Approved = 'APPROVED';

    case Rejected = 'REJECTED';
}
