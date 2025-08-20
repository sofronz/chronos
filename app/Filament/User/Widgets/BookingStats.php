<?php
namespace App\Filament\User\Widgets;

use App\Models\Booking;
use App\Enum\BookingStatus;
use Illuminate\Support\Facades\Auth;
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
            Stat::make('Submit Bookings', Booking::where('user_id', Auth::user()->id)->where('status', BookingStatus::Submit)->count()),
            Stat::make('Approved Bookings', Booking::where('user_id', Auth::user()->id)->where('status', BookingStatus::Approved)->count()),
            Stat::make('Rejected Bookings', Booking::where('user_id', Auth::user()->id)->where('status', BookingStatus::Rejected)->count()),
        ];
    }
}
