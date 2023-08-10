@extends('layouts.app')
@section('content')
    @include('partials.nav')
<div class="container-fluid" style="margin-top: 100px;">
    <div class="row " >
        <div    class="col">
            <h3>@yield('titleh3')</h3>
        </div>
        @yield('btn_create_title')
    </div>
    <table class="table table-hover" style="margin-top: 50px;">
        <thead>
            <tr>
                @yield('table_headers')
            </tr>
        </thead>
        <tbody>
            @yield('forelse_data')
        </tbody>
      </table>
</div>
@endsection