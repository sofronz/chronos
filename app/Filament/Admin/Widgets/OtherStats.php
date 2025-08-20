<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Taxonomy\Room;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OtherStats extends StatsOverviewWidget
{
    protected int|array|null $columns = 2;

    /**
     * @return array
     */
    protected function getStats(): array
    {
        return [
            Stat::make('Total User',  User::whereHas(
                'role',
                fn($query) =>
                $query->where('slug', 'roles-user')
            )->count()),
            Stat::make('Total Rooms', Room::all()->count()),
        ];
    }
}
