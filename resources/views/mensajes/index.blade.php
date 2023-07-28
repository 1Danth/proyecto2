@extends('list')    
@section('title','Mis Mensajes')
@section('titleh3',' Mensajes Recibidos')
@section('btn_create_title')
<div class="col d-flex justify-content-center align-items-center">
    <a href="{{ route('mensajes.create') }}" class="btn btn-primary">Enviar Mensaje</a>
</div>
@endsection
@section('table_headers')
    <th scope="col">ID</th>
    <th scope="col">Fecha Env.</th>
    <th scope="col">Tipo</th>
    <th scope="col">Contenido</th>
    <th scope="col">Emisor</th>
@endsection
@section('forelse_data')
        @forelse ($mensajes as $mensaje )
        <tr>
            <th scope="row">{{ $mensaje->id }}</th>
            <td>{{ $mensaje->created_at }}</td>
            <td>{{ $mensaje->tipo }}</td>
            <td>{{ $mensaje->contenido }}</td>
            <td>{{ $mensaje->id_emisor }}</td>
        </tr>
        @empty
        <tr>
            <td class="text-bg-danger p-3">
                    NO HAY ELEMENTOS
            </td>
        </tr>
        @endforelse
@endsection
