<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\Cast\Array_;

class ImageSeeder extends Seeder
{
    private $imagenes = array('bisonte.jpg', 'elefante.jpg', 'jaguar.jpg', 'jirafa.jpg', 'leon.jpg', 'mono.jpg', 'tigre.jpg');
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        //
        foreach ($this->imagenes as $imagen) { {
                $a = new Image();
                $a->nombre = $imagen;
                $a->ruta = 'assets/imagenes/' . $imagen;
                $a->save();
            }
            $this->command->info('Tabla de animales inicializada');
        }
    }
}
