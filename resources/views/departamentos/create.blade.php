@extends('layouts.app')

@section('title','Registrar Departamento')

@section('content')
@include('partials.nav')
    <div class="container-fluid" style="margin-top: 100px;">
            <div class="row">
                    <div class="col">
                        <h3>Registrar Departamento</h3>
                    </div>
                    <form action="{{ route('departamentos.store') }}" method="POST">
                        @csrf
                        <div class="formn-group">
                            <label for="nombreid">Número</label>
                            <input type="number"  id="nombreid" name="id" class="form-control" required>
                        </div>
                        <div class="formn-group">
                            <label for="nombreid">Descripción</label>
                            <input type="text"  id="nombreid" name="descripcion" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary" style="margin-top: 50px;">Guardar</button>
                    </form>
            </div>
    </div>
@endsection