<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use \Exception;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProfesorController extends Controller
{
    private const MESSAGES = [

            'apellidos.required'    => 'Los apellidos son obligatorios',
            'apellidos.string'      => 'Los apellidos deben ser una cadena de texto',
            'apellidos.max'         => 'Los apellidos no pueden superar los 200 caracteres',

            'especialidad.required' => 'La especialidad es obligatoria',
            'especialidad.string'   => 'La especialidad debe ser una cadena de texto',
            'especialidad.max'      => 'La especialidad no puede superar los 100 caracteres',

            'fecalta.date'          => 'La fecha de alta debe ser una fecha válida',

            'nombre.required'       => 'El nombre es obligatorio',
            'nombre.string'         => 'El nombre debe ser una cadena de texto',
            'nombre.max'            => 'El nombre no puede superar los 100 caracteres',
    
            'salario.numeric'       => 'El salario debe ser un número',
    ];

    private const RULES = [
            'nombre'       => 'required|string|max:100',
            'apellidos'    => 'required|string|max:200',
            'especialidad' => 'required|string|max:100',
            'fecalta'      => 'nullable|date',
            'salario'      => 'nullable|numeric',
    ];

    public function create()
    {
        //
        return view('profesor.create', []);
    }

    public function destroy(Profesor $profesor): RedirectResponse 
    {
        try {
             $profesor->delete();
        } catch(Exception $e) {
            return back()->withErrors(['error' => 'Error al borrar el profesor']);
        }
       
        return redirect()->route('profesor.index')->with(['success' => 'Se ha borrado el profesor.']);
    }

    public function edit(Profesor $profesor): View{
        //
        return view('profesor.edit', ['profesor' => $profesor]);
    }

    public function index(): View {
        //
        // $profesores = 'select * from profesor';
        $profesores = Profesor::all();
        // dd($profesores);
        return view('profesor.index', ['profesores' => $profesores]);
    }

    public function show(Profesor $profesor): View {
        //
        // dd($profesor);
        return view('profesor.show', ['profesor' => $profesor]);
    }

    public function store(Request $request): RedirectResponse {
        //
        $validator = Validator::make($request->all(), self::RULES, self::MESSAGES);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }

        $profesor = new Profesor($request ->all());
        try {
            $profesor->save();
        } catch(UniqueConstraintViolationException $e) {
            return back()->withInput()->withErrors([
                'error' => 'Clave única duplicada.',
            ]);
        } catch(Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Error al crear el profesor']);
        }
        return redirect() -> route('profesor.index')->with(['success' => 'Se ha creado el profesor correctamente']);
    }

     public function update(Request $request, Profesor $profesor): RedirectResponse {
        $validator = Validator::make($request->all(), self::RULES, self::MESSAGES);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }
        try {
            $profesor->update($request->all());
        } catch(UniqueConstraintViolationException $e) {
            return back()->withInput()->withErrors(['error' => 'Clave única duplicada.']);
        } catch (Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Error al editar el profesor']);
        }
        
        return redirect()->route('profesor.index');
    }
}
