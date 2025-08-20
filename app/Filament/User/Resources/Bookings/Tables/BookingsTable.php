<?php

namespace App\Filament\User\Resources\Bookings\Tables;

use App\Enum\BookingStatus;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn($query) => $query->where('user_id', Auth::user()->id))
            ->columns([
                TextColumn::make('room.name')
                    ->searchable(),
                TextColumn::make('user.name')
                    ->searchable(),
                TextColumn::make('date')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('end_time'),
                TextColumn::make('status')
                    ->badge()
                    ->getStateUsing(fn($record) => $record->is_conflict ? 'Conflict' : $record->status->value)
                    ->color(fn($record) => match (true) {
                        $record->status instanceof BookingStatus && $record->status->value === BookingStatus::Submit->value   => 'gray',
                        $record->status instanceof BookingStatus && $record->status->value === BookingStatus::Approved->value => 'success',
                        $record->status instanceof BookingStatus && $record->status->value === BookingStatus::Rejected->value => 'danger',
                        default                                                                                               => 'primary',
                    }),
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
                ViewAction::make(),
                EditAction::make()->visible(
                    fn($record) =>
                    !in_array($record->status->value, [
                        BookingStatus::Approved->value,
                        BookingStatus::Rejected->value,
                    ])
                ),
                DeleteAction::make()->visible(
                    fn($record) =>
                    !in_array($record->status->value, [
                        BookingStatus::Approved->value,
                        BookingStatus::Rejected->value,
                    ])
                ),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
