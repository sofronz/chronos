<?php
namespace App\Filament\User\Resources\Bookings\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\User\Resources\Bookings\BookingsResource;

class ListBookings extends ListRecords
{
    protected static string $resource = BookingsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
