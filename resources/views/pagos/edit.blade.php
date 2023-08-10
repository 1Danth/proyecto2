@extends('layouts.app')

@section('title','Cambiar Estado')
@section('content')

@include('partials.nav')

    <div class="container-fluid" style="margin-top: 100px;" >
        <div class="row">
            <div class="col">
                <h3>Cambiar estado de Cobro # {{ $pago->id }}</h3>
            </div>
            <form action="{{ route('pagos.update',['pago'=>$pago->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="formn-group">
                    <label for="nombreid">ID</label>
                    <input type="text"  id="nombreid" name="id" class="form-control" value="{{ $pago->id }}" disabled>
                </div>

                <div class="formn-group">
                    <label for="nombreid">Fecha</label>
                    <input type="text"  id="nombreid" name="fecha" class="form-control" value="{{ $pago->fecha }}" disabled>
                </div>

                <div class="formn-group">
                    <label for="nombreid">Monto</label>
                    <input type="text"  id="nombreid" name="monto" class="form-control" value="{{ $pago->monto }}" disabled>
                </div>

                <div class="form-group">
                    <label for="estadoid">Estado</label>
                    <select  id="estadoid" name="estado"  class="form-select" aria-label="select sexo" >
                        <option value="">Definir estado</option>
                        <option value="no realizado"  {{($pago->estado == 'no realizado' ? 'selected' : '')}}>No Realizado</option>
                        <option value="realizado"  {{($pago->estado == 'realizado' ? 'selected' : '')}}>Realizado</option>
                      </select>
                </div>

                <div class="formn-group">
                    <label for="nombreid">Servicio</label>
                    <input type="text"  id="nombreid" name="nombre" class="form-control" value="{{ $servicio->nombre }}" disabled>
                </div>
                <table class="table table-hover" style="margin-top: 50px;">
                    <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Nombre</th>
                            </tr>
                    </thead>
                    <tbody>
                                @foreach ($pagoslinked as $pagolinked)
                                    <tr>
                                        <th scope="row">{{ $pagolinked->id }}</th>
                                        <td>{{ $pagolinked->fecha }}</td>
                                        <td>{{ $pagolinked->monto }}</td>
                                        <td>
                                            
                                            <select name="estados[{{ $pagolinked->id }}]" class="form-select" aria-label="select estados">
                                                <option value="realizado" {{ ($pagolinked->estado == 'realizado') ? 'selected' : '' }}>Realizado</option>
                                                <option value="no realizado" {{ ($pagolinked->estado == 'no realizado') ? 'selected' : '' }}>No Realizado</option>
                                            </select>
                                        </td>
                                        <td>{{ $pagolinked->nombre }}</td>
                                    </tr>
                                @endforeach
                    </tbody>
                </table>
            <button type="submit" class="btn btn-primary" style="margin-top: 50px;">Actualizar</button>
            </form>
        </div>
    </div>

@endsection