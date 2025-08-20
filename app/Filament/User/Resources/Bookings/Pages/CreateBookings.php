<?php
namespace App\Filament\User\Resources\Bookings\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\User\Resources\Bookings\BookingsResource;

class CreateBookings extends CreateRecord
{
    protected static string $resource = BookingsResource::class;
}
