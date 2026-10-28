<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Matricula;
use App\Models\Modulo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class MatriculaController extends Controller
{
    private const MESSAGES = [
            'alumno_id.required' => 'El alumno es obligatorio.',
            'alumno_id.numeric'  => 'El alumno no se ha seleccionado bien.',
            'alumno_id.exists'   => 'El alumno no existe',
            'modulo_id.required' => 'El módulo es obligatorio.',
            'modulo_id.numeric'  => 'El módulo no se ha seleccionado bien.',
            'modulo_id.exists'   => 'El módulo no exite',
    ];

    private const RULES = [
            'alumno_id' => 'required|numeric|exists:alumno,id',
            'modulo_id' => 'required|numeric|exists:modulo,id',
            
    ];

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
        $validator = Validator::make($request->all(), self::RULES, self::MESSAGES);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }
        $matricula = new Matricula($request->all());
        $matricula->curso = $this->getCurso();
        try {
            $matricula->save();
            return redirect() -> route('matricula.create')->with(['success' => 'Se ha matriculado correctamente']);
        } catch(\Exception $e) {
            return back()->withInput()->withErrors([
                'error' => 'Error al matricular.',
            ]);
        }
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
