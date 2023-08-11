@extends('layouts.app')

@section('title','Editar Departamento')

@section('content')
@include('partials.nav')

<div class="container-fluid" style="margin-top: 100px;">
    <div class="row">
        <div class="col">
            <h3>Usuarios y sus Departamentos</h3>
        </div>
        <table class="table table-hover" style="margin-top: 50px;">
            <thead>
                <tr>
                    <th scope="col">Usuario</th>
                    <th scope="col">Nro. Departamento</th>
                    <th scope="col">Fecha Inicio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usudepa as $usude)
                <td>{{ $usude->id_usuario }}</td>
                <td>{{ $usude->id_departamento }}</td>
                <td>{{ $usude->fecha_ini }}</td>
                @endforeach
            </tbody>
        </table>

        <h3>Asignar Departamento</h3>

        <form method="post" action="{{ route('asociar.guardar') }}">
            @csrf
            <div class="form-group">
                <label for="usuario_id">Usuario:</label>
                <select name="usuario_id" id="usuario_id" class="form-control">
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="departamento_id">Departamento:</label>
                <select name="departamento_id" id="departamento_id" class="form-control">
                    @foreach($departamentos as $departamento)
                        <option value="{{ $departamento->id }}">{{ $departamento->id }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 50px;">Asociar</button>
        </form>

    </div>
</div>

@endsection