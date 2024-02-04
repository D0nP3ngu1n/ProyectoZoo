<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CuidadorController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\RevisionController;
use App\Http\Controllers\TitulacionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', InicioController::class)->name('inicio');

/*Route::get('animales',[AnimalController::class,'index'])->name('animales.index');
Route::get('animales/create',[AnimalController::class,'create'])->name('animales.create');
Route::get('animales/{animal}',[AnimalController::class,'show'])->name('animales.show');
Route::get("animales/{animal}/edit",[AnimalController::class,'edit'])->name('animales.edit');

Esto se puede hacer en un grupo como se muestra abajo*/

Route::controller(AnimalController::class)->group(function () {
    Route::get('animales', 'index')->name('animales.index');
    Route::get('animales/create', 'create')->name('animales.create')->middleware('auth');
    Route::get('animales/{animal}', 'show')->name('animales.show');
    Route::get('animales/{animal}/edit', 'edit')->name('animales.edit')->middleware('auth');
});

Route::post('animales/store', [AnimalController::class, 'store'])->name('animales.store');
Route::get('revisiones/{animal}/crear', [RevisionController::class, 'create'])->name('revisiones.crear');
Route::post('revisiones/{animal}/crear', [RevisionController::class, 'store'])->name('revisiones.store');
Route::get('/cuidadores/{cuidador}', [CuidadorController::class, "show"])->name("cuidadores.show");
Route::get('/titulaciones/{titulacion}', [TitulacionController::class, "show"])->name("titulaciones.show");
Route::put('animales/{animal}', [AnimalController::class, 'update'])->name('animales.update');

Route::delete("/animales/{animal}", [AnimalController::class, "destroy"])->name("animales.destroy");

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
