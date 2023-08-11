@extends('layouts.app')

<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">CONDO U</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
@auth
            @if (auth()->user()->tipo ==='administrador')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuarios.index') }}">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('departamentos.index') }}">Departamentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('servicios.index') }}">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pagos.index') }}">Cobros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Estadisticas</a>
                </li>
            @endif

            @if (auth()->user()->tipo ==='residente'||auth()->user()->tipo==='subarrendado')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pagos.index') }}">Mis pagos</a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ route('deudores.index') }}">Deudores</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('reunions.index') }}">Reuniones</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('mensajes.index') }}">Mis Mensajes</a>
            </li>
            
            @endauth
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            @endguest
        </ul>
        @auth
            <span class="navbar-text m-1">
            {{auth()->user()->nombre }}
          </span>
          <div class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
             @csrf
             <a class="nav-link" href="#" onclick="this.closest('form').submit()">Logout</a>
            </form>
           
          </div>
        @endauth
      </div>
    </div>
  </nav>

