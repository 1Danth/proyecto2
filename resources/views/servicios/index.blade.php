@extends('list')    
@section('title','Servicios')
@section('titleh3',' Servicios')
@section('btn_create_title')
<div class="col d-flex justify-content-center align-items-center">
    <a href="{{ route('servicios.create') }}" class="btn btn-primary">Crear Servicio</a>
</div>
@endsection
@section('table_headers')
    <th scope="col">ID</th>
    <th scope="col">Nombre</th>
    <th scope="col">Creado el</th>
    <th scope="col">Acciones</th>
@endsection
@section('forelse_data')
        @forelse ($servicios as $servicio )
        <tr>
            <th scope="row">{{ $servicio->id }}</th>
            <td>{{ $servicio->nombre }}</td>
            <td>{{ $servicio->created_at }}</td>
            <td>
                <div class="row">
                    <div class="col"> 
                        <a href="{{ route('servicios.edit',['servicio'=>$servicio->id]) }}" class="btn btn-info m-2">Editar</a>
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
