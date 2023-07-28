@extends('list')    
@section('title','Usuarios')
@section('titleh3','Usuarios')
@section('btn_create_title')
<div class="col d-flex justify-content-center align-items-center">
    <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Registrar Usuario</a>
</div>
@endsection
@section('table_headers')
    <th scope="col">CI</th>
    <th scope="col">Nombre</th>
    <th scope="col">Fecha de Nac.</th>
    <th scope="col">Teléfono</th>
    <th scope="col">Email</th>
    <th scope="col">Sexo</th>
    <th scope="col">Tipo</th>
    <th scope="col">Password</th>
    <th scope="col">Acciones</th>
@endsection
@section('forelse_data')
        @forelse ($usuarios as $usuario )
        <tr>
            <th scope="row">{{ $usuario->id }}</th>
            <td>{{ $usuario->nombre }}</td>
            <td>{{ $usuario->fecha_nac }}</td>
            <td>{{ $usuario->telefono }}</td>
            <td>{{ $usuario->email }}</td>
            <td>{{ $usuario->sexo }}</td>
            <td>{{ $usuario->tipo }}</td>
            <td  style="max-width: 75px; overflow: auto;">{{ $usuario->password }}</td>
            <td>
                <div class="row">
                    <div class="col"> 
                        <a href="#" class="btn btn-info m-2">Editar</a>
                    </div>
                    <div class="col">
                        <form action="#" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger m-2">Eliminar</button>
                    </form>
                    </div>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td class="text-bg-danger p-3">
                    NO HAY ELEMENTOS
            </td>
        </tr>
        @endforelse
@endsection
