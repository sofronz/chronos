<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * @var array
     */
    protected $roles = [
        [
            'name' => 'Admin',
        ],
        [
            'name' => 'User',
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->roles as $key => $role) {
            Role::updateOrCreate(
                [
                    'name' => $role['name']
                ],
                [
                    'name' => $role['name']
                ]
            );
        }
    }
}
