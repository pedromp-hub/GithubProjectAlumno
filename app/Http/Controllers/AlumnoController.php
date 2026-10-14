<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AlumnoController extends Controller
{

    public function create(): View {
        //
        return view('alumno.create', []);
    }
    
    public function destroy(Alumno $alumno): RedirectResponse {
        dd(['destroy', $alumno]);
        //return redirect()->route('index');
    }

    public function edit(Alumno $alumno): View{
        //
        return view('alumno.edit', ['alumno' => $alumno]);
    }
    
    public function index(): View {
        //
        // $alumnos = 'select * from alumno';
        $alumnos = Alumno::all();
        // dd($alumnos);
        return view('alumno.index', ['alumnos' => $alumnos]);
    }

    public function show(Alumno $alumno): View {
        //
        // dd($alumno);
        return view('alumno.show', ['alumno' => $alumno]);
    }

    public function store(Request $request): RedirectResponse {
        //
        $alumno = new Alumno($request ->all());
        $alumno->save();
        return redirect() -> route('alumno.index');
    }

    public function update(Request $request, Alumno $alumno): RedirectResponse {
        // dd(['update', $alumno]);
        //Actualizar el alumno y luego hacer un redirect
        $alumno->update($request->all());
        return redirect()->route('alumno.index');
    }

}
