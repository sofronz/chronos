<?php

namespace App\Filament\User\Widgets;

use App\Enum\BookingStatus;
use App\Models\Booking;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

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
