<?php

namespace Database\Seeders;

use App\Models\Revision;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RevisionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $r1 = new Revision();
        $r1->fecha = date(now());
        $r1->descripcion = "Revision 1 del animal bisonte";
        $r1->animal_id = 1;
        $r1->save();
        $r2 = new Revision();
        $r2->fecha = date(now());
        $r2->descripcion = "Revision 2 del animal bisonte";
        $r2->animal_id = 1;
        $r2->save();
    }
}
