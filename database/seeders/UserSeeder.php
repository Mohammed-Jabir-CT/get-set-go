<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory()->hasProjects(3)->create([
            'name' => 'Test Leader',
            'email' => 'leader@example.com',
            'role_id' => 2,
            'team_id' => 1
        ]);

        User::factory()->create([
            'name' => 'Test Manager',
            'email' => 'manager@example.com',
            'role_id' => 3,
            'team_id' => 1
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role_id' => 4,
            'team_id' => 1
        ]);
    }
}
