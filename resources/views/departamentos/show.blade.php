@extends('layouts.app')

@section('title','Editar Departamento')
@section('content')

@include('partials.nav')

    <div class="container-fluid" style="margin-top: 100px;" >
        <div class="row">
            <div class="col">
                <h3>Editar Departamento # {{ $departamento->id }}</h3>
            </div>
            <form action="#" method="POST">
                @method('PATCH')
                @csrf
                <div class="formn-group">
                    <label for="nombreid">Número</label>
                    <input type="text"  id="nombreid" name="id" class="form-control" value="{{ $departamento->id }}" disabled>
                </div>
                <div class="formn-group">
                    <label for="nombreid">Descripción</label>
                    <input type="text"  id="nombreid" name="descripcion" class="form-control" value="{{ $departamento->descripcion }}" disabled>
                </div>
                
                <div class="form-group">
                    <label for="estadoid">Estado</label>
                    <select  id="estadoid" name="estado"  class="form-select" aria-label="select estado" disabled>
                        <option value="">Definir estado</option>
                        <option value="disponible"  {{($departamento->estado == 'disponible' ? 'selected' : '')}}>Disponible</option>
                        <option value="ocupado"  {{($departamento->estado == 'ocupado' ? 'selected' : '')}}>Ocupado</option>
                      </select>
                </div>

            </form>
        </div>
        <div class="col d-flex justify-content-center align-items-center" style="margin-top: 50px;">
            <a href="{{ route('departamentos.index') }}" class="btn btn-primary">Volver a Departamentos</a>
        </div>
    </div>

@endsection