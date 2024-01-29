<?php

namespace Database\Seeders;

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
        //
        \App\Models\User::factory(5)->create();
        $us = new User();
        $us->name = "Efren";
        $us->email = "efren.gutierrezcantero@iesmiguelherrero.com";
        $us->password = bcrypt("Efren1234");
        $us->save();
    }
}
