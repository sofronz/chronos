<?php
namespace App\Filament\Admin\Resources\Bookings\Pages;

use App\Enum\BookingStatus;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use App\Filament\Admin\Resources\Bookings\BookingResource;

class ListBookings extends ListRecords
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
            CreateAction::make(),
        ];
    }

    /**
     * @return array
     */
    public function getTabs(): array
    {
        return [
            'all'    => Tab::make('All'),
            'submit' => Tab::make('Submit')
                ->modifyQueryUsing(
                    fn ($query) =>
                    $query->where('status', BookingStatus::Submit)
                ),
            'approved' => Tab::make('Approved')
                ->modifyQueryUsing(
                    fn ($query) =>
                    $query->where('status', BookingStatus::Approved)
                ),
            'rejected' => Tab::make('Rejected')
                ->modifyQueryUsing(
                    fn ($query) =>
                    $query->where('status', BookingStatus::Rejected)
                ),
        ];
    }
}
