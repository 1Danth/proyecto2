@extends('list') 
@if (auth()->user()->tipo==='administrador')
        @section('title','Cobros')
        @section('titleh3','Cobros')
        @section('btn_create_title')
        <div class="col d-flex justify-content-center align-items-center">
            <a href="{{ route('pagos.create') }}" class="btn btn-primary">Registrar Cobro</a>
        </div>
        @endsection

        
        @section('table_headers')
        <th scope="col">ID</th>
        <th scope="col">Fecha</th>
        <th scope="col">Monto</th>
        <th scope="col">Estado</th>
        <th scope="col">Servicio</th>
        <th scope="col">Acciones</th>
        @endsection

        @section('forelse_data')
            @forelse ($pagos as $pago )
            <tr>
                <th scope="row">{{ $pago->id }}</th>
                <td>{{ $pago->fecha }}</td>
                <td>{{ $pago->monto }}</td>
                <td>{{ $pago->estado }}</td>
                <td>{{ $pago->servicio }}</td>
                <td>
                    <div class="row">
                        <div class="col"> 
                            <a href="#" class="btn btn-info m-2">Cambiar Estado</a>
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
@endif
@if (auth()->user()->tipo==='residente'||auth()->user()->tipo==='subarrendado')
        @section('title','Mis Pagos')
        @section('titleh3','Mis Pagos')
        @section('btn_create_title')
       
        @endsection

        @section('table_headers')
        <th scope="col">ID</th>
        <th scope="col">Fecha</th>
        <th scope="col">Monto</th>
        <th scope="col">Estado</th>
        <th scope="col">Servicio</th>
        <th scope="col">Acciones</th>
        @endsection

        @section('forelse_data')
            @forelse ($pagos as $pago )
            <tr>
                <th scope="row">{{ $pago->id }}</th>
                <td>{{ $pago->fecha }}</td>
                <td>{{ $pago->monto }}</td>
                <td>{{ $pago->estado }}</td>
                <td>{{ $pago->servicio }}</td>
                <td>
                    <div class="row">
                        <div class="col"> 
                            <a href="#" class="btn btn-info m-2">Cambiar Estado</a>
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
@endif
