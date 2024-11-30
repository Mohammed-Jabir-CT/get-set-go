<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
            'role_id' => 1,
            'team_id' => null
        ]);

        $this->call([
            TeamSeeder::class,
            UserSeeder::class,
            TaskSeeder::class
        ]);

       
    }
}
