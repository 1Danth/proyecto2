@extends('layouts.app')

@section('title','Crear Reunion')

@section('content')
@include('partials.nav')

<div class="container-fluid" style="margin-top: 100px;">
    <div class="row">
        <div class="col">
            <h3>Editar  Reunion</h3>
        </div>
        <form action="{{ route('reunions.update',['reunion'=>$reunion->id]) }}" method="POST">
            @csrf
            <div class="formn-group">
                <label for="asuntoid">Asunto</label>
                <input type="text"  id="asuntoid" name="asunto" class="form-control" value="{{ $reunion->asunto }}" disabled>
            </div>
            <div class="formn-group">
                <label for="descripcionid">Descripción</label>
                <input type="text"  id="descripcionid" name="descripcion" class="form-control" value="{{ $reunion->descripcion }}" disabled>
            </div>
            <div class="formn-group">
                <label for="fechaid">Fecha</label>
                <input type="date"  id="fechaid" name="fecha" class="form-control" value="{{ $reunion->fecha }}" disabled>
            </div>

            <div class="formn-group">
                <label for="conclusionid">Conclusion</label>
                <input type="text"  id="conclusionid" name="conclusion" class="form-control" value="{{ $reunion->conclusion }}" required>
            </div>

            <button type="submit" class="btn btn-primary" style="margin-top: 50px;">Guardar</button>
        </form>
    </div>
</div>
@endsection