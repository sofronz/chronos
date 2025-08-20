<?php
namespace App\Filament\Admin\Resources\Bookings\Tables;

use Filament\Tables\Table;
use App\Enum\BookingStatus;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Notifications\Notification;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
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
                    ->getStateUsing(fn ($record) => $record->is_conflict ? 'Conflict' : $record->status->value)
                    ->color(fn ($record) => match (true) {
                        $record->is_conflict                                                                                  => 'warning',
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
                EditAction::make(),
                DeleteAction::make(),
                Action::make('approve')
                    ->label('Approve')
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->requiresConfirmation()
                    ->modalHeading('Confirm Approval')
                    ->modalDescription(fn ($record) => "Are you sure you want to approve booking for room {$record->room->name} on {$record->date->format('Y-m-d')}?")
                    ->action(function ($record) {
                        $record->update([
                            'status' => BookingStatus::Approved,
                        ]);

                        Notification::make()
                            ->title('Booking Approved')
                            ->success()
                            ->send();
                    })
                    ->visible(
                        fn ($record) =>
                        in_array($record->status->value, [
                            BookingStatus::Rejected->value,
                            BookingStatus::Submit->value,
                        ]) && ! $record->is_conflict
                    ),
                Action::make('reject')
                    ->label('Reject')
                    ->color('danger')
                    ->icon('heroicon-o-x-circle')
                    ->action(function ($record) {
                        $record->update([
                            'status' => BookingStatus::Rejected,
                        ]);

                        Notification::make()
                            ->title('Booking Rejected')
                            ->success()
                            ->send();
                    })
                    ->requiresConfirmation()
                    ->modalHeading('Confirm Rejection')
                    ->modalDescription(fn ($record) => "Are you sure you want to reject booking for room {$record->room->name} on {$record->date->format('Y-m-d')}?")
                    ->visible(
                        fn ($record) =>
                        in_array($record->status->value, [
                            BookingStatus::Approved->value,
                            BookingStatus::Submit->value,
                        ]) && ! $record->is_conflict
                    ),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
