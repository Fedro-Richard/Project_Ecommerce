<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First check if admin exists to avoid duplicates/errors
        $admin = User::where('email', 'admin@florenoria.com')->first();

        User::updateOrCreate(
            ['email' => 'admin@florenoria.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('florenoria'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );
        $this->command->info('Admin user created/updated successfully.');
    }
}
