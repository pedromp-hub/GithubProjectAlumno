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
                    <input type="text" value="{{ $alumno->nombre }}" class="form-control" id="nombre" name="nombre" required maxlength="100" placeholder="Introduce el nombre del alumno">
                </div>
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" value="{{ $alumno->apellidos }}" class="form-control" id="apellidos" name="apellidos" required maxlength="130" placeholder="Introduce los apellidos del alumno">
                </div>
                <div class="mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                    <input type="date" value="{{ $alumno->fnac }}" class="form-control" id="fecha_nacimiento" name="fnac">
                </div>
                <div class="mb-3">
                    <label for="genero" class="form-label">Género</label>
                    <select class="form-select" id="genero" name="genero">
                        <option value="" @selected($alumno->genero == '')>Selecciona una opción</option>
                        <option value="masculino" @selected($alumno->genero == 'masculino')>Masculino</option>
                        <option value="femenino" @selected($alumno->genero == 'femenino')>Femenino</option>
                        <option value="otro" @selected($alumno->genero == 'otro')>Otro</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nota_acceso" class="form-label">Nota de acceso</label>
                    <input type="number" value="{{ $alumno->nacceso }}" class="form-control" id="nota_acceso"
                    name="nacceso" min="0" max="10" step="0.01" placeholder="Introduce la nota de acceso">
                </div>
                <button type="submit" class="btn btn-secondary">
                    Editar alumno
                </button>
            </form>
        </div>
    </div>
</div>
@endsection