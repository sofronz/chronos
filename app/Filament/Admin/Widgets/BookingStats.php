<?php
namespace App\Filament\Admin\Widgets;

use App\Models\Booking;
use App\Enum\BookingStatus;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BookingStats extends StatsOverviewWidget
{
    /**
     * @return array
     */
    protected function getStats(): array
    {
        return [
            Stat::make('Submit Bookings', Booking::where('status', BookingStatus::Submit)->count()),
            Stat::make('Approved Bookings', Booking::where('status', BookingStatus::Approved)->count()),
            Stat::make('Rejected Bookings', Booking::where('status', BookingStatus::Rejected)->count()),
            Stat::make('Conflict Bookings', Booking::all()->filter(fn ($b) => $b->is_conflict)->count()),
        ];
    }
}
