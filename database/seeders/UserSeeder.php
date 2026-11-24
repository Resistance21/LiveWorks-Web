<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedUsers = [
            [
                'id' => 99,
                'name' => 'Super Admin',
                'email' => 'supervisor@example.com',
                'password' => 'Password1',
                'email_verified_at' => now(),
                'role' => 'admin',

            ],

            [
                'id' => 100,
                'name' => 'Admin I Strator',
                'email' => 'admin@example.com',
                'password' => 'Password1',
                'email_verified_at' => now(),
                'role' => 'admin',

            ],

            [
                'id' => 200,
                'name' => 'Staff User',
                'email' => 'staff@example.com',
                'password' => 'Password1',
                'email_verified_at' => now(),
                'role' => 'staff',

            ],

            [
                'id' => 300,
                'name' => 'Client User',
                'email' => 'client@example.com',
                'password' => 'Password1',
                'email_verified_at' => now(),
                'role' => 'client',

            ],

            [
                'id' => 301,
                'name' => 'Client User II',
                'email' => 'client2@example.com',
                'password' => 'Password1',
                'email_verified_at' => null,
                'role' => 'client',

            ],

            [
                'id' => 302,
                'name' => 'Client User III',
                'email' => 'client3@example.com',
                'password' => 'Password1',
                'email_verified_at' => null,
                'role' => 'client',

            ],
            [
                'id' => 303,
                'name' => 'Client User IV',
                'email' => 'client4@example.com',
                'password' => 'Password1',
                'email_verified_at' => null,
                'suspended_at' => now(),
                'role' => 'client',

            ],
        ];

        foreach ($seedUsers as $newUser) {
            User::updateOrCreate(
                ['id' => $newUser['id']],
                $newUser
            );
        }

        // Uncomment the line below to create (10) randomly named users using the User Factory.
        // User::factory(10)->create();

    }
}
