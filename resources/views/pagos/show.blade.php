@extends('layouts.app')

@section('title','Cambiar Estado')
@section('content')

@include('partials.nav')

    <div class="container-fluid" style="margin-top: 100px;" >
        <div class="row">
            <div class="col">
                <h3>Ver estado de Cobro # {{ $pago->id }}</h3>
            </div>
            <form action="#" method="POST">
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
                    <select  id="estadoid" name="estado"  class="form-select" aria-label="select sexo" disabled>
                        <option value="">Definir estado</option>
                        <option value="no realizado"  {{($pago->estado == 'no realizado' ? 'selected' : '')}}>No Realizado</option>
                        <option value="realizado"  {{($pago->estado == 'realizado' ? 'selected' : '')}}>Realizado</option>
                      </select>
                </div>

                <div class="formn-group">
                    <label for="nombreid">Servicio</label>
                    <input type="text"  id="nombreid" name="nombre" class="form-control" value="{{ $servicio->nombre }}" disabled>
                </div>

            </form>
        </div>
        <div class="col d-flex justify-content-center align-items-center" style="margin-top: 50px;">
            @if (auth()->user()->tipo==='administrador')
                <a href="{{ route('pagos.index') }}" class="btn btn-primary">Volver a Cobros</a>
            @else
            <a href="{{ route('pagos.index') }}" class="btn btn-primary">Volver a Mis Pagos</a>
            @endif
        </div>
    </div>

@endsection