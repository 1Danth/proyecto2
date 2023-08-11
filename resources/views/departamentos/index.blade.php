@extends('list')    
@section('title','Departamentos')
@section('titleh3',' Departamentos')
@section('btn_create_title')
<div class="col d-flex justify-content-center align-items-center">
    <a href="{{ route('departamentos.create') }}" class="btn btn-primary">Registrar Departamento</a>
</div>
@endsection
@section('table_headers')
    <th scope="col">Número</th>
    <th scope="col">Descripción</th>
    <th scope="col">Estado</th>
    <th scope="col">Creado el</th>
    <th scope="col">Acciones</th>
@endsection
@section('forelse_data')
        @forelse ($departamentos as $depa )
        <tr>
            <th scope="row">{{ $depa->id }}</th>
            <td>{{ $depa->descripcion }}</td>
            <td>{{ $depa->estado }}</td>
            <td>{{ $depa->created_at }}</td>
            <td>
                <div class="row">
                    <div class="col"> 
                        <a href="{{ route('departamentos.edit',['departamento'=>$depa->id]) }}" class="btn btn-info m-2">Editar</a>
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