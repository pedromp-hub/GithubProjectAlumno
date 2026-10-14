@extends('template.base')

@section('before-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <a href="{{ route('alumno.create') }}" class="btn btn-secondary">Create</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <table class="table table-hover">
                @foreach($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->id }}</td>
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->apellidos }}</td>
                        <td>{{ Carbon\Carbon::parse($alumno->fnac)->locale('es')-> translatedFormat('d/m/y') }}</td>
                        <td>{{ $alumno->genero }}</td>
                        <td>{{ $alumno->nacceso }}</td>
                        <td>
                            <a href="{{ route('alumno.show', $alumno) }}" class="btn btn-secondary">View</a>
                            <a href="{{ route('alumno.edit', $alumno) }}" class="btn btn-secondary">Edit</a>
                            <a href="{{ route('index') }}" class="btn btn-secondary">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection