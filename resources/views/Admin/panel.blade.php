@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Panel de Administración - MiBienestarDigital</h2>

    <h4>Usuarios</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $u)
                <tr>
                    <td>{{ $u->id_usuario }}</td>
                    <td>{{ $u->nombre }}</td>
                    <td>{{ $u->correo }}</td>
                    <td>{{ $u->id_rol }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Hábitos</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Hábito</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($habitos as $h)
                <tr>
                    <td>{{ $h->id_habito }}</td>
                    <td>{{ $h->nombre_habito }}</td>
                    <td>{{ $h->descripcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Progreso</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Usuario</th>
                <th>ID Hábito</th>
                <th>Progreso (%)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($progresos as $p)
                <tr>
                    <td>{{ $p->id_usuario }}</td>
                    <td>{{ $p->id_habito }}</td>
                    <td>{{ $p->progreso }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
