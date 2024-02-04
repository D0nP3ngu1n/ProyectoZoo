<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;

class Animal extends Model
{
    protected $table = 'animals';
    use HasFactory;

    public function getEdad()
    {
        $fechaFormateada = Carbon::parse($this->fechaNacimiento);
        return $fechaFormateada->diffInYears(Carbon::now());
    }
    public function revisiones()
    {
        return $this->hasMany(Revision::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
