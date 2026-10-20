@extends('template.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">

            @error('claveunica')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror

            <form action="{{ route ('alumno.store')}} " method="post">
                 @csrf <!--/* medida de seguridad que se usa con todas las rutas que no sean get */
                /*Introduce un token en el formulario*/ -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" value="" class="form-control" id="nombre" name="nombre" required maxlength="100" placeholder="Introduce el nombre del alumno">
                    @error('nombre')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" value="" class="form-control" id="apellidos" name="apellidos" required maxlength="130" placeholder="Introduce los apellidos del alumno">
                    @error('apellidos')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                    <input type="date" value="" class="form-control" id="fecha_nacimiento" name="fnac">
                </div>
                <div class="mb-3">
                    <label for="genero" class="form-label">Género</label>
                    <select class="form-select" id="genero" name="genero">
                        <option value="">Selecciona una opción</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nota_acceso" class="form-label">Nota de acceso</label>
                    <input type="number" value="" class="form-control" id="nota_acceso"
                    name="nacceso" min="0" max="10" step="0.01" placeholder="Introduce la nota de acceso">
                </div>
                <button type="submit" class="btn btn-secondary">
                    Crear alumno
                </button>
            </form>
        </div>
    </div>
</div>
@endsection