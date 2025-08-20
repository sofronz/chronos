<?php

namespace App\Filament\User\Resources\Bookings\Pages;

use App\Filament\User\Resources\Bookings\BookingResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

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
