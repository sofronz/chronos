<?php
namespace Database\Seeders;

use App\Models\Taxonomy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TaxonomiesTableSeeder extends Seeder
{
    /**
     * @var array
     */
    protected $categories = [
        [
            'name'     => 'Roles',
            'slug'     => 'roles',
            'children' => [
                [
                    'name' => 'User',
                    'slug' => 'roles-user',
                ],
                [
                    'name' => 'Administrator',
                    'slug' => 'roles-administrator',
                ],
            ],
        ],
        [
            'name'     => 'Rooms',
            'slug'     => 'rooms',
            'children' => [
                [
                    'name' => 'Room 1',
                    'slug' => 'rooms-room-1',
                ],
                [
                    'name' => 'Administrator',
                    'slug' => 'rooms-room-2',
                ],
            ],
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        foreach ($this->categories as $key => $value) {
            $taxonomy = Taxonomy::updateOrCreate(
                [
                    'slug' => $value['slug'],
                ],
                [
                    'name' => $value['name'],
                    'slug' => $value['slug'],
                ],
            );

            if (array_key_exists('children', $value)) {
                foreach ($value['children'] as $key => $child) {
                    Taxonomy::updateOrCreate(
                        [
                            'slug' => $child['slug'],
                        ],
                        [
                            'name'      => $child['name'],
                            'slug'      => $child['slug'],
                            'parent_id' => $taxonomy->id,
                        ],
                    );
                }
            }
        }
    }
}
