<?php

namespace Database\Factories;

use App\Models\Titulacion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cuidador>
 */
class CuidadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titulaciones = Titulacion::pluck('id')->toArray(); //saca un array a partir de los id
        $nombre = $this->faker->name;
        return [
            //
            'nombre' => $nombre,
            'slug' => Str::slug($nombre),
            'id_titulacion1' => $this->faker->randomElement($titulaciones),
            'id_titulacion2' => $this->faker->randomElement($titulaciones)
        ];
    }
}
