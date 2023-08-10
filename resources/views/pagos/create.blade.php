@extends('layouts.app')

@section('title','Registrar Cobro')
@section('content')

@include('partials.nav')

<div class="container-fluid" style="margin-top: 100px;">
        <div class="row">
            <div class="col">
                <h3>Registrar Cobro</h3>
            </div>
            <form action="{{ route('pagos.store') }}" method="POST">
                @csrf
                        <div class="form-group">
                            <label for="servicesselectorid">Servicio:</label>
                            <select name="id_servicio" id="servicioid" class="form-select" aria-label="select servicio" required>
                                <option value="">Seleccione servicio</option>
                                @foreach ($servicios as $servicio)
                                    <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="montoid">Monto:</label>
                            <input type="number" name="monto" class="form-control" id="montoid" aria-describedby="montoHelp" placeholder="Ingrese monto" required>
                        </div>
                        <div class="form-group">
                            <label for="fechaid">Fecha </label>
                            <input type="date" id="fechaid"name="fecha" class="form-control"  required>
                        </div>  
                        <div class="form-group">
                            <label for=typeselectorid"> Tipo de pago:</label>
                            <select name="pagotipo" id="typeselectorid" class="form-select" aria-label="select servicio" required>
                                <option value="">Seleccione tipo de pago</option>
                                <option value="compartido">Pago Compartido</option>
                                <option value="normal">Pago Normal</option>
                            </select>
                            <p>
                                <strong>Pago compartido:</strong>
                                El monto a pagar será dividido a partes iguales entre los usuarios seleccionados. 
                            </p>
                            <p>
                                <strong>Pago normal:</strong>
                                El monto a pagar será asignado a los usuarios seleccionados.
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="usuariosid">Lista de Usuarios </label>
                            <table class="table table-hover" style="margin-top: 50px;">
                                <thead>
                                    <tr>
                                        <th scope="col">Check</th>
                                        <th scope="col">CI</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Fecha de Nac.</th>
                                        <th scope="col">Teléfono</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Sexo</th>
                                        <th scope="col">Tipo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                        <th scope="row">
                                        <input type="checkbox" name="userselected[]" value="{{ $usuario->id }}">
                                        </th>
                                        <th scope="row">{{ $usuario->id }}</th>
                                        <td>{{ $usuario->nombre }}</td>
                                        <td>{{ $usuario->fecha_nac }}</td>
                                        <td>{{ $usuario->telefono }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>{{ $usuario->sexo }}</td>
                                        <td>{{ $usuario->tipo }}</td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top: 50px;">Guardar</button>
            </form>
            
        </div>
</div>


@endsection