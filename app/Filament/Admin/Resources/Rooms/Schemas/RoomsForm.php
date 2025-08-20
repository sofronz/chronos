<?php
namespace App\Filament\Admin\Resources\Rooms\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class RoomsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->required(),
            TextInput::make('description')->required(),
        ]);
    }
}
