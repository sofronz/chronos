<?php
namespace App\Filament\User\Resources\Bookings\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use App\Filament\User\Resources\Bookings\BookingsResource;

class EditBookings extends EditRecord
{
    protected static string $resource = BookingsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
