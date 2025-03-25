<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $adminUser = User::create([
                'username' => 'adminuser',
                'first_name' => 'Admin',
                'last_name' => 'Testing',
                'email' => 'admintest@salabahter.eu',
                'password' => Hash::make('noatono476'), // Hash the password
                'email_verified_at' => now(),
            ]);

        $adminUser->assignRole('admin');
            
    }
}
