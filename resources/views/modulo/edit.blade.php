@extends('template.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <form action="{{ route ('alumno.update', $alumno)}} " method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" value="{{ old('nombre', $alumno->nombre) }}" class="form-control" id="nombre" name="nombre" required maxlength="100" placeholder="Introduce el nombre del alumno">
                    @error('nombre')
                        <div class="alert alert-danger" role="alert" style="margin-top: 6px">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" value="{{ old('apellidos', $alumno->apellidos) }}" class="form-control" id="apellidos" name="apellidos" required maxlength="130" placeholder="Introduce los apellidos del alumno">
                    @error('apellidos')
                        <div class="alert alert-danger" role="alert" style="margin-top: 6px">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                    <input type="date" value="{{ old('fnac', $alumno->fnac) }}" class="form-control" id="fecha_nacimiento" name="fnac" max="{{ now()->format('Y-m-d') }}>
                    @error('fnac')
                        <div class="alert alert-danger" role="alert" style="margin-top: 6px">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="genero" class="form-label">Género</label>
                    <select class="form-select" id="genero" name="genero">
                        <option value="" @selected(old('genero', $alumno->genero) == '')>Selecciona una opción</option>
                        <option value="masculino" @selected(old('genero', $alumno->genero) == 'masculino')>Masculino</option>
                        <option value="femenino" @selected(old('genero', $alumno->genero) == 'femenino')>Femenino</option>
                        <option value="otro" @selected(old('genero', $alumno->genero) == 'otro')>Otro</option>
                    </select>
                    @error('genero')
                        <div class="alert alert-danger" role="alert" style="margin-top: 6px">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nota_acceso" class="form-label">Nota de acceso</label>
                    <input type="number" value="{{ old('nacceso', $alumno->nacceso) }}" class="form-control" id="nota_acceso"
                    name="nacceso" min="0" max="10" step="0.01" placeholder="Introduce la nota de acceso">
                    @error('nacceso')
                        <div class="alert alert-danger" role="alert" style="margin-top: 6px">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-secondary">
                    Editar alumno
                </button>
            </form>
        </div>
    </div>
</div>
@endsection