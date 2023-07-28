@extends('layouts.app')

@section('title','Login')

@section('content')
    @include('partials.nav')
    <h1>LOGIN</h1>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <form  method="POST">
        @csrf
        <div class="m-3">
            <label for="email_input" class="form-label"><h3>Email</h3></label>
            <input type="email" class="form-control" id="email_input" placeholder="name@example.com" name="email">
          </div>
        <br>
        <div class="m-3">
            <label for="password" class="form-label"><h3>Password</h3></label>
            <input type="password" id="password" class="form-control" aria-describedby="passwordHelpInline" placeholder="contraseña" name="password">
          </div>
       <br>
       <button type="submit" class="btn btn-outline-primary">INGRESAR</button>
    </form>
</div>
@endsection