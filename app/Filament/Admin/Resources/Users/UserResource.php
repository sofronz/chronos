<?php
namespace App\Filament\Admin\Resources\Users;

use BackedEnum;
use App\Models\User;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Admin\Resources\Users\Pages\EditUser;
use App\Filament\Admin\Resources\Users\Pages\ListUsers;
use App\Filament\Admin\Resources\Users\Pages\CreateUser;
use App\Filament\Admin\Resources\Users\Schemas\UserForm;
use App\Filament\Admin\Resources\Users\Tables\UsersTable;

class UserResource extends Resource
{
    /**
     * @var string|null
     */
    protected static ?string $model = User::class;

    /**
     * @var string|null
     */
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Users;

    /**
     * @var int|null
     */
    protected static ?int $navigationSort = 2;

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
        return UserForm::configure($schema);
    }

    /**
     * @param Table $table
     *
     * @return Table
     */
    public static function table(Table $table): Table
    {
        return UsersTable::configure($table);
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
            'index'  => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit'   => EditUser::route('/{record}/edit'),
        ];
    }
}
