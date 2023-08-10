@extends('layouts.app')

@section('title','Crear Servicio')

@section('content')
@include('partials.nav')
    <div class="container-fluid" style="margin-top: 100px;">
            <div class="row">
                    <div class="col">
                        <h3>Registrar Servicio</h3>
                    </div>
                    <form action="{{ route('servicios.store') }}" method="POST">
                        @csrf
                        <div class="formn-group">
                            <label for="nombreid">Nombre o Descripción</label>
                            <input type="text"  id="nombreid" name="nombre" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top: 50px;">Guardar</button>
                    </form>
            </div>
    </div>
@endsection