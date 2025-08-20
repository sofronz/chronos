<?php
namespace App\Filament\Admin\Resources\Bookings;

use BackedEnum;
use App\Models\Booking;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Admin\Resources\Bookings\Pages\EditBooking;
use App\Filament\Admin\Resources\Bookings\Pages\ViewBooking;
use App\Filament\Admin\Resources\Bookings\Pages\ListBookings;
use App\Filament\Admin\Resources\Bookings\Pages\CreateBooking;
use App\Filament\Admin\Resources\Bookings\Schemas\BookingForm;
use App\Filament\Admin\Resources\Bookings\Tables\BookingsTable;
use App\Filament\Admin\Resources\Bookings\Schemas\BookingInfolist;

class BookingResource extends Resource
{
    /**
     * @var string|null
     */
    protected static ?string $model = Booking::class;

    /**
     * @var string|null
     */
    protected static string|BackedEnum|null $navigationIcon = Heroicon::ArrowPathRoundedSquare;

    /**
     * @var int|null
     */
    protected static ?int $navigationSort = 4;

    /**
     * @var string|null
     */
    protected static ?string $recordTitleAttribute = 'purpose';

    /**
     * @param Schema $schema
     *
     * @return Schema
     */
    public static function form(Schema $schema): Schema
    {
        return BookingForm::configure($schema);
    }

    /**
     * @param Schema $schema
     *
     * @return Schema
     */
    public static function infolist(Schema $schema): Schema
    {
        return BookingInfolist::configure($schema);
    }

    /**
     * @param Table $table
     *
     * @return Table
     */
    public static function table(Table $table): Table
    {
        return BookingsTable::configure($table);
    }

    /**
     * @return array
     */
    public static function getRelations(): array
    {
        return [
        ];
    }

    /**
     * @return array
     */
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
