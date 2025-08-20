<?php
namespace App\Filament\User\Resources\Bookings\Pages;

use Carbon\Carbon;
use App\Models\Booking;
use App\Enum\BookingStatus;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Validation\ValidationException;
use App\Filament\User\Resources\Bookings\BookingResource;

class EditBooking extends EditRecord
{
    /**
     * @var string
     */
    protected static string $resource = BookingResource::class;

    /**
     * @return array
     */
    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $exists = Booking::query()
            ->where('room_id', $data['room_id'])
            ->whereDate('date', Carbon::parse($data['date'])->format('Y-m-d'))
            ->where('status', BookingStatus::Approved)
            ->exists();

        if ($exists) {
            Notification::make()
                ->title('Booking Conflict')
                ->body('There is already an Approved booking for this room on the selected date.')
                ->danger()
                ->send();

            throw ValidationException::withMessages(['date' => ['There is already an Approved booking for this room on the selected date.'], ]);
        }

        $data['user_id'] = Auth::user()->id;

        return $data;
    }
}
