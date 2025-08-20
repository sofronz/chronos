<?php

namespace App\Filament\User\Resources\Bookings\Pages;

use App\Filament\User\Resources\Bookings\BookingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBooking extends CreateRecord
{
    protected static string $resource = BookingResource::class;
}
