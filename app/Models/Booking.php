<?php
namespace App\Models;

use Carbon\Carbon;
use App\Enum\DurationType;
use App\Enum\BookingStatus;
use App\Models\Taxonomy\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * @property string $id
 * @property string $room_id
 * @property string $user_id
 * @property \Illuminate\Support\Carbon $date
 * @property BookingStatus $status
 * @property string $purpose
 * @property DurationType $duration_type
 * @property string $duration_interval
 * @property object|null $metadata
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $end_time
 * @property-read mixed $is_conflict
 * @property-read Room $room
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking whereDurationInterval($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking whereDurationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking whereMetadata($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking wherePurpose($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking whereRoomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking whereUserId($value)
 * @mixin \Eloquent
 */
class Booking extends Model
{
    use HasUuids;

    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var string
     */
    protected $table = 'bookings';

    /**
     * @var array
     */
    protected $fillable = [
        'room_id',
        'user_id',
        'date',
        'status',
        'purpose',
        'duration_type',
        'duration_interval',
        'metadata',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'metadata'      => 'object',
        'date'          => 'datetime',
        'status'        => BookingStatus::class,
        'duration_type' => DurationType::class,
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return Attribute
     */
    public function isConflict(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->status == BookingStatus::Approved ? false : self::query()
                ->where('room_id', $this->room_id)
                ->whereDate('date', Carbon::parse($this->date)->format('Y-m-d'))
                ->whereNot('status', BookingStatus::Approved)
                ->where('id', '!=', $this->id)
                ->exists()
        );
    }

    /**
     * @return Attribute
     */
    public function endTime(): Attribute
    {
        return Attribute::make(
            get: fn () => match ($this->duration_type) {
                DurationType::Day          => Carbon::parse($this->date)->addDays((int) $this->duration_interval)->format('M d, Y H:i:s'),
                DurationType::Week         => Carbon::parse($this->date)->addWeeks((int) $this->duration_interval)->format('M d, Y H:i:s'),
                DurationType::Month        => Carbon::parse($this->date)->addMonths((int) $this->duration_interval)->format('M d, Y H:i:s'),
                default                    => Carbon::parse($this->date),
            }
        );
    }
}
