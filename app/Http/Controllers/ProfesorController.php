<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfesorController extends Controller
{

    public function create()
    {
        //
        return view('profesor.create', []);
    }

    public function destroy(Profesor $profesor): RedirectResponse 
    {
        $profesor->delete();
        return redirect()->route('profesor.index');
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
        $profesor = new Profesor($request ->all());
        $profesor->save();
        return redirect() -> route('profesor.index');
    }

     public function update(Request $request, Profesor $profesor): RedirectResponse {
        // dd(['update', $profesor]);
        //Actualizar el profesor y luego hacer un redirect
        $profesor->update($request->all());
        return redirect()->route('profesor.index');
    }
}
