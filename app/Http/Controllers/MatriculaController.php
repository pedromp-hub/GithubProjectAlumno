<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Matricula;
use App\Models\Modulo;
use Illuminate\Http\RedirectResponse;
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

    public function index(): View {
        $matriculas = Matricula::all();
        //$matriculas = Matriculas::orderBy('alfabeticamente')->get();
        return view('matricula.index', [
            'matriculas' => $matriculas
        ]);
    }

    public function index2()
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
            return back() ->with(['success' => 'Se ha matriculado correctamente']);
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

    public function make(Request $request, Alumno $alumno): RedirectResponse{
        // $validator = Validator::make($request->all(), self::RULES, self::MESSAGES);
        // if($validator->fails()){
        //     return back()->withInput()->withErrors($validator);
        // }
        $matricula = new Matricula($request->all());
        $matricula->curso = $this->getCurso();
        $matricula->alumno_id = $alumno->id;
        try {
            $matricula->save();
            return back() ->with(['success' => 'Se ha matriculado correctamente']);
        } catch(\Exception $e) {
            return back()->withInput()->withErrors([
                'error' => 'Error al matricular.',
            ]);
        }
    }

    public function storeModules(Request $request): RedirectResponse {
        $curso = $this->getCurso();
        $alumno_id = $request->alumno_id;
        $modulos_id = $request->modulo_id;
        if ($modulos_id == null) {
            $modulos_id = [];
        }
        //borrar matriculas de los módulos no marcados
        $registrosBorrados = Matricula::where('alumno_id', $alumno_id)->whereNotIn('modulo_id', $modulos_id)->delete();
        //matricular en módulos marcados si no lo está ya
        $contador = 0;
        foreach($modulos_id as $modulo_id) {
            //se va a ejecutar un insert ignore
            $contador += Matricula::insertOrIgnore([
                'alumno_id' => $alumno_id,
                'modulo_id' => $modulo_id,
                'curso'     => $curso,
            ]);
        }
        return back()->with(['success' => "Se ha matriculado correctamente. Se han insertado $contador matriculas y se han borrado $registrosBorrados matriculas."]);
    }
}
