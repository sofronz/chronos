<?php
namespace App\Filament\Admin\Resources\Bookings\Schemas;

use App\Models\User;
use App\Enum\DurationType;
use Filament\Schemas\Schema;
use App\Models\Taxonomy\Room;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        $users = User::whereHas('role', function ($role) {
            $role->where('slug', 'roles-user');
        })->get();

        return $schema
            ->components([
                Select::make('room_id')
                    ->label('Room')
                    ->options(Room::pluck('name', 'id')->toArray())
                    ->searchable()
                    ->required(),
                Select::make('user_id')
                    ->label('User')
                    ->options($users->pluck('name', 'id')->toArray())
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
