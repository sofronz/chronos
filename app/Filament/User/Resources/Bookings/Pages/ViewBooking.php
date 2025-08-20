<?php
namespace App\Filament\User\Resources\Bookings\Pages;

use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\User\Resources\Bookings\BookingResource;

class ViewBooking extends ViewRecord
{
    /**
     * @var string
     */
    protected static string $resource = BookingResource::class;

    /**
     * @return array
     */
    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            DeleteAction::make(),
        ];
    }
}
