@extends('template.base')

@section('before-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <a href="{{ route('profesor.create') }}" class="btn btn-secondary">Create</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <table class="table table-hover">
                    @foreach($profesores as $profesor)
                        <tr>
                            <td>{{ $profesor->id }}</td>
                            <td>{{ $profesor->nombre }}</td>
                            <td>{{ $profesor->apellidos }}</td>
                            <td>{{ $profesor->especialidad }}</td>
                            <td>{{ Carbon\Carbon::parse($profesor->fecalta)->locale('es')-> translatedFormat('d/m/y') }}</td>
                            <td>{{ $profesor->salario }}€</td>
                            <td>
                                <a href="{{ route('profesor.show', $profesor) }}" class="btn btn-secondary">View</a>
                                <a href="{{ route('profesor.edit', $profesor) }}" class="btn btn-secondary">Edit</a>
                                <!-- <a href="{{ route('index') }}" class="btn btn-secondary">Delete</a> -->
                                <form data-message="{{ $profesor->apellidos . ', ' . $profesor->nombre }}" class="confirm-dialog" action="{{ route('profesor.destroy', $profesor) }}" method="post" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete" class="btn btn-secondary">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    document.querySelectorAll('form.confirm-dialog').forEach(
        form => {
            form.addEventListener('submit', e => {
                const message = '¿Seguro que quieres borrar al alumno ' + form.dataset.message + '?'
                if (!confirm(message)) {
                    e.preventDefault();
                }
            });
        }
    );
</script>
@endsection