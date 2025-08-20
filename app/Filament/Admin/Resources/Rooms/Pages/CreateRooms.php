<?php
namespace App\Filament\Admin\Resources\Rooms\Pages;

use App\Models\Taxonomy;
use Illuminate\Support\Str;
use App\Models\Taxonomy\Room;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Admin\Resources\Rooms\RoomsResource;

class CreateRooms extends CreateRecord
{
    /**
     * @var string
     */
    protected static string $resource = RoomsResource::class;

    /**
     * @param array $data
     *
     * @return array
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $parent       = Taxonomy::whereSlug(Room::$rootSlug)->first();
        $slug         = Str::slug($data['name']);
        $originalSlug = $parent->slug . '-' . $slug;
        $counter      = 1;

        // check if slug has exists or not
        while (Taxonomy::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $data['parent_id'] = $parent->id;
        $data['slug']      = $slug;

        return $data;
    }
}
