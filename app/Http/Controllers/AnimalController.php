<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrearAnimalRequest;
use Illuminate\Http\Request;
use App\Models\Animal;
use Illuminate\Support\Str;
use PDOException;
use CreateUsersTable;
use Illuminate\Support\Facades\Storage;

use function Ramsey\Uuid\v1;

class AnimalController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $animales = Animal::all();
        return view('animales.index', ['animales' => $animales]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('animales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CrearAnimalRequest $request)
    {
        try {
            $a = new Animal();
            $a->especie = $request->input('especie');
            $slug = Str::slug($request->input('especie'));
            $a->slug = $slug;
            $a->peso = $request->input('peso');
            $a->altura = $request->input('altura');
            $a->fechaNacimiento = $request->input('fechaNacimiento');
            $a->imagen = $request->imagen->store('', 'animales');
            $a->alimentacion = $request->input('dieta');
            $a->descripcion = $request->input('descripcion');
            $a->save();
            return redirect()->route('animales.show', ['animal' => $a->especie]);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $animal)
    {
        //
        $ani = Animal::where('especie', $animal)->firstOrFail();
        return view('animales.show')->with(['animal' => $ani]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $animal)
    {
        //
        $ani = Animal::where('especie', $animal)->firstOrFail();
        return view('animales.edit')->with(['animal' => $ani]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        $request->validate(
            [
                'especie' => 'required|min:3',
                'peso' => 'required',
                'altura' => 'required',
                'imagen' => 'image|mimes:jpg,png,jpg,svg',
            ],
            [
                'especie.required' => 'El campo especie es obligatorio',
                'especie.min' => 'El campo especie debe tener al menos 3 caracteres',
                'peso.required' => 'El campo peso es obligatorio',
                'altura.required' => 'El campo altura es obligatorio',
                'imagen.mimes' => 'El formato de imagen tiene que ser jpg, png,jpg o svg',
            ]
        );
        try {
            $animal->especie = $request->input('especie');
            $slug = Str::slug($request->input('especie'));
            $animal->slug = $slug;
            $animal->peso = $request->input('peso');
            $animal->altura = $request->input('altura');
            $animal->fechaNacimiento = $request->input('fecha');
            $animal->alimentacion = $request->input('dieta');
            $animal->descripcion = $request->input('descripcion');
            if ($request->hasFile('imagen')) {
                Storage::disk('animales')->delete($animal->imagen);
                $animal->imagen = $request->imagen->store('', 'animales');
            }
            $animal->save();
            return redirect()->route('animales.show', ['animal' => $animal->especie]);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
