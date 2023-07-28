@extends('list')    
@section('title','Servicios')
@section('titleh3',' Servicios')
@section('btn_create_title')
<div class="col d-flex justify-content-center align-items-center">
    <button type="button" class="btn btn-primary">Crear Servicio</button>
</div>
@endsection
@section('table_headers')
    <th scope="col">ID</th>
    <th scope="col">Nombre</th>
    <th scope="col">Creado el</th>
@endsection
@section('forelse_data')
        @forelse ($servicios as $servicio )
        <tr>
            <th scope="row">{{ $servicio->id }}</th>
            <td>{{ $servicio->nombre }}</td>
            <td>{{ $servicio->created_at }}</td>
        </tr>
        @empty
        <tr>
            <td class="text-bg-danger p-3">
                    NO HAY ELEMENTOS
            </td>
        </tr>
        @endforelse
@endsection
