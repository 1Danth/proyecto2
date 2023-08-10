@extends('layouts.app')

@section('title','Crear Servicio')

@section('content')
@include('partials.nav')

    <div class="container-fluid" style="margin-top: 100px;">
            <div class="row">
                    <div class="col">
                        <h3>Ver Servicio</h3>
                    </div>
                    <form action="#" method="POST">
                        @csrf
                        <div class="formn-group">
                            <label for="idd">ID</label>
                            <input type="text"  id="idd" name="id" class="form-control" value="{{ $servicio->id }}" disabled>
                        </div>
                        <div class="formn-group">
                            <label for="nombreid">Nombre o Descripción</label>
                            <input type="text"  id="nombreid" name="nombre" class="form-control" value="{{ $servicio->nombre }}" disabled>
                        </div>
                    </form>
                    
            </div>
            <div class="col d-flex justify-content-center align-items-center" style="margin-top: 50px;">
                <a href="{{ route('servicios.index') }}" class="btn btn-primary">Volver a Servicios</a>
            </div>
    </div>
@endsection