<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(
            [
                // When using Spatie Permissions, perform the Role / Permission seeding FIRST
                RolePermissionSeeder::class,
                UserSeeder::class,
                UnitSeeder::class,
                AssessmentSeeder::class,
                ProjectSeeder::class,
                ProjectDocumentSeeder::class,
                ProjectArchiveSeeder::class,    
                // Add further seeder classes here
            ]
        );

    }
}
