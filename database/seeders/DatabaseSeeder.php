<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Subject;
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


        Subject::create([
            'public_id' => 'math',
            'name' => 'Matematika',
            'description' => 'Zbrajanje brojeva',
            'color' => '#FF5733',
            'image' => '/assets/images/subjects/mathematics.jpg',
            ]);

        Subject::create([
            'public_id' => 'english',
            'name' => 'Engleski jezik',
            'description' => 'Učenje engleskog jezika',
            'color' => '#33FF57',
            'image' => '/assets/images/subjects/non_existant.jpg',
            ]);

        Subject::create([
            'public_id' => 'history',
            'name' => 'Povijest',
            'description' => 'Učenje povijesti',
            'color' => '#3357FF',
            'image' => '/assets/images/subjects/history.jpg',
            ]);

        Subject::create([
            'public_id' => 'physics',
            'name' => 'Fizika',
            'description' => 'Učenje muke',
            'color' => '#FF33A1',
            'image' => '/assets/images/subjects/physics.jpg',
            ]);

        Subject::create([
            'public_id' => 'geography',
            'name' => 'Geografija',
            'description' => 'Učenje geografije',
            'color' => '#FF33FF',
            'image' => '/assets/images/subjects/geography.jpg',
            ]);

        Subject::create([
            'public_id' => 'chemistry',
            'name' => 'Kemija',
            'description' => 'Učenje kemije',
            'color' => '#FF5733',
            'image' => '/assets/images/subjects/chemistry.jpg',
            ]);



    }
}
