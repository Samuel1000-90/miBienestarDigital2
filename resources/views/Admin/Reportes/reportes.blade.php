@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Reportes de Hábitos</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Hábito</th>
                <th>Progreso</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reportes as $r)
            <tr>
                <td>{{ $r->nombre_usuario }}</td>
                <td>{{ $r->nombre_habito }}</td>
                <td>{{ $r->progreso }}%</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
