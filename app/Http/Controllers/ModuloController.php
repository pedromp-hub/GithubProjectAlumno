<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;

class ModuloController extends Controller
{
    public function index(): View {
        //$modulos = Modulo::all();
        //return view('modulo.index', ['modulos' => $modulos]);
        $modulos = Modulo::orderBy('nombre')->get();
        return view('modulo.index', compact('modulos'));
    }

    public function create(): View {
        return view('modulo.create');
    }

    public function store(Request $request): RedirectResponse {
        $datos = $request->validate([
            'abreviatura' => ['required', 'string', 'max:7', ], //'unique:modulo,abreviatura'
            'creditos'    => ['nullable', 'numeric', 'min:0', 'max:99.99'],
            'horas'       => ['nullable', 'integer', 'min:0', 'max:15'],
            'nombre'      => ['required', 'string', 'max:120', ], //'unique:modulo,nombre'
        ]);
        try {
            Modulo::create($request->all());
            return redirect()
                    ->route('modulo.index')
                    ->with('success', 'Módulo creado correctamente.');
        } catch (QueryException $e) {
            return back()
                    ->withInput()
                    ->withErrors(['error' => 'No se pudo guardar el módulo. Comprueba que el nombre y la abreviatura no estén repetidos.']);
        } catch (Throwable $e) {
            return back()
                    ->withInput()
                    ->withErrors(['error' => 'No se pudo guardar el módulo.']);
        }
    }

    public function show(string $id): View {
        $modulo = Modulo::find($id);
        if($modulo == null) {
            abort(404);
        }
        return view('modulo.show', compact('modulo'));
    }

    public function showV2(string $id): View|ResponseRedirect {
        $modulo = Modulo::find($id);
        if($modulo == null) {
            return redirect()
                    ->route('modulo.index')
                    ->withErrors(['error' => 'Módulo no encontrado.']); 
        }
        return view('modulo.show', compact('modulo'));
    }

    public function edit(Modulo $modulo): View {
        return view('modulo.edit', compact('modulo'));
    }

    public function update(Request $request, Modulo $modulo): RedirectResponse {
        $datos = $request->validate([
            'abreviatura' => ['required','string','max:7'],
            'creditos' => ['nullable', 'numeric', 'min:0', 'max:99.99'],
            'horas' => ['nullable', 'integer', 'min:0', 'max:15'],
            'nombre' => ['required','string','max:120'],
        ]);
        try {
            $modulo->update($datos);
            return redirect()
                    ->route('modulo.index')
                    ->with('success', 'Módulo actualizado correctamente.');
        } catch (QueryException $e) {
            return back()
                    ->withInput()
                    ->withErrors(['error' => 'No se pudo actualizar el módulo. Comprueba que el nombre y la abreviatura no estén repetidos.']);
        } catch (Exception $e) {
            return back()
                    ->withInput()
                    ->withErrors(['error' =>'Se produjo un error al actualizar el módulo.']);
        }
    }

    public function destroy(Modulo $modulo): RedirectResponse {
        try {
            $modulo->delete();
            return redirect()
                ->route('modulo.index')
                ->with('success', 'Módulo eliminado correctamente.');
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'No se pudo eliminar el módulo.']);
        }
    }
}