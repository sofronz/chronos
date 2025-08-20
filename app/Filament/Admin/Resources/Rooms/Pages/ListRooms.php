<?php
namespace App\Filament\Admin\Resources\Rooms\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Admin\Resources\Rooms\RoomsResource;

class ListRooms extends ListRecords
{
    protected static string $resource = RoomsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
