<?php
namespace App\Filament\Admin\Resources\Bookings\Schemas;

use App\Enum\BookingStatus;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;

class BookingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')->label('ID'),
                TextEntry::make('room.name'),
                TextEntry::make('user.name'),
                TextEntry::make('date')->dateTime(),
                TextEntry::make('end_time'),
                TextEntry::make('status')
                    ->badge()
                    ->color(fn ($record) => match (true) {
                        $record->is_conflict                                                                                  => 'warning',
                        $record->status instanceof BookingStatus && $record->status->value === BookingStatus::Submit->value   => 'gray',
                        $record->status instanceof BookingStatus && $record->status->value === BookingStatus::Approved->value => 'success',
                        $record->status instanceof BookingStatus && $record->status->value === BookingStatus::Rejected->value => 'danger',
                        default                                                                                               => 'primary',
                    }),
                TextEntry::make('duration_interval'),
                TextEntry::make('duration_type'),
            ]);
    }
}
