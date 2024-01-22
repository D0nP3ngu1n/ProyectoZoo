<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrearAnimalRequest;
use Illuminate\Http\Request;
use App\Models\Animal;
use CreateUsersTable;

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
        $name = $request->nombre;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $animal)
    {
        //
        $animal = Animal::first();
        return view('animales.show', ['animal' => $animal]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $animal = 0)
    {
        //
        $animal = Animal::first();
        return view('animales.edit', ['animal' => $animal]);
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
