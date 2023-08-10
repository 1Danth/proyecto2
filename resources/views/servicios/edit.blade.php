@extends('layouts.app')

@section('title','Editar Servicio')
@section('content')

@include('partials.nav')

    <div class="container-fluid" style="margin-top: 100px;" >
        <div class="row">
            <div class="col">
                <h3>Editar Servicio # {{ $servicio->id }}</h3>
            </div>
            <form action="{{ route('servicios.update',['servicio'=>$servicio->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="formn-group">
                    <label for="nombreid">Nombre o Descripción</label>
                    <input type="text"  id="nombreid" name="nombre" class="form-control" value="{{ $servicio->nombre }}">
                </div>

            <button type="submit" class="btn btn-primary" style="margin-top: 50px;">Actualizar</button>
            </form>
        </div>
    </div>

@endsection