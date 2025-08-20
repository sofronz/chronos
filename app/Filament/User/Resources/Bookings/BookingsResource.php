<?php
namespace App\Filament\User\Resources\Bookings;

use BackedEnum;
use App\Models\Bookings;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\User\Resources\Bookings\Pages\EditBookings;
use App\Filament\User\Resources\Bookings\Pages\ListBookings;
use App\Filament\User\Resources\Bookings\Pages\CreateBookings;
use App\Filament\User\Resources\Bookings\Schemas\BookingsForm;
use App\Filament\User\Resources\Bookings\Tables\BookingsTable;

class BookingsResource extends Resource
{
    protected static ?string $model = Bookings::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'purpose';

    public static function form(Schema $schema): Schema
    {
        return BookingsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BookingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListBookings::route('/'),
            'create' => CreateBookings::route('/create'),
            'edit'   => EditBookings::route('/{record}/edit'),
        ];
    }
}
