<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Cuidador::factory(20)->create();
        DB::table('animals')->delete();
        DB::table('users')->delete();
        DB::table('revisiones')->delete();
        $this->call(AnimalSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RevisionesSeeder::class);
    }
}
