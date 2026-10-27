@extends('template.base')

@section('content')
<div class="container">
    <h1>Módulos</h1>
    <a href="{{ route('alumno.create') }}" class="btn btn-secondary mb-3">Crear Alumno</a>
    <a href="{{ route('modulo.create') }}" class="btn btn-secondary mb-3">Crear Módulo</a>
    <a href="{{ route('alumno.index') }}" class="btn btn-secondary mb-3">Ver Alumnos</a>
    <a href="{{ route('modulo.index') }}" class="btn btn-secondary mb-3">Ver Módulos</a>
    <hr>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <form action="{{ route('modulo.update', $modulo) }}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" value="{{ old('nombre', $modulo->nombre) }}" class="form-control" id="nombre" name="nombre" required maxlength="100" placeholder="Introduce el nombre del módulo">
                    @error('nombre')
                    <div class="alert alert-danger" role="alert" style="margin-top: 6px;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="abreviatura" class="form-label">Abreviatura</label>
                    <input type="text" value="{{ old('abreviatura', $modulo->abreviatura) }}" class="form-control" id="abreviatura" name="abreviatura" required maxlength="10" placeholder="Introduce la abreviatura del módulo">
                    @error('abreviatura')
                    <div class="alert alert-danger" role="alert" style="margin-top: 6px;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="horas" class="form-label">Horas</label>
                    <input type="number" value="{{ old('horas', $modulo->horas) }}" class="form-control" id="horas" name="horas" min="0" max="1000" placeholder="Introduce las horas del módulo">
                    @error('horas')
                    <div class="alert alert-danger" role="alert" style="margin-top: 6px;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="creditos" class="form-label">Créditos</label>
                    <input type="number" value="{{ old('creditos', $modulo->creditos) }}" class="form-control" id="creditos" name="creditos" min="0" max="100" placeholder="Introduce los créditos del módulo">
                    @error('creditos')
                    <div class="alert alert-danger" role="alert" style="margin-top: 6px;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-secondary">
                    Editar módulo
                </button>
            </form>
        </div>
    </div>
</div>
@endsection