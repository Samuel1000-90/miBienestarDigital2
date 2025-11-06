@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Usuarios Registrados</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $u)
            <tr>
                <td>{{ $u->id_usuario }}</td>
                <td>{{ $u->nombre_usuario }}</td>
                <td>{{ $u->correo }}</td>
                <td>{{ $u->rol->nombre_rol }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
