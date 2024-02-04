<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Revision;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDOException;

class RevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $animal)
    {
        //
        $ani = Animal::where('slug', $animal)->firstOrFail();
        return view('revisiones.revisiones')->with(['animal' => $ani]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $animal)
    {
        $request->validate(
            [
                'fecha' => 'required',
                'descripcion' => 'required',

            ],
            [
                'fecha.required' => 'El campo fecha es obligatorio',
                'descripcion.required' => 'El campo descripcion es obligatorios',
            ]
        );
        try {
            $animal = Animal::where('slug', $animal)->firstOrFail();
            $a = new Revision();
            $a->fecha = $request->input('fecha');
            $a->descripcion->$request->input('desc');
            $a->animal_id = $animal->id;
            $a->save();
            return redirect()->route('animales.show', ['animal' => $a->especie]);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
