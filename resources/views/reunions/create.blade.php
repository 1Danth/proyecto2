@extends('layouts.app')

@section('title','Crear Reunion')

@section('content')
@include('partials.nav')

<div class="container-fluid" style="margin-top: 100px;">
    <div class="row">
        <div class="col">
            <h3>Registrar Reunion</h3>
        </div>
        <form action="{{ route('reunions.store') }}" method="POST">
            @csrf
            <div class="formn-group">
                <label for="asuntoid">Asunto</label>
                <input type="text"  id="asuntoid" name="asunto" class="form-control" required>
            </div>
            <div class="formn-group">
                <label for="descripcionid">Descripción</label>
                <input type="text"  id="descripcionid" name="descripcion" class="form-control" required>
            </div>
            <div class="formn-group">
                <label for="fechaid">Fecha</label>
                <input type="date"  id="fechaid" name="fecha" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 50px;">Guardar</button>
        </form>
    </div>
</div>
@endsection