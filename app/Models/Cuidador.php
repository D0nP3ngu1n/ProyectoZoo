<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuidador extends Model
{
    protected $table = 'cuidadores';
    use HasFactory;

    public function animales()
    {
        return $this->belongsToMany(Animal::class);
    }
}
