@extends('list')    
@section('title','Reuniones')
@section('titleh3','Reuniones')
@section('btn_create_title')
<div class="col d-flex justify-content-center align-items-center">
    <a href="{{ route('reunions.create') }}" class="btn btn-primary">Crear Reunion</a>
</div>
@endsection
@section('table_headers')
    <th scope="col">ID</th>
    <th scope="col">Asunto</th>
    <th scope="col">Descripción</th>
    <th scope="col">Fecha</th>
    <th scope="col">Conclusion</th>
    <th scope="col">Creado en</th>
    <th scope="col">Creado por</th>
@endsection
@section('forelse_data')
        @forelse ($reuniones as $reunion )
        <tr>
            <th scope="row">{{ $reunion->id }}</th>
            <td>{{ $reunion->asunto }}</td>
            <td>{{ $reunion->descripcion }}</td>
            <td>{{ $reunion->fecha }}</td>
            <td>{{ $reunion->conclusion }}</td>
            <td>{{ $reunion->created_at }}</td>
            <td>{{ $reunion->id_usuario }}</td>
            <td>
                <div class="row">
                    <div class="col"> 
                        <a href="#" class="btn btn-info m-2">Actu. Conclusion</a>
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
