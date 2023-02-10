<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = Doctor::create([
            'name' => 'Admin',
        ]);

        \App\Models\User::create([
            'username' => 'admin',
            'password' => bcrypt('1234'),
            'user_id' => $admin->id,
            'account_type' => 1,
        ]);

        $this->call([
            StudentsSeeder::class,
            FacultiesSeeder::class
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
