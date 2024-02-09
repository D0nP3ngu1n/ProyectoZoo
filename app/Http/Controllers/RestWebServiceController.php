<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use PDOException;

class RestWebServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
            $animal = new Animal();
            $animal->especie = $request->input('especie');
            $slug = Str::slug($request->input('especie'));
            $animal->slug = $slug;
            $animal->peso = $request->input('peso');
            $animal->altura = $request->input('altura');
            $animal->fechaNacimiento = $request->input('fecha');
            $animal->alimentacion = $request->input('dieta');
            $animal->descripcion = $request->input('descripcion');
            if ($request->hasFile('imagen')) {
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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