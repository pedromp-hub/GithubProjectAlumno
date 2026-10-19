<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfesorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('about', [MainController::class, 'about'])->name('about');
Route::get('array', [MainController::class, 'array'])->name('array');
Route::get('portfolio', [MainController::class, 'portfolio'])->name('portfolio');

//Route::get('aboutRuta', [MainController::class, 'aboutMetodo'])->name('aboutNombre');

//LAS 7 RUTAS DE ALUMNO
Route::get('alumno/create', [AlumnoController::class, 'create'])->name('alumno.create');
Route::post('alumno', [AlumnoController::class, 'store'])->name('alumno.store');
Route::get('alumno/{alumno}/edit', [AlumnoController::class, 'edit'])->name('alumno.edit');
Route::get('alumno', [AlumnoController::class, 'index'])->name('alumno.index');
Route::put('alumno/{alumno}', [AlumnoController::class, 'update'])->name('alumno.update');
Route::get('alumno/{alumno}', [AlumnoController::class, 'show'])->name('alumno.show');
Route::delete('alumno/{alumno}', [AlumnoController::class, 'destroy'])-> name('alumno.destroy');

//LAS 7 RUTAS DE PROFESOR
Route::get('profesor/create', [ProfesorController::class, 'create'])->name('profesor.create');
Route::post('profesor', [ProfesorController::class, 'store'])->name('profesor.store');
Route::get('profesor/{profesor}/edit', [ProfesorController::class, 'edit'])->name('profesor.edit');
Route::get('profesor', [ProfesorController::class, 'index'])->name('profesor.index');
Route::put('profesor/{profesor}', [ProfesorController::class, 'update'])->name('profesor.update');
Route::get('profesor/{profesor}', [ProfesorController::class, 'show'])->name('profesor.show');
Route::delete('profesor/{profesor}', [ProfesorController::class, 'destroy'])-> name('profesor.destroy');