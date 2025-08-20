<?php
namespace App\Models\Scopes;

use App\Models\Taxonomy;
use App\Models\Taxonomy\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class RoomScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $room = Taxonomy::whereSlug(Room::$rootSlug)->first();
        $builder->where('parent_id', $room->id);
    }
}
