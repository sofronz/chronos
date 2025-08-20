<?php

namespace App\Filament\User\Resources\Bookings\Pages;

use App\Enum\BookingStatus;
use App\Filament\User\Resources\Bookings\BookingResource;
use App\Models\Booking;
use Carbon\Carbon;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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

        $data['user_id'] = Auth::user()->id;
        $data['status'] = BookingStatus::Submit;

        return $data;
    }
}
