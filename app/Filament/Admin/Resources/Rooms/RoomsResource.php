<?php
namespace App\Filament\Admin\Resources\Rooms;

use BackedEnum;
use App\Models\Taxonomy;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Admin\Resources\Rooms\Pages\EditRooms;
use App\Filament\Admin\Resources\Rooms\Pages\ListRooms;
use App\Filament\Admin\Resources\Rooms\Pages\CreateRooms;
use App\Filament\Admin\Resources\Rooms\Schemas\RoomsForm;
use App\Filament\Admin\Resources\Rooms\Tables\RoomsTable;

class RoomsResource extends Resource
{
    /**
     * @var string|null
     */
    protected static ?string $model = Taxonomy::class;

    /**
     * @var string|null
     */
    protected static string|BackedEnum|null $navigationIcon = Heroicon::HomeModern;

    /**
     * @var int|null
     */
    protected static ?int $navigationSort = 3;

    /**
     * @var string|null
     */
    protected static ?string $pluralLabel = 'Rooms';
    
    /**
     * @var string|null
     */
    protected static ?string $label = 'Room';

    /**
     * @var string|null
     */
    protected static ?string $recordTitleAttribute = 'name';

    /**
     * @param Schema $schema
     *
     * @return Schema
     */
    public static function form(Schema $schema): Schema
    {
        return RoomsForm::configure($schema);
    }

    /**
     * @param Table $table
     *
     * @return Table
     */
    public static function table(Table $table): Table
    {
        return RoomsTable::configure($table);
    }

    /**
     * @return array
     */
    public static function getRelations(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public static function getPages(): array
    {
        return [
            'index'  => ListRooms::route('/'),
            'create' => CreateRooms::route('/create'),
            'edit'   => EditRooms::route('/{record}/edit'),
        ];
    }
}
