@extends('layouts.app')

@section('title','Editar Departamento')
@section('content')

@include('partials.nav')

    <div class="container-fluid" style="margin-top: 100px;" >
        <div class="row">
            <div class="col">
                <h3>Editar Departamento # {{ $departamento->id }}</h3>
            </div>
            <form action="{{ route('departamentos.update',['departamento'=>$departamento->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="formn-group">
                    <label for="nombreid">Número</label>
                    <input type="text"  id="nombreid" name="id" class="form-control" value="{{ $departamento->id }}">
                </div>
                <div class="formn-group">
                    <label for="nombreid">Descripción</label>
                    <input type="text"  id="nombreid" name="descripcion" class="form-control" value="{{ $departamento->descripcion }}">
                </div>
                
                <div class="form-group">
                    <label for="estadoid">Estado</label>
                    <select  id="estadoid" name="estado"  class="form-select" aria-label="select sexo" >
                        <option value="">Definir estado</option>
                        <option value="disponible"  {{($departamento->estado == 'disponible' ? 'selected' : '')}}>Disponible</option>
                        <option value="ocupado"  {{($departamento->estado == 'ocupado' ? 'selected' : '')}}>Ocupado</option>
                      </select>
                </div>

            <button type="submit" class="btn btn-primary" style="margin-top: 50px;">Actualizar</button>
            </form>
        </div>
    </div>

@endsection