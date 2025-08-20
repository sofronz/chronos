<?php
namespace App\Filament\User\Resources\Bookings;

use BackedEnum;
use App\Models\Booking;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\User\Resources\Bookings\Pages\EditBooking;
use App\Filament\User\Resources\Bookings\Pages\ViewBooking;
use App\Filament\User\Resources\Bookings\Pages\ListBookings;
use App\Filament\User\Resources\Bookings\Pages\CreateBooking;
use App\Filament\User\Resources\Bookings\Schemas\BookingForm;
use App\Filament\User\Resources\Bookings\Tables\BookingsTable;
use App\Filament\User\Resources\Bookings\Schemas\BookingInfolist;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'purpose';

    public static function form(Schema $schema): Schema
    {
        return BookingForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BookingInfolist::configure($schema);
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
            'create' => CreateBooking::route('/create'),
            'view'   => ViewBooking::route('/{record}'),
            'edit'   => EditBooking::route('/{record}/edit'),
        ];
    }
}
