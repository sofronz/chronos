<?php

namespace App\Filament\User\Resources\Bookings\Schemas;

use App\Enum\BookingStatus;
use App\Enum\DurationType;
use App\Models\Taxonomy\Room;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('room_id')
                    ->label('Room')
                    ->options(Room::pluck('name', 'id')->toArray())
                    ->searchable()
                    ->required(),
                DateTimePicker::make('date')
                    ->date()
                    ->required(),
                Textarea::make('purpose')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('duration_interval')
                    ->numeric()
                    ->required(),
                Select::make('duration_type')
                    ->options(
                        collect(DurationType::cases())->mapWithKeys(function ($case) {
                            return [$case->value => ucfirst(strtolower($case->name))];
                        })->toArray()
                    )
                    ->required(),
            ]);
    }
}
