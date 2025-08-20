<?php
namespace App\Filament\Admin\Resources\Rooms\Tables;

use App\Models\Taxonomy;
use Filament\Tables\Table;
use App\Models\Taxonomy\Room;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;

class RoomsTable
{
    public static function configure(Table $table): Table
    {
        $root = Taxonomy::whereSlug(Room::$rootSlug)->first();

        return $table
            ->modifyQueryUsing(fn ($query) => $query->where('parent_id', $root->id))
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('slug')
                    ->searchable(),
                TextColumn::make('description'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
