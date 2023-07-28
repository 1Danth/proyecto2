@extends('layouts.app')

@section('title','Crear Usuario')

@section('content')
@include('partials.nav')

<div class="container-fluid" style="margin-top: 50px;">

        <div class="row">
            <div    class="col">
                <h3>Registrar Usuario</h3>
            </div>
        </div>
        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="idd">Carnet de Identidad</label>
                <input type="text"  id="idd" name="id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nombreid">Nombre</label>
                <input type="text" id="nombreid" name="nombre" class="form-control" required>
            </div>   
            <div class="form-group">
                <label for="fechaid">Fecha </label>
                <input type="date" id="fechaid"name="fecha_nac" class="form-control"  required>
            </div>  
            <div class="form-group">
                <label for="telefonoid">Telefono</label>
                <input type="number" id="telefonoid"name="telefono" class="form-control" required>
            </div>  
            <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Ingrese email" required>
            </div>  
            <div class="form-group">
                    <label for="passid" class="form-label">Password</label>
                    <input type="password" name="password"  id="passid" class="form-control" aria-describedby="passwordHelpBlock" required>   
            </div>
                <div class="form-group">
                    <label for="sexoid">Sexo</label>
                    <select  id="sexoid" name="sexo"  class="form-select" aria-label="select sexo" required>
                        <option value="">Seleccione sexo</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                      </select>
                </div>

                <div class="form-group">
                    <label for="tipoid">Tipo</label>
                    <select id="tipoid" name="tipo"   class="form-select" aria-label="select tipo" required>
                        <option value="">Seleccione tipo</option>
                        <option value="administrador">Administrador</option>
                        <option value="residente">Residente</option>
                        <option value="subarrendado">Subarrendado</option>
                      </select>
                </div>
            
            <button type="submit" class="btn btn-primary" style="margin-top: 50px;">Guardar</button>

        </form>
</div>

@endsection