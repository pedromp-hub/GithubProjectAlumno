@extends('template.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <form action="{{ route ('profesor.store')}} " method="post">
                 @csrf <!--/* medida de seguridad que se usa con todas las rutas que no sean get */
                /*Introduce un token en el formulario*/ -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" value="" class="form-control" id="nombre" name="nombre" required maxlength="100" placeholder="Introduce el nombre del profesor">
                </div>
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" value="" class="form-control" id="apellidos" name="apellidos" required maxlength="130" placeholder="Introduce los apellidos del profesor">
                </div>
                <div class="mb-3">
                    <label for="especialidad" class="form-label">Especialidad</label>
                    <input type="text" value="" class="form-control" id="especialidad" name="especialidad" required maxlength="130" placeholder="Introduce la especialidad del profesor">
                </div>
                <div class="mb-3">
                    <label for="fecha_alta" class="form-label">Fecha de alta</label>
                    <input type="date" value="" class="form-control" id="fecha_alta" name="fecalta">
                </div>
                <div class="mb-3">
                    <label for="salario" class="form-label">Salario</label>
                    <input type="number" value="" class="form-control" id="salario" name="salario" required maxlength="130" placeholder="Introduce el salario del profesor">
                </div>
                <button type="submit" class="btn btn-secondary">
                    Crear profesor
                </button>
            </form>
        </div>
    </div>
</div>
@endsection