<?php
namespace App\Filament\Admin\Resources\Bookings\Pages;

use Carbon\Carbon;
use App\Models\Booking;
use App\Enum\BookingStatus;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;
use App\Filament\Admin\Resources\Bookings\BookingResource;

class CreateBooking extends CreateRecord
{
    /**
     * @var string
     */
    protected static string $resource = BookingResource::class;

    /**
     * @param array $data
     *
     * @return array
     */
    protected function mutateFormDataBeforeCreate(array $data): array
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

        $data['status'] = BookingStatus::Submit;

        return $data;
    }
}
