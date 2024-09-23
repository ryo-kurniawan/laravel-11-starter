<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Company;
use App\Models\Position;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Seed Positions
        DB::table('positions')->insert([
            ['name' => 'CEO', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'CTO', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'COO', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'CFO', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Seed Companies
        DB::table('companies')->insert([
            [
                'name' => 'Tech Innovations',
                'owner_id' => 1, // John Doe
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Creative Solutions',
                'owner_id' => 2, // Jane Smith
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seed Company-User Relations (Assign Users to Companies with Positions)
        DB::table('company_user')->insert([
            [
                'company_id' => 1, // Tech Innovations
                'user_id' => 1,    // John Doe
                'position_id' => 1, // CEO
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id' => 1, // Tech Innovations
                'user_id' => 2,    // Jane Smith
                'position_id' => 2, // CTO
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id' => 2, // Creative Solutions
                'user_id' => 2,    // Jane Smith
                'position_id' => 1, // CEO
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seed Invitations
        DB::table('invitations')->insert([
            [
                'company_id' => 1,
                'email' => 'newuser@example.com',
                'status' => 'pending',
                'invited_by' => 1, // John Doe
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
