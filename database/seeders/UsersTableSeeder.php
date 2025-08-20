<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        
        User::factory()->withRole('roles-user')->create([
            'name'  => 'Demo User',
            'email' => 'user@chronos.id',
        ]);

        User::factory()->withRole('roles-administrator')->create([
            'name'  => 'Admin',
            'email' => 'admin@chronos.id',
        ]);
    }
}
