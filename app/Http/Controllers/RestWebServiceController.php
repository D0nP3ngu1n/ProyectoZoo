<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Image;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PDOException;

class RestWebServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $animales = Animal::all();
        return response()->json($animales);
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
            ],
            [
                'especie.required' => 'El campo especie es obligatorio',
                'especie.min' => 'El campo especie debe tener al menos 3 caracteres',
                'peso.required' => 'El campo peso es obligatorio',
                'altura.required' => 'El campo altura es obligatorio',
            ]
        );
        try {
            $animal = new Animal();
            $animal->especie = $request->especie;
            $slug = Str::slug($request->especie);
            $animal->slug = $slug;
            $animal->peso = $request->peso;
            $animal->altura = $request->altura;
            $animal->fechaNacimiento = $request->fecha;
            $animal->alimentacion = $request->dieta;
            $animal->descripcion = $request->descripcion;
            $animal->save();
            return response()->json(['mensaje' => 'animal creado correctamente']);
        } catch (PDOException $e) {
            return response()->json(['mensaje' => 'Error al insertar en la base de datos: ' . $e->getMessage()]);
        } catch (Exception $ex) {
            return response()->json(['mensaje' => 'Error al insertar en la base de datos: ' . $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $animal)
    {
        //
        $ani = Animal::where('slug', $animal)->firstOrFail();
        return response()->json($ani);
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
    public function update(Request $request, Animal $animal)
    {
        //
        //$animal = Animal::where('slug', $animal)->firstOrFail();
        $request->validate(
            [
                'especie' => 'min:3',
            ],
            [
                'especie.min' => 'El campo especie debe tener al menos 3 caracteres',
            ]
        );
        try {
            $animal->especie = $request->especie;
            $slug = Str::slug($request->especie);
            $animal->slug = $slug;
            $animal->peso = $request->peso;
            $animal->altura = $request->altura;
            $animal->fechaNacimiento = $request->fecha;
            $animal->alimentacion = $request->dieta;
            $animal->descripcion = $request->descripcion;
            $animal->save();
            return response()->json(['mensaje' => 'animal editado correctamente']);
        } catch (PDOException $e) {
            return response()->json(['mensaje' => 'Error al editar en la base de datos: ' . $e->getMessage()]);
        } catch (Exception $ex) {
            return response()->json(['mensaje' => 'Error al editar en la base de datos: ' . $ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        try {
            if (!$animal) {
                return response()->json(['mensaje' => 'Animal no encontrado'], 404);
            }
            $animal->delete();
            return response()->json(['mensaje' => 'Animal Borrado']);
        } catch (PDOException $e) {
            return response()->json(['mensaje' => 'Error al eliminar de la base de datos: ' . $e->getMessage()]);
        } catch (Exception $ex) {
            return response()->json(['mensaje' => 'Error al eliminar: ' . $ex->getMessage()]);
        }
    }
}
