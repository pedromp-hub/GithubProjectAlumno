<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Matricula;
use App\Models\Modulo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MatriculaController extends Controller
{

    private function getCurso(): Int {
        //Si el mes es 9 o mayor año actual, sino año anterior
        if(Carbon::now()->month >= 9) {
            return Carbon::now()->year;
        } else {
            return Carbon::now()->year - 1;
        }
    }

    private function getCursoEscolar(): String {
        return $this->getCurso() . '/' . $this->getCurso() + 1;


    }

    public function index()
    {
        $lista = [
            'uno'  => 121,
            121    => 'dos',
            'tres' => 'cuatro',
        ];

        var_dump($lista);
        echo '<prev>' . var_export($lista, true) . '</pre>';
        foreach($lista as $elemento) {
            echo $elemento . '<br>';
        }
        foreach($lista as $indice => $elemento) {
            echo $elemento . ' está en la posición ' . $indice . '<br>';
        }
        dd($lista);
    }

    public function create() : View
    {
        return view('matricula.create' , [
            'alumnos'        => Alumno::orderBy('apellidos')->orderBy('nombre')->get(),
            'curso_escolar' => $this->getCursoEscolar(),
            'modulos'       => Modulo::pluck('nombre', 'id'),
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Matricula $matricula)
    {
        //
    }

    public function edit(Matricula $matricula)
    {
        //
    }

    public function update(Request $request, Matricula $matricula)
    {
        //
    }

    public function destroy(Matricula $matricula)
    {
        //
    }
}
