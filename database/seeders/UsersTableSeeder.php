<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        
        User::factory()->withRole('User')->create([
            'name' => 'Demo User',
            'email' => 'user@chronos.id',
        ]);

        User::factory()->withRole('Admin')->create([
            'name' => 'Admin',
            'email' => 'admin@chronos.id',
        ]);
    }
}
