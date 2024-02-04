<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrearAnimalRequest;
use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Image;
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
        return view('animales.index', [
            'animales' => Animal::all(),
            'imagenes' => Image::all()
        ]);
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
            $imagen = new Image();
            $a->especie = $request->input('especie');
            $slug = Str::slug($request->input('especie'));
            $a->slug = $slug;
            $a->peso = $request->input('peso');
            $a->altura = $request->input('altura');
            $a->fechaNacimiento = $request->input('fechaNacimiento');
            $imagenR = $request->file('imagen');
            $nombreImagen = uniqid() . '_' . $imagenR->getClientOriginalName();
            $imagenR->move(public_path('/assets/imagenes'), $nombreImagen);
            $imagen->nombre = $nombreImagen;
            $imagen->url = '/assets/imagenes' . $nombreImagen;
            $a->alimentacion = $request->input('dieta');
            $a->descripcion = $request->input('descripcion');
            $imagen->save();
            $a->imagen_id = $imagen->id();
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
        $ani = Animal::where('slug', $animal)->firstOrFail();
        $imagen = Image::where('id', $ani->imagen_id)->firstOrFail();

        return view('animales.show', ['animal' => $ani, 'imagen' => $imagen]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $animal)
    {
        //
        $ani = Animal::where('slug', $animal)->firstOrFail();
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
                $img = new Image();
                $img->nombre = $request->imagen->store('', 'animales');
                $img->url = 'assets/imagenes/' . $request->imagen->store('', 'animales');
                $img->save();
                $animal->imagen_id = $img->id();
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
    public function destroy(Animal $animal, Image $imagen)
    {
        //
        $animal->delete();
        Storage::disk('animales')->delete($imagen->nombre);
    }
}
