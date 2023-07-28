@extends('list')    
@section('title','Lista de Deudores')
@section('titleh3','Lista de Deudores')
@section('btn_create_title')

@endsection
@section('table_headers')
    <th scope="col">CI</th>
    <th scope="col">Nombre del Deudor</th>
    <th scope="col">Deuda Total</th>
@endsection
@section('forelse_data')
        @forelse ($deudores as $deudor )
        <tr>
            <th scope="row">{{ $deudor->id }}</th>
            <td>{{ $deudor->nombre }}</td>
            <td>{{ $deudor->total_monto }}</td>
        </tr>
        @empty
        <tr>
            <td class="text-bg-danger p-3">
                    NO HAY ELEMENTOS
            </td>
        </tr>
        @endforelse
@endsection
