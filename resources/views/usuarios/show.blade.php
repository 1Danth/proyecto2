@extends('layouts.app')

@section('title','Crear Usuario')

@section('content')
@include('partials.nav')

<div class="container-fluid" style="margin-top: 100px;">

        <div class="row">
            <div    class="col">
                <h3>Ver Usuario</h3>
            </div>
        </div>
        <form action="#" method="POST">
            @csrf
            <div class="form-group">
                <label for="id">Carnet de Identidad</label>
                <input type="text"  id="id" name="id" class="form-control" value="{{$usuario->id}}" disabled>
            </div>
            <div class="form-group">
                <label for="nombreid">Nombre</label>
                <input type="text" id="nombreid" name="nombre" class="form-control" value="{{$usuario->nombre}}" disabled>
            </div>   
            <div class="form-group">
                <label for="fechaid">Fecha </label>
                <input type="date" id="fechaid"name="fecha_nac" class="form-control"  value="{{$usuario->fecha_nac}}" disabled>
            </div>  
            <div class="form-group">
                <label for="telefonoid">Telefono</label>
                <input type="number" id="telefonoid"name="telefono" class="form-control" value="{{$usuario->telefono}}" disabled>
            </div>  
            <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Ingrese email" value="{{$usuario->email}}" disabled>
            </div>  
            <div class="form-group">
                    <label for="passid" class="form-label">Password</label>
                    <input type="password" name="password"  id="passid" class="form-control" aria-describedby="passwordHelpBlock" value="{{$usuario->password}}" disabled>   
            </div>
                <div class="form-group">
                    <label for="sexoid">Sexo</label>
                    <select  id="sexoid" name="sexo"  class="form-select" aria-label="select sexo" disabled>
                        <option value="">Seleccione sexo</option>
                        <option value="M"  {{($usuario->sexo == 'M' ? 'selected' : '')}}>Masculino</option>
                        <option value="F"  {{($usuario->sexo == 'F' ? 'selected' : '')}}>Femenino</option>
                      </select>
                </div>

                <div class="form-group">
                    <label for="tipoid">Tipo</label>
                    <select id="tipoid" name="tipo"   class="form-select" aria-label="select tipo" disabled>
                        <option value="">Seleccione tipo</option>
                        <option value="administrador"  {{($usuario->tipo == 'administrador' ? 'selected' : '')}}>Administrador</option>
                        <option value="residente" {{($usuario->tipo == 'residente' ? 'selected' : '')}}>Residente</option>
                        <option value="subarrendado" {{($usuario->tipo == 'subarrendado' ? 'selected' : '')}}>Subarrendado</option>
                      </select>
                </div>
        </form>
        <div class="col d-flex justify-content-center align-items-center" style="margin-top: 50px;">
            <a href="{{ route('usuarios.index') }}" class="btn btn-primary">Volver a Usuarios</a>
        </div>
</div>
@endsection